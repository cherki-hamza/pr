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
                                    <h5 class="align-middle text-white"> Task ID #{{$task->id}}</h5>
                                    <a href="#" target="_blank"
                                        class="btn btn-light btn-sm ml-auto" role="button">View Yaqoobkhattak's profile</a>


                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="bg-primary text-white">Service Type</td>
                                                <td class="text-primary font-weight-bold"> {{ ($task->task_type == 'c_p') ? 'Content Placement' : 'Content Creation And Placement'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Price</td>
                                                <td class="text-primary font-weight-bold">${{$task->order->price}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Task Status</td>
                                                <td>{{$task->show_status()}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Link Type</td>
                                                <td>DoFollow</td>
                                            </tr>

                                            <tr>
                                                <td class="bg-primary text-white">Publisher's URL</td>
                                                <td><a href="{{$task->site->site_url}}" target="_blank" rel="nofollow">
                                                    {{$task->site->site_url}}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Anchor Text</td>
                                                <td>{{$task->task_anchor_text}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Target URL</td>
                                                <td><a href="{{$task->task_target_url}}"
                                                        target="_blank">{{$task->task_target_url}}</a></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-white">Post Placement URL</td>
                                                <td class="table-success"><a
                                                        href="#"
                                                        target="_blank"
                                                        class="font-weight-bold">Not Yet</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="bg-primary text-white">Special Requirement</td>
                                                <td>
                                                    <textarea class="form-control" rows="6" wrap="soft" readonly="">
                                                        {!! $task->task_special_requirement !!}
                                                    </textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-center">
                                    @if (auth()->user()->roles[0]['name'] == 'superadmin')
                                    <a href="{{route('create_post' , ['project_id' => request()->project_id , 'task_id' => $task->id ])}}"  style="width: 350px" class="btn btn-success btn-lg text-center">
                                          {{ (\App\Models\Post::where('task_id',$task->id)->first()) ? 'Update and Work in the Post' : 'Start Create The Post Content ' }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Order Form -->




                    <!-- Message -->

                    <a style="position:fixed;top:300px;right:-.25rem;z-index:1029" role="button"
                        class="btn has-icon bg-primary text-white shadow" data-toggle="modal" href="#settings-modal">
                        <i class="mr-4" data-fa-i2svg=""><svg class="svg-inline--fa fa-envelope-open-text fa-w-16"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope-open-text"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M176 216h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16zm-16 80c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16zm96 121.13c-16.42 0-32.84-5.06-46.86-15.19L0 250.86V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V250.86L302.86 401.94c-14.02 10.12-30.44 15.19-46.86 15.19zm237.61-254.18c-8.85-6.94-17.24-13.47-29.61-22.81V96c0-26.51-21.49-48-48-48h-77.55c-3.04-2.2-5.87-4.26-9.04-6.56C312.6 29.17 279.2-.35 256 0c-23.2-.35-56.59 29.17-73.41 41.44-3.17 2.3-6 4.36-9.04 6.56H96c-26.51 0-48 21.49-48 48v44.14c-12.37 9.33-20.76 15.87-29.61 22.81A47.995 47.995 0 0 0 0 200.72v10.65l96 69.35V96h320v184.72l96-69.35v-10.65c0-14.74-6.78-28.67-18.39-37.77z">
                                </path>
                            </svg></i>


                    </a>

                    <div class="modal fade modal-fixed-right modal-theme overflow-hidden" id="settings-modal" tabindex="-1"
                        role="dialog" aria-labelledby="settings-modal-label" aria-hidden="true" data-options="">
                        <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable" role="document">
                            <div class="modal-content">

                                <div class="modal-header modal-header-settings">
                                    <div class="z-index-1 py-1 flex-grow-1">
                                        <h5 class="text-white" id="settings-modal-label">
                                            <span class="mr-2 fs-0" data-fa-i2svg=""><svg
                                                    class="svg-inline--fa fa-envelope-open-text fa-w-16" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="envelope-open-text"
                                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M176 216h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16zm-16 80c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16H176c-8.84 0-16 7.16-16 16v16zm96 121.13c-16.42 0-32.84-5.06-46.86-15.19L0 250.86V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V250.86L302.86 401.94c-14.02 10.12-30.44 15.19-46.86 15.19zm237.61-254.18c-8.85-6.94-17.24-13.47-29.61-22.81V96c0-26.51-21.49-48-48-48h-77.55c-3.04-2.2-5.87-4.26-9.04-6.56C312.6 29.17 279.2-.35 256 0c-23.2-.35-56.59 29.17-73.41 41.44-3.17 2.3-6 4.36-9.04 6.56H96c-26.51 0-48 21.49-48 48v44.14c-12.37 9.33-20.76 15.87-29.61 22.81A47.995 47.995 0 0 0 0 200.72v10.65l96 69.35V96h320v184.72l96-69.35v-10.65c0-14.74-6.78-28.67-18.39-37.77z">
                                                    </path>
                                                </svg></span>
                                            Message
                                        </h5>
                                        <p class="mb-0 fs--1 text-white opacity-75">This message box is for this <strong
                                                class="font-weight-bold">Task ID: 27714</strong></p>
                                    </div>
                                    <button class="close z-index-1" type="button" data-dismiss="modal"
                                        aria-label="Close"><span class="font-weight-light"
                                            aria-hidden="true">×</span></button>
                                </div>

                                <!-- Message-->

                                <div class="modal-body bg-gray-300  vh-100 ">
                                    <div class="py-5 text-center"><img class="img-fluid"
                                            src="https://www.icopify.co/assets/img/illustrations/modal-right.png"
                                            alt="">
                                        <p class="mt-4">This message box is only for this task.</p>
                                    </div>






                                </div>


                                <!-- End Message-->


                                <div class="border border-2 p-2 bg-soft-secondary">
                                    <!-- Chat main footer -->
                                    <form action="https://icopify.co/messages" method="POST" class="chat-form"
                                        onsubmit="this.querySelectorAll('[type=submit]').forEach(b => b.disabled = true)">
                                        <input type="hidden" name="_token"
                                            value="CammiquJuKDFAERZMfDAJbsoVcEgvrRbPoaoQ6ta">
                                        <div class="form-group row no-gutters">
                                            <input hidden="" name="post_id" value="27714">
                                            <input hidden="" name="thread_id" value="P-27714">
                                            <input hidden="" name="sender_username" value="ott">
                                            <input hidden="" name="receiver_username" value="Yaqoobkhattak">
                                            <input hidden="" name="sender_id" value="19260">
                                            <input hidden="" name="receiver_id" value="19910">
                                            <div class="col">
                                                <textarea name="message" class="form-control  border border-secondary mt-2 fs--1" placeholder="Write your message..."
                                                    rows="5"></textarea>

                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div>
                                                <button class="btn btn-sm btn-primary" type="submit"><i class="mr-2"
                                                        data-fa-i2svg=""><svg class="svg-inline--fa fa-envelope fa-w-16"
                                                            aria-hidden="true" focusable="false" data-prefix="far"
                                                            data-icon="envelope" role="img"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            data-fa-i2svg="">
                                                            <path fill="currentColor"
                                                                d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                                                            </path>
                                                        </svg></i>Send</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- / Chat main footer -->
                                </div>

                            </div>

                        </div>
                    </div>




                    <!--/Message -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
