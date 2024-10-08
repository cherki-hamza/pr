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


                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="mt-n2 mb-n2 d-flex">
                                    <h5 class="align-middle text-white"> Task ID #{{ $task->id }}</h5>
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
                                                <td><a href="{{ $task->site->site_url }}" target="_blank" rel="nofollow">
                                                        {{ $task->site->site_url }}
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
                                                        class="font-weight-bold">Not Yet</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="bg-primary text-white">Special Requirement</td>
                                                <td>
                                                    <textarea class="form-control" rows="6" wrap="soft" readonly="">
                                                        {!! $task->task_special_requirement !!}
                                                    </textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="card ">
                                <div class="card-header bg-primary">
                                    <h6 class="text-white mt-n2 mb-n2">Content to be published</h6>
                                </div>
                                <style>
                                    textarea { height: auto; }
                                </style>
                                <div class="card-body">
                                    <textarea id="summernote"   class="my-3" name="post_editor_data">{!! $post->post_body ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="action" value="in_progress"  class="btn btn-info  mx-5"><i class="fas fa-save mr-2"></i>
                             {{ ($post) ? 'Update The Post, and  is still In Progress' : 'Save The Post, And is  Still In Progress' }}
                            </button>

                            {{-- href="{{ route('store_post_client_approval', ['project_id' => request()->project_id , 'task_id' => request()->task_id ]) }}" --}}
                            <button  type="submit" name="action" value="client_approval"  class="btn btn-warning mx-5"><i class="fas fa-check mr-2"></i>Send To Client for Get The Approval</button>
                            <input type="hidden" name="site_id" value="{{$task->site->id}}">
                        </div>
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
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['link', ['linkDialogShow', 'unlink']],
                    ['help', ['help']]
                ],
                styleTags: [
                    'p',
                    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
           });
        });
    </script>
@endsection
