<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\User;

use Auth;


use App\Http\Requests\UserFormRequest;



class UsersController extends Controller
{
    public function store(Request $request)
    {
    	$user = new User(array(
    			'name' => Request::input('name'),
    			'email' => Request::input('email'),
    		));

    	$user->save();

    	return redirect('events')->with('status', 'Вы подписались на рассылку!');
    }


    public function change_view()
    {
        return view('admin.change_log_pass');
    }

    public function change_log(UserFormRequest $request)
    {
        $user = User::first();
        $password = \Hash::make(Request::input('password'));

        $user->email = Request::input('email');
        $user->password = $password;

        $user->save();

        return redirect()->back()->with('status', 'Данные изменены!');
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
                return 'no';
            }

    }
}
