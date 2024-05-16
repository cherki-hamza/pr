<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // method for show the contact page
    public function index(){
        return view('contact');
    }

    // method for store the contac page data and send email
    public function store(Request $request){
      $vaildation = $request->validate([
         'name' => 'required',
         'email' => 'required|email',
         'mobile' => 'required',
         'subject' => 'required',
         'message' => 'required',
      ]);

      $phone_code = $request->get('phone_code');

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $phone_code. '' .$request->mobile,
            'subject' => $request->subject,
            'message' => $request->message,
            'country_name' => $request->country_name,
            'area_code' => $request->area_code,
            'country_code' => $request->country_code,
            'country_flag' => $request->country_flag,
         ]);


        /* Mail::send('email', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'comment' => `
              <span class="text-danger"> hello there this is just test message .. </span>
            `
            ],
            function ($message) {
                    $message->from('pr@cherkihamza.com');
                    $message->to('pr@cherkihamza.com', 'Your Name')
                    ->subject('Your Website Contact Form');
                }); */

        if ($vaildation) {
            return redirect()->back()->with('success', 'Your Message send Updated Successfully!');
        } else {
            return redirect()->back()->with('danger', 'Oops Please check the form data All Fields is required');
        }


    }

    // show all contacts messages
    public function contacts(){
        $contacts = Contact::all();
        return view('admin.contact.contact' , compact('contacts'));
    }
}
