<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Offer;
use App\Press_release;
use App\Novelty;
use App\Event;
use App\Event_locations;
use App\MainPage;
use App\StaticPage;
use App\Images;
use App\Offer_image;
use App\Plan;
use App\Update;
use App\Http\Requests\ProjectsFromRequest;
use App\City;
use App\Country;
use App\Region;
use App\User;
use Session;
use Redirect;
use File;
use Response;
use Validator;
use Input;
use Image;

class AdminController extends Controller
{
    public function create_city()
    {
        $cities = City::orderBy('created_at', 'desc');
        $countries = Country::all();
        $cities = $cities->paginate(12);

        return view('admin.create_city', compact('cities', 'releases', 'countries'));
    }

    public function store_city()
    {
        $city = New City;

        $slug = uniqid();
        $city->name = Request::input('city');
        $city->country_id = Request::input('country');
        $city->slug = $slug;

        $city->save();

        return redirect('/create_city')->with('status', 'Город добавлен!');
    }

    public function destroy_city($slug)
    {
        $city = City::whereSlug($slug)->firstOrFail();
        $city->delete();
        return redirect('/create_city')->with('status', 'Город удален!');
    }

    public function projects()
    {
        $projects = Project::orderBy('created_at', 'desc');
        $projects = $projects->paginate(12);

        return view('admin/projects', compact('projects'));
    }

    public function create()
    {
        $cities = City::all();
        $countries = Country::all();
        $regions = Region::all();

        return view('admin.create', compact('cities', 'countries', 'regions'));
    }


    public function store(ProjectsFromRequest $request)
    {
        $project = New Project;
        $slug = uniqid();
        
        if($request->get('images') !== null) {
            foreach ($request->get('images') as $key => $image) {
                if($key == 0) {
                    $project->image = $image;
                }
            }
        }

        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->text = $request->get('text');
        $project->slug = $slug;
        $project->city_id = $request->get('city');
        $project->country_id = $request->get('country');
        $project->region_id = $request->get('region');
        $project->category_id = $request->get('status');
        $project->media = $request->get('media');
        $project->facilities = $request->get('facilities');
        $project->community_info = $request->get('community_info');
        $project->update = $request->get('update');
        $project->view_pdf = $request->get('view_pdf');
        $project->download_pdf = $request->get('download_pdf');
        $project->is_slide = $request->get('is_slide');
        $project->is_popular = $request->get('is_popular');
        $project->lat = $request->get('lat');
        $project->lng = $request->get('lng');

        $project->save();

        if($request->get('images') !== null)
        {
            foreach ($request->get('images') as $image)
            {
                $i = new Images;
                $i->project_id = $project->id;
                $i->name = $image;
                $i->save();
            }
        }

        if($request->get('plans') !== null)
        {
            foreach ($request->get('plans') as $plan)
            {
                $i = new Plan;
                $i->project_id = $project->id;
                $i->name = $plan;
                $i->save();
            }
        }

        if($request->get('updates') !== null)
        {
            foreach ($request->get('updates') as $update)
            {
                $i = new Update;
                $i->project_id = $project->id;
                $i->name = $update;
                $i->save();
            }
        }

        return redirect('/create')->with('status', 'Проект создан!');
    }

    public function edit($slug)
    {
        $cities = City::all();
        $countries = Country::all();
        $regions = Region::all();
        $project = Project::whereSlug($slug)->firstOrFail();
        $plans = Plan::where('project_id', $project->id)->get();
        $images = Images::where('project_id', $project->id)->get();
        $updates = Update::where('project_id', $project->id)->get();

        return view('admin.edit', compact('project', 'cities', 'plans', 'images', 'countries', 'regions', 'updates'));
    }

    public function update($slug, ProjectsFromRequest $request)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->text = $request->get('text');
        $project->city_id = $request->get('city');
        $project->country_id = $request->get('country');
        $project->region_id = $request->get('region');
        $project->category_id = $request->get('status');
        $project->media = $request->get('media');
        $project->facilities = $request->get('facilities');
        $project->community_info = $request->get('community_info');
        $project->update = $request->get('update');
        $project->view_pdf = $request->get('view_pdf');
        $project->download_pdf = $request->get('download_pdf');
        $project->is_slide = $request->get('is_slide');
        $project->is_popular = $request->get('is_popular');

