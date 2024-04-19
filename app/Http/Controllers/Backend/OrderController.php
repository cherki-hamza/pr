<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Site;
use App\Models\Task;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // order_index
    public function order_index(Request $request,$project_id,$site_id)
    {
        //
        $title = 'Orders';
        return view('admin.order.order_index',compact('title'));
    }

     // method for not started
     public function not_started(Request $request,$project_id)
     {
         $title = 'Task Not Started';
         $tasks = Task::where('user_id',auth()->id())->where('status',Task::NOT_STARDET)->where('project_id',$request->project_id)->get();
         return view('admin.order.not_started',compact('title','tasks'));
     }

     // method for In Pprogress
     public function in_progress(Request $request,$project_id=null)
     {
         //
         $title = 'Task In Pprogress';
         $tasks = Task::where('user_id',auth()->id())->where('status',Task::IN_PROGRESS)->where('project_id',$request->project_id)->get();
        // return $tasks;
         return view('admin.order.in_progress',compact('title','tasks'));
     }

      // method for Pending Approval
      public function pending_approval(Request $request,$project_id)
      {
          //
          $title = 'Task In Pprogress';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::PENDING_APPROVAL)->where('project_id',$request->project_id)->get();
          return view('admin.order.pending_approval',compact('title','tasks'));
      }


       // method for improvement
       public function improvement(Request $request,$project_id)
       {
           //
           $title = 'Task In Improvement';
           $tasks = Task::where('user_id',auth()->id())->where('status',Task::IMPROVEMENT)->where('project_id',$request->project_id)->get();
           return view('admin.order.improvement',compact('title','tasks'));
       }

       // method for completed
       public function completed(Request $request,$project_id)
       {
           //
           $title = 'Task Completed';
           $tasks = Task::where('user_id',auth()->id())->where('status',Task::COMPLETED)->where('project_id',$request->project_id)->get();
           return view('admin.order.completed',compact('title'));
       }

       // method for rejected
       public function rejected(Request $request,$project_id)
       {
           //
           $title = 'Task rejected';
           $tasks = Task::where('user_id',auth()->id())->where('status',Task::REJECTED)->where('project_id',$request->project_id)->get();
           return view('admin.order.rejected',compact('title','tasks'));
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


        return redirect()->route('projects.index')->with('success', 'Content Placement Task Order Successfully!');
    }

    // store task c_c_p
    public function store_ccp(Request $request)
    {
        $site_id = $request->site_id;
        $site_price =   Site::where('id',$site_id)->first()->site_price;
        $project_id = $request->project_id;


        // validate the data
        $request->validate([
           'task_target_url'          => 'required',
           'task_anchor_text'         => 'required',
           'task_special_requirement' => 'required',
        ]);

        // create the order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'project_id' => $project_id,
            'site_id' => $site_id,
            'price'   => '14.91' //$site_price
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


        return redirect()->route('projects.index')->with('success', 'Content Creation and Placement Task Order Successfully!');
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
}
