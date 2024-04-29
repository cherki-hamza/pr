<?php

use App\Http\Controllers\Backend\BalanceController;
use App\Http\Controllers\Backend\BillingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Payment\PaypalController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth'])->group(function () {

    // route for Projects
    Route::post('projects/update_status' , [ProjectController::class,'update_status'])->name('update_status');
    Route::post('projects/show' , [ProjectController::class,'show_project'])->name('show_project');
    Route::put('update_project' , [ProjectController::class,'update_project'])->name('update_project');
    Route::delete('destroy_project' , [ProjectController::class,'destroy_project'])->name('destroy_project');
    Route::resource('projects' , ProjectController::class);


    // route for Profile
    Route::resource('profiles' , ProfileController::class);
    // route for Billings
    Route::resource('billings' , BillingController::class);
    // route for Orders
    Route::resource('orders' , OrderController::class);



    // route for all publisher sites for super admin
    Route::get('all_publishers',[SiteController::class,'all_publishers'])->name('all_publishers');
    Route::post('all_publishers/{search?}',[SiteController::class,'all_publishers'])->name('all_publishers_search');
    // add publisher site
    Route::get('add_publishers',[SiteController::class,'add_publishers'])->name('add_publishers');


     // Table for show projects by user : /admin/user_projects
     Route::get('/user_projects',[ProjectController::class,'user_projects'])->name('user_projects');

     // Show All Project by user : /admin/all_user_projects/2/projects
     Route::get('/all_user_projects/{user_id?}/projects',[ProjectController::class,'all_user_projects'])->name('all_user_projects');



    // super admin routes ***********************************************************************************************************************************************************
    // Get tasks by project for super admin
    Route::get('/tasks/user/{user_id}/project/{project_id}',[TaskController::class,'super_admin_task_by_user_by_project'])->name('super_admin_task_by_user_by_project');
    // open the task and start handel the task from the super admin
    Route::get('super_admin/task/{task_id?}/open_task/user/{user_id?}/project/{project_id?}',[TaskController::class,'super_admin_open_task'])->name('super_admin_open_task');

    Route::post('task/{task_id?}/{post_id}/open_task/user/{user_id?}/project/{project_id?}/task_approve_or_rejected',[TaskController::class,'task_approve_or_rejected'])->name('task_approve_or_rejected');

    // ********************************************************************************************************************************************************************************


});
