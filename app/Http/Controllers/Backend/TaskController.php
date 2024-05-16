<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Post;
use App\Models\Project;
use App\Models\PublisherStatus;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    // (super admin) method for get the tasks for every user for every project // ,$user_id,$project_id
    public function super_admin_task_by_user_by_project(Request $request){

        $project = Project::where('id',$request->project_id)->firstOrFail();
        $project_name = $project->project_name;
        $user = $project->user->name;

        $project_tasks = Project::where('id',$request->project_id)->
                        with(['tasks' => function($query) use ($request) {
                                $query->where('user_id', $request->user_id)->where('status' , $request->status)->where('task_type',$request->type);
                        }])->get();

        return view('admin.task.super_admin_task_by_user_by_project', compact('project_tasks','project_name','user'));
    }

     // (client) method for get the tasks for every user for every project // ,$user_id,$project_id
     public function client_task_by_user_by_project(Request $request){

        // get the project for every client
        $project = Project::where('id',$request->project_id)->first();
        // get the name of project
        $project_name = $project->project_name;
        $user = $project->user->name;

        $project_tasks = Project::where('id',$request->project_id)->
                        with(['tasks' => function($query) use ($request) {
                                $query->where('user_id', $request->user_id)->where('status' , $request->status)->where('task_type',$request->type);
                        }])->get();

        return view('admin.task.client_task_by_user_by_project', compact('project_tasks','project_name','user'));
    }

    // method for open the super admin tasks
    public function super_admin_open_task(Request $request){
        $task = Task::where('id',$request->task_id)->first();
        $post = Post::where('task_id',$request->task_id)->first();
      return view('admin.task.super_admin_open_task' , compact('task','post'));
    }

    // method for open client tasks
    public function client_open_task(Request $request){
        $task = Task::where('user_id',$request->user_id)->where('id',$request->task_id)->first();
        $post = Post::where('user_id',$request->user_id)->where('task_id',$request->task_id)->first();
      return view('admin.task.open_task' , compact('task','post'));
    }

    // method for task  task_approve
    public function task_approve_or_rejected(Request $request){

        // get the params from request
           $task_id = $request->task_id;
           $post_id = $request->post_id;
           $user_id = $request->user_id;
           $project_id = $request->project_id;

        // approve button
        if($request->input('action') == 'approve'){

           $task = Task::where('user_id',$user_id)->where('id',$task_id)->firstOrFail();
           $post = Post::where('task_id',$task_id)->firstOrFail();

            $task->update(['status' => Task::APPROVAL]);
            $post->update(['status' => Task::APPROVAL]);

            return redirect()->back()->with('info' , 'The post is Approved');

        }

        // rejected button
        if($request->input('action') == 'reject'){

            $task = Task::where('user_id',$user_id)->where('id',$task_id)->firstOrFail();
            $post = Post::where('task_id',$task_id)->firstOrFail();

            $task->update(['status' => Task::REJECTED]);
            $post->update(['status' => Task::REJECTED]);

            return redirect()->back()->with('info' , 'The post is Rejected');

        }


    }


    // method for task  task_approve or task_improve or task rejected
    public function handel_task(Request $request){

        // get the params from request
           $task_id = $request->task_id;
           $post_id = $request->post_id;
           $user_id = $request->user_id;
           $project_id = $request->project_id;

        // approve button
        if($request->input('action') == 'approve'){

           $task = Task::where('user_id',$user_id)->where('id',$task_id)->firstOrFail();
           $post = Post::where('task_id',$task_id)->firstOrFail();

            $task->update([
                'status'      => Task::COMPLETED,
                'task_status' => Task::COMPLETED
            ]);
            $post->update([
                'status' => Task::COMPLETED,
                //'post_note'   => $request->post_note,
            ]);

            $task->order->update([
                'status'  => Task::COMPLETED,
             ]);


            $note = Note::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'task_id' => $task->id,
                'post_note' => $request->post_note,
            ]);

            return redirect()->back()->with('success' , 'The post is Approved AND Completed , So Your Post is ready To Be Published');

        }

         // rejected button
         if($request->input('action') == 'improve'){

            $task = Task::where('user_id',$user_id)->where('id',$task_id)->firstOrFail();
            $post = Post::where('task_id',$task_id)->firstOrFail();

            $task->update([
                'status'     => Task::IMPROVEMENT,
                'task_status'  => Task::IMPROVEMENT,
            ]);
            $post->update([
                'status' => Task::IMPROVEMENT,
                //'post_note'  => $request->post_note
            ]);

            $task->order->update([
                'status'  => Task::IMPROVEMENT,
             ]);

            $note = Note::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'task_id' => $task->id,
                'post_note' => $request->post_note,
            ]);

            return redirect()->back()->with('info' , 'The post is in Improvement Proccessing');

        }

        // rejected button
        if($request->input('action') == 'reject'){

            $task = Task::where('user_id',$user_id)->where('id',$task_id)->firstOrFail();
            $post = Post::where('task_id',$task_id)->firstOrFail();

            $task->update([
                'status'      => Task::REJECTED,
                'task_status' => Task::REJECTED,
            ]);
            $post->update([
                'status' => Task::REJECTED,
                //'post_note'  => $request->post_note
            ]);

            $task->order->update([
                'status'  => Task::REJECTED,
             ]);

            $note = Note::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'task_id' => $task->id,
                'post_note' => $request->post_note,
            ]);

            return redirect()->back()->with('danger' , 'The post is Rejected');

        }


    }



    // method for get tasks not started
    public function not_started(Request $request,$project_id)
    {
        $title = 'Task Not Started';
        $tasks = Task::where('user_id',auth()->id())->where('status',Task::NOT_STARDET)->where('project_id',$request->project_id)->get();
        $tasks_count = count($tasks);
        return view('admin.order.not_started',compact('title','tasks','tasks_count'));
    }

    // method for get tasks In Pprogress
    public function in_progress(Request $request,$project_id=null)
    {
        //
        $title = 'Task In Pprogress';
        $tasks = Task::where('user_id',auth()->id())->where('status',Task::IN_PROGRESS)->where('project_id',$request->project_id)->get();
        $tasks_count = count($tasks);
       // return $tasks;
        return view('admin.order.in_progress',compact('title','tasks','tasks_count'));
    }

     // method for get tasks Pending Approval
     public function pending_approval(Request $request,$project_id)
     {
         //
         $title = 'Task In Pprogress';
         $tasks = Task::where('user_id',auth()->id())->where('status',Task::PENDING_APPROVAL)->where('project_id',$request->project_id)->get();
         $tasks_count = count($tasks);
         return view('admin.order.pending_approval',compact('title','tasks','tasks_count'));
     }


      // method for get tasks improvement
      public function improvement(Request $request,$project_id)
      {
          //
          $title = 'Task In Improvement';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::IMPROVEMENT)->where('project_id',$request->project_id)->get();
          $tasks_count = count($tasks);
          return view('admin.order.improvement',compact('title','tasks','tasks_count'));
      }

      // method for get tasks completed
      public function completed(Request $request,$project_id)
      {
          //
          $title = 'Task Completed';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::COMPLETED)->where('project_id',$request->project_id)->get();
          $tasks_count = count($tasks);
          return view('admin.order.completed',compact('title','tasks','tasks_count'));
      }

      // method for get tasks rejected
      public function rejected(Request $request,$project_id)
      {
          //
          $title = 'Task rejected';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::REJECTED)->where('project_id',$request->project_id)->get();
          $tasks_count = count($tasks);
          return view('admin.order.rejected',compact('title','tasks','tasks_count'));
      }

      // method for super admin aprove the c_p
      public function super_admin_approve(Request $request){

        $task = Task::where('id',$request->task_id)->first();
        $task->update([
            'status'       => 5,
            'task_status'  => 5,
         ]);

         $task->order->update([
            'status'  => 5,
         ]);

       /*  PublisherStatus::create([
            'user_id'                 => $task->user_id,
            'task_id'                 => $task->id,
            'order_id'                => $task->order_id,
            'site_id'                 => $task->site_id,
            'publisher_status'        =>  0,
            'publisher_final_status'  =>  0
        ]); */

        /* $post = Post::where('id',$request->post_id)->first();
         $post->update([
            'status'  => 5,
         ]); */

        return redirect()->back()->with('success' , 'The Task For Content Placement is Approved');

      }

      // method for super admin reject the c_p
      public function super_admin_reject(Request $request){
        // get the task
        $task = Task::where('id',$request->task_id)->first();
        // update the task status to the rejected status
        $task->update([
            'status'       => 6,
            'task_status'  => 6,
         ]);
        //get the related order of task and update the status to the rejected status
        $task->order->update([
            'status'  => 6,
         ]);

         // change the client status to the rejected status 6
         /* $task->client_status->update([
            'client_status' => 6, // 0: Not_Started , 1: in_progress, 2: PENDING APPROVAL, 3: Approved, 4 Need Approve , 5: completed, 6: rejected
         ]); */



        return redirect()->back()->with('danger' , 'The Task For Content Placement is Rejected');

      }


      // method for see all super admin new tasks
      public function all_new_tasks(Request $request){

        // get all new tasks
        $tasks = Task::where('status',Task::NOT_STARDET)->get();


        return view('admin.task.super_admin_all_new_tasks' , compact('tasks'));
      }

      /* // method for the publisher for approve
      public function publisher_approve(){

      }

      // method for the publisher for reject
      public function publisher_reject(){

      } */

}
