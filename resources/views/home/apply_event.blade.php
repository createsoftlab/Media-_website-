<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Apply Event || Blogar </title>
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

    <style>
        .competition-section {
            padding: 50px 0;
            background-color: #f9f9f9;
            text-align: center;
        }

        .competition-section h2 {
            margin-bottom: 20px;
        }

        .competition-section p {
            margin-bottom: 30px;
            font-size: 18px;
        }

        .apply-now-button {
            padding: 10px 20px;
            background-color: #a746d3;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .apply-now-button:hover {
            background-color: #a746d3;
        }
    </style>

</head>

<body>
    <div class="main-wrapper">
        <div class="mouse-cursor cursor-outer"></div>
        <div class="mouse-cursor cursor-inner"></div>

        <!-- Start Header -->
        @include('home.header')
        <!-- End Header -->

        <!-- Start Post Single Wrapper  -->

        <div class="post-single-wrapper axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Start Banner Area -->
                        <div class="banner banner-single-post post-formate post-layout axil-section-gapBottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Start Single Slide  -->
                                        <div class="content-block">
                                            <!-- Start Post Content  -->
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="EVENT POSTS">EVENT POSTS</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h1 class="title">{{ $event->event_title }}</h1>
                                                <h5 class="title">{{ $event->description }}</h5>

                                                <!-- Post Meta  -->
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">

                                                            <ul class="post-meta-list">
                                                                <li>From {{ $event->start_date }} To {{ $event->end_date }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="social-share-transparent justify-content-end">
                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                        <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->event_title) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="copyToClipboard('{{ url()->current() }}')">
                                                                <i class="fas fa-link"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <script>
                                                    function copyToClipboard(link) {
                                                        const tempInput = document.createElement('input');
                                                        tempInput.value = link;
                                                        document.body.appendChild(tempInput);
                                                        tempInput.select();
                                                        document.execCommand('copy');
                                                        document.body.removeChild(tempInput);

                                                        // Optional: Show a confirmation message
                                                        alert('Link copied to clipboard!');
                                                    }
                                                </script>

                                            </div>
                                            <!-- End Post Content  -->
                                        </div>
                                        <!-- End Single Slide  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Banner Area -->
                        <h5 class="title">Events Posts View Login Users Only</h5>
                        <div class="axil-post-details">
                            <a class="axil-button button-rounded color-secondary-alt" href="{{ route('login', ['redirect_to' => route('home.event.details', $event->id)]) }}">Apply Now</a>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-4">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_ads mb--30">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/post-single/ads-01.jpg')}}" alt="Ads Images">
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_social mb--30">
                                <h5 class="widget-title">Stay In Touch</h5>
                                <ul class="social-icon md-size justify-content-center">
                                    <li><a href="#"><i class="fab fa-facebook-f "></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-slack"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Post Single Wrapper  -->

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

</html>
