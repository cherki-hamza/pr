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
                                    Found: <span class="text-danger">{{$sites_count}} </span> Websites - {{$project_id}}
                                </h3>

                                {{-- start search --}}
                                <form  action="{{ route('site_index' , ['project_id' => request()->project_id , 'search' => request()->search ]) }}" method="POST">
                                    @csrf
                                <div style="float: right" class="form-group row">

                                    <input type="text" style="width: 280px;" class="form-control mx-2" autocomplete="on" value="{{ request()->search ?? '' }}" required name="search" placeholder="Enter Search Keword">
                                    <button type="submit" class="btn btn-primary btn-sm loading-trigger mr-3">
                                        <svg style="width: 25px" class="svg-inline--fa fa-search fa-w-16 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                    </svg>Search</button>
                                </div>
                               </form>
                                {{-- end search --}}

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                   {{--  <h3>publishers..</h3> --}}
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-bordered table-hover datatable">
                                            <thead class="bg-300">

                                                <tr>
                                                    <th>
                                                         Websites
                                                    </th>

                                                    <th>
                                                        Websites Name
                                                    </th>

                                                    <th>
                                                        Categories
                                                    </th>

                                                    <th>
                                                        Monthly Traffic
                                                    </th>

                                                    <th>
                                                        Ahrefs DR
                                                    </th>

                                                    <th>
                                                         Moz DA
                                                    </th>


                                                    <th>
                                                        REGION / LOCATION
                                                    </th>

                                                    <th class="sort" style="width:60px">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($sites as $site)
                                                <tr>
                                                  <td><i class="fa fa-link mr-2"></i>
                                                    <a href="https://{{$site->site_url}}" rel="nofollow" target="_blank" class="text-decoration-none font-weight-bold" data-html="true"
                                                     data-content="<strong class='text-primary font-weight-bold'>{{$site->site_url}}</strong>" data-placement="right" data-toggle="popover"
                                                      data-container="body" data-trigger="hover" data-original-title="" title="">{{ ($site->site_url) ? $site->site_url : $site->site_name}}</a><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-bezier-curve fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bezier-curve" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M368 32h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM208 88h-84.75C113.75 64.56 90.84 48 64 48 28.66 48 0 76.65 0 112s28.66 64 64 64c26.84 0 49.75-16.56 59.25-40h79.73c-55.37 32.52-95.86 87.32-109.54 152h49.4c11.3-41.61 36.77-77.21 71.04-101.56-3.7-8.08-5.88-16.99-5.88-26.44V88zm-48 232H64c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zM576 48c-26.84 0-49.75 16.56-59.25 40H432v72c0 9.45-2.19 18.36-5.88 26.44 34.27 24.35 59.74 59.95 71.04 101.56h49.4c-13.68-64.68-54.17-119.48-109.54-152h79.73c9.5 23.44 32.41 40 59.25 40 35.34 0 64-28.65 64-64s-28.66-64-64-64zm0 272h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fas fa-bezier-curve"></i> Font Awesome fontawesome.com --> <span>Max </span> <strong class="font-weight-normal text-primary">03 DoFollow links</strong></span><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock"></i> Font Awesome fontawesome.com --> <span>Turnaround Time: </span>
                                                        <strong class="font-weight-normal text-primary">
                                                            1 day
                                                        </strong>
                                                     </span>

                                                </td>

                                                <td>{{ $site->site_name }}</td>

                                                <td><span class="badge badge-primary">{{ $site->handle_category() }}</span></td>

                                                {{-- <td class="text-center align-middle">
                                                    Monthly Traffic <br> --}}
                                                    <td class="text-center align-middle">
                                                        Monthly Traffic <br>

                                                    <img src="https://www.icopify.co/img/google-analytics-icon.svg" alt="google analytic icon" class=" mb-1" width="13px">
                                                    <span class="font-weight-bold h6"> {{ $site->handle_monthly_traffic() }} </span>
                                                </td>

                                                <td class="text-center align-middle">
                                                    <img src="https://www.icopify.co/img/Ahrefs-icon.jpeg" class="mr-1" alt="Ahrefs icon" width="20px">DR
                                                    <strong class=" font-weight-bold">{{$site->site_domain_rating}}</strong>
                                                </td>

                                                <td class="text-center align-middle"><span class="badge badge-primary mr-1">M</span>DA <strong class="font-weight-bold">{{$site->site_domain_authority}}</strong>
                                                    {{-- <br>Spam Score <strong class="text-facebook font-weight-bold">1%</strong> --}}
                                                </td>

                                                <td class="text-center align-middle">
                                                    {{-- <img src="https://www.icopify.co/img/flags/us.jpg" alt="" class="shadow"> --}}
                                                   <br><span>{{ $site->handle_country()  }}</span>
                                               </td>

                                               <td class="">
                                                  <div class="btn-group btn-group-sm btn-block">
                                                    @if(!empty($site->site_price))
                                                      <a href="{{route('order_index', ['project_id'=> request()->project_id && 1 , 'site_id' => $site->id ])}}" style="width: 100px;" class="btn btn-success">{{ ($site->site_price) ? "$$site->site_price" : '$0'}}</a>
                                                    @else
                                                      <a href="#" style="width: 100px;" class="btn btn-danger">The Price Not Yet</a>
                                                    @endif
                                                    {{-- <a href="{{route('order_index', ['project_id'=> request()->project_id && 1 , 'site_id' => $site->id ])}}" style="width: 100px;"
                                                         class="btn btn-primary">$ {{$site->site_price}}</a> Buy Again --}}
                                                  </div>

                                                  <div class="btn-group">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="card my-2 mx-2">
                                                            {{-- <form action="{{route('favorite')}}" method="POST">
                                                                @csrf --}}
                                                                <input type="hidden" name="site_id" value="{{$site->id}}">
                                                               {{--  <button type="submit" class="btn btn-white"><i style="color: #f5803e" class="fa fa-heart"></i></button> --}}
                                                                <a href="{{route('favorite',  ['site_id'=>$site->id])}}" class="btn btn-white"><i style="color: {{ ($site->favoritesCount == 1) ? 'red' : '#f5803e' }}" class="fa fa-heart"></i></a>
                                                                {{-- <button type="submit"  class="btn btn-white"/><i style="color: #f5803e" class="fa fa-heart"></i> --}}
                                                           {{-- </form> --}}
                                                        </div>


                                                        <div style="float: center" class="card my-2 mx-2 ml-4 mr-4">
                                                            <form action="#" method="post">
                                                                @csrf
                                                            <a href="#" class="btn btn-white"><i style="color: #f5803e " class="fa fa-ban"></i></a>
                                                            {{-- <form action="https://icopify.co/blacklists" id="blacklist-f-1460" class="blacklist-form" method="post">
                                                                <input type="hidden" name="_token" value="Nb1bqw31WFqv95ceCwt5PyJAOTSJnVPvyr7Y6AhC">                                                        <input type="hidden" name="website_id" value="1460">
                                                                    <button type="submit" class="btn btn-default text-sm btn-sm btn-block mt-2 blacklist-button" title="Add To Your BlackList"><svg class="svg-inline--fa fa-ban fa-w-16 text-google-plus ml-1 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ban" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"></path></svg><!-- <i class="fas fa-ban text-google-plus ml-1 mr-1"></i> Font Awesome fontawesome.com --></button>
                                                            </form> --}}
                                                        </div>
                                                        <div style="float: right" class="card my-2 mx-2 mr-2">
                                                            <form action="#" method="post">
                                                                @csrf
                                                            <a href="#" class="btn btn-white"><i style="color: #f5803e " class="fa fa-flag"></i></a>
                                                            {{-- <a href="" role="button" class="btn btn-default text-sm btn-sm btn-block mt-2 blacklist-button" title="Report This Website" data-toggle="modal" data-target="#reportWebsite1460">
                                                                <svg class="svg-inline--fa fa-flag fa-w-16 text-google-plus ml-1 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="flag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M349.565 98.783C295.978 98.783 251.721 64 184.348 64c-24.955 0-47.309 4.384-68.045 12.013a55.947 55.947 0 0 0 3.586-23.562C118.117 24.015 94.806 1.206 66.338.048 34.345-1.254 8 24.296 8 56c0 19.026 9.497 35.825 24 45.945V488c0 13.255 10.745 24 24 24h16c13.255 0 24-10.745 24-24v-94.4c28.311-12.064 63.582-22.122 114.435-22.122 53.588 0 97.844 34.783 165.217 34.783 48.169 0 86.667-16.294 122.505-40.858C506.84 359.452 512 349.571 512 339.045v-243.1c0-23.393-24.269-38.87-45.485-29.016-34.338 15.948-76.454 31.854-116.95 31.854z"></path></svg><!-- <i class="fas fa-flag text-google-plus ml-1 mr-1"></i> Font Awesome fontawesome.com -->
                                                            </a> --}}
                                                        </div>

                                                    </div>
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
