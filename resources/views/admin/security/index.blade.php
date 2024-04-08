@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
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
                                    <h3 class="card-title text-danger">
                                        security Page (be careful when you change the email and password)
                                        {{-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i>Mobiles</a>
 --}}
                                    </h3>
                                </div>
                            @endcan
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">

                                <div class="col-12">

                                    <div class="card card-primary card-outline card-outline-tabs">

                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-four-home-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                                                        aria-controls="custom-tabs-four-home" aria-selected="true">Update
                                                        Email</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                        href="#custom-tabs-four-profile" role="tab"
                                                        aria-controls="custom-tabs-four-profile"
                                                        aria-selected="false">Update Phone Number</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-messages-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-messages" role="tab"
                                                        aria-controls="custom-tabs-four-messages"
                                                        aria-selected="false">Update Password</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">

                                                {{-- start update email --}}
                                                <div class="tab-pane fade active show" id="custom-tabs-four-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                                                    <form action="{{ route('update_email', Auth::user()->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="row form-group">
                                                                    <div class="col-sm-6">
                                                                        <div class="">
                                                                            <div class="">
                                                                                <label for="email"
                                                                                    class="col-form-label">Current
                                                                                    Email</label>
                                                                                <input readonly
                                                                                    value="{{ auth()->user()->email }}"
                                                                                    class="form-control" type="text"
                                                                                    name="email">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="">
                                                                            <label for="new_email"
                                                                                class="col-form-label">Enter New
                                                                                Email:</label>
                                                                            <input class="form-control" type="text"
                                                                                name="new_email" id="new_email">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer my-4">
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Update Email" />
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                {{-- end update email --}}

                                                {{-- start update mobile --}}
                                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-profile-tab">

                                                    <form action="{{ route('update_mobile', Auth::user()->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                                <div class="row form-group">
                                                                    <div class="col-sm-6">
                                                                        <div class="">
                                                                            <div class="">
                                                                                <label for="mobile"
                                                                                    class="col-form-label">Current
                                                                                    Phone Number</label>
                                                                                <input readonly
                                                                                    value="{{ auth()->user()->mobile }}"
                                                                                    class="form-control" type="text"
                                                                                    name="mobile">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="">
                                                                            <label for="new_mobile"
                                                                                class="col-form-label">Enter New
                                                                                Phone Number:</label>
                                                                            <input class="form-control" type="text"
                                                                                name="new_mobile" id="new_mobile">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer my-4">
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Update Phone Number" />

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- end update mobile --}}



                                                {{-- start update passwod --}}
                                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-messages-tab">

                                                <form action="{{ route('update_password', Auth::user()->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row form-group">
                                                                <div class="col-sm-6">
                                                                    <div class="">
                                                                        <div class="">
                                                                            <label for="email"
                                                                                class="col-form-label">Enter Current
                                                                                password</label>
                                                                            <input class="form-control" type="password"
                                                                                name="current_password"
                                                                                placeholder="Enter The Current Password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="">
                                                                        <label for="new_password"
                                                                            class="col-form-label">Enter New
                                                                            Password:</label>
                                                                        <input class="form-control" type="text"
                                                                            name="new_password" id="new_password"
                                                                            placeholder="Enter New Password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer my-4">
                                                            <input type="submit" class="btn btn-primary"
                                                                value="Update Password" />
                                                        </div>
                                                    </div>
                                                  </form>

                                                </div>
                                                {{-- start update passwod --}}

                                            </div>
                                        </div>

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
    <script>
        $('.datatable').dataTable({
            "oLanguage": {
                "sEmptyTable": "Oops there is no data here for phone Numbers Please go Buy New Phone Numbers"
            }
        });
    </script>
@endsection

@section('modal')
@endsection
