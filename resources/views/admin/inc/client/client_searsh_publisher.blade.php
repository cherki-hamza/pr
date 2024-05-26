<div class="card">
    <div class="card-body">
        <div class="card fs--1 bg-light mt-2 mb-3">
            <div class="card-body ">
                <form action="{{ route('search' , ['project_id' => request()->project_id]) }}" method="post">
                    @csrf
                    <div class="form-row">
                <!-- DA -->
                        <div class="form-group col-md-2 ">
                            <label>Moz DA</label>
                           <input type="number" id="da" name="da" value="1" placeholder="From" min="1" max="100" class="form-control form-control-sm" required="">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""> To</label>
                            <input type="number" id="da_to" name="da_to" value="100" placeholder="da_To" min="2" max="100" class="form-control form-control-sm" required="">
                        </div>
                <!-- End DA -->

                <!-- Categories -->
                        <div class="form-group col-md-4">
                            <label for=""> Categories</label>
                            <select id="category" name="category" class="custom-select custom-select-sm">
                                <option selected="" value="all">All Categorieses</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->site_category }}">{{ $category->site_category }}</option>
                                @endforeach
                            </select>
                        </div>
                <!-- Categories -->

                <!-- Language -->
                        <div class="form-group col-md-4">
                            <label for="websiteLanguage">Website Language</label>
                            <select id="websiteLanguage" name="websiteLanguage" class="custom-select custom-select-sm">
                                <option selected="" value="all">All</option>
                                                                <option value="English">English</option>
                                                                <option value="Arabic">Arabic</option>
                                                                <option value="Bulgarian">Bulgarian</option>
                                                                <option value="Chinese">Chinese</option>
                                                                <option value="Dutch">Dutch</option>
                                                                <option value="French">French</option>
                                                                <option value="German">German</option>
                                                                <option value="Greek">Greek</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="Indonesian">Indonesian</option>
                                                                <option value="Italian">Italian</option>
                                                                <option value="Japanese">Japanese</option>
                                                                <option value="Korean">Korean</option>
                                                                <option value="Norwegian">Norwegian</option>
                                                                <option value="Polish">Polish</option>
                                                                <option value="Portuguese">Portuguese</option>
                                                                <option value="Romanian">Romanian</option>
                                                                <option value="Russian">Russian</option>
                                                                <option value="Spanish">Spanish</option>
                                                                <option value="Swedish">Swedish</option>
                                                                <option value="Turkish">Turkish</option>
                                                                <option value="Ukrainian">Ukrainian</option>
                                                                <option value="Other">Other</option>
                                                                <option value="Latvian">Latvian</option>
                                                        </select>
                        </div>
                <!-- Language -->
                    </div>
                    <!-- second line -->
                    <div class="form-row">
                        <!-- DR -->
                        <div class="form-group col-md-2">
                            <label>Ahrefs DR</label>
                            <input type="number" id="dr" name="dr" value="1" placeholder="From" min="1" max="100" class="form-control form-control-sm">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="" class="text-dark"> To</label>
                            <input type="number" id="dr_to" name="dr_to" value="100" placeholder="To" min="2" max="100" class="form-control form-control-sm">
                        </div>
                        <!-- End DR -->

                        <!-- Link Type -->
                        <div class="form-group col-md-3">
                            <label for="stateGrid">Link Type</label>
                            <select id="linkType" name="linkType" class="custom-select custom-select-sm">
                                <option selected="" value="all">All</option>
                                <option value="do_Follow">DoFollow</option>
                                <option value="no_follow">NoFollow</option>
                            </select>
                        </div>
                        <!-- End Link Type -->

                        <!-- Monthly Traffic-->
                        <div class="form-group col-md-2">
                            <label for="spamScore">Moz Spam Score
                                <svg style="width: 20px;" class="svg-inline--fa fa-info-circle fa-w-16 text-primary"
                                 data-html="true" data-content="Moz Spam Score: Represents the percentage of sites with similar features that MOZ found to be penalized or banned by Google. <strong class='text-facebook'> [A score of 1% - 30% is considered a Low Spam Score.]</strong>" data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                 <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                                </svg><!-- <i class="fas fa-info-circle text-facebook" data-html="true" data-content="Moz Spam Score: Represents the percentage of sites with similar features that MOZ found to be penalized or banned by Google. <strong class='text-facebook'> [A score of 1% - 30% is considered a Low Spam Score.]</strong>" data-placement="right" data-toggle="popover" data-container="body" data-trigger="hover" data-original-title="" title=""></i> Font Awesome fontawesome.com -->
                            </label>
                            <select id="spamScore" name="spamScore" class="custom-select-sm custom-select">
                                <option selected="" value="All">All</option>
                                <option value="1">Spam Score  &lt;= 01</option>
                                <option value="2">Spam Score  &lt;= 02</option>
                                <option value="5">Spam Score  &lt;= 05</option>
                                <option value="10">Spam Score &lt;= 10</option>
                                <option value="20">Spam Score &lt;= 20</option>
                                <option value="30">Spam Score &lt;= 30</option>
                                </select>
                        </div>
                        <!-- Monthly Traffic -->

                        {{-- <!-- Max Links Allow -->
                        <div class="form-group col-md-2">
                            <label for="max_links_allow">Max Links Allow(0)</label>
                            <select id="max_links_allow" name="max_links_allow" class="custom-select custom-select-sm">
                                <option selected="" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <!-- Max Links Allow --> --}}

                        <!-- Marked As Sponsored-->
                        <div class="form-group col-md-3">
                            <label>Marked As Sponsored</label>
                            <select id="sponsored" name="sponsored" class="custom-select-sm custom-select">
                                <option selected="" value="all">All</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <!-- Marked As Sponsored -->
                    </div>

                    <div class="form-row clearfix">

                        <!-- Price -->
                        <div class="form-group col-md-2">
                            <label>Price</label>
                            <input type="number" id="price" name="price" value="1" placeholder="From" min="1" max="99999" class="form-control form-control-sm">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""> To</label>
                            <input type="number" id="price_to" name="price_to" value="100000" placeholder="To" min="2" max="100000" class="form-control form-control-sm">
                        </div>
                        <!-- End Price -->

                        <!-- Service Type-->
                       {{--  <div class="form-group col-md-3">
                            <label for="stateGrid">Service Type</label>
                            <select id="service_type" name="service_type" class="custom-select-sm custom-select">
                                <option selected="" value="All">All</option>
                                <option value="c_c">Content Placement</option>
                                <option value="c_c_p">Content Creation &amp; Placement</option>
                            </select>
                        </div> --}}
                        <!-- End Service Type -->

                        <!-- Exclude website I have worked with -->


                        <div class="form-group col-md-3">
                            <label for="worked">Sites I've (haven't) Worked With</label>
                            <select id="worked" name="worked" class="custom-select-sm custom-select">
                                <option selected="" value="all">All Websites</option>
                                <option value="ExcludeWebsitesIHaveWorkedWith">Exclude Sites I've worked with</option>
                                <option value="OnlyWebsitesIHaveWorkedWith">Only Sites I've worked with</option>
                            </select>
                        </div>
                        <!-- End Exclude website I have worked with -->


                        <!-- countries-->
                       {{--  <div class="form-group col-md-3">
                            @include('admin.inc.ct')
                        </div> --}}
                       <!-- countries-->




                                <!-- Publisher Role -->
                                {{-- <div class="">
                                    <label for="stateGrid">Publisher Role</label>
                                    <select name="roleOnWebsite" class="custom-select custom-select-sm">
                                        <option value="All">All Websites</option>
                                        <option value="Owner">Websites added by Owners</option>
                                        <option value="Contributor">Websites added by Contributors</option>
                                    </select>
                                </div> --}}
                                <!-- End Publisher Role -->

                                <div class="ml-auto float-right mt-4">
                                    <a id="resetButton" href="{{ route('site_index' , ['project_id' => request()->project_id]) }}" role="button" class="btn btn-sm loading-trigger" style="background-color:#3c5a99; color:white">
                                        <svg style="width: 20px;" class="svg-inline--fa fa-eraser fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eraser" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.941 273.941c18.745-18.745 18.745-49.137 0-67.882l-160-160c-18.745-18.745-49.136-18.746-67.883 0l-256 256c-18.745 18.745-18.745 49.137 0 67.882l96 96A48.004 48.004 0 0 0 144 480h356c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12H355.883l142.058-142.059zm-302.627-62.627l137.373 137.373L265.373 416H150.628l-80-80 124.686-124.686z"></path>
                                    </svg><!-- <i class="fas fa-eraser mr-2"></i> Font Awesome fontawesome.com -->Reset</a>

                                    <button type="submit" class="btn btn-primary btn-sm loading-trigger" name="search_action" value="s">
                                        <svg style="width: 20px;" class="svg-inline--fa fa-search fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                            </path>
                                        </svg><!-- <i class="fas fa-search mr-2"></i> Font Awesome fontawesome.com --> Search</button>
                                </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
