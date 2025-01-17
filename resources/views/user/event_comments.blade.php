<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>User - Event Post Comments</title>

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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>

            .highlight-recent {
                background-color: #98f3a4 !important;

            }


        </style>

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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Comments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('user/dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Event Post Comments</li>
								</ul>
							</div>

						</div>
					</div>
					<!-- /Page Header -->

					<div class="container mt-5">
                        <div class="border-0 shadow-sm card">
                            <div class="text-white card-header bg-dark">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Comments </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Search Input Table -->
                                <div class="mb-3">
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Comment</th>
                                                <th scope="col" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="comment-table-body">
                                            @foreach ($comments as $comment)
                                                <tr class="{{ $comment->approved ? '' : 'table-warning' }}">
                                                    <td>{{ $comment->user->name }}</td>
                                                    <td>{{ $comment->comment }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                @if (!$comment->approved)
                                                                    <form action="{{ route('usereventcomments.approve', $comment->id) }}" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i class="la la-pencil m-r-5"></i> Approve
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <span class="dropdown-item text-muted">
                                                                        <i class="la la-check m-r-5"></i> Approved
                                                                    </span>
                                                                @endif
                                                                <a href="javascript:void(0);" class="dropdown-item text-danger" data-toggle="modal" data-target="#delete_comment_{{ $comment->id }}">
                                                                    <i class="la la-trash-o m-r-5"></i> Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>


                                    </table>
                                </div>

                                @if(session('success'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: "{{ session('success') }}",
                                            icon: 'success',
                                            confirmButtonText: 'OK',
                                            customClass: {
                                                popup: 'swal-popup',
                                                title: 'swal-title',
                                                content: 'swal-content',
                                                confirmButton: 'swal-button'
                                            }
                                        });
                                    });
                                </script>
                            @endif


                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <span id="pagination-info">Showing 1 to 3 of 3 entries</span>
                                <nav>
                                    <ul id="pagination" class="mb-0 pagination pagination-sm">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" id="previous" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" id="next">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

				<!-- /Page Content -->





				<!-- Delete Client Modal -->

				@foreach ($comments as $comment)  <!-- Make sure this matches -->
    <div class="modal custom-modal fade" id="delete_comment_{{ $comment->id }}"  role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="border-0 shadow-lg modal-content rounded-3">
                <div class="p-5 modal-body">
                    <div class="mb-4 text-center">
                        <h3 class="text-danger font-weight-bold">Confirm Deletion</h3>
                        <p class="text-muted font-italic">Are you sure you want to delete this item? This action
                            cannot be undone.</p>
                    </div>
                    <form method="POST" action="{{ route('usereventcomments.delete', $comment->id) }}">
                        @csrf

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

				<!-- /Delete Client Modal -->

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const comments = @json($comments); // Assuming $comments is passed from the server with pagination
                const rowsPerPage = 5; // Number of rows per page
                let currentPage = 1;

                function displayTableData(page = 1) {
                    const start = (page - 1) * rowsPerPage;
                    const end = start + rowsPerPage;
                    const paginatedComments = comments.slice(start, end);
                    const tbody = document.getElementById('comment-table-body');

                    tbody.innerHTML = '';

                    paginatedComments.forEach(comment => {
                        const row = `
                            <tr class="${comment.approved ? '' : 'table-warning'}">
                                <td>${comment.user.name}</td>
                                <td>${comment.comment}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            ${!comment.approved ? `
                                            <form action="/usereventcomments/approve/${comment.id}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="la la-pencil m-r-5"></i> Approve
                                                </button>
                                            </form>
                                            ` : `
                                            <span class="dropdown-item text-muted">
                                                <i class="la la-check m-r-5"></i> Approved
                                            </span>
                                            `}
                                            <a href="javascript:void(0);" class="dropdown-item text-danger" data-toggle="modal" data-target="#delete_comment_${comment.id}">
                                                <i class="la la-trash-o m-r-5"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                        tbody.innerHTML += row;
                    });

                    updatePagination(page);
                }

                function updatePagination(page) {
                    const totalPages = Math.ceil(comments.length / rowsPerPage);
                    const pagination = document.getElementById('pagination');
                    const paginationInfo = document.getElementById('pagination-info');
                    pagination.innerHTML = '';

                    if (page > 1) {
                        pagination.innerHTML += `
                            <li class="page-item">
                                <a class="page-link" href="#" data-page="${page - 1}">Previous</a>
                            </li>`;
                    } else {
                        pagination.innerHTML += `
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>`;
                    }

                    for (let i = 1; i <= totalPages; i++) {
                        pagination.innerHTML += `
                            <li class="page-item ${i === page ? 'active' : ''}">
                                <a class="page-link" href="#" data-page="${i}">${i}</a>
                            </li>`;
                    }

                    if (page < totalPages) {
                        pagination.innerHTML += `
                            <li class="page-item">
                                <a class="page-link" href="#" data-page="${page + 1}">Next</a>
                            </li>`;
                    } else {
                        pagination.innerHTML += `
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Next</a>
                            </li>`;
                    }

                    paginationInfo.textContent = `Showing ${(page - 1) * rowsPerPage + 1} to ${Math.min(page * rowsPerPage, comments.length)} of ${comments.length} entries`;
                }

                document.getElementById('pagination').addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = e.target;
                    if (target.tagName === 'A') {
                        const page = parseInt(target.dataset.page);
                        if (!isNaN(page)) {
                            currentPage = page;
                            displayTableData(page);
                        }
                    }
                });

                // Initial load
                displayTableData(currentPage);
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


        <script>
            // Automatically hide the success message after 5 seconds
            setTimeout(() => {
                const message = document.getElementById('success-message');
                if (message) {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500); // Remove the element from the DOM after fading out
                }
            }, 5000); // 5000ms = 5 seconds
        </script>



    </body>
</html>
