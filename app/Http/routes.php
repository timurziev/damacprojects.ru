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
    Route::get('pages/{slug}', 'MainController@show_page');
    Route::get('/about', 'MainController@about');
    Route::get('/events', 'MainController@events');
    Route::post('/events', 'MainController@event_email');
    Route::get('/event/{slug}', 'MainController@show_event');
    Route::get('/investor_relations', function () { return view('investor_relations'); });
    Route::get('/contacts', function () { return view('contacts'); });
    Route::get('/message', 'MainController@message');
    Route::get('/offers', 'MainController@offers');
    Route::get('/offer/{slug}', 'MainController@show_offer');
    Route::get('/projects', 'MainController@projects');

    Route::group(['prefix' => 'media_center'], function() {
        Route::get('/', 'MainController@releases_and_news');
        Route::get('photo_gallery', 'MainController@img_gallery');
        Route::get('photo_gallery/{slug}', 'MainController@show_img');
        Route::get('video_gallery', 'MainController@video_gallery');
    });
    
    Route::get('/press_releases', 'MainController@releases');
    Route::get('/release/{slug}', 'MainController@show_release');
    Route::get('/news', 'MainController@news');
    Route::get('/ajax-call', function(){
        $coun_id = Input::get('coun_id');
        $city = \App\City::where('country_id', '=', $coun_id )->get();
        return response()->json($city);
    });
    Route::get('/ajax-get', function(){
        $region_id = Input::get('region_id');
        $region = \App\Region::where('city_id', '=', $region_id )->get();
        return response()->json($region);
    });
    
    Route::get('/new/{slug}', 'MainController@show_new');
    Route::get('/all_projects', 'MainController@projects');
    Route::get('/in_progress_projects', 'MainController@projects');
    Route::get('/completed_projects', 'MainController@projects');
    Route::get('/project/{slug}', 'MainController@show');
    Route::get('/search_pro', 'MainController@search');
    Route::get('/search', 'MainController@simple_search');
    Route::get('/comp_search', 'MainController@complex_search');
    Route::get('/team', 'MainController@team');
    Route::post('/send', 'MainController@email');
    

