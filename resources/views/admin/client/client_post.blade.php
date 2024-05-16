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

                                    @if (!empty($task) || $task->type == 'c_p')

                                    @if($task->status == 5)
                                    <div class="my-2 px-5">
                                        <label class="text-primary" for="post_placement_url">Post Placement URL:</label>
                                        <input  style="color: red;" value="{{ (!empty($task)) ? 'https://'.$task->site->site_url.'/'.Str::slug($task->task_anchor_text) : '' }}" type="text" class="form-control" name="post_placement_url" id="post_placement_url">
                                    </div>
                                    @endif

                                      <div class="my-2 px-5">
                                          <label class="text-primary" for="post_editor_data">Post Content :	</label>
                                          <textarea  id="post_editor_data"   class="my-3" name="post_editor_data">{!! ($task) ? $task->task_editor_data : '' !!}</textarea>
                                        </div>

                                    @else


                                    <hr style="border: #3c5a99 solid 2px;">
                                    <label>Your Post Content :</label>
                                    {{-- <textarea readonly="true" id="summernote" class="my-3" name="post_editor_data">{!! $post->post_body ?? '' !!}</textarea> --}}

                                    <textarea readonly class="form-control"  id="post_editor_data" class="my-3" name="post_editor_data">{!! $post->post_body ?? '' !!}</textarea>
                                    <br>


                                    <hr style="border: #3c5a99 solid 2px;">

                                    @if(!empty($post) && $post->status == 2)
                                      <label for="">Write Your Notes: <span class="text-danger">(This note is not Important you can leave empty)</span></label>
                                      <textarea class="form-control" name="post_note" cols="30" rows="3" placeholder="Write your Notes"></textarea>
                                    @endif

                                    @if(!empty($post) && $post->status == 4)
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
                                <span class="btn btn-success">This Task is AlReady Approved</span>
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
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @if (!empty($post) && $post->status == 5)
    <script>
        CKEDITOR.replace( 'post_editor_data', {
            /* language: 'en',
            uiColor: '#9AB8F3',
            uiColor: '#9AB8F3',
            filebrowserUploadUrl: "{{ route('admin') }}/upload?_token="{{request()->token}},
            filebrowserUploadMethod: 'form', */
        });
    </script>
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
    @else
    <script>
        CKEDITOR.replace( 'post_editor_data', {
            language: 'en',
            uiColor: '#9AB8F3',
            uiColor: '#9AB8F3',
            filebrowserUploadUrl: "{{ route('admin') }}/upload?_token="{{request()->token}},
            filebrowserUploadMethod: 'form',
        });
    </script>
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
    /*  */
</script>
@endsection
