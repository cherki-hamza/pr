<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\BillingController;
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

    // Securite routes
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

    // route for Billings
    Route::resource('billings' , BillingController::class);

    // route for Profile
    Route::resource('profiles' , ProfileController::class);


    // site publishers routes
    Route::get('publishers',[SiteController::class,'index'])->name('publishers');
    Route::get('publishers/favorite/{site_id}',[SiteController::class,'favorite'])->name('favorite');
    Route::get('publishers/favorite_publishers',[SiteController::class,'favorite_publishers'])->name('favorite_publishers');

});
