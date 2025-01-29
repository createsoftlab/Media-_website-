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
    <title>Admin - Blog Posts Bin</title>

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
                            <h3 class="page-title">Blog Posts Bin</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Recycle Bin</li>
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
                                <h5 class="mb-0">Post Management</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Search Input Table -->
                            <div class="mb-3">
                                <input type="text" id="search-input" class="form-control form-control-sm"
                                    placeholder="Search by username" oninput="filterTable()">
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col" class="text-center">Featured Image</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="post-table-body">
                                        @foreach ($posts as $post)
                                        <tr class="post-row" data-id="{{ $post->id }}" data-title="{{ $post->title }}"
                                            data-username="{{ $post->user->usernamename }}">
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->user->username }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('feature_image/'.$post->feature_image) }}"
                                                    alt="{{ $post->title }}" class="img-thumbnail"
                                                    style="width: 50px; height: 50px;">
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-secondary"
                                                    style="font-size: 0.8rem; padding: 0.6rem 0.6rem;">Deleted</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#restore_Modal_{{ $post->id }}" class="text-danger" style="font-size: 1.5rem;"><i
                                                        class="fas fa-recycle"></i></a>
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
                                    <li class="page-item disabled"><a class="page-link" href="#" id="previous-post"
                                            tabindex="-1">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" id="next-post">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>


                <!-- Restore  Modal -->
                @foreach ($posts as $post)
                <div class="modal custom-modal fade" id="restore_Modal_{{ $post->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="border-0 shadow-lg modal-content rounded-3">
                            <div class="p-5 modal-body">
                                <div class="mb-4 text-center">
                                    <h3 class="text-danger font-weight-bold">Confirm Restore</h3>
                                    <p class="text-muted font-italic">
                                        Are you sure you want to restore this post?
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('admin.restore.blogPost',$post->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column flex-sm-row justify-content-center">
                                        <div class="mb-2 col-12 col-sm-5 mb-sm-0">
                                            <button type="submit"
                                                class="py-3 shadow-sm btn btn-gradient-danger btn-lg w-100 hover-zoom-in">
                                                <i class="mr-2 fas fa-trash-alt"></i><span class="font-weight-bold">Yes, Restore
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
                <!-- /Restore Modal -->

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
    let filteredPosts = posts; // Initially, all posts are displayed

    // Calculate the total pages for pagination
    function getTotalPages() {
        return Math.ceil(filteredPosts.length / postsPerPage);
    }

    // Update the table to show the filtered posts for the current page
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

        // Update pagination info text
        document.getElementById('pagination-info').innerText =
            `Showing ${startIndex + 1} to ${Math.min(endIndex, filteredPosts.length)} of ${filteredPosts.length} entries`;

        // Enable/Disable previous and next buttons
        document.getElementById('previous-post').classList.toggle('disabled', currentPage === 1);
        document.getElementById('next-post').classList.toggle('disabled', currentPage === getTotalPages());

        updatePaginationLinks();
    }

    // Update pagination links based on current page and total pages
    function updatePaginationLinks() {
        const totalPages = getTotalPages();
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = ''; // Clear the current page links

        const previousButton = document.createElement('li');
        previousButton.classList.add('page-item');
        previousButton.innerHTML = `<a class="page-link" href="#" id="previous-post" tabindex="-1">Previous</a>`;
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
        nextButton.innerHTML = `<a class="page-link" href="#" id="next-post">Next</a>`;
        pagination.appendChild(nextButton);
    }

    // Filter posts based on the search term
    function filterTable() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        filteredPosts = posts.filter(post => {
            return post.username.toLowerCase().includes(searchTerm) || post.title.toLowerCase().includes(searchTerm);
        });

        currentPage = 1; // Reset to first page
        updateTable();
    }

    // Pagination handling for page navigation
    document.getElementById('pagination').addEventListener('click', function(event) {
        const target = event.target;

        if (target.tagName === 'A') {
            if (target.id === 'previous-post' && currentPage > 1) {
                currentPage--;
            } else if (target.id === 'next-post' && currentPage < getTotalPages()) {
                currentPage++;
            } else if (target.dataset.page) {
                currentPage = parseInt(target.dataset.page);
            }
            updateTable();
        }
    });

    // Event listener for search input
    document.getElementById('search-input').addEventListener('input', filterTable);

    // Initial table display
    updateTable();
});
    document.addEventListener("DOMContentLoaded", function () {
    const postsPerPage = 10;
    let currentPage = 1;
    let filteredPosts = posts; // Initially, all posts are displayed

    // Calculate the total pages for pagination
    function getTotalPages() {
        return Math.ceil(filteredPosts.length / postsPerPage);
    }

    // Update the table to show the filtered posts for the current page
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

        // Update pagination info text
        document.getElementById('pagination-info').innerText =
            `Showing ${startIndex + 1} to ${Math.min(endIndex, filteredPosts.length)} of ${filteredPosts.length} entries`;

        // Enable/Disable previous and next buttons
        document.getElementById('previous-post').classList.toggle('disabled', currentPage === 1);
        document.getElementById('next-post').classList.toggle('disabled', currentPage === getTotalPages());

        updatePaginationLinks();
    }

    // Update pagination links based on current page and total pages
    function updatePaginationLinks() {
        const totalPages = getTotalPages();
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = ''; // Clear the current page links

        const previousButton = document.createElement('li');
        previousButton.classList.add('page-item');
        previousButton.innerHTML = `<a class="page-link" href="#" id="previous-post" tabindex="-1">Previous</a>`;
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
        nextButton.innerHTML = `<a class="page-link" href="#" id="next-post">Next</a>`;
        pagination.appendChild(nextButton);
    }

    // Filter posts based on the search term
    function filterTable() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        filteredPosts = posts.filter(post => {
            return post.username.toLowerCase().includes(searchTerm)
        });

        currentPage = 1; // Reset to first page
        updateTable();
    }

    // Pagination handling for page navigation
    document.getElementById('pagination').addEventListener('click', function(event) {
        const target = event.target;

        if (target.tagName === 'A') {
            if (target.id === 'previous-post' && currentPage > 1) {
                currentPage--;
            } else if (target.id === 'next-post' && currentPage < getTotalPages()) {
                currentPage++;
            } else if (target.dataset.page) {
                currentPage = parseInt(target.dataset.page);
            }
            updateTable();
        }
    });

    // Event listener for search input
    document.getElementById('search-input').addEventListener('input', filterTable);

    // Initial table display
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
