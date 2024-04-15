<?php

namespace App\Providers;

use App\Models\Project;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        //
       /*  $projects = Project::where('user_id' , auth()->id())->where('status' , 1)->get();
        if($projects){
            view::share('projects', $projects);
        } */

    }
}
