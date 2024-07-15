
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>{{ ($title) ?? ''." - "}}PR Over The Top</title>
        <link rel="icon" href="{{ asset('public/assets/images/favicon.png') }}" type="image/png" />
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
       {{--  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script> --}}
        {{-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> --}}
        <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />

        {{-- <script type="module" src="{{ URL::asset('assets/vendor/ckeditor.js') }}"></script> --}}

        <script src="{{ asset('public/js/app.js') }}" defer></script>


        @yield('style')
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

        .btn-outline-purple{color:purple;border-color:purple}
        .btn-outline-purple:hover{color:#fff;background-color:purple;border-color:purple}
        .btn-outline-purple.focus,
        .btn-outline-purple:focus{box-shadow:0 0 0 .2rem rgba(138, 43, 226)}
        .btn-outline-purple.disabled,
        .btn-outline-purple:disabled{color:purple;background-color:transparent}
        .btn-outline-purple:not(:disabled):not(.disabled).active,
        .btn-outline-purple:not(:disabled):not(.disabled):active,.show>
        .btn-outline-purple.dropdown-toggle{color:purple;/* background-color:purple; */border-color:purple}
        .btn-outline-purple:not(:disabled):not(.disabled).active:focus,
        .btn-outline-purple:not(:disabled):not(.disabled):active:focus,.show>
        .btn-outline-purple.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgb(153,50,204)}

        .btn-outline-purple:hover{
        color: #fff !important;
        border-color: purple;
        }

        .cke_notifications_area{
          display: none;
        }



        </style>

          @livewireStyles

    </head>
    <body class="hold-transition  sidebar-mini layout-fixed">
        @php
            if (!$errors->isEmpty()) {
                alert()->error('Pemberitahuan', implode('<br>', $errors->all()))->toToast()->toHtml();
            }
        @endphp
        <div {{-- id="app" --}} class="wrapper">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


        @stack('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.4/howler.min.js" integrity="sha512-xi/RZRIF/S0hJ+yJJYuZ5yk6/8pCiRlEXZzoguSMl+vk2i3m6UjUO/WcZ11blRL/O+rnj94JRGwt/CHbc9+6EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            /* $(document).ready(function(){
               // Play the audio when the page loads
                window.onload = function() {
                    var audio = document.getElementById('myAudio');
                    audio.play().catch(function(error) {
                        console.log('Autoplay was prevented:', error);
                    });
                }
            }) */
        </script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

        @livewireScripts

 @if (auth()->user())


@if (auth()->user()->role == 'super-admin')
<script>

$(document).ready(function(){

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        // pusher creditial
        var pusher = new Pusher('74b3e16fd1d7c4a266a3', {
            cluster: 'ap2',
            encrypted: true
        });

        // task chanel
        let channel = pusher.subscribe('task_chanel');
        channel.bind('App\\Events\\TaskNotification', function(data) {
            console.log(data);

            let element = document.getElementById('my_alert');
            console.log(element);
            let notifications_count = parseInt($('#number').text(), 10);
            notifications_count = notifications_count + 1;
            console.log(notifications_count);
            $('#my_alert').css('display', 'block');
            $('#number').text(notifications_count);
            $('#input_notification').value = notifications_count;
            // render notiication
            addNotification(data, 'task');
          });

          // payment chanel
          let payment_channel = pusher.subscribe('payement_chanel');
          payment_channel.bind('App\\Events\\PaymentNotification', function(data) {
            console.log(data);

            let element = document.getElementById('my_alert');
            let notifications_count = parseInt($('#number').text(), 10);
            notifications_count = notifications_count + 1;
            console.log(notifications_count);
            $('#my_alert').css('display', 'block');
            $('#number').text(notifications_count);
            $('#input_notification').value = notifications_count;
            // render notiication
            addNotification(data, 'payment');

            /* var notificationsContainer = document.querySelector('.cont');
            var notificationHTML = `<div class="sec new">
            <a href="${data.url}">
                <div class="profCont">
                <img style="width: 45px;height: 45px;border-radius: 100%" class="profile" src="${data.user_image}">
                </div>
                <div class="txt">${data.username} Make Payment with amount : $${data.amount}</div>
                <div class="txt sub">${data.time}</div>
            </a>
            </div>`;

            notificationsContainer.innerHTML += notificationHTML; // Append new notification */

          });


          function addNotification(data, type) {
            var notificationsContainer = document.querySelector('.cont');
            var notificationHTML = '';

          /*  var no_notification = document.getElementById('alert_not');
            no_notification.style.display = 'none'; */

            /* var no_notification_2 = document.getElementById('notification_panel');
            no_notification_2.style.display = 'none'; */

            var no_notification = document.getElementById('alert_not');
            if(no_notification){
                no_notification.style.display = 'none';
            }


           /*  var noNotificationMessage = document.getElementById('alert_not');
            var notificationHTML = ''; */


            if (type === 'payment') {
            notificationHTML = `<div class="sec new">
            <a href="${data.url}">
                <div class="profCont">
                <img style="width: 45px;height: 45px;border-radius: 100%" class="profile" src="${data.user_image}">
                </div>
                <div class="txt">${data.username} Make Payment with amount : $${data.amount}</div>
                <div class="txt sub">${data.time}</div>
            </a>
            </div>`;
            } else if (type === 'task') {
            notificationHTML = `<div class="sec new">
                <a href="${data.url}">
                <div class="profCont">
                    <img style="width: 45px;height: 45px;border-radius: 100%" class="profile" src="${data.user_image}">
                </div>
                <div class="txt">${data.username} Create New Task, Task Type: ${data.task_type}, Att Publisher: ${data.site_url}</div>
                <div class="txt sub">${data.time}</div>
                </a>
            </div>`;
            }

            notificationsContainer.innerHTML += notificationHTML; // Append new notification
        }

});


</script>
@endif

@endif

    </body>
</html>
