<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;
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
        if (Request::is('/', 'about'))
        {
            view()->composer('includes/last_projects', function ($view) {
                $view->with('projects', Project::take(3)->orderBy('created_at', 'desc')->get());
            });
        }

        // view()->composer('includes/last_projects', function ($view) {
        //     $projects = Project::orderBy('created_at');

        //     if (Request::is('/', 'about'))
        //     {
        //         $projects->take(3);
        //         $view->with('projects', $projects->get());
        //     }
        // });
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
