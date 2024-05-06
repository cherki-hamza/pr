<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaypalController extends Controller
{

    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_SANDBOX_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SANDBOX_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }


    public function pay(Request $request)
    {

        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => route('success'),
                'cancelUrl' => route('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {

        $p = $request->get('payment_platform');

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                //return $arr;

                $payment = new Payment();
                $payment->user_id = auth()->id();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->payment_platform = 'paypal';

                $payment->save();

                // return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];
                return redirect()->route('admin')->with('success', "Payment is Successfull. Your Transaction Id is : " . $arr['id']);

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return redirect()->back()->with('danger', "Payment declined!!");
            // return 'Payment declined!!';
        }
    }

    public function error()
    {
        return redirect()->back()->with('danger', "User declined the payment!");
       // return 'User declined the payment!';
    }




}
