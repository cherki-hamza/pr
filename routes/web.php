<?php

use App\Http\Controllers\Backend\BalanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\BillingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Payment\PaypalController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/dev', function (Request $request) {


})->name('dev');

Auth::routes([
    /* 'register'  => false,
    'reset'     => false,
    'confirm'   => false */
]);

// google socaial auth
/* Route::get('/auth/google/redirect', [SocialController::class, 'google_redirect'])->name('google_redirect');
Route::get('/auth/google/callback', [SocialController::class, 'google_callback'])->name('google_callback'); */

Route::middleware(['auth'])->get('/home', [DashboardController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->middleware(['permission:read user'])->name('user.index');
        Route::post('user', 'store')->middleware(['permission:create user'])->name('user.store');
        Route::post('user/show', 'show')->middleware(['permission:read user'])->name('user.show');
        Route::put('user', 'update')->middleware(['permission:update user'])->name('user.update');
        Route::delete('user', 'destroy')->middleware(['permission:delete user'])->name('user.destroy');
    });

    // Security routes
    Route::get('/security' , [UserController::class,'security'])->name('security');
    Route::put('/security/update_email' , [UserController::class,'update_email'])->name('update_email');
    Route::put('/security/update_mobile' , [UserController::class,'update_mobile'])->name('update_mobile');
    Route::put('/security/update_password' , [UserController::class,'update_password'])->name('update_password');

    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->middleware(['permission:read role'])->name('role.index');
        Route::post('role', 'store')->middleware(['permission:create role'])->name('role.store');
        Route::post('role/show', 'show')->middleware(['permission:read role'])->name('role.show');
        Route::put('role', 'update')->middleware(['permission:update role'])->name('role.update');
        Route::delete('role', 'destroy')->middleware(['permission:delete role'])->name('role.destroy');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('permission', 'index')->middleware(['permission:read permission'])->name('permission.index');
        Route::post('permission', 'store')->middleware(['permission:create permission'])->name('permission.store');
        Route::post('permission/show', 'show')->middleware(['permission:read permission'])->name('permission.show');
        Route::put('permission', 'update')->middleware(['permission:update permission'])->name('permission.update');
        Route::delete('permission', 'destroy')->middleware(['permission:delete permission'])->name('permission.destroy');
        Route::get('permission/reload', 'reloadPermission')->middleware(['permission:create permission'])->name('permission.reload');
    });

    // route for Projects
    Route::post('projects/update_status' , [ProjectController::class,'update_status'])->name('update_status');
    Route::post('projects/show' , [ProjectController::class,'show_project'])->name('show_project');
    Route::put('update_project' , [ProjectController::class,'update_project'])->name('update_project');
    Route::delete('destroy_project' , [ProjectController::class,'destroy_project'])->name('destroy_project');
    Route::resource('projects' , ProjectController::class);
    Route::get('myprojects/{project_id}' , [SiteController::class,'site_index'])->name('site_index');

    // route for Billings
    Route::resource('billings' , BillingController::class);

    // route for Profile

    // routes for orders
    Route::get('project/{project_id?}/my_orders/not_started' , [OrderController::class,'not_started'])->name('not_started');
    Route::get('project/{project_id?}/my_orders/in_progress' , [OrderController::class,'in_progress'])->name('in_progress');
    Route::get('project/{project_id?}/my_orders/pending_approval' , [OrderController::class,'pending_approval'])->name('pending_approval');
    Route::get('project/{project_id?}/my_orders/improvement' , [OrderController::class,'improvement'])->name('improvement');
    Route::get('project/{project_id?}/my_orders/completed' , [OrderController::class,'completed'])->name('completed');
    Route::get('project/{project_id?}/my_orders/rejected' , [OrderController::class,'rejected'])->name('rejected');
    Route::resource('orders' , OrderController::class);

    // Routes for show the  tasks
    Route::get('project/{project_id?}/task/{task_id?}/show_task' , [OrderController::class,'show_task'])->name('show_task');

    // Route for posts
    // route for create new post by task an project
    Route::get('project/{project_id?}/task/{task_id?}/post/create' , [PostController::class,'index'])->name('create_post');
    // route for store new post and if its in_progress or client_approval
    Route::post('project/{project_id?}/task/{task_id?}/post/store_post' , [PostController::class,'store_post'])->name('store_post');
    // route for update the post
    Route::post('project/{project_id?}/task/{task_id?}/post/{post_id?}/update_post' , [PostController::class,'update_post'])->name('update_post');
    // route for show the client post
    Route::get('project/{project_id?}/task/{task_id?}/show_client_post' , [PostController::class,'show_client_post'])->name('show_client_post');


    Route::post('orders/store_cp/project/{project_id}/site/{site_id}' , [OrderController::class,'store_cp'])->name('store_cp');
    Route::post('orders/store_ccp' , [OrderController::class,'store_ccp'])->name('store_ccp');

    Route::get("order_post_from_publisher/project/{project_id}/site/{site_id}", [OrderController::class,'order_index'])->name('order_index');

    // route for Profile
    Route::resource('profiles' , ProfileController::class);

    Route::resource('billings' , BillingController::class);


    // site publishers routes
    Route::get('publishers',[SiteController::class,'index'])->name('publishers');
    Route::post('/posts/{post}/favorite', 'FavoriteController@addToFavorites')->name('posts.favorite');

    Route::get('/favorite_site/{site_id}',[SiteController::class,'favorite'])->name('favorite');

    Route::get('publishers/{project_id}/favorite_publishers',[SiteController::class,'favorite_publishers'])->name('favorite_publishers');


    // payements Gatways ***********************************************************************

    //Balance page
    Route::get('/balance' , [BalanceController::class , 'balance'])->name('balance');
    Route::get('/add_funds' , [BalanceController::class , 'add_funds'])->name('add_funds');

    // Paypal
    Route::get('/payment' , [PaypalController::class , 'payment'])->name('payment');
    Route::get('/cancel' , [PaypalController::class , 'cancel'])->name('cancel');
    Route::get('/payment/success' , [PaypalController::class , 'success'])->name('success');
});
