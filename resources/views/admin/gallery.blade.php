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
    <title>Admin - Gallery </title>

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

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

    <style>
        .image-hover {
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .image-hover:hover {
            transform: scale(1.05);
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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
                            <h3 class="page-title">Gallery</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Images</li>
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

              <!-- Add New Image Button -->
            <div class="mb-3 text-right">
                <a href="{{ route('create.gallery') }}" class="px-4 py-2 btn btn-danger btn-lg rounded-pill">
                    <i class="mdi mdi-image-plus" style="font-size: 24px; color: rgb(241, 239, 239);"></i>
                </a>
            </div>

                <div class="row staff-grid-row">
                    @foreach ($images as $image)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="mb-4 shadow-sm card image-hover">
                            <!-- Image -->
                            <div class="card-img-top"
                                style="height: 250px; background-size: cover; background-position: center; background-image: url('{{ asset('gallery_image/'.$image->image) }}');">
                            </div>

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column">
                                <!-- Title -->
                                <h5 class="mb-2 card-title text-primary">{{ $image->title }}</h5>
                                <!-- Short Description -->
                                <p class="card-text text-muted">{{ $image->short_description }}</p>
                                <!-- Card Footer (Dropdown for Delete) -->
                                <div class="mt-auto text-right">
                                    <!-- Delete Button -->
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal_{{ $image->id }}">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Delete Gallery Modal -->
            @foreach ($images as $image)
            <div class="modal custom-modal fade" id="deleteModal_{{ $image->id }}" tabindex="-1" role="dialog"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="border-0 shadow-lg modal-content rounded-3">
                        <div class="p-5 modal-body">
                            <div class="mb-4 text-center">
                                <h3 class="text-danger font-weight-bold">Confirm Deletion</h3>
                                <p class="text-muted font-italic">Are you sure you want to delete this item? This action
                                    cannot be undone.</p>
                            </div>
                            <form method="POST" action="{{ route('delete.gallery', $image->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex flex-column flex-sm-row justify-content-center">
                                    <div class="mb-2 col-12 col-sm-5 mb-sm-0">
                                        <button type="submit"
                                            class="py-3 shadow-sm btn btn-gradient-danger btn-lg w-100 hover-zoom-in">
                                            <i class="mr-2 fas fa-trash-alt"></i><span class="font-weight-bold">Yes, Delete
                                                it</span>
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-5 offset-sm-1">
                                        <button type="button" data-dismiss="modal"
                                            class="py-3 shadow-sm btn btn-light btn-lg w-100 hover-zoom-in">
                                            <i class="mr-2 fas fa-times-circle"></i><span class="font-weight-bold">No, Keep
                                                it</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Delete Gallery Modal -->

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

    <!-- Datatable JS -->
    <script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{asset('admin/assets/js/select2.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
