<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $post->meta_title ?? 'Default Title' }} || Event Blog Posts</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="{{ $post->meta_description ?? 'Default Description' }}">
    <meta name="keywords" content="{{ $post->meta_keywords ?? 'Default Keywords' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/assets/images/favicon.png')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/line-awesome.min.css')}}">

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
        .swal-popup {
            font-size: 1.5rem;
            /* Increase overall popup size */
            padding: 30px;
            /* Add more padding */
        }

        .swal-title {
            font-size: 2rem;
            /* Larger title font size */
            font-weight: bold;
            /* Make the title bold */
        }

        .swal-content {
            font-size: 1.25rem;
            /* Larger content font size */
        }

        .swal-button {
            font-size: 1.25rem;
            /* Larger button text */
            padding: 10px 20px;
            /* Adjust button size */
            border-radius: 5px;
            /* Round button corners */
        }

        @media (min-width: 1200px) {
            .single-post {
                width: 23%;
                margin: 10px;
            }
        }


        @media (min-width: 1200px) {
            .single-post {
                width: 23%;
                margin: 10px;
            }
        }

        @media (min-width: 768px) and (max-width: 1199px) {
            .single-post {
                width: 48%;
                /* Two images per row on medium screens */
                margin: 10px;
            }
        }

        @media (max-width: 767px) {
            .single-post {
                width: 100%;
                /* One image per row on mobile screens */
                margin: 10px 0;
            }
        }

        @media (max-width: 576px) {
            li.single-post img {
                width: 100%;
                height: auto;
            }
        }

        .book_wrapper {
            margin: 0 auto;
            padding-top: 50px;
            width: 900px;
            height: 607px;
            position: relative;
            background: #9d5b5b;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #mybook {
            display: none;
        }

        @media (min-width: 1200px) {
            .single-post {
                width: 23%;
                margin: 10px;
            }
        }


        @media (min-width: 768px) and (max-width: 1199px) {
            .single-post {
                width: 48%;
                margin: 10px;
            }
        }


        @media (max-width: 768px) {
            .single-post {
                width: 100%;
                margin: 10px 0;
            }
        }


        @media (max-width: 576px) {
            li.single-post img {
                width: 100%;
                height: auto;
            }
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

        @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                                            Swal.fire({
                                                title: 'Success!',
                                                text: "{{ session('success') }}",
                                                icon: 'success',
                                                confirmButtonText: 'OK',
                                                customClass: {
                                                    popup: 'swal-popup',
                                                    title: 'swal-title',
                                                    content: 'swal-content',
                                                    confirmButton: 'swal-button'
                                                }
                                            });
                                        });
        </script>
        @endif

        <!-- Start Banner Area -->
        <div class="banner banner-single-post post-formate post-standard alignwide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Single Slide  -->
                        <div class="content-block">
                            <!-- Start Post Thumbnail  -->
                            <div class="post-thumbnail">
                                <img src="{{asset('home/assets/images/post-single/post-single-01.jpg')}}"
                                    alt="Post Images">
                            </div>
                            <!-- End Post Thumbnail  -->
                            <!-- Start Post Content  -->
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="{{ $post->category }}">{{ $post->category }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h1 class="title">{{ $post->title }}</h1>
                                <!-- Post Meta  -->
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="post-author-avatar"
                                            style="border-radius: 50%; overflow: hidden; width: 100px; height: 100px;">
                                            @if($post->user->pro_image)
                                            <img src="{{ asset('pro_pic/'.$post->user->pro_image) }}" alt="Author Image"
                                                width="100" height="100"
                                                style="object-fit: cover; border-radius: 50%; aspect-ratio: 1 / 1;">
                                            @else
                                            <i class="la la-user"
                                                style="font-size: 40px; color: #fff; background-color: #4CAF50; border-radius: 50%; width: 100px; height: 100px; display: flex; justify-content: center; align-items: center; transition: all 0.3s ease-in-out;"
                                                onmouseover="this.style.backgroundColor='#009688'"
                                                onmouseout="this.style.backgroundColor='#4CAF50'"></i>
                                            @endif
                                        </div>
                                        <div class="content">
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span class="hover-flip-item">
                                                        <span data-text="{{ $post->user->username }}">{{
                                                            $post->user->username }}</span>
                                                    </span>
                                                </a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li>{{ $post->created_at->format('Y-m-d') }}</li>
                                                <li>{{ $post->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="social-share-transparent justify-content-end">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}"
                                                target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                                target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                                                target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Post Content  -->
                        </div>
                        <!-- End Single Slide  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->

        <!-- MARK:Other Index.html Preview -->

        <!-- Start Iframe Preview Area -->
        <div class="iframe-preview">
            <iframe src="{{ route('book.eventPost.details',$post->id)}}" width="100%" height="850px"
                style="border: none;"></iframe>
        </div>
        <!-- End Iframe Preview Area -->

        <!-- Start gallery Area -->
        <div class="axil-instagram-area axil-section-gap bg-color-WHITE">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Related Images</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-4 row justify-content-center">
                    <!-- Check if post_image1 exists and display if true -->
                    @if($post->EventPostImage && $post->EventPostImage->post_image1)
                    <div class="mb-4 col-lg-3 col-md-6 col-sm-12">
                        <a href="#">
                            <img src="{{ asset('eventPost_image1/' . $post->EventPostImage->post_image1) }}"
                                alt="Post Image 1" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </a>
                    </div>
                    @endif

                    <!-- Check if post_image2 exists and display if true -->
                    @if($post->EventPostImage && $post->EventPostImage->post_image2)
                    <div class="mb-4 col-lg-3 col-md-6 col-sm-12">
                        <a href="#">
                            <img src="{{ asset('eventPost_image2/' . $post->EventPostImage->post_image2) }}"
                                alt="Post Image 2" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </a>
                    </div>
                    @endif

                    <!-- Check if post_image3 exists and display if true -->
                    @if($post->EventPostImage && $post->EventPostImage->post_image3)
                    <div class="mb-4 col-lg-3 col-md-6 col-sm-12">
                        <a href="#">
                            <img src="{{ asset('eventPost_image3/' . $post->EventPostImage->post_image3) }}"
                                alt="Post Image 3" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </a>
                    </div>
                    @endif

                    <!-- Check if post_image4 exists and display if true -->
                    @if($post->EventPostImage && $post->EventPostImage->post_image4)
                    <div class="mb-4 col-lg-3 col-md-6 col-sm-12">
                        <a href="#">
                            <img src="{{ asset('eventPost_image4/' . $post->EventPostImage->post_image4) }}"
                                alt="Post Image 4" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End gallery Area -->


        <!-- Start More Stories Area -->
        <div class="axil-more-stories-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Related Videos</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <!-- Check if video1 exists and display if true -->
                    @if($post->EventPostVideo && $post->EventPostVideo->video1)
                    <div class="mb-4 col-lg-6 col-md-8 col-sm-10 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="text-center post-content">

                                <iframe src="{{ asset('eventVideo1/' . $post->EventPostVideo->video1) }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen style="width: 100%; height: 300px;"></iframe>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Check if video2 exists and display if true -->
                    @if($post->EventPostVideo && $post->EventPostVideo->video2)
                    <div class="mb-4 col-lg-6 col-md-8 col-sm-10 col-12">
                        <div class="post-stories content-block mt--30">
                            <div class="text-center post-content">

                                <iframe src="{{ asset('eventVideo2/' . $post->EventPostVideo->video2) }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen style="width: 100%; height: 300px;"></iframe>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>


        <!-- End More Stories Area -->



        <!-- Start Post Single Wrapper  -->
        <div class="post-single-wrapper axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="axil-post-details">
                            <div class="tagcloud">
                                @if(isset($post->tags) && $post->tags)
                                @foreach(explode(',', $post->tags) as $tag)
                                <a href="#">{{ trim($tag) }}</a>
                                @endforeach
                                @else
                                <a href="#">No Tags Available</a>
                                @endif
                            </div>

                            <div class="social-share-block">
                                <div>
                                    <div class="post-view" style="display: inline-block; margin-right: 20px;">
                                        <i class="fal fa-eye" id="view-icon-{{ $post->id }}"
                                            style="color: {{ $post->views_count ? 'blue' : 'gray' }};"></i>
                                        <span id="view-count-{{ $post->id }}"
                                            style="color: {{ $post->views_count ? 'blue' : 'gray' }}; margin-left: 5px;">
                                            @php
                                            $viewCount = $post->views_count;
                                            if ($viewCount >= 1000) {
                                            echo number_format($viewCount / 1000, 1) . 'k';
                                            } else {
                                            echo $viewCount;
                                            }
                                            @endphp
                                        </span>
                                    </div>
                                    <div class="post-like" style="display: inline-block;">
                                        <button class="like-button" data-post-id="{{ $post->id }}"
                                            style="background: none; border: none; cursor: pointer;">
                                            <i class="fal fa-thumbs-up" id="like-icon-{{ $post->id }}"
                                                style="color: {{ $post->Eventlikes->where('user_id', auth()->id())->where('liked', true)->isNotEmpty() ? 'blue' : 'gray' }};">
                                            </i>
                                            <span id="like-count-{{ $post->id }}"
                                                style="color: {{ $post->Eventlikes->where('user_id', auth()->id())->where('liked', true)->isNotEmpty() ? 'blue' : 'gray' }}; margin-left: 5px;">
                                                @php
                                                $likeCount = $post->Eventlikes->where('liked', true)->count();
                                                echo $likeCount >= 1000 ? number_format($likeCount / 1000, 1) . 'k' :
                                                $likeCount;
                                                @endphp
                                            </span>

                                        </button>
                                    </div>
                                </div>
                                <ul class="social-icon icon-rounded-transparent md-size">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                            target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/?url={{ urlencode(url()->current()) }}"
                                            target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                            target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                                            target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const likeButtons = document.querySelectorAll('.like-button');

                                    likeButtons.forEach(button => {
                                        button.addEventListener('click', function (e) {
                                            e.preventDefault();

                                            const postId = this.getAttribute('data-post-id');
                                            const likeIcon = document.getElementById(`like-icon-${postId}`);
                                            const likeCountSpan = document.getElementById(`like-count-${postId}`);

                                            // Send AJAX request
                                            fetch(`/eventPosts/${postId}/like`, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                                },
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    // Update the like button color
                                                    likeIcon.style.color = data.isLiked ? 'blue' : 'gray';

                                                    // Update the like count
                                                    likeCountSpan.style.color = data.isLiked ? 'blue' : 'gray';
                                                    likeCountSpan.textContent = data.likeCount >= 1000
                                                        ? (data.likeCount / 1000).toFixed(1) + 'k'
                                                        : data.likeCount;
                                                }
                                            })
                                            .catch(error => console.error('Error:', error));
                                        });
                                    });
                                });
                            </script>

                            <!-- Start Author  -->
                            <div class="about-author">
                                <div class="media">
                                    <div class="thumbnail">
                                        <a href="#">
                                            @if($post->user->pro_image)
                                            <img src="{{asset('pro_pic/'.$post->user->pro_image)}}" alt="Author Images"
                                                width="60" height="60"
                                                style="object-fit: cover; border-radius: 50%; aspect-ratio: 1 / 1;">
                                            @else
                                            <img src="{{asset('admin/assets/img/user.jpg')}}" alt="Author Images"
                                                width="80" height="80">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Rahabi Ahmed Khan">{{ $post->user->name
                                                            }}</span>
                                                    </span>
                                                </a>
                                            </h5>
                                            <span class="b3 subtitle">{{ $post->user->username }}</span>
                                        </div>
                                        <div class="content">
                                            <p class="b1 description">{{ $post->user->bio }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Author  -->



                            <!-- Start Comment Form Area  -->
                            <div class="axil-comment-area">


                                <!-- Start Comment Respond -->
                                <div class="comment-respond">
                                    <h4 class="title">Post a comment</h4>
                                    <form id="commentForm" action="{{ url('/eventcomments') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="row row--10">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="comm">Write a Comment</label>
                                                    <textarea name="comment" id="comm" rows="5" required
                                                        style="outline: 2px solid #b862bc; outline-offset: 2px; padding: 10px; border-radius: 5px; font-size: 14px; border: 1px solid #ccc; width: 100%;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit cerchio">
                                                    <button name="submit" type="submit" id="submit"
                                                        class="axil-button button-rounded">
                                                        Post Comment
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <!-- End Comment Respond -->

                                <!-- Start Comment Area  -->
                                <div class="axil-comment-area">
                                    <h4 class="title">{{ $commentCount }} comments</h4>
                                    <ul class="comment-list">
                                        <!-- Start Single Comment -->
                                        @foreach($comments as $comment)
                                        <li class="comment" id="comment-{{ $comment->id }}">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    {{-- <div class="comment-img">
                                                        <img src="{{ $comment->user->pro_image ? asset('pro_pic/' . $comment->user->pro_image) : asset('home/images/avatar.png') }}"
                                                            alt="Author Image" width="50" height="50"
                                                            style="object-fit: cover; border-radius: 50%; aspect-ratio: 1 / 1;">
                                                    </div> --}}
                                                    <div class="comment-img">
                                                        @if ($comment->user && $comment->user->pro_image)
                                                        <!-- Display user profile image if available -->
                                                        <img src="{{ asset('pro_pic/' . $comment->user->pro_image) }}"
                                                            alt="Author Image" width="50" height="50"
                                                            style="object-fit: cover; border-radius: 50%; aspect-ratio: 1 / 1;">
                                                        @else
                                                        <!-- Generate initials for guest or user without a profile image -->
                                                        <div class="avatar-initials"
                                                            style="width: 50px; height: 50px; border-radius: 50%; background-color: #b862bc; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: bold; text-transform: uppercase;">
                                                            {{ $comment->user
                                                            ? substr($comment->user->name, 0, 1) .
                                                            substr(strrchr($comment->user->name, ' '), 1, 1)
                                                            : substr($comment->name, 0, 1) .
                                                            substr(strrchr($comment->name, ' '), 1, 1) }}
                                                        </div>
                                                        @endif
                                                    </div>

                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="{{ $comment->user->name }}">{{
                                                                        $comment->user->name }}</span>
                                                                </span>
                                                            </a>
                                                        </h6>
                                                        <div class="comment-meta">
                                                            <div class="time-spent">{{ $comment->created_at->format('M
                                                                d, Y \a\t h:i A') }}</div>
                                                            <div class="reply-edit">
                                                                <div class="reply">
                                                                    @auth
                                                                    <a class="comment-reply-link hover-flip-item-wrapper"
                                                                        href="javascript:void(0);"
                                                                        onclick="toggleReplyForm({{ $comment->id }})">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Reply">Reply</span>
                                                                        </span>
                                                                    </a>
                                                                    @endauth
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p class="b2">{{ $comment->comment }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="children" id="replies-{{ $comment->id }}">
                                                @foreach($comment->event_replies as $reply)
                                                <li class="comment" id="reply-{{ $reply->id }}">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            {{-- <div class="comment-img">
                                                                <img src="{{ $reply->user->pro_image ? asset('pro_pic/' . $reply->user->pro_image) : asset('home/images/avatar.png') }}"
                                                                    alt="Author Image" width="50" height="50"
                                                                    style="object-fit: cover; border-radius: 50%; aspect-ratio: 1 / 1;">
                                                            </div> --}}

                                                            <div class="comment-img">
                                                                @if ($reply->user && $reply->user->pro_image)
                                                                <!-- Display user profile image if available -->
                                                                <img src="{{ asset('pro_pic/' . $reply->user->pro_image) }}"
                                                                    alt="Author Image" width="50" height="50"
                                                                    style="object-fit: cover; border-radius: 50%; aspect-ratio: 1 / 1;">
                                                                @else
                                                                <!-- Generate initials for guest or user without a profile image -->
                                                                <div class="avatar-initials"
                                                                    style="width: 50px; height: 50px; border-radius: 50%; background-color: #b862bc; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: bold; text-transform: uppercase;">
                                                                    {{ $reply->user
                                                                    ? substr($reply->user->name, 0, 1) .
                                                                    substr(strrchr($reply->user->name, ' '), 1, 1)
                                                                    : substr($reply->name, 0, 1) .
                                                                    substr(strrchr($reply->name, ' '), 1, 1) }}
                                                                </div>
                                                                @endif
                                                            </div>


                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span
                                                                                data-text="{{ $reply->user->name }}">{{
                                                                                $reply->user->name }}</span>
                                                                        </span>
                                                                    </a>
                                                                </h6>
                                                                <div class="comment-meta">
                                                                    <div class="time-spent">{{
                                                                        $reply->created_at->format('M d, Y \a\t h:i a')
                                                                        }}</div>
                                                                </div>
                                                                <div class="comment-text">
                                                                    <p class="b2">{{ $reply->reply }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>

                                            @auth
                                            <div id="reply-form-{{ $comment->id }}" class="comment-respond"
                                                style="display: none;">
                                                <form class="replyForm"
                                                    action="{{ route('event.storeReply', $comment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                    <div class="row row--10">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="reply">Write a Reply</label>
                                                                <textarea name="reply" rows="5" required
                                                                    style="outline: 2px solid #b862bc; outline-offset: 2px; padding: 10px; border-radius: 5px; font-size: 14px; border: 1px solid #ccc; width: 100%;"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-submit cerchio">
                                                                <input type="submit" value="Post Reply"
                                                                    class="axil-button button-rounded">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @endauth
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End Comment Area  -->

                            </div>
                            <!-- End Comment Form Area  -->

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">
                            <!-- Start Single Widget  -->
                            {{-- <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    @foreach ($categories as $category)
                                    <li class="cat-item">
                                        <a href="{{ route('category.post_list',$category->id) }}" class="inner">
                                            <div class="thumbnail">
                                                <img src="{{ asset('category_image/' . $category->image) }}" alt="">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">{{ $category->category }}</h5>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div> --}}
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            {{-- <div class="axil-single-widget widget widget_search mb--30">
                                <h5 class="widget-title">Search</h5>
                                <form action="#">
                                    <div class="axil-search form-group">
                                        <button type="submit" class="search-button"><i
                                                class="fal fa-search"></i></button>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div> --}}
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Latest Event Posts</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                    @foreach ($latestevent_posts as $post)

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('home.event.postDetails', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                                <img src="{{ asset('event_feature_image/'.$post->feature_image) }}"
                                                    alt="Post Images"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{ route('home.event.postDetails', ['id' => $post->id, 'slug' => $post->slug]) }}">{{
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
                            <!-- <div class="axil-single-widget widget widget_newsletter mb--30"> -->
                            <!-- Start Post List  -->
                            <!-- <div class="text-center newsletter-inner">
                                    <h4 class="title mb--15">Never Miss A Post!</h4>
                                    <p class="b2 mb--30">Sign up for free and be the first to <br /> get notified about updates.</p>
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Your Email ">
                                        </div>
                                        <div class="form-submit">
                                            <button class="cerchio axil-button button-rounded"><span>Subscribe</span></button>
                                        </div>
                                    </form>
                                </div> -->
                            <!-- End Post List  -->
                            <!-- </div> -->
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_ads mb--30">
                                <!-- Start Post List  -->
                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="{{asset('home/assets/images/post-single/ads-01.jpg')}}"
                                            alt="Ads Images">
                                    </a>
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
                                    <p style="margin-bottom: 15px;">Ready to share your thoughts and ideas with the
                                        world? Click the button below to post your blog!</p>
                                    <a class="axil-button button-rounded color-secondary-alt"
                                        href="{{ route('user.create.blogpost') }}">Post Blog</a>
                                </div>
                                <!-- End Single Post  -->
                            </div>

                            <!-- End Single Widget  -->

                        </div>
                        <!-- End Post List  -->
                    </div>
                    <!-- End Single Widget  -->


                    <!-- Start Single Widget  -->
                    <!-- <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Recent Post</h5> -->
                    <!-- Start Post List  -->
                    <!-- <div class="post-medium-block">

                                     Start Single Post  -->
                    <!-- <div class="content-block post-medium mb--20">
                                        <div class="post-content">
                                            <h6 class="title"><a href="post-details.html">The underrated design book that transformed the way I
                                                    work </a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>Feb 17, 2019</li>
                                                    <li>300k Views</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                    <!-- End Single Post  -->



                </div>
                <!-- End Sidebar Area  -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main JS -->
    <script src="{{asset('home/assets/js/main.js')}}"></script>
    <script>
        function toggleReplyForm(commentId) {
            const replyForm = document.getElementById('reply-form-' + commentId);
            if (replyForm.style.display === 'none') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        @if(session('scroll_to'))
            const targetId = "{{ session('scroll_to') }}";
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        @endif
    });
    </script>

    <script>
        // Automatically hide the success message after 5 seconds
    setTimeout(() => {
        const message = document.getElementById('success-message');
        if (message) {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500); // Remove the element from the DOM after fading out
        }
    }, 5000); // 5000ms = 5 seconds
    </script>



</body>


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Dec 2024 07:24:09 GMT -->

</html>
