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
                        <h4><strong>Project: <span style="color: goldenrod"> {{  \App\Models\Project::where('id',request()->project_id)->first()->project_name ?? '-'  }} </span> </strong></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
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
                                   Blacklist Publisher
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                   {{--  <h3>publishers..</h3> --}}
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-bordered table-hover datatable">
                                            <thead class="bg-300">

                                                <tr>
                                                    <th> Websites
                                                        {{-- <form action="https://icopify.co/project/2042/publishers/search"
                                                            method="get">
                                                            <div class="input-group">
                                                                <input style="" type="text" name="url" value=""
                                                                    class="form-control form-control-sm ml-1"
                                                                    placeholder="URL" autocomplete="off">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary btn-sm"
                                                                        type="submit"><i class="fa fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </form> --}}
                                                    </th>

                                                    <th> Categories
                                                       {{--  <select class="custom-select custom-select-sm" name="categories"
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
                                                        </select> --}}
                                                    </th>

                                                    <th>Monthly Traffic
                                                        {{-- <select class="custom-select custom-select-sm" name="PA"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Monthly Traffic</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?monthlyTraffic=LowToHigh">
                                                                Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?monthlyTraffic=HighToLow">
                                                                High To Low</option>
                                                        </select> --}}
                                                    </th>

                                                    <th> Ahrefs DR
                                                        {{-- <select class="custom-select custom-select-sm" name="DR"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Ahrefs DR</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DR=LowToHigh">
                                                                Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DR=HighToLow">
                                                                High To Low</option>
                                                        </select> --}}
                                                    </th>

                                                    <th> Moz DA
                                                        {{-- <select class="custom-select custom-select-sm" name="DA"
                                                            onchange="location = this.value;">
                                                            <option selected="" disabled="">Moz DA</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DA=LowToHigh">
                                                                Low To High</option>
                                                            <option
                                                                value="https://icopify.co/project/2042/publishers/search?DA=HighToLow">
                                                                High To Low</option>
                                                        </select> --}}
                                                    </th>


                                                    <th> REGION / LOCATION
                                                        {{-- <select class="custom-select custom-select-sm"
                                                            name="websiteLanguage" onchange="location = this.value;">
                                                            <option selected="" disabled="">REGION / LOCATION</option>
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
                                                        </select> --}}
                                                    </th>

                                                    <th class="sort" style="width:60px">Actions
                                                        {{-- <select class="custom-select custom-select-sm" name="website"
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
                                                        </select> --}}
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($sites as $site)
                                                <tr>
                                                  <td><i class="fa fa-link mr-2"></i>
                                                    <a href="https://{{$site->site_url}}" rel="nofollow" target="_blank" class="text-decoration-none font-weight-bold" data-html="true"
                                                     data-content="<strong class='text-facebook font-weight-bold'>{{$site->site_url}}</strong>" data-placement="right" data-toggle="popover"
                                                      data-container="body" data-trigger="hover" data-original-title="" title=""> {{$site->site_url}}</a><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-bezier-curve fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bezier-curve" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M368 32h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM208 88h-84.75C113.75 64.56 90.84 48 64 48 28.66 48 0 76.65 0 112s28.66 64 64 64c26.84 0 49.75-16.56 59.25-40h79.73c-55.37 32.52-95.86 87.32-109.54 152h49.4c11.3-41.61 36.77-77.21 71.04-101.56-3.7-8.08-5.88-16.99-5.88-26.44V88zm-48 232H64c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zM576 48c-26.84 0-49.75 16.56-59.25 40H432v72c0 9.45-2.19 18.36-5.88 26.44 34.27 24.35 59.74 59.95 71.04 101.56h49.4c-13.68-64.68-54.17-119.48-109.54-152h79.73c9.5 23.44 32.41 40 59.25 40 35.34 0 64-28.65 64-64s-28.66-64-64-64zm0 272h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fas fa-bezier-curve"></i> Font Awesome fontawesome.com --> <span>Max </span> <strong class="font-weight-normal text-primary">03 DoFollow links</strong></span><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock"></i> Font Awesome fontawesome.com --> <span>Turnaround Time: </span>
                                                        <strong class="font-weight-normal text-primary">
                                                            1 day
                                                        </strong>
                                                     </span>

                                                </td>

                                                <td><span class="badge badge-primary    ">{{$site->site_category}}</span></td>

                                                <td class="text-center align-middle">
                                                    Monthly Traffic <br>
                                                    <img src="https://www.icopify.co/img/google-analytics-icon.svg" alt="google analytic icon" class=" mb-1" width="13px">
                                                    <span class="font-weight-bold h6"> 10000,924 </span>
                                                </td>

                                                <td class="text-center align-middle">
                                                    <img src="https://www.icopify.co/img/Ahrefs-icon.jpeg" class="mr-1" alt="Ahrefs icon" width="20px">DR
                                                    <strong class=" font-weight-bold">{{$site->site_domain_rating}}</strong>
                                                </td>

                                                <td class="text-center align-middle"><span class="badge badge-primary mr-1">M</span>DA <strong class="font-weight-bold">{{$site->site_domain_authority}}</strong>
                                                    {{-- <br>Spam Score <strong class="text-facebook font-weight-bold">1%</strong> --}}
                                                </td>

                                                <td class="text-center align-middle">
                                                    <img src="https://www.icopify.co/img/flags/us.jpg" alt="" class="shadow">
                                                   <br><span>{{$site->site_region_location}}</span>
                                               </td>

                                               <td class="">
                                                <div class="btn-group btn-group-sm btn-block">
                                                    @if(!empty($site->site_price))
                                                      <a href="{{route('order_index', ['project_id'=> request()->project_id , 'site_id' => $site->id ])}}" style="width: 100px;" class="btn btn-success">Buy Again</a>
                                                       <a href="{{route('order_index', ['project_id'=> request()->project_id, 'site_id' => $site->id ])}}" style="width: 100px;"
                                                         class="btn btn-primary"> {{($site->site_price) ? "$$site->site_price" : '$0'}}</a>
                                                    @else
                                                      <a href="#" style="width: 100px;" class="btn btn-danger">The Price Not Yet</a>
                                                    @endif

                                                  </div>

                                                  <div class="btn-group btn-group-sm btn-block">

                                                    <form action="{{ route('remove_blacklist_publishers' , ['project_id'=> request()->project_id , 'site_id' => $site->id ]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                          <button style="width: 200px;" class="btn btn-block btn-danger" type="submit">Restore</button>
                                                      </form>

                                                </div>


                                                </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="float: right" class="">
                                          {{-- {{$sites->links()}} --}}
                                        </div>
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

@endsection
