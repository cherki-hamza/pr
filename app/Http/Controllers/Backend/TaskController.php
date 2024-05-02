<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    // (super admin) method for get the tasks for every user for every project // ,$user_id,$project_id
    public function super_admin_task_by_user_by_project(Request $request){

        $project = Project::where('id',$request->project_id)->first();
        $project_name = $project->project_name;
        $user = $project->user->name;

        $project_tasks = Project::where('id',$request->project_id)->
                        with(['tasks' => function($query) use ($request) {
                                $query->where('user_id', $request->user_id)->where('status' , $request->status);
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
                                $query->where('user_id', $request->user_id)->where('status' , $request->status);
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

           $task = Task::where('user_id',$user_id)->where('id',$task_id)->first();
           $post = Post::where('task_id',$task_id)->first();

            $task->update(['status' => Task::APPROVAL]);
            $post->update(['status' => Task::APPROVAL]);

            return redirect()->back()->with('info' , 'The post is Approved');

        }

        // rejected button
        if($request->input('action') == 'reject'){

            $task = Task::where('user_id',$user_id)->where('id',$task_id)->first();
            $post = Post::where('task_id',$task_id)->first();

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

           $task = Task::where('user_id',$user_id)->where('id',$task_id)->first();
           $post = Post::where('task_id',$task_id)->first();

            $task->update([
                'status'      => Task::COMPLETED,
                'task_status' => 1
            ]);
            $post->update([
                'status' => Task::COMPLETED,
                'post_note'   => $request->post_note,
            ]);

            return redirect()->back()->with('success' , 'The post is Approved AND Completed , So Your Post is ready To Be Published');

        }

         // rejected button
         if($request->input('action') == 'improve'){

            $task = Task::where('user_id',$user_id)->where('id',$task_id)->first();
            $post = Post::where('task_id',$task_id)->first();

            $task->update([
                'status'     => Task::IMPROVEMENT,
            ]);
            $post->update([
                'status' => Task::IMPROVEMENT,
                'post_note'  => $request->post_note
            ]);

            return redirect()->back()->with('info' , 'The post is in Improvement Proccessing');

        }

        // rejected button
        if($request->input('action') == 'reject'){

            $task = Task::where('user_id',$user_id)->where('id',$task_id)->first();
            $post = Post::where('task_id',$task_id)->first();

            $task->update([
                'status'     => Task::REJECTED,
            ]);
            $post->update([
                'status' => Task::REJECTED,
                'post_note'  => $request->post_note
            ]);

            return redirect()->back()->with('danger' , 'The post is Rejected');

        }


    }



    // method for not started
    public function not_started(Request $request,$project_id)
    {
        $title = 'Task Not Started';
        $tasks = Task::where('user_id',auth()->id())->where('status',Task::NOT_STARDET)->where('project_id',$request->project_id)->get();
        $tasks_count = count($tasks);
        return view('admin.order.not_started',compact('title','tasks','tasks_count'));
    }

    // method for In Pprogress
    public function in_progress(Request $request,$project_id=null)
    {
        //
        $title = 'Task In Pprogress';
        $tasks = Task::where('user_id',auth()->id())->where('status',Task::IN_PROGRESS)->where('project_id',$request->project_id)->get();
        $tasks_count = count($tasks);
       // return $tasks;
        return view('admin.order.in_progress',compact('title','tasks','tasks_count'));
    }

     // method for Pending Approval
     public function pending_approval(Request $request,$project_id)
     {
         //
         $title = 'Task In Pprogress';
         $tasks = Task::where('user_id',auth()->id())->where('status',Task::PENDING_APPROVAL)->where('project_id',$request->project_id)->get();
         $tasks_count = count($tasks);
         return view('admin.order.pending_approval',compact('title','tasks','tasks_count'));
     }


      // method for improvement
      public function improvement(Request $request,$project_id)
      {
          //
          $title = 'Task In Improvement';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::IMPROVEMENT)->where('project_id',$request->project_id)->get();
          $tasks_count = count($tasks);
          return view('admin.order.improvement',compact('title','tasks','tasks_count'));
      }

      // method for completed
      public function completed(Request $request,$project_id)
      {
          //
          $title = 'Task Completed';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::COMPLETED)->where('project_id',$request->project_id)->get();
          $tasks_count = count($tasks);
          return view('admin.order.completed',compact('title','tasks','tasks_count'));
      }

      // method for rejected
      public function rejected(Request $request,$project_id)
      {
          //
          $title = 'Task rejected';
          $tasks = Task::where('user_id',auth()->id())->where('status',Task::REJECTED)->where('project_id',$request->project_id)->get();
          $tasks_count = count($tasks);
          return view('admin.order.rejected',compact('title','tasks','tasks_count'));
      }

}
