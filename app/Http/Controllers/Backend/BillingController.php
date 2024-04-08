<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{

    public function index()
    {
        $title = 'Billing';
        $user_billing_count = Billing::where('user_id', auth()->user()->id)->get();
        $user_billing = Billing::where('user_id', auth()->user()->id)->first();

        return view('admin.Billing.index',compact('title','user_billing','user_billing_count'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Billing::create([
            'user_id' => auth()->user()->id,
            'name'=> $request->name,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'address'=> $request->address,
        ]);


        return back()->with('success','Billing Informations Inserted successfuly');
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
       $billing =  Billing::where('id', $id)->first();
       $billing->update([
        'user_id' => auth()->user()->id,
        'name'=> $request->name,
        'email'=> $request->email,
        'mobile'=> $request->mobile,
        'address'=> $request->address,
       ]);
       return back()->with('success','Billing Informations Updated successfuly');
    }


    public function destroy($id)
    {
        //
    }
}
