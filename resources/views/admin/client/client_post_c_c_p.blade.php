@extends('admin.layouts.master')

@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html-docx-js/0.4.0/html-docx.min.js"></script>


@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3"><span   style="font-size: 25px;" class="alert alert-primary">Task ID #{{ $task->id }}</span></div>
                    <div class="col-sm-5">
                        @if (!empty($task))
                        <div  class="text-center">

                            @if ($task->status == 6)
                             <span style="font-size: 25px;" class="alert alert-danger">This Task is Rejected</span>
                            @elseif($task->status == 5)
                                <span style="font-size: 19px;" class="alert alert-success">This Task Is Completed</span>
                            @elseif($task->status == 9)
                                 <span style="font-size: 20px;" class="alert alert-warning">Wait For The Publisher : <span class="text-danger">https://{{ $task->site->site_url }}</span> Approve Your Post</span>
                            @elseif($task->status == 1)
                            <span style="font-size: 25px;" class="alert alert-info">Your Task Is In Progress</span>
                            @elseif($task->status == 4)
                                <span style="font-size: 16px;" class="alert alert-info">Your Send A Improvement Check, So Wait For The response</span>
                            @elseif($task->status == 2)
                                <span style="font-size: 16px;" class="alert alert-info">Your Task is in Approvement Zone Check it And Approve or Send Impprovement Requiest </span>
                            @else
                               <span  style="font-size: 25px;" class="alert alert-warning">Your Task still not Started</span>
                            @endif


                            <input type="hidden" name="site_id" value="{{$task->site->id}}">

                        </div>
                        @endif
                    </div>
                    <div class="col-sm-4">
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
                                    <h5 class="align-middle text-white"> Task :</h5>
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
                                                    Content Creation And Placement </span>
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
                                                <td class="table-success"><a target="__blink" href="{{ ( empty($task->task_post_placement_url)) ? 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) :  $task->task_post_placement_url }}" target="_blank"
                                                        class="font-weight-bold">{{ ( empty($task->task_post_placement_url)) ? 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) :  $task->task_post_placement_url }}</a>
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

                       @if($task->status != 1)
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

                                    @if (!empty($task->post))
                                        <hr style="border: #3c5a99 solid 2px;">
                                        <div class="row my-3">
                                            <div class="col-md-4">
                                                <label>Your Post Content <span class="text-danger"> for Content Creation And Placement :</span></label>
                                            </div>
                                            <div  class="col-md-8 text-right">
                                                <div style="display: none;" id="content">
                                                    {!! $post->post_body ?? '' !!}
                                                </div>

                                                {{-- <span style="font-weight: 900;font-size: 22px" class="text-primary">Post URL Published : </span>
                                                <span style="font-weight: 700;font-size: 22px" class="text-danger"> <a target="__blink" href="{{ (!empty($task->post->post_title)) ? $task->post->post_title :  '' }}">{{ (!empty($task->site->site_url)) ? $task->post->post_title :  '' }}</a> </span>
 --}}                                            @if ($post->status == 5)
                                                <a class="btn btn-primary word-export" onclick="return false;"><i class="fa fa-file-word mr-2 text-white"></i>Export as .doc </a>

                                                <a class="btn btn-danger" onclick="return false;" id="cmd"><i class="fa fa-file-pdf mr-2 text-white"></i>Generate PDF</a>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <textarea readonly="true" id="summernote" class="my-3" name="post_editor_data">{!! $post->post_body ?? '' !!}</textarea> --}}


                                        <textarea readonly class="form-control"  id="post_editor_data" class="my-3" name="post_editor_data">{!! $post->post_body ?? '' !!}</textarea>
                                        <br>


                                        <hr style="border: #3c5a99 solid 2px;">
                                    @endif

                                    @if(!empty($post) && $post->status == 2)
                                      <label for="">Write Your Notes: <span class="text-danger">(This note is not Important you can leave empty)</span></label>
                                      <textarea class="form-control" name="post_note" cols="30" rows="3" placeholder="Write your Notes"></textarea>
                                    @endif

                                    @if(!empty($post) && $post->status == 4)
                                    <label>Your Notes :</label>

                                    {{-- @php echo str_replace("<br/>","\n\n",$the_notes); @endphp --}}
                                    <textarea readonly class="form-control text-info"  name="post_note" cols="30" rows="5">@php $the_notes = '';$index = 1;foreach ($post->notes as $note) {$the_notes = "$index ) :  $note->post_note <br/>";echo str_replace("<br/>","\n\n",$the_notes);$index++;} @endphp</textarea>

                                    @endif


                                </div>

                            </div> {{-- end of card --}}
                        </div>
                        @endif

                        @if (!empty($task))
                        <div class="text-center">

                            @if ($task->status == 6)
                             <span class="btn btn-danger">This Task is Rejected</span>
                                @elseif($task->status == 5)
                                    <span class="btn btn-success">This Task is Completed</span>
                                @elseif($task->status == 0)
                                <span class="btn btn-warning">Your Task still not Started</span>
                                @elseif($task->status == 4)
                                <span class="btn btn-info">Your Send A Improvement Check To The PR Team</span>
                                <span class="btn btn-warning">So Wait For The response</span>
                                @elseif($task->status == 2)
                                <button style="width: 150px" type="submit" name="action" value="approve"  class="btn btn-warning my-2  mx-5">
                                    <i class="fas fa-check mr-2"></i>
                                    Approve
                                </button>

                                <button style="width: 150px" type="submit" name="action" value="improve"  class="btn btn-info my-2  mx-5">
                                    <i class="fa fa-wrench mr-2" aria-hidden="true"></i>
                                  Improve
                               </button>
                               @elseif($task->status == 1)
                               <span class="btn btn-info">Your Task it is in progress ..</span>

                                {{-- <button style="width: 150px" type="submit" name="action" value="reject"  class="btn btn-danger my-2  mx-5"><i class="fas fa-ban mr-2"></i>
                                    Reject
                                </button> --}}
                                @elseif($task->status == 9)
                                <span class="btn btn-warning">Wait For The Publisher : <span class="text-danger">{{ $task->site->site_name }} </span>  <span class="text-primary">==> https://{{ $task->site->site_url }}</span> Approve Your Post</span>

                                @else
                                      <p>anther condition ...</p>
                                @endif





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
             {{--  @include('admin.inc.chat.chat') --}}
            {{-- end chat --}}

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
                 {{-- start chat --}}
                 {{-- @include('admin.inc.chat.chat3') --}}
                 {{-- end chat --}}
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

    @if (!empty($task) && $task->status == 5)
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
    </script>

