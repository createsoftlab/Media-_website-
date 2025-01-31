<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-tech-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:47 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Events || Blogar </title>
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
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .page-item {
            margin: 0 5px;
            /* Moderate spacing between items */
        }

        .page-item .page-link {
            padding: 8px 12px;
            /* Slightly smaller button size */
            border: 1.5px solid #ddd;
            /* Thin border for a clean look */
            border-radius: 4px;
            /* Rounded corners */
            font-size: 16px;
            /* Smaller font size */
            color: #007bff;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
            /* Smooth hover effect */
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

        .page-item .page-link:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            color: white;
            border-color: #0056b3;
        }
    </style>
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
        <h1 class="d-none">Home Tech Blog</h1>
        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">

                        <!-- Start Post List  -->
                        @foreach ($events as $post)
                        <div class="event-list">
                        <div class="content-block post-list-view mt--30">
                            <div class="post-thumbnail">
                                <a href="{{ Auth::check() ? route('home.event.details', $post->id) : url('/apply_events', $post->id) }}">
                                    <img src="{{ asset('event_image/'.$post->image) }}" alt="Post Images" style="width: 250px; height: 250px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{ $post->created_at->diffForHumans() }}">{{ $post->created_at->diffForHumans() }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"><a href="{{ Auth::check() ? route('home.event.details', $post->id) : url('/apply_events', $post->id) }}">{{ $post->event_title }}</a></h4>
                                <h6 class="post-author-name">
                                    <span data-text="{{ $post->description }}">{{ $post->description }}</span>
                                </h6>
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <ul class="post-meta-list">
                                                <li>{{ $post->start_date}}</li>
                                                <li>{{ $post->end_date }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="social-share-transparent justify-content-end">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}"
                                                target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->event_title) }}"
                                                target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                        @endforeach

                        <!-- End Post List  -->
                          <!-- Pagination -->
                          <div class="card-footer d-flex justify-content-center">
                            <nav>
                                <ul id="pagination" class="mb-0 pagination pagination-sm">
                                    <!-- Pagination will be dynamically generated here -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    @foreach ($categories as $category)
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
                                        @if(Auth::user()->is_admin)
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
        <!-- Start Instagram Area  -->
        <div class="axil-instagram-area axil-section-gap bg-color-light">
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
                                    <img src="{{asset('home/assets/images/small-images/instagram-md-01.jpg')}}"
                                        alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{asset('home/assets/images/small-images/instagram-md-02.jpg')}}"
                                        alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{asset('home/assets/images/small-images/instagram-md-03.jpg')}}"
                                        alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{asset('home/assets/images/small-images/instagram-md-04.jpg')}}"
                                        alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{asset('home/assets/images/small-images/instagram-md-05.jpg')}}"
                                        alt="Instagram Images">
                                    <span class="instagram-button"><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li class="single-post">
                                <a href="#">
                                    <img src="{{asset('home/assets/images/small-images/instagram-md-06.jpg')}}"
                                        alt="Instagram Images">
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const posts = Array.from(document.querySelectorAll('.event-list')); // Select your event containers
            const postsPerPage = 2; // Number of posts to display per page
            let currentPage = 1; // Initialize the current page

            // Function to update posts display
            function updatePosts() {
                const startIndex = (currentPage - 1) * postsPerPage;
                const endIndex = startIndex + postsPerPage;

                // Hide all posts first
                posts.forEach(post => (post.style.display = 'none'));

                // Show only the posts in the current page
                posts.slice(startIndex, endIndex).forEach(post => (post.style.display = 'block'));

                // Update pagination buttons
                updatePagination();
            }

            // Function to update pagination
            function updatePagination() {
                const pagination = document.getElementById('pagination');
                pagination.innerHTML = ''; // Clear the existing pagination

                const totalPages = Math.ceil(posts.length / postsPerPage);

                // Previous button
                const prevButton = document.createElement('li');
                prevButton.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
                prevButton.innerHTML = `<a class="page-link" href="#">Previous</a>`;
                prevButton.addEventListener('click', function (e) {
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
                    pageItem.addEventListener('click', function (e) {
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
                nextButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        updatePosts();
                    }
                });
                pagination.appendChild(nextButton);
            }

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

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/home-tech-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:23:57 GMT -->

</html>
