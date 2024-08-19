<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin') }}" class="nav-link">PR OverTheTop</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <span class="text-white mr-5">{{  DB::getDefaultConnection(); }}</span>
            <a href="{{ route('balance') }}">

                 {{-- check the user if login  --}}
                 @if (auth()->check())


                    @if (auth()->user()->role == 'super-admin')

                   {{--  <audio allow="autoplay" controls loop="loop" id="myAudio"  src="{{ asset('public/assets/rington/livechat.mp3') }}">
                    </audio> --}}

                  {{--   <audio autoplay id="myAudio" controls loop="loop"  autoplay src="{{ asset('public/assets/rington/livechat.mp3') }}">
                    </audio> --}}

                    {{-- <audio id="myAudio" src="{{ asset('public/assets/rington/livechat.mp3') }}" preload="auto" style="display: none;"></audio> --}}

                   {{--  <audio id="myAudio" controls  preload="auto" controls autoplay loop>
                        <source src="{{ asset('public/assets/rington/livechat.mp3') }}" type="audio/mpeg">
                    </audio> --}}

                   {{--  <audio id="myAudio" class="audio" controls muted autoplay>
                        <source src="{{ asset('public/assets/rington/livechat.mp3') }}" type="audio/mpeg" />
                      </audio> --}}

                    {{-- <span class="btn btn-warning">
                        <span style="font-size: 20px;">PR Content Balance: ${{ \App\Models\Payment::sum('amount') }}
                        </span>
                    </span>

                    <span class="btn btn-info mx-3">
                        <span style="font-size: 20px;">Balance Completed Tasks: ${{ \App\Models\Task::where('status',5)->sum('task_price') }}
                        </span>
                    </span> --}}


                    <span class="btn btn-warning">
                        <span style="font-size: 20px;">PR Content Balance: ${{ \App\Models\Payment::sum('amount') }}
                        </span>
                    </span>

                    <span class="btn btn-info mx-3">
                        <span style="font-size: 20px;">Balance Completed Tasks: ${{ \App\Models\Task::where('status',5)->sum('task_price') }}
                        </span>
                    </span>

                    @else
                    <span class="btn btn-warning">
                        <span style="font-size: 20px;">Balance: ${{ $balance ?? 0 }} </span>
                    </span>
                        {{--  <span style="font-size: 20px;">Balance: ${{ \App\Models\Payment::where('user_id',auth()->user()->id)->sum('amount') }} </span> --}}

                    @endif

                    @endif


            </a>
        </li>


        {{--  start notification --}}
        {{--  <li class="nav-item ml-3 mr-5">
           <svg style="width: 25px" style="width: 30px;color:rgba(255, 255, 255, 0.7)" class="svg-inline--fa fa-bell fa-w-14 fs-2 mb-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor" d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"></path>
            </svg>
            <span class="badge badge-danger" style="position:absolute;color: rgba(255, 255, 255, 0.7)">100</span>
         </li>

        <li class="nav-item">
            <a class="nav-link" id="btntheme" role="button">
                <i id="icontheme" class="fas fa-sun"></i>
            </a>
        </li> --}}
         {{--  end notification --}}


         @if (auth()->user()->role == 'super-admin')
         {{-- notification --}}

<style>
a{
  text-decoration: none;
  color: black;
}

a:visited{
  color: black;
}

.box::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
    border-radius: 5px
}

.box::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
    border-radius: 5px
}

.box::-webkit-scrollbar-thumb
{
	background-color: black;
	border: 2px solid black;
    border-radius: 5px
}


.icons{
  display: inline;
  float: right
}

.notification-container {
            position: relative;
            display: inline-block;
        }

.notification{
  padding-top: 10px;
  position: relative;
  display: inline-block;
}

.number{
  height: 28px;
  width:  26px;
  background-color: #d63031;
  border-radius: 20px;
  color: white;
  text-align: center;
  position: absolute;
  top: 0px;
  left: 66px;
  padding: 0px;
  border-style: solid;
  border-width: 2px;
}

