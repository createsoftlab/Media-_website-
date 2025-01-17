<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mepress || Blogar</title>
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
                        @foreach ($posts as $post)
                        <div class="blogpost-container">
                            <div class="content-block post-list-view mt--30">
                                <div class="post-thumbnail">
                                    <a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                        <img src="{{ asset('feature_image/' . $post->feature_image) }}" alt="Post Images" style="width: 250px; height: 250px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="post-cat">
                                        <div class="post-cat-list">
                                            <a href="#">
                                                <span>{{$post->category}}</span>
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{$post->title}}</a></h4>
                                    <div class="post-meta-wrapper">
                                        <div class="post-meta">
                                            <div class="content">
                                                <h6 class="post-author-name">
                                                    <span>{{$post->user->username}}</span>
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


                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function () {
                                                        const likesCountElement = document.getElementById("likes-count");
                                                        const likesCount = parseInt(likesCountElement.dataset.count);

                                                        const viewsCountElement = document.getElementById("views-count");
                                                        const viewsCount = parseInt(viewsCountElement.dataset.count);

                                                        function formatNumber(count) {
                                                            if (count >= 1000000) {
                                                                return (count / 1000000).toFixed(1) + "M";
                                                            } else if (count >= 1000) {
                                                                return (count / 1000).toFixed(1) + "k";
                                                            }
                                                            return count;
                                                        }

                                                        likesCountElement.textContent = formatNumber(likesCount);
                                                        viewsCountElement.textContent = formatNumber(viewsCount);
                                                    });
                                                </script>

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
                            <br>
                        </div>
                        @endforeach
                        <!-- End Post List -->

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
                                <h5 class="widget-title">Popular on Blogar</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                    @foreach ($pupularPosts as $post)

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <img src="{{ asset('feature_image/'.$post->feature_image) }}" alt="Post Images" style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{ route('blogPost.details', ['id' => $post->id, 'slug' => $post->slug]) }}">{{
                                                    $post->title }}</a></h6>
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

                        </div>
                        <!-- End Sidebar Area  -->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->


        <!-- Start Footer Area  -->
        @include('home.footer')
        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const posts = Array.from(document.querySelectorAll('.blogpost-container'));
            const postsPerPage = 4; // Number of posts to display per page
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

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->

</html>
