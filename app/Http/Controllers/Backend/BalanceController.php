<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Payment;

class BalanceController extends Controller
{
    // method for add balance
    public function balance(Request $request){
        $title = 'Balance';
        if(auth()->user()->role == 'client'){
            $transactions = Payment::where('user_id',auth()->id())->paginate(10);
        }else{

            $notification = Notification::where('id',$request->id)->first();
            if(!empty($notification)){
                $notification->update(['is_read' => 1]);
            }

            $transactions = Payment::orderBy('id','DESC')->paginate(10);

        }


       return view('admin.balance.balance',compact('title','transactions'));
    }

     // method for add balance
     public function add_funds(){
        $title = 'Balance';
        $payments  = Payment::where('user_id',auth()->id())->paginate(10);
       return view('admin.balance.add_funds',compact('title','payments'));
     }

      // method for add balance
    public function dev(){

    }
}
