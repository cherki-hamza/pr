@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">Dashboard <x-iconic-phone  style="width: 50px"/></h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
           <div class="card card-primary">
               <div class="card-header">
                  <h3>Statistiques</h3>
               </div>
               <h3 class="text-primary ml-3">Tasks Status:</h3>
               <div class="card-body">
                  <div class="row d-flex justify-content-center">
                      <div class="col-md-12 my-4">
                         {!! $chart->container() !!}
                      </div><br><br><br><br>
                      <div class="col-md-12 my-4">

                        <h3 class="text-primary">New Tasks:</h3>

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
                                                        @if(auth()->user()->role == 'client')
                                                           <a href="#" class="btn btn-sm btn-{{ $task->show_status_style() }}"><i class="fas fa-eye mr-2"></i>The Task is Not Started</a>
                                                        @elseif (auth()->user()->role == 'super-admin')
                                                          <a href="{{ route('super_admin_open_task' , ['task_id' => $task->id , 'user_id' => $task->user_id , "project_id" => $task->project->id]) }}" class="btn btn-sm btn-{{ $task->show_status_style() }}"><i class="fas fa-eye mr-2"></i>Open The Task</a>

                                                        @else
                                                        <a href="#" class="btn btn-sm btn-{{ $task->show_status_style() }}"><i class="fas fa-eye mr-2"></i>Open The Task</a>
                                                        @endif

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
           </div>
        </section>
        <!-- /.content -->
        {!! $chart->script() !!}
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/annotations.js"></script>

{{--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/gantt/modules/gantt.js"></script>
<script src="https://code.highcharts.com/gantt/modules/exporting.js"></script> --}}

<script>

/* Highcharts.chart('my_chart', {
    xAxis: {
        categories: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ]
    },

    title: {
        text: 'Tasks By Month'
    },

    series: [{
        data: [
            { y: 29.9, id: 'min' }, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6,
            148.5, { y: 216.4, id: 'max' }, 194.1, 95.6, 54.4
        ]
    }],

    annotations: [{
        labels: [{
            point: 'max',
            text: 'Max'
        }, {
            point: 'min',
            text: 'Min',
            backgroundColor: 'white'
        }]
    }]
}); */

</script>
@endsection
