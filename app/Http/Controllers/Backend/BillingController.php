<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;
use Pusher\Pusher;

class BillingController extends Controller
{

    public function index()
    {
        $title = 'Billing';
        $user_billing = Billing::where('user_id', auth()->user()->id)->first();

        return view('admin.Billing.index',compact('title','user_billing'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        //return $request->all();

        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
        ]);


       $payement =  Billing::create([
            'user_id' => auth()->user()->id,
            'email'=> auth()->user()->email,
            'name'=> $request->name,
            'company_name'=> $request->company_name,
            'country'=> $request->country,
            'state'=> $request->state,
            'address'=> $request->address,
            'city'=> $request->city,
            'postal_code'=> $request->postal_code,
            'billing_confirmation'=> ($request->billing_confirmation == 'on') ? 1 : '',
            'vat_number'=> $request->vat_number,
            'payment_method'=> $request->payment_method,
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
            'email'=> auth()->user()->email,
            'name'=> $request->name,
            'company_name'=> $request->company_name,
            'country'=> $request->country,
            'state'=> $request->state,
            'address'=> $request->address,
            'city'=> $request->city,
            'postal_code'=> $request->postal_code,
            'billing_confirmation'=> ($request->billing_confirmation == 'on') ? 1 : 0,
            'vat_number'=> $request->vat_number,
       ]);
       return back()->with('success','Billing Informations Updated successfuly');
    }


    public function destroy($id)
    {
        //
    }
}
