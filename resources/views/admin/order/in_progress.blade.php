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
                    <div class="col-md-12">
                        <div class="card">
                            <h3 class="text-center mt-3">Tasks In Progress</h3>



                            <!-- menu  -->
                            <div class="d-none d-md-block pt-3 pr-3 pl-3 ml-1 mr-1">
                                <div class="btn-group nav">

                                    <a href="{{route('not_started' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-dark d-none d-md-block nav-item nav-link nav-link-fade">Not Started
                                        <span style="font-size: 20px" class="badge badge-danger badge-pill ml-2">{{ \App\Models\Task::where('user_id',auth()->id())->where('status',0)->where('project_id',request()->project_id)->count() ?? '0' }}</span>
                                    </a>
                                    <a href="{{route('in_progress' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-info d-none d-md-block nav-item nav-link nav-link-faded active">In Progress
                                        <span style="font-size: 20px" class="badge badge-dark badge-pill ml-2">{{ \App\Models\Task::where('user_id',auth()->id())->where('status',1)->where('project_id',request()->project_id)->count() ?? '0' }}</span>
                                    </a>
                                    <a href="{{route('pending_approval' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-warning d-none d-md-block nav-item nav-link nav-link-faded">Pending Approval
                                        <span style="font-size: 20px" class="badge badge-dark  badge-pill ml-2">{{ \App\Models\Task::where('user_id',auth()->id())->where('status',2)->where('project_id',request()->project_id)->count() ?? '0'}}</span>
                                    </a>
                                    <a href="{{route('improvement' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-primary d-none d-md-block nav-item nav-link nav-link-faded">Improvement
                                        <span style="font-size: 20px" class="badge badge-dark badge-pill ml-2">{{ \App\Models\Task::where('user_id',auth()->id())->where('status',3)->where('project_id',request()->project_id)->count() ?? '0' }}</span>
                                    </a>

                                    <a href="{{ route('pr_publisher', ['project_id' => request()->project_id]) }}"
                                        class="btn btn-sm btn-outline-purple d-none d-md-block nav-item nav-link nav-link-faded active">Waiting Pr Approve
                                        <span style="font-size: 20px"
                                            class="badge badge-dark badge-pill ml-2">{{ \App\Models\Task::where('user_id', auth()->id())->where('status', 9)->where('project_id', request()->project_id)->count() ?? '0' }}</span>
                                    </a>


                                    <a href="{{route('completed' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-success d-none d-md-block nav-item nav-link nav-link-faded">Completed
                                        <span style="font-size: 20px" class="badge badge-dark badge-pill ml-2">{{ \App\Models\Task::where('user_id',auth()->id())->where('status',5)->where('project_id',request()->project_id)->count() ?? '0' }}</span></a>
                                    <a href="{{route('rejected' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-danger d-none d-xl-block nav-item nav-link nav-link-faded">Rejected
                                        <span style="font-size: 20px" class="badge badge-dark badge-pill ml-2">{{ \App\Models\Task::where('user_id',auth()->id())->where('status',6)->where('project_id',request()->project_id)->count() ?? '0' }}</span></a>

                                </div>
                            </div>
                               <!-- menu  -->

                               <div class="card-body">
                                <div>
                                        <div class="mt-4">
                                            {{-- <h5>No results found.</h5> --}}

                                             {{-- start table --}}
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered table-hover datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Task ID</th>
                                                            <th>Date </th>
                                                            <th>Target URL</th>
                                                            <th>Post Placement URL</th>
                                                            <th>Anchor Text</th>
                                                            <th>Price</th>
                                                            <th>Messsage</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tasks as $task)
                                                            <tr>
                                                                <td>#{{ $task->id }}</td>
                                                                <td>{{ $task->created_at }}</td>
                                                                <td>{{ $task->task_target_url }}</td>
                                                                <td>{{ $task->site->site_url }}</td>
                                                                <td>{{ $task->task_anchor_text }}</td>
                                                                <td>{{ $task->order->price }}</td>
                                                                <td>Messges ..</td>


                                                                <td class="text-center">
                                                                    <div class="btn-group">
                                                                        @if (auth()->user()->roles[0]['name'] == 'superadmin')
                                                                        <a href="{{route('create_post' , ['project_id' => request()->project_id , 'task_id' => $task->id ])}}" class="btn  btn-warning mx-2" ><i class="fa fa-solid fa-spinner fa-spin-pulser mr-2"></i>
                                                                            {{ ($task->status == 1) ? 'Open The Post' : 'Wiating Approval from Client' }}
                                                                        </a>
                                                                        @else
                                                                        <a href="#" class="btn  btn-primary mx-2" ><i class="fa fa-eye mr-2"></i>
                                                                            See The Post
                                                                        </a>
                                                                        @endif

                                                                        {{-- {{route('show_client_post' , ['project_id' => request()->project_id , 'task_id' => $task->id ])}} --}}


                                                                            {{-- <button class="btn btn-sm btn-primary mx-2">
                                                                                <svg style="width: 16px" class="svg-inline--fa fa-exchange-alt fa-w-16 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exchange-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 168v-16c0-13.255 10.745-24 24-24h360V80c0-21.367 25.899-32.042 40.971-16.971l80 80c9.372 9.373 9.372 24.569 0 33.941l-80 80C409.956 271.982 384 261.456 384 240v-48H24c-13.255 0-24-10.745-24-24zm488 152H128v-48c0-21.314-25.862-32.08-40.971-16.971l-80 80c-9.372 9.373-9.372 24.569 0 33.941l80 80C102.057 463.997 128 453.437 128 432v-48h360c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24z"></path></svg>
                                                                                Move
                                                                            </button> --}}
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- end table --}}
                                        </div>

                                </div>
                            </div>

                        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250,
                disableDragAndDrop: true,
                toolbar: [
                    // [groupName, [list of button]]
                    ['redo', ['undo', 'redo']],
                    ['header', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                styleTags: [
                    'p',
                    {
                        title: 'Blockquote',
                        tag: 'blockquote',
                        className: 'blockquote',
                        value: 'blockquote'
                    },
                    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
            });
        });
    </script>

    <!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/66227bb9a0c6737bd12e22aa/1hrrb6k37';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script> --}}
    <!--End of Tawk.to Script-->

@endsection
