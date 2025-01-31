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
    <title>Admin - Add New Live Event</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
                            <h3 class="page-title">Add New live Event</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('view.liveevents') }}">Live Events</a></li>
                                <li class="breadcrumb-item active">Add New live Event</li>
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


                <div class="container mt-5 d-flex justify-content-center">
                        <!-- Form Section Card -->
                        <div class="mb-3 col-lg-6">
                            <div class="shadow-lg card">
                                <div class="card-body">
                                    <h3 class="text-center text-dark fw-bold">Live Event Registration</h3>
                                    <p class="text-center text-muted">Please fill out the form below to add your event.
                                    </p>
                                    <form action="{{ route('live_events.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="liveevent_title" class="form-label">Event Title</label>
                                            <input type="text" class="form-control" id="liveevent_title" name="liveevent_title" >
                                            @error('liveevent_title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Event Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="link" class="form-label">Event Link</label>
                                            <input type="text" class="form-control" id="link" name="link" >
                                            @error('link')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Image -->
                                        <div class="mb-4">
                                            <label for="image" class="form-label fw-semibold">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="d-grid ">
                                            <button type="submit" class="btn btn-primary btn-lg fw-bold"
                                                style="background: linear-gradient(to right, #007bff, #0056b3); border: none; color: #fff;">
                                                <i class="fa fa-paper-plane me-2"></i> Submit Event
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>

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

        <!-- Datatable JS -->
        <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Select2 JS -->
        <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>

        <!-- Custom JS -->
        <script src="{{asset('admin/assets/js/app.js')}}"></script>


</body>

</html>
