<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ @csrf }}">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Pr - Guest Posting &amp; Placment</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-32x32.png">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon-32x32.png">
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/favicon-32x32.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ============Start Facebook Data===========================-->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="List of 15000+ Websites And Blogs That Accept Guest Posts" />
    <meta property="og:description" content="hamza pr ." />
    <meta property="og:image" content="https://hamza.jpg" />
    <!-- ============End Facebook Data===========================-->



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <script src="https://icopify.co/assets/js/config.navbar-vertical.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://icopify.co/assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="https://icopify.co/assets/lib/owl.carousel/owl.carousel.css" rel="stylesheet">
    <link href="https://icopify.co/assets/lib/lightbox2/css/lightbox.min.css" rel="stylesheet">
    <link href="https://icopify.co/assets/lib/plyr/plyr.css" rel="stylesheet">

    <link href="https://icopify.co/assets/css/theme.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

</head>

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->



    <main class="main" id="top">
        <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark navbar-theme shadow-bottom text-white bg-dark"
            style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">
            <div class="container"><a class="navbar-brand" href="#"><span class="text-white"><img
                          style="width: 75px;height: 80px;"  src="{{ asset('public/assets/images/logo.png') }}" alt="Pr ott"></span></a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="navbar-collapse scrollbar collapse" id="navbarStandard" style="">

                    <ul class="navbar-nav ml-auto">




                        <li class="nav-item dropdown dropdown-on-hover">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="paidads">
                                Content Writing & Placement
                            </a>
                            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0"
                                aria-labelledby="paidads">
                                <div class="bg-white dark__bg-1000 rounded py-2">
                                    <a class="dropdown-item link-600 fw-medium"
                                        href="{{ route('all_publishers') }}">Blog Posts Writing</a>
                                    <a class="dropdown-item link-600 fw-medium"
                                        href="{{ route('all_publishers') }}">Article Writing</a>

                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('contacts.index') }}" role="button">Contact Us</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            {{-- <a href="#" data-toggle="modal" data-target="#modal-logout" data-backdrop="static" data-keyboard="false" class="btn btn-danger float-right">Logout</a> --}}
                            <a style="width: 120px;height: 35px;" class="btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }} &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}" role="button">LOGIN</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white " href="{{ route('register') }}" role="button">SIGN
                                UP</a></li>
                        @endauth

                    </ul>

                </div>
            </div>
        </nav>







        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0 overflow-hidden" id="banner">

            <div class="bg-holder bg-dark"
                style="background-image:url(https://icopify.co/img/business-woman-making-presentation-office.jpg);background-position: center top;">



            </div>
            <!--/.bg-holder-->

            <div class="container">

                <div class="row justify-content-center align-items-center pt-9 pt-lg-8 pb-5 mb-8 mt-8">
                    <div class="col-md-11 col-lg-12 col-xl-12 pb-3 pb-xl-3 text-center text-xl-center">


                        <h1 class="font-weight-bold text-white" style="font-size: 55px">Premium Content <span
                                style="color: yellow;">Writing & Placment</span></h1>
                        <h3 class="mb-1 text-white font-weight-bold">Post <span style="color: yellow"> At High-Quality
                                Websites</span></h3>
                        <h4 class="mb-1 text-white mt-2">Only Pay If You Are Satisfied With The Results</h4>




                        <a href="{{ route('register') }}" class="btn  fs-0 rounded btn-lg mr-2 mt-3 btn-light">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Sign Up Now
                        </a>
                        <a href="/#viewPricing" class="btn  fs-0 rounded btn-lg mr-2 mt-3 btn-primary">
                            <i class="fas fa-money-check-alt mr-2"></i>
                            View Pricing
                        </a>


                        {{-- <h6 class="mb-3 mt-2 ml-n3 text-white"><span style="color: yellow">*</span> Starting From <span class="font-weight-bold" style="color: yellow">$4.99</span></h6> --}}


                    </div>



                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <!-- <section> begin website stats for pages ============================-->
        <section style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);" class="py-3  shadow shadow-bottom">


            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-12 col-md-6 col-xl mb-1 text-center text-light"><span class="text-light h4"
                            data-countup='{"count":35241,"duration":1000,"format":"comma"}'>0</span><strong
                            class="h4 text-white">+</strong><br><span><strong>Registered Websites </strong></span>
                    </div>
                    <div class="col-12 col-md-6 col-xl mb-1 text-center text-light"><span class="text-light h4"
                            data-countup='{"count":22298,"duration":1000,"format":"comma"}'>0</span><strong
                            class="h4 text-white">+</strong><br><strong>Publishers & Writers</strong></div>
                    <div class="col-12 col-md-6 col-xl mb-1 text-center text-light"><span class="text-light h4"
                            data-countup='{"count":141591,"duration":1000,"format":"comma"}'>0</span><strong
                            class="h4 text-white">+</strong><br><span><strong>Tasks Completed</strong></span></div>
                </div>
            </div>

            <!-- end of .container-->

        </section>

        <!-- <section> begin ============================-->
        <section class="py-3 bg-200 shadow-lg">


            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30"
                            src="/img/featured-1.png" alt="" /></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30"
                            src="/img/featured-2.png" alt="" /></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40"
                            src="/img/featured-3.png" alt="" /></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40"
                            src="/img/featured-4.png" alt="" /></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="45"
                            src="/img/featured-5.png" alt="" /></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40"
                            src="/img/featured-6.png" alt="" /></div>
                </div>
            </div>



        </section>
        <!-- <section> close website stats for pages ============================-->





        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-white text-dark">

            <div class="container mt-4">
                <div class="row justify-content-center text-center mb-5 mt-n5">
                    <div class="">
                        <h1 class=" font-weight-bold" id="viewPricing">Increasing The Visibility Of Your Website</h1>
                        <h3 class="font-weight-medium">Accelerate Your Business Growth With Our Services</h3>
                    </div>
                </div>

                <div class="mb-2 card mt-1">
                    <div class="card-body rounded" style="background-color: #d5e5fa">



                        <embed src="{{ route('publisher_data') }}" class="" width="100%"
                            height="690" />
                    </div>
                </div>


                <h2 class="fs-2 fs-sm-4 fs-md-5 font-weight-bold text-facebook mt-7 mb-5 text-center">How Our Platform
                    Works</h2>
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="bg-facebook mr-2 icon-item shadow"><strong
                                            class="fs-2 font-weight-bold m-3" style="color: yellow">1</strong></span>
                                    <span class="flex-1">Buyer Registration and Account Setup</span>
                                </div>
                                <p class="card-text">Prospective buyers start their journey on the PR guest
                                    posting marketplace by registering an account.
                                    They can sign up using their email address or social media accounts like Facebook or
                                    Gmail. Once registered,
                                    they receive a confirmation email and are ready to begin accessing thousands of
                                    quality sites for guest posting.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="bg-facebook mr-2 icon-item shadow"><strong
                                            class="fs-2 font-weight-bold m-3" style="color: yellow">2</strong></span>
                                    <span class="flex-1">Publisher Search and Task Assignment</span>
                                </div>
                                <p class="card-text">Buyers navigate through the platform's inventory to search for
                                    suitable publishers to collaborate with.
                                    They can utilize various filters to refine their search based on metrics like domain
                                    authority, domain rating, and organic traffic.
                                    After identifying preferred publishers, buyers can send direct tasks to initiate
                                    collaboration.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="bg-facebook mr-2 icon-item shadow"><strong
                                            class="fs-2 font-weight-bold m-3" style="color: yellow">3</strong></span>
                                    <span class="flex-1">Task Creation and Submission</span>
                                </div>
                                <p class="card-text">Buyers proceed to create tasks for the selected publishers,
                                    specifying their requirements and providing URLs for promotion.
                                    They have the option to choose between Content Placement, Content Creation &
                                    Placement, and Link Insertions.
                                    Tasks are submitted immediately for publisher review.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="bg-facebook mr-2 icon-item shadow"><strong
                                            class="fs-2 font-weight-bold m-3" style="color: yellow">4</strong></span>
                                    <span class="flex-1">Task Progress Monitoring and Communication</span>
                                </div>
                                <p class="card-text">Buyers utilize the MY ORDERS section to track the progress of
                                    their tasks and communicate directly with publishers regarding any task-related
                                    queries.
                                    Buyers can explore features like Open Offer to receive suggestions from publishers
                                    who are open to collaboration.</p>
                            </div>
                        </div>
                    </div>







                </div>









                <h2 class="fs-2 fs-sm-4 fs-md-5 font-weight-bold text-facebook mt-7 mb-5 text-center">Why Choose Us
                </h2>
                <div class="row mb-5">

                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-img-top bg-soft-primary text-center">{{-- <img class="img-fluid text-center"
                                    src="/img/White-Label-Assurance.png" alt="Card image cap" width="300px" /> --}}</div>
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="flex-1">Extensive Network Access</span>
                                </div>
                                <p class="card-text">PR's guest posting marketplace provides access to a vast
                                    network of blogs and websites across numerous industries. This diverse selection
                                    allows users to target specific audiences effectively, maximizing the reach and
                                    impact of their content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-img-top bg-soft-primary text-center">{{-- <img class="img-fluid text-center"
                                    src="/img/Comprehensive-Research.png" alt="Card image cap" width="300px" /> --}}
                            </div>
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="flex-1">Quality Assurance Standards</span>
                                </div>
                                <p class="card-text">PR maintains stringent editorial standards to ensure the
                                    quality of guest posts. Through thorough vetting processes and adherence to industry
                                    best practices, users can trust that their content will be published on reputable
                                    platforms, enhancing their brand credibility and authority.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-img-top bg-soft-primary text-center">{{-- <img class="img-fluid text-center"
                                    src="/img/Effective-Clustering.png" alt="Card image cap" width="300px" /> --}}</div>
                            <div class="card-body">
                                <div class="card-title text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="flex-1">Seamless Collaboration Tools</span>
                                </div>
                                <p class="card-text">The platform offers intuitive collaboration tools that facilitate
                                    smooth communication between Advertisers(Buyers) and publishers. From negotiating
                                    terms to submitting content and tracking progress, PR streamlines the guest
                                    posting process, fostering efficient and productive partnerships.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card border h-100 border-primary">
                            <div class="card-img-top bg-soft-primary text-center">{{-- <img class="img-fluid text-center"
                                    src="/img/Cost-Effective-Solutions.png" alt="Card image cap" width="300px" /> --}}
                            </div>
                            <div class="card-body">
                                <div
                                    class="card-title  text-center text-facebook font-weight-bold align-items-center d-flex">
                                    <span class="flex-1">Cost-Effective Solutions</span>
                                </div>
                                <p class="card-text">PR offers competitive pricing options, making guest posting
                                    accessible to businesses of all sizes. Whether operating on a limited budget or
                                    seeking to maximize ROI, users can find cost-effective solutions that align with
                                    their financial goals while still reaping the benefits of guest posting.</p>
                            </div>
                        </div>
                    </div>

                </div>









            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->








        <!-- ============================================-->
        <!-- <section> begin ============================-->

























        <!-- <section> close ============================-->
        <!-- ============================================-->











        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-light text-center shadow-lg">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="fs-2 fs-sm-4 fs-md-5 font-weight-bold text-facebook">Here's What Our Clients Say
                        </h2>
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col-lg-4">
                        <div class="card card-span h-100">
                            <div class="card-span-img"><span class="fas fa-user-tie fs-4 text-facebook"></span></div>
                            <div class="card-body pt-6 pb-4">
                                <h5 class="mb-2">Gary G.</h5>
                                <p>
                                    Being a startup company, we were very pleased with the performance and ranking
                                    results delivered through PR platform. We were able to achieve quality
                                    backlinks & branded guest blogs on our website in a relatively short period of time.
                                    The team has been very responsive in addressing any type of query.
                                </p>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-6 mt-lg-0">
                        <div class="card card-span h-100">
                            <div class="card-span-img"><span class="fas fa-user-tie fs-4 text-facebook"></span></div>
                            <div class="card-body pt-6 pb-4">
                                <h5 class="mb-2">David R.</h5>
                                <p>
                                    The work of an SEO manager is an ongoing process with lots of ups & downs. But,
                                    since I have been associated with iCopfiy, my SEO procedures have become very
                                    seamless. Getting sponsored articles along with the highest level of transparency
                                    and professionalism has been the biggest benefit.
                                </p>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-6 mt-lg-0">
                        <div class="card card-span h-100">
                            <div class="card-span-img"><span class="fas fa-user-tie fs-4 text-facebook"></span></div>
                            <div class="card-body pt-6 pb-4">
                                <h5 class="mb-2">Michaela W.</h5>
                                <p>
                                    Being a marketeer, I understand the importance of content marketing strategy and
                                    getting relevant content placed on the website. I have had a great experience
                                    working with iCopify as it helped me connect with professionals who could provide me
                                    cost-effective & top-notch content.
                                </p>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-facebook"
            style="background-image:url(https://icopify.co/img/business-people-modern-office.jpg);background-position: center;">

            <div class="bg-holder overlay ">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <p class="fs-3 fs-sm-4 text-white font-weight-bold">Start Growing your Business Today</p>
                        <a href="{{ route('register') }}"
                            class="btn btn-light border-2x rounded-pill btn-lg mt-4 fs-0 py-2" role="button">GET
                            STARTED <span class="fas fa-play" data-fa-transform="shrink-6 down-1 right-5"></span></a>

                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <div class="modal fade" id="authentication-modal" tabindex="-1"
            aria-labelledby="authentication-modal-label" style="display: none;" aria-hidden="true">
            <div class="modal-dialog mt-11" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header px-3 text-white position-relative modal-shape-header">
                        <div class="position-relative z-index-1">
                            <div class="text-center">
                                <h5 class="text-white text-center">VIEW PRICING</h5>




                            </div>
                        </div>
                        <button class="close text-white position-absolute t-0 r-0 mt-n2 mr-0" data-dismiss="modal"
                            aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body py-3">


                        <script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=yJxsd&webforms_id=BA2cM"
                            data-webform-id="BA2cM"></script>


                    </div>
                </div>
            </div>
        </div>




        <!-- ============================================-->
        <!-- <section>  Footer begin ============================-->
        <!-- ============================================-->

        <!-- ============================================-->

        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);" class="py-0 ">

            <div>
                <hr class="my-0 border-600 opacity-25" />
                <div class="container py-3">
                    <div class="row justify-content-between fs--1">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-200 opacity-85"><br class="d-sm-none" />&copy; 2024 Pr. All Rights
                                Reserved.

                            </p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">


                            <a href="https://www.osdire.com" target="_blank" class="text-decoration-none mt-5"
                                style="color: rgb(201, 107, 41)">
                                <div class="fs--1 text-white">
                                    <p>
                                        Made with ❤ by
                                        <img src="{{ asset('public/assets/images/logo.png') }}" alt="" width="90px" height="40px">
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="https://icopify.co/assets/js/jquery.min.js"></script>
    <script src="https://icopify.co/assets/js/popper.min.js"></script>
    <script src="https://icopify.co/assets/js/bootstrap.min.js"></script>
    <script src="https://icopify.co/assets/lib/@fortawesome/all.min.js"></script>
    <script src="https://icopify.co/assets/lib/stickyfilljs/stickyfill.min.js"></script>
    <script src="https://icopify.co/assets/lib/sticky-kit/sticky-kit.min.js"></script>
    <script src="https://icopify.co/assets/lib/is_js/is.min.js"></script>
    <script src="https://icopify.co/assets/lib/lodash/lodash.min.js"></script>
    <script src="https://icopify.co/assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <script src="https://icopify.co/assets/lib/owl.carousel/owl.carousel.js"></script>
    <script src="https://icopify.co/assets/lib/typed.js/typed.js"></script>
    <script src="https://icopify.co/assets/js/theme.js"></script>
    <script src="https://icopify.co/assets/lib/lightbox2/js/lightbox.min.js"></script>
    <script src="https://icopify.co/assets/lib/plyr/plyr.polyfilled.min.js"></script>
    <script src="{{ asset('public/template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    
    


</body>

</html>
