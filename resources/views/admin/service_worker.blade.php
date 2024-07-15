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
                            <li class="breadcrumb-item active">Pusher Notifications with service worker</li>
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
                <h1>this is push notification with service worker</h1>
                <div class="dev">

                     <div class="card">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-5">
                                    <button class="btn btn-warning" onclick="askForPermission()">Enable notification</button>
                                 </div>
                                 <div class="col-2">
                                 </div>
                                 <div class="col-5">
                                    <button class="btn btn-primary" onclick="sendNotification()">Send notification</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

<script>
    async function registerServiceWorker() {
      try {
        indexedDB.deleteDatabase(location.host);
        const registration = await navigator.serviceWorker.register("{{ asset('public/js/service_worker.js') }}");
        console.log('Service worker registered with scope:', registration.scope);

        await registration.update(); // Ensures the service worker is up to date

        const readyRegistration = await navigator.serviceWorker.ready;
        console.log('Service worker is ready:', readyRegistration);

        await askForPermission();
      } catch (error) {
        console.error('Service worker registration or readiness failed:', error);
      }
    }

    async function askForPermission() {
      try {
        const permission = await Notification.requestPermission();

        if (permission === 'granted') {



            console.log(navigator.serviceWorker.ready);


          const sw = await navigator.serviceWorker.ready;



          // Convert the VAPID public key to Uint8Array
          const convertedVapidKey = urlBase64ToUint8Array("BDIEYPUFwGQ7mjegLJx1VVjdJGvEz9atSeJc8KqqqClmjneHn-LBQJHlQJcemCYK0qhZ0bu3Ig4KmcJyJD4582A");
          console.log('Converted VAPID key:', convertedVapidKey);

          // Subscribe to push notifications
          const subscription = await sw.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: convertedVapidKey
          });

          console.log('Push subscription:', subscription);
          console.log('Endpoint:', subscription.endpoint);
        } else {
          console.log('Notification permission denied');
        }
      } catch (error) {
        console.error('Failed to request notification permission or subscribe to push notifications:', error);
      }
    }

    // Function to convert the VAPID public key to a Uint8Array
    function urlBase64ToUint8Array(base64String) {
      const padding = '='.repeat((4 - base64String.length % 4) % 4);
      const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');
      const rawData = window.atob(base64);
      const outputArray = new Uint8Array(rawData.length);
      for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
      }
      return outputArray;
    }

    // Register the service worker when the page loads
    window.addEventListener('load', registerServiceWorker);
  </script>







{{--
         Public Key:
            BDIEYPUFwGQ7mjegLJx1VVjdJGvEz9atSeJc8KqqqClmjneHn-LBQJHlQJcemCYK0qhZ0bu3Ig4KmcJyJD4582A

         Private Key:
            pWI30E12xt8d9G-YJfV5UwnT-ay3-umV4_-4n_sjQsA
--}}


  {{--
            Public Key:
            BEkXamLL8ZVLE3CmFDRs4e0CUjvhtDOy2_MQ4GjROk4D_73VGxavT7qlkSgBHH0E5C4QiaGjyZDp0BGWOERMTX8

            Private Key:
            sRjjx3-g8x0eJkV5vURDlbyGaNzLTlbV3TM28TN9EiQ
  --}}
@endsection

