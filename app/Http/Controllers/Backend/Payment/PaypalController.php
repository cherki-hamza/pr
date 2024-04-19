<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;

class PaypalController extends Controller
{
    // payment method
    public function payment(){
      $data = [];
      $data = [
        'id'=> auth()->id(),
        'name'=> auth()->user()->name,
        'name'=> auth()->user()->email,
        'amount' => 10,
        'amount_id' => auth()->id(),
      ];
      $data['return_url'] = '/payment/success';
      $data['cancel_url'] = '/cancel';
      $data['total'] = 10;

      $provider = new ExpressCheckout;

      $response = $provider->setExpressCheckout($data);

      $response = $provider->setExpressCheckout($data, true);

      return redirect($response['paypal_link']);

    }

     // payment method
     public function cancel(){
       return response()->json('Payement Cancel');
     }

    // payment method
    public function success(){

        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully.');
        }


        return redirect()->back()->with('success' , 'payemen do with success');

    }

}
