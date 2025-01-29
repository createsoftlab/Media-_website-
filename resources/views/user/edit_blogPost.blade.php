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
    <title>User - Edit post</title>

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
        display: flex;
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
                            <h3 class="page-title">Edit Blog Post</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('user/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.myblogPosts') }}">Blog Posts</a></li>
                                <li class="breadcrumb-item active">Edit Blog Post</li>
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
                                    <form action="{{ route('user.update.myblogPost',$post->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Title</label>
                                            <input type="text" class="form-control" placeholder="Enter post title" name="title"  value="{{ old('title', isset($post->title) ? $post->title : '') }}" oninput="updateCharacterCount(this, 50)">
                                            @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <small class="text-muted char-count" id="title-count">0/50</small>
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Category</label>
                                            <select name="category" class="form-control contact-input" id="category">
                                                <option value="" disabled {{ old('category', isset($post->category) ? $post->category : null) === null ? 'selected' : '' }}>Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->category }}"
                                                    {{ old('category', isset($post->category) ? $post->category : null) === $category->category ? 'selected' : '' }}>
                                                    {{ $category->category }}
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
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="imageUpload" name="feature_image" style="flex: 1;">
                                                    <!-- Select from Gallery Button -->
                                                    <button type="button" class="mt-2 btn btn-primary mt-sm-0"
                                                        id="galleryButton" data-toggle="modal"
                                                        data-target="#galleryModal">
                                                        Select from Gallery
                                                    </button>
                                                </div>
                                                @error('feature_image')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                           <!-- Image Preview Section -->
                                            <div class="mb-4" id="imagePreviewContainer"
                                                style="{{ old('feature_image') || isset($post->feature_image) ? '' : 'display: none;' }}">
                                                <label class="col-form-label text-muted">Selected Image Preview</label>
                                                <div>
                                                    <img id="imagePreview"
                                                        src="{{ old('feature_image') ? asset('feature_image/' . old('feature_image')) : (isset($post->feature_image) ? asset('feature_image/' . $post->feature_image) : '#') }}"
                                                        alt="Selected Image" class="img-thumbnail" style="max-height: 200px;">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-4 editor-wrapper">
                                            <label class="col-form-label text-muted">Content</label>
                                            <textarea id="summernote" name="content">
                                                {!! old('content') ? old('content') : (isset($post->content) ? $post->content : '') !!}
                                            </textarea>
                                            @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Tags</label>
                                            <div id="tags-container" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                                                @if(isset($post->tags) && $post->tags)
                                                    @foreach(explode(',', $post->tags) as $tag)
                                                        <span class="badge badge-primary tag-item" style="margin-right: 10px; cursor: pointer;"
                                                              data-tag="{{ $tag }}">
                                                            {{ $tag }}
                                                            <button type="button" class="close" style="font-size: 14px; color: rgb(0, 0, 0); margin-left: 5px;"
                                                                    onclick="removeTag(this, '{{ $tag }}')">&times;</button>
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <input type="text" class="form-control" id="tag-input" placeholder="Enter tags (e.g., tag1, tag2)">
                                            <ul id="tags-dropdown" class="list-group text-success" style="display: none; position: absolute; z-index: 1000; background-color: rgb(253, 29, 29); border: 1px solid #ccc; max-height: 200px; overflow-y: auto;">
                                            </ul>
                                            <!-- Button to clear all tags -->
                                            <button type="button" class="btn btn-danger btn-sm" onclick="clearAllTags()">Clear All Tags</button>
                                            @error('tags')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <!-- Hidden field to store the selected tags as a comma-separated string -->
                                            <input type="hidden" name="tags" id="tags-field" value="{{ old('tags', $post->tags ?? '') }}">
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Post Meta Title</label>
                                            <input type="text" class="form-control" placeholder="Enter meta title" name="meta_title"
                                            value="{{ old('meta_title', isset($post->meta_title) ? $post->meta_title : '') }}" oninput="updateCharacterCount(this, 20)">
                                            <small class="text-muted char-count" id="meta-title-count">0/20</small>
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Post Meta Description</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter meta description" name="meta_description"
                                                value="{{ old('meta_description', isset($post->meta_description) ? $post->meta_description : '') }}" oninput="updateCharacterCount(this, 20)">
                                            <small class="text-muted char-count" id="meta-description-count">0/20</small>
                                        </div>
                                        <div class="mb-4 col-12 form-group">
                                            <label class="col-form-label text-muted">Post Meta Keywords</label>
                                            <input type="text" class="form-control" placeholder="Enter meta keywords" name="meta_keywords"
                                            value="{{ old('meta_keywords', isset($post->meta_keywords) ? $post->meta_keywords : '') }}" oninput="updateCharacterCount(this, 20)">
                                            <small class="text-muted char-count" id="meta-keywords-count">0/20</small>
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
                                                <div id="video1-preview" class="mt-3 video-preview">
                                                    @if($post->PostVideo)
                                                        <video src="{{ asset('video1/' . $post->PostVideo->video1) }}" controls></video>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="video2" class="text-muted">Video 2</label>
                                                <input class="form-control" type="file" name="video2" id="video2" accept="video/*">
                                                @error('video2')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <small id="video2-error" class="text-danger d-none">File size exceeds the 40MB limit.</small>
                                                <!-- Preview section for Video 2 -->
                                                <div id="video2-preview" class="mt-3 video-preview">
                                                    @if($post->PostVideo)
                                                        <video src="{{ asset('video2/' . $post->PostVideo->video2) }}" controls></video>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-12 row">
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image1" class="text-muted">Post Image 1:</label>
                                                <input class="form-control" type="file" name="post_image1" id="post_image1" accept="image/*">
                                                @error('post_image1')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div id="post-image-preview1" class="mt-3 image-preview">
                                                    @if($post->PostImage)
                                                        <img src="{{ asset('post_image1/' . $post->PostImage->post_image1) }}" alt="Post Image 1">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image2" class="text-muted">Post Image 2:</label>
                                                <input class="form-control" type="file" name="post_image2" id="post_image2" accept="image/*">
                                                @error('post_image2')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div id="post-image-preview2" class="mt-3 image-preview">
                                                    @if($post->PostImage)
                                                        <img src="{{ asset('post_image2/' . $post->PostImage->post_image2) }}" alt="Post Image 2">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 col-12 row">
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image3" class="text-muted">Post Image 3:</label>
                                                <input class="form-control" type="file" name="post_image3" id="post_image3" accept="image/*">
                                                @error('post_image3')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div id="post-image-preview3" class="mt-3 image-preview">
                                                    @if($post->PostImage)
                                                        <img src="{{ asset('post_image3/' . $post->PostImage->post_image3) }}" alt="Post Image 3">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-4 col-md-6 col-12 form-group">
                                                <label for="post_image4" class="text-muted">Post Image 4:</label>
                                                <input class="form-control" type="file" name="post_image4" id="post_image4" accept="image/*">
                                                @error('post_image4')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div id="post-image-preview4" class="mt-3 image-preview">
                                                    @if($post->PostImage)
                                                        <img src="{{ asset('post_image4/' . $post->PostImage->post_image4) }}" alt="Post Image 4">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="card-footer text-end d-flex justify-content-end" style="gap: 10px;">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold"
                                style="background: linear-gradient(to right, #007bff, #0056b3); border: none; color: #fff;">
                                <i class="fa fa-paper-plane me-2"></i> Publish
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Modal: Select from Gallery -->
                <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel"
                    aria-hidden="true">
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
                                        <img src="{{ asset('gallery_image/' . $image->image) }}"
                                            class="img-fluid img-thumbnail gallery-image" alt="Gallery Image"
                                            data-image-url="{{ asset('gallery_image/' . $image->image) }}">
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
            height: 600,
            word-wrap: break-word;
        }
    </style>

