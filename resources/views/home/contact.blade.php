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






        <!-- Start Banner Area  -->
        <div class="axil-banner banner-style-1 bg_image bg_image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner">
                            <h1 class="title">Contact Us</h1>
                            <p class="description">Wherever &#38; whenever you need us. We are here for you – contact us
                                for all your support needs.<br /> be it technical, general queries or information
                                support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area  -->

        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">
                        <!-- Start About Area  -->
                        <div class="axil-about-us">
                            <div class="inner">
                                <h2>Say Hello! </h2>
                                <p>Donec cursus dolor vitae congue consectetur. Morbi mattis viverra felis. Etiam
                                    dapibus id turpis at sagittis. Cras mollis mi vel ante ultricies, id ullamcorper mi
                                    pulvinar. Proin bibendum ornare risus, lacinia cursus quam condimentum id. Curabitur
                                    auctor massa eget porttitor molestie. Aliquam imperdiet dolor nec metus pulvinar
                                    sollicitudin. </p>
                                <p><strong>Aliquam iaculis at odio ut tempus</strong>. Suspendisse blandit luctus dui, a
                                    consequat mauris mollis id. Sed in ante at tortor malesuada imperdiet. Vestibulum
                                    sed gravida nibh. Nulla suscipit congue lorem, id tempor ipsum molestie sit amet.
                                    Nulla ultricies vitae erat in tincidunt. Maecenas tempus quam et ipsum elementum, a
                                    efficitur lectus tincidunt. Praesent diam elit, tincidunt ac tempus vulputate,
                                    aliquet viverra mauris. Etiam eu nunc efficitur, sagittis est ut, fringilla neque.
                                    Ut interdum eget lorem eget congue. Ut nec arcu placerat, mattis urna vel, consequat
                                    diam. Sed in leo in dolor suscipit molestie. </p>
                                <p class="primary-color">Email: <a href="#">mepress@gmail.com</a></p>
                            </div>
                            <!-- Start Contact Form -->

                            <div class="axil-section-gapTop axil-contact-form-area">
                                <h4 class="title mb--10">Send Us a Message</h4>
                                <p class="b3 mb--30">Your email address will not be published. All the fields are
                                    required.</p>
                                <form id="contact-form" method="POST"
                                    action="https://new.axilthemes.com/demo/template/blogar/mail.php"
                                    class="axil-contact-form contact-form--1 row"
                                    onsubmit="return validateContactForm()">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="contact-name">Your Name</label>
                                            <input name="contact-name" id="contact-name" type="text" required
                                                style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                            <span class="error-message" id="name-error"
                                                style="color: red; display: none;">Please enter your name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="contact-phone">Phone</label>
                                            <input type="text" name="contact-phone" id="contact-phone" required
                                                style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                            <span class="error-message" id="phone-error"
                                                style="color: red; display: none;">Please enter your phone
                                                number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="contact-email">Your Email</label>
                                            <input name="contact-email" id="contact-email" type="email" required
                                                style="border: 2px solid purple; border-radius: 5px; padding: 10px;">
                                            <span class="error-message" id="email-error"
                                                style="color: red; display: none;">Please enter a valid email.</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea name="contact-message" id="contact-message" required
                                                style="border: 2px solid purple; border-radius: 5px; padding: 10px;"></textarea>
                                            <span class="error-message" id="message-error"
                                                style="color: red; display: none;">Please enter a message.</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-submit">
                                            <button name="submit" type="submit" id="submit"
                                                class="axil-button button-rounded btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Contact Form -->
                        </div>
                        <!-- End About Area  -->
                    </div>
                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">


                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Popular on Blogar</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                   <!-- Start Single Post  -->
                                   @foreach ($pupularPosts as $post)

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
