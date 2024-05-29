@extends('admin.layouts.master')

@section('style')
<style>
    .tawk-branding{
        display: none;
    }
</style>
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


                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="mt-n2 mb-n2 d-flex">
                                    <h5 class="align-middle text-white"> Task ID #{{ $task->id }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form
                                        action="{{ route('handel_task', ['project_id' => request()->project_id,'user_id' => $task->user_id , 'task_id' => request()->task_id, 'post_id' => $post->id ?? '']) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf


                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="bg-primary text-white">Service Type</td>
                                                <td class="text-primary font-weight-bold">
                                                    {{ $task->task_type == 'c_p' ? 'Content Placement' : 'Content Creation And Placement' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Price</td>
                                                <td class="text-primary font-weight-bold">${{ $task->order->price }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Task Status</td>
                                                <td>{{ $task->show_status() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Link Type</td>
                                                <td>DoFollow</td>
                                            </tr>

                                            <tr>
                                                <td class="bg-primary text-white">Publisher's URL</td>
                                                <td><a href="{{ $task->site->site_url }}" target="_blank" rel="nofollow">
                                                        {{ $task->site->site_url }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Anchor Text</td>
                                                <td>{{ $task->task_anchor_text }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Target URL</td>
                                                <td><a href="{{ $task->task_target_url }}"
                                                        target="_blank">{{ $task->task_target_url }}</a></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Post Placement URL</td>
                                                <td class="table-success"><a href="#" target="_blank"
                                                        class="font-weight-bold">{{ ($post) ? $post->post_title : '' }}</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="bg-primary text-white">Special Requirement</td>
                                                <td>
                                                    <textarea name="editor" id="editor" class="form-control" rows="6" wrap="soft" readonly="">{!! $task->task_special_requirement !!}</textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="card ">
                                <div class="card-header">
                                    @if (!empty($post) )

                                    @if ($post->status == 2)
                                     <p style="font-size: 20px" class="alert alert-warning my-4 text-center">
                                        Your Post Content is Ready Now , check it and if it's Satisfy for You  Approve it for complete the Task Or Take it To the
                                        Improvement zone Or Reject It And Write a note for Improve and Regenerate you Post
                                    </p>
                                    @endif


                                  @endif

                                </div>

                                <div class="card-body">

                                    {{-- <button onclick="Export2Doc('content-to-pdf');">Export as .doc</button> --}}
                                    {{-- @if ($post->status == 5)
                                    <div  class="my-3"> --}}
                                    {{-- <button onclick="Export2Doc('exportContent');"  class="btn  ml-1 mt-2" style="background-color:#3c5a99; color:white">
                                        <i class="mr-2" data-fa-i2svg="">
                                            <svg style="width: 22px" class="svg-inline--fa fa-file-word fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-word" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm57.1 120H305c7.7 0 13.4 7.1 11.7 14.7l-38 168c-1.2 5.5-6.1 9.3-11.7 9.3h-38c-5.5 0-10.3-3.8-11.6-9.1-25.8-103.5-20.8-81.2-25.6-110.5h-.5c-1.1 14.3-2.4 17.4-25.6 110.5-1.3 5.3-6.1 9.1-11.6 9.1H117c-5.6 0-10.5-3.9-11.7-9.4l-37.8-168c-1.7-7.5 4-14.6 11.7-14.6h24.5c5.7 0 10.7 4 11.8 9.7 15.6 78 20.1 109.5 21 122.2 1.6-10.2 7.3-32.7 29.4-122.7 1.3-5.4 6.1-9.1 11.7-9.1h29.1c5.6 0 10.4 3.8 11.7 9.2 24 100.4 28.8 124 29.6 129.4-.2-11.2-2.6-17.8 21.6-129.2 1-5.6 5.9-9.5 11.5-9.5zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z">
                                                </path>
                                            </svg>
                                        </i>Download Post (DOC)
                                    </button> --}}

                                    {{-- <button onclick="convertToDocx()">Convert to DOCX</button><br>
                                       <a id="downloadLink" style="display:none">Download Post (DOC)</a>
                                    </div>

                                    @endif --}}

                                    @if (!empty($task) && $task->type == 'c_p')

                                    @if($task->status == 5)
                                    <div class="my-2 px-5">
                                        <label class="text-primary" for="post_placement_url">Post Placement URL:</label>
                                        <input  style="color: red;" value="{{ (!empty($task)) ? 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) : '' }}" type="text" class="form-control" name="post_placement_url" id="post_placement_url">
                                    </div>
                                    @endif

                                      <div class="my-2 px-5">
                                          <label class="text-primary" for="post_editor_data">Post Content  :	</label>
                                          <textarea  id="post_editor_data"   class="my-3" name="post_editor_data">{!! ($task) ? $task->task_editor_data : '' !!}</textarea>
                                        </div>

                                    @else


                                    <hr style="border: #3c5a99 solid 2px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <label style="font-size: 20px">Content to be published  :</label>
                                        </div>
                                        @if ($task->status == 5)
                                            <div class="col-md-6 text-right">
                                                <span style="font-weight: 900;font-size: 22px" class="text-primary">Post URL Published : </span>
                                                <span style="font-weight: 700;font-size: 22px" class="text-danger"> <a class="text-danger" target="_blink" href="#">{{ (empty($task->post_placement_url)) ? $task->site->site_url.'/'.Str::slug($task->task_anchor_text) :  $task->post_placement_url   }}</a></span>

                                            </div>
                                        @endif
                                    </div>

                                    {{-- <textarea readonly="true" id="summernote" class="my-3" name="post_editor_data">{!! $post->post_body ?? '' !!}</textarea> --}}

                                    <textarea readonly class="form-control"  id="post_editor_data" class="my-3" name="post_editor_data">{!! $task->task_editor_data ?? '' !!}</textarea>
                                    <br>


                                    <hr style="border: #3c5a99 solid 2px;">

                                        @if(!empty($task) && $task->status == 2)
                                        <label for="">Write Your Notes: <span class="text-danger">(This note is not Important you can leave empty)</span></label>
                                        <textarea class="form-control" name="post_note" cols="30" rows="3" placeholder="Write your Notes"></textarea>
                                        @endif

                                        @if(!empty($task) && $task->status == 4)
                                        <label>Your Note :</label>

                                        {{-- @php echo str_replace("<br/>","\n\n",$the_notes); @endphp --}}
                                        <textarea readonly class="form-control text-info"  name="post_note" cols="30" rows="5">@php $the_notes = '';$index = 1;foreach ($post->notes as $note) {$the_notes = "$index ) :  $note->post_note <br/>";echo str_replace("<br/>","\n\n",$the_notes);$index++;} @endphp</textarea>

                                        @endif

                                    @endif

                                    {{-- <div style="display: none;" id="content-to-pdf">
                                        {!! $post->post_body ?? '' !!}
                                    </div> --}}

                                </div>

                            </div>
                        </div>

                        @if (!empty($task))
                        <div class="text-center">

                            @if ($task->status == 6)
                             <span class="btn btn-danger">This Task is Rejected</span>
                            @elseif($task->status == 5)
                                <span class="btn btn-success">This Task Completed And AlReady Approved From Publisher</span>
                            @elseif($task->status == 9)
                                 <span class="btn btn-warning">Wait For The Publisher : <span class="text-danger">{{ $task->site->site_name }}</span> Approve Your Post</span>
                            @elseif($task->status == 1)
                            <span class="btn btn-info">Your Task Is In Progress</span>
                                 @else
                            <span class="btn btn-warning">Your Task still not Started</span>
                            @endif




                            {{-- @if($task->status == 2)
                            <button style="width: 150px" type="submit" name="action" value="approve"  class="btn btn-warning my-2  mx-5"><i class="fas fa-check mr-2"></i>
                                Approve
                           </button>

                           @else
                              <p class="alert alert-success">Your Post is Completed</p>
                           @endif --}}

                           {{-- @if($task->status == 6 && $task->status != 0 && $task->status != 1 && $task->status != 2 && $task->status != 3 && $task->status != 4 && $task->status != 5)
                            <button disabled="true" type="submit" name="action" value="approve_allready"  class="btn btn-warning my-2  mx-5"><i class="fas fa-check mr-2"></i>
                                You Allready Approve the Post
                           </button>
                           @endif

                           @if($task->status != 4)
                            <button style="width: 150px" type="submit" name="action" value="improve"  class="btn btn-info my-2  mx-5"><i class="fa fa-wrench mr-2" aria-hidden="true"></i>
                                Improve
                           </button>
                           @endif

                           @if($task->status != 6)
                            <button style="width: 150px" type="submit" name="action" value="reject"  class="btn btn-danger my-2  mx-5"><i class="fas fa-ban mr-2"></i>
                                Reject
                           </button>
                           @endif--}}

                           {{-- @else

                            <p class="alert alert-warning"> Your Post Still Not Started, Wait the Pr Content Writer starting the post or contact the pr team .</p>

                           @endif --}}




                            {{-- @if($task->status =! 6 && $task->status == 3)
                            <button  type="submit" name="action" value="reject"  class="btn btn-danger mx-5">
                                <i class="fas fa-ban mr-2"></i>Rejected
                            </button>
                            @else
                            <button  type="submit" name="action" value="reject"  class="btn btn-danger mx-5">
                                <i class="fas fa-ban mr-2"></i>You Allready Rejected The Post
                            </button>
                            @endif --}}

                            <input type="hidden" name="site_id" value="{{$task->site->id}}">

                        </div>
                        @endif
                        </form>
                    </div>
                    <!-- End Order Form -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

            {{-- start chat --}}

            {{-- <div style="z-index: 9999999" class="floating-chat">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <div class="chat">
                    <div class="header">
                        <span class="title">
                            what's on your mind?
                        </span>
                        <button>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>

                    </div>
                    <ul class="messages">
                        <li class="other">asdasdasasdasdasasdasdasasdasdasasdasdasasdasdasasdasdas</li>
                        <li class="other">Are we dogs??? 🐶</li>
                        <li class="self">no... we're human</li>
                        <li class="other">are you sure???</li>
                        <li class="self">yes.... -___-</li>
                        <li class="other">if we're not dogs.... we might be monkeys 🐵</li>
                        <li class="self">i hate you</li>
                        <li class="other">don't be so negative! here's a banana 🍌</li>
                        <li class="self">......... -___-</li>
                    </ul>
                    <div class="footer">
                        <div class="text-box" contenteditable="true" disabled="true"></div>
                        <button id="sendMessage">send</button>
                    </div>
                </div>
            </div> --}}

            {{-- start chat icon --}}
            {{-- <a style="position:fixed;top:139px;right:-.25rem;z-index:1029" role="button" class="btn has-icon bg-primary text-white shadow" data-toggle="modal" href="#settings-modal">
                <svg class="svg-inline--fa fa-envelope-open-text fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open-text" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M176 216h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16zm-16 80c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16zm96 121.13c-16.42 0-32.84-5.06-46.86-15.19L0 250.86V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V250.86L302.86 401.94c-14.02 10.12-30.44 15.19-46.86 15.19zm237.61-254.18c-8.85-6.94-17.24-13.47-29.61-22.81V96c0-26.51-21.49-48-48-48h-77.55c-3.04-2.2-5.87-4.26-9.04-6.56C312.6 29.17 279.2-.35 256 0c-23.2-.35-56.59 29.17-73.41 41.44-3.17 2.3-6 4.36-9.04 6.56H96c-26.51 0-48 21.49-48 48v44.14c-12.37 9.33-20.76 15.87-29.61 22.81A47.995 47.995 0 0 0 0 200.72v10.65l96 69.35V96h320v184.72l96-69.35v-10.65c0-14.74-6.78-28.67-18.39-37.77z"></path>
               </svg><!-- <i class="fas fa-envelope-open-text mr-2"></i> Font Awesome fontawesome.com -->
                <span class="badge badge-light ml-auto badge-pill ml-3 mr-2">
                    2
                </span>
                </a> --}}
            {{-- end chat icon --}}
            {{-- start chat content --}}


           {{--  <div class="modal fade modal-fixed-right modal-theme overflow-hidden show" id="settings-modal" tabindex="-1" aria-labelledby="settings-modal-label" data-options="" style="padding-right: 17px;" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable" role="document">
                    <div class="modal-content">

                        <div class="modal-header modal-header-settings">
                            <div class="z-index-1 py-1 flex-grow-1">
                                <h5 class="text-white" id="settings-modal-label">
                                    <svg class="svg-inline--fa fa-envelope-open-text fa-w-16 mr-2 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open-text" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M176 216h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16zm-16 80c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16zm96 121.13c-16.42 0-32.84-5.06-46.86-15.19L0 250.86V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V250.86L302.86 401.94c-14.02 10.12-30.44 15.19-46.86 15.19zm237.61-254.18c-8.85-6.94-17.24-13.47-29.61-22.81V96c0-26.51-21.49-48-48-48h-77.55c-3.04-2.2-5.87-4.26-9.04-6.56C312.6 29.17 279.2-.35 256 0c-23.2-.35-56.59 29.17-73.41 41.44-3.17 2.3-6 4.36-9.04 6.56H96c-26.51 0-48 21.49-48 48v44.14c-12.37 9.33-20.76 15.87-29.61 22.81A47.995 47.995 0 0 0 0 200.72v10.65l96 69.35V96h320v184.72l96-69.35v-10.65c0-14.74-6.78-28.67-18.39-37.77z"></path></svg><!-- <span class="fas fa-envelope-open-text mr-2 fs-0"></span> Font Awesome fontawesome.com -->
                                    Message
                                </h5>
                                <p class="mb-0 fs--1 text-white opacity-75">This message box is for this <strong class="font-weight-bold">Task ID: 40989</strong></p>
                            </div>
                            <button class="close z-index-1" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                        </div>

                        <!-- Message-->

                        <div class="modal-body bg-gray-300  vh-100 ">

                                    <div class="fs--1 alert alert-primary shadow" role="alert">
                            <div class="mb-n2">
                                <a href="/performers/user-performer?publisherId=12637&amp;project=2042" target="_blank" class="text-facebook text-decoration-none">
                                    <svg class="svg-inline--fa fa-user-circle fa-w-16 fa-lg mr-1 text-facebook" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg=""><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg><!-- <i class="fas fa-user-circle fa-lg mr-1 text-facebook"></i> Font Awesome fontawesome.com -->
                                    <span class="mb-1">
                                        <strong>
                                        MaryamIqbal
                                    </strong>
                                    </span>
                                </a>
                            </div>
                            <hr>
                            <p class=" mt-n2" style="white-space: pre-line; word-wrap: break-word; overflow-wrap: break-word;">Kindly change the site and nd place the order again on different&nbsp;site</p>
                            <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>2 months ago</span>

                        </div>
                                        <div class="fs--1 alert alert-success shadow" role="alert">
                            <div class="mb-n2">
                                <svg class="svg-inline--fa fa-user-circle fa-w-16 fa-lg mr-1 text-facebook" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg=""><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg><!-- <span class="fas fa-user-circle fa-lg mr-1 text-facebook"></span> Font Awesome fontawesome.com -->
                                <span class="mb-1 text-facebook"><strong>Me</strong></span>
                            </div>
                            <hr>
                            <p class="text-facebook mt-n2" style="white-space: pre-line; word-wrap: break-word; overflow-wrap: break-word;">ok</p>
                            <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>1 second ago</span>

                        </div>





                        </div>


                        <!-- End Message-->


                        <div class="border border-2 p-2 bg-soft-secondary">
                            <!-- Chat main footer -->
                            <form action="https://icopify.co/messages" method="POST" class="chat-form" onsubmit="this.querySelectorAll('[type=submit]').forEach(b => b.disabled = true)">
                                <input type="hidden" name="_token" value="U3sIlfV7XPWeShoxkQAdBa9Q0DvAdpfM8hfsgsnX">                    <div class="form-group row no-gutters">
                                    <input hidden="" name="post_id" value="40989">
                                    <input hidden="" name="thread_id" value="P-40989">
                                    <input hidden="" name="sender_username" value="ott">
                                    <input hidden="" name="receiver_username" value="MaryamIqbal">
                                    <input hidden="" name="sender_id" value="19260">
                                    <input hidden="" name="receiver_id" value="12637">
                                    <div class="col">
                            <textarea name="message" class="form-control  border border-secondary mt-2 fs--1" placeholder="Write your message..." rows="5"></textarea>

                                    </div>
                                </div>
                                <div class="d-flex">
                                                                                                <div>
                                                <button class="btn btn-sm btn-primary" type="submit"><svg class="svg-inline--fa fa-envelope fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path></svg><!-- <i class="far fa-envelope mr-2"></i> Font Awesome fontawesome.com -->Send</button>
                                            </div>
                                                                                                                </div>
                            </form>
                            <!-- / Chat main footer -->
                        </div>

                    </div>

                </div>
            </div> --}}
            {{-- end chat content --}}
            {{-- end chat --}}
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docxtemplater@3.21.1/build/docxtemplater.js"></script>

    @if (!empty($task) && $task->status == 5)
    <script>
        CKEDITOR.replace( 'post_editor_data', {
            language: 'en',
            uiColor: '#9AB8F3',
            uiColor: '#9AB8F3',
            filebrowserUploadUrl: "{{ route('admin') }}/upload?_token="{{request()->token}},
            filebrowserUploadMethod: 'form',
        });
    </script>

@else
<script>
    CKEDITOR.replace( 'post_editor_data', {
        toolbar: [
                { name: 'styles', items: ['Format'] },
                { name: 'fullscreen', items: ['Maximize'] },
                { name: 'export', items: ['ExportPdf', 'ExportDocx'] }
            ],
        language: 'en',
        uiColor: '#9AB8F3',
        uiColor: '#9AB8F3',
        filebrowserUploadUrl: "{{ route('admin') }}/upload?_token="{{request()->token}},
        filebrowserUploadMethod: 'form',
    });

    CKEDITOR.plugins.add('exportdocx', {
            icons: 'exportdocx',
            init: function (editor) {
                editor.addCommand('exportdocx', {
                    exec: function (editor) {
                        var content = editor.getData();
                        var zip = new JSZip();
                        var doc = new Docxtemplater().loadZip(zip);
                        doc.setData({ content: content });
                        doc.render();
                        var out = doc.getZip().generate({
                            type: "blob",
                            mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                        });
                        saveAs(out, "document.docx");
                    }
                });
                editor.ui.addButton('ExportDocx', {
                    label: 'Export to DOCX',
                    command: 'exportdocx',
                    toolbar: 'export'
                });
            }
        });
</script>
@endif


   {{--  <script>
        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.


        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {

            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF','exportWord', 'exportCsv' , '|',
                    //'findAndReplace', 'selectAll', '|',
                    //'heading', '|',
                    //'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                   // 'bulletedList', 'numberedList', 'todoList', '|',
                    //'outdent', 'indent', '|',
                    //'undo', 'redo',
                    //'-',
                    //'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    //'alignment', '|',
                    //'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    //'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    //'textPartLanguage', '|',
                    //'sourceEditing'
                ],
                shouldNotGroupWhenFull: true,
                //readOnly = true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            //placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                 //'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'MultiLevelList',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ],

        });

        /* CKEDITOR.replace( 'editor', {
            on: {
                instanceReady: function (evt) {
                    evt.editor.setReadOnly( true );
                }
            }
        }); */
    </script> --}}

    {{-- <script>
        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.


        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {


            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    //'exportPDF','exportWord', 'exportCsv' , '|',
                    //'findAndReplace', 'selectAll', '|',
                    //'heading', '|',
                    //'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                   // 'bulletedList', 'numberedList', 'todoList', '|',
                    //'outdent', 'indent', '|',
                    //'undo', 'redo',
                    //'-',
                    //'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    //'alignment', '|',
                    //'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    //'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    //'textPartLanguage', '|',
                    //'sourceEditing'
                ],
                shouldNotGroupWhenFull: true,
                //readOnly = true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            //placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                 //'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'MultiLevelList',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ],
        });

    </script> --}}


    <script>
        function convertToDocx() {
            /* //preventDefault();
            var text = document.getElementById('summernote').value;
            var element = document.createElement('a');
            console.log(text);

            // Generate the DOCX file
            var blob = new Blob([text], { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' });
            var url = URL.createObjectURL(blob);

            // Set the link's attributes and trigger the download
            element.href = url;
            element.download = 'task.docx';
            document.body.appendChild(element);
            element.click();

            // Clean up
            setTimeout(function () {
                document.body.removeChild(element);
                window.URL.revokeObjectURL(url);
            }, 0);

            var text = document.getElementById('summernote').value;
            console.log(text); */


            var text = document.getElementById('summernote').value;
            // Create a new Blob object containing the text
            var blob = new Blob([text], { type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' });

            // Create a temporary link element
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);

            // Set the download attribute and file name
            link.download = 'task.docx';

            // Hide the link
            link.style.display = 'none';

            // Append the link to the body
            document.body.appendChild(link);

            // Trigger the click event on the link
            link.click();

            // Clean up
            document.body.removeChild(link)
        }
    </script>

    <script>
        $(document).ready(function() {
                $('#summernote').summernote({
                    height: 450,
                    disableDragAndDrop: true,
                    /* toolbar: [
                        // [groupName, [list of button]]
                        ['redo', ['undo', 'redo']],
                        ['header', ['style']],
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ['fullscreen', 'codeview']],
                        ['link', ['linkDialogShow', 'unlink']],
                        ['help', ['help']]
                    ], */
                    toolbar:[ ['view', ['fullscreen', 'codeview']]],
                    styleTags: [
                        'p',
                        {
                            title: 'Blockquote',
                            tag: 'blockquote',
                            className: 'blockquote',
                            value: 'blockquote'
                        },
                        'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                    ],
                });
                //
                const getCollection = document.getElementsByClassName("note-editable");
               $('#summernote').next().find(".note-editable").attr("contenteditable", false);
               $('#summernote').next().find(".note-toolbar").attr("contenteditable", false);


            },


            // $('#summernote').next().find(".note-editable").attr("contenteditable", false);
        );


        /*
                $('#summernote[disabled="disabled"]').next().find(".note-editable").attr("contenteditable", false); */
    </script>

</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
       var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/66227bb9a0c6737bd12e22aa/1hrrb6k37';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script>
    ​$('.tawk-branding').css('display'​​​​​​​​​​​​​​​​​​​​​​​​​​​,'block');​​​​​​

     var element = document.getElementById('myElement');
        element.style.color = 'red';
</script>

@endsection