.number:empty {
   display: none;
}

.notBtn{
  transition: 0.5s;
  cursor: pointer
}

.fas{
  /* font-size: 25pt;padding-bottom: 10px;margin-right: 40px;margin-left: 40px; */
}

.box{
  width: 400px;
  height: 0px;
  border-radius: 10px;
  transition: 0.5s;
  position: absolute;
  overflow-y: scroll;
  padding: 0px;
  left: -305px;
  margin-top: 5px;
  background-color: #F4F4F4;
  -webkit-box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.2);
  -moz-box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.1);
  box-shadow: 10px 10px 23px 0px rgba(0,0,0,0.1);
  cursor: context-menu;
}

.fas:hover {
  color: #d63031;
}

.notBtn:hover > .box{
  height: auto
}

.content{
  padding: 20px;
  color: black;
  vertical-align: middle;
  text-align: left;
}

.gry{
  background-color: #F4F4F4;
}

.top{
  color: black;
  padding: 10px
}

.display{
  position: relative;
  height: 240px; /* 240px */
  display: block;
}

.cont{
  position: absolute;
  top: 0;
  width: 100%;
  height: auto;
  background-color: #F4F4F4;
}

.cont:empty{
  display: none;
}

.stick{
  text-align: center;
  display: block;
  font-size: 50pt;
  padding-top: 70px;
  padding-left: 80px
}

.stick:hover{
  color: black;
}

.cent{
  text-align: center;
  display: block;
}

.sec{
  padding: 25px 10px;
  background-color: #F4F4F4;
  transition: 0.5s;
}

.profCont{
  padding-left: 15px;
}

.profile{
  -webkit-clip-path: circle(50% at 50% 50%);
  clip-path: circle(50% at 50% 50%);
  width: 75px;
  float: left;
}

.txt{
  vertical-align: top;
  font-size: 1.25rem;
  padding: 5px 10px 0px 69px;
}

.sub{
  font-size: 1rem;
  color: grey;
}

.new{
  border-style: none none solid none;
  border-color: red;
}

.sec:hover{
  background-color: #BFBFBF;
}

