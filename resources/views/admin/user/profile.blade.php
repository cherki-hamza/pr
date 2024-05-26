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
                                    {{ auth()->user()->name }}
                                </h3>
                            </div>
                            @endcan
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">

                                <div class="d-flex justify-content-center">
                                    <div class="box box-widget widget-user col-md-8">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-black" style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
                                          <h3 class="widget-user-username">{{auth()->user()->profile->fullname }}</h3>
                                          <h5 class="widget-user-desc">{{auth()->user()->profile->email }}</h5>
                                        </div>
                                        <div class="widget-user-image">
                                          <img class="img-circle" src="{{auth()->user()->GetPicture() }}" alt="User Avatar">
                                        </div>
                                        <div class="box-footer my-5">
                                          <div class="row">
                                            <div class="col-sm-6 {{-- border-right --}}">
                                                <div class="description-block">
                                                <h5 class="description-header text-primary text-left">Profile Informations:</h5>
                                                <div class="row form-group my-3">
                                                    <!-- start fullname -->
                                                    <div class="row col-sm-12 table table-bordered">
                                                        <div class="col-sm-5">
                                                            <label for="fullname"
                                                                class="col-form-label text-success">FullName:</label>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p>{{auth()->user()->profile->fullname}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- end fullname -->

                                                    <!-- start email -->
                                                    <div class="row col-sm-12 table table-bordered">
                                                        <div class="col-sm-5">
                                                            <label for="fullname"
                                                                class="col-form-label text-success">Email:</label>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p>{{auth()->user()->profile->email}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- end email -->

                                                    <!-- start mobile -->
                                                    <div class="row col-sm-12 table table-bordered">
                                                        <div class="col-sm-5">
                                                            <label for="fullname"
                                                                class="col-form-label text-success">Mobile:</label>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p>{{auth()->user()->profile->mobile ?? 'Empty' }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- end mobile -->

                                                    <!-- start company name -->
                                                    <div class="row col-sm-12 table table-bordered">
                                                        <div class="col-sm-5">
                                                            <label for="fullname"
                                                                class="col-form-label text-success">Company Name:</label>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p>{{auth()->user()->profile->company_name ?? 'Empty' }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- end company name -->

                                                    <!-- start website -->
                                                    <div class="row col-sm-12 table table-bordered">
                                                        <div class="col-sm-5">
                                                            <span for="fullname"
                                                                class="col-form-label text-success">Company Website:</label>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <p>{{ auth()->user()->profile->company_website ?? 'Empty' }}</p>
                                                        </div>
                                                    </div>
                                                    <!-- end website -->

                                                    {{-- start image --}}
                                                    <div class="row col-sm-12 table table-bordered my-3">
                                                        <div class="col-sm-5">
                                                            <span for="fullname"
                                                                class="col-form-label text-success">Logo:</label>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <img style="width: 100px" src="{{ Auth::user()->GetPicture() }}" alt="">
                                                        </div>
                                                    </div>
                                                    {{-- end image --}}
                                                </div>

                                              <!-- /.description-block -->
                                            </div>
                                        </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                              <form action="{{ route('profiles.update' , Auth::user()->id )}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method("PUT")
                                                <div class="description-block">
                                                    <h5 class="description-header text-primary text-left">Update Profile Informations:</h5>

                                                    <div class="row form-group my-3">

                                                        <!-- start fullname -->
                                                        <div class="row col-sm-12">
                                                            <div class="col-sm-4">
                                                                <label for="fullname"
                                                                    class="col-form-label text-success">FullName:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text"
                                                                name="fullname" id="fullname" value="{{auth()->user()->profile->fullname}}">
                                                            </div>
                                                        </div>
                                                        <!-- end fullname -->

                                                        <!-- start email -->
                                                        <div class="row col-sm-12 my-3">
                                                            <div class="col-sm-4">
                                                                <label for="email"
                                                                    class="col-form-label text-success">Email:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text"
                                                                name="email" id="email" value="{{ auth()->user()->profile->email }}">
                                                            </div>
                                                        </div>
                                                        <!-- end email -->

                                                        <!-- start mobile -->
                                                        <div class="row col-sm-12 my-3">
                                                            <div class="col-sm-4">
                                                                <label for="mobile"
                                                                    class="col-form-label text-success">Mobile:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text"
                                                                name="mobile" id="mobile" value="{{auth()->user()->profile->mobile}}">
                                                            </div>
                                                        </div>
                                                        <!-- end mobile -->

                                                        <!-- start company name -->
                                                        <div class="row col-sm-12 my-3">
                                                            <div class="col-sm-4">
                                                                <label for="company_name"
                                                                    class="col-form-label text-success">Company Name:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text"
                                                                name="company_name" id="company_name" value="{{auth()->user()->profile->company_name}}">
                                                            </div>
                                                        </div>
                                                        <!-- end company name -->

                                                        <!-- start website -->
                                                        <div class="row col-sm-12 my-3">
                                                            <div class="col-sm-4">
                                                                <span for="company_website"
                                                                    class="col-form-label text-success">Company Website:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text"
                                                                name="company_website" id="company_website" value="{{auth()->user()->profile->company_website}}">
                                                            </div>
                                                        </div>

                                                        <!-- start image -->
                                                        <div class="row col-sm-12 mt-2">
                                                            <div class="col-sm-4">
                                                                <span for="company_website"
                                                                    class="col-form-label text-success">Image:</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="container">
                                                                    <div class="avatar-upload">
                                                                        <div class="avatar-edit">
                                                                            <input type='file' id="imageUpload" name="picture" accept=".png, .jpg, .jpeg" />
                                                                            <label for="imageUpload"><i class="fa fa-edit"></i></label>
                                                                        </div>
                                                                        <div class="avatar-preview">
                                                                            <div id="imagePreview" style="background-image: url({{ Auth::user()->GetPicture() }});">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- end image -->



                                                        <!-- end website -->
                                                    </div>

                                                </div>

                                              <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
                                          <div class="row col-sm-12  text-right">

                                            <div class="col-sm-8">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>

                                        </div>
                                        </div>
                                    </form>

                                      </div>
                                </div>

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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>

   $( document ).ready(function() {
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#imagePreview").css(
                    "background-image",
                    "url(" + e.target.result + ")"
                );
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(650);
            };
            reader.readAsDataURL(input.files[0]);
        }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
   });

</script>
@endsection
