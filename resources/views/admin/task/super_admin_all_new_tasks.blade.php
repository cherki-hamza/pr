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
                            <li class="breadcrumb-item active">All New Tasks</li>
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
                                    <h5 class="align-middle text-white">All New Tasks</h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Client FullName</th>
                                                <th>Project Name</th>
                                                <th>Project URL</th>
                                                <th>Publisher URL</th>
                                                <th>Date</th>
                                                <th>Task Type</th>
                                                <th>Task Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($tasks as $task)
                                                <tr>
                                                    <td>{{ $task->user->name }}</td>
                                                    <td>{{ $task->project->project_name }}</td>
                                                    <td><a href="https://{{ $task->project->project_url }}" target="_blink">https://{{ $task->project->project_url }}</a></td>
                                                    <td><a href="https://{{ $task->site->site_url }}" target="_blink">https://{{ $task->site->site_url }}</a></td>
                                                    <td>{{ $task->created_at->diffForHumans()  }}</td>
                                                    <td>{{ $task->task_type() }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $task->show_status_style() }} p-2" title="number of tasks in approvement">
                                                           {{ $task->show_status() }}
                                                        </span>
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                          <a href="{{ route('super_admin_open_task' , ['task_id' => $task->id , 'user_id' => $task->user_id , "project_id" => $task->project->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye mr-2"></i>Open The Task</a>
                                                        </div>
                                                    </td>
                                                </tr>
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
