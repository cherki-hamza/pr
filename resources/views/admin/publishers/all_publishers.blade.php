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
                        <h4>Found:
                            <span class="text-danger">{{$sites_count}} </span> Websites </span>
                        </h4>
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

                                    <span style="float: left" class=" text-right">
                                        <a href="{{ route('add_publishers') }}" class="btn btn-primary">Add Publisher Sites</a>
                                    </span>

                                </h3>

                                {{-- start search --}}
                                <form  action="{{ route('all_publishers_search' , ['search' => request()->search ]) }}" method="POST">
                                    @csrf
                                <div style="float: right" class="form-group row">

                                    <input type="text" style="width: 280px;" class="form-control mx-2" autocomplete="on" value="{{ request()->search ?? '' }}" required  name="search" placeholder="Enter Search Keword">
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
                                   {{--  <h3>publishers..</h3>  datatable --}}
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-bordered table-hover">

                                            @include('admin.inc.publisher.thead_recovery')

                                            <tbody>

                                                @forelse ($sites as $site)
                                                <tr>
                                                  <td><i class="fa fa-link mr-1"></i>
                                                    <a href="{{ ($site->site_url) ?   "https://$site->site_url" : '#' }}" rel="nofollow" target="_blank" class="text-decoration-none font-weight-bold" data-html="true"
                                                     data-content="<strong class='text-facebook font-weight-bold'>{{ ($site->site_url) ? $site->site_url : $site->site_name }}</strong>" data-placement="right" data-toggle="popover"
                                                      data-container="body" data-trigger="hover" data-original-title="" title=""> {{ ($site->site_url) ? $site->site_url : $site->site_name}}
                                                    </a><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-bezier-curve fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bezier-curve" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M368 32h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM208 88h-84.75C113.75 64.56 90.84 48 64 48 28.66 48 0 76.65 0 112s28.66 64 64 64c26.84 0 49.75-16.56 59.25-40h79.73c-55.37 32.52-95.86 87.32-109.54 152h49.4c11.3-41.61 36.77-77.21 71.04-101.56-3.7-8.08-5.88-16.99-5.88-26.44V88zm-48 232H64c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zM576 48c-26.84 0-49.75 16.56-59.25 40H432v72c0 9.45-2.19 18.36-5.88 26.44 34.27 24.35 59.74 59.95 71.04 101.56h49.4c-13.68-64.68-54.17-119.48-109.54-152h79.73c9.5 23.44 32.41 40 59.25 40 35.34 0 64-28.65 64-64s-28.66-64-64-64zm0 272h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z"></path></svg><!-- <i class="fas fa-bezier-curve"></i> Font Awesome fontawesome.com -->
                                                        <span>Max </span> <strong class="font-weight-normal text-primary"> {{ ($site->site_dofollow == 'Yes') ? 'Yes DoFollow links' : 'No Follow links' }} </strong>
                                                      </span><br>

                                                      <span><svg style="width: 15px" class="svg-inline--fa fa-clock fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg><!-- <i class="fas fa-clock"></i> Font Awesome fontawesome.com --> <span>Turnaround Time: </span>
                                                        <strong class="font-weight-normal text-primary">
                                                            {!! $site->site_time ?? '<span class="text-danger">Not Yet</span>' !!}
                                                        </strong>
                                                     </span>

                                                </td>

                                                {{-- <td>{{ $site->site_name }}</td> --}}

                                                <td><span class="badge badge-primary">{{ $site->handle_category() }}</span></td>


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
                                                    @if (!empty($site->spam_score) && $site->spam_score != '-' )
                                                         <br>Spam Score <strong class="text-primary font-weight-bold">{{$site->spam_score}}%</strong>
                                                    @else
                                                         <br>Spam Score <strong class="text-primary font-weight-bold">No</strong>
                                                    @endif
                                                </td>

                                                <td class="text-center align-middle">
                                                    {{-- <img src="https://www.icopify.co/img/flags/us.jpg" alt="" class="shadow"> --}}
                                                    <br><span>{{ $site->handle_country()  }}</span>
                                               </td>

                                               <td class="text-center align-middle">
                                                @if ($site->site_language == 'Arabic')
                                                 <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/sa.svg" alt="" class="shadow">
                                                @elseif($site->site_language == 'French')
                                                <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="" class="shadow">

                                                @elseif($site->site_language == 'Chinese')
                                                <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/cn.svg" alt="" class="shadow">
                                                @elseif($site->site_language == 'Japanese')
                                                <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/jp.svg" alt="" class="shadow">
                                                @else
                                                <img width="30px" src="https://flagicons.lipis.dev/flags/4x3/us.svg" alt="" class="shadow">
                                                @endif

                                              <br><span>{{ $site->site_language  }}</span>
                                          </td>

                                          <td style="width: 150px;font-size: 15px" class="text-center align-middle">
                                            ${{  (empty($site->site_price))? $site->site_c_p_price : $site->site_price }}
                                         </td>

                                         <td style="width: 150px;font-size: 15px" class="text-center align-middle">
                                           ${{ (empty($site->site_price))? $site->site_c_c_p_price : "$site->site_price + Package" }}
                                        </td>

                                               <td class="text-center align-middle">
                                                  <a href="{{ route('edit_publishers' , ['site_id' => $site->id]) }}"><i class="fa fa-edit"></i>Edit</a>
                                               </td>


                                                </tr>
                                                @empty
                                                    <tr style="font-size: 20px" class="text-danger text-center">
                                                        <td colspan="9">Oops no result for : <span class="text-primary"> {{ $searsh }} </span> keyword</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div style="float: right" class="">
                                          {{$sites->links()}}
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
