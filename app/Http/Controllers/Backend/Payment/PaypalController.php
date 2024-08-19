<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Mail\PaymentToClientEmail;
use App\Mail\PaymentToSuperAdminEmail;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;
use Pusher\Pusher;

class PaypalController extends Controller
{

    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        /* $this->gateway->setClientId('AYOAujB6O-Td2iGjliGFxuxj951R7EBfKRRk52NJPNULERc5iTvOSPlreYtpYYQxxPrJjFFgTEivk2Gu');
        $this->gateway->setSecret('EAgHyN4AUdAUWyLc9nk2DZEqKyDx-XhpG4YsROJ7ONDc_qClHmTQ7FhFp2lujx6wOPf5a9eRRfRLFy90'); */
        $this->gateway->setClientId(env('PAYPAL_SANDBOX_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SANDBOX_CLIENT_SECRET'));
        $this->gateway->setTestMode(env('PAYPAL_TEST_MODE'));
    }


    public function pay(Request $request)
    {

        //return $this->gateway;

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
                return 'hpac error: '.$response->getMessage();
            }

        } catch (\Throwable $th) {
            return 'hpac error: '.$th->getMessage();
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

                $payment = Payment::create([
                    'user_id' => auth()->id(),
                    'payment_id' => $arr['id'],
                    'payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => env('PAYPAL_CURRENCY'),
                    'payment_status' => $arr['state'],
                    'payment_platform' => 'paypal',

                ]);

                // create the payment notification
               $payment_notification =  Notification::create([
                    'user_id'    => auth()->user()->id,
                    'payment_id'    => $payment->id,
                ]);

                 // send push notification from client to super-admin
                $options = array(
                    'cluster' => 'ap2',
                    'encrypted' => true
                );
                $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    $options
                );

                $data['message'] = 'success';
                 $data['payment_notification'] = $payment_notification;
                $data['data'] = $payment;




                $pusher->trigger('payement_chanel', 'App\Events\PaymentNotification', [
                    'message' => 'succes',
                    'username' => $payment->user->name,
                    'user_image' => $payment->user->GetPicture(),
                    'amount' => $payment->amount,
                    'message' => "Make Payment with amount: $".$payment->amount,
                    'time' =>  $payment->created_at->diffForHumans(), // $payment->created_at->format('m/d/Y H:i') . ' - ' .
                    'url' => route('balance', ['id' => $payment->user->id]), // Adjust based on your routes
                ]);


                // send email to client with the payment value
                Mail::to($payment->user->email)->send(new PaymentToClientEmail($payment));

                // also send email to pr  super admin team with payment value
                $users = User::where('role','super-admin')->get();
                foreach($users as $user){
                   Mail::to($user->email)->send(new PaymentToSuperAdminEmail($payment));
                }


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
