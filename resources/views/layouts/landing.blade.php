<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="/assets/css/meanmenu.min.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="/assets/css/boxicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="/assets/css/odometer.min.css">
    <!-- Carousel CSS -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <!-- Carousel Default CSS -->
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="/assets/css/dark.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title></title>
     @yield('style')
    <link rel="icon" type="image/png" href="">
</head>

<body>

    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- End Preloader Area -->
 
    <!-- Start Navbar Area -->
    <div class="navbar-area p-relative">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href=" ">
                            <!-- <img src=" " class="white-logo" alt=" ">
                                <img src=" " class="black-logo" alt=" "> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <!-- <img src="assets/img/logo-1.png" class="white-logo" alt="logo">
                            <img src="assets/img/logo-2.png" class="black-logo" alt="logo"> -->
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Home
                                    <i class='bx bx-chevron-down'></i>
                                </a> 
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Review
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Compare
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Side-by-side
                                </a>
                            </li>
                            <li class="nav-item d-block d-md-none">
                                <a href="#" class="nav-link">
                                    Login
                                </a>
                            </li>    
                            <li class="nav-item d-block d-md-none">
                                <a href="#" class="nav-link">
                                    Try it Free
                                </a>
                            </li>                                 
                        </ul>

                        <div class="others-options d-flex align-items-center"> 
                            @auth
                            <div class="option-item Login_btn">
                                <a href="/login" class="navbar-btn">Dashboard</a>
                            </div>
                            @else
                            <div class="option-item Login_btn">
                                <a href="/login" class="navbar-btn">Login</a>
                            </div>
                            <div class="option-item">
                                <a href="/register" class="navbar-btn">Try it Free</a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </div>

       
    </div>
    <!-- End Navbar Area -->

     @yield('content')
    <!-- Start Footer Area -->
    <footer class="footer-area pt-5 pb-70">
        <div class="container">
            <div class="row">


                <div class="col-lg-3 col-sm-6 my-auto">
                    <div class="single-footer-widget text-center">

                        <p>Download the app by clicking the link below :</p>

                        <div class="d-flex align-items-center Download_store">
                            <a href=""><img src="assets/img/landinpage/appstore.svg" alt=""></a>
                            <a href=""><img src="assets/img/landinpage/appstore.svg" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="row">



                        <div class="col-lg-7 col-md-7 ">
                            <div class="row">

                                <div class="col-sm-6 col-6">
                                    <div class="single-footer-widget">
                                        <h2>Pages</h2>
                                        <ul class="quick-links">
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i> Home it work</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i>Review</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i> Compare</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i> Pricing</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-6">
                                    <div class="single-footer-widget">
                                        <h2>Service</h2>


                                        <ul class="quick-links">
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i>Shopify</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i> WordPress</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class='bx bxs-chevrons-right'></i> UI/UX Design</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="single-footer-widget">
                                <h2> Contact</h2>

                                <ul class="footer-contact-info">
                                    <li>
                                        <i class='flaticon-phone-call'></i>
                                        <a href="">(406) 555-0120</a>
                                    </li>
                                    <li>
                                        <i class='flaticon-envelope'></i>
                                        <a href=" "><span class="__cf_email__"> abcdef@gmail.com</span></a>
                                    </li>
                                    <li>
                                        <i class='flaticon-pin'></i>
                                        2972 Westheimer Rd. Santa Ana, Illinois 85486
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>



                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h2>Sosial media</h2>

                        <ul class="footer-social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-pinterest-alt'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
    </footer>
    <!-- End Footer Area -->



    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class='bx bx-up-arrow-alt'></i>
    </div>
    <!-- End Go Top Area -->

    <!-- Jquery Slim JS -->
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Meanmenu JS -->
    <script src="/assets/js/jquery.meanmenu.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <!-- Jquery Appear JS -->
    <script src="/assets/js/jquery.appear.min.js"></script>
    <!-- Odometer JS -->
    <script src="/assets/js/odometer.min.js"></script>
    <!-- Popup JS -->
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Ajaxchimp JS -->
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator JS -->
    <script src="/assets/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="/assets/js/contact-form-script.js"></script>
    <!-- Wow JS -->
    <script src="/assets/js/wow.min.js"></script>
    <!-- Custom JS -->
    <script src="/assets/js/main.js"></script>
    @yield('script')
</body>

</html>