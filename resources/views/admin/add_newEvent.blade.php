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
    <title>Admin - Add New Event</title>

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
                            <h3 class="page-title">Add New Event</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('view.events') }}">Events</a></li>
                                <li class="breadcrumb-item active">Add New Event</li>
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
                    <div class="row w-100">
                        <!-- Form Section Card -->
                        <div class="mb-3 col-lg-7">
                            <div class="shadow-lg card">
                                <div class="card-body">
                                    <h3 class="text-center text-dark fw-bold">Event Registration</h3>
                                    <p class="text-center text-muted">Please fill out the form below to add your event.
                                    </p>
                                    <form method="POST" action="{{ route('storeOrUpdate.event', $event->id ?? null) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Event Title -->
                                        <div class="mb-3">
                                            <label for="eventTitle" class="form-label fw-semibold">Event Title</label>
                                            <input type="text" class="form-control" id="eventTitle" name="event_title"
                                                value="{{ old('event_title', $event->event_title ?? '') }}"
                                                placeholder="Enter event title" oninput="updatePreview()">
                                            @error('event_title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Description -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label fw-semibold">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"
                                                placeholder="Enter event description" oninput="updatePreview()">{{ old('description', $event->description ?? '') }}</textarea>
                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Start Date -->
                                        <div class="mb-3">
                                            <label for="startDate" class="form-label fw-semibold">Start Date</label>
                                            <input type="date" class="form-control" id="startDate" name="start_date"
                                                value="{{ old('start_date', $event->start_date ?? '') }}"
                                                oninput="updatePreview()">
                                            @error('start_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- End Date -->
                                        <div class="mb-3">
                                            <label for="endDate" class="form-label fw-semibold">End Date</label>
                                            <input type="date" class="form-control" id="endDate" name="end_date"
                                                value="{{ old('end_date', $event->end_date ?? '') }}"
                                                oninput="updatePreview()">
                                            @error('end_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Image -->
                                        <div class="mb-4">
                                            <label for="image" class="form-label fw-semibold">Image</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                value="{{ old('image', $event->image ?? '') }}" accept="image/*"
                                                onchange="previewImage(event)">
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

                        <!-- Preview Section Card (Hidden on Mobile) -->
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="shadow-lg card">
                                <div class="card-body">
                                    <!-- Highlighted Header -->
                                    <div class="mb-4 text-center"
                                        style="color: #007bff; border-bottom: 3px solid #007bff;">
                                        <h3 class="fw-bold">
                                            Event Preview
                                        </h3>
                                    </div>
                                    <!-- Event Preview Content -->
                                    <div class="p-3 mt-3 border"
                                        style="background-color: #f8f9fa; border-radius: 10px;">
                                        <div id="previewImage"
                                            style="height: 200px; background-color: #e9ecef; display: flex; align-items: center; justify-content: center; border-radius: 10px; overflow: hidden;">
                                            <!-- Show database image if it exists -->
                                            @if($event && $event->image)
                                            <img src="{{ asset('event_image/' . $event->image) }}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                            <span class="text-muted">Image preview will appear here.</span>
                                            @endif
                                        </div>
                                        <h5 id="previewTitle" class="mt-3 fw-bold" style="color: #007bff;">Event Title
                                        </h5>
                                        <p id="previewDescription" class="text-muted">Event description will appear
                                            here.</p>
                                        <p class="mt-3">
                                            <span class="fw-bold">From:</span> <span id="previewStartDate"
                                                class="badge bg-success">Start Date</span>
                                            <span class="fw-bold">To:</span> <span id="previewEndDate"
                                                class="badge bg-danger">End Date</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    function updatePreview() {
                            // Update text preview
                            document.getElementById('previewTitle').textContent = document.getElementById('eventTitle').value || 'Event Title';
                            document.getElementById('previewDescription').textContent = document.getElementById('description').value || 'Event description will appear here.';
                            document.getElementById('previewStartDate').textContent = document.getElementById('startDate').value || 'Start Date';
                            document.getElementById('previewEndDate').textContent = document.getElementById('endDate').value || 'End Date';
                    }

                        function previewImage(event) {
                        const preview = document.getElementById('previewImage');
                        const file = event.target.files[0];

                        // Clear existing preview if there's an uploaded file
                        if (file) {
                        const reader = new FileReader();
                            reader.onload = function (e) {
                                preview.innerHTML = `<img src="${e.target.result}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">`;
                            };
                            reader.readAsDataURL(file);
                        } else {
                        // If no file is selected, show the default message
                        preview.innerHTML = '<span class="text-muted">Image preview will appear here.</span>';
                        }
                    }


                        //notification fade away

                        document.addEventListener("DOMContentLoaded", function () {
                        const toastSuccess = document.getElementById("toast-success");
                        const toastError = document.getElementById("toast-error");

                        function handleProgressAnimationEnd(toast) {
                        const progressBar = toast.querySelector(".progress-bar .progress");

                        // Listen for the animation end event
                        progressBar.addEventListener("animationend", () => {
                        // Add a fade-out effect or hide the toast
                        toast.classList.add("fade-out");

                        // Remove the toast from the DOM after fade-out
                        setTimeout(() => {
                        toast.remove();
                        }, 300); // Adjust the timeout to match the fade-out duration
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
