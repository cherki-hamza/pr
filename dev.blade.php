{{-- <div class="tab-pane fade active show" id="custom-tabs-four-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                                                    <form action="{{route('store_cp', ['project_id'=> request()->project_id , 'site_id' => request()->site_id ])}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                    {{-- start code editor --}}
                                                    <input type="hidden" name="task_type" value="c_p">
                                                    <label class="d-block my-3"><strong>Your Content </strong><span class="text-warning">*</span>
                                                        <i class="ml-1 mr-1" data-fa-i2svg=""><svg style="width: 15px" class="svg-inline--fa fa-long-arrow-alt-right fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg></i>
                                                        <span>
                                                            Must be a minimum of <strong class="text-facebook font-weight-bold">250 words</strong>,
                                                            include up to <strong class="text-facebook font-weight-bold">3 links</strong> and
                                                        </span>
                                                    <span class="text-danger">don't add any images in your article</span>

                                                    </label>
                                                    {{-- <div  id="summernote">Hello Summernote</div> --}}

                                                    <textarea id="summernote" class="my-3" name="task_editor_data">Hello Summernote</textarea>
                                                    {{-- end code editor --}}

                                                    {{--  --}}
                                                    <div class="form-group row no-gutters my-2">
                                                        <div class="col">
                                                            <label class="d-block "><strong>Target Url </strong><span class="text-danger">* <strong class="text-success">(Enter the URL that you have included in your content above.)</strong></span>
                                                                <span class="text-facebook" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" data-fa-i2svg="">
                                                                    <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                                                </svg></span>
                                                                <input type="text" name="task_target_url" value="" autocomplete="off" class="form-control  mt-2" id="targetUrl" placeholder="Enter Your Target URL" required="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="form-group row no-gutters my-2">
                                                        <div class="col">
                                                            <label class="d-block "><strong>Anchor Text  </strong><span class="text-danger">* <strong class="text-success">(Enter the Anchor Text that you have included in your content above.)</strong></span>
                                                                <span class="text-facebook" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" data-fa-i2svg="">
                                                                    <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16" data-html="true" data-content="Enter the URL that you have included in your content above." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                                                </svg></span>
                                                                <input type="text" name="task_anchor_text" value="" autocomplete="off" class="form-control  mt-2" id="targetUrl" placeholder="Enter Your Anchor Text" required="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="form-group row no-gutters my-2">
                                                        <div class="col">
                                                            <label class="d-block "><strong>Special requirements <span class="text-success">(If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc.)</span></strong>
                                                                <svg style="width: 15px" class="svg-inline--fa fa-info-circle fa-w-16 text-facebook" data-html="true" data-content="If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" data-original-title="" title=""><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg><!-- <span class="fas fa-info-circle text-facebook" data-html="true" data-content="If necessary, Write all your task requirements here, e. g., content requirements, Category, deadline, necessity of disclosure, preferences regarding content placement, etc." data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover">
                                                                </span> Font Awesome fontawesome.com -->
                                                                <textarea name="task_special_requirement" class="form-control  mt-2" rows="8"></textarea>
                                                            </label>
                                                                                                </div>
                                                    </div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="text-right text-facebook h5"> <strong>$9.93</strong></div>
                                                    {{--  --}}

                                                    {{--  --}}
                                                    <div class="row no-gutters float-right">
                                                        <div>
                                                            <button class="btn" type="submit" style="background-color:#3c5a99; color:white">Order Now</button>
                                                        </div>
                                                    </div>
                                                    {{--  --}}
                                                </form>
                                                </div> --}}
