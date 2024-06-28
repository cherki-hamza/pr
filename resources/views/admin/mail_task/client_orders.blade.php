@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">{{ $title }}</h1> --}}
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @can('create user')
                            <div class="card-header">
                                <h3 class="card-title">
                                    Client Orders
                                </h3>
                            </div>
                            @endcan
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover datatable">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>ID#</th>
                                            <th>Client Name</th>
                                            <th>Email</th>
                                            <th>Tasks Waiting</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                          @php
                                              if ($user->role == 'super-admin') {
                                                continue;
                                              }
                                          @endphp
                                            <tr class="text-center">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <span style="font-size: 22px;">
                                                        <a href="{{ route('all_user_projects' , ['user_id' => $user->id]) }}" style="font-size: 18px;" class="badge badge-warning">
                                                          {{  $user->tasks_not_started_projects->count()  }}
                                                        </a>
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('all_user_projects' , ['user_id' => $user->id]) }}" style="font-size: 18px;" class="btn btn-sm btn-success">
                                                            <i class="fas fa-folder mr-2"></i>Show Tasks
                                                        </a>
                                                      </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
