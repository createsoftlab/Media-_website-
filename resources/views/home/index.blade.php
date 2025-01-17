<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-creative-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Index || Blog</title>
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
        body {
            color: white;
            /* Optional: Change text color to white for better contrast */
        }

        #load {
            position: absolute;
            width: 900px;
            height: 70px;
            left: 37%;
            top: 40%;
            margin-left: -300px;
            overflow: visible;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: default;
            font-size: 34px;
        }

        #load div {
            position: absolute;
            width: 20px;
            height: 36px;
            opacity: 0;
            font-family: Helvetica, Arial, sans-serif;
            animation: move 2s linear infinite;
            -o-animation: move 2s linear infinite;
            -moz-animation: move 2s linear infinite;
            -webkit-animation: move 2s linear infinite;
            transform: rotate(180deg);
            -o-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            color: #0a0a0a;
            font-size: 46px;
        }

        #load div:nth-child(2) {
            animation-delay: 0.2s;
            -o-animation-delay: 0.2s;
            -moz-animation-delay: 0.2s;
            -webkit-animation-delay: 0.2s;
        }

        #load div:nth-child(3) {
            animation-delay: 0.4s;
            -o-animation-delay: 0.4s;
            -webkit-animation-delay: 0.4s;
            -webkit-animation-delay: 0.4s;
        }

        #load div:nth-child(4) {
            animation-delay: 0.6s;
            -o-animation-delay: 0.6s;
            -moz-animation-delay: 0.6s;
            -webkit-animation-delay: 0.6s;
        }

        #load div:nth-child(5) {
            animation-delay: 0.8s;
            -o-animation-delay: 0.8s;
            -moz-animation-delay: 0.8s;
            -webkit-animation-delay: 0.8s;
        }

        #load div:nth-child(6) {
            animation-delay: 1s;
            -o-animation-delay: 1s;
            -moz-animation-delay: 1s;
            -webkit-animation-delay: 1s;
        }

        #load div:nth-child(7) {
            animation-delay: 1.2s;
            -o-animation-delay: 1.2s;
            -moz-animation-delay: 1.2s;
            -webkit-animation-delay: 1.2s;
        }

        @keyframes move {
            0% {
                left: 0;
                opacity: 0;
            }

            35% {
                left: 41%;
                -moz-transform: rotate(0deg);
                -webkit-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            65% {
                left: 59%;
                -moz-transform: rotate(0deg);
                -webkit-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            100% {
                left: 100%;
                -moz-transform: rotate(-180deg);
                -webkit-transform: rotate(-180deg);
                -o-transform: rotate(-180deg);
                transform: rotate(-180deg);
                opacity: 0;
            }
        }

        @-moz-keyframes move {
            0% {
                left: 0;
                opacity: 0;
            }

            35% {
                left: 41%;
                -moz-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            65% {
                left: 59%;
                -moz-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            100% {
                left: 100%;
                -moz-transform: rotate(-180deg);
                transform: rotate(-180deg);
                opacity: 0;
            }
        }

        @-webkit-keyframes move {
            0% {
                left: 0;
                opacity: 0;
            }

            35% {
                left: 41%;
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            65% {
                left: 59%;
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            100% {
                left: 100%;
                -webkit-transform: rotate(-180deg);
                transform: rotate(-180deg);
                opacity: 0;
            }
        }

        @-o-keyframes move {
            0% {
                left: 0;
                opacity: 0;
            }

            35% {
                left: 41%;
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            65% {
                left: 59%;
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
                opacity: 1;
            }

            100% {
                left: 100%;
                -o-transform: rotate(-180deg);
                transform: rotate(-180deg);
                opacity: 0;
            }
        }


        .post-blog-button {
            position: fixed;
            bottom: 20px;
            /* Distance from the bottom */
            left: 20px;
            /* Distance from the left */
            background-color: #7c40fe;
            /* Button color */
            color: white;
            /* Text color */
            padding: 10px 20px;
            /* Padding */
            border: none;
            /* No border */
            border-radius: 30px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor */
            z-index: 1000;
            /* Ensure it is above other elements */
            transition: background-color 0.3s;
            /* Smooth transition */
        }

        .post-blog-button:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
        }

        .axil-categories-list {
            overflow: hidden;
            /* Hide overflow to create a sliding effect */
            position: relative;
            /* Position relative for absolute positioning of inner elements */
            width: 100%;
            /* Ensure it takes full width */
        }

        .list-categories {
            display: flex;
            animation: scroll 20s linear infinite;
            /* Continuous scrolling animation */
        }

        .single-cat {
            min-width: 200px;
            /* Set a minimum width for each category */
            margin: 0 10px;
            /* Add some margin for spacing */
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
                /* Move left by 50% to show half of the cloned items */
            }
        }


        .floating-post-area {
            position: fixed;
            /* Fixed position to float on the screen */
            left: 20px;
            /* Distance from the left */
            top: 30%;
            /* Start at the middle of the page */
            transform: translateY(-50%);
            /* Center vertically */
            background-image: url('{{asset('home/assets/images/post-images/122.jpg')}}');
            /* Background image */
            background-size: cover;
            /* Cover the entire area */
            background-position: center;
            /* Center the image */
            color: white;
            /* Text color */
            padding: 15px;
            /* Padding */
            border-radius: 50px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow for depth */
            z-index: 1000;
            /* Ensure it is above other elements */
            width: 270px;
            /* Fixed width */
            height: 230px;
            /* Fixed height */
            display: flex;
            /* Flexbox for alignment */
            flex-direction: column;
            /* Column layout */
            justify-content: center;
            /* Center content vertically */
            align-items: center;
            /* Center content horizontally */
            transition: top 0.3s;
            /* Smooth transition for vertical movement */
        }

        /* Preloader Video Styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: black;
            /* Fallback color */
            z-index: 9999;
            /* Ensure it is above other elements */
        }

        #preloader video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Cover the entire screen */
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .page-item {
            margin: 0 5px;
        }

        .page-item .page-link {
            padding: 5px 10px;
            border: 1px solid #ddd;
            color: #007bff;
            text-decoration: none;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .page-item.disabled .page-link {
            color: #ddd;
            pointer-events: none;
            background-color: #f8f9fa;
        }

         .view-count {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: #555;

        }

        .likes-count {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: #555;

        }
    </style>

</head>

<body class="theme-color-2">
    <!-- Preloader Video -->
    <div id="preloader">
        <video autoplay loop muted>
            <source src="{{asset('home/assets/videos/preloader-vedio.mp4')}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="main-wrapper" style="display: none;">
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
        @include("home.header")
        <!-- Start Header -->

        <!-- Start Mobile Menu Area  -->
        @include("home.mobile_menu")
        <!-- End Mobile Menu Area  -->

        <!-- Start Banner Area -->
        <h1 class="d-none">Home Creative Blog</h1>
        <div class="slider-area creative-slider-area bg-color-grey">
            <div class="axil-slide slider-style-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="order-2 col-lg-6 order-lg-1">
                            <div class="slider-inner slick-nav-avtivation-new">

                                <!-- Start Single Blog  -->
                                @foreach ($latestPosts as $post)
                                <div class="content-block post-medium post-medium-border">
                                    <div class="post-number">
                                        <span>{{ sprintf('%02d', $loop->iteration) }}
                                    </div>
                                    <div class="post-thumbnail">
                                        <a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                            <img src="{{ asset('feature_image/' . $post->feature_image) }}" alt="Post Images" style="width: 100px; height: 100px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a href="">{{ $post->category }}</a>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                                        <div class="post-button">
                                            <a class="axil-button button-rounded color-secondary-alt" href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Single Blog  -->

                            </div>
                        </div>
                        <div class="order-1 col-lg-6 order-lg-2">
                            <div class="thumbnail-wrapper slick-for-avtivation-new">

                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/banner/post-hover-image-01.jpg')}}" alt="Thumbnail Images">
                                    </a>
                                </div>

                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/banner/post-hover-image-02.jpg')}}" alt="Thumbnail Images">
                                    </a>
                                </div>

                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/banner/post-hover-image-03.jpg')}}" alt="Thumbnail Images">
                                    </a>
                                </div>

                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/banner/post-hover-image-01.jpg')}}" alt="Thumbnail Images">
                                    </a>
                                </div>

                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/banner/post-hover-image-02.jpg')}}" alt="Thumbnail Images">
                                    </a>
                                </div>

                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/banner/post-hover-image-03.jpg')}}" alt="Thumbnail Images">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->


        <!-- Start Tab Area  -->
        <div class="axil-tab-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-banner mb--30">
                            <div class="thumbnail">
                                <a href="#">
                                    <img class="w-100" src="{{asset('home/assets/images/add-banner/banner-03.png')}}" alt="Banner Images">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Single Widget  -->
            <div class="container">
                <div class="row align-items-center mb--30">
                    <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                        <div class="section-title">
                            <h2 class="title">Trending Topics</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start List Wrapper  -->
                        <div class="list-categories" id="category-list">
                            @foreach ($categories as $category)
                            <!-- Start Single Category  -->
                            <div class="single-cat">
                                <div class="inner">
                                    <a href="{{ route('category.post_list',$category->id) }}">
                                        <div class="thumbnail">
                                            <img src="{{ asset('category_image/' . $category->image) }}" alt="post categories images" style="width: 170px; height: 170px; object-fit: cover;">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">{{ $category->category }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Category  -->
                            @endforeach
                        </div>
                        <!-- End List Wrapper  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Categories List  -->

        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white">
            <div class="container">
                <div class="row align-items-center mb--30">
                    <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                        <div class="section-title">
                            <h2 class="title">Popular posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-xl-8">

                        <!-- Start Post List  -->
                        @foreach ($pupularPosts as $post)
                        <div class="blogpost-container">
                            <div class="content-block post-list-view mt--30">
                                <div class="post-thumbnail">
                                    <a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                        <img src="{{ asset('feature_image/' . $post->feature_image) }}" alt="Post Images" style="width: 250px; height: 250px; object-fit: cover;">
                                    </a>
                                    <a class="size-medium position-top-center icon-color-secondary" href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}"></a>
                                </div>
                                <div class="post-content">
                                    <div class="post-cat">
                                        <div class="post-cat-list">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{$post->category}}">{{$post->category}}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{$post->title}}</a></h4>
                                    <div class="post-meta-wrapper">
                                        <div class="post-meta">
                                            <div class="content">
                                                <h6 class="post-author-name">
                                                    <a class="hover-flip-item-wrapper">
                                                        <span class="hover-flip-item">
                                                            <span data-text="{{ $post->user->username }}">{{ $post->user->username }}</span>
                                                        </span>
                                                    </a>
                                                </h6>
                                                <ul class="post-meta-list">
                                                    <li>{{ $post->created_at->format('Y-m-d') }}</li>
                                                    <li>{{ $post->created_at->diffForHumans() }}</li>
                                                </ul>
                                                <ul class="mt-4 social-share-transparent justify-content-start ms-1">
                                                    <span class="view-count d-flex align-items-center me-3">
                                                        <i class="fas fa-eye small-icon icon-color"></i>
                                                        <span id="views-count" class="small-number" data-count="{{ $post->views_count }}">{{ $post->views_count }}</span>
                                                    </span>

                                                    <span class="likes-count d-flex align-items-center">
                                                        <i class="fas fa-thumbs-up small-icon icon-color"></i>
                                                        <span id="likes-count" class="small-number" data-count="{{ $post->likes_count }}">{{ $post->likes_count }}</span>
                                                    </span>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="social-share-transparent justify-content-end">
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endforeach

                        <div class="card-footer d-flex justify-content-center">
                            <nav>
                                <ul id="pagination" class="mb-0 pagination pagination-sm">
                                    <!-- Pagination will be dynamically generated here -->
                                </ul>
                            </nav>
                        </div>
                        <!-- End Post List  -->
                        <br>
                        {{-- <a class="axil-button button-rounded color-secondary-alt" href="{{url('/post_list')}}">Read More</a> --}}

                    </div>
                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    @foreach ($oldcategories as $category)
                                    <li class="cat-item">
                                        <a href="{{ route('category.post_list',$category->id) }}" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{ asset('category_image/' . $category->image) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">{{ $category->category }}</h5>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_search mb--30">
                                <h5 class="widget-title">Search</h5>
                                <div class="axil-search form-group">
                                    <button type="button" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" id="search-input" class="form-control" placeholder="Search posts by title">
                                </div>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Latest Blog Posts</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                    @foreach ($latestPosts as $post)

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <img src="{{ asset('feature_image/'.$post->feature_image) }}" alt="Post Images" style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>{{ $post->created_at->format('Y-m-d') }}</li>
                                                    <li>{{ $post->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->
                                    @endforeach

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

                            <!-- Start Single Widget  -->

                            <div class="axil-single-widget widget widget_blog mb--30">
                                <h5 class="widget-title">Post Blog</h5>
                                <!-- Start Single Post  -->
                                <div class="blog-post">
                                    <p style="margin-bottom: 15px;">Ready to share your thoughts and ideas with the world? Click the button below to post your blog!</p>
                                    @if(Auth::check())
                                    @if(Auth::user()->role === 'admin')
                                    <a class="axil-button button-rounded color-secondary-alt" href="{{ route('create.post') }}">Post Blog</a>
                                    @else
                                    <a class="axil-button button-rounded color-secondary-alt" href="{{ route('user.create.blogpost') }}">Post Blog</a>
                                    @endif
                                    @else
                                    <a class="axil-button button-rounded color-secondary-alt" href="{{ route('register') }}">Post Blog</a>
                                    @endif
                                </div>
                                <!-- End Single Post  -->
                            </div>
                            <!-- End Single Widget  -->
                        </div>
                        <!-- End Sidebar Area  -->


                    </div>
                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->
        {{-- removed --}}
        <!-- End Trending Post Area  -->

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
                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ Str::contains($event->link, 'youtube.com') ? Str::after($event->link, 'v=') : Str::after($event->link, 'youtu.be/') }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
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
                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ Str::contains($event->link, 'youtube.com') ? Str::after($event->link, 'v=') : Str::after($event->link, 'youtu.be/') }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
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
                <div class="post-button">
                    <a class="axil-button button-rounded color-secondary-alt" href="{{url('/home_lifestyle_blog')}}">See More</a>
                </div>
            </div>
        </div>
        <!-- End Video Area  -->

        <div class="axil-tech-post-banner pt--30 bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Events</h2>
                        </div>
                    </div>
                    @foreach ($events as $event)
                    <div class="col-xl-3 col-md-6 mt_lg--30 mt_md--30 mt_sm--30 col-12">
                        <!-- Start Single Post -->
                        <div class="content-block image-rounded" style="margin-bottom: 20px;">
                            <div class="post-thumbnail" style="margin-bottom: 5px;">
                                <a href="{{ Auth::check() ? route('home.event.details', $event->id) : url('/apply_events', $event->id) }}">
                                    <img src="{{ asset('event_image/'.$event->image) }}" alt="Post Images" style="width: 300px; height: 250px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="post-content" style="padding-top: 10px;">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{ $event->start_date }}"></span>{{ $event->end_date }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h5 class="title">
                                    <a href="{{ Auth::check() ? route('home.event.details', $event->id) : url('/apply_events', $event->id) }}">
                                        {{ Str::words($event->event_title, 5, '...') }}
                                    </a>
                                </h5>
                            </div>
                        </div>
                        <!-- End Single Post -->
                    </div>
                    @endforeach
                </div>
                <br>
                <a class="axil-button button-rounded color-secondary-alt" href="{{ route('home.events')}}" style="margin-left: 10px;">See more</a><br><br>
            </div>
        </div>


        <!-- Start Footer Area  -->
        @include("home.footer")
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const posts = Array.from(document.querySelectorAll('.blogpost-container'));
            const postsPerPage = 5; // Number of posts to display per page
            let currentPage = 1; // Initialize the current page
            let filteredPosts = posts; // Default to all posts

            // Function to update posts display
            function updatePosts() {
                const startIndex = (currentPage - 1) * postsPerPage;
                const endIndex = startIndex + postsPerPage;

                // Hide all posts first
                posts.forEach(post => (post.style.display = 'none'));

                // Show only the posts in the current page
                filteredPosts.slice(startIndex, endIndex).forEach(post => (post.style.display = 'block'));

                // Update pagination buttons
                updatePagination();
            }

            // Function to update pagination
            function updatePagination() {
                const pagination = document.getElementById('pagination');
                pagination.innerHTML = ''; // Clear the existing pagination

                const totalPages = Math.ceil(filteredPosts.length / postsPerPage);

                // Previous button
                const prevButton = document.createElement('li');
                prevButton.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
                prevButton.innerHTML = `<a class="page-link" href="#">Previous</a>`;
                prevButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        updatePosts();
                    }
                });
                pagination.appendChild(prevButton);

                // Page numbers
                for (let i = 1; i <= totalPages; i++) {
                    const pageItem = document.createElement('li');
                    pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
                    pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                    pageItem.addEventListener('click', function(e) {
                        e.preventDefault();
                        currentPage = i;
                        updatePosts();
                    });
                    pagination.appendChild(pageItem);
                }

                // Next button
                const nextButton = document.createElement('li');
                nextButton.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
                nextButton.innerHTML = `<a class="page-link" href="#">Next</a>`;
                nextButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        updatePosts();
                    }
                });
                pagination.appendChild(nextButton);
            }

            // Function to handle search
            function filterPosts() {
                const searchTerm = document.getElementById('search-input').value.toLowerCase();
                filteredPosts = posts.filter(post => {
                    const title = post.querySelector('.title a').textContent.toLowerCase();
                    return title.includes(searchTerm); // Filter posts based on title
                });

                currentPage = 1; // Reset to first page
                updatePosts();
            }

            // Event listener for search input
            document.getElementById('search-input').addEventListener('input', filterPosts);

            // Initialize the display
            updatePosts();
        });

    </script>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const preloader = document.getElementById('preloader');
            const mainWrapper = document.querySelector('.main-wrapper');

            // Check if the preloader has been shown in this session
            if (!sessionStorage.getItem('preloaderShown')) {
                // Show the preloader
                preloader.style.display = 'block';

                // Use setTimeout to hide the preloader after 1 second
                setTimeout(function() {
                    preloader.style.display = 'none'; // Hide the preloader
                    mainWrapper.style.display = 'block'; // Show the main content
                    // Set the flag in session storage
                    sessionStorage.setItem('preloaderShown', 'true');
                }, 2000); // Delay of 1 second
            } else {
                // If preloader has been shown, directly show the main content
                preloader.style.display = 'none';
                mainWrapper.style.display = 'block';
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            const categories = document.querySelector('.list-categories');
            const items = document.querySelectorAll('.single-cat');

            // Clone the categories to create a seamless loop
            items.forEach(item => {
                const clone = item.cloneNode(true);
                categories.appendChild(clone);
            });

            // Set the width of the list-categories to accommodate the cloned items
            categories.style.width = `${items.length * 200}px`; // Adjust based on your category width
        });

        function moveFloatingPost() {
            const floatingPost = document.querySelector('.floating-post-area');
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;

            // Random position within the window
            const randomX = Math.random() * (windowWidth - 200); // Adjust for width of the post area
            const randomY = Math.random() * (windowHeight - 100); // Adjust for height of the post area

            floatingPost.style.left = `${randomX}px`;
            floatingPost.style.top = `${randomY}px`;
        }

    </script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-creative-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:39 GMT -->
</html>
