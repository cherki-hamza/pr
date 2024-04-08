@extends('admin.layouts.master')
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
                                         User Information And Payments Methods
                                        {{-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i>Mobiles</a>
 --}}
                                    </h3>
                                </div>
                            @endcan
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <style>
                                                    body{margin-top:20px;
                                                background:#eee;
                                                }

                                                /* WRAPPERS */
                                                #wrapper {
                                                width: 100%;
                                                overflow-x: hidden;
                                                }
                                                .wrapper {
                                                padding: 0 20px;
                                                }
                                                .wrapper-content {
                                                padding: 20px 10px 40px;
                                                }
                                                #page-wrapper {
                                                padding: 0 15px;
                                                min-height: 568px;
                                                position: relative !important;
                                                }
                                                @media (min-width: 768px) {
                                                #page-wrapper {
                                                    position: inherit;
                                                    margin: 0 0 0 240px;
                                                    min-height: 2002px;
                                                }
                                                }

                                                /* Payments */
                                                .payment-card {
                                                background: #ffffff;
                                                padding: 20px;
                                                margin-bottom: 25px;
                                                border: 1px solid #e7eaec;
                                                }
                                                .payment-icon-big {
                                                font-size: 60px;
                                                color: #d1dade;
                                                }
                                                .payments-method.panel-group .panel + .panel {
                                                margin-top: -1px;
                                                }
                                                .payments-method .panel-heading {
                                                padding: 15px;
                                                }
                                                .payments-method .panel {
                                                border-radius: 0;
                                                }
                                                .payments-method .panel-heading h5 {
                                                margin-bottom: 5px;
                                                }
                                                .payments-method .panel-heading i {
                                                font-size: 26px;
                                                }

                                                .payment-icon-big {
                                                    font-size: 60px !important;
                                                    color: #d1dade;
                                                }

                                                .form-control,
                                                .single-line {
                                                background-color: #FFFFFF;
                                                background-image: none;
                                                border: 1px solid #e5e6e7;
                                                border-radius: 1px;
                                                color: inherit;
                                                display: block;
                                                padding: 6px 12px;
                                                transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                                                width: 100%;
                                                font-size: 14px;
                                                }
                                                .text-navy {
                                                    color: #1ab394;
                                                }
                                                .text-success {
                                                    color: #1c84c6;
                                                }
                                                .text-warning {
                                                    color: #f8ac59;
                                                }
                                                .ibox {
                                                clear: both;
                                                margin-bottom: 25px;
                                                margin-top: 0;
                                                padding: 0;
                                                }
                                                .ibox.collapsed .ibox-content {
                                                display: none;
                                                }
                                                .ibox.collapsed .fa.fa-chevron-up:before {
                                                content: "\f078";
                                                }
                                                .ibox.collapsed .fa.fa-chevron-down:before {
                                                content: "\f077";
                                                }
                                                .ibox:after,
                                                .ibox:before {
                                                display: table;
                                                }
                                                .ibox-title {
                                                -moz-border-bottom-colors: none;
                                                -moz-border-left-colors: none;
                                                -moz-border-right-colors: none;
                                                -moz-border-top-colors: none;
                                                background-color: #ffffff;
                                                border-color: #e7eaec;
                                                border-image: none;
                                                border-style: solid solid none;
                                                border-width: 3px 0 0;
                                                color: inherit;
                                                margin-bottom: 0;
                                                padding: 14px 15px 7px;
                                                min-height: 48px;
                                                }
                                                .ibox-content {
                                                background-color: #ffffff;
                                                color: inherit;
                                                padding: 15px 20px 20px 20px;
                                                border-color: #e7eaec;
                                                border-image: none;
                                                border-style: solid solid none;
                                                border-width: 1px 0;
                                                }
                                                .ibox-footer {
                                                color: inherit;
                                                border-top: 1px solid #e7eaec;
                                                font-size: 90%;
                                                background: #ffffff;
                                                padding: 10px 15px;
                                                }
                                                .text-danger {
                                                    color: #ed5565;
                                                }
                                </style>
                                <div class="col-12">

                                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                                    <div class="container">
                                    <div class="wrapper wrapper-content animated fadeInRight">
                                        {{-- <div class="row">
                                            <div class="col-md-4">
                                                <div class="payment-card">
                                                    <i class="fa fa-cc-visa payment-icon-big text-success"></i>
                                                    <h2>
                                                        **** **** **** 1060
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <small>
                                                                <strong>Expiry date:</strong> 10/16
                                                            </small>
                                                        </div>
                                                        <div class="col-sm-6 text-right">
                                                            <small>
                                                                <strong>Name:</strong> David
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-card">
                                                    <i class="fa fa-cc-mastercard payment-icon-big text-warning"></i>
                                                    <h2>
                                                        **** **** **** 7002
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <small>
                                                                <strong>Expiry date:</strong> 10/16
                                                            </small>
                                                        </div>
                                                        <div class="col-sm-6 text-right">
                                                            <small>
                                                                <strong>Name:</strong> Anna Smith
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="payment-card">
                                                    <i class="fa fa-cc-discover payment-icon-big text-danger"></i>
                                                    <h2>
                                                        **** **** **** 3466
                                                    </h2>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <small>
                                                                <strong>Expiry date:</strong> 10/16
                                                            </small>
                                                        </div>
                                                        <div class="col-sm-6 text-right">
                                                            <small>
                                                                <strong>Name:</strong> Morgan
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> --}}

                                        <!-- start user info -->
                                        <div class="row">
                                            @if (count($user_billing_count) == 0)
                                            <div class="container">
                                                <form action="{{ route('billings.store') }}" method="POST">
                                                   @csrf
                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Name :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-8">
                                                             <input type="name" class="form-control" name="name" id="name" placeholder="Enter Name">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Email :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-8">
                                                             <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-sm-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Phone Number :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-8">
                                                             <input type="mobile" class="form-control" name="mobile" id="mobile" placeholder="Enter Phone Number">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Address :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-8">
                                                             <textarea name="address" id="address" class="form-control" placeholder="Enter Phone Address"></textarea>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                         <div class="col-sm-8  text-right">
                                                             <button type="submit" class="btn btn-primary">Save</button>
                                                         </div>
                                                     </div>
                                                 </div>




                                                </form>
                                             </div>

                                             @else

                                             <div class="container">
                                                <form action="{{ route('billings.update' , $user_billing->id ) }}" method="POST">
                                                   @csrf
                                                   @method('PUT')
                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Name :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-8">
                                                             <input type="name" class="form-control" name="name" id="name" value="{{$user_billing->name}}">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Email :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-8">
                                                             <input type="email" class="form-control" name="email" id="email" value="{{$user_billing->email}}">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-sm-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Phone Number :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-8">
                                                             <input type="mobile" class="form-control" name="mobile" id="mobile" value="{{$user_billing->mobile}}">
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                     <div class="col-md-4">
                                                         <div class="">
                                                             <label>Address :</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-8">
                                                             <textarea name="address" id="address" class="form-control">{{$user_billing->address}}</textarea>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="col-md-12 my-3">
                                                     <div class="row form-group">
                                                         <div class="col-sm-8  text-right">
                                                             <button type="submit" class="btn btn-success">Update</button>
                                                         </div>
                                                     </div>
                                                 </div>




                                                </form>
                                             </div>

                                            @endif

                                        </div>
                                        <!-- end user info -->

                                        <div class="row">

                                            <div class="col-lg-12">

                                                <div class="ibox">
                                                    <div class="ibox-title">
                                                        Payment method
                                                    </div>
                                                    <div class="ibox-content">

                                                        <div class="panel-group payments-method" id="accordion">

                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <div class="pull-right">
                                                                        <i class="fa fa-cc-paypal text-success"></i>
                                                                    </div>
                                                                    <h5 class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">PayPal</a>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseOne" class="panel-collapse collapse">
                                                                    <div class="panel-body">

                                                                        <div class="row">
                                                                            <div class="col-md-10">
                                                                                {{-- <h2>Checkout with Paypale</h2> --}}
                                                                                <a class="btn btn-success">
                                                                                    <i class="fa fa-cc-paypal">
                                                                                        Purchase via PayPal
                                                                                    </i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                         </div>
                                                                </div>
                                                            </div>

                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <div class="pull-right">
                                                                        <i class="fa fa-cc-amex text-success"></i>
                                                                        <i class="fa fa-cc-mastercard text-warning"></i>
                                                                        <i class="fa fa-cc-discover text-danger"></i>
                                                                    </div>
                                                                    <h5 class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Credit Card</a>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseTwo" class="panel-collapse collapse in">
                                                                    <div class="panel-body">

                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                               {{--  <h2>Payment with bank account</h2><br > --}}

                                                                            </div>
                                                                            <div class="col-md-8">

                                                                                <form role="form" id="payment-form">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label>CARD NUMBER</label>
                                                                                                <div class="input-group">
                                                                                                    <input type="text" class="form-control" name="Number" placeholder="Valid Card Number" required="">
                                                                                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xs-7 col-md-7">
                                                                                            <div class="form-group">
                                                                                                <label>EXPIRATION DATE</label>
                                                                                                <input type="text" class="form-control" name="Expiry" placeholder="MM / YY" required="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xs-5 col-md-5 pull-right">
                                                                                            <div class="form-group">
                                                                                                <label>CV CODE</label>
                                                                                                <input type="text" class="form-control" name="CVC" placeholder="CVC" required="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label>NAME OF CARD</label>
                                                                                                <input type="text" class="form-control" name="nameCard" placeholder="NAME AND SURNAME">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <button class="btn btn-primary" type="submit">Make a payment!</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <div class="pull-right">
                                                                        <i class="fa fa-btc text-success"></i>
                                                                    </div>
                                                                    <h5 class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Crypto</a>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapse3" class="panel-collapse collapse">
                                                                    <div class="panel-body">

                                                                        <div class="row">
                                                                            <div class="col-md-10">
                                                                                <div class="row mx-0 pt-5 d-flex justify-content-center">
                                                                                    <div class="col-md-8">
                                                                                      <div class="card shadow-lg">
                                                                                        <div class="card-header card-header-divider text-center pt-4"> <img src="https://apirone.com/static/promo/bitcoin_logo_vector.svg" class="img-fluid" style="max-height: 42px;" width="205" alt=""><br>
                                                                                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin%3A1DonateWffyhwAjskoEwXt83pHZxhLTr8H%3Famount%3D0.15050000" style="max-width: 190px;" alt=""> </div>
                                                                                        <div class="card-body px-0">
                                                                                          <p class="text-center"><small><strong>1DonateWffyhwAjskoEwXt83pHZxhLTr8H</strong></small></p>
                                                                                          <p class="text-muted text-center">Scan QR code and top-up your<br>
                                                                                            Bitcoin balance for any amount.<br>
                                                                                            Payment will be credited after 1 confirmation.<br>
                                                                                          </p>
                                                                                        </div>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                                        </div>
                                                                         </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
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
