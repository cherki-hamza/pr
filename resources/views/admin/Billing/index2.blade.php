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
                                    h1 {
                                        font-size: 28px;
                                    }

                                    h2 {
                                        font-size: 23.8px;
                                    }

                                    h3 {
                                        font-size: 18.2px;
                                    }

                                    .btn {
                                        display: inline-block;
                                        padding: 10px 20px;
                                        border: 0;
                                        font-size: 14px;
                                        font-weight: 300;
                                        letter-spacing: 1px;
                                        cursor: pointer;
                                        -webkit-transition: all 0.3s ease-in-out 0s;
                                        -moz-transition: all 0.3s ease-in-out 0s;
                                        -ms-transition: all 0.3s ease-in-out 0s;
                                        -otransition: all 0.3s ease-in-out 0s;
                                        transition: all 0.3s ease-in-out 0s;
                                    }

                                    .btn-primary {
                                        background: #fb8200;
                                        color: #fff;
                                    }

                                    .btn-primary:hover,
                                    .btn-primary:focus {
                                        background: #1754d1;
                                        -webkit-box-shadow: none;
                                        -moz-box-shadow: none;
                                        -ms-box-shadow: none;
                                        -obox-shadow: none;
                                        box-shadow: none;
                                    }

                                    .btn-default {
                                        background: #666666;
                                        color: #fff;
                                    }

                                    input[type=text],
                                    input[type=email],
                                    input[type=tel],
                                    input[type=password],
                                    textarea,
                                    select {
                                        width: 100%;
                                        display: block;
                                        padding: 12px 15px;
                                        border: 1px solid #ccc;
                                        background: #f9f9f9;
                                    }

                                    .mar-b-0 {
                                        margin-bottom: 0 !important;
                                    }

                                    a {
                                        color: #1754d1;
                                    }

                                    a:hover {
                                        color: #fb8200;
                                    }

                                    html {
                                        overflow-x: hidden;
                                    }

                                    body {
                                        background: url(https://www.noupe.com/wp-content/uploads/2009/10/pattern-13.jpg);
                                        font-family: "Merriweather", serif;
                                        font-weight: 300;
                                        font-size: 14px;
                                        letter-spacing: 1px;
                                    }

                                    .form-wizard {
                                        position: relative;
                                        display: table;
                                        margin: 0 auto;
                                        max-width: 540px;
                                    }

                                    .steps {
                                        margin: 40px 0;
                                        overflow: hidden;
                                    }

                                    .steps ul {
                                        margin: 0;
                                        padding: 0;
                                        list-style: none;
                                    }

                                    .steps ul li {
                                        float: left;
                                        color: #fff;
                                        padding: 0 15px;
                                        position: relative;
                                        cursor: pointer;
                                        -webkit-transition: all 0.4s ease-in-out 0;
                                        -moz-transition: all 0.4s ease-in-out 0;
                                        -ms-transition: all 0.4s ease-in-out 0;
                                        -otransition: all 0.4s ease-in-out 0;
                                        transition: all 0.4s ease-in-out 0;
                                    }

                                    .steps ul li:hover,
                                    .steps ul li.active {
                                        color: #fb8200;
                                    }

                                    .steps ul li:hover span,
                                    .steps ul li.active span {
                                        background: #fb8200;
                                        color: #fff;
                                    }

                                    .steps ul li:hover::after,
                                    .steps ul li.active::after {
                                        background: #fb8200;
                                        width: 100%;
                                    }

                                    .steps ul li::before,
                                    .steps ul li::after {
                                        content: "";
                                        position: absolute;
                                        left: -50%;
                                        top: 22px;
                                        width: 100%;
                                        height: 3px;
                                        background: #fff;
                                        -webkit-transition: all 0.4s ease-in-out 0;
                                        -moz-transition: all 0.4s ease-in-out 0;
                                        -ms-transition: all 0.4s ease-in-out 0;
                                        -otransition: all 0.4s ease-in-out 0;
                                        transition: all 0.4s ease-in-out 0;
                                        -webkit-transform: translateY(-50%);
                                        -moz-transform: translateY(-50%);
                                        -ms-transform: translateY(-50%);
                                        -otransform: translateY(-50%);
                                        transform: translateY(-50%);
                                    }

                                    .steps ul li::after {
                                        width: 0;
                                    }

                                    .steps ul li span {
                                        display: block;
                                        margin: 0 auto 15px;
                                        width: 35px;
                                        height: 35px;
                                        text-align: center;
                                        background: #fff;
                                        font-size: 18px;
                                        line-height: 35px;
                                        font-weight: 300;
                                        color: #000;
                                        position: relative;
                                        z-index: 1;
                                        -webkit-transition: all 0.4s ease-in-out 0;
                                        -moz-transition: all 0.4s ease-in-out 0;
                                        -ms-transition: all 0.4s ease-in-out 0;
                                        -otransition: all 0.4s ease-in-out 0;
                                        transition: all 0.4s ease-in-out 0;
                                        -webkit-border-radius: 2px;
                                        -moz-border-radius: 2px;
                                        -ms-border-radius: 2px;
                                        -oborder-radius: 2px;
                                        border-radius: 2px;
                                    }

                                    .steps ul li:first-child::before,
                                    .steps ul li:first-child::after {
                                        display: none;
                                    }

                                    .form-container {
                                        clear: both;
                                        display: none;
                                        left: 100%;
                                        background: #fff;
                                        padding: 30px;
                                        -webkit-border-radius: 4px;
                                        -moz-border-radius: 4px;
                                        -ms-border-radius: 4px;
                                        -oborder-radius: 4px;
                                        border-radius: 4px;
                                        -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
                                        -moz-box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
                                        -ms-box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
                                        -obox-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
                                        box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
                                    }

                                    .form-container.active {
                                        display: block;
                                    }

                                    .form-title {
                                        margin-bottom: 30px;
                                        padding-bottom: 15px;
                                        position: relative;
                                    }

                                    .form-title::before {
                                        content: "";
                                        position: absolute;
                                        bottom: 0;
                                        left: 50%;
                                        width: 80px;
                                        height: 2px;
                                        background: #fb8200;
                                        -webkit-transform: translateX(-50%);
                                        -moz-transform: translateX(-50%);
                                        -ms-transform: translateX(-50%);
                                        -otransform: translateX(-50%);
                                        transform: translateX(-50%);
                                    }
                                </style>
                                <div class="col-12">

                                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                                        rel="stylesheet">
                                    <div class="container">
                                        <div class="wrapper wrapper-content animated fadeInRight">

                                            <div class="form-wizard">
                                                <div class="steps">
                                                    <ul>
                                                        <li>
                                                            <span>1</span>
                                                            User Billing informations
                                                        </li>
                                                        <li>
                                                            <span>2</span>
                                                            Personal Info
                                                        </li>
                                                        <li>
                                                            <span>3</span>
                                                            Social Info
                                                        </li>
                                                        <li>
                                                            <span>4</span>
                                                            Finish
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="myContainer">
                                                    <div class="form-container animated">
                                                        <h2 class="text-center form-title">Insert Information</h2>
                                                        <form action="{{ route('billings.store') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="name" class="form-control" name="name"
                                                                    id="name" placeholder="Enter Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" name="email"
                                                                    id="email" placeholder="Enter Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="mobile" class="form-control" name="mobile"
                                                                    id="mobile" placeholder="Enter Phone Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="address" id="address" class="form-control" placeholder="Enter Phone Address"></textarea>
                                                            </div>
                                                            <div class="form-group text-center mar-b-0">
                                                                <input type="button" value="NEXT"
                                                                    class="btn btn-primary next">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="form-container animated">
                                                        <h2 class="text-center form-title">Personal Info</h2>
                                                        <form>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="First Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Last Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Phone No.">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea placeholder="Address"></textarea>
                                                            </div>
                                                            <div class="form-group text-center mar-b-0">
                                                                <input type="button" value="BACK"
                                                                    class="btn btn-default back">
                                                                <input type="button" value="NEXT"
                                                                    class="btn btn-primary next">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="form-container animated">
                                                        <h2 class="text-center form-title">Social Media Info</h2>
                                                        <form>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Facebook">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Twitter">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Instagram">
                                                            </div>
                                                            <div class="form-group text-center mar-b-0">
                                                                <input type="button" value="BACK"
                                                                    class="btn btn-default back">
                                                                <input type="button" value="NEXT"
                                                                    class="btn btn-primary next">
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="form-container animated">
                                                        <h2 class="text-center form-title">Finish</h2>
                                                        <form>
                                                            <div class="form-group">
                                                                <h3 class="text-center">Thanks for Stay Tuned!</h3>
                                                                <p class="text-center">Made by <a
                                                                        href="https://codepen.io/HanumanSahay/"
                                                                        target="_blank">@Hanuman Sahay</a></p>
                                                            </div>
                                                            <div class="form-group text-center mar-b-0">
                                                                <input type="button" value="BACK"
                                                                    class="btn btn-default back">
                                                                <input type="submit" value="SUBMIT"
                                                                    class="btn btn-primary submit">
                                                            </div>
                                                        </form>
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
        var totalSteps = $(".steps li").length;

        $(".submit").on("click", function() {
            return false;
        });

        $(".steps li:nth-of-type(1)").addClass("active");
        $(".myContainer .form-container:nth-of-type(1)").addClass("active");

        $(".form-container").on("click", ".next", function() {
            $(".steps li")
                .eq($(this).parents(".form-container").index() + 1)
                .addClass("active");
            $(this)
                .parents(".form-container")
                .removeClass("active")
                .next()
                .addClass("active flipInX");
        });

        $(".form-container").on("click", ".back", function() {
            $(".steps li")
                .eq($(this).parents(".form-container").index() - totalSteps)
                .removeClass("active");
            $(this)
                .parents(".form-container")
                .removeClass("active flipInX")
                .prev()
                .addClass("active flipInY");
        });

        /*=========================================================
        *     If you won't to make steps clickable, Please comment below code
        =================================================================*/
        $(".steps li").on("click", function() {
            var stepVal = $(this).find("span").text();
            $(this).prevAll().addClass("active");
            $(this).addClass("active");
            $(this).nextAll().removeClass("active");
            $(".myContainer .form-container").removeClass("active flipInX");
            $(".myContainer .form-container:nth-of-type(" + stepVal + ")").addClass(
                "active flipInX"
            );
        });
    </script>
@endsection

@section('modal')
@endsection
