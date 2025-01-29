<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="keywords"
        content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <title>Admin - View Event Post</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/line-awesome.min.css')}}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/dataTables.bootstrap4.min.css')}}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/select2.min.css')}}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <style>
        .scaled-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
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
                            <h3 class="page-title">View Event Post</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.eventPosts') }}">Event Posts</a></li>
                                <li class="breadcrumb-item active">View Event Post</li>
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
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="container">
                    <div class="row">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @if(!$post)
                                        <p class="text-center">No Event post found.</p>
                                        @else
                                        <div class="mb-4 col-12">
                                            <div class="card">
                                                <div class="d-flex justify-content-end">
                                                    <small class="m-2 text-muted text-end">
                                                        Posted on {{ $post->created_at->format('M d, Y') }} by {{ $post->user->name }}
                                                    </small>
                                                </div>
                                                <div class="card-body position-relative">
                                                    <!-- Title -->
                                                    <div class="scaled-content d-md-none"
                                                        style="transform: scale(0.8); transform-origin: top;">
                                                        <h2 class="post-title">{{ $post->title }}</h2>
                                                    </div>
                                                    <div class="scaled-content d-none d-md-block d-lg-none"
                                                        style="transform: scale(0.9); transform-origin: top;">
                                                        <h2 class="post-title">{{ $post->title }}</h2>
                                                    </div>
                                                    <div class="scaled-content d-none d-lg-block"
                                                        style="transform: scale(1); transform-origin: top;">
                                                        <h2 class="post-title">{{ $post->title }}</h2>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="content-wrapper">
                                                        <div class="scaled-content d-md-none"
                                                            style="transform: scale(0.8); transform-origin: top;">
                                                            {!! $post->content !!}
                                                        </div>
                                                        <div class="scaled-content d-none d-md-block d-lg-none"
                                                            style="transform: scale(0.9); transform-origin: top;">
                                                            {!! $post->content !!}
                                                        </div>
                                                        <div class="scaled-content d-none d-lg-block"
                                                            style="transform: scale(1); transform-origin: top;">
                                                            {!! $post->content !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-absolute" style="bottom: 20px; right: 20px;">
                                            <form method="POST" action="{{ route('admin.approve.eventPost', $post->id) }}">
                                                @csrf
                                                @method('PUT')
                                                @if($post->status == 0)
                                                    <button type="submit" class="btn btn-success">
                                                        Approve
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-danger" disabled>
                                                        Approved
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                        @endif
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

    <!-- jQuery -->
    <script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Datatable JS -->
    <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
