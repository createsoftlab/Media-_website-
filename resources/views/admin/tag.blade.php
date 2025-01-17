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
    <title>Admin - Add/Update Tags</title>

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
                            <h3 class="page-title">Tags</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add/Update Tags</li>
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
                                <h5 class="mb-0">Add/Update Tags</h5>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#Add_Tag_Modal">Add New Tags</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Search Input for Tags -->
                            <div class="mb-3">
                                <input type="text" id="tag-search-input" class="form-control form-control-sm"
                                    placeholder="Search tags" oninput="filterTags()">
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col">Tag Name</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tag-table-body" >
                                        @foreach ($tags as $tag)
                                        <tr class="tag-row" data-id="{{ $tag->id }}" data-tag="{{ $tag->tag }}">
                                            <td class="text-center">{{ $tag->id }}</td>
                                            <td>{{ $tag->tag }}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                            class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#edit_tag_{{ $tag->id }}"><i
                                                                class="la la-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                            data-target="#Delete_Tag_{{ $tag->id }}"><i
                                                                class="la la-trash-o m-r-5"></i> Delete</a>
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
                            <span id="tag-pagination-info">Showing 1 to 3 of 3 entries</span>
                            <nav>
                                <ul id="tag-pagination" class="mb-0 pagination pagination-sm">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" id="tag-previous" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" id="tag-next">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->

            <!-- Add Category Modal -->
            <div id="Add_Tag_Modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('store.tags') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Tag Name</label>
                                            <input class="form-control" type="text" name="tag">
                                            @error('tag')
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
            @foreach ($tags as $tag)
            <div id="edit_tag_{{$tag->id}}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update.tags',$tag->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Tag Name</label>
                                            <input class="form-control" type="text" name="tag" value="{{ $tag->tag }}">
                                            @error('tag')
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
            @foreach ($tags as $tag)
            <div class="modal custom-modal fade" id="Delete_Tag_{{ $tag->id }}" tabindex="-1" role="dialog"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="border-0 shadow-lg modal-content rounded-3">
                        <div class="p-5 modal-body">
                            <div class="mb-4 text-center">
                                <h3 class="text-danger font-weight-bold">Confirm Deletion</h3>
                                <p class="text-muted font-italic">Are you sure you want to delete this item? This action
                                    cannot be undone.</p>
                            </div>
                            <form method="POST" action="{{ route('delete.tags', ['id' => $tag->id]) }}">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex flex-column flex-sm-row justify-content-center">
                                    <div class="mb-2 col-12 col-sm-5 mb-sm-0">
                                        <button type="submit"
                                            class="py-3 shadow-sm btn btn-gradient-danger btn-lg w-100 hover-zoom-in">
                                            <i class="mr-2 fas fa-trash-alt"></i><span class="font-weight-bold">Yes,
                                                Delete
                                                it</span>
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-5 offset-sm-1">
                                        <button type="button" data-dismiss="modal"
                                            class="py-3 shadow-sm btn btn-light btn-lg w-100 hover-zoom-in">
                                            <i class="mr-2 fas fa-times-circle"></i><span class="font-weight-bold">No,
                                                Keep
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
        <!-- /Page Wrapper -->


    </div>
    <!-- /Main Wrapper -->

    {{-- table pagination and table search --}}
    <script>
        const tags = {!! json_encode($tags->map(function($tag) {
            return [
                'id' => $tag->id,
                'tag' => $tag->tag,
            ];
        })) !!};

        document.addEventListener("DOMContentLoaded", function () {
            const tagsPerPage = 10;
            let currentTagPage = 1;
            let filteredTags = [];

            function getTotalTagPages() {
                return Math.ceil(filteredTags.length / tagsPerPage);
            }

            function updateTagTable() {
                const startIndex = (currentTagPage - 1) * tagsPerPage;
                const endIndex = startIndex + tagsPerPage;
                const tagsToDisplay = filteredTags.slice(startIndex, endIndex);

                const tagTableBody = document.getElementById('tag-table-body');
                const rows = tagTableBody.querySelectorAll('.tag-row');
                rows.forEach(row => row.style.display = 'none');

                tagsToDisplay.forEach(tag => {
                    const row = Array.from(rows).find(r => r.dataset.id == tag.id);
                    if (row) row.style.display = '';
                });

                document.getElementById('tag-pagination-info').innerText = `Showing ${startIndex + 1} to ${Math.min(endIndex, filteredTags.length)} of ${filteredTags.length} entries`;
                document.getElementById('tag-previous').classList.toggle('disabled', currentTagPage === 1);
                document.getElementById('tag-next').classList.toggle('disabled', currentTagPage === getTotalTagPages());
                updateTagPaginationLinks();
            }

            function updateTagPaginationLinks() {
                const totalPages = getTotalTagPages();
                const pagination = document.getElementById('tag-pagination');
                pagination.innerHTML = '';

                const previousButton = document.createElement('li');
                previousButton.classList.add('page-item');
                previousButton.innerHTML = `<a class="page-link" href="#" id="tag-previous" tabindex="-1">Previous</a>`;
                pagination.appendChild(previousButton);

                for (let page = 1; page <= totalPages; page++) {
                    const pageItem = document.createElement('li');
                    pageItem.classList.add('page-item');
                    if (page === currentTagPage) pageItem.classList.add('active');
                    pageItem.innerHTML = `<a class="page-link" href="#" data-page="${page}">${page}</a>`;
                    pagination.appendChild(pageItem);
                }

                const nextButton = document.createElement('li');
                nextButton.classList.add('page-item');
                nextButton.innerHTML = `<a class="page-link" href="#" id="tag-next">Next</a>`;
                pagination.appendChild(nextButton);
            }

            function filterTags() {
                const searchTerm = document.getElementById('tag-search-input').value.toLowerCase();
                filteredTags = tags.filter(tag => tag.tag.toLowerCase().includes(searchTerm));
                currentTagPage = 1;
                updateTagTable();
            }

            document.getElementById('tag-pagination').addEventListener('click', function(event) {
                const target = event.target;

                if (target.tagName === 'A') {
                    if (target.id === 'tag-previous' && currentTagPage > 1) {
                        currentTagPage--;
                    } else if (target.id === 'tag-next' && currentTagPage < getTotalTagPages()) {
                        currentTagPage++;
                    } else if (target.dataset.page) {
                        currentTagPage = parseInt(target.dataset.page);
                    }
                    updateTagTable();
                }
            });

            document.getElementById('tag-search-input').addEventListener('input', filterTags);

            filteredTags = tags;
            updateTagTable();
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
