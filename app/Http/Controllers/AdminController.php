<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Press_release;
use App\Novelty;
use App\MainPage;
use App\StaticPage;
use App\Images;
use App\Plan;
use App\Http\Requests\ProjectsFromRequest;
use App\Location;
use App\Country;
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
    public function projects()
    {
        $projects = Project::orderBy('created_at', 'desc');
        $projects = $projects->paginate(12);

        return view('admin/projects', compact('projects'));
    }

    public function create()
	{
		$locations = Location::all();
        $countries = Country::all();
    	return view('admin.create', compact('locations', 'countries'));
	}

    public function create_city()
    {
        $locations = Location::orderBy('created_at', 'desc');
        $locations = $locations->paginate(12);

        return view('admin.create_city', compact('locations', 'releases'));
    }

    public function store_city()
    {
        $location = New Location;

        $slug = uniqid();
        $location->name = Request::input('city');
        $location->slug = $slug;

        $location->save();

        return redirect('/create_city')->with('status', 'Город добавлен!');
    }

    public function destroy_city($slug)
    {
        $location = Location::whereSlug($slug)->firstOrFail();
        $location->delete();
        return redirect('/create_city')->with('status', 'Город удален!');
    }

    public function edit($slug)
    {
        $locations = Location::all();
        $countries = Country::all();
        $project = Project::whereSlug($slug)->firstOrFail();
        $plans = Plan::all();
        $images = Images::all();

        return view('admin.edit', compact('project', 'locations', 'plans', 'images', 'countries'));
    }

    public function update($slug, ProjectsFromRequest $request)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->text = $request->get('text');
        $project->location_id = $request->get('city');
        $project->country_id = $request->get('country');
        $project->category_id = $request->get('status');
        $project->media = $request->get('media');
        $project->facilities = $request->get('facilities');
        $project->community_info = $request->get('community_info');
        $project->update = $request->get('update');
        $project->view_pdf = $request->get('view_pdf');
        $project->download_pdf = $request->get('download_pdf');
        $project->is_slide = $request->get('is_slide');

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

        return redirect(action('AdminController@update', $project->slug))->with('status', 'Проект обновлен!');

    }

    public function destroy($slug)
    {
        $project = Project::whereSlug($slug)->firstOrFail();
        $project->delete();
        return redirect('/admin')->with('status', 'Проект удален!');
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
        $project->location_id = $request->get('city');
        $project->country_id = $request->get('country');
        $project->category_id = $request->get('status');
        $project->media = $request->get('media');
        $project->facilities = $request->get('facilities');
        $project->community_info = $request->get('community_info');
        $project->update = $request->get('update');
        $project->view_pdf = $request->get('view_pdf');
        $project->download_pdf = $request->get('download_pdf');
        $project->is_slide = $request->get('is_slide');

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

	    return redirect('/create')->with('status', 'Проект создан!');
	}

	public function uploadFiles() 
	{
        $input = Input::file('file');

        $extension = $input->getClientOriginalExtension();
        
        $fileName = rand(11111, 99999) . '.' . $extension;

        $destinationPath = public_path('uploads/projects/large/' . $fileName);
        $destinationPath2 = public_path('uploads/projects/big/' . $fileName);
        $destinationPath3 = public_path('uploads/projects/small/' . $fileName);

        $upload = Image::make($input)->fit(1750, 967)->save($destinationPath);
        $upload2 = Image::make($input)->fit(802, 580)->save($destinationPath2);
        $upload3 = Image::make($input)->fit(401, 580)->save($destinationPath3);
        
 
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

        $upload = Image::make($input)->resize(622, 623)->save($destinationPath);

 
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
}

