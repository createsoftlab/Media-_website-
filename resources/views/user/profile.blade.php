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
    <title>User - Profile</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/line-awesome.min.css')}}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/select2.min.css')}}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <style>
        .profile-header {
            background: linear-gradient(135deg, #495057, #212529);
            /* Sleek gradient */
            color: #fff;
            padding: 10px 15px;
            /* Reduced padding */
            border-radius: 5px 5px 0 0;
            font-size: 20px;
            /* Reduced font size */
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
            /* Adds a slight modern spacing effect */
            box-shadow: inset 0 -2px 5px rgba(0, 0, 0, 0.2);
            /* Subtle shadow for depth */
        }

        .profile-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .info-label {
            font-weight: 500;
            /* Lighter bold */
            color: #555;
        }

        .profile-image {
            height: 200px;
            width: 200px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ddd;
        }

        .no-image {
            background: #f8f9fa;
            height: 200px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: #6c757d;
            font-size: 16px;
            border: 2px dashed #ddd;
        }

        .btn-secondary.custom-hover:hover {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
            color: #fff !important;
            transition: all 0.3s ease;
        }
    </style>

</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('user.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('user.sidebar')
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
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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

                <div class="container">
                    <div class="row">
                        <!-- Left Column Card for Image -->
                        <div class="col-md-6 d-flex">
                            <div class="mb-4 card profile-card w-100">
                                <div class="text-center profile-header">
                                    Profile Image
                                </div>
                                <form action="{{ route('user.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Display validation errors -->
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <!-- Profile Image Section -->
                                    <div class="card-body d-flex justify-content-center align-items-center"
                                        onclick="document.getElementById('imageInput').click();">
                                        @if ($details->pro_image && file_exists(public_path('pro_pic/' .
                                        $details->pro_image)))
                                        <img src="{{ asset('pro_pic/' . $details->pro_image) }}" class="profile-image"
                                            alt="Profile Image">
                                        @else
                                        <div class="text-center no-image">
                                            <p>Click here to add</p>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Hidden File Input -->
                                    <input type="file" id="imageInput" name="pro_image" style="display: none;"
                                        onchange="previewImage(event)" accept="image/*">

                                    <!-- Bio Section -->
                                    <div class="mt-3 form-group d-flex justify-content-center">
                                        <textarea id="bio" name="bio" class="form-control" rows="6"
                                            placeholder="Write something about yourself..."
                                            style="width: 70%;">{{ old('bio', $details->bio) }}</textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-right">
                                        <button type="submit"
                                            class="mb-3 mr-3 btn btn-secondary custom-hover">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right Column Card for Profile Details (Name, Phone, Email) -->
                        <div class="col-md-6 d-flex">
                            <div class="mb-4 card profile-card w-100">
                                <div class="text-center profile-header">
                                    Profile Details
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="mb-3 col-md-12">
                                            <span class="info-label fs-5">Name:</span>
                                            <p class="fs-4 fw-bold">{{ $details->name ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Name -->
                                        <div class="mb-3 col-md-12">
                                            <span class="info-label fs-5">Bio:</span>
                                            <p class="fs-4 fw-bold">{{ $details->bio ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="mb-3 col-md-12">
                                            <span class="info-label fs-5">Username:</span>
                                            <p class="fs-4 fw-bold">{{ $details->username ?? 'N/A' }}</p>
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-3 col-md-12">
                                            <span class="info-label fs-5">Email:</span>
                                            <p class="fs-4 fw-bold">{{ $details->email ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Passwords (Old and New) -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card profile-card">
                                <div class="text-center profile-header">
                                    Password Reset
                                </div>
                                <div class="card-body">
                                    <!-- Form for Password Reset -->
                                    <form action="{{ route('user.passwordReset') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- Old Password -->
                                        <div class="mb-3">
                                            <label for="old-password" class="form-label">Old Password</label>
                                            <input type="password" name="current_password" class="form-control"
                                                id="current_password" placeholder="Enter old password">
                                        </div>

                                        <!-- New Password -->
                                        <div class="mb-3">
                                            <label for="new-password" class="form-label">New Password</label>
                                            <input type="password" name="new_password" class="form-control"
                                                id="new-password" placeholder="Enter new password">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-right">
                                            <button type="submit"
                                                class="mt-3 btn btn-secondary custom-hover">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Page Content -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <script>
        // Preview the uploaded image when selected
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector('.profile-image');
                    if (output) {
                        output.src = reader.result;
                    } else {
                        var img = document.createElement('img');
                        img.src = reader.result;
                        img.classList.add('profile-image');
                        document.querySelector('.no-image').replaceWith(img);
                    }
                }
                reader.readAsDataURL(event.target.files[0]);
            }

    // notification fade away
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

    <!-- Select2 JS -->
    <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Tagsinput JS -->
    <script src="{{asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
