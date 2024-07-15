<template>
   <div class="container text-primary">
     <h1>Im from vue js {{ notification }}</h1>
     <span class="btn btn-danger">send</span>
   </div>
</template>

<script>

import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'prKey',
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    cluster: 'mt1',//added this line
});
     export default {
        name: 'NotificationComponent',
        data(){
            return{
                notification:''
            }
        },
        mounted() {
             console.log('Component mounted');

             window.Echo.channel('Notification')
                    .listen('TaskNotification', (e) => console.log('TaskNotification: ' + e.notification))
                    .error((error) => {
                        console.log('Error:', error);
                    });

            window.Echo.channel('Notification')
                .subscribed((event) => {
                    console.log(event.notification);
                    console.log('Subscription succeeded');
                });
      }

     }
</script>