.dropdown-menu-lg {
   min-width: 390px !important;
}


 </style>


         {{-- notification --}}
      {{--   <div class="task_notifications">
            <div class = "icons">
            <div class = "notification">
              <a href = "#">
              <div class = "notBtn" href = "#">

                <div class ="number">
                   <span id="number"> {{ $notifications_count }} </span>


                   </span>
                </div>
                <i style="font-size: 25pt;padding-bottom: 10px;margin-right: 40px;margin-left: 40px;" class="fas fa-bell"></i>
                  <div style="margin-top: -2px;" class = "box">
                    <div style="height:{{ (!empty($notifications) && count($notifications) > 0) ? '' : '120px'  }}" class = "display">


                      @if(!empty($notifications) && count($notifications) > 0)
                      <div class = "cont">
                        @foreach ($notifications as $notification)
                            <div class = "sec new">
                        @if( $notification->task_id == null)
                            <a href = "{{ route('balance',['id'=>$notification->id]) }}">
                        @else
                        <a href="{{ route('super_admin_open_task' , ['task_id' => $notification->task_id , 'user_id' => $notification->task->user->id , "project_id" => $notification->task->project_id]) }}">
                        @endif
                            <div class = "profCont">
                            <img style="width: 45px;height: 45px;border-radius: 100%" class = "profile" src = "{{ $notification->user->GetPicture() }}">
                                </div>
                            @if( $notification->task_id == null)
                               <div class = "txt">{{ $notification->user->name }} Make Payment with amount : ${{ $notification->payement['amount'] ?? '' }}</div>
                               <div class = "txt sub">{{ $notification->created_at->format('m/d/Y H:i') }} - {{ $notification->created_at->diffForHumans() }}</div>

                            @else
                               <div class = "txt">{{ $notification->user->name }} Create New Task , Task Type : {{ $notification->task->task_type() }} , Att Publisher : {{  $notification->task->site->site_url  }}</div>
                               <div class = "txt sub">{{ $notification->created_at->format('m/d/Y H:i') }} - {{ $notification->created_at->diffForHumans() }}</div>
                            @endif

                            </a>
                             </div>
                        @endforeach
                      </div>
                       @else
                        <div class = "cont text-center mt-5" id='notification_panel'>
                          <span id="alert_not" class="alert no_notification alert-danger">There is No Notification</span>
                        </div>

                       @endif


                    </div>
                 </div>
              </div>
                </a>
            </div>
            </div>
        </div> --}}


          {{-- notification --}}

          <hr>


          {{-- start second notification --}}
             <div class="task_notifications">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                    <i style="font-size: 28px;" class="far fa-bell"></i>
                    <span style="top:0px;right: 2px;font-size: 15px;" class="badge badge-warning navbar-badge count_notification_number_1">{{ $notifications_count }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;width: 400px;">
                    <span class="dropdown-item dropdown-header bg-primary text-white"><span class="count_notification_number_2">{{ $notifications_count }}</span> Notifications</span>

                    <div class="dropdown-divider"></div>

                    <div id="not" style="margin-top: 5px;margin-bottom: 5px;overflow-y: auto;{{ ($notifications_count <= 0) ? '' : 'height: auto' }};max-height: 600px" class="row d-flex justify-content-center notification_container">
                    @if(!empty($notifications) && count($notifications) >= 1)
                    @foreach ($notifications as $notification)


                    @if( $notification->task_id == null)
                    <div class="dropdown-divider"></div>
                    <a style="margin-left: 24px;padding-top: 20px;padding-bottom: 20px;border-bottom: #4B49AC solid 1px;margin-bottom: 2px;border-top: {{ ($loop->first)? '#4B49AC solid 1px':'' }}" href = "{{ route('balance',['id'=>$notification->id]) }}">
                    @else
                    <a style="padding-top: 20px;padding-bottom: 20px;border-bottom: #4B49AC solid 1px;margin-bottom: 2px;border-top: {{ ($loop->first)? 'solid 1px;margin-bottom':'' }}" href="{{ route('super_admin_open_task' , ['task_id' => $notification->task_id , 'user_id' => $notification->task->user->id , "project_id" => $notification->task->project_id]) }}">
                    @endif

                        <img style="width: 25px;height: 25px;border-radius: 100%" class = "ml-2" src = "{{ $notification->user->GetPicture() }}">

                       @if( $notification->task_id == null)
                           <span class="ml-3 text-muted" style="font-size: 9px"> {{ $notification->user->name }} Make Payment amount : ${{ $notification->payement['amount'] ?? '' }} </span>
                       @else
                           <span class="ml-3 text-muted" style="font-size: 14px"> {{ $notification->user->name }} Create New Task </span>
                       @endif

                    <span style="padding: 38px;font-size: 11px !important;" class="text-sm"> {{ $notification->created_at->diffForHumans() }}</span>
                    </a>


                    <div class="dropdown-divider"></div>


                    @endforeach

                    @else
                        {{--  <div id="not" style="margin-top: 5px;margin-bottom: 5px;display: none" class="row activate_div notification_container"></div> --}}
                      <div id="alert_not" class="text-center my-2">
                        <span  class="ml-3 text-danger text-center my-5" style="font-size: 10px">There is No Notification</span>
                     </div>
                     @endif
                    </div>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="{{-- dropdown-item  --}}dropdown-footer">
                        <div class="row d-flex justify-content-between">
                            <a href="{{ route('all_new_tasks') }}" style="margin: -8px;margin-bottom: 11px;" class="mr-auto"><span class="ml-3"><i class="fa fa-tasks mr-2" aria-hidden="true"></i>Tasks</span></a>
                            <a href="{{ route('balance') }}" style="margin: -8px;margin-right: 38px;margin-bottom: 11px;"><span class="ml-3"><i class="fa fa-credit-card mr-2" aria-hidden="true"></i>Payments</span></a>
                        </div>
                    </a>
                    </div>

                </li>
             </div>
          {{-- end second notification --}}
          @endif




        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}" target="_bkank" role="button">
                <i class="fas fa-globe"></i>
            </a>
        </li>
        <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link pr-0" id="navbarDropdownUser" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <div class="avatar avatar-xl">
                    <img style="width: 35px" class="rounded-circle shadow border-primary mr-3"
                    @if (auth()->check())
                        src="{{ (!empty(\App\Helpers\SettingHelper::getValue('logo'))) ? url('').'/public'.(\App\Helpers\SettingHelper::getValue('logo')) : Auth::user()->GetPicture()  }}"
                        alt="{{ auth()->user()->name }}">
                    @endif
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right my-4 py-0" aria-labelledby="navbarDropdownUser" style="width: 193px;left: inherit;right: 39px;">
                <div class="bg-white rounded-soft py-2">
                  @if (auth()->check())
                   @if (auth()->user()->role == 'super-admin')
                    <a class="dropdown-item has-icon loading-trigger" href="{{ route('application_settings') }}">
                        <i class="fa fa-cog mr-2"></i>Application Settings
                     </a>
                     @endif
                     @endif

                    <a class="dropdown-item has-icon loading-trigger" href="{{ route('profiles.index') }}"><svg style="width: 25px"
                            class="svg-inline--fa fa-user-cog fa-w-20 mr-2" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="user-cog" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6c-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7.9-2.9 2.2-5.8 3.2-8.7-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5-1.2-3.8-2-7.7-2-11.8v-9.2z">
                            </path>
                        </svg>Profile
                    </a>

                    <a class="dropdown-item has-icon loading-trigger" href="{{ route('settings') }}">
                        @if (auth()->check())
                        <i class="fa fa-cog mr-2"></i>{{ (auth()->user()->role == 'super-admin')? 'Super-Admin' : 'User' }} Settings
                        @endif
                     </a>

                    <a class="dropdown-item has-icon loading-trigger" href="{{ route('balance') }}"><svg style="width: 25px"
                            class="svg-inline--fa fa-wallet fa-w-16 mr-2" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="wallet" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M461.2 128H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h384c8.84 0 16-7.16 16-16 0-26.51-21.49-48-48-48H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h397.2c28.02 0 50.8-21.53 50.8-48V176c0-26.47-22.78-48-50.8-48zM416 336c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z">
                            </path>
                        </svg>Balance</a>

                        <a class="dropdown-item has-icon loading-trigger" href="{{ route('all_packages') }}">
                            <svg class="fa-w-16 mr-2" style="width: 25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/>
                            </svg>
                        </svg>Packages</a>


                    <div class="dropdown-divider"></div>
                    @if (auth()->check())
                    @if (auth()->user()->role == 'super-admin')
                    <a class="dropdown-item has-icon" href="{{ route('contacts') }}">
                       <svg style="width: 25px"
                            class="svg-inline--fa fa-comment-dots fa-w-16 mr-2" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="comment-dots" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32zM128 272c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z">
                            </path>
                        </svg>Messages</a>
                     @endif
                     @endif


                    <a style="width: 120px;height: 35px;" class="dropdown-item has-icon text-danger loading-triggerr" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg style="width: 25px" class="svg-inline--fa fa-sign-out-alt fa-w-16 mr-2" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="sign-out-alt" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z">
                                </path>
                            </svg></i> {{ __('Logout') }} &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                            </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>
        </li>

    </ul>
</nav>
