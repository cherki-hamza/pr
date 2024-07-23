<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Package;
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

    // method for show the packages page
    public function all_packages(){
        $packages = Package::paginate(10);
        return view('admin.packages.packages' , compact('packages'));
    }

    // method for store new package
    public function store_packages(Request $request){

     //return $request->all();

     $names = $request->input('packageName');
     $prices = $request->input('packagePrice');

     for ($i = 0; $i < count($names); $i++) {
         Package::create([
             'package_offre' => $names[$i],
             'package_price' => $prices[$i]
         ]);
     }

     return back()->with('success', 'Packages saved successfully!');

    }

    // method for update package
    public function update_packages(Request $request)
    {
        $data = Package::find($request->id);
        if ($data) {
            $data->update([
                $request->field => $request->value
            ]);
            return response()->json(['success' => 'Data updated successfully']);
        }

        return response()->json(['error' => 'Data not found'], 404);
    }
}
