@extends('admin.layouts.master')

@section('style')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ckeditor5-full-screen@0.0.2/theme/fullscreen.min.css">
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
                                    <h5 class="align-middle text-white">Task ID #{{$task->id}}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (!empty($post))
                                <form action="{{ route('update_post', ['project_id' => request()->project_id , 'task_id' => request()->task_id , 'post_id' => $post->id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @else
                                <form action="{{ route('store_post', ['project_id' => request()->project_id , 'task_id' => request()->task_id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @endif


                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="bg-primary text-white">Service Type</td>
                                                    <td class="text-primary font-weight-bold">
                                                        {{ $task->task_type == 'c_p' ? 'Content Placement' : 'Content Creation And Placement' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-primary text-white">Price</td>
                                                    <td class="text-primary font-weight-bold">${{ $task->order->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-primary text-white">Task Status</td>
                                                    <td>{{ $task->show_status() }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-primary text-white">Link Type</td>
                                                    <td>DoFollow</td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-primary text-white">Publisher's URL</td>
                                                    <td><a href="{{ str_contains($task->site->site_url, 'https') ? $task->site->site_url : $task->site->site_url }}" target="_blank" rel="nofollow">
                                                        {{ str_contains($task->site->site_url, 'https') ? $task->site->site_url : 'https://'.$task->site->site_url }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-primary text-white">Anchor Text</td>
                                                    <td>{{ $task->task_anchor_text }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-primary text-white">Target URL</td>
                                                    <td><a href="{{ $task->task_target_url }}"
                                                            target="_blank">{{ $task->task_target_url }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-primary text-white">Post Placement URL</td>
                                                    <td class="table-success"><a href="#" target="_blank"
                                                            class="font-weight-bold">{{ $post->post_title ?? '' }}</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-primary text-white">Special Requirement</td>
                                                    <td>
                                                        <textarea  class="form-control" rows="6" readonly="">{!! $task->task_special_requirement !!}</textarea>
                                                    </td>
                                                </tr>

                                                @if (!Empty($post) && $post->status == 6)
                                                <tr>
                                                    <td class="bg-danger text-white">Rejection Reason</td>
                                                    <td>
                                                        <textarea  class="form-control" rows="3" readonly="">This task has been rejected because the client said : {{ $post->post_note }}</textarea>
                                                    </td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>


                            </div>
                        </div>



                       {{-- start c_p --}}
                        <div class="">
                            <div class="mt-3">
                                <div class="card ">
                                    <div class="card-header bg-primary">
                                        <h6 class="text-white mt-n2 mb-n2"> Content to be published  </h6>
                                    </div>

                                    <div class="my-2 px-5">
                                        <label class="text-primary" for="post_placement_url">Post Placement URL:</label>
                                        <input  style="color: red;" value="{{ ( !empty($task->site->site_url)) ? 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) :  $task->task_target_url }}" type="text" class="form-control" name="post_placement_url" id="post_placement_url">
                                    </div>

                                    <div class="my-2 px-5">
                                        <label class="text-primary" for="post_editor_data">Post Content :	</label>
                                        <textarea  class="my-3" rows="60" name="post_editor_data">{!! $task->task_editor_data ?? '' !!}</textarea>
                                      </div>


                                </div>
                            </div>


                            <div class="text-center">
                               @if ($task->status == 6)
                                    <span class="btn btn-danger">This Task is Rejected</span>

                               @elseif($task->status == 5)
                                 <span class="btn btn-success">This Task is AlReady Approved</span>
                               @elseif($task->status == 0)
                                 <button style="font-size: 18px"  type="submit" name="action" value="in_progress"  class="btn btn-success mx-5">
                                    <i class="fas fa-check mr-2"></i>
                                    Start The Task for the client  : {{ $task->user->name }} & Send Email Message With Status :In Progress
                                </button>
                               @else
                               <a href="{{route('super_admin_approve' , ['task_id' => $task->id ])}}"  class="btn btn-info  mx-5">
                                <i class="fas fa-save mr-2"></i>Approve
                                </a>

                                <a href="{{route('super_admin_reject' , ['task_id' => $task->id ])}}" class="btn btn-danger  mx-5">
                                    <i class="fas fa-ban mr-2"></i>Reject
                                </a>
                               @endif

                                <input type="hidden" name="site_id" value="{{$task->site->id}}">
                            </div>
                        </div>
                        {{-- end c_p --}}

                    </form>
                    </div>
                    <!-- End Order Form -->
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
        CKEDITOR.replace( 'post_editor_data', {
            language: 'en',
            uiColor: '#9AB8F3',
            uiColor: '#9AB8F3',
            filebrowserUploadUrl: "{{ route('admin') }}/upload?_token="{{request()->token}},
            filebrowserUploadMethod: 'form',
        });
    </script>

@endsection
