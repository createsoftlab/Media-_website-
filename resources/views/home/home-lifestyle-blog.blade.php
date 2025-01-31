<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-lifestyle-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home || Blogar </title>
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




        <!-- Start Video Area  -->
        <div class="axil-video-post-area axil-section-gap bg-color-black">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Live Events</h2>
                        </div>
                    </div>
                </div>
                <br>
                 <div class="row">
                    @foreach($live as $event)
                        <div class="mb-4 col-xl-4 col-md-6 mt_md--30 mt_sm--30 col-12">
                            <div class="content-block image-rounded">
                                <div class="post-thumbnail">
                                    @if(auth()->check())
                                        @if(Str::contains($event->link, 'youtube.com') || Str::contains($event->link, 'youtu.be'))
                                            <!-- Embed YouTube Video -->
                                            <iframe
                                                width="100%"
                                                height="200"
                                                src="https://www.youtube.com/embed/{{ Str::contains($event->link, 'youtube.com') ? Str::after($event->link, 'v=') : Str::after($event->link, 'youtu.be/') }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        @else
                                            <!-- Display Image -->
                                            <a href="{{ $event->link }}">
                                                <img src="{{ asset('live_event_image/' . $event->image) }}" alt="Post Images">
                                            </a>
                                        @endif
                                    @else
                                        @if(Str::contains($event->link, 'youtube.com') || Str::contains($event->link, 'youtu.be'))
                                            <!-- Embed YouTube Video -->
                                            <iframe
                                                width="100%"
                                                height="200"
                                                src="https://www.youtube.com/embed/{{ Str::contains($event->link, 'youtube.com') ? Str::after($event->link, 'v=') : Str::after($event->link, 'youtu.be/') }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                        @else
                                            <!-- Display Image -->
                                            <a href="{{ $event->link }}">
                                                <img src="{{ asset('live_event_image/' . $event->image) }}" alt="Post Images">
                                            </a>
                                        @endif
                                    @endif
                                </div>
                                <div class="post-content pt--20">
                                    <div class="post-cat">
                                        <div class="post-cat-list">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{ $event->title }}">{{ $event->title }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <h5 class="title">
                                        @if(auth()->check())
                                            <a href="{{ $event->link }}">
                                                {{ $event->description }}
                                            </a>
                                        @else
                                            <a href="{{ $event->link }}">
                                                {{ $event->description }}
                                            </a>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Video Area  -->



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


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-lifestyle-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:03 GMT -->
</html>
