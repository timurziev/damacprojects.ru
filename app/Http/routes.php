<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'MainController@index');
    Route::get('/about', 'MainController@about');
    Route::get('/events', function () { return view('events'); });
    Route::post('/events', 'UsersController@store');
    Route::get('/investor_relations', function () { return view('investor_relations'); });
    Route::get('/media_center', function () { return view('media_center'); });
    Route::get('/message', function () { return view('message'); });
    Route::get('/offers', 'MainController@offers');
    Route::get('/projects', 'MainController@projects');
    Route::get('/search_pro', 'MainController@search');
    Route::get('/search', 'MainController@simple_search');
    Route::get('/team', function () { return view('team'); });
    Route::get('/logged', 'UsersController@login');
    Route::auth();
});

// Route::group(['middleware' => ['auth']], function () {
//     Route::auth();
// });



