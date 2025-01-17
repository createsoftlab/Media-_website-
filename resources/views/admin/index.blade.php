<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Admin - Dashboard</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">

		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/line-awesome.min.css')}}">

		<!-- Chart CSS -->
		<link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    </head>

    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- Header -->
            @include('admin.header')
            <!-- /Header -->

            <!-- Sidebar -->
            @include('admin.sidebar')
            <!-- /Sidebar -->

            <!-- Page Wrapper -->
            <div class="page-wrapper">


                <!-- Page Content -->
                <div class="content container-fluid">


                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center justify-content-between">
                            <!-- Left Side: Page Title and Breadcrumb -->
                            <div class="col-md-6">
                                <h3 class="page-title">Welcome Admin!</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ul>
                            </div>

                            <!-- Right Side: Session Messages -->
                            <div class="col-md-6 d-flex justify-content-end">
                                @if(session('success'))
                                <div class="toast-notification" id="toast-success">
                                    <div class="icon-circle bg-success">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="content">
                                        {{ session('success') }}
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress bg-success"></div>
                                    </div>
                                </div>
                                @endif

                                @if(session('error'))
                                <div class="toast-notification" id="toast-error">
                                    <div class="icon-circle bg-danger">
                                        <i class="fa fa-times"></i>
                                    </div>
                                    <div class="content">
                                        {{ session('error') }}
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress bg-danger"></div>
                                    </div>
                                </div>
                                @endif
                                {{-- /session messages --}}
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="row">
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="la la-calendar-alt"></i></span>
									<div class="dash-widget-info">
										<h3>{{ $totalEvents }}</h3>
										<span>Total <br> Events</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fas fa-newspaper"></i></span>
									<div class="dash-widget-info">
										<h3>{{ $totalBlogPosts }}</h3>
										<span>Live <br>Blog Posts</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fas fa-newspaper"></i></span>
									<div class="dash-widget-info">
										<h3>{{ $totalEventPosts }}</h3>
										<span>Live<br> Event Posts</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
									<div class="dash-widget-info">
										<h3>{{ $totalUsers }}</h3>
										<span>Total<br>Users</span>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h4 class="card-title">Pending Blog Posts</h4>
                                    @foreach ($posts as $post)
                                    <div class="leave-info-box">
                                        <div class="media align-items-center">
                                            <img alt="" src="{{ asset('feature_image/'.$post->feature_image) }}" height="50" width="50">
                                            <div class="media-body">
                                                <div class="my-0 text-sm">{{ Str::words($post->title, 4) }}</div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <h6 class="mb-0">{{ $post->created_at->format('Y-m-d') }},
                                                    {{ $post->created_at->diffForHumans() }}</h6>
                                                <span class="text-sm text-muted">Post Date</span>
                                            </div>
                                            <div class="text-right col-6">
                                                <span class="badge bg-inverse-danger">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="text-center load-more">
                                        <a class="text-dark" href="{{ route('admin.allblogPosts') }}">Load More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <h4 class="card-title">Pending Event Posts</h4>
                                    @foreach ($eventPosts as $post)
                                    <div class="leave-info-box">
                                        <div class="media align-items-center">
                                            <img alt="" src="{{ asset('event_feature_image/'.$post->feature_image) }}" height="50" width="50">
                                            <div class="media-body">
                                                <div class="my-0 text-sm">{{ Str::words($post->title, 4) }}</div>
                                            </div>
                                        </div>
                                        <div class="mt-3 row align-items-center">
                                            <div class="col-6">
                                                <h6 class="mb-0">{{ $post->created_at->format('Y-m-d') }},
                                                    {{ $post->created_at->diffForHumans() }}</h6>
                                                <span class="text-sm text-muted">Post Date</span>
                                            </div>
                                            <div class="text-right col-6">
                                                <span class="badge bg-inverse-danger">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="text-center load-more">
                                        <a class="text-dark" href="{{ route('admin.eventPosts') }}">Load More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>

                </div>
                <!-- /Page Content -->
            </div>
            <!-- /Page Wrapper -->

        </div>
        <!-- /Main Wrapper -->

    {{-- notification --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const toastSuccess = document.getElementById("toast-success");
        const toastError = document.getElementById("toast-error");

        function handleProgressAnimationEnd(toast) {
        const progressBar = toast.querySelector(".progress-bar .progress");

        progressBar.addEventListener("animationend", () => {
          // Add a fade-out effect or hide the toast
          toast.classList.add("fade-out");

          setTimeout(() => {
              toast.remove();
          }, 300); // Adjust the timeout
        });
        }

        if (toastSuccess) {
            handleProgressAnimationEnd(toastSuccess);
        }

        if (toastError) {
            handleProgressAnimationEnd(toastError);
        }
        });
    </script>

		<!-- jQuery -->
        <script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

		<!-- Slimscroll JS -->
		<script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}"></script>

		<!-- Chart JS -->
		<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/chart.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('admin/assets/js/app.js')}}"></script>

    </body>
</html>
