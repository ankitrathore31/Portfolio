@extends('Admin.layout.master')
@Section('content')
    <div class="main-content">
        <div class="container mt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Add Project</h5>

                <!-- Breadcrumb aligned to right -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                        <li class="breadcrumb-item"><a href="{{ route('project.list') }}">Project List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>
            </div>
            <div class="card m-1">
                <div class="card-body">
                    <form action="{{ route('store.project') }}" method="POST" enctype="multipart/form-data" class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3 form-group local-from">
                                <label class="form-label">Project name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Project Name" required>
                            </div>

                            <div class="col-md-12 mb-3 form-group local-from">
                                <label class="form-label">Project Description <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Project Description" required></textarea>
                            </div>

                            <div class="col-md-12 mb-3 form-group local-from">
                                <label class="form-label">Project Keyword<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('keyword') is-invalid @enderror"
                                    name="keyword" placeholder="Project (keywords)" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="github_link" class="form-label">GitHub Link <span
                                        class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('github_link') is-invalid @enderror"
                                    name="github_link" placeholder="https://github.com/username/project">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="live_link" class="form-label">Live Server Link <span
                                        class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('live_link') is-invalid @enderror"
                                    name="live_link" placeholder="https://yourproject.com">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <!-- Multiple File Input -->
                                <input type="file" class="form-control @error('project_images') is-invalid @enderror"
                                    name="images[]" id="project_images" accept="image/*" multiple style="display: none;"
                                    onchange="previewImages(); validateFiles()">

                                <!-- Trigger Button -->
                                <button type="button" class="btn btn-primary" id="chooseFileBtn">Choose Project
                                    Images</button>

                                <!-- Preview Container -->
                                <div id="imagePreviewContainer"
                                    style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;"></div>

                                <!-- Error -->
                                <div id="fileError" class="text-danger" style="display: none;"></div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-success">Add Project</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('chooseFileBtn').addEventListener('click', function() {
            document.getElementById('project_images').click();
        });

        function previewImages() {
            const files = document.getElementById('project_images').files;
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = ''; // Clear old previews

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    img.classList.add('rounded');
                    container.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }

        function validateFiles() {
            const files = document.getElementById('project_images').files;
            const fileError = document.getElementById('fileError');

            for (let file of files) {
                if (file.size / 1024 / 1024 > 5) { // 5MB limit
                    fileError.textContent = 'Each file must be <= 5MB';
                    fileError.style.display = 'block';
                    document.getElementById('project_images').value = '';
                    document.getElementById('imagePreviewContainer').innerHTML = '';
                    return false;
                }
                if (!file.type.startsWith('image/')) {
                    fileError.textContent = 'Only image files allowed.';
                    fileError.style.display = 'block';
                    document.getElementById('project_images').value = '';
                    document.getElementById('imagePreviewContainer').innerHTML = '';
                    return false;
                }
            }

            fileError.style.display = 'none';
            return true;
        }
    </script>
@endsection
