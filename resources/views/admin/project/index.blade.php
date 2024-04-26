@extends('admin.layouts.master')

@section('style')
 <style>

 </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section style="font-size: 18px;" class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- @can('create user') --}}
                                <div class="card-header">

                                    @include('admin.inc.alerts.alert')

                                    <h3 class="card-title">

                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#create_project" data-backdrop="static" data-keyboard="false"><i
                                                class="fas fa-plus mr-3"></i>Create New Project</a>

                                        {{-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i>Mobiles</a>
                                        --}}
                                    </h3>
                                </div>
                            {{-- @endcan --}}
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">

                                    {{-- start project --}}
                                    @foreach ($all_projects as $project)
                                        <div class="col-md-4">
                                            <div class="card card-primary">
                                                <ul class="list-group">
                                                    {{-- start Project header --}}
                                                    <li style="background-color: #0f5574" class="list-group-item active">
                                                        <div class="d-flex">
                                                            <div class="p-2">{{$project->project_name}}</div>
                                                            <div class="ml-auto p-2">
                                                                <div class="row">

                                                                    <form action="{{route('update_status')}}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                      <input id="update_status" data-id="{{ $project->id }}" class="mr-2 update_status" value="{{ $project->status }}" type="checkbox" {{ ($project->status == 1) ? 'checked' : '' }} data-size="xs" name="project_status" data-toggle="toggle" data-onstyle="primary">
                                                                      <input type="hidden" name="id" value="{{$project->id}}">
                                                                    </form>

                                                                <a href="#" data-toggle="modal" class="btn_project_edit" data-id="{{ $project->id }}"
                                                                data-target="#edit_project" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit text-white ml-2 mr-2"></i></a>

                                                                <a href="#" data-toggle="modal" class="btn_delete_project" data-id="{{ $project->id }}"><i class="fa fa-trash text-warning mr-2"></i></a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- end Project header --}}

                                                    {{-- start content writer --}}
                                                    <li class="d-flex">
                                                        <div class="p-2"><i class="fa fa-clipboard-list mr-2"></i>Content Writing</div>

                                                        <div class="ml-auto p-2">
                                                            <a href="{{ route('client_task_by_user_by_project' , ['user_id' => $project->user_id , 'project_id' => $project->id , 'status' => 0]) }}">
                                                                <span class="badge badge-secondary p-2" title="number of tasks not started">
                                                                    {{ \App\Models\Project::where('id',$project->id)->where('user_id', $project->user_id)->first()->tasks_not_started->count() }}
                                                                </span>
                                                            </a>
                                                            <a href="{{ route('client_task_by_user_by_project' , ['user_id' => $project->user_id , 'project_id' => $project->id , 'status' => 1]) }}">
                                                                <span class="badge badge-info p-2" title="number of tasks in progress">
                                                                {{ \App\Models\Project::where('id',$project->id)->where('user_id', $project->user_id)->first()->tasks_in_progress->count() }}
                                                            </span>
                                                            </a>
                                                            <a href="{{ route('client_task_by_user_by_project' , ['user_id' => $project->user_id , 'project_id' => $project->id , 'status' => 2]) }}">
                                                            <span class="badge badge-warning p-2"title="number of tasks witing approval">
                                                                {{ \App\Models\Project::where('id',$project->id)->where('user_id', $project->user_id)->first()->tasks_pending_approval->count() }}
                                                            </span>
                                                            </a>
                                                            <a href="{{ route('client_task_by_user_by_project' , ['user_id' => $project->user_id , 'project_id' => $project->id , 'status' => 3]) }}">
                                                                <span class="badge badge-primary p-2" title="number of tasks in approvement">
                                                                {{ \App\Models\Project::where('id',$project->id)->where('user_id', $project->user_id)->first()->tasks_improvement->count() }}
                                                            </span>
                                                            </a>
                                                            <a href="{{ route('client_task_by_user_by_project' , ['user_id' => $project->user_id , 'project_id' => $project->id , 'status' => 5]) }}">
                                                                <span class="badge badge-success p-2" title="number of tasks completed">
                                                                {{ \App\Models\Project::where('id',$project->id)->where('user_id', $project->user_id)->first()->tasks_completed->count() }}
                                                            </span>
                                                            </a>
                                                            <a href="{{ route('client_task_by_user_by_project' , ['user_id' => $project->user_id , 'project_id' => $project->id , 'status' => 6]) }}">
                                                                <span class="badge badge-danger p-2" title="number of tasks rejected">
                                                                {{ \App\Models\Project::where('id',$project->id)->where('user_id', $project->user_id)->first()->tasks_rejected->count() }}
                                                            </span>
                                                            </a>
                                                        </div>

                                                    </li>
                                                    {{-- end content writer --}}

                                                    {{-- start Guest posting --}}
                                                    {{-- <li class="d-flex">
                                                        <div class="p-2"><i class="fa fa-link mr-2"></i>Guest posting</div>

                                                        <div class="ml-auto p-2">
                                                            <a href="#">
                                                                <span class="badge badge-primary p-2" title="number of tasks not started">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-secondary p-2" title="number of tasks in progress">0</span>
                                                                </a>
                                                            <span class="badge badge-info p-2"title="number of tasks witing approval">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-warning p-2" title="number of tasks in approvement">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-success p-2" title="number of tasks completed">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-danger p-2" title="number of tasks rejected">0</span>
                                                            </a>
                                                        </div>

                                                    </li> --}}
                                                    {{-- end Guest posting --}}


                                                    {{-- start Digital PR & SEO --}}
                                                    {{-- <li class="d-flex">
                                                        <div class="p-2"><i class="fa fa-signal mr-2"></i>Digital PR & SEO</div>

                                                        <div class="ml-auto p-2">
                                                            <a href="#">
                                                                <span class="badge badge-primary p-2" title="number of tasks not started">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-secondary p-2" title="number of tasks in progress">0</span>
                                                                </a>
                                                            <span class="badge badge-info p-2"title="number of tasks witing approval">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-warning p-2" title="number of tasks in approvement">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-success p-2" title="number of tasks completed">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-danger p-2" title="number of tasks rejected">0</span>
                                                            </a>
                                                        </div>

                                                    </li> --}}
                                                    {{-- end Digital PR & SEO --}}

                                                    {{-- start Paid Ads --}}
                                                    {{-- <li class="d-flex">
                                                        <div class="p-2"><i class="fa fa-grip-vertical  mr-2"></i>Paid Ads</div>

                                                        <div class="ml-auto p-2">
                                                            <a href="#">
                                                                <span class="badge badge-primary p-2" title="number of tasks not started">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-secondary p-2" title="number of tasks in progress">0</span>
                                                                </a>
                                                            <span class="badge badge-info p-2"title="number of tasks witing approval">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-warning p-2" title="number of tasks in approvement">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-success p-2" title="number of tasks completed">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-danger p-2" title="number of tasks rejected">0</span>
                                                            </a>
                                                        </div>

                                                    </li> --}}
                                                    {{-- end Paid Ads --}}

                                                    {{-- start Design & Video --}}
                                                    {{-- <li class="d-flex">
                                                        <div class="p-2"><i class="fa fa-film  mr-2"></i>Design & Video</div>

                                                        <div class="ml-auto p-2">
                                                            <a href="#">
                                                                <span class="badge badge-primary p-2" title="number of tasks not started">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-secondary p-2" title="number of tasks in progress">0</span>
                                                                </a>
                                                            <span class="badge badge-info p-2"title="number of tasks witing approval">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-warning p-2" title="number of tasks in approvement">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-success p-2" title="number of tasks completed">0</span>
                                                            </a>
                                                            <a href="#"><span class="badge badge-danger p-2" title="number of tasks rejected">0</span>
                                                            </a>
                                                        </div>

                                                    </li> --}}
                                                    {{-- end Design & Video --}}

                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- end project --}}

                            </div>

                            {{-- start pagination --}}
                              <div  class="d-flex justify-content-center my-5">
                                {{ $all_projects->links() }}
                              </div>
                            {{-- end pagination --}}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@section('js')
