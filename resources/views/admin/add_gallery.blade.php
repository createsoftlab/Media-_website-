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
        <title>Admin - Add Gallery Images</title>

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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Galery</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/view_galary')}}">Galery</a></li>
									<li class="breadcrumb-item active">Add Gallery</li>
								</ul>
							</div>

						</div>
					</div>
					<!-- /Page Header -->

                    <div class="container mt-5 d-flex justify-content-center align-items-start" style="min-height: 90vh; padding-top: 50px;">
                        <div class="row w-100 d-flex justify-content-center">
                            <!-- Form Section Card -->
                            <div class="mb-3 col-lg-7">
                                <div class="shadow-lg card">
                                    <div class="card-body">
                                        <h3 class="text-center text-dark fw-bold">Add New Gallery</h3>
                                        <p class="text-center text-muted">Please fill out the form below to add your Gallery.</p>
                                        <form method="POST" action="{{ route('store.gallery') }}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- Title -->
                                            <div class="mb-3">
                                                <label for="title" class="form-label fw-semibold">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                            </div>
                                            <!-- Small Description -->
                                            <div class="mb-3">
                                                <label for="small_des" class="form-label fw-semibold">Small Description</label>
                                                <input type="text" class="form-control" id="small_des" name="small_des" value="{{ old('small_des') }}">
                                            </div>
                                            <!-- All Text -->
                                            <div class="mb-3">
                                                <label for="all_text" class="form-label fw-semibold">All Text</label>
                                                <input type="text" class="form-control" id="all_text" name="all_text" value="{{ old('all_text') }}">
                                            </div>
                                            <!-- Image -->
                                            <div class="mb-4">
                                                <label for="image" class="form-label fw-semibold">Image</label>
                                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                                            </div>
                                            <!-- Image Preview -->
                                            <div class="mb-3">
                                                <img id="image-preview" src="" alt="Image Preview" style="display: none; width: 100%; max-height: 300px; object-fit: cover;">
                                            </div>
                                            <!-- Submit Button -->
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg fw-bold" style="background: linear-gradient(to right, #007bff, #0056b3); border: none; color: #fff;">
                                                    <i class="fa fa-paper-plane me-2"></i> Submit Gallery
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
				<!-- /Page Content -->

				<!-- Add Client Modal -->
				<div id="add_client" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

					</div>
				</div>
				<!-- /Add Client Modal -->

				<!-- Edit Client Modal -->
				<div id="edit_client" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Customers</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Name <span class="text-danger"> * </span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Customer ID </label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Customer Nic </label>
												<input class="form-control floating" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Address <span class="text-danger"> * </span></label>
												<input class="form-control"  type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Phone </label>
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Client Modal -->

				<!-- Delete Client Modal -->
				<div class="modal custom-modal fade" id="delete_client" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Client</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Client Modal -->

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
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('image-preview');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        preview.src = reader.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.style.display = 'none';
                }
            }
        </script>

    </body>
</html>
