
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>{{ ($title) ?? ''." - "}}PR Over The Top</title>
        <link rel="icon" href="" type="image/png" />
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('public/template/admin/dist/css/adminlte.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        {{-- select2 --}}
        <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

       {{--  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" /> --}}
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


        @stack('style')
        <style>

         h1 {
           font-size: 20px;
           text-align: center;
           margin: 20px 0 20px;
         }
         h1 small {
           display: block;
           font-size: 15px;
           padding-top: 8px;
           color: gray;
         }
         .avatar-upload {
           position: relative;
           max-width: 205px;
           margin: 50px auto;
         }
         .avatar-upload .avatar-edit {
           position: absolute;
           right: 12px;
           z-index: 1;
           top: 10px;
         }
         .avatar-upload .avatar-edit input {
           display: none;
         }
         /* .avatar-upload .avatar-edit input + label {
           display: inline-block;
           width: 34px;
           height: 34px;
           margin-bottom: 0;
           border-radius: 100%;
           background: #ffffff;
           border: 1px solid transparent;
           box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
           cursor: pointer;
           font-weight: normal;
           transition: all 0.2s ease-in-out;
         } */
         /* .avatar-upload .avatar-edit input + label:hover {
           background: #f1f1f1;
           border-color: #d6d6d6;
         } */
         /* .avatar-upload .avatar-edit input + label:after {
           content: "\f040";
           font-family: "FontAwesome";
           color: #757575;
           position: absolute;
           top: 10px;
           left: 0;
           right: 0;
           text-align: center;
           margin: auto;
         } */
         .avatar-upload .avatar-preview {
           width: 80px;
           height: 80px;
           position: relative;
           border-radius: 100%;
           border: 6px solid #f8f8f8;
           box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
         }
         .avatar-upload .avatar-preview > div {
           width: 100%;
           height: 100%;
           border-radius: 100%;
           background-size: cover;
           background-repeat: no-repeat;
           background-position: center;
         }

         /* swicher  */



        </style>
    </head>
    <body class="hold-transition  sidebar-mini layout-fixed">
        @php
            if (!$errors->isEmpty()) {
                alert()->error('Pemberitahuan', implode('<br>', $errors->all()))->toToast()->toHtml();
            }
        @endphp
        <div class="wrapper">
            <!-- Preloader -->
            {{-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset(Setting::getValue('app_logo')) }}" alt="{{ Setting::getName('app_name') }}" height="60" width="60">
            </div> --}}

            <!-- Navbar -->
            @include('admin.layouts.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->
            @yield('modal')
            @include('admin.layouts.modal')
            @include('sweetalert::alert')
            @include('admin.layouts.footer')
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
        @yield('js')
        @include('admin.layouts.script')
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('public/template/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('public/template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        <!-- overlayScrollbars -->
        <script src="{{ asset('public/template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        {{-- select2 --}}

        <!-- AdminLTE App -->
        <script src="{{ asset('public/template/admin/dist/js/adminlte.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        @include('sweetalert::alert')





        @stack('script')
    </body>
</html>
