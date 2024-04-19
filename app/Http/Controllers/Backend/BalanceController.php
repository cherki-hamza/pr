<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    // method for add balance
    public function balance(){
        $title = 'Balance';
       return view('admin.balance.balance',compact('title'));
    }

     // method for add balance
     public function add_funds(){
        $title = 'Balance';
       return view('admin.balance.add_funds',compact('title')   );
     }

      // method for add balance
    public function dev(){

    }
}
