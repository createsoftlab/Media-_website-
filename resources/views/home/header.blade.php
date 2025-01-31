<header class="header axil-header header-dark header-sticky">
    <div class="header-wrap">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12 d-flex align-items-center">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img class="dark-logo" src="{{asset('home/assets/images/logo/logo-white.png')}}" alt="Blogar logo">
                        <img class="light-logo" src="{{asset('home/assets/images/logo/logo-white2.png')}}" alt="Blogar logo">
                    </a>
                </div>
            </div>

            <div class="col-xl-6 d-none d-xl-block">
                <div class="mainmenu-wrapper">
                    <nav class="mainmenu-nav">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                            <li><a href="{{url('/')}}">Home</a>
                            </li>


                            <!-- <li class="menu-item-has-children"><a href="post-format-standard.html">Posts</a>
                            </li> -->

                            <li><a href="{{url('/post_list')}}">Blogs</a>
                                <!-- <ul class="axil-submenu">
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="404.html">
                                            <span class="hover-flip-item">
                <span data-text="404 Page">404 Page</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="maintenance.html">
                                            <span class="hover-flip-item">
                <span data-text="Maintenance">Maintenance</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="privacy-policy.html">
                                            <span class="hover-flip-item">
                <span data-text="Privacy Policy">Privacy Policy</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul> -->
                            </li>

                            <!-- lifestyle -->
                            <li><a href="{{url('/home_lifestyle_blog')}}">Live Events</a></li>
                            <!-- gadgets -->
                            <li><a href="{{url('/home/events')}}">Events</a></li>
                            <!-- about us -->
                            <li><a href="{{url('/about')}}">About Us</a></li>
                            <!-- contact us -->
                            <li><a href="{{url('/contact')}}">Contact Us</a></li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                </div>
            </div>

            <div class="col-xl-3 col-lg-5 col-md-8 col-sm-9 col-12">
                <div class="header-search text-end d-flex align-items-center">
                    <!-- <form class="header-search-form d-sm-block d-none">
                        <div class="axil-search form-group">
                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                    <div class="mobile-search-wrapper d-sm-none d-block">
                        <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                        <form class="header-search-form">
                            <div class="axil-search form-group">
                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div> -->

                    <!-- Start Hamburger Menu  -->
                    <div class="hamburger-menu d-block d-xl-none">
                        <div class="hamburger-inner">
                            <div class="icon"><i class="fal fa-bars"></i></div>
                        </div>
                    </div>
                    <!-- End Hamburger Menu  -->

                    <ul class="metabar-block">
                        <!-- <li class="icon"><a href="#"><i class="fas fa-bookmark"></i></a></li> -->
                        {{-- <li class="icon"><a href="#"><i class="fas fa-bell"></i></a></li> --}}
                        @auth
                        @if(auth()->user()->role === 'admin')
                        <li></li>
                        <a href="{{ url('admin/dashboard') }}" class="axil-button button-rounded color-secondary-alt">Dashboard</a>
                        @elseif(auth()->user()->role === 'user')
                        <li></li>
                        <a href="{{ url('user/dashboard') }}" class="axil-button button-rounded color-secondary-alt">Dashboard</a>
                        @else
                        <li><a class="axil-button button-rounded color-secondary-alt" href="{{ route('login') }}">Login</a></li>
                        <a class="axil-button button-rounded color-secondary-alt" href="{{ route('register') }}" style="margin-left: 10px;">Register</a>
                        @endif
                        @else
                        <li><a class="axil-button button-rounded color-secondary-alt" href="{{ route('login') }}">Login</a></li>
                        <a class="axil-button button-rounded color-secondary-alt" href="{{ route('register') }}" style="margin-left: 10px;">Register</a>
                        @endauth
                    </ul>

                </div>
            </div>
        </div>
    </div>
</header>
