<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="77TRzFtnMIQhZQuH9OXiJXwHmmRveZIf5cMKySSz">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Pr - Contact Us</title>


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
                        <li class="nav-item"><a class="nav-link text-white" href="" role="button">Contact Us</a>
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
        <section class="py-2 my-3 overflow-hidden" id="banner">
             <div class="container">
                <div class="row">
                    <section class="container mt-5">
                        <!--Contact heading-->
                        <div class="row">
                           <div class="col-sm-12 text-center mb-4">

                          </div>
                           <!--Grid column-->
                           <div class="col-sm-12 mb-4 col-md-5">
                              <!--Form with header-->
                              <form action="{{ route('contacts.store') }}" method="post">
                                 @csrf
                                <div class="card border-primary rounded-0">
                                    <div class="card-header p-0">
                                        <div class="bg-primary text-white text-center py-2">
                                        <h3><i class="fa fa-envelope"></i> Write to us:</h3>
                                        <p class="m-0">We’ll write rarely, but only the best content.</p>
                                        </div>
                                    </div>
                                    <div style="font-size: 20px" class="card-body p-3">

                                        <div class="form-group">
                                        <label> Your name </label>
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control  @error('name') is-invalid  @enderror" id="name" placeholder="Your name">
                                        </div>
                                        @error('name')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Your email</label>
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" id="email" placeholder="Your Email">
                                            </div>
                                            @error('email')
                                               <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Your Phone Number <span class="text-danger"> (with country code)</span></label>
                                            <div class="input-group mb-2 mb-sm-0">
                                            <input type="number" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" value="+971" placeholder="Your mobile">
                                            </div>
                                            @error('mobile')
                                              <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Your Subject">
                                            </div>
                                            @error('subject')
                                              <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <div class="input-group mb-2 mb-sm-0">
                                                <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="10" placeholder="Your Message"></textarea>
                                            </div>
                                            @error('message')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            
                                        </div>
                                        <div class="text-center"><br><br>
                                            <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block rounded-0 py-2">
                                        </div>

                                        </div>

                                    </div>
                                </div>
                               </form>
                           <!--Grid column-->

                           <!--Grid column-->
                           <div class="col-sm-12 card col-md-7">
                              <!--Google map-->
                              <div class="mb-5 mt-3">
                                <iframe width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.5792478867356!2d55.22347157595976!3d25.183681132246914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f41fff73710a5%3A0x36a76cf053806379!2sSunset%20Mall!5e0!3m2!1sen!2sae!4v1715006317290!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                              </div>
                              <!--Buttons-->
                              <div class="row text-center">
                                 <div class="col-md-4">
                                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                                    <p> Sunset Mall, UAE Kite Beach - Jumeirah 3 Beach  - Dubai</p>
                                 </div>
                                 <div class="col-md-4">
                                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                                    <p>+971 58 556 3070</p>
                                 </div>
                                 <div class="col-md-4">
                                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                                    <p> info@overthetop.ae</p>
                                 </div>
                              </div>
                           </div>
                           <!--Grid column-->
                             </div>
                     </section>
                </div>
             </div>
        </section>




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
