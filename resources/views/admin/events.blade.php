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
    <title>ADmin - Event Management</title>

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
                            <h3 class="page-title">Events</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Events</li>
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
                                    <h5 class="mb-0">Event Management</h5>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-danger" href="{{ route('view.inactive.events') }}">Offline Events</a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('createOrEdit.event') }}">Add New Event</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Search Input Table -->
                            <div class="mb-3">
                                <input type="text" id="search-input" class="form-control form-control-sm" placeholder="Search by event title" oninput="filterTable()">
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Event Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="event-table-body">
                                        @foreach ($events as $event)
                                            <tr class="event-row" data-id="{{ $event->id }}" data-event_title="{{ $event->event_title }}" data-description="{{ $event->description }}">
                                                <td>{{ $event->event_title }}</td>
                                                <td>{{ \Illuminate\Support\Str::words($event->description, 5) }}</td>
                                                <td>{{ $event->start_date }}</td>
                                                <td>{{ $event->end_date }}</td>
                                                <td><img src="{{ asset('event_image/'.$event->image) }}" alt="{{ $event->event_title }}" class="img-thumbnail" style="width: 50px; height: 50px;"></td>
                                                <td class="text-center">
                                                    <form action="{{ route('activate.events', $event->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm
                                                            @if ($event->status == 1) btn-danger @elseif ($event->status == 0) btn-success @else btn-primary @endif">
                                                            @if ($event->status == 1)
                                                                Deactivate
                                                            @elseif ($event->status == 0)
                                                                Activate
                                                            @elseif ($event->status == 2)
                                                                Publish
                                                            @endif
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ route('createOrEdit.event',$event->id) }}" ><i class="la la-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Delete_Modal_{{ $event->id }}"><i class="la la-trash-o m-r-5"></i> Delete</a>
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
                                    <li class="page-item disabled"><a class="page-link" href="#" id="previous" tabindex="-1">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#" data-page="3">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" id="next">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->

        <!-- Delete Events Modal -->
        @foreach ($events as $event)
        <div class="modal custom-modal fade" id="Delete_Modal_{{ $event->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="border-0 shadow-lg modal-content rounded-3">
                    <div class="p-5 modal-body">
                        <div class="mb-4 text-center">
                            <h3 class="text-danger font-weight-bold">Confirm Deletion</h3>
                            <p class="text-muted font-italic">Are you sure you want to delete this item? This action
                                cannot be undone.</p>
                        </div>
                        <form method="POST" action="{{ route('delete.event',$event->id) }}">
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
        <!-- /Delete Events Modal -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    {{-- Table pagination and table search --}}
    <script>
        const events = {!! json_encode($events->map(function($event) {
            return [
                'id' => $event->id,
                'event_title' => $event->event_title,
                'description' => $event->description,
                'start_date' => $event->start_date,
                'end_date' => $event->end_date,
                'image' => url('event_image/' . $event->image), // Assuming event images are stored in this path
                'status' => $event->status,
            ];
        })) !!};

        document.addEventListener("DOMContentLoaded", function () {
            const eventsPerPage = 10;
            let currentPage = 1;
            let filteredEvents = [];

            // Function to calculate total pages based on filtered events
            function getTotalPages() {
                return Math.ceil(filteredEvents.length / eventsPerPage);
            }

            // Function to update the table based on current page and filtered data
            function updateTable() {
                const startIndex = (currentPage - 1) * eventsPerPage;
                const endIndex = startIndex + eventsPerPage;
                const eventsToDisplay = filteredEvents.slice(startIndex, endIndex);

                const tableBody = document.getElementById('event-table-body');
                const rows = tableBody.querySelectorAll('.event-row');
                rows.forEach(row => row.style.display = 'none'); // Hide all rows initially

                eventsToDisplay.forEach(event => {
                    const row = Array.from(rows).find(r => r.dataset.id == event.id);
                    if (row) row.style.display = ''; // Show the relevant rows
                });

                // Update pagination info
                document.getElementById('pagination-info').innerText = `Showing ${startIndex + 1} to ${Math.min(endIndex, filteredEvents.length)} of ${filteredEvents.length} entries`;

                // Disable previous/next buttons if on first/last page
                document.getElementById('previous').classList.toggle('disabled', currentPage === 1);
                document.getElementById('next').classList.toggle('disabled', currentPage === getTotalPages());

                updatePaginationLinks();
            }

            // Function to update the pagination links dynamically with ellipsis
            function updatePaginationLinks() {
                const totalPages = getTotalPages();
                const pagination = document.getElementById('pagination');
                pagination.innerHTML = '';

                const previousButton = document.createElement('li');
                previousButton.classList.add('page-item');
                previousButton.innerHTML = `<a class="page-link" href="#" id="previous" tabindex="-1">Previous</a>`;
                pagination.appendChild(previousButton);

                // Handle pagination links dynamically
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
                    if (currentPage > 3) pagination.appendChild(createPageLink('...'));

                    // Pages around current page
                    let startPage = currentPage - 1;
                    let endPage = currentPage + 1;

                    if (startPage < 2) startPage = 2;
                    if (endPage > totalPages - 1) endPage = totalPages - 1;

                    for (let page = startPage; page <= endPage; page++) {
                        pagination.appendChild(createPageLink(page));
                    }

                    // Ellipsis before the last page
                    if (currentPage < totalPages - 2) pagination.appendChild(createPageLink('...'));

                    // Last page
                    pagination.appendChild(createPageLink(totalPages));
                }

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

            // Function to filter events based on search input
            function filterTable() {
                const searchTerm = document.getElementById('search-input').value.toLowerCase();
                filteredEvents = events.filter(event => event.event_title.toLowerCase().includes(searchTerm));
                currentPage = 1; // Reset to the first page after filtering
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
                    updateTable();
                }
            });

            // Event listener for search input
            document.getElementById('search-input').addEventListener('input', filterTable);

            // Initial load of the table
            filteredEvents = events;
            updateTable();
        });

        // notification fade away
        document.addEventListener("DOMContentLoaded", function () {
        const toastSuccess = document.getElementById("toast-success");
        const toastError = document.getElementById("toast-error");

        function handleProgressAnimationEnd(toast) {
            const progressBar = toast.querySelector(".progress-bar .progress");

        progressBar.addEventListener("animationend", () => {

            toast.classList.add("fade-out");

            // Remove the toast from the DOM after fade-out
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

    {{-- Table pagination and table search --}}

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
