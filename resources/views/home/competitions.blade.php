<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-tech-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:47 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tech Blog || Blogar</title>
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


        <!-- Start Featured Area  -->
        <div class="axil-featured-post axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Competitions and Events</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column axil-control is-active post-horizontal thumb-border-rounded">
                            <div class="post-content">
                                <h6 class="title">From 2025/01/01
                                    <br>
                                    To 2025/01/01
                                </h6>
                                <br>
                                <h4 class="title"><a href="{{url('/apply_events')}}">Apple reimagines the iPhone experience
                                        with iOS 14</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        <img src="{{asset('home/assets/images/post-images/author/author-image-2.png')}}" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="{{url('/author')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Ismat Jahan">Ismat Jahan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>300k Views</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="{{url('/apply_events')}}">
                                    <img src="{{asset('home/assets/images/post-images/post-images-1.jpg')}}" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Post  -->

                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column axil-control post-horizontal thumb-border-rounded">
                            <div class="post-content">
                                <h6 class="title">From 2025/01/01
                                    <br>
                                    To 2025/01/01
                                </h6>
                                <br>
                                <h4 class="title"><a href="{{url('/apply_events')}}">Flutter: the good, the bad and the
                                        ugly</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        <img src="{{asset('home/assets/images/post-images/author/author-image-1.png')}}" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="{{url('/author')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Jone Doe">Jone Doe</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>300k Views</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="{{url('/apply_events')}}">
                                    <img src="{{asset('home/assets/images/post-images/post-images-2.jpg')}}" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Post  -->

                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column axil-control is-active post-horizontal thumb-border-rounded">
                            <div class="post-content">
                                <h6 class="title">From 2025/01/01
                                    <br>
                                    To 2025/01/01
                                </h6>
                                <br>
                                <h4 class="title"><a href="{{url('/apply_events')}}">Apple reimagines the iPhone experience
                                        with iOS 14</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        <img src="{{asset('home/assets/images/post-images/author/author-image-2.png')}}" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="{{url('/author')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Ismat Jahan">Ismat Jahan</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>300k Views</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="{{url('/apply_events')}}">
                                    <img src="{{asset('home/assets/images/post-images/post-images-1.jpg')}}" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Post  -->

                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column axil-control post-horizontal thumb-border-rounded">
                            <div class="post-content">
                                <div class="post-cat">
                                    <h6 class="title">From 2025/01/01
                                        <br>
                                        To 2025/01/01
                                    </h6>
                                    <br>
                                </div>
                                <h4 class="title"><a href="{{url('/apply_events')}}">Flutter: the good, the bad and the
                                        ugly</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        <img src="{{asset('home/assets/images/post-images/author/author-image-1.png')}}" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="{{url('/author')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="Jone Doe">Jone Doe</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>300k Views</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="{{url('/apply_events')}}">
                                    <img src="{{asset('home/assets/images/post-images/post-images-2.jpg')}}" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Post  -->
                </div>
            </div>
        </div>
        <!-- End Featured Area  -->





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


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-tech-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:57 GMT -->
</html>