<script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
<script>
     $(document).ready(function() {

        // start update status
        $("input:checkbox").change(function() {
            //e.preventDefault();
            let id = $(this).attr("data-id");
            console.log(id);
            $.ajax({
                    url: "{{ route('update_status') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {

                    },
                });
                setTimeout(function () { document.location.reload(true); }, 1000);
        });
        // end update status


        // start edit project
            // start user edit modal
            $(document).on("click", '.update_status', function() {
                e.preventDefault();
                let id = $(this).attr("data-id");


                /* $('#toggle-event').change(function() {
                    //$('#console-event').html('Toggle: ' + $(this).prop('checked'))

                }) */
                alert(id)
                $.ajax({
                    url: "{{ route('update_status') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        //console.console.log(data);
                    },
                });
            });
        // end edit project

       /*  $('#update_status').submit(function(e) {
        	e.preventDefault();
        	const formData = new FormData(this);
           // Send an AJAX request
            $.ajax({
                type: 'POST',
                url: '{{ route("update_status") }}',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // Handle the response message
                    //$('#cf-response-message').text(response.message);
                    alert('dev .....');
                    console.log('status clicked ...');
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
            });
 		}); */
        // end update status


        // start edit project
            // start user edit modal
            $(document).on("click", '.btn_project_edit', function() {
                let id = $(this).attr("data-id");
                //alert(id)
                //$('#modal-loading').modal({backdrop: 'static', keyboard: false, show: true});
                $.ajax({
                    url: "{{ route('show_project') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        $("#project_name").val(data.project_name);
                        $("#project_url").val(data.project_url);
                        $("#id").val(data.id);
                        $('#modal-loading').modal('hide');
                        $('#modal-edit').modal({backdrop: 'static', keyboard: false, show: true});
                    },
                });
            });
        // end edit project


         // start user delete modal
         $(document).on("click", '.btn_delete_project', function() {
                let id = $(this).attr("data-id");
                let name = $(this).attr("data-name");
                $("#did").val(id);
                $("#delete-data").html(name);
                $('#modal-delete').modal({backdrop: 'static', keyboard: false, show: true});
            });
            // end user delete modal

    });
