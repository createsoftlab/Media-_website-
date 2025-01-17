<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin - My Blog Posts</title>

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
                            <h3 class="page-title">My Blog Posts</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Blog Posts</li>
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

                <div class="container mt-5">
                    <div class="border-0 shadow-sm card">
                        <div class="text-white card-header bg-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">Post Management</h5>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-danger" href="{{ route('create.post') }}">Add New Blog Post</a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('admin.draft.myblogPosts') }}">Drafts</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Search Input Table -->
                            <div class="mb-3">
                                <input type="text" id="post-search-input" class="form-control form-control-sm" placeholder="Search by title" oninput="filterTable()">
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" class="text-center">Featured Image</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="post-table-body">
                                        @foreach ($posts as $post)
                                            <tr class="post-row" data-id="{{ $post->id }}" data-title="{{ $post->title }}">
                                                <td>{{ $post->id }}</td>
                                                <td>{{ Str::words($post->title, 5) }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('feature_image/'.$post->feature_image) }}" alt="{{ $post->title }}" class="img-thumbnail" style="width: 50px; height: 50px;">
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-success" style="font-size: 0.8rem; padding: 0.6rem 0.6rem;">Active</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.edit.myblogPost',$post->id) }}" class="text-primary me-4" style="font-size: 1.5rem;"><i class="la la-pencil"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#Delete_Modal_{{ $post->id }}" class="text-danger" style="font-size: 1.5rem;"><i class="la la-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span id="pagination-info">Showing 1 to 3 of 3 entries</span>
                            <nav>
                                <ul id="pagination" class="mb-0 pagination pagination-sm">
                                    <!-- Pagination will be dynamically generated here -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                @foreach ($posts as $post)
                <div class="modal custom-modal fade" id="Delete_Modal_{{ $post->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="border-0 shadow-lg modal-content rounded-3">
                            <div class="p-5 modal-body">
                                <div class="mb-4 text-center">
                                    <h3 class="text-danger font-weight-bold">Confirm Deletion</h3>
                                    <p class="text-muted font-italic">
                                        Are you sure you want to delete this post? It will move to bin
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('admin.delete.blogPost',$post->id) }}">
                                    @csrf
                                    @method('PUT')
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
                <!-- /Delete Modal -->


            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Wrapper -->

        <script>
            const posts = {!! json_encode($posts->map(function($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'username' => $post->user->username,
                    'created_at' => $post->created_at->format('Y-m-d H:i:s'),
                ];
            })) !!};

            document.addEventListener("DOMContentLoaded", function () {
                const postsPerPage = 10;
                let currentPage = 1;
                let filteredPosts = posts; // Start with all posts initially

                function getTotalPages() {
                    return Math.ceil(filteredPosts.length / postsPerPage);
                }

                function updateTable() {
                    const startIndex = (currentPage - 1) * postsPerPage;
                    const endIndex = startIndex + postsPerPage;
                    const postsToDisplay = filteredPosts.slice(startIndex, endIndex);

                    const tableBody = document.getElementById('post-table-body');
                    const rows = tableBody.querySelectorAll('.post-row');
                    rows.forEach(row => row.style.display = 'none'); // Hide all rows initially

                    postsToDisplay.forEach(post => {
                        const row = Array.from(rows).find(r => r.dataset.id == post.id);
                        if (row) row.style.display = ''; // Show relevant rows
                    });

                    document.getElementById('pagination-info').innerText =
                        `Showing ${startIndex + 1} to ${Math.min(endIndex, filteredPosts.length)} of ${filteredPosts.length} entries`;

                    updatePaginationLinks();
                }

                function updatePaginationLinks() {
                    const totalPages = getTotalPages();
                    const pagination = document.getElementById('pagination');
                    pagination.innerHTML = ''; // Clear current pagination

                    const previousButton = document.createElement('li');
                    previousButton.classList.add('page-item');
                    previousButton.innerHTML = `<a class="page-link" href="#" id="previous">Previous</a>`;
                    pagination.appendChild(previousButton);

                    for (let page = 1; page <= totalPages; page++) {
                        const pageItem = document.createElement('li');
                        pageItem.classList.add('page-item');
                        if (page === currentPage) pageItem.classList.add('active');
                        pageItem.innerHTML = `<a class="page-link" href="#" data-page="${page}">${page}</a>`;
                        pagination.appendChild(pageItem);
                    }

                    const nextButton = document.createElement('li');
                    nextButton.classList.add('page-item');
                    nextButton.innerHTML = `<a class="page-link" href="#" id="next">Next</a>`;
                    pagination.appendChild(nextButton);
                }

                function filterTable() {
                    const searchTerm = document.getElementById('post-search-input').value.toLowerCase();
                    filteredPosts = posts.filter(post => post.title.toLowerCase().includes(searchTerm));
                    currentPage = 1;
                    updateTable();
                }

                document.getElementById('pagination').addEventListener('click', function(event) {
                    const target = event.target;

                    if (target.tagName === 'A') {
                        if (target.id === 'previous' && currentPage > 1) {
                            currentPage--;
                        } else if (target.id === 'next' && currentPage < getTotalPages()) {
                            currentPage++;
                        } else if (target.dataset.page) {
                            currentPage = parseInt(target.dataset.page);
                        }
                        updateTable();
                    }
                });

                document.getElementById('post-search-input').addEventListener('input', filterTable);

                updateTable();
            });

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
