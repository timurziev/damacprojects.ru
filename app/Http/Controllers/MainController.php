<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Project;
use App\Category;

class MainController extends Controller
{
    public function index()
	{
		$projects = Project::take(4)->orderBy('created_at')->get();
        return view('index', compact('projects', 'projects'));
	}

	public function about()
	{
        return view('about', compact('projects'));
	}

	public function offers()
	{
		$projects = Project::orderBy('created_at', 'desc')->paginate(6);
        return view('offers', compact('projects'));
	}

	public function projects()
	{
		$projects = Project::orderBy('created_at', 'desc')->paginate(4);
        return view('projects', compact('projects'));
	}

	public function search()
	{
		$search = Request::get('search');
		$result = Project::where('title','like','%'.$search.'%')
        ->orderBy('title')
        ->paginate(20);

        return view('index', compact('result'));
	}
}
