<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin - Update Live Event</title>

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
                            <h3 class="page-title">Update live Event</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('view.liveevents') }}">Live Events</a></li>
                                <li class="breadcrumb-item active">Update live Event</li>
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
                        <div class="mb-3 col-lg-7">
                            <div class="shadow-lg card">
                                <div class="card-body">
                                    <h3 class="text-center text-dark fw-bold">Update Live Event</h3>
                                    <p class="text-center text-muted">Please fill out the form below to update your event.</p>
                                    <form action="{{ route('live_events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="liveevent_title" class="form-label">Event Title</label>
                                            <input type="text" class="form-control" id="liveevent_title" name="liveevent_title" value="{{ old('liveevent_title', $event->title) }}" oninput="updatePreview()">
                                            @error('liveevent_title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Event Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" oninput="updatePreview()">{{ old('description', $event->description) }}</textarea>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="link" class="form-label">Event Link</label>
                                            <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $event->link) }}">
                                            @error('link')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="image" class="form-label fw-semibold">Image</label>
                                            <input type="file" class="form-control" id="image" name="image" onchange="updateImagePreview()">
                                            @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg fw-bold" style="background: linear-gradient(to right, #007bff, #0056b3); border: none; color: #fff;">
                                                <i class="fa fa-paper-plane me-2"></i> Update
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

        <script>
            // Function to update the title and description preview
            function updatePreview() {
                const title = document.getElementById('liveevent_title').value;
                const description = document.getElementById('description').value;

                // Update the preview title and description based on the form input
                document.getElementById('previewTitle').textContent = title || 'Event Title';
                document.getElementById('previewDescription').textContent = description || 'Event description will appear here.';
            }

            // Function to handle image preview
            function updateImagePreview() {
                const fileInput = document.getElementById('image');
                const file = fileInput.files[0];
                const imagePreview = document.getElementById('imagePreview');
                const previewImageContainer = document.getElementById('previewImage');
                const imagePlaceholder = document.getElementById('imagePlaceholder');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the image preview
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        imagePlaceholder.style.display = 'none'; // Hide placeholder text
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Reset the image preview
                    imagePreview.style.display = 'none';
                    imagePlaceholder.style.display = 'block'; // Show placeholder text
                }
            }

            // Initialize the preview with the current values from the form
            document.addEventListener('DOMContentLoaded', function() {
                updatePreview(); // Update title and description preview
                updateImagePreview(); // Set the image preview if an image is already selected
            });
        </script>

</body>

</html>
