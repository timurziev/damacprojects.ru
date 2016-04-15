<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    public function store(Request $request)
    {
    	$user = new User(array(
    			'name' => $request->get('name'),
    			'email' => $request->get('email'),
    		));

    	$user->save();

    	return view('events')->with('status', 'Вы подписаны!');
    }
}
