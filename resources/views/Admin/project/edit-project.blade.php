@extends('Admin.layout.master')
@Section('content')
    <div class="main-content">
        <div class="container mt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Edit Project</h5>

                <!-- Breadcrumb aligned to right -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                        <li class="breadcrumb-item"><a href="{{ route('project.list') }}">Activity List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Activity</li>
                    </ol>
                </nav>
            </div>
            <div class="card m-1">
                <div class="card-body">
                    <form action="{{ route('update.project', $project->id) }}" method="POST" enctype="multipart/form-data"
                        class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3 form-group local-from">
                                <label class="form-label">Project name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $project->name }}" placeholder="Project Name" required>
                            </div>

                            <div class="col-md-12 mb-3 form-group local-from">
                                <label class="form-label">Project Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Project Description" required>{{ $project->description }}</textarea>
                            </div>

                            <div class="col-md-12 mb-3 form-group local-from">
                                <label class="form-label">Project Keyword<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('keyword') is-invalid @enderror"
                                    name="keyword" value="{{ $project->keyword }}" placeholder="Project (keywords)"
                                    required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="github_link" class="form-label">GitHub Link <span
                                        class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('github_link') is-invalid @enderror"
                                    name="github_link" value="{{ $project->github_link }}"
                                    placeholder="https://github.com/username/project">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="live_link" class="form-label">Live Server Link <span
                                        class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('live_link') is-invalid @enderror"
                                    name="live_link" value="{{ $project->live_link }}"
                                    placeholder="https://yourproject.com">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">

                                <!-- Custom File Input (hidden default) -->
                                <input type="file" class="form-control @error('project_image') is-invalid @enderror"
                                    name="image" id="project_image" accept="image/*" style="display: none;"
                                    onchange="previewImage(); validateFile()">

                                <!-- Custom Button to Trigger File Input -->
                                <button type="button" class="btn btn-primary" id="chooseFileBtn">Choose Project
                                    Image</button>

                                <!-- Image Preview -->
                                <div id="imagePreviewContainer" style="margin-top: 10px;">
                                    <img id="imagePreview" src="" alt="Image Preview"
                                        style="max-width: 200px; max-height: 200px; display: none;">
                                </div>

                                <!-- Error Message for Validation -->
                                <div id="fileError" class="text-danger" style="display: none;"></div>
                            </div>
                            <div class="col-md-6">
                                {{-- @if (!empty($project->image)) --}}
                                <div style="margin-top: 10px;">
                                    <img src="{{ asset($project->image) }}" alt="Image Preview"
                                        style="max-width: 200px; max-height: 200px;">
                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update Project</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Trigger the hidden file input when the button is clicked
        document.getElementById('chooseFileBtn').addEventListener('click', function() {
            document.getElementById('project_image').click();
        });

        // Preview the uploaded image
        function previewImage() {
            const file = document.getElementById('project_image').files[0];
            const imagePreview = document.getElementById('imagePreview');
            const fileError = document.getElementById('fileError');

            // Check if a file is selected
            if (file) {
                const reader = new FileReader();

                // Display the image preview
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);

                // Reset error message
                fileError.style.display = 'none';
            }
        }

        // Validate file size (<= 2MB) and file type (only images)
        function validateFile() {
            const file = document.getElementById('project_image').files[0];
            const fileError = document.getElementById('fileError');

            if (file) {
                const fileSize = file.size / 1024 / 1024;
                const fileType = file.type.split('/')[0];

                if (fileSize > 40) {
                    fileError.textContent = 'File size should be less than or equal to 25MB.';
                    fileError.style.display = 'block';
                    document.getElementById('project_image').value = ''; // Reset the file input
                    document.getElementById('imagePreview').style.display = 'none'; // Hide the preview
                    return false;
                }

                // File type check (only images)
                if (fileType !== 'image') {
                    fileError.textContent = 'Only image files are allowed.';
                    fileError.style.display = 'block';
                    document.getElementById('project_image').value = ''; // Reset the file input
                    document.getElementById('imagePreview').style.display = 'none'; // Hide the preview
                    return false;
                }
            }

            return true;
        }
    </script>
@endsection
