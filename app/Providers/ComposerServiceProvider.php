<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;
use App\StaticPage;
use App\MainPage;
use Request;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Request::is('/', 'about', 'admin' ))
        {
            view()->composer('includes/last_projects', function ($view) {
                $view->with('projects', Project::take(3)->orderBy('created_at', 'desc')->get());
            });
        }

        view()->composer('layout', function ($view) {
            $view->with('static_pages', StaticPage::orderBy('created_at')->get());
        }); 

        view()->composer('investor_relations', function ($view) {
            $view->with('static_pages', StaticPage::orderBy('created_at')->get());
        });   
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
