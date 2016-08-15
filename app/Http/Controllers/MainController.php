<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use App\Project;
use App\Press_release;
use App\Novelty;
use App\Category;
use App\Location;
use App\Country;
use App\MainPage;
use App\StaticPage;
use App\Images;
use App\Plan;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
	{
		$projects = Project::take(4)->orderBy('created_at')->get();
		$countries = Country::all();
                $posts = Project::all();

        return view('index', compact('projects', 'countries', 'posts'));
	}

	public function show_page($slug)
	{
		$static_pages =StaticPage::all();
		$static_page = StaticPage::whereSlug($slug)->firstOrFail();
		$main_pages = MainPage::all();

		return view('static_page', compact('static_page', 'static_pages', 'main_pages'));
	}

	public function about()
	{
        $static_pages = StaticPage::all();
        return view('about', compact('static_pages '));
	}

        public function team()
	{
	$static_pages = StaticPage::all();
        return view('team', compact('static_pages'));
	}

        public function message()
	{
	$static_pages = StaticPage::all();
        return view('message', compact('static_pages'));
	}

	public function offers()
	{
		$projects = Project::orderBy('created_at', 'desc')->paginate(6);

        return view('offers', compact('projects'));
	}

	public function projects()
	{
		$projects = Project::orderBy('created_at', 'desc');
		$locations = Location::all();
		$images = Images::all();

		if (Request::has('status'))
		{
			$projects->where('category_id', Request::get('status'));
		}

		$projects = $projects->paginate(4);

        return view('projects', compact('projects', 'locations', 'images'));
	}

	public function releases_and_news()
	{
		$releases = Press_release::take(3)->orderBy('created_at', 'desc')->get();
		$novelties = Novelty::take(2)->orderBy('created_at', 'desc')->get();

		return view('media_center', compact('releases'), compact('novelties'));
	}

	public function releases()
	{
		$releases = Press_release::orderBy('created_at')->paginate(6);

		return view('media_center', compact('releases'));
	}

	public function show_release($slug)
	{
    	$release = Press_release::whereSlug($slug)->first();

	    return view('media_center', compact('release'));
	}

	public function show_new($slug)
	{
    	$novelty = Novelty::whereSlug($slug)->first();

	    return view('media_center', compact('novelty'));
	}

	public function news()
	{
		$novelties = Novelty::orderBy('created_at')->paginate(6);

		return view('media_center', compact('novelties'));
	}

	public function show($slug)
	{
    	$project = Project::whereSlug($slug)->first();
    	$categories = Category::all();
    	$locations = Location::all();
    	$images = Images::all();
    	$plans = Plan::all();

    	//$image= explode("|", $project->image);
    	//$floor_plans= explode("|", $project->floor_plans);

	    return view('view', compact('project', 'categories', 'locations', 'images', 'plans'));
	}

	public function simple_search()
	{
		$projects = Project::where('title', 'like', '%'.Request::get('search').'%')->paginate(6);
		
		return view('offers', compact('projects'));
	}

	public function search()
	{
		$projects = Project::orderBy('created_at');
		$countries = Country::all();

		if (Request::has('status'))
		{
			$projects->where('category_id', Request::get('status'));
		}
		if (Request::has('country'))
		{
			$projects->where('country_id', Request::get('country'));
		}
		$projects = $projects->paginate(6);
		$projects->appends(Request::except('page'));
        return view('offers', compact('projects', 'countries'));
	}

	public function complex_search()
	{
		$projects = Project::where('title', 'like', '%'.Request::get('search').'%');
		$locations = Location::all();
		
		if (Request::has('status'))
		{
			$projects->where('category_id', Request::get('status'));
		}
		if (Request::has('city'))
		{
			$projects->where('location_id', Request::get('city'));
		}
		$projects = $projects->paginate(6);
		$projects->appends(Request::except('page'));
        return view('projects', compact('projects', 'locations'));
	}

        public function email() 
	{
	 	Mail::send('includes/email', ['user' => 'Check'], function($message) {
	 		$message->to('one_day1@mail.ru')->subject('Welcome');
	 	});
	}
}