@extends('admin.layouts.master')

@section('style')
    <style>

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
                            <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Found: <span class="text-danger">32307 </span> Websites
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <h3>publishers..</h3>
                                    <div class="col-md-12">
                                        <table class="table table-sm table-bordered table-hover table-striped fs--1">
                                            <thead class="bg-300">

                                                <tr>
                                                    <th>
                                                        <form action="https://icopify.co/project/2042/publishers/search"
                                                            method="get">
                                                            <div class="input-group">
                                                                <input style="" type="text" name="url" value=""
                                                                    class="form-control form-control-sm ml-1"
                                                                    placeholder="URL" autocomplete="off">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary btn-sm"
                                                                        type="submit"><svg
                                                                            class="svg-inline--fa fa-search fa-w-16"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="search"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                                                            </path>
                                                                        </svg><!-- <i class="fas fa-search"></i> Font Awesome fontawesome.com --></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </th>

                                                    <th>
                                                        <select class="custom-select custom-select-sm" name="categories"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Categories</option>
                                                            <option value="https://icopify.co/project/2042/publishers">All
                                                                Websites</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Agriculture">
                                                                Agriculture</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Animals and Pets">
                                                                Animals and Pets</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Art">
                                                                Art</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Automobiles">
                                                                Automobiles</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Business">
                                                                Business</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Books">
                                                                Books</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Beauty">
                                                                Beauty</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Career and Employment">
                                                                Career and Employment</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Computers">
                                                                Computers</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Construction and Repairs">
                                                                Construction and Repairs</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Culture">
                                                                Culture</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=E-commerce">
                                                                E-commerce</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Education">
                                                                Education</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Entertainment">
                                                                Entertainment</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Environment">
                                                                Environment</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Equipment">
                                                                Equipment</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Fashion">
                                                                Fashion</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Finance">
                                                                Finance</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Food">
                                                                Food</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=For Kids">
                                                                For Kids</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=For Men">
                                                                For Men</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=For Women">
                                                                For Women</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Gadgets">
                                                                Gadgets</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Games">
                                                                Games</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=General">
                                                                General</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Hardware development">
                                                                Hardware development</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Health">
                                                                Health</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Home and Family">
                                                                Home and Family</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Humor">
                                                                Humor</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Internet">
                                                                Internet</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Law">
                                                                Law</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Leisure and Hobbies">
                                                                Leisure and Hobbies</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Lifestyle">
                                                                Lifestyle</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Literature">
                                                                Literature</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Manufacturing">
                                                                Manufacturing</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Marketing">
                                                                Marketing</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Miscellaneous">
                                                                Miscellaneous</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Mobile">
                                                                Mobile</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Movies">
                                                                Movies</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Music">
                                                                Music</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Nature">
                                                                Nature</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=News and Media">
                                                                News and Media</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Personal Blogs">
                                                                Personal Blogs</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Photography">
                                                                Photography</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Places">
                                                                Places</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Politics">
                                                                Politics</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Programming">
                                                                Programming</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Public Service">
                                                                Public Service</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Real Estate">
                                                                Real Estate</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Science">
                                                                Science</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Shopping">
                                                                Shopping</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Society">
                                                                Society</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Software development">
                                                                Software development</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Sports">
                                                                Sports</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Startups">
                                                                Startups</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Technology">
                                                                Technology</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Travelling">
                                                                Travelling</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Transport">
                                                                Transport</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Web-development">
                                                                Web-development</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=All Niches">
                                                                All Niches</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?categories=Other">
                                                                Other</option>
                                                        </select>
                                                    </th>

                                                    <th>
                                                        <select class="custom-select custom-select-sm" name="PA"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Monthly Traffic</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?monthlyTraffic=LowToHigh">
                                                                Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?monthlyTraffic=HighToLow">
                                                                High To Low</option>
                                                        </select>
                                                    </th>

                                                    <th>
                                                        <select class="custom-select custom-select-sm" name="DR"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Ahrefs DR</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DR=LowToHigh">
                                                                Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DR=HighToLow">
                                                                High To Low</option>
                                                        </select>
                                                    </th>

                                                    <th>
                                                        <select class="custom-select custom-select-sm" name="DA"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Moz DA</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DA=LowToHigh">
                                                                Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DA=HighToLow">
                                                                High To Low</option>
                                                        </select>
                                                    </th>


                                                    <th>
                                                        <select class="custom-select custom-select-sm"
                                                            name="websiteLanguage" onchange="location = this.value;">
                                                            <option selected="" disabled="">Languages</option>
                                                            <option value="https://icopify.co/project/2042/publishers">All
                                                                Languages</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=English">
                                                                English</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Arabic">
                                                                Arabic</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Bulgarian">
                                                                Bulgarian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Chinese">
                                                                Chinese</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Dutch">
                                                                Dutch</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=French">
                                                                French</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=German">
                                                                German</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Greek">
                                                                Greek</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Hindi">
                                                                Hindi</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Indonesian">
                                                                Indonesian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Italian">
                                                                Italian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Japanese">
                                                                Japanese</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Korean">
                                                                Korean</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Norwegian">
                                                                Norwegian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Polish">
                                                                Polish</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Portuguese">
                                                                Portuguese</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Romanian">
                                                                Romanian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Russian">
                                                                Russian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Spanish">
                                                                Spanish</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Swedish">
                                                                Swedish</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Turkish">
                                                                Turkish</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Ukrainian">
                                                                Ukrainian</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Other">
                                                                Other</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websiteLanguage=Latvian">
                                                                Latvian</option>
                                                        </select>
                                                    </th>

                                                    <th class="sort" style="width:80px">
                                                        <select class="custom-select custom-select-sm" name="website"
                                                            onchange="location = this.value;">
                                                            <option value="https://icopify.co/project/2042/publishers">All
                                                                Websites</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?Price=LowToHigh">
                                                                Price From Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?Price=HighToLow">
                                                                Price From High To Low</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websitesIHaveWorkedWith=ExcludeWebsitesIHaveWorkedWith">
                                                                Exclude Sites I've worked with</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?websitesIHaveWorkedWith=OnlyWebsitesIHaveWorkedWith">
                                                                Only Sites I've worked with</option>
                                                        </select>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="ml-n2">
                                                            <div class="d-flex">
                                                                <span class="mr-2">
                                                                    <svg style="width: 30px;height: 30px;" class="svg-inline--fa fa-link fa-w-16 mr-0"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="link" role="img"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 512 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z">
                                                                        </path>
                                                                    </svg><!-- <i class="fas fa-link mr-0"></i> Font Awesome fontawesome.com -->
                                                                    <a href="https://www.postingstation.com/"
                                                                        rel="nofollow" target="_blank"
                                                                        class="text-decoration-none font-weight-bold"
                                                                        data-html="true"
                                                                        data-content="<strong class='text-facebook font-weight-bold'>www.postingstation.com</strong>"
                                                                        data-placement="right" data-toggle="popover"
                                                                        data-container="body" data-trigger="hover"
                                                                        data-original-title="" title="">
                                                                        postingstation.com</a>
                                                                </span>
                                                                <span class="ml-auto">

                                                                    <span class="badge badge-primary" data-html="true"
                                                                        data-content="Site added by the Owner"
                                                                        data-placement="right" data-toggle="popover"
                                                                        data-container="body" data-trigger="hover"
                                                                        style="cursor: pointer;" data-original-title=""
                                                                        title="">
                                                                        <svg style="width: 30px;height: 30px;" class="svg-inline--fa fa-user-tie fa-w-14 text-white"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="user-tie"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 448 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z">
                                                                            </path>
                                                                        </svg><!-- <i class="fas fa-user-tie text-white"></i> Font Awesome fontawesome.com -->
                                                                    </span>

                                                                    <span class="badge bg-facebook"
                                                                        style="cursor: pointer" data-html="true"
                                                                        data-content="One or many publishers have published articles on this site"
                                                                        data-placement="right" data-toggle="popover"
                                                                        data-container="body" data-trigger="hover"
                                                                        data-original-title="" title="">
                                                                        <svg style="width: 30px;height: 30px;" class="svg-inline--fa fa-thumbs-up fa-w-16 text-white"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="thumbs-up"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z">
                                                                            </path>
                                                                        </svg><!-- <i class="fas fa-thumbs-up text-white"></i> Font Awesome fontawesome.com --></span>
                                                                    <span class="badge badge-success" data-html="true"
                                                                        data-content="<strong class='text-facebook font-weight-bold'>48</strong> available publishers for this site"
                                                                        data-placement="right" data-toggle="popover"
                                                                        data-container="body" data-trigger="hover"
                                                                        style="cursor: pointer" data-original-title=""
                                                                        title="">
                                                                        48
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <span><svg style="width: 30px;height: 30px;" class="svg-inline--fa fa-bezier-curve fa-w-20"
                                                                    aria-hidden="true" focusable="false"
                                                                    data-prefix="fas" data-icon="bezier-curve"
                                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 640 512" data-fa-i2svg="">
                                                                    <path fill="currentColor"
                                                                        d="M368 32h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM208 88h-84.75C113.75 64.56 90.84 48 64 48 28.66 48 0 76.65 0 112s28.66 64 64 64c26.84 0 49.75-16.56 59.25-40h79.73c-55.37 32.52-95.86 87.32-109.54 152h49.4c11.3-41.61 36.77-77.21 71.04-101.56-3.7-8.08-5.88-16.99-5.88-26.44V88zm-48 232H64c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zM576 48c-26.84 0-49.75 16.56-59.25 40H432v72c0 9.45-2.19 18.36-5.88 26.44 34.27 24.35 59.74 59.95 71.04 101.56h49.4c-13.68-64.68-54.17-119.48-109.54-152h79.73c9.5 23.44 32.41 40 59.25 40 35.34 0 64-28.65 64-64s-28.66-64-64-64zm0 272h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z">
                                                                    </path>
                                                                </svg><!-- <i class="fas fa-bezier-curve"></i> Font Awesome fontawesome.com -->
                                                                <span>Max </span> <strong
                                                                    class="font-weight-normal text-primary">03 DoFollow
                                                                    links</strong></span>
                                                            <br>
                                                            <span><svg style="width: 30px;height: 30px;" class="svg-inline--fa fa-clock fa-w-16"
                                                                    aria-hidden="true" focusable="false"
                                                                    data-prefix="fas" data-icon="clock" role="img"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                                                    <path fill="currentColor"
                                                                        d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z">
                                                                    </path>
                                                                </svg><!-- <i class="fas fa-clock"></i> Font Awesome fontawesome.com -->
                                                                <span>Turnaround Time: </span>
                                                                <strong class="font-weight-normal text-primary">
                                                                    1 day
                                                                </strong>
                                                            </span>


                                                        </div>
                                                    </td>

                                                    <td class="align-middle">
                                                        <span class="badge badge-soft-primary fs--1 mb-1 ml-2">All
                                                            Niches</span><br>
                                                    </td>
                                                    <td class="text-center align-middle">Monthly Traffic <br> <span
                                                            class="font-weight-bold">Less than 1000 </span></td>
                                                    <td style="width: 30px;height: 30px;" class="text-center align-middle"><img
                                                            src="https://www.icopify.co/img/Ahrefs-icon.jpeg"
                                                            class="mr-1" alt="Ahrefs icon" width="20px">DR <strong
                                                            class=" font-weight-bold">32</strong></td>
                                                    <td class="text-center align-middle"><span
                                                            class="badge badge-primary mr-1">M</span>DA <strong
                                                            class=" font-weight-bold">55</strong>
                                                        <br>Spam Score <strong
                                                            class="text-facebook font-weight-bold">6%</strong>
                                                    </td>
                                                    <td class="text-center align-middle">


                                                        <img style="width: 30px;height: 30px;" src="https://www.icopify.co/img/flags/us.jpg" alt=""
                                                            class="shadow rounded">
                                                        <br><span>English</span>


                                                    </td>
                                                    <td class="align-middle text-center">

                                                        <div class="text-center">
                                                            <div class="btn-group btn-group-sm btn-block" role="group"
                                                                aria-label="...">


                                                                <a href="/performers/all-performers?id=9333&amp;project=2042"
                                                                    target="_blank"
                                                                    class="btn bg-facebook btn-sm text-white"
                                                                    title="Buy Post" style="width: 80%">Buy Post</a>
                                                                <a href="/performers/all-performers?id=9333&amp;project=2042"
                                                                    target="_blank" class="btn btn-primary"
                                                                    role="button" title="Buy Post" style="width: 48%">
                                                                    $4.99
                                                                </a>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <form action="https://icopify.co/saves"
                                                                        id="wishlist-f-9333" class="save-form"
                                                                        method="post">
                                                                        <input type="hidden" name="_token"
                                                                            value="ewdd6vROenWfEytTjWAP7iLQcaualwepaSEDgvHp">
                                                                        <input type="hidden" name="website_id"
                                                                            value="9333">
                                                                        <button type="submit"
                                                                            class="btn btn-falcon-warning text-sm btn-sm btn-block mt-2 save-button"
                                                                            title="Add To Your Favourite"><svg
                                                                                class="svg-inline--fa fa-heart fa-w-16 ml-1 mr-1"
                                                                                aria-hidden="true" focusable="false"
                                                                                data-prefix="fas" data-icon="heart"
                                                                                role="img"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                                                <path style="width: 30px;height: 30px;" fill="currentColor"
                                                                                    d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z">
                                                                                </path>
                                                                            </svg><!-- <i class="fas fa-heart ml-1 mr-1"></i> Font Awesome fontawesome.com --></button>
                                                                    </form>
                                                                </div>

                                                                <div class="ml-2">
                                                                    <form action="https://icopify.co/blacklists"
                                                                        id="blacklist-f-9333" class="blacklist-form"
                                                                        method="post">
                                                                        <input type="hidden" name="_token"
                                                                            value="ewdd6vROenWfEytTjWAP7iLQcaualwepaSEDgvHp">
                                                                        <input type="hidden" name="website_id"
                                                                            value="9333">
                                                                        <button type="submit"
                                                                            class="btn btn-falcon-default text-sm btn-sm btn-block mt-2 blacklist-button"
                                                                            title="Add To Your BlackList"><svg
                                                                                class="svg-inline--fa fa-ban fa-w-16 text-google-plus ml-1 mr-1"
                                                                                aria-hidden="true" focusable="false"
                                                                                data-prefix="fas" data-icon="ban"
                                                                                role="img"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                                                <path fill="currentColor"
                                                                                    d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z">
                                                                                </path>
                                                                            </svg><!-- <i class="fas fa-ban text-google-plus ml-1 mr-1"></i> Font Awesome fontawesome.com --></button>
                                                                    </form>
                                                                </div>
                                                                <div class="ml-2">
                                                                    <a href="" role="button"
                                                                        class="btn btn-falcon-default text-sm btn-sm btn-block mt-2 blacklist-button"
                                                                        title="Report This Website" data-toggle="modal"
                                                                        data-target="#reportWebsite9333">
                                                                        <svg class="svg-inline--fa fa-flag fa-w-16 text-google-plus ml-1 mr-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="flag"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M349.565 98.783C295.978 98.783 251.721 64 184.348 64c-24.955 0-47.309 4.384-68.045 12.013a55.947 55.947 0 0 0 3.586-23.562C118.117 24.015 94.806 1.206 66.338.048 34.345-1.254 8 24.296 8 56c0 19.026 9.497 35.825 24 45.945V488c0 13.255 10.745 24 24 24h16c13.255 0 24-10.745 24-24v-94.4c28.311-12.064 63.582-22.122 114.435-22.122 53.588 0 97.844 34.783 165.217 34.783 48.169 0 86.667-16.294 122.505-40.858C506.84 359.452 512 349.571 512 339.045v-243.1c0-23.393-24.269-38.87-45.485-29.016-34.338 15.948-76.454 31.854-116.95 31.854z">
                                                                            </path>
                                                                        </svg><!-- <i class="fas fa-flag text-google-plus ml-1 mr-1"></i> Font Awesome fontawesome.com -->
                                                                    </a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
