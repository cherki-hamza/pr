<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    // method redirect for googls social login
    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }

    // method calback for google socal login
    public function google_callback(){

        try {
            $google_user =  Socialite::driver('google')->user();

            $user  = User::where('google_id', $google_user->getId())->first();

            if(!$user) {
                $new_user = User::create([
                    'google_id' => $google_user->getId(),
                    'name'=> $google_user->getName(),
                    'email'=> $google_user->getEmail(),
                    'password' => Hash::make('123456789'),
                ]);

                $profile = Profile::create([
                    'user_id' => $new_user->id,
                    'email' => $new_user->email,
                    'fullname' => $new_user->name,
                    'mobile' => $new_user->mobile,
                    'picture' => ($google_user->avatar)? $google_user->avatar : $user->GetGravatar(),
                ]);
                Auth::login($new_user);
                return redirect()->route('admin');
            }else{
                Auth::login($user);
                return redirect()->route('admin');
            }


        } catch (\Throwable $th) {
            //dd('Oops went wrong! '. $th->getMessage());
            return redirect()->route('login')->with('toast_success' , 'Oops went wrong! '. $th->getMessage());
        }

    }
}
