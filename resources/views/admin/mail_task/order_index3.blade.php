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
                    <div class="col-12">
                        <div class="card card-primary border-primary">

                            <div class="card-header">
                                <span style="float: left">Buy Post on: <strong style="font-size: 18px;" class="">https://{{ $site_url ?? '' }}</strong> {{-- projectID {{request()->project_id}} + sitetID {{request()->site_id}} --}}</span>
                                <span style="float: right" class="mb-n1 text-white"><i class="text-white mr-2" data-fa-i2svg="">
                                    <svg style="width: 15px" class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false"
                                     data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                      data-fa-i2svg=""><path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                                    </svg></i>Estimated completion: <strong>{{ $site_time ?? '' }} , And The Task Start From  <span style="color: goldenrod">{{ $date }}</span> To <span style="color: goldenrod">{{ $to }}</span></strong></span>
                            </div>

                            <div class="card-body">
                                <div class="card card-primary card-outline card-outline-tabs">

                                    {{-- <div class="card-header p-0 border-bottom-0">
                                        <ul class="nav nav-tabs col-md-12 p-0" id="custom-tabs-four-tab" role="tablist">

                                            <li class="nav-item col-md-6 p-0 text-center">
                                                <a style="font-size: 22px;font-style: bold" class="nav-link active" id="custom-tabs-four-home-tab"
                                                    data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                                                    aria-controls="custom-tabs-four-home" aria-selected="true">Content Placement <strong class="text-success">$9.93</strong></a>
                                            </li>

                                            <li class="nav-item col-md-6 p-0 text-center">
                                                <a style="font-size: 22px;font-style: bold" class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-four-profile" role="tab"
                                                    aria-controls="custom-tabs-four-profile"
                                                    aria-selected="false">Content Creation and Placement <strong class="text-success">$14.91</strong></a>
                                            </li>

                                        </ul>
                                    </div> --}}

                                    <div class="card-body">
                                        <form action="{{route('store_ccp',['project_id'=> request()->project_id , 'site_id' => request()->site_id ])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        {{--  --}}
                                        <div class="form-group row no-gutters my-2">
                                            <div class="col">

                                                <style>
                                                        input[type="checkbox"] {
                                                        position: relative;
                                                        width: 80px;
                                                        height: 40px;
                                                        -webkit-appearance: none;
                                                        background: #c6c6c6;
                                                        outline: none;
                                                        border-radius: 20px;
                                                        box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.2);
                                                        transition: 0.7s;
                                                    }

                                                    input:checked[type="checkbox"] {
                                                    background: #03a9f4;
                                                    }

                                                    input[type="checkbox"]:before {
                                                    content: '';
                                                    position: absolute;
                                                    width: 40px;
                                                    height: 40px;
                                                    border-radius: 20px;
                                                    top: 0;
                                                    left: 0;
                                                    background: #ffffff;
                                                    transform: scale(1.1);
                                                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                                    transition: .5s;
                                                    }

                                                    input:checked[type="checkbox"]:before {
                                                    left: 40px;
                                                    }
                                                </style>

                                                <div class="form-group">
                                                    <label for="">Select Your Post Type</label>
                                                    <input type="checkbox" name="post_type" value="" id="post_type">
                                                </div>

                                                {{-- start code editor --}}
                                                <div class="form-group">
                                                <input type="hidden" name="task_type" value="c_p">
                                                <label class="d-block my-3"><strong>Your Content: </strong><span class="text-warning">*</span>
                                                    <i class="ml-1 mr-1" data-fa-i2svg=""><svg style="width: 15px" class="svg-inline--fa fa-long-arrow-alt-right fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg></i>
                                                    <span class="text-success">
                                                        Must be a minimum of <strong class="text-facebook font-weight-bold text-primary">700 words</strong>,
                                                        include up to <strong class="text-facebook font-weight-bold text-primary">3 links</strong> and
                                                    </span>
                                                <span class="text-danger">don't add any images in your article</span>

                                                </label>
                                                {{-- <div  id="summernote">Hello Summernote</div> --}}

                                                <textarea id="post_editor_data" class="my-3" name="task_editor_data"></textarea>
                                            </div>
                                                {{-- end code editor --}}

                                                <label class="d-block "><strong>Target Url </strong><span class="text-danger">* <strong class="text-success">(Enter the URL that you have included in your content above.)</strong></span>
                                                    <span class="text-facebook" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" data-fa-i2svg="">
                                                        <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                                    </svg></span>
                                                    <input type="hidden" name="task_type" value="c_c_p">
                                                    <input type="text" name="task_target_url" value="" autocomplete="off" class="form-control  mt-2" id="targetUrl" placeholder="Enter Your Target URL" required="">
                                                </label>
                                            </div>
                                        </div>
                                        {{--  --}}

                                        {{--  --}}
                                        <div class="form-group row no-gutters my-2">
                                            <div class="col">
                                                <label class="d-block "><strong>Anchor Text  </strong><span class="text-danger">* <strong class="text-success">(Enter the Anchor Text that you have included in your content above.)</strong></span>
                                                    <span class="text-facebook" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" data-fa-i2svg="">
                                                        <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                                    </svg></span>
                                                    <input type="text" name="task_anchor_text" value="" autocomplete="off" class="form-control  mt-2" id="targetUrl" placeholder="Enter Your Anchor Text" required="">
                                                </label>
                                            </div>
                                        </div>
                                        {{--  --}}

                                        {{--  --}}
                                        <div class="form-group row no-gutters my-2">
                                            <div class="col">
                                                <label class="d-block "><strong>Special requirements <span class="text-success">( Write all your task requirements here, content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc.)</span></strong>
                                                    <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16 text-facebook" data-html="true" data-content="If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" data-original-title="" title=""><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg><!-- <span class="fas fa-info-circle text-facebook" data-html="true" data-content="If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover">
                                                    </span> Font Awesome fontawesome.com -->
                                                    <textarea {{-- id="summernote" --}} name="task_special_requirement" class="form-control  mt-2" rows="10"></textarea>
                                                </label>
                                                                                    </div>
                                        </div>
                                        {{--  --}}

                                        {{--  --}}
                                        <div  class="text-right text-facebook h5 mr-3"> <strong style="font-size: 20px">${{ ($price) ?? 'check the price' }}</strong></div>
                                        {{--  --}}

                                        {{--  --}}
                                        <div class="row no-gutters float-right">
                                            <div>
                                                <button class="btn"  type="submit" style="background-color:#3c5a99; color:white">Order Now</button>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        </form>
                                    </div>

                                </div>
                            </div>

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
