<?php

use App\Http\Controllers\Backend\BalanceController;
use App\Http\Controllers\Backend\BillingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Payment\PaypalController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth'])->group(function () {



});
