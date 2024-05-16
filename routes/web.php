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
use App\Http\Controllers\Backend\TaskController;
use App\Models\Site;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;
use SheetDB\SheetDB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

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
    $sites = Site::all();
    return view('site' , compact('sites'));
})->name('index');

Route::get('publishers/publisher_data' , [SiteController::class , 'publisher_data'])->name('publisher_data');

Route::get('/dev', function (Request $request) {

    /* $sheetdb = new SheetDB('btvs8e6ku3z5m');

    $data = @json_decode(json_encode($sheetdb->get()), true);


    $sites = collect($data);

    //return $sites[0]['site_name'];

    foreach($sites as $site){
        Site::create([
            'user_id'   => 1,
            'site_name' => $site['site_name'],
            'site_url' => $site['site_url'],
            'site_category' => $site['site_category'],
            'site_price' => $site['site_price'],
            'site_region_location' => $site['site_region_location'],

            'site_domain_authority' => $site['site_domain_authority'],
            'site_domain_rating' => $site['site_domain_rating'],
            'site_sposored' => $site['site_sposored'],
            'site_indexed' => $site['site_indexed'],

            'site_dofollow' => $site['site_dofollow'],
            'site_images' => $site['site_images'],
            'site_time' => $site['site_time'],
        ]);
    } */

    return 'success';

})->name('dev');

Auth::routes([
    /* 'register'  => false,
    'reset'     => false,
    'confirm'   => false */
]);


// Route::middleware(['auth'])->get('/admin', [DashboardController::class, 'index'])->name('admin');

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

    // role routes
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->middleware(['permission:read role'])->name('role.index');
        Route::post('role', 'store')->middleware(['permission:create role'])->name('role.store');
        Route::post('role/show', 'show')->middleware(['permission:read role'])->name('role.show');
        Route::put('role', 'update')->middleware(['permission:update role'])->name('role.update');
        Route::delete('role', 'destroy')->middleware(['permission:delete role'])->name('role.destroy');
    });

    // permission routes
    Route::controller(PermissionController::class)->group(function () {
        Route::get('permission', 'index')->middleware(['permission:read permission'])->name('permission.index');
        Route::post('permission', 'store')->middleware(['permission:create permission'])->name('permission.store');
        Route::post('permission/show', 'show')->middleware(['permission:read permission'])->name('permission.show');
        Route::put('permission', 'update')->middleware(['permission:update permission'])->name('permission.update');
        Route::delete('permission', 'destroy')->middleware(['permission:delete permission'])->name('permission.destroy');
        Route::get('permission/reload', 'reloadPermission')->middleware(['permission:create permission'])->name('permission.reload');
    });



   // payements Gatways ***********************************************************************

    //Balance page
    Route::get('/balance' , [BalanceController::class , 'balance'])->name('balance');
    Route::get('/add_funds' , [BalanceController::class , 'add_funds'])->name('add_funds');

    Route::post('pay', [PaypalController::class, 'pay'])->name('paypal_pay');
    Route::get('success/{paymentId}/{PayerID}', [PaypalController::class, 'success'])->name('success');
    Route::get('error', [PaypalController::class, 'error'])->name('error');

    // Paypal
    Route::post('/payment' , [PaypalController::class , 'payment'])->name('payment');
    Route::get('/cancel' , [PaypalController::class , 'cancel'])->name('cancel');
    Route::get('/payment/success' , [PaypalController::class , 'success'])->name('success');

    // payements Gatways *************************************************************************

    // route for Profile

    // routes for tasks
    Route::get('project/{project_id?}/my_orders/not_started' , [TaskController::class,'not_started'])->name('not_started');
    Route::get('project/{project_id?}/my_orders/in_progress' , [TaskController::class,'in_progress'])->name('in_progress');
    Route::get('project/{project_id?}/my_orders/pending_approval' , [TaskController::class,'pending_approval'])->name('pending_approval');
    Route::get('project/{project_id?}/my_orders/improvement' , [TaskController::class,'improvement'])->name('improvement');
    Route::get('project/{project_id?}/my_orders/completed' , [TaskController::class,'completed'])->name('completed');
    Route::get('project/{project_id?}/my_orders/rejected' , [TaskController::class,'rejected'])->name('rejected');


    // Routes for show the  tasks
    Route::get('project/{project_id?}/task/{task_id?}/show_task' , [OrderController::class,'show_task'])->name('show_task');

    // Route for posts
    // route for create new post by task an project
    Route::get('project/{project_id?}/task/{task_id?}/post/create' , [PostController::class,'index'])->name('create_post');
    // route for store new post and if its in_progress or client_approval
    Route::post('project/{project_id?}/task/{task_id?}/post/store_post' , [PostController::class,'store_post'])->name('store_post');
    // route for update the post
    Route::post('project/{project_id?}/task/{task_id?}/post/{post_id?}/update_post' , [PostController::class,'update_post'])->name('update_post');



    // route for all publisher sites for super admin
    Route::get('all_publishers',[SiteController::class,'all_publishers'])->name('all_publishers');

    // add publisher site
    Route::get('add_publishers',[SiteController::class,'add_publishers'])->name('add_publishers');
    Route::post('store_publishers',[SiteController::class,'store_publishers'])->name('store_publishers');
    Route::get('edit_publishers/{site_id}/edit',[SiteController::class,'edit_publishers'])->name('edit_publishers');
    Route::put('update_publishers/{site_id}/update',[SiteController::class,'update_publishers'])->name('update_publishers');

    // site publishers routes
    //Route::get('publishers',[SiteController::class,'index'])->name('publishers');
    // add to favorite
    Route::get('/favorite_site/{site_id}',[SiteController::class,'favorite'])->name('favorite');
    // show all favorite publishers by user
    Route::get('publishers/{project_id}/favorite_publishers',[SiteController::class,'favorite_publishers'])->name('favorite_publishers');






});
