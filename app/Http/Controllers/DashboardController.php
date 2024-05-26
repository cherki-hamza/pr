<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{

    // method for show the dashboard
    public function index(Request $request){
        $x['title']         = 'Dashboard';
        $x['user']          = User::get();
        $x['role']          = Role::get();
        $x['permission']    = Permission::get();
        return view('admin.dashboard', $x);
    }


    // method for update paypal api settings
    public function update_paypal(Request $request){

        $PAYPAL_CLIENT_ID = $request->PAYPAL_CLIENT_ID;
        $PAYPAL_CLIENT_SECRET = $request->PAYPAL_CLIENT_SECRET;
        $PAYPAL_CURRENCY = $request->PAYPAL_CURRENCY;

        Setting::where('key' , 'PAYPAL_SANDBOX_CLIENT_ID')->first()->update([
            'value' => $PAYPAL_CLIENT_ID
        ]);

        Setting::where('key' , 'PAYPAL_SANDBOX_CLIENT_SECRET')->first()->update([
            'value' => $PAYPAL_CLIENT_SECRET
        ]);

        Setting::where('key' , 'PAYPAL_CURRENCY')->first()->update([
            'value' => $PAYPAL_CURRENCY
        ]);

        return redirect()->back()->with('success','Paypal Settings Api Updated with success');
    }

    // method for update site logo settings
    public function update_site_logo(Request $request){

      //return $request->logo;

       if($request->logo){

           $photo = $request->file('logo');

           $path = public_path('assets/images/logo');

           if(!is_dir($path)){
               mkdir($path , 0777 , true);
           }

           $file_extension = $photo->extension();


           $file_name = 'pr_logo_'.rand(1,100).'_'.time() . '.' . $file_extension;

           return $file_name;

           $photo->move($path,$file_name);


          Setting::where('key' , 'logo')->first()->update([

               'value' => '/assets/images/logo/'.$file_name,

          ]);

       }

       return back()->with('success','Logo Updated successfoly');


    }
}