        if($request->get('lat') && $request->get('lng') !== null) {
            $project->lat = $request->get('lat');
            $project->lng = $request->get('lng');
        }

        if($request->get('images') !== null) {
            foreach ($request->get('images') as $key => $image) {
                if($key == 0) {
                    $project->image = $image;
                }
            }
        }
        
        $project->save();


        if($request->get('images') !== null)
        {
            foreach ($request->get('images') as $image)
            {
                $i = new Images;
                $i->project_id = $project->id;
                $i->name = $image;
                $i->save();
            }
        }

        if($request->get('plans') !== null)
        {
            foreach ($request->get('plans') as $plan)
            {
                $i = new Plan;
                $i->project_id = $project->id;
                $i->name = $plan;
                $i->save();
            }
        }

        if($request->get('updates') !== null)
        {
            foreach ($request->get('updates') as $update)
            {
                $i = new Update;
                $i->project_id = $project->id;
                $i->name = $update;
                $i->save();
            }
        }   

        return redirect(action('AdminController@update', $project->slug))->with('status', 'Проект обновлен!');

    }

    public function destroy($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $project->delete();
        return redirect('/admin')->with('status', 'Проект удален!');
    }

    public function offers()
    {
        $offers = Offer::orderBy('created_at', 'desc');
        $offers = $offers->paginate(12);

        return view('admin/offers', compact('offers'));
    }

    public function create_offer()
    {

        return view('admin.create_offer');
    }

    public function store_offer(ProjectsFromRequest $request)
    {
        $offer = New Offer;
        $slug = uniqid();
        
        if($request->get('images') !== null) {
            foreach ($request->get('images') as $key => $image) {
                if($key == 0) {
                    $offer->image = $image;
                }
            }
        }

        $offer->title = $request->get('title');
        $offer->description = $request->get('description');
        $offer->text = $request->get('text');
        $offer->slug = $slug;
        $offer->media = $request->get('media');
        $offer->location = $request->get('location');
        $offer->view_pdf = $request->get('view_pdf');
        $offer->download_pdf = $request->get('download_pdf');
        $offer->lat = $request->get('lat');
        $offer->lng = $request->get('lng');

        $offer->save();

        if($request->get('images') !== null)
        {
            foreach ($request->get('images') as $image)
            {
                $i = new Offer_image;
                $i->offer_id = $offer->id;
                $i->name = $image;
                $i->save();
            }
        }

        return redirect('/create_offer')->with('status', 'Предложение создано!');
    }

    public function edit_offer($slug)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();
        $images = Offer_image::all();

        return view('admin.create_offer', compact('offer', 'images'));
    }

    public function update_offer($slug, ProjectsFromRequest $request)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();
        $offer->title = $request->get('title');
        $offer->description = $request->get('description');
        $offer->text = $request->get('text');
        $offer->slug = $slug;
        $offer->media = $request->get('media');
        $offer->location = $request->get('location');
        $offer->view_pdf = $request->get('view_pdf');
        $offer->download_pdf = $request->get('download_pdf');

        if($request->get('lat') && $request->get('lng') !== null) {
            $offer->lat = $request->get('lat');
            $offer->lng = $request->get('lng');
        }

        if($request->get('images') !== null) {
            foreach ($request->get('images') as $key => $image) {
                if($key == 0) {
                    $offer->image = $image;
                }
            }
        }
        
        $offer->save();


        if($request->get('images') !== null)
        {
            foreach ($request->get('images') as $image)
            {
                $i = new Offer_image;
                $i->offer_id = $offer->id;
                $i->name = $image;
                $i->save();
            }
        }

        return redirect(action('AdminController@update_offer', $offer->slug))->with('status', 'Предложение обновлено!');
    }

    public function destroy_offer($slug)
    {
        $offer = Offer::whereSlug($slug)->firstOrFail();
        $offer->delete();
        return redirect('/ad_offers')->with('status', 'Предложение удалено!');
    }

    public function uploadFiles() 
    {
        $input = Input::file('file');

        $extension = $input->getClientOriginalExtension();
        
        $fileName = rand(11111, 99999) . '.' . $extension;

        $destinationPath = public_path('uploads/projects/large/' . $fileName);
        $destinationPath2 = public_path('uploads/projects/big/' . $fileName);
        $destinationPath3 = public_path('uploads/projects/small/' . $fileName);
        $destinationPath4 = public_path('uploads/projects/source/' . $fileName);

        $upload = Image::make($input)->fit(1750, 967)->save($destinationPath);
        $upload2 = Image::make($input)->fit(802, 580)->save($destinationPath2);
        $upload3 = Image::make($input)->fit(401, 580)->save($destinationPath3);
        $upload4 = Image::make($input)->save($destinationPath4);
        
 
        if ($upload && $upload2 && $upload3) {
            return Response::json($fileName, 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function uploadPlans() 
    {
        $input = Input::file('file');

        $extension = $input->getClientOriginalExtension();
        
        $planName = rand(11111, 99999) . '.' . $extension;

        $destinationPath = public_path('uploads/plans/' . $planName);

        $upload = Image::make($input)->save($destinationPath);

 
        if ($upload) {
            return Response::json($planName, 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function uploadUpdates() 
    {
        $input = Input::file('file');

        $extension = $input->getClientOriginalExtension();
        
        $planName = rand(11111, 99999) . '.' . $extension;

        $destinationPath = public_path('uploads/updates/' . $planName);

        $upload = Image::make($input)->save($destinationPath);

 
        if ($upload) {
            return Response::json($planName, 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function releases()
    {
        $releases = Press_release::orderBy('created_at')->paginate(12);

        return view('admin/releases', compact('releases'));
    }

    public function store_rel()
    {
        if(Input::file('image')!== null)
        {
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required');
            $validator = Validator::make($file, $rules);

            if ($validator->fails()) 
            {
                return Redirect::to('create_rel')->withInput()->withErrors($validator);
            }

            $destinationPath = public_path('uploads/media/big/' . $fileName);
            $destinationPath2 = public_path('uploads/media/small/' . $fileName);

            $upload = Image::make(Input::file('image'))->fit(802, 580)->save($destinationPath);
            $upload2 = Image::make(Input::file('image'))->fit(305, 221)->save($destinationPath2);
        }

        $release = New Press_release;
        $slug = uniqid();
        
        if(isset($fileName)) { $release->image = $fileName; }
        $release->title = Request::input('title');
        $release->text = Request::input('text');
        $release->slug = $slug;
        
        $release->save();

        return redirect('/create_rel')->with('status', 'Пресс-релиз создан!');
    }

    public function edit_rel($slug)
    {
        $release = Press_release::whereSlug($slug)->firstOrFail();
        return view('admin.create_rel_new', compact('release'));
    }

    public function update_rel($slug)
    {
        if(Input::file('image')!== null)
        {
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required');
            $validator = Validator::make($file, $rules);

            if ($validator->fails()) 
            {
                return Redirect::to('create_rel')->withInput()->withErrors($validator);
            }

            $destinationPath = public_path('uploads/media/big/' . $fileName);
            $destinationPath2 = public_path('uploads/media/small/' . $fileName);

            $upload = Image::make(Input::file('image'))->fit(802, 580)->save($destinationPath);
            $upload2 = Image::make(Input::file('image'))->fit(305, 221)->save($destinationPath2);
        }


        $release = Press_release::whereSlug($slug)->firstOrFail();
        $release->title = Request::input('title');
        $release->text = Request::input('text');
        if(isset($fileName)) { $release->image = $fileName; }
        
        $release->save();
        return redirect(action('AdminController@update_rel', $release->slug))->with('status', 'Пресс-релиз обновлен!');

    }

    public function destroy_rel($slug)
    {
        $release = Press_release::whereSlug($slug)->firstOrFail();
        $release->delete();
        return redirect('/press_rel')->with('status', 'Пресс-релиз удален!');
    }

    public function news()
    {
        $novelties = Novelty::orderBy('created_at')->paginate(12);

        return view('admin/novelties', compact('novelties'));
    }

    public function store_new()
    {
        if(Input::file('image')!== null)
        {
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required');
            $validator = Validator::make($file, $rules);

            if ($validator->fails()) 
            {
                return Redirect::to('create_rel')->withInput()->withErrors($validator);
            }

            $destinationPath = public_path('uploads/media/big/' . $fileName);
            $destinationPath2 = public_path('uploads/media/small/' . $fileName);

            $upload = Image::make(Input::file('image'))->fit(802, 580)->save($destinationPath);
            $upload2 = Image::make(Input::file('image'))->fit(305, 221)->save($destinationPath2);
        }

        $novelty = New Novelty;
        $slug = uniqid();
        
        if(isset($fileName)) { $novelty->image = $fileName; }
        $novelty->title = Request::input('title');
        $novelty->text = Request::input('text');
        $novelty->slug = $slug;
        
        $novelty->save();

        return redirect('/create_novel')->with('status', 'Новость создана!');
    }

    public function edit_new($slug)
    {
        $novelty = Novelty::whereSlug($slug)->firstOrFail();
        return view('admin.create_rel_new', compact('novelty'));
    }

    public function update_new($slug)
    {
        if(Input::file('image')!== null)
        {
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required');
            $validator = Validator::make($file, $rules);

            if ($validator->fails()) 
            {
                return Redirect::to('create_rel')->withInput()->withErrors($validator);
            }

            $destinationPath = public_path('uploads/media/big/' . $fileName);
            $destinationPath2 = public_path('uploads/media/small/' . $fileName);

            $upload = Image::make(Input::file('image'))->fit(802, 580)->save($destinationPath);
            $upload2 = Image::make(Input::file('image'))->fit(305, 221)->save($destinationPath2);
        }


        $novelty = Novelty::whereSlug($slug)->firstOrFail();
        $novelty->title = Request::input('title');
        $novelty->text = Request::input('text');
        if(isset($fileName)) { $novelty->image = $fileName; }
        
        $novelty->save();
        return redirect(action('AdminController@update_new', $novelty->slug))->with('status', 'Новость обновлена!');

    }

    public function destroy_new($slug)
    {
        $novelty = Novelty::whereSlug($slug)->firstOrFail();
        $novelty->delete();
        return redirect('/novel')->with('status', 'Новость удалена!');
    }

    public function event()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(12);

        return view('admin/event', compact('events'));
    }

    public function store_event()
    {
        if(Input::file('image')!== null)
        {
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required');
            $validator = Validator::make($file, $rules);

            if ($validator->fails()) 
            {
                return Redirect::to('create_event')->withInput()->withErrors($validator);
            }

            $destinationPath = public_path('uploads/media/big/' . $fileName);
            $destinationPath2 = public_path('uploads/media/small/' . $fileName);

            $upload = Image::make(Input::file('image'))->fit(802, 580)->save($destinationPath);
            $upload2 = Image::make(Input::file('image'))->fit(305, 221)->save($destinationPath2);
        }

        $event = New Event;
        $slug = uniqid();
        
        if(isset($fileName)) { $event->image = $fileName; }
        $event->title = Request::input('title');
        $event->text = Request::input('text');
        $event->time = Request::input('time');
        //$event->lat = Request::input('lat');
        //$event->lng = Request::input('lng');
        $event->location = Request::input('location');
        $event->slug = $slug;
        
        $event->save();

        if(!empty(Request::get('lat'))) {
            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat');
            $locations->lng = Request::input('lng');
            $locations->save();
        }

        if(!empty(Request::get('lat2'))) {
            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat2');
            $locations->lng = Request::input('lng2');
            $locations->save();
        }

        if(!empty(Request::get('lat3'))) {
            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat3');
            $locations->lng = Request::input('lng3');
            $locations->save();
        }

        if(!empty(Request::get('lat4'))) {
            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat4');
            $locations->lng = Request::input('lng4');
            $locations->save();
        }

        if(!empty(Request::get('lat5'))) {
            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat5');
            $locations->lng = Request::input('lng5');
            $locations->save();
        }

        return redirect('/create_event')->with('status', 'Мероприятие создано!');
    }

    public function edit_event($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        $event_locations = Event_locations::where('event_id', $event->id)->get();
        return view('admin.create_event', compact('event', 'event_locations'));
    }

    public function update_event($slug)
    {
        if(Input::file('image')!== null)
        {
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $file = array('image' => Input::file('image'));
            $rules = array('image' => 'required');
            $validator = Validator::make($file, $rules);

            if ($validator->fails()) 
            {
                return Redirect::to('create_event')->withInput()->withErrors($validator);
            }

            $destinationPath = public_path('uploads/media/big/' . $fileName);
            $destinationPath2 = public_path('uploads/media/small/' . $fileName);

            $upload = Image::make(Input::file('image'))->fit(802, 580)->save($destinationPath);
            $upload2 = Image::make(Input::file('image'))->fit(305, 221)->save($destinationPath2);
        }

        $event = Event::whereSlug($slug)->firstOrFail();
        
        if(isset($fileName)) { $event->image = $fileName; }
        $event->title = Request::input('title');
        $event->text = Request::input('text');
        $event->time = Request::input('time');
        $event->location = Request::input('location');
        
        $event->save();

        if(Request::get('lat') !== null) {

            $locs = Event_locations::where('event_id', $event->id)->delete();

            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat');
            $locations->lng = Request::input('lng');
            $locations->save();

            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat2');
            $locations->lng = Request::input('lng2');
            $locations->save();

            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat3');
            $locations->lng = Request::input('lng3');
            $locations->save();

            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat4');
            $locations->lng = Request::input('lng4');
            $locations->save();

            $locations = New Event_locations;
            $locations->event_id = $event->id;
            $locations->lat = Request::input('lat5');
            $locations->lng = Request::input('lng5');
            $locations->save();
        }

        return redirect(action('AdminController@update_event', $event->slug))->with('status', 'Мероприятие обновлено!');
    }

    public function destroy_event($slug)
    {
        $event = Event::whereSlug($slug)->firstOrFail();
        $event->delete();
        return redirect('/event')->with('status', 'Мероприятие удалено!');
    }


    public function create_static()
    {
        $main_pages = MainPage::all();

        return view('admin.new_page', compact('main_pages'));
    }

    public function store_static()
    {
        $page = new StaticPage;
        $slug = uniqid();

        $page->title = Request::input('title');
        $page->text = Request::input('text');
        $page->main_page_id = Request::input('page');
        $page->slug = $slug;

        $page->save();

        return redirect('/create_page')->with('status', 'Страница добавлена!');
    }

    public function all_static()
    {
        $main_pages = MainPage::all();
        $static_pages = StaticPage::orderBy('created_at', 'decs');

        if(Request::has('page'))
        {
            $static_pages->where('main_page_id', Request::input('page'));
        }

        $static_pages = $static_pages->get();

        return view('admin.static_page', compact('main_pages', 'static_pages'));
    }

    public function destroy_static($slug)
    {
        $static_page = StaticPage::whereSlug($slug)->first();
        $static_page->delete();
        return redirect()->back()->with('status', 'Страница удалена!');
    }

    public function edit_page($slug)
    {
        $static_page = StaticPage::whereSlug($slug)->first();
        $main_pages = MainPage::all();

        return view('admin.new_page', compact('static_page', 'main_pages'));
    }

    public function update_page($slug)
    {
        $page = StaticPage::whereSlug($slug)->first();

        $page->title = Request::input('title');
        $page->text = Request::input('text');
        $page->main_page_id = Request::input('page');

        $page->save();

        return redirect(action('AdminController@update_page', $page->slug))->with('status', 'Страница обновлена!');
    }

    public function email_string()
    {
        $emails = User::orderBy('created_at')->paginate(22);

        return view('admin.emails', compact('emails'));
    }

    public function destroy_plan($id)
    {
        $plan = Plan::whereId($id)->first();
        $plan->delete();

        return redirect()->back()->with('status', 'Изображение удалено!'); 
    }

    public function destroy_image($id)
    {
        $image = Images::whereId($id)->first();
        $image->delete();

        return redirect()->back()->with('status', 'Изображение удалено!'); 
    }

    public function destroy_offer_image($id)
    {
        $image = Offer_image::whereId($id)->first();
        $image->delete();

        return redirect()->back()->with('status', 'Изображение удалено!'); 
    }

    public function destroy_update($id)
    {
        $update = Update::whereId($id)->first();
        $update->delete();

        return redirect()->back()->with('status', 'Изображение удалено!'); 
    }
}

