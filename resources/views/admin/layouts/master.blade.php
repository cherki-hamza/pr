
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" >
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

        // get the task notification from navbar
        let notifications_count_1 = parseInt($('.count_notification_number_1').text(), 10);
        notifications_count_1 = notifications_count_1 + 1;
        $('.count_notification_number_1').text(notifications_count_1);

        let notifications_count_2 = parseInt($('.count_notification_number_2').text(), 10);
        notifications_count_2 = notifications_count_2 + 1;
        $('.count_notification_number_2').text(notifications_count_2);

        // get the task notification from sidebar
        let task_sidebar_notification = parseInt($('.task_sidebar_notification').text(), 10);
        task_sidebar_notification = (task_sidebar_notification +1);
        $('.task_sidebar_notification').text(task_sidebar_notification);

        // render notiication
        addNotification(data, 'task');
         // render the task tr
         push_task_tr(data);

      });

      // payment chanel
      let payment_channel = pusher.subscribe('payement_chanel');
      payment_channel.bind('App\\Events\\PaymentNotification', function(data) {
         console.log(data);

        let notifications_count_1 = parseInt($('.count_notification_number_1').text(), 10);
        notifications_count_1 = notifications_count_1 + 1;
        $('.count_notification_number_1').text(notifications_count_1);

        let notifications_count_2 = parseInt($('.count_notification_number_2').text(), 10);
        notifications_count_2 = notifications_count_2 + 1;
        $('.count_notification_number_2').text(notifications_count_2);

        // render notiication
        addNotification(data, 'payment');


      });


      function addNotification(data, type) {
        var notificationsContainer = document.querySelector('#not');
        //var notificationsContainer = document.querySelector('#not')
        console.log(notificationsContainer);
        var notificationHTML = '';

        var no_notification = document.getElementById('alert_not');
        if(no_notification){
            // hide the no notification
            no_notification.style.display = 'none';
        }


        if (type === 'payment') {
            notificationHTML = `
             <div class="dropdown-divider"></div>
               <a style="margin-left: 24px;padding-top: 20px;padding-bottom: 20px;border-top:#4B49AC solid 1px" href = "${data.url}">
                 <img style="width: 25px;height: 25px;border-radius: 100%" class = "ml-2" src = "${data.user_image}">
                 <span class="ml-3 text-muted" style="font-size: 9px"> ${data.username} Make Payment amount : $${data.amount} </span>
                 <span style="padding: 38px;font-size: 11px !important;" class="text-sm"> ${data.time}</span>
               </a>
               <div class="dropdown-divider"></div>`;

        } else if (type === 'task') {
            notificationHTML =  `
           <div class="dropdown-divider"></div>
                 <a style="padding-top: 20px;padding-bottom: 20px;" href="${data.site_url}">
                  <img style="width: 25px;height: 25px;border-radius: 100%" class = "ml-2" src = "${data.user_image}">
                  <span class="ml-3 text-muted" style="font-size: 14px"> ${data.username} Create New Task </span>
                  <span style="padding: 38px;font-size: 11px !important;" class="text-sm">${data.time}</span>
                 </a>
                 <div class="dropdown-divider"></div>`;
        }


            // Get the container that holds the links
             var div = $('#not');

             //console.log(div[0]);


            // Insert the new link before the first link
            if (div.find('a:first').length) {
                    div.find('a:first').before(notificationHTML);
            } else {
                div.append(notificationHTML);
            }

        // Optionally, log the entire container to see the result
        //console.log(container.innerHTML);

        //document.querySelector('#not').innerHTML += notificationHTML; // Append new notification
      }

    // function for add real time task tr first
     function push_task_tr(data){

        // Get the table by ID or another selector
          var table = document.getElementById('table');
          var tbody = table.tBodies[0];

            // Create a new tr element
            var newRow = document.createElement('tr');
            // add class bg-warning
            newRow.classList.add('bg-warning');

            // Add cells and content to the newRow
            newRow.innerHTML = `
                <td><img style="width: 40px;border-radius: 100%" src="${data.user_image}"></td>
                <td>${data.username}</td>
                <td>${data.task_project_name}</td>
                <td><a href="${data.publisher_url}" target="_blink">${data.publisher_url}</a></td>
                <td>${data.time}</td>
                <td>${data.task_type}</td>
                <td>
                    <span class="badge badge-secondary p-2" title="Task Not Started">
                    NOT STARTED
                    </span>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="${data.url}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye mr-2"></i>Open The Task
                        </a>
                    </div>
                </td>`;


                if (tbody.rows.length > 0) {
                    tbody.insertBefore(newRow, tbody.rows[0]);
                    //let result =  table.outerHTML;
                    //console.log(result);
                } else {
                    // If no rows are present, just append the new row
                    tbody.appendChild(newRow);
                }


                //table.innerHTML += table.outerHTML;




     }

});



</script>
@endif

@endif

    </body>
</html>
