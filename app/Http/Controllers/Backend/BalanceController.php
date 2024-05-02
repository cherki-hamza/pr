<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class BalanceController extends Controller
{
    // method for add balance
    public function balance(){
        $title = 'Balance';
        $transactions = Payment::paginate(10);

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