</script>

@section('modal')
    {{-- start create new project --}}
    <div class="modal fade" id="create_project">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-folder-plus"></i>
                        Add New Project
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <label>Project Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                    placeholder="Name" name="project_name" value="{{ old('project_name') }}">
                                @error('project_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Project URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_url') is-invalid @enderror"
                                    placeholder="https://example.com" name="project_url"
                                    value="{{ old('project_url') }}">
                                @error('project_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @if ((auth()->user()->role == 'super-admin'))
                        <div class="input-group">
                            <label>Link Project To User</label>
                            <div class="input-group">
                                <select  name="user_id" id="user_id" class="form-control  @error('user_id') is-invalid @enderror" placeholder="Select User">
                                    @foreach (\App\Models\User::all() as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @endif


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
     {{-- end create new project --}}

     {{-- start edit project --}}
    <div class="modal fade" id="edit_project">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label>Project Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                    placeholder="Name" name="project_name" id="project_name" value="{{ old('project_name') }}">
                                @error('project_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Project URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_url') is-invalid @enderror"
                                    placeholder="https://example.com" name="project_url" id="project_url"
                                    value="{{ old('project_url') }}">
                                @error('project_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
     {{-- end edit project --}}

     {{-- start delete project --}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('destroy_project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <p class="modal-text">Are you sure you want to delete it? <b id="delete-data"></b></p>
                        <input type="hidden" name="id" id="did">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
     {{-- end delete project --}}
@endsection
