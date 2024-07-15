@extends('admin.layouts.master')
@section('style')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <li class="breadcrumb-item active">Hamza Pusher Notifications</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="card">
        <h1>Pusher Test</h1>
        <p id="my_alert" style="display: none" class="alert alert-success">hello this task from pusher</p>
        <p>
          Try publishing an event to channel <code>my-channel</code>
          with event name <code>my-event</code>.
        </p>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@section('js')

{{-- <script src="{{ asset('public/js/audio.js') }}"></script>
<script>
    var audioPlayer = play('{{ asset('public/assets/rington/livechat.mp3') }}');
    audioPlayer.play();
</script> --}}

{{-- @if (auth()->user())


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

@endif --}}
@endsection