<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 600,
            width: '100%',
            placeholder: 'Write something amazing...',
            resize: true,
            toolbar: [
                // Font style buttons (bold, italic, underline, etc.)
                ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],

                // Font size and color
                ['font', ['fontname', 'fontsize', 'color']],

                // Paragraph style (alignments, lists, etc.)
                ['para', ['ul', 'ol', 'paragraph', 'height']],

                // Insert buttons (link, image, video, etc.)


                // Headings and formatting
                ['view', [ 'codeview', 'undo', 'redo', 'help']],

                // Special characters
                ['specialChar', ['emoji', 'specialChar']],

            ]
        });
    });
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const imageUpload = document.getElementById('imageUpload');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');

        // Handle uploaded image
        imageUpload.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle gallery selection
        document.querySelectorAll('.gallery-image').forEach(image => {
            image.addEventListener('click', function () {
                const selectedImageUrl = this.dataset.imageUrl;

                // Fetch the image and convert it to a File object
                fetch(selectedImageUrl)
                    .then(response => response.blob())
                    .then(blob => {
                        const file = new File([blob], 'gallery-image.jpg', { type: blob.type });

                        // Create a DataTransfer object to simulate a file upload
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        imageUpload.files = dataTransfer.files;

                        // Update the preview
                        const reader = new FileReader();
                        reader.onload = function (e) {
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


<script>
    // Function to clear all tags
    function clearAllTags() {
        var tagContainer = document.getElementById('tags-container');
        var tagsField = document.getElementById('tags-field');

        // Clear all displayed tags
        tagContainer.innerHTML = '';

        // Clear the hidden input field
        tagsField.value = '';
    }

    // Passing tags data from Laravel to JavaScript
    var tags = @json($tags); // Convert the tags collection to JavaScript

    // Function to filter tags based on query
    function searchTags(query) {
        query = query.toLowerCase();
        var results = [];

        tags.forEach(function(tag) {
            if (tag.tag.toLowerCase().includes(query)) {
                results.push(tag);
            }
        });

        return results;
    }

    // Function to add a tag to the display above the input
    function addTagToDisplay(tag) {
        var tagContainer = document.getElementById('tags-container');

        // Check if the tag is already displayed to prevent duplicates
        var existingTags = Array.from(tagContainer.getElementsByClassName('tag-item'));
        if (existingTags.some(t => t.getAttribute('data-tag') === tag)) {
            return; // Skip if tag already exists
        }

        var tagElement = document.createElement('span');
        tagElement.classList.add('badge', 'badge-primary', 'tag-item');
        tagElement.setAttribute('data-tag', tag);
        tagElement.style.marginRight = '10px';
        tagElement.style.cursor = 'pointer';
        tagElement.innerHTML = `${tag}
            <button type="button" class="close" style="font-size: 14px; color: red; margin-left: 5px;"
                    onclick="removeTag(this, '${tag}')">&times;</button>`;

        // Add tag to the display container
        tagContainer.appendChild(tagElement);

        // Update the hidden input field
        updateTagsField();
    }

    // Function to remove a tag
    function removeTag(buttonElement, tag) {
        var tagElement = buttonElement.parentElement;
        tagElement.remove();
        updateTagsField();
    }

    // Function to update the hidden input field with the tags
    function updateTagsField() {
        var tagsContainer = document.getElementById('tags-container');
        var tags = [];

        // Collect tags from the displayed tag items
        var tagItems = tagsContainer.getElementsByClassName('tag-item');
        for (var i = 0; i < tagItems.length; i++) {
            tags.push(tagItems[i].getAttribute('data-tag'));
        }

        // Set the value of the hidden input field as a comma-separated string
        document.getElementById('tags-field').value = tags.join(',');
    }

    // Event listener for input field to handle the search
    document.getElementById('tag-input').addEventListener('input', function() {
        var query = this.value.trim();
        var resultsContainer = document.getElementById('tags-dropdown');

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

                    // Add click event to result items to populate the input box with the selected tag
                    resultItem.addEventListener('click', function(event) {
                        event.preventDefault();

                        // Add the tag to the display above the input
                        addTagToDisplay(tag.tag);

                        // Clear the input field after tag is added
                        document.getElementById('tag-input').value = '';

                        // Hide the dropdown after selection
                        resultsContainer.style.display = 'none';
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

    // Trigger the search again after a tag is selected and added
    document.getElementById('tag-input').addEventListener('focus', function() {
        this.dispatchEvent(new Event('input'));
    });

    // Populate tags from the database on page load
    window.onload = function() {
        clearAllTags(); // Clear any existing tags
        var dbTags = @json(explode(',', $post->tags ?? ''));
        dbTags.forEach(function(tag) {
            if (tag.trim() !== '') {
                addTagToDisplay(tag.trim());
            }
        });
    };
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to set up video previews
        function setupVideoPreview(inputId, previewId, existingSrc = null) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            // Load existing video if available
            if (existingSrc) {
                const video = document.createElement("video");
                video.src = existingSrc;
                video.controls = true;
                preview.appendChild(video);
            }

            // Handle new file selection
            input.addEventListener("change", function () {
                const file = this.files[0];
                preview.innerHTML = ""; // Clear existing content

                if (file) {
                    const video = document.createElement("video");
                    video.src = URL.createObjectURL(file);
                    video.controls = true;
                    preview.appendChild(video);
                }
            });
        }

        // Function to set up image previews
        function setupImagePreview(inputId, previewId, existingSrc = null) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            // Load existing image if available
            if (existingSrc) {
                const img = document.createElement("img");
                img.src = existingSrc;
                preview.appendChild(img);
            }

            // Handle new file selection
            input.addEventListener("change", function () {
                const file = this.files[0];
                preview.innerHTML = ""; // Clear existing content

                if (file) {
                    const img = document.createElement("img");
                    img.src = URL.createObjectURL(file);
                    preview.appendChild(img);
                }
            });
        }

        // Initialize video previews
        setupVideoPreview("video1", "video1-preview");
        setupVideoPreview("video2", "video2-preview");

        // Initialize image previews
        setupImagePreview("post_image1", "post-image-preview1");
        setupImagePreview("post_image2", "post-image-preview2");
        setupImagePreview("post_image3", "post-image-preview3");
        setupImagePreview("post_image4", "post-image-preview4");
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
