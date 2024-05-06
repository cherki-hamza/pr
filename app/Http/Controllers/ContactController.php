<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // method for show the contact page
    public function index(){
        return view('contact');
    }

    // method for store the contac page data and send email
    public function store(Request $request){
      $vaildation = $request->validate([
         'name' => 'required|string',
         'email' => 'required|email',
         'mobile' => 'required',
         'subject' => 'required|string',
         'message' => 'required',
      ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'message' => $request->message,
         ]);

        if ($vaildation) {
            return redirect()->back()->with('success', 'Your Message send Updated Successfully!');
        } else {
            return redirect()->back()->with('danger', 'Oops Please check the form data All Fields is required');
        }

        
    }
}
