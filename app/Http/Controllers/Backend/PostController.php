<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Site;
use App\Models\Task;
use Illuminate\Http\Request;

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
        $task = Task::where('user_id',auth()->user()->id)->where('project_id',request()->project_id)->first();

        $post = Post::where('task_id',$request->task_id)->first();
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
            $task = Task::where('id',$request->task_id)->first();
            $task->update(['status'=> Post::IN_PROGRESS]);

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
            $task = Task::where('id',$request->task_id)->first();
            $task->update(['status'=> Post::PENDING_APPROVAL]);

            // go the the prgress page
            return redirect()->back()->with('warning' , 'The post created with success, And The Status nedd PENDING APPROVAL ');
        }

    }//end store_post

    // method for update the post by task
    // method for update the post by task
    public function update_post(Request $request,$task_id,$project_id){

        if($request->input('action') == 'in_progress' ){

            // validate the post data
            $request->validate([
                'post_editor_data' => 'required',
            ]);
            // find the post by id the post
            $post = Post::where('id',$request->post_id)->first();
            // update the post
            $post->update([
                'status'     => Post::IN_PROGRESS,
                'post_title' => $request->post_placement_url,
                'post_body'  => $request->get('post_editor_data'),
            ]);

            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->first();
            $task->update(['status'=> Post::IN_PROGRESS]);

            // go the the prgress page
            return redirect()->back()->with('info' , 'The post updated with success, And The Status is IN PROGRESS ');
        }

        if($request->input('action') == 'client_approval' ){

            // validate the post data
            $request->validate([
                'post_editor_data' => 'required',
            ]);
            // find the post by id the post
            $post = Post::where('id',$request->post_id)->first();
            // update the post
            $post->update([
                'status'     => Post::PENDING_APPROVAL,
                'post_title' => $request->post_placement_url,
                'post_body'  => $request->get('post_editor_data'),
            ]);

            // find the related task and update the status
            $task = Task::where('id',$request->task_id)->first();
            $task->update(['status'=> Post::PENDING_APPROVAL]);

            // go the the prgress page
            return redirect()->back()->with('warning' , 'The post updated and  Sending tho the client with success, And The Status nedd  APPROVAL from Client ');

        }

    }//end update_post


    // method for client see the post
    public function show_client_post(Request $request){
        $title = 'See The Post';
        $task = Task::where('user_id' , auth()->id())->where('project_id',request()->project_id)->first();
        $post = Post::where('task_id',$request->task_id)->first();
        //return $task->task_target_url;
        return view('admin.client.client_post' , compact('title','task','post'));
    }


}
