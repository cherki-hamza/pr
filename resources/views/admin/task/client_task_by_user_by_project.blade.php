@extends('admin.layouts.master')

@section('style')
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
                            <li class="breadcrumb-item active">tasks by user by project</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col mb-3">

                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="mt-n2 mb-n2 d-flex">
                                    <h5 class="align-middle text-white"> (Just Client) Tasks for client Name :  {{ $user }} At Project ==>  {{ $project_name }}</h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Project URL</th>
                                                <th>Publisher URL</th>
                                                <th>Client FullName</th>
                                                <th>Task Type</th>
                                                <th>Task Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project_tasks as $project)
                                              @foreach ($project->tasks as $task)
                                                <tr>
                                                    <td>{{ $project->project_name }}</td>
                                                    <td><a href="https://{{ $project->project_url }}" target="_blink">https://{{ $project->project_url }}</a></td>
                                                    <td><a href="https://{{ $task->site->site_url }}" target="_blink">https://{{ $task->site->site_url }}</a></td>
                                                    <td>{{ $task->user->name }}</td>
                                                    <td>{{ $task->task_type() }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $task->show_status_style() }} p-2" title="number of tasks in approvement">
                                                           {{ $task->show_status() }}
                                                        </span>
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            @if ($task->status == 0 )
                                                                @if (request()->type === 'c_c_p')
                                                                <a href="#"
                                                                    class="btn btn-sm btn-secondary">
                                                                    <i class="fas fa-eye mr-2"></i> Your Post Still Not Created
                                                                </a>
                                                                @else
                                                                <a href="{{ route('show_client_post' , ['task_id' => $task->id, "project_id" => $project->id]) }}"
                                                                    class="btn btn-sm btn-secondary">
                                                                    <i class="fas fa-eye mr-2"></i> Your Post Still Not Created
                                                                </a>
                                                                @endif

                                                            @elseif ($task->status == 1 )
                                                                <a href="#"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-eye mr-2"></i> Your Post Still In Progress
                                                            </a>

                                                            @elseif ($task->status == 6 )
                                                                <a href="#"
                                                                    class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-eye mr-2"></i> Your Task Is Rejected
                                                               </a>
                                                            @else
                                                                <a href="{{ route('show_client_post' , ['task_id' => $task->id /* , 'user_id' => $task->user->id  */, "project_id" => $project->id]) }}"
                                                                class="btn btn-sm btn-success">
                                                                <i class="fas fa-eye mr-2"></i> Open Your Post
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Order Form -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
