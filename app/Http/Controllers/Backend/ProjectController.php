<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    // method index for show project
    public function index()
    {
        $title = 'Projects';
        $all_projects = Project::paginate(9);
        return view('admin.project.index',compact('title','all_projects'));
    }

    // method for store and create new project
    public function store(Request $request)
    {
        Project::create([
            'user_id'=> auth()->user()->id,
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
}
