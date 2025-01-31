<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us || Blogar </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/assets/images/favicon.png')}}">

   <!-- CSS
   ============================================ -->

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('home/assets/css/vendor/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('home/assets/css/vendor/font-awesome.css')}}">
   <link rel="stylesheet" href="{{asset('home/assets/css/vendor/slick.css')}}">
   <link rel="stylesheet" href="{{asset('home/assets/css/vendor/slick-theme.css')}}">
   <link rel="stylesheet" href="{{asset('home/assets/css/vendor/base.css')}}">
   <link rel="stylesheet" href="{{asset('home/assets/css/plugins/plugins.css')}}">
   <link rel="stylesheet" href="{{asset('home/assets/css/style.css')}}">

</head>

<body>
    <div class="main-wrapper">
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <span title="Light Mode">Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <span title="Dark Mode">Dark</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Start Header -->
        @include('home.header')
        <!-- Start Header -->


          <!-- Start Mobile Menu Area  -->
          @include("home.mobile_menu")
          <!-- End Mobile Menu Area  -->

        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">
                        <!-- Start About Area  -->
                        <div class="axil-about-us">

                            <!-- Start Contact Form  -->
                    <div class="axil-section-gapTop axil-contact-form-area">
                        <h4 class="title mb--10">Login to Your Account</h4>
                        <p class="b3 mb--30">Please enter your details to log in.</p>
                        <form id="login-form" method="POST" action="https://new.axilthemes.com/demo/template/blogar/login.php" class="axil-contact-form contact-form--1 row" onsubmit="return validateForm()">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" id="username" type="text" required style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                    <span class="error-message" id="username-error" style="color: red; display: none;">Please enter your username.</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="full-name">Full Name</label>
                                    <input name="full-name" id="full-name" type="text" required style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                    <span class="error-message" id="name-error" style="color: red; display: none;">Please enter your full name.</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="login-email">Your Email</label>
                                    <input name="login-email" id="login-email" type="email" required style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                    <span class="error-message" id="email-error" style="color: red; display: none;">Please enter a valid email.</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="login-password">Password</label>
                                    <input name="login-password" id="login-password" type="password" required style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                    <span class="error-message" id="password-error" style="color: red; display: none;">Password must be at least 6 characters.</span>
                                    <button type="button" id="toggle-password" onclick="togglePassword()">Show</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" id="remember-me">
                                    <label for="remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-submit">
                                    <button name="submit" type="submit" id="submit" class="axil-button button-rounded btn-primary">Login</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="b3 mt--20">Don't have an account? <a href="#">Sign Up</a></p>
                                <p class="b3 mt--20"><a href="#">Forgot Password?</a></p>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form  -->
                            <!-- End Contact Form  -->
                        </div>
                        <!-- End About Area  -->
                    </div>
                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">
                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-01.jpg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Tech</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-02.jpg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Style</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-03.jpg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Travel</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-04.jpg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Food</h5>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_search mb--30">
                                <h5 class="widget-title">Search</h5>
                                <form action="#">
                                    <div class="axil-search form-group">
                                        <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Popular on Blogar</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{url('/post_details')}}">
                                                <img src="{{asset('home/assets/images/small-images/blog-sm-01.jpg')}}" alt="Post Images">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{url('/post_details')}}">The underrated design book that transformed the way I
                                                    work </a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>Feb 17, 2019</li>
                                                    <li>300k Views</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{url('/post_details')}}">
                                                <img src="{{asset('home/assets/images/small-images/blog-sm-02.jpg')}}" alt="Post Images">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{url('/post_details')}}">Here’s what you should (and shouldn’t) do when</a>
                                            </h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>Feb 17, 2019</li>
                                                    <li>300k Views</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{url('/post_details')}}">
                                                <img src="{{asset('home/assets/images/small-images/blog-sm-03.jpg')}}" alt="Post Images">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{url('/post_details')}}">How a developer and designer duo at Deutsche Bank keep
                                                    remote</a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>Feb 17, 2019</li>
                                                    <li>300k Views</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                </div>
                                <!-- End Post List  -->

                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_social mb--30">
                                <h5 class="widget-title">Stay In Touch</h5>
                                <!-- Start Post List  -->
                                <ul class="social-icon md-size justify-content-center">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-slack"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <!-- End Post List  -->
                            </div>
                            <!-- End Single Widget  -->
                        </div>
                        <!-- End Sidebar Area  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->

        <!-- Start Instagram Area  -->
       <div class="axil-instagram-area axil-section-gap bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title">Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--30">
                <div class="col-lg-12">
                    <ul class="instagram-post-list">
                        <li class="single-post">
                            <a href="#">
                                <img src="{{asset('home/assets/images/small-images/instagram-md-01.jpg')}}" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="{{asset('home/assets/images/small-images/instagram-md-02.jpg')}}" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="{{asset('home/assets/images/small-images/instagram-md-03.jpg')}}" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="{{asset('home/assets/images/small-images/instagram-md-04.jpg')}}" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="{{asset('home/assets/images/small-images/instagram-md-05.jpg')}}" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                        <li class="single-post">
                            <a href="#">
                                <img src="{{asset('home/assets/images/small-images/instagram-md-06.jpg')}}" alt="Instagram Images">
                                <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Area  -->

       <!-- Start Footer Area  -->
       @include('home.footer')
       <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>

    <!-- JS
============================================ -->
   <!-- Modernizer JS -->
   <script src="{{asset('home/assets/js/vendor/modernizr.min.js')}}"></script>
   <!-- jQuery JS -->
   <script src="{{asset('home/assets/js/vendor/jquery.js')}}"></script>
   <!-- Bootstrap JS -->
   <script src="{{asset('home/assets/js/vendor/bootstrap.min.js')}}"></script>
   <script src="{{asset('home/assets/js/vendor/slick.min.js')}}"></script>
   <script src="{{asset('home/assets/js/vendor/tweenmax.min.js')}}"></script>
   <script src="{{asset('home/assets/js/vendor/js.cookie.js')}}"></script>
   <script src="{{asset('home/assets/js/vendor/jquery.style.switcher.js')}}"></script>


   <!-- Main JS -->
   <script src="{{asset('home/assets/js/main.js')}}"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->
</html>
