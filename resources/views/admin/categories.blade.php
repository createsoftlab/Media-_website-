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
    <title>Admin - Category Management</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/line-awesome.min.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dataTables.bootstrap4.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">


    <style>


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
                            <h3 class="page-title">Categories</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Categories</li>
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
                                <h5 class="mb-0">Category Management</h5>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#Add_Category_Modal">Add New Category</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Search Input Table -->
                            <div class="mb-3">
                                <input type="text" id="search-input" class="form-control form-control-sm"
                                    placeholder="Search category" oninput="filterTable()">
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Category Image</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="category-table-body">
                                        @foreach ($categories as $category)
                                        <tr class="category-row" data-id="{{ $category->id }}"
                                            data-category="{{ $category->category }}"
                                            data-image="{{ asset('category_image/'.$category->image) }}">
                                            <td class="text-center">{{ $category->id }}</td>
                                            <td>{{ $category->category }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('category_image/'.$category->image) }}"
                                                    alt="{{ $category->category }}" class="img-thumbnail"
                                                    style="width: 50px; height: 50px;">
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_category_{{ $category->id }}"><i class="la la-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Delete_Modal_{{ $category->id }}"><i class="la la-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
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


            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

        <!-- Add Category Modal -->
        <div id="Add_Category_Modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('store.categories') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Category</label>
                                        <input class="form-control" type="text" name="category">
                                        @error('category')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image_add" class="form-control-file"
                                            accept="image/*" onchange="previewImage(event, 'imagePreview_add')">
                                        <img id="imagePreview_add" src="#" alt="Image Preview"
                                            style="display: none; width: 250px; height: 250px; object-fit: cover; border: 1px solid #ccc; margin-top: 5px;">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Category Modal -->

        <!-- Edit Category Modal -->
        @foreach ($categories as $category)
        <div id="edit_category_{{$category->id}}" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update.categories',$category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Category</label>
                                        <input class="form-control" type="text" name="category" value="{{ $category->category }}">
                                        @error('category')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image_edit_{{$category->id}}"
                                            class="form-control-file" accept="image/*"
                                            onchange="previewImage(event, 'imagePreview_edit_{{$category->id}}')">

                                        <!-- Image Preview for Edit -->
                                        <img id="imagePreview_edit_{{$category->id}}"
                                            src="{{ asset('category_image/' . $category->image) }}" alt="Image Preview"
                                            style="display: block; width: 250px; height: 250px; object-fit: cover; border: 1px solid #ccc; margin-top: 5px;">
                                            @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- /Edit Category Modal -->

        <!-- Delete Category Modal -->
        @foreach ($categories as $category)
        <div class="modal custom-modal fade" id="Delete_Modal_{{ $category->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="border-0 shadow-lg modal-content rounded-3">
                    <div class="p-5 modal-body">
                        <div class="mb-4 text-center">
                            <h3 class="text-danger font-weight-bold">Confirm Deletion</h3>
                            <p class="text-muted font-italic">Are you sure you want to delete this item? This action
                                cannot be undone.</p>
                        </div>
                        <form method="POST" action="{{ route('delete.categories', ['id' => $category->id]) }}">
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
        <!-- /Delete Category Modal -->

    </div>
    <!-- /Main Wrapper -->

    {{-- table pagination and table search --}}
    <script>
        const categories = {!! json_encode($categories->map(function($category) {
        return [
            'id' => $category->id,
            'category' => $category->category,
            'image' => url('category_image/' . $category->image),
        ];
    })) !!};

    document.addEventListener("DOMContentLoaded", function () {
    const categoriesPerPage = 10;
    let currentPage = 1;
    let filteredCategories = [];  // To hold the filtered categories for search

    // Function to calculate total pages based on filtered categories
    function getTotalPages() {
        return Math.ceil(filteredCategories.length / categoriesPerPage);
    }

    // Function to update the table based on the current page and filtered data
    function updateTable() {
        const startIndex = (currentPage - 1) * categoriesPerPage;
        const endIndex = startIndex + categoriesPerPage;
        const categoriesToDisplay = filteredCategories.slice(startIndex, endIndex);

        const tableBody = document.getElementById('category-table-body');
        const rows = tableBody.querySelectorAll('.category-row');
        rows.forEach(row => row.style.display = 'none'); // Hide all rows initially

        categoriesToDisplay.forEach(category => {
            const row = Array.from(rows).find(r => r.dataset.id == category.id);
            if (row) row.style.display = ''; // Show the relevant rows
        });

        // Update pagination info
        document.getElementById('pagination-info').innerText = `Showing ${startIndex + 1} to ${Math.min(endIndex, filteredCategories.length)} of ${filteredCategories.length} entries`;

        // Disable previous/next buttons if on the first or last page
        document.getElementById('previous').classList.toggle('disabled', currentPage === 1);
        document.getElementById('next').classList.toggle('disabled', currentPage === getTotalPages());

        // Highlight the active page number
        updatePaginationLinks();
    }

    // Function to update the page numbers dynamically with ellipsis
    function updatePaginationLinks() {
        const totalPages = getTotalPages();
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = ''; // Clear the current page links

        // Add 'Previous' button
        const previousButton = document.createElement('li');
        previousButton.classList.add('page-item');
        previousButton.innerHTML = `<a class="page-link" href="#" id="previous" tabindex="-1">Previous</a>`;
        pagination.appendChild(previousButton);

        // Handle the first three pages and add ellipsis for more
        if (totalPages <= 5) {
            for (let page = 1; page <= totalPages; page++) {
                const pageItem = document.createElement('li');
                pageItem.classList.add('page-item');
                if (page === currentPage) pageItem.classList.add('active');
                pageItem.innerHTML = `<a class="page-link" href="#" data-page="${page}">${page}</a>`;
                pagination.appendChild(pageItem);
            }
        } else {
            // First page
            pagination.appendChild(createPageLink(1));

            // Ellipsis after the first page
            if (currentPage > 3) {
                pagination.appendChild(createPageLink('...'));
            }

            // Pages around the current page
            let startPage = currentPage - 1;
            let endPage = currentPage + 1;

            if (startPage < 2) {
                startPage = 2;
            }
            if (endPage > totalPages - 1) {
                endPage = totalPages - 1;
            }

            for (let page = startPage; page <= endPage; page++) {
                pagination.appendChild(createPageLink(page));
            }

            // Ellipsis before the last page
            if (currentPage < totalPages - 2) {
                pagination.appendChild(createPageLink('...'));
            }

            // Last page
            pagination.appendChild(createPageLink(totalPages));
        }

        // Add 'Next' button
        const nextButton = document.createElement('li');
        nextButton.classList.add('page-item');
        nextButton.innerHTML = `<a class="page-link" href="#" id="next">Next</a>`;
        pagination.appendChild(nextButton);
    }

    // Helper function to create page links
    function createPageLink(page) {
        const pageItem = document.createElement('li');
        pageItem.classList.add('page-item');
        if (typeof page === 'number' && page === currentPage) pageItem.classList.add('active');
        pageItem.innerHTML = page === '...'
            ? `<a class="page-link" href="#">...</a>`
            : `<a class="page-link" href="#" data-page="${page}">${page}</a>`;
        return pageItem;
    }

    // Function to filter the table based on search input
    function filterTable() {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        filteredCategories = categories.filter(category => {
            return category.category.toLowerCase().includes(searchTerm);
        });

        // Reset currentPage and update table after filtering
        currentPage = 1;
        updateTable();
    }

    // Handle pagination button clicks
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
            // Re-render the table with the current page of filtered categories
            updateTable();
        }
    });

    // Event listener for search input
    document.getElementById('search-input').addEventListener('input', filterTable);

    // Initial load of the table with all categories
    filteredCategories = categories;
    updateTable();
});

        // image preview in add category model
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.style.display = "none";
            }
        }

        // image preview in edit category model
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
            const reader = new FileReader();
                reader.onload = function (e) {
                // Set the preview image to the selected file
                preview.src = e.target.result;
                preview.style.display = "block";  // Make sure preview is shown
                };
                reader.readAsDataURL(file);
            } else {
            // If no file is selected, hide the preview image
            preview.src = "#";
            preview.style.display = "none";
            }
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
    {{-- table pagination and table search --}}

    <!-- jQuery -->
    <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>

</html>
