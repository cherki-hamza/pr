<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\CompletedTaskEmail;
use App\Mail\InProgressTaskEmail;
use App\Mail\PendingApprovalTaskEmail;
use App\Mail\RejectedTaskEmail;
use App\Models\Post;
use App\Models\Site;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    // show the form for create the post
    public function index(Request $request,$task_id,$project_id){

        /* $content = $request->post_editor_data;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
        return $imageFile; */
        $title = 'Post';
        $task = Task::where('user_id',auth()->user()->id)->where('project_id',request()->project_id)->firstOrFail();

        $post = Post::where('task_id',$request->task_id)->firstOrFail();
        return view('admin.posts.post',compact('title','task','post'));
    }// end index post

    // method for store the post
    public function store_post(Request $request,$task_id,$project_id){

        if($request->input('action') == 'in_progress' ){

            // validate the post data
            $request->validate([
                'post_editor_data' => 'required',
            ]);
            // store the data in the database

            $post = Post::create([
                'user_id'           => auth()->id(),
                'project_id'        => $request->project_id,
                'site_id'           => $request->site_id,
                'task_id'           => $request->task_id,
                'status'            => Post::IN_PROGRESS,
                'post_title'        => $request->post_placement_url,
                'post_body'         => $request->get('post_editor_data'),
            ]);
            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->firstOrFail();
            $task->update(['status'=> Post::IN_PROGRESS]);

            $task->order->update([
                'status'  => Task::IN_PROGRESS,
             ]);

            Mail::to($task->user->email)->send(new InProgressTaskEmail($task));

            // go the the prgress page
            return redirect()->back()->with('info' , 'The post created with success, And The Status is IN PROGRESS');
        }


        if($request->input('action') == 'client_approval' ){
             // validate the post data
             $request->validate([
                'post_editor_data' => 'required',
            ]);
            // store the data in the database

            $post = Post::create([
                'user_id'           => auth()->id(),
                'project_id'        => $request->project_id,
                'site_id'           => $request->site_id,
                'task_id'           => $request->task_id,
                'status'            => Post::PENDING_APPROVAL,
                'post_title'        => $request->post_placement_url,
                'post_body'         => $request->get('post_editor_data'),
            ]);
            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->firstOrFail();
            $task->update(['status'=> Post::PENDING_APPROVAL]);

            $task->order->update([
                'status'  => Task::PENDING_APPROVAL,
             ]);

            Mail::to($task->user->email)->send(new PendingApprovalTaskEmail($task));

            // go the the prgress page
            return redirect()->back()->with('warning' , 'The post created with success, And The Status nedd PENDING APPROVAL ');
        }

    }//end store_post

    // method for update the post by task
    // method for update the post by task
    public function update_post(Request $request,$task_id,$project_id){

        // super admin in_progress
        if($request->input('action') == 'in_progress' ){

            // validate the post data
            $request->validate([
                'post_editor_data' => 'required',
            ]);
            // find the post by id the post
            $post = Post::where('id',$request->post_id)->firstOrFail();
            if(!empty($post)){
             // update the post
            $post->update([
                'status'     => Post::IN_PROGRESS,
                'post_title' => $request->post_placement_url,
                'post_body'  => $request->get('post_editor_data'),
            ]);
            }


            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->firstOrFail();

            if(!empty($task)){
                $task->update([
                    'status'=> Post::IN_PROGRESS,
                    'task_status'=> Post::IN_PROGRESS,
                    'task_post_placement_url' => $request->post_placement_url,
                ]);

                $task->order->update([
                    'status'  => Task::IN_PROGRESS,
                 ]);
            }


            Mail::to($task->user->email)->send(new InProgressTaskEmail($task));

            // go the the prgress page
            return redirect()->back()->with('info' , 'The Task updated with success, And The Status is IN PROGRESS');
        }

        // super admin send to client pending approve
        if($request->input('action') == 'client_approval' ){

            // validate the post data
            $request->validate([
                'post_editor_data' => 'required',
            ]);
            // find the post by id the post
            $post = Post::where('id',$request->post_id)->firstOrFail();
            // update the post
            $post->update([
                'status'     => Post::PENDING_APPROVAL,
                'post_title' => $request->post_placement_url,
                'post_body'  => $request->get('post_editor_data'),
            ]);

            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->firstOrFail();
            $task->update([
                'status'=> Post::PENDING_APPROVAL,
                'task_post_placement_url' => $request->post_placement_url,
            ]);

            $task->order->update([
                'status'  => Task::PENDING_APPROVAL,
             ]);

            Mail::to($task->user->email)->send(new PendingApprovalTaskEmail($task));

            // go the the prgress page
            return redirect()->back()->with('warning' , 'The post updated and  Sending tho the client with success, And The Status nedd  APPROVAL from Client ');

        }

        // super admin task completed
        if($request->input('action') == 'publisher_approval' ){


            // find the post by id the post
            $post = Post::where('id',$request->post_id)->firstOrFail();
            // update the post
            $post->update([
                'status'     => Post::COMPLETED,
            ]);

            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->firstOrFail();
            $task->update([
                'status'=> Task::COMPLETED,
                'task_status'=> Task::COMPLETED,
                'task_post_placement_url' => $request->post_placement_url,
            ]);

            $task->order->update([
                'status'  => Task::COMPLETED,
             ]);

            Mail::to($task->user->email)->send(new CompletedTaskEmail($task));

            // go the the prgress page
            return redirect()->back()->with('info' , 'The Post is Approves with success From The PR Team And From The Publisher And The Email Sending To The client');
        }


        // super admin task Rejected
        if($request->input('action') == 'publisher_reject' ){


            // find the post by id the post
            $post = Post::where('id',$request->post_id)->firstOrFail();
            // update the post
            $post->update([
                'status'     => Post::REJECTED,
            ]);

            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->firstOrFail();
            $task->update([
                'status'=> Task::REJECTED,
                'task_status'=> Task::REJECTED
            ]);

            $task->order->update([
                'status'  => Task::REJECTED,
             ]);

            Mail::to($task->user->email)->send(new RejectedTaskEmail($task));

            // go the the prgress page
            return redirect()->back()->with('info' , 'The Post is Rejected From The Publisher And The Email Sending To The client');
        }

    }//end update_post


    // method for client see the post
    public function show_client_post(Request $request){
        $title = 'See The Post';
        $task = Task::where('user_id' , auth()->id())->where('project_id',request()->project_id)->where('id',$request->task_id)->first();

       // return $task;

        $post = Post::where('task_id',$request->task_id)->first();

        if(!empty($task) && $task->task_type == 'c_c_p'){
            return view('admin.client.client_post_c_c_p' , compact('title','task','post'));
        }

        if(!empty($task) && $task->task_type == 'c_p'){
            return view('admin.client.client_post' , compact('title','task','post'));
        }

    }


}
