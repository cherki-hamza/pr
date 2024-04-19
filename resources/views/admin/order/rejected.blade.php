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
                            <h3 class="text-center mt-3">Tasks Rejected</h3>



                            <!-- menu  -->
                            <div class="d-none d-md-block pt-3 pr-3 pl-3 ml-1 mr-1">
                                <div class="btn-group nav">

                                    <a href="{{route('not_started' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-dark d-none d-md-block nav-item nav-link nav-link-fade">Not
                                        Started </a>
                                    <a href="{{route('in_progress' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-info d-none d-md-block nav-item nav-link nav-link-faded">In
                                        Progress </a>
                                    <a href="{{route('pending_approval' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-warning d-none d-md-block nav-item nav-link nav-link-faded">Pending
                                        Approval </a>
                                    <a href="{{route('improvement' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-primary d-none d-md-block nav-item nav-link nav-link-faded">Improvement
                                    </a>
                                    <a href="{{route('completed' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-success d-none d-md-block nav-item nav-link nav-link-faded">Completed
                                        <span class="badge badge-dark ml-auto badge-pill ml-3">272</span></a>
                                    <a href="{{route('rejected' , ['project_id' =>request()->project_id])}}"
                                        class="btn btn-sm btn-outline-danger d-none d-xl-block nav-item nav-link nav-link-faded active">Rejected
                                        <span class="badge badge-dark ml-auto badge-pill ml-3">55</span></a>

                                </div>
                            </div>
                            <div class="card-header border-bottom mb-1 d-flex d-md-none">



                                <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">


                                    <li class="nav-item">
                                        <a href="https://icopify.co/project/2042/buyer/posts/tasks/opentasks"
                                            class="nav-link  active"><svg class="svg-inline--fa fa-tasks fa-w-16"
                                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tasks"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M139.61 35.5a12 12 0 0 0-17 0L58.93 98.81l-22.7-22.12a12 12 0 0 0-17 0L3.53 92.41a12 12 0 0 0 0 17l47.59 47.4a12.78 12.78 0 0 0 17.61 0l15.59-15.62L156.52 69a12.09 12.09 0 0 0 .09-17zm0 159.19a12 12 0 0 0-17 0l-63.68 63.72-22.7-22.1a12 12 0 0 0-17 0L3.53 252a12 12 0 0 0 0 17L51 316.5a12.77 12.77 0 0 0 17.6 0l15.7-15.69 72.2-72.22a12 12 0 0 0 .09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 0 0 0-96zm432 16H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z">
                                                </path>
                                            </svg><!-- <i class="fas fa-tasks"></i> Font Awesome fontawesome.com --></a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="https://icopify.co/project/2042/buyer/posts/tasks/progress"
                                            class="nav-link "><svg class="svg-inline--fa fa-spinner fa-w-16"
                                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z">
                                                </path>
                                            </svg><!-- <i class="fas fa-spinner"></i> Font Awesome fontawesome.com --></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://icopify.co/project/2042/buyer/posts/tasks/approval"
                                            class="nav-link "><svg class="svg-inline--fa fa-thumbs-up fa-w-16"
                                                aria-hidden="true" focusable="false" data-prefix="far" data-icon="thumbs-up"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z">
                                                </path>
                                            </svg><!-- <i class="far fa-thumbs-up"></i> Font Awesome fontawesome.com --></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://icopify.co/project/2042/buyer/posts/tasks/improvement"
                                            class="nav-link "><svg class="svg-inline--fa fa-keyboard fa-w-18"
                                                aria-hidden="true" focusable="false" data-prefix="far" data-icon="keyboard"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M528 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h480c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm8 336c0 4.411-3.589 8-8 8H48c-4.411 0-8-3.589-8-8V112c0-4.411 3.589-8 8-8h480c4.411 0 8 3.589 8 8v288zM170 270v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm-336 82v-28c0-6.627-5.373-12-12-12H82c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm384 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zM122 188v-28c0-6.627-5.373-12-12-12H82c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm96 0v-28c0-6.627-5.373-12-12-12h-28c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12zm-98 158v-16c0-6.627-5.373-12-12-12H180c-6.627 0-12 5.373-12 12v16c0 6.627 5.373 12 12 12h216c6.627 0 12-5.373 12-12z">
                                                </path>
                                            </svg><!-- <i class="far fa-keyboard"></i> Font Awesome fontawesome.com --></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://icopify.co/project/2042/buyer/posts/tasks/completed"
                                            class="nav-link "><svg class="svg-inline--fa fa-check-circle fa-w-16"
                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z">
                                                </path>
                                            </svg><!-- <i class="far fa-check-circle"></i> Font Awesome fontawesome.com --></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://icopify.co/project/2042/buyer/posts/tasks/rejected"
                                            class="nav-link "><svg class="svg-inline--fa fa-minus-circle fa-w-16"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="minus-circle" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z">
                                                </path>
                                            </svg><!-- <i class="fas fa-minus-circle"></i> Font Awesome fontawesome.com --></a>
                                    </li>
                                </ul>
                            </div>
                            <!--/ menu -->

                            <div class="card-body tab-content">
                                <div>
                                    <div class="text-center">
                                        <div class="mt-4">
                                           {{--  <h5>No results found.</h5> --}}
                                        </div>

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
@endsection
