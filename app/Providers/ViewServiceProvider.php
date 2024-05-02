<?php

namespace App\Providers;

use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
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
            //view::share('projects', $projects);  // where('user_id' , auth()->id())->
            View::composer('*', function ($view) {
                if(auth()->check()){
                    if( (auth()->user()->role == 'client') ){
                        $view->with('projects', Project::where('user_id',auth()->id())->where('status' , 1)->paginate(12));
                    }else{
                        $view->with('projects', Project::where('status' , 1)->paginate(12));
                    }

                    if(!empty(auth()->user()->payments) /* && auth()->user()->role == 'client' */){
                        $auth_user_payments = Payment::where('user_id', auth()->id())->sum('amount');
                        $task_site_prices = Task::where('user_id' , auth()->id())->sum('task_price');
                        $balance = ((int)$auth_user_payments - $task_site_prices);
                        //dd($task_site_prices);
                        $view->with('balance', $balance);
                    }else{
                        $balance = Payment::sum('amount');
                        $view->with('balance', $balance);
                    }
                }

            });

           /*  View::composer('*', function ($view) {
                $view->with('data', 'test hamza');
            }); */
       // }


    }
}
