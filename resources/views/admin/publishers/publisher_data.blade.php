<!DOCTYPE html>

<html lang="en" dir="ltr" class="fontawesome-i2svg-active chrome windows fontawesome-i2svg-complete">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="v6ItqpyAb2KSy28HJN1qGzJdibikGUICNunmQPYF">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Pr - ott </title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->







    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->



    <link href="https://icopify.co/assets/lib/datatables-bs4/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://icopify.co/assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css" rel="stylesheet">



    <link href="https://icopify.co/assets/css/theme.css" rel="stylesheet">


    <style>
        th,
        td {
            white-space: nowrap;
        }
    </style>
</head>


<body>


    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <div class="alert alert-primary border-none shadow-bottom mb-2 mr-n1 ml-n1 mt-n1 fixed-top text-center"
            role="alert">
            <h5 class="text-facebook mt-1"><strong class="font-weight-bold">
                {{ $site_count ?? 0  }}
                </strong> <span class="text-facebook">

                    Websites & Blogs That Accept Guest Posts </span>


            </h5>
        </div>
        <div class="container-fluid" data-layout="container">
            <div class="content">


                <!-- Search website -->

                <!-- End Search website -->


                <!-- Toolbar -->
                <div class="card mt-6">
                    <div class="table-responsive col-md-12">
                            <table class="table table-sm table-bordered table-hover table-striped  datatable">
                                <thead class="bg-300 bg-info">

                                    <tr>
                                        <th style="width: 200px;">
                                            Websites
                                        </th>

                                        {{-- <th style="width: 200px;">
                                            Websites Name
                                        </th> --}}

                                        <th style="width: 150px;">
                                            Categories
                                        </th>

                                        <th style="width: 150px;">
                                            Monthly Traffic
                                        </th>

                                        <th>
                                            Ahrefs DR
                                        </th>

                                        <th>
                                             Moz DA
                                        </th>

                                        <th style="width: 150px;">
                                            REGION / LOCATION
                                        </th>

                                        <th>Language</th>

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

                                    {{-- <td>{{ $site->site_name }}</td> --}}

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
                                        @if (!empty($site->spam_score) && $site->spam_score != '-' )
                                        <br>Spam Score <strong class="text-primary font-weight-bold">{{$site->spam_score}}%</strong>
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

                                   <td class="row">
                                      <div class="btn-group btn-group-sm btn-block">
                                        @if(!empty($site->site_price))
                                          <span  style="background-color: #2c7be5;color:white" class="btn">{{ ($site->site_price) ? "$$site->site_price" : '$0'}}</span>
                                        @else
                                          <span  class="btn btn-danger">The Price Not Yet</span>
                                        @endif
                                        {{-- <a href="{{route('order_index', ['project_id'=> request()->project_id && 1 , 'site_id' => $site->id ])}}" style="width: 100px;"
                                             class="btn btn-primary">$ {{$site->site_price}}</a> Buy Again --}}
                                      </div>

                                      <div class="btn-group">
                                        <div class="d-flex justify-content-between">

                                            <span target="_blank" class="btn btn-outline-google-plus btn-block btn-sm mt-2" role="button" title="View Details">
                                                View Details
                                            </span>

                                        </div>
                                      </div>
                                    </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

                <div class=" my-3" style="float: right">
                   {{-- paginations --}}
                   <ul class="pagination">
                   {{ $sites->links() }}
                   </ul>
                </div>


               {{-- start footer --}}
                <div class="alert alert-primary shadow mb-n1 mr-n1 ml-n1 fixed-bottom text-center text-dark mt-3"
                    role="alert">
                    <div class="d-flex">
                        <span>
                            <i class="fs--1">
                                Last update: <strong class="font-weight-bold fs--1 text-facebook">{{ $latest_update ?? '' }}</strong>
                            </i>
                        </span>
                    </div>
                </div>
                {{-- end footer --}}




                <!-- Form to unlock hidden link -->

                <!-- End Form to unlock hidden link -->



                <!-- Footer -->
                <footer>
                    <div class="row no-gutters justify-content-between fs--1 my-5 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600 mt-4"> </p>
                        </div>
                    </div>
                </footer>
                <!-- / Footer-->
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->








    <!-- ===============================================-->
    <!--    JavaScripts -->
    <!-- ===============================================-->


    <script src="https://icopify.co/assets/js/bootstrap.min.js"></script>
    <script src="https://icopify.co/assets/lib/@fortawesome/all.min.js"></script>





    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <script src="https://icopify.co/assets/lib/datatables/js/jquery.dataTables.min.js"></script>
    <script src="https://icopify.co/assets/lib/datatables-bs4/dataTables.bootstrap4.min.js"></script>
    <script src="https://icopify.co/assets/lib/datatables.net-responsive/dataTables.responsive.js"></script>
    <script src="https://icopify.co/assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>



    <script src="https://icopify.co/assets/js/theme.js"></script>


</body>

</html>
