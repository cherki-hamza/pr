@extends('admin.layouts.master')

@section('style')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ckeditor5-full-screen@0.0.2/theme/fullscreen.min.css">
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
                            <li class="breadcrumb-item active">tasks by user by project</li>
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
                                </div>
                            </div>
                            <div class="card-body">
                                @if (!empty($post))
                                <form action="{{ route('update_post', ['project_id' => request()->project_id , 'task_id' => request()->task_id , 'post_id' => $post->id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @else
                                <form action="{{ route('store_post', ['project_id' => request()->project_id , 'task_id' => request()->task_id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @endif


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
                                                    <td><a href="{{ str_contains($task->site->site_url, 'https') ? $task->site->site_url : $task->site->site_url }}" target="_blank" rel="nofollow">
                                                        {{ str_contains($task->site->site_url, 'https') ? $task->site->site_url : 'https://'.$task->site->site_url }}
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
                                                            class="font-weight-bold">{{ empty($post->post_title) ? 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) :  $post->post_title  }}</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="bg-primary text-white">Special Requirement</td>
                                                    <td>
                                                        <textarea  class="form-control" rows="6" readonly="">{!! $task->task_special_requirement !!}</textarea>
                                                    </td>
                                                </tr>

                                                @if (!Empty($post) && $post->status == 6)
                                                <tr>
                                                    <td class="bg-danger text-white">Rejection Reason</td>
                                                    <td>
                                                        <textarea  class="form-control" rows="3" readonly="">This task has been rejected because the client said : {{ $post->post_note }}</textarea>
                                                    </td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>


                            </div>
                        </div>


                        {{-- start c_c_p --}}
                        <div class="mt-3">
                            <div class="card ">
                                <div class="card-header bg-primary">
                                    <h3 class="text-white mt-n2 mb-n2"> Start Create The Post Content {{ ($post)? ', And  Now the Task Status is ' : ''  }}  {{ ($post) ? $task->show_status() : '' }}  </h3>
                                </div>
                                <div class="card-body">
                                    @if (!empty($post))
                                    @if ($post->status == 4)
                                    <div class="my-2 px-5">
                                        <label class="text-primary" for="post_placement_url">Note From Client : <span class="text-primary"> {{ $task->user->name }} </span> For Update The Post:</label>
                                        <textarea readonly name="note" class="form-control" cols="30" rows="5">@php $the_notes = '';$index = 1;foreach ($post->notes as $note) {$the_notes = "$index ) :  $note->post_note <br/>";echo str_replace("<br/>","\n\n",$the_notes);$index++;} @endphp</textarea>
                                    </div>
                                    @endif
                                    @endif

                                    <div class="my-2 px-5">
                                      <label class="text-primary" for="post_placement_url">Post Placement URL:</label>
                                      <input  style="color: red;" value="{{ (!empty($post->post_title)) ? $post->post_title : 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) }}" type="text" class="form-control" name="post_placement_url" id="post_placement_url">
                                    </div>

                                    <div class="my-2 px-5">
                                        <label class="text-primary" for="post_editor_data">Post Content :	</label>
                                        <textarea  id="post_editor_data"   class="my-3" name="post_editor_data">{!! ($post) ? $post->post_body : '' !!}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="text-center">

                            @if(!empty($task))

                                    @if(empty($post))
                                    <button style="font-size: 18px" type="submit" name="action" value="in_progress"  class="btn btn-primary  mx-5">
                                        <i class="fas fa-save mr-2"></i>
                                        Start & Save The Post & is still in Progress
                                    </button>

                                    @else

                                        @if ($post->status == 1 || $post->status == 2)
                                        <button {{ ($post->status == 2) ? 'disabled' : ''}} style="font-size: 18px"  type="submit" name="action" value="in_progress"  class="btn btn-info mx-5">
                                            <i class="fas fa-spinner mr-2"></i>
                                            Update The Post & is still in Progress
                                        </button>
                                        @endif

                                                @if($post->status == 2)
                                                    <button style="font-size: 18px" disabled  type="submit" name="action" value="client_approval"  class="btn btn-warning mx-5">
                                                        <i class="fas fa-check mr-2"></i>The Notification Already sent to Client At [{{$post->updated_at->diffForHumans()}} ] waiting The Approval  Or Improvement Or Rejectd
                                                    </button>
                                                @elseif($post->status == 1)
                                                    <button style="font-size: 18px"  type="submit" name="action" value="client_approval"  class="btn btn-warning mx-5">
                                                        <i class="fas fa-check mr-2"></i>
                                                        Send The Post To Client for Get The Approval
                                                    </button>
                                                 @elseif($post->status == 4)
                                                    <button style="font-size: 18px" type="submit" name="action" value="client_approval"  class="btn btn-warning mx-5">
                                                        <i class="fas fa-check mr-2"></i>
                                                        Improve the post and update it &  Send The Post To Client for Get The Approval
                                                    </button>
                                                   {{--  <button style="font-size: 18px"  type="submit" name="action" value="client_approval"  class="btn btn-warning mx-5">
                                                        <i class="fas fa-check mr-2"></i>
                                                        Send The Post To Client for Get The Approval
                                                    </button> --}}
                                                    @elseif($post->status == 6)

                                                    <p aria-readonly="true" class="btn btn-danger btn-block my-3">The Client Reject the Post</p>

                                                    <button style="font-size: 18px" type="submit" name="action" value="client_approval"  class="btn btn-info mx-5">
                                                        <i class="fas fa-spinner mr-2"></i>
                                                        Speak with client and Improve and update the post
                                                    </button>
                                                    <button style="font-size: 18px"  type="submit" name="action" value="client_approval"  class="btn btn-warning mx-5">
                                                        <i class="fas fa-check mr-2"></i>
                                                        Send The Post To Client for Get The Approval
                                                    </button>

                                                    @elseif($post->status == 9)
                                                    <button style="font-size: 18px"  type="submit" name="action" value="publisher_approval"  class="btn btn-success mx-5">
                                                        <i class="fas fa-check mr-2"></i>
                                                         Publisher Approve The Post & Send Email To client : {{ $task->user->name }}
                                                    </button>

                                                    <button type="submit" name="action" value="publisher_reject"  class="btn btn-danger  mx-5"><i class="fas fa-ban mr-2"></i>
                                                        Publisher Reject The Post & Send Email To client : {{ $task->user->name }}
                                                   </button>
                                                    @else
                                                           <span class="btn btn-success">This Task Is Completed</span>

                                                           {{-- <button style="font-size: 18px" type="submit" name="action" value="client_approval"  class="btn btn-info mx-5">
                                                            <i class="fas fa-spinner mr-2"></i>
                                                            Super admin permession :  Edit And Update The Post
                                                        </button> --}}
                                                @endif


                                    @endif

                            @else
                               <button class="btn btn-danger">There is no task now</button>
                            @endif

                            <input type="hidden" name="site_id" value="{{$task->site->id}}">
                        </div>
                        {{-- end c_c_p --}}

                    </form>
                    </div>
                    <!-- End Order Form -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        CKEDITOR.replace( 'post_editor_data', {
            language: 'en',
            uiColor: '#9AB8F3',
            uiColor: '#9AB8F3',
            filebrowserUploadUrl: "{{ route('admin') }}/upload?_token="{{request()->token}},
            filebrowserUploadMethod: 'form',
        });
    </script>

    <script>
       /*  $(document).ready(function() {

            /* CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format

                fullscreen: {
                    closeOnEscape: true,
                    closeOnClick: false,
                },
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing',
                        'fullScreen'
                    ],
                    shouldNotGroupWhenFull: true
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
                placeholder: 'Welcome to CKEditor 5!',
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
                            // name: /.,
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
                    // 'ExportPdf',
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
                ]
            });

            $('#summernote').summernote({
                height: 250,
                disableDragAndDrop: true,
                toolbar: [
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
                ],
                styleTags: [
                    'p',
                    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
           });

        }); */
    </script>
@endsection