@else
<script>
    CKEDITOR.replace( 'post_editor_data', {
        toolbar: [
                { name: 'styles', items: ['Format'] },
                { name: 'fullscreen', items: ['Maximize'] },
               // { name: 'export', items: ['ExportPdf', 'ExportDocx'] }
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




<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="{{ asset('public/js/jquery.wordexport.js') }}"></script>
<script>

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#content").wordExport();
        });
    });
 </script>

 <script>
    $('.pr_chat').scrollTop(1000000);
 </script>

 <script>
    var element = $('.floating-chat');
var myStorage = localStorage;

if (!myStorage.getItem('chatID')) {
    myStorage.setItem('chatID', createUUID());
}

setTimeout(function() {
    element.addClass('enter');
}, 1000);

element.click(openElement);

function openElement() {
    var messages = element.find('.messages');
    var textInput = element.find('.text-box');
    element.find('>i').hide();
    element.addClass('expand');
    element.find('.chat').addClass('enter');
    var strLength = textInput.val().length * 2;
    textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
    element.off('click', openElement);
    element.find('.header button').click(closeElement);
    element.find('#sendMessage').click(sendNewMessage);
    messages.scrollTop(messages.prop("scrollHeight"));
}

function closeElement() {
    element.find('.chat').removeClass('enter').hide();
    element.find('>i').show();
    element.removeClass('expand');
    element.find('.header button').off('click', closeElement);
    element.find('#sendMessage').off('click', sendNewMessage);
    element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
    setTimeout(function() {
        element.find('.chat').removeClass('enter').show()
        element.click(openElement);
    }, 500);
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}

function sendNewMessage() {
    var userInput = $('.text-box');
    var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

    if (!newMessage) return;

    var messagesContainer = $('.messages');

    messagesContainer.append([
        '<li class="self">',
        newMessage,
        '</li>'
    ].join(''));

    // clean out old message
    userInput.html('');
    // focus on input
    userInput.focus();

    messagesContainer.finish().animate({
        scrollTop: messagesContainer.prop("scrollHeight")
    }, 250);
}

function onMetaAndEnter(event) {
    if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
        sendNewMessage();
    }
}
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
        var removeBranding = function() {
    try {
        var element = document.querySelector("iframe[title*=chat]:nth-child(2)").contentDocument.querySelector(`a[class*=tawk-branding]`)

        if (element) {
            element.remove()
        }
    } catch (e) {}
    }

    var tick = 100

    setInterval(removeBranding, tick)

    </script>

@endsection