//  Admin panel
    Route::get('/create', ['uses' => 'AdminController@create', 'middleware' => 'auth']);
    Route::get('/create_offer', ['uses' => 'AdminController@create_offer', 'middleware' => 'auth']);
    Route::post('/create', ['uses' => 'AdminController@store', 'middleware' => 'auth']);
    Route::post('/create_offer', ['uses' => 'AdminController@store_offer', 'middleware' => 'auth']);
    Route::get('/create_city', ['uses' => 'AdminController@create_city', 'middleware' => 'auth']);
    Route::post('/create_city', ['uses' => 'AdminController@store_city', 'middleware' => 'auth']);
    Route::post('/create_city/{slug}',['uses' => 'AdminController@destroy_city', 'middleware' => 'auth']);
    Route::post('upload', ['uses' => 'AdminController@uploadFiles', 'middleware' => 'auth']);
    Route::post('upload_plans', ['uses' => 'AdminController@uploadPlans', 'middleware' => 'auth']);
    Route::get('/admin', ['uses' => 'AdminController@projects', 'middleware' => 'auth']);
    Route::get('/ad_offers', ['uses' => 'AdminController@offers', 'middleware' => 'auth']);
    Route::get('/edit/{slug}', ['uses' => 'AdminController@edit', 'middleware' => 'auth']);
    Route::get('/edit_offer/{slug}', ['uses' => 'AdminController@edit_offer', 'middleware' => 'auth']);
    Route::post('/edit/{slug}',['uses' => 'AdminController@update', 'middleware' => 'auth']);
    Route::post('/edit_offer/{slug}', ['uses' => 'AdminController@update_offer', 'middleware' => 'auth']);
    Route::post('/admin/{slug}',['uses' => 'AdminController@destroy', 'middleware' => 'auth']);
    Route::post('/ad_offers/{slug}',['uses' => 'AdminController@destroy_offer', 'middleware' => 'auth']);

    Route::get('/create_rel', function () { return view('admin/create_rel_new'); });
    Route::post('/create_rel', ['uses' => 'AdminController@store_rel', 'middleware' => 'auth']);
    Route::get('/press_rel', ['uses' => 'AdminController@releases', 'middleware' => 'auth']);
    Route::get('/edit_rel/{slug}', ['uses' => 'AdminController@edit_rel', 'middleware' => 'auth']); 
    Route::post('/edit_rel/{slug}',['uses' => 'AdminController@update_rel', 'middleware' => 'auth']);
    Route::post('/press_rel/{slug}',['uses' => 'AdminController@destroy_rel', 'middleware' => 'auth']);
    
    Route::get('/create_novel', function () { return view('admin/create_rel_new'); });
    Route::post('/create_novel', ['uses' => 'AdminController@store_new', 'middleware' => 'auth']);
    Route::get('/novel', ['uses' => 'AdminController@news', 'middleware' => 'auth']);
    Route::get('/edit_new/{slug}', ['uses' => 'AdminController@edit_new', 'middleware' => 'auth']);
    Route::post('/edit_new/{slug}',['uses' => 'AdminController@update_new', 'middleware' => 'auth']);
    Route::post('/novel/{slug}',['uses' => 'AdminController@destroy_new', 'middleware' => 'auth']);

    Route::get('/create_event', function () { return view('admin/create_event'); });
    Route::post('/create_event', ['uses' => 'AdminController@store_event', 'middleware' => 'auth']);
    Route::get('/event', ['uses' => 'AdminController@event', 'middleware' => 'auth']);
    Route::get('/edit_event/{slug}', ['uses' => 'AdminController@edit_event', 'middleware' => 'auth']);
    Route::post('/edit_event/{slug}',['uses' => 'AdminController@update_event', 'middleware' => 'auth']);
    Route::post('/event/{slug}',['uses' => 'AdminController@destroy_event', 'middleware' => 'auth']);

    Route::get('/create_page', ['uses' => 'AdminController@create_static', 'middleware' => 'auth']);
    Route::post('/create_page', ['uses' => 'AdminController@store_static', 'middleware' => 'auth']);
    Route::get('/about_dam', ['uses' => 'AdminController@all_static', 'middleware' => 'auth']);
    Route::get('/dam_proj', ['uses' => 'AdminController@all_static', 'middleware' => 'auth']);
    Route::get('/offers_dam', ['uses' => 'AdminController@all_static', 'middleware' => 'auth']);
    Route::get('/investor', ['uses' => 'AdminController@all_static', 'middleware' => 'auth']);
    Route::get('/edit_page/{slug}', ['uses' => 'AdminController@edit_page', 'middleware' => 'auth']);
    Route::post('/edit_page/{slug}', ['uses' => 'AdminController@update_page', 'middleware' => 'auth']);
    Route::post('/del/{slug}', ['uses' => 'AdminController@destroy_static', 'middleware' => 'auth']);
    Route::get('/change_log', ['uses' => 'UsersController@change_view', 'middleware' => 'auth']);
    Route::post('/change_log', ['uses' => 'UsersController@change_log', 'middleware' => 'auth']);
    Route::get('/emails', ['uses' => 'AdminController@email_string', 'middleware' => 'auth']);
    Route::post('/email', ['uses' => 'MainController@email', 'middleware' => 'auth']);
    Route::post('/destroy_plan/{slug}',['uses' => 'AdminController@destroy_plan', 'middleware' => 'auth']);
    Route::post('/destroy_image/{slug}',['uses' => 'AdminController@destroy_image', 'middleware' => 'auth']);
    Route::post('/destroy_offer_image/{slug}',['uses' => 'AdminController@destroy_offer_image', 'middleware' => 'auth']);

    Route::auth();
});




