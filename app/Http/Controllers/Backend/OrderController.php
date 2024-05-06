<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Site;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class OrderController extends Controller
{

    // order_index
    public function order_index(Request $request,$project_id,$site_id)
    {

        // get the price of order
        $site = Site::where('id',$request->site_id)->first();
        $title = 'Orders';
        $price  = $site->site_price;
        $site_url = $site->site_url;
        $site_time = $site->site_time;

        $createdAt = Carbon::parse($site->created_at);
        $date = $createdAt->format('M d Y');
        $from = $createdAt->addWeek()->format('M d Y');
        $to = $createdAt->addWeek(1)->format('M d Y');



        // befor client order or buy task we need to check if hase enough
        $balance =  Payment::where('user_id', auth()->id() )->sum('amount');
        $client_orders = Order::where('user_id', auth()->id() )->sum('price');

        if( ($balance- $client_orders) <= $price){
            $name = auth()->user()->name;
            Session::flash('message', "Hello There $name, Your Balance is Not Enough, Please add Fond !");
            return redirect()->route('add_funds')->with('danger', 'Your Balance Not Enough, Please add Fond !');
        }else{
            return view('admin.order.order_index', compact('title','price','site_url','site_time','date','from','to'));
        }


    }



       // method for show the order
       public function show_task(Request $request,$task_id,$project_id){
           $title = "Task N 1050";
           $task = Task::where('user_id',auth()->user()->id)->where('project_id',request()->project_id)->first();
           return view('admin.task.show_task' , compact('title','task'));
       }
    //
    public function index(Request $request)
    {
        //
        /* $title = 'Orders';
        return view('admin.order.not_started',compact('title')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_cp(Request $request)
    {

        $site_id = $request->site_id;
        $site_price =   Site::where('id',$site_id)->first()->site_price;
        $project_id = $request->project_id;


        // validate the data
        $request->validate([
           'task_editor_data'         => 'required',
           'task_target_url'          => 'required',
           'task_anchor_text'         => 'required',
           'task_special_requirement' => 'required',
        ]);

        // create the order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'project_id' => $project_id,
            'site_id' => $site_id,
            'price'   => $site_price
        ]);

        // create the task
        Task::create([
            'user_id' => auth()->user()->id,
            'project_id' => $request->project_id,
            'site_id' => $request->site_id,
            'order_id' => $order->id,
            'task_editor_data' => $request->task_editor_data,
            'task_type' => $request->task_type,
            'task_target_url' => $request->task_target_url,
            'task_anchor_text' => $request->task_anchor_text,
            'task_special_requirement' => $request->task_special_requirement,
        ]);


        // store the balance result for every user
        // 1) get the Total payments by auth user
        $auth_user_payments = Payment::where('user_id', auth()->id())->sum('amount');
        // 2) get the Total Tska Payed
        $task_site_prices = Task::where('user_id' , auth()->id())->site->sum('site_price');
        // count the balance balance = (Total_Payments - Total_Tasks);
        $balance = ($auth_user_payments - $task_site_prices);

        Balance::updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'balance' => $balance
        ]);


        return redirect()->route('projects.index')->with('success', 'Content Placement Task Order Successfully!');
    }

    // store task
    public function store_ccp(Request $request)
    {

        $site_id = $request->site_id;
        $site_price =   Site::where('id',$site_id)->first()->site_price;
        $project_id = $request->project_id;

        // get the client balance and check if its enough


        // validate the data
        $request->validate([
           'task_target_url'             => 'required',
           'task_anchor_text'            => 'required',
           'task_special_requirement'    => 'required',
        ]);

        // create the order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'project_id' => $project_id,
            'site_id' => $site_id,
            'price'   => $site_price
        ]);

        // create the task
        Task::create([
            'user_id' => auth()->user()->id,
            'project_id' => $request->project_id,
            'site_id' => $request->site_id,
            'order_id' => $order->id,
            'task_editor_data' => $request->task_editor_data,
            'task_type' => $request->task_type,
            'task_target_url' => $request->task_target_url,
            'task_anchor_text' => $request->task_anchor_text,
            'task_special_requirement' => $request->task_special_requirement,
            'task_price'        => $site_price
        ]);


        return redirect()->route('projects.index')->with('success', 'Content Creation and Placement Task Order Successfully!');
    }


    // methode for show client orders
    public function client_orders(Request $request){
        $title = 'Client Orders';
        $users = User::all();
        return view('admin.order.client_orders', compact('title','users'));
    }

    // method for show invoices payement to the client
    public function client_invoice(){
        return view('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // method for show client invoices and payments and orders
    public function client_invoices(){

        $transactions = Order::where('user_id', auth()->id())->paginate(10);
        $title = 'client Invoices';
        return view('admin.client.client_invoices' , compact('title','transactions'));
    }
}
