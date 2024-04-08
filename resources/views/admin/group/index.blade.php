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
                                                        aria-controls="custom-tabs-four-home" aria-selected="true">Groups</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                        href="#custom-tabs-four-profile" role="tab"
                                                        aria-controls="custom-tabs-four-profile"
                                                        aria-selected="false">Add New Group</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                <div class="tab-pane fade active show" id="custom-tabs-four-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                                                    <div class="card-body table-responsive">
                                                        <table id="phoneNumbers" class="table table-bordered table-hover  datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>#ID</th>
                                                                    <th>Name</th>
                                                                    <th>RedirectTo</th>
                                                                    {{-- @canany(['update user', 'delete user']) --}}
                                                                        <th>Action</th>
                                                                    {{-- @endcanany --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($groups as $group)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $group->name }}</td>
                                                                        <td>{{ $group->redirect_to }}</td>
                                                                   {{--  @canany(['update user', 'delete user']) --}}
                                                                            <td>
                                                                                <div class="btn-group d-flex justify-content-center">
                                                                                    {{-- @can('update user') --}}
                                                                                        <button class="btn btn-sm btn-primary btn-edit" data-id="{{ $group->id }}"><i class="fas fa-file-export mr-3"></i>Export CVS</button>
                                                                                        <button class="btn btn-sm btn-warning btn-edit" data-id="{{ $group->id }}"><i class="fas fa-phone mr-3"></i>Phone Numbers</button>
                                                                                        <button class="btn btn-sm btn-info btn-edit" data-id="{{ $group->id }}"><i class="fas fa-info mr-3"></i>Details $ Update</button>
                                                                                        <button class="btn btn-sm btn-danger btn-edit" data-id="{{ $group->id }}"><i class="fas fa-trash mr-3"></i>Delete</button>
                                                                                     {{-- @endcan --}}
                                                                                </div>
                                                                            </td>
                                                                        {{-- @endcanany --}}
                                                                    </tr>
                                                                @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-profile-tab">

                                            <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="row">


                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Name:</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="name">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Redirect To:</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="redirect_to">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 my-3">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Announce Status :</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                    <select name="announce_status" class="custom-select">
                                                                        <option value="1" selected="selected">Active</option>
                                                                        <option value="0">Not Active</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Confirmation Digit (toredirect call center):</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="confirmation_degit">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>cConfirmation Annoucement (toredirect call center):</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="confirmation_annoucement">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Ads Flow:</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="ads_flow">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Caller ID:</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="caller_id">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="row form-group">
                                                            <div class="col-sm-3">
                                                                <div class="">
                                                                    <label>Whisper Message:</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="">
                                                                        <input type="text" class="form-control" name="whisper_message">
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>



                                                       <div class="col-sm-8  text-right">
                                                           <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane mr-2"></i>Submit</button>
                                                       </div>

                                                    </div>
                                            </form>
                                                </div>

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
