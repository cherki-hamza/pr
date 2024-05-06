<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Traits\RemoveImageTrait;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    use StoreImageTrait, RemoveImageTrait;

    public function index()
    {
        $title ='Profile';
        return view('admin.user.profile' , compact('title'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

         // get user profile and update the profile informations
         $user = auth()->user()->id;
         $profile = Profile::findOrFail($id);
        //return public_path('assets\images\profiles');

       // return public_path('/assets/images/profiles');

        if ($request->hasFile('picture')){

            $photo = $request->file('picture');
            $path = public_path('assets/images/profiles');

            if (!is_dir($path)){
                mkdir($path , 0777 , true);
            }

            $file_extension = $photo->extension();


            $file_name = 'profile_'.rand(1,100).'_'.time() . '.' . $file_extension;

            $photo->move($path,$file_name);



            $profile->update([
                'picture'=> '/assets/images/profiles/'.$file_name,
           ]);

        }






      /*   $request->validate([
            'fullname'=> $request->fullname,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'company_name'=> $request->company_name,
            'company_website'=> $request->company_website,
        ]);
 */
        $profile->update([
            'fullname'=> $request->fullname,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'company_name'=> $request->company_name,
            'company_website'=> $request->company_website,
        ]);


        //toastr()->addSuccess('Profile Updated with success.');

        return back()->with('success','Profile Informations Updated with success');


    }


    public function destroy($id)
    {
        //
    }
}
