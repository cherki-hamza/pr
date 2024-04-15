<?php

namespace App\Providers;

use App\Models\Project;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        //$projects = Project::where('user_id' , auth()->id())->where('status' , 1)->get();
       // if($projects){
            //view::share('projects', $projects);
            View::composer('*', function ($view) {
                $view->with('projects', Project::where('user_id' , auth()->id())->where('status' , 1)->get());
            });

           /*  View::composer('*', function ($view) {
                $view->with('data', 'test hamza');
            }); */
       // }


    }
}
