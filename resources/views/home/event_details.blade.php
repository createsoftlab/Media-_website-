<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Event Details || Blogar</title>
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
        <!-- End Header -->


        <!-- Start Mobile Menu Area  -->
        @include("home.mobile_menu")
        <!-- End Mobile Menu Area  -->

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
                                                <!-- Post Meta  -->
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <ul class="post-meta-list">
                                                                <li>From {{ $event->start_date }} To {{ $event->end_date
                                                                    }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="social-share-transparent justify-content-end">
                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}"
                                                                target="_blank"><i class="fab fa-instagram"></i></a>
                                                        </li>
                                                        <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->event_title) }}"
                                                                target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                        <li>
                                                            <a href="javascript:void(0);"
                                                                onclick="copyToClipboard('{{ url()->current() }}')">
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

                        <div class="axil-post-details">
                            <p class="has-medium-font-size">{{ $event->description }}</p>
                            <figure class="wp-block-image">
                                <img src="{{ asset('event_image/'.$event->image) }}" alt="Post Images">
                            </figure>
                            <blockquote>
                                <p>“Join us for this exciting event and share your experience with the world!,
                                    take the oppurtunity to write a blog post to share your insights”</p>
                                <br>
                                @if(auth()->check() && auth()->user()->role !== 'admin')
                                    <a class="axil-button button-rounded color-secondary-alt" href="{{ route('user.create.eventPost', $event->id) }}">Post Blog</a>
                                @else
                                    <a class="axil-button button-rounded color-secondary-alt" disabled>User Only</a>
                                @endif

                            </blockquote>
                            <div class="social-share-block">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">
                            <!-- Start Single Widget  -->
                            {{-- <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-01.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Travel</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-02.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Health</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-03.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Sports</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="cat-item">
                                        <a href="#" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{asset('home/assets/images/post-images/category-image-04.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">Food</h5>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- End Single Widget  -->

                            {{--
                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_search mb--30">
                                <h5 class="widget-title">Search</h5>
                                <form action="#">
                                    <div class="axil-search form-group">
                                        <button type="submit" class="search-button"><i
                                                class="fal fa-search"></i></button>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                            <!-- End Single Widget  --> --}}

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Latest Event Posts</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">
                                    <!-- Start Single Post  -->
                                    @foreach ($latestevent_posts as $event_post)
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('home.event.postDetails', ['id' => $event_post->id, 'slug' => $event_post->slug]) }}">
                                                <img src="{{ asset('event_feature_image/'.$event_post->feature_image) }}"
                                                    alt="Post Images"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{ route('home.event.postDetails', ['id' => $event_post->id, 'slug' => $event_post->slug]) }}">{{ $event_post->title }}</a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>{{ $event_post->created_at->format('Y-m-d') }}</li>
                                                    <li>{{ $event_post->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- End Single Post  -->
                                </div>
                                <!-- End Post List  -->
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_ads mb--30">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/post-single/ads-01.jpg')}}"
                                            alt="Ads Images">
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

                            <div class="axil-single-widget widget widget_blog mb--30">
                                <h5 class="widget-title">Post Blog</h5>
                                <!-- Start Single Post  -->
                                <div class="blog-post">
                                    <p style="margin-bottom: 15px;">Ready to share your thoughts and ideas with the
                                        world? Click the button below to post your blog!</p>
                                    @if(auth()->check() && auth()->user()->role !== 'admin')
                                    <a class="axil-button button-rounded color-secondary-alt"
                                        href="{{ route('user.create.eventPost', $event->id) }}">Post Blog</a>
                                    @else
                                        <a class="axil-button button-rounded color-secondary-alt" disabled>User Only</a>
                                    @endif

                                </div>
                                <!-- End Single Post  -->
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_search mb--30">
                                <h5 class="widget-title">Search</h5>
                                <div class="axil-search form-group">
                                    <button type="button" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" id="search-input" class="form-control"
                                        placeholder="Search posts by title">
                                </div>
                            </div>
                            <!-- End Single Widget  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Post Single Wrapper  -->

            <!-- Start Post List Wrapper  -->
            <div class="axil-post-list-area post-listview-visible-color bg-color-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-8">

                            <!-- Start Post List  -->
                            @foreach ($event_posts as $event_post)
                            <div class="blogpost-container">
                                <div class="content-block post-list-view is-active mt--30">
                                    <div class="post-thumbnail">
                                        <a href="{{ route('home.event.postDetails', ['id' => $event_post->id, 'slug' => $event_post->slug]) }}">
                                            <img src="{{ asset('event_feature_image/'.$event_post->feature_image) }}"
                                                alt="Post Images" style="width: 259px; height: 250px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span class="hover-flip-item">
                                                        <span data-text="{{ $event_post->category }}">{{
                                                            $event_post->category }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h4 class="title"><a
                                                href="{{ route('home.event.postDetails', ['id' => $event_post->id, 'slug' => $event_post->slug]) }}">{{
                                                $event_post->title }}</a></h4>
                                        <div class="post-meta-wrapper">
                                            <div class="post-meta">
                                                <div class="content">
                                                    <h6 class="post-author-name">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="{{ $event_post->user->username }}">{{
                                                                    $event_post->user->username }}</span>
                                                            </span>
                                                        </a>
                                                    </h6>
                                                    <ul class="post-meta-list">
                                                        <li>{{ $event_post->created_at->format('Y-m-d') }}</li>
                                                        <li>{{ $event_post->created_at->diffForHumans() }}</li>
                                                    </ul>
                                                    <ul class="mt-4 social-share-transparent justify-content-start ms-1">
                                                        <span class="view-count d-flex align-items-center me-3">
                                                            <i class="fas fa-eye small-icon icon-color"></i>
                                                            <span id="views-count" class="small-number" data-count="{{ $event_post->views_count }}">{{ $event_post->views_count }}</span>
                                                        </span>

                                                        <span class="likes-count d-flex align-items-center">
                                                            <i class="fas fa-thumbs-up small-icon icon-color"></i>
                                                            <span id="likes-count" class="small-number" data-count="{{ $event_post->eventlikes_count }}">{{ $event_post->eventlikes_count }}</span>
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
                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                        target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}"
                                                        target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->event_title) }}"
                                                        target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            @endforeach
                            <!-- End Post List  -->
                            <!-- Pagination -->
                            <div class="card-footer d-flex justify-content-center">
                                <nav>
                                    <br>
                                    <ul id="pagination" class="mb-0 pagination pagination-sm">
                                        <!-- Pagination will be dynamically generated here -->
                                    </ul>
                                    <br>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
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
