<thead class="bg-300">
    <form action="{{ route('search' , ['project_id' => request()->project_id , 'search' => request()->search ]) }}" method="POST">
        @csrf
    <tr>
        <th>


                <div class="input-group">
                    <input type="text" name="search_url" value="" class="form-control form-control-sm"
                        placeholder="URL" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" name="table_search" type="submit">
                            <svg style="width: 16px" class="svg-inline--fa fa-search fa-w-16 ml-2 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg></button>
                    </div>
                </div>

        </th>

        {{-- start search --}}
        {{-- <form  action="{{ route('site_index' , ['project_id' => request()->project_id , 'search' => request()->search ]) }}" method="POST">
            @csrf
        <div style="float: right" class="form-group row">

            <input type="text" style="width: 280px;" class="form-control mx-2" autocomplete="on" value="{{ request()->search ?? '' }}" required name="search" placeholder="Enter Search Keword">
            <button type="submit" class="btn btn-primary btn-sm loading-trigger mr-3">
                <svg style="width: 25px" class="svg-inline--fa fa-search fa-w-16 mr-2"  focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
            </svg>Search</button>
        </div>
       </form> --}}
        {{-- end search --}}

        <th>
            <select {{-- onchange="this.form.submit()" --}} class="custom-select custom-select-sm" name="categories" onchange="location = this.value;">
                <option value="publishers">All Websites</option>
                @foreach ($categories as $category)
                <option value="?categories={{ $category->site_category }}">{{ $category->site_category }}</option>
                @endforeach

               {{--  <option value="publishers">All Websites</option>
                <option value="?categories=crypto">crypto</option>
                <option value="Other">Other</option> --}}

            </select>
        </th>

        <th>
            <select class="custom-select custom-select-sm" name="site_monthly_traffic" onchange="location = this.value;">
                <option selected disabled="">Monthly Traffic</option>
                <option value="?site_monthly_traffic=LowToHigh">Low To High
                </option>
                <option value="?site_monthly_traffic=HighToLow">High To Low
                </option>
            </select>
        </th>

        <th>
            <select class="custom-select custom-select-sm" name="site_domain_rating" onchange="location = this.value;">
                <option selected="" disabled="">Ahrefs DR</option>
                <option value="?site_domain_rating=LowToHigh">Low To High</option>
                <option value="?site_domain_rating=HighToLow">High To Low</option>
            </select>
        </th>

        <th>
            <select class="custom-select custom-select-sm" name="site_domain_authority" onchange="location = this.value;">
                <option selected="" disabled="">Moz DA</option>
                <option value="?site_domain_authority=LowToHigh">Low To High</option>
                <option value="?site_domain_authority=HighToLow">High To Low</option>
            </select>
        </th>


        <th>
            <select class="custom-select custom-select-sm" name="websiteLanguage" onchange="location = this.value;">
                <option selected="" disabled="">Languages</option>
                <option value="https://icopify.co/project/2042/publishers">All Languages</option>
                <option value="English">English
                </option>
                <option value="Arabic">Arabic
                </option>
                <option value="Bulgarian">Bulgarian
                </option>
                <option value="Chinese">Chinese
                </option>
                <option value="Dutch">Dutch</option>
                <option value="French">French
                </option>
                <option value="German">German
                </option>
                <option value="Greek">Greek</option>
                <option value="Hindi">Hindi</option>
                <option value="Indonesian">Indonesian
                </option>
                <option value="Italian">Italian
                </option>
                <option value="Japanese">Japanese
                </option>
                <option value="Korean">Korean
                </option>
                <option value="Norwegian">Norwegian
                </option>
                <option value="Polish">Polish
                </option>
                <option value="Portuguese">Portuguese
                </option>
                <option value="Romanian">Romanian
                </option>
                <option value="Russian">Russian
                </option>
                <option value="Spanish">Spanish
                </option>
                <option value="Swedish">Swedish
                </option>
                <option value="Turkish">Turkish
                </option>
                <option value="Ukrainian">Ukrainian
                </option>
                <option value="Latvian">Latvian</option>
                <option value="Other">Other</option>

            </select>
        </th>

        <th class="sort" style="width:80px">
            <select class="custom-select custom-select-sm" name="website" onchange="location = this.value;">
                <option value="publishers">All Websites</option>
                <option value="?Price=LowToHigh">Price From Low To
                    High</option>
                <option value="?Price=HighToLow">Price From High To
                    Low</option>
                <option
                    value="ExcludeWebsitesIHaveWorkedWith">
                    Exclude Sites I've worked with</option>
                <option
                    value="OnlyWebsitesIHaveWorkedWith">
                    Only Sites I've worked with</option>
            </select>
        </th>
    </tr>
    </form>
</thead>
