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
                            <li class="breadcrumb-item active">Application Settings</li>
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
                     <div class="card col-md-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="text-primary mb-5">Site Settings:</h3>
                                </div>

                                <div class="col-md-6">
                                    <h3 class="text-primary mb-5">Application settings:</h3>
                                </div>
                            </div>
                            <div class="row">

                                {{-- start website settings --}}
                                <div style="border: 1px #e83e8c solid;border-radius: 10px" class="col-md-5 mr-5 py-4">
                                    <h5 style="color: #e83e8c">Website Settings</h5>
                                    <form action="{{ route('update_site_logo',1) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 my-4">
                                                <label for="fullname" class="col-form-label text-success">00Logo:</label>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6 pl-5">
                                                    <img style="width: 85px;height: 85ps;" src="{{ (!empty(\App\Helpers\SettingHelper::getValue('logo'))) ? url('').'/public'.(\App\Helpers\SettingHelper::getValue('logo')) : Auth::user()->GetPicture()  }}">
                                                </div>

                                                <div style="right: 0px;" class="col-md-6 pl-5">
                                                    <input type="file" name="logo" id="logo">
                                                </div>
                                             </div>
                                        </div>

                                        <div class="colmd-12 my-5">
                                            <div class="form-group px-1 py-4">
                                                <input type="submit" class="btn btn-primary" value="Update Logo">
                                            </div>
                                        </div>

                                    </div>
                                  </form>
                               </div>
                               {{-- end website settings --}}


                                {{-- start paypal settings --}}
                               <div style="border: 1px #e83e8c solid;border-radius: 10px" class="col-md-5 ml-5 py-4">
                                   <form action="{{ route('update_paypal',1) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <h5 style="color: #e83e8c">Paypal Settings</h5>
                                        <div class="row col-sm-12 my-3">
                                            <div class="col-sm-4">
                                                <label for="company_name"
                                                    class="col-form-label text-success">PAYPAL CLIENT ID:</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="PAYPAL_CLIENT_ID" id="PAYPAL_CLIENT_ID"  cols="10" rows="2">{{ \App\Helpers\SettingHelper::getValue('PAYPAL_SANDBOX_CLIENT_ID') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row col-sm-12 my-3">
                                            <div class="col-sm-4">
                                                <label for="company_name"
                                                    class="col-form-label text-success">PAYPAL CLIENT SECRET:</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="PAYPAL_CLIENT_SECRET" id="PAYPAL_CLIENT_SECRET"  cols="10" rows="2">{{ \App\Helpers\SettingHelper::getValue('PAYPAL_SANDBOX_CLIENT_SECRET') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row col-sm-12 my-3">
                                            <div class="col-sm-4">
                                                <label for="company_name"
                                                    class="col-form-label text-success">PAYPAL CURRENCY:</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="PAYPAL_CURRENCY" id="PAYPAL_CURRENCY" value="{{ (\App\Helpers\SettingHelper::getValue('PAYPAL_CURRENCY')) ?? 'USD' }}">
                                            </div>
                                        </div>

                                        <div class="colmd-12">
                                            <div class="form-group px-1 py-4">
                                                <input type="submit" class="btn btn-primary" value="Update Paypal Api">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                               </div>
                               {{-- end paypal settings --}}

                            </div>
                        </div>
                     </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
