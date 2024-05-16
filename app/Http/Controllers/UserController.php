<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $x['title']     = 'User';
        $x['data']      = User::get();
        $x['role']      = Role::get();
        return view('admin.user', $x);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string'],
            'role'      => ['required']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        DB::beginTransaction();
        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password)
            ]);
            $user->assignRole($request->role);
            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $user->name . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>' . $user->name . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function show(Request $request)
    {
        $user = UserResource::collection(User::where(['id' => $request->id])->get());
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data user by id',
            'data'      => $user[0]
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $rules = [
            'name'      => ['required', 'string', 'max:255'],
            'password'  => ['nullable', 'string'],
            'role'      => ['required']
        ];

        if ($request->email != $request->old_email) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
            $validator = Validator::make($request->all(), $rules);
        } else {
            $rules['email'] = ['required', 'string', 'email', 'max:255'];
            $validator = Validator::make($request->all(), $rules);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
        ];
        if (!empty($request->password)) {
            $data['password']   = bcrypt($request->password);
        }

        DB::beginTransaction();
        try {
            $user = User::find($request->id);
            $user->update($data);
            $user->syncRoles($request->role);
            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $user->name . '</b> berhasil disimpan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>' . $user->name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $user->name . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $user->name . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }
        return back();
    }

    // security Page
    public function security(){
        $title = 'security';
        return view("admin.security.index" , compact('title'));
    }

    // method for update password
    public function update_email(Request $request){

        if(!$request->new_email){
            return redirect()->back()->with('error', 'The Email its required');
        }
        //$request->validate(['email' => 'required'],['email'=> 'the email is required']);
         $email = $request->new_email;
         $user = auth()->user();
         //return $user;
         $user->update([
          "email"=> $email,
         ]);

         $profile = Profile::where("user_id", $user->id)->first();
         $profile->update([
            "email"=> $user->email,
         ]);
         return redirect()->back()->with('success', 'Email Updated Successfully!');
    }

    // method for update password
    public function update_mobile(Request $request){

        if(!$request->new_mobile){
            return redirect()->back()->with('error', 'The Phone Number its required');
        }

        $new_mobile = $request->new_mobile;
        $user = auth()->user();
        //return $user;
        $user->update([
         "mobile"=> $new_mobile,
        ]);

        $profile = Profile::where("user_id", $user->id)->first();
        $profile->update([
           "mobile"=> $user->mobile,
        ]);
        return redirect()->back()->with('success', 'Mobile Updated Successfully!');

    }

    // method for update password
    public function update_password(Request $request){

        if(!$request->current_password){
            return redirect()->back()->with('error', 'The Current Password its required');
        }

        if(!$request->new_password){
            return redirect()->back()->with('error', 'The New Password its required');
        }

        if($request->new_password != $request->confirm_password){
            return redirect()->back()->with('error', 'The New Password and the confirm password shold be same');
        }

        /* $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]); */
        $auth = Auth::user();

       // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            return back()->with('error', "Current Password is Invalid");
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}
