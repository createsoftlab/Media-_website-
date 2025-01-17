<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>404 || Blogar </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
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



        <!-- Start Banner Area -->

        <!-- Start Error Area  -->
        <div class="error-area bg_image--4 bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner">
                            <img src="{{asset('assets/images/others/404.png')}}" alt="Error Images">
                            <h1 class="title">Page not found!</h1>
                            <p>Sorry, but the page you were looking for could not be found.</p>
                            <div class="back-totop-button cerchio d-inline-block">
                                <a class="axil-button button-rounded hover-flip-item-wrapper" href="{{url('/')}}">
                                    <span class="hover-flip-item">
                                        <span data-text="Back to Homepage">Back to Homepage</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Error Area  -->
        <!-- Start Footer Area  -->
        <div class="axil-footer-area axil-footer-style-1 footer-variation-2">
            <div class="footer-mainmenu">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">World</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">U.N.</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Politics</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Executive</a></li>
                                        <li><a href="#">Senate</a></li>
                                        <li><a href="#">House</a></li>
                                        <li><a href="#">Judiciary</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Foreign policy</a></li>
                                        <li><a href="#">Polls</a></li>
                                        <li><a href="#">Elections</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Entertainment</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Celebrity News</a></li>
                                        <li><a href="#">Movies</a></li>
                                        <li><a href="#">TV News</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Music News</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Style News</a></li>
                                        <li><a href="#">Entertainment Video</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Business</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">Health</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">Movies</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h2 class="title">About</h2>
                                <div class="inner">
                                    <ul class="ft-menu-list">
                                        <li><a href="#">U.N.</a></li>
                                        <li><a href="#">Conflicts</a></li>
                                        <li><a href="#">Terrorism</a></li>
                                        <li><a href="#">Disasters</a></li>
                                        <li><a href="#">Global Economy</a></li>
                                        <li><a href="#">Environment</a></li>
                                        <li><a href="#">Religion</a></li>
                                        <li><a href="#">Scandals</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Start Footer Area  -->
            @include('home.footer')
            <!-- End Footer Top Area  -->

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


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:10 GMT -->
</html>
