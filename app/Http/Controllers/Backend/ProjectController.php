<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Task;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    // method index for show all project for super admin and client
    public function index()
    {
        $title = 'Projects';
        if((auth()->user()->role == 'client')){
            $all_projects = Project::where('user_id',auth()->id())->paginate(9);
        }else{
            $all_projects = Project::paginate(9);
        }


        return view('admin.project.index',compact('title','all_projects'));
    }

    // method for store and create new project
    public function store(Request $request)
    {

        $request->validate([
            'project_name' => 'required',
            'project_url' => 'required',
        ],[
            'project_name.required' => 'Please Dont Leave the project Name Empty, Its Requered.',
            'project_url.required' => 'Please Dont Leave the project URL Empty, Its Requered.',
        ]);

        $user_id = $request->user_id;
        Project::create([
            'user_id'=> (empty($user_id)) ? auth()->user()->id :  $user_id,
            'project_name'=> $request->project_name,
            'project_url'=> $request->project_url,
          ]);

          return redirect()->back()->with('success', 'Project Created Successfully!');
    }

     // method for show project
    public function show_project(Request $request){
        $project = ProjectResource::collection(Project::where(['id' => $request->id])->get());
        return response()->json([
            'status'    => Response::HTTP_OK,
            'message'   => 'Data project by id',
            'data'      => $project[0]
        ], Response::HTTP_OK);
    }



    // method for update project
    public function update_project(Request $request)
    {

        $request->validate([
            'project_name'      => ['required', 'string', 'max:255'],
            'project_url'  => ['nullable', 'string'],
        ]);

        $data = [
            'project_name'      => $request->project_name,
            'project_url'     => $request->project_url,
        ];


        DB::beginTransaction();
        try {
            $project = Project::find($request->id);
            $project->update($data);
            DB::commit();
            //Alert::success('Project Updated Successfoly')->toToast()->toHtml();
            return back()->with('success', 'Project Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>' . $project->project_name . '</b> gagal disimpan : ' . $th->getMessage())->toToast()->toHtml();
            return back()->with('danger', 'Oops the project not updated');
        }

    }

    // method for delet project
    public function destroy_project(Request $request)
    {
        try {
            $user = Project::find($request->id);
            $user->delete();
            return back()->with('success', 'Project deleted Successfully!');
        } catch (\Throwable $th) {
            return back()->with('danger', 'Oops the project not deleted');
        }
    }


    // method for update status
    public function update_status(Request $request){
        $project = Project::find($request->id);

        if($project->status == 1){
            $project->update(['status'=> 0]);
            return back()->with('success', "The Project $project->project_name Disabled Successfully!");
        }else{
            $project->update(['status'=> 1]);
            return back()->with('success', "The Project $project->project_name Enabled Successfully!");
        }


    }


    // get the projects by user
    public function user_projects(){
        $title = 'User Projects';
        $users = User::all();
        return view('admin.project.user_projects',compact('users',  'title'));
    }

    // all projects for every user by id
    public function all_user_projects(Request $request,$user_id){
        $user_name = User::where('id',$request->user_id)->first()->name;
        $title = "All Projects by user : <span style='font-size:18px;' class='text-danger'>  $user_name </span>";
        $projects_by_user = Project::where('user_id' , $request->user_id)->paginate(12);

        // get task by user by project  ->tasks_not_started->count()
        $tasks_not_started_count = User::where('id',$request->user_id)->first();
        $count = Task::where('user_id',$request->user_id)->first();
        //return $count;
        //return $tasks_not_started_count;
        return view('admin.project.all_user_projects' , compact('projects_by_user','title','tasks_not_started_count'));
    }


}
