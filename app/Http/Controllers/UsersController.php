<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\User;

use Auth;

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

    public function login(Request $request)
    {
    	$email = Request::input('email');
    	$password = Request::input('password');

    	if (Auth::attempt(['email' => $email, 'password' => $password ], true))
    	{
    		return 'hi';
    	}else
    		{
                return 'fuck';
            }
    }
}
