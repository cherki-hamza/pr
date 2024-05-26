<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // index settinges page for users settings
    public function settings(){
        $user_billing = Billing::where('user_id', auth()->user()->id)->first();
        return view('admin.settings.settings' , compact('user_billing'));
    }


    // index settinges page for application settings
    public function application_settings(){
        $app_settings = [];
        return view('admin.settings.application_settings' , compact('app_settings'));
    }
}
