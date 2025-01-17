<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin - Add New Blog Post</title>

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

    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <style>
        #imagePreviewContainer {
            max-width: 100%;
            max-height: 200px;
            overflow: hidden;
            text-align: center;
        }

        #imagePreview {
            max-width: 100%;
            height: auto;
        }

        .video-preview {
            width: 300px;
            height: 200px;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video-preview video {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .image-preview {
            width: 300px;
            height: 200px;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            justify-content: center;
            align-items: center;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
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
                            <h3 class="page-title">Add New Blog Post</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add New Blog Post</li>
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
                    <div class="col-lg-12 d-flex justify-content-center align-items-center">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-muted">Post Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter post title" name="title" oninput="updateCharacterCount(this, 50)">
                                            <small class="text-muted char-count" id="title-count">0/50</small>
                                            @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Category</label>
                                            <select name="category" class="form-control contact-input" id="category">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->category }}">{{ $category->category }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="container my-4">
                                            <div class="mb-4 col-12 form-group">
                                                <label class="col-form-label text-muted">Feature Image</label>
                                                <div class="gap-2 d-flex flex-column flex-sm-row align-items-center">
                                                    <!-- Image Upload Input -->
                                                    <input type="file" class="form-control" accept="image/*" id="imageUpload" name="feature_image" style="flex: 1;">
                                                    <!-- Select from Gallery Button -->
                                                    <button type="button" class="mt-2 btn btn-primary mt-sm-0" id="galleryButton" data-toggle="modal" data-target="#galleryModal">
                                                        Select from Gallery
                                                    </button>
                                                </div>
                                                @error('feature_image')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!-- Image Preview Section -->
                                            <div class="mb-4" id="imagePreviewContainer" style="display: none;">
                                                <label class="col-form-label text-muted">Selected Image Preview</label>
                                                <div>
                                                    <img id="imagePreview" src="#" alt="Selected Image" class="img-thumbnail" style="max-height: 200px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 editor-wrapper">
                                            <label class="col-form-label text-muted">Content</label>
                                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                                            @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Tags</label>
                                            <div id="tags-container" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                                            </div>
                                            <input type="text" class="form-control" id="tag-input" placeholder="Enter tags (e.g., tag1, tag2)">
                                            <ul id="tags-dropdown" class="list-group" style="display: none; position: absolute; z-index: 1000; background-color: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto;">
                                            </ul>
                                            @error('tags')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <!-- Hidden field to store the selected tags as a comma-separated string -->
                                            <input type="hidden" name="tags" id="tags-field">
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Post Meta Title</label>
                                            <input type="text" class="form-control" placeholder="Enter meta title" name="meta_title" oninput="updateCharacterCount(this, 20)">
                                            <small class="text-muted char-count" id="meta-title-count">0/20</small>
                                            @error('meta_title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Post Meta Description</label>
                                            <input type="text" class="form-control" placeholder="Enter meta description" name="meta_description" oninput="updateCharacterCount(this, 20)">
                                            <small class="text-muted char-count" id="meta-description-count">0/20</small>
                                            @error('meta_description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Post Meta Keywords</label>
                                            <input type="text" class="form-control" placeholder="Enter meta keywords" name="meta_keywords" oninput="updateCharacterCount(this, 20)">
                                            <small class="text-muted char-count" id="meta-keywords-count">0/20</small>
                                            @error('meta_keywords')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class=" form-label">Post Video Upload Section</label>
                                        </div>
                                        <div class="mb-4 col-12 row">
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="video1" class="text-muted">Video 1</label>
                                                <input class="form-control" type="file" name="video1" id="video1" accept="video/*">
                                                @error('video1')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <small id="video1-error" class="text-danger d-none">File size exceeds the 40MB limit.</small>
                                                <!-- Preview section for Video 1 -->
                                                <div id="video1-preview" class="mt-3 video-preview"></div>
                                            </div>

                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="video2" class="text-muted">Video 2</label>
                                                <input class="form-control" type="file" name="video2" id="video2" accept="video/*">
                                                @error('video2')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <small id="video2-error" class="text-danger d-none">File size exceeds the 40MB limit.</small>
                                                <!-- Preview section for Video 2 -->
                                                <div id="video2-preview" class="mt-3 video-preview"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class=" form-label">Post Image Upload Section</label>
                                        </div>
                                        <div class="mb-4 col-12 row">
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image1" class="text-muted">Post Image 1:</label>
                                                <input class="form-control" type="file" name="post_image1" id="post_image1" accept="image/*">
                                                @error('post_image1')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- Preview section for Image 1 -->
                                                <div id="post-image-preview1" class="mt-3 image-preview"></div>
                                            </div>

                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image2" class="text-muted">Post Image 2:</label>
                                                <input class="form-control" type="file" name="post_image2" id="post_image2" accept="image/*">
                                                @error('post_image2')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- Preview section for Image 2 -->
                                                <div id="post-image-preview2" class="mt-3 image-preview"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-12 row">
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image1" class="text-muted">Post Image 3:</label>
                                                <input class="form-control" type="file" name="post_image3" id="post_image3" accept="image/*">
                                                @error('post_image3')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- Preview section for Image 1 -->
                                                <div id="post-image-preview3" class="mt-3 image-preview"></div>
                                            </div>

                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image2" class="text-muted">Post Image 4:</label>
                                                <input class="form-control" type="file" name="post_image4" id="post_image4" accept="image/*">
                                                @error('post_image4')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <!-- Preview section for Image 2 -->
                                                <div id="post-image-preview4" class="mt-3 image-preview"></div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="card-footer text-end d-flex justify-content-end" style="gap: 10px;">
                                <button type="submit" name="status" value="1" class="btn btn-primary btn-lg fw-bold" style="background: linear-gradient(to right, #007bff, #0056b3); border: none; color: #fff;">
                                    <i class="fa fa-paper-plane me-2"></i> Publish
                                </button>
                                <button type="submit" name="status" value="2" class="btn btn-secondary">Save as
                                    Draft</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal: Select from Gallery -->
                <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="galleryModalLabel">Select Image from Gallery</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Loop through images dynamically -->
                                    @foreach ($images as $image)
                                    <div class="mb-3 col-4 col-sm-3 col-md-2">
                                        <img src="{{ asset('gallery_image/' . $image->image) }}" class="img-fluid img-thumbnail gallery-image" alt="Gallery Image" data-image-url="{{ asset('gallery_image/' . $image->image) }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

        {{-- title/meta title/meta keywords/meta description validations --}}
        <script>
            function updateCharacterCount(input, maxLength) {
                const charCountElement = input.nextElementSibling; // The <small> element for character count
                const currentLength = input.value.length;

                // Update the character count text
                charCountElement.textContent = `${currentLength}/${maxLength}`;

                if (currentLength > maxLength) {
                    // Exceeded character limit: Make the outline and count red
                    input.style.outline = "2px solid red";
                    charCountElement.style.color = "red";
                } else {
                    // Within character limit: Make the outline and count green
                    input.style.outline = "2px solid green";
                    charCountElement.style.color = "green";
                }
            }

        </script>

        {{-- video section validation --}}
        <script>
            function validateVideoInput(inputId, previewId, errorId) {
                const fileInput = document.getElementById(inputId);
                const errorElement = document.getElementById(errorId);
                const previewElement = document.getElementById(previewId);

                fileInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];

                    // Clear previous error and preview
                    errorElement.classList.add('d-none');
                    previewElement.innerHTML = '';

                    if (file) {
                        const maxSizeInBytes = 40 * 1024 * 1024; // 40MB
                        if (file.size > maxSizeInBytes) {
                            // Show error if file exceeds 40MB
                            errorElement.classList.remove('d-none');
                            fileInput.value = ''; // Clear the input
                        } else {
                            // Show video preview
                            const videoElement = document.createElement('video');
                            videoElement.src = URL.createObjectURL(file);
                            videoElement.controls = true;
                            videoElement.style.maxWidth = '100%';
                            videoElement.style.height = 'auto';
                            previewElement.appendChild(videoElement);
                        }
                    }
                });
            }

            // Apply validation to both video inputs
            validateVideoInput('video1', 'video1-preview', 'video1-error');
            validateVideoInput('video2', 'video2-preview', 'video2-error');

        </script>

    </div>
    <!-- /Main Wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <style>
        .editor-wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
        }

        #summernote {
            width: 100%;
            word-wrap: break-word;
        }

    </style>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400
                , width: '100%'
                , placeholder: 'Write something amazing...'
                , resize: true
                , toolbar: [
                    // Font style buttons (bold, italic, underline, etc.)
                    ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],

                    // Font size and color
                    ['font', ['fontname', 'fontsize', 'color']],

                    // Paragraph style (alignments, lists, etc.)
                    ['para', ['ul', 'ol', 'paragraph', 'height']],


                    // Headings and formatting
                    ['view', ['codeview', 'undo', 'redo', 'help']],

                    // Special characters
                    ['specialChar', ['emoji', 'specialChar']],

                ]
            });
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageUpload = document.getElementById('imageUpload');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePreview = document.getElementById('imagePreview');

            // Handle uploaded image
            imageUpload.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewContainer.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle gallery selection
            document.querySelectorAll('.gallery-image').forEach(image => {
                image.addEventListener('click', function() {
                    const selectedImageUrl = this.dataset.imageUrl;

                    // Fetch the image and convert it to a File object
                    fetch(selectedImageUrl)
                        .then(response => response.blob())
                        .then(blob => {
                            const file = new File([blob], 'gallery-image.jpg', {
                                type: blob.type
                            });

                            // Create a DataTransfer object to simulate a file upload
                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(file);
                            imageUpload.files = dataTransfer.files;

                            // Update the preview
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                                imagePreviewContainer.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        });

                    // Close modal
                    $('#galleryModal').modal('hide');
                });
            });
        });

        // notification fade away
        document.addEventListener("DOMContentLoaded", function() {
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


    <script>
        // Passing tags data from Laravel to JavaScript
        var tags = @json($tags);

        function searchTags(query) {
            query = query.toLowerCase();
            var results = [];
            tags.forEach(function(tag) {
                var nameMatch = tag.tag.toLowerCase().includes(query);

                if (nameMatch) {
                    results.push(tag);
                }
            });
            return results;
        }

        // Function to add tag above the input (without the #)
        function addTagToDisplay(tag) {
            var tagContainer = document.getElementById('tags-container');
            var tagElement = document.createElement('span');
            tagElement.classList.add('tag-item');
            tagElement.textContent = tag;
            tagElement.style.marginRight = '10px'; // Add spacing between tags

            // Add tag to the display container
            tagContainer.appendChild(tagElement);

            updateTagsField();
        }

        function updateTagsField() {
            var tagsContainer = document.getElementById('tags-container');
            var tags = [];

            // Collect tags from the displayed tag items
            var tagItems = tagsContainer.getElementsByClassName('tag-item');
            for (var i = 0; i < tagItems.length; i++) {
                tags.push(tagItems[i].textContent.trim());
            }

            // Set the value of the hidden input field as a comma-separated string
            document.getElementById('tags-field').value = tags.join(',');
        }

        document.getElementById('tag-input').addEventListener('input', function() {
            var query = this.value.trim();
            var resultsContainer = document.getElementById('tags-dropdown'); // Get the results container

            // If there is a query, search and display results
            if (query.length > 0) {
                var results = searchTags(query);

                // Clear previous results
                resultsContainer.innerHTML = '';
                resultsContainer.style.display = 'block'; // Show results dropdown

                // Display matching results
                if (results.length > 0) {
                    results.forEach(function(tag) {
                        var resultItem = document.createElement('a');
                        resultItem.href = '#';
                        resultItem.classList.add('list-group-item', 'list-group-item-action');
                        resultItem.textContent = tag.tag;
                        resultsContainer.appendChild(resultItem);

                        resultItem.addEventListener('click', function(event) {
                            event.preventDefault();

                            addTagToDisplay(tag.tag);

                            document.getElementById('tag-input').value = '';

                            // Hide the dropdown after selection
                            resultsContainer.style.display = 'none';

                            // Trigger search again after selecting the tag
                            setTimeout(function() {
                                document.getElementById('tag-input').dispatchEvent(new Event('input'));
                            }, 100);
                        });
                    });
                } else {
                    resultsContainer.innerHTML = '<li class="list-group-item">No tags found</li>';
                }
            } else {
                // If the query is empty, hide the dropdown
                resultsContainer.style.display = 'none';
            }
        });

        document.getElementById('tag-input').addEventListener('focus', function() {
            this.dispatchEvent(new Event('input'));
        });

    </script>

    {{-- video previews --}}
    <script>
        function handleVideoPreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            input.addEventListener('change', function() {
                const file = this.files[0];
                preview.innerHTML = ''; // Clear previous content

                if (file) {
                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.controls = true;
                    preview.appendChild(video);
                }
            });
        }

        // Initialize preview functionality for both inputs
        handleVideoPreview('video1', 'video1-preview');
        handleVideoPreview('video2', 'video2-preview');

    </script>
    {{-- /video previews --}}

    {{-- 4 images preview --}}
    <script>
        // Function to display image or video preview
        function previewFile(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);

            // Clear previous preview
            preview.innerHTML = "";

            if (file) {
                preview.style.display = 'flex'; // Show preview container

                const reader = new FileReader();
                reader.onload = function(e) {
                    let element;

                    if (file.type.startsWith("image/")) {
                        // Image preview
                        element = document.createElement("img");
                        element.src = e.target.result;
                        element.classList.add("img-fluid");
                    } else if (file.type.startsWith("video/")) {
                        // Video preview
                        element = document.createElement("video");
                        element.src = e.target.result;
                        element.controls = true;
                        element.classList.add("img-fluid");
                    }

                    preview.appendChild(element);
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
        // Attach event listeners for each file input
        document.getElementById('post_image1').addEventListener('change', function() {
            previewFile(this, 'post-image-preview1');
        });

        document.getElementById('post_image2').addEventListener('change', function() {
            previewFile(this, 'post-image-preview2');
        });

        document.getElementById('post_image3').addEventListener('change', function() {
            previewFile(this, 'post-image-preview3');
        });

        document.getElementById('post_image4').addEventListener('change', function() {
            previewFile(this, 'post-image-preview4');
        });

    </script>
    {{-- /4 images preview --}}

    <!-- jQuery -->
    {{-- <script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script> --}}

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
