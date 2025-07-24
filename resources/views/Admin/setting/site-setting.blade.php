@extends('Admin.layout.master')

@section('content')
    <div class="main-content">
        <div class="container mt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Site Settings</h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Site Settings</li>
                    </ol>
                </nav>
            </div>
            @if (session('success'))
                <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card m-1">
                <div class="card-body">
                    <form action="{{ route('store.setting') }}" method="POST" enctype="multipart/form-data" class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Profile Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $setting->name }}" class="form-control"
                                    placeholder="Profile Name" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website Link <span class="text-danger">*</span></label>
                                <input type="url" name="site_url" class="form-control"
                                    placeholder="https://yourdomain.com" value="{{ $setting->site_url }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ $setting->email }}" class="form-control"
                                    placeholder="you@example.com">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" value="{{ $setting->phone }}" class="form-control"
                                    placeholder="+91 12345 67890">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">City / Address</label>
                                <input type="text" name="address" value="{{ $setting->address }}" class="form-control"
                                    placeholder="Jaipur, Rajasthan">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Profession / Title</label>
                                <input type="text" name="profession" value="{{ $setting->profession }}"
                                    class="form-control" placeholder="Full Stack Developer">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Highest Degree</label>
                                <input type="text" name="degree" value="{{ $setting->degree }}" class="form-control"
                                    placeholder="B.Tech in Computer Science">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Keywords (SEO)</label>
                                <input type="text" name="keywords" class="form-control" value="{{ $setting->keywords }}"
                                    placeholder="portfolio, developer, akki">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Website Description</label>
                                <textarea name="description" rows="3" class="form-control" placeholder="Brief about this site...">
                                    {{ $setting->description }}
                                </textarea>
                            </div>

                            {{-- Social Media Links --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Instagram Link</label>
                                <input type="url" name="instagram" class="form-control"
                                    value="{{ $setting->instagram }}" placeholder="https://instagram.com/yourprofile">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="github" class="form-label">GitHub Link <span
                                        class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('github') is-invalid @enderror"
                                    name="github" value="{{ $setting->github }}"
                                    placeholder="https://github.com/username/project" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">LinkedIn Link</label>
                                <input type="url" value="{{ $setting->linkedin }}" name="linkedin"
                                    class="form-control" placeholder="https://linkedin.com/in/yourprofile">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Facebook Link</label>
                                <input type="url" name="facebook" class="form-control"
                                    value="{{ $setting->facebook }}" placeholder="https://facebook.com/yourprofile">
                            </div>
                        </div>
                        <div class="row">
                            {{-- Upload CV (PDF) --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label d-block">Upload CV (PDF)</label>

                                <!-- Hidden file input -->
                                <input type="file" class="form-control" name="cv_file" id="cv_file" accept=".pdf"
                                    style="display: none;" onchange="showFileName('cv_file', 'cvFileName')">

                                <!-- Trigger button -->
                                <button type="button" class="btn btn-secondary" id="chooseCVBtn">Choose CV File</button>

                                <!-- Display file name -->
                                <div id="cvFileName" class="mt-2 text-muted"></div>

                                <a href="{{ asset($setting->cv_file) }}">{{ $setting->cv_file }}</a>
                            </div>

                            {{-- Upload Profile Image --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label d-block">Profile Image</label>

                                <!-- Hidden file input -->
                                <input type="file" class="form-control" name="profile_image" id="profile_image"
                                    accept="image/*" style="display: none;"
                                    onchange="previewProfileImage(); validateProfileImage();">

                                <!-- Trigger button -->
                                <button type="button" class="btn btn-primary" id="chooseImageBtn">Choose Profile
                                    Image</button>

                                <!-- Error Message -->
                                <div id="profileImageError" class="text-danger mt-2" style="display: none;"></div>

                                <!-- Image Preview (New selection) -->
                                <div id="profileImagePreviewContainer" style="margin-top: 10px;">
                                    <img id="profileImagePreview" src="" alt="New Image Preview"
                                        style="max-width: 200px; max-height: 200px; display: none;">
                                </div>

                                <!-- Previously saved image from DB -->
                                @if (!empty($setting->profile_image))
                                    <div class="mt-2">
                                        <label class="form-label">Current Profile Image:</label>
                                        <img src="{{ asset($setting->profile_image) }}" alt="Current Profile Image"
                                            style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                            </div>

                        </div>
                        <hr>
                        <div class="form-group mb-2 text-center mt-4">
                            <button type="submit" class="btn btn-success w-50">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Trigger CV file input on button click
        document.getElementById('chooseCVBtn').addEventListener('click', function() {
            document.getElementById('cv_file').click();
        });

        // Show selected CV file name
        function showFileName(inputId, displayId) {
            const fileInput = document.getElementById(inputId);
            const fileNameDisplay = document.getElementById(displayId);

            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = '';
            }
        }

        // Trigger image input on button click
        document.getElementById('chooseImageBtn').addEventListener('click', function() {
            document.getElementById('profile_image').click();
        });

        // Preview selected image
        function previewProfileImage() {
            const file = document.getElementById('profile_image').files[0];
            const preview = document.getElementById('profileImagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        // Validate selected image (type & size)
        function validateProfileImage() {
            const fileInput = document.getElementById('profile_image');
            const file = fileInput.files[0];
            const preview = document.getElementById('profileImagePreview');
            const error = document.getElementById('profileImageError'); // 🔴 This ID must exist in your HTML!

            if (file) {
                const sizeMB = file.size / 1024 / 1024;
                const type = file.type.split('/')[0];

                if (sizeMB > 10) {
                    error.textContent = 'File size must be less than or equal to 10MB.';
                    error.style.display = 'block';
                    fileInput.value = '';
                    preview.style.display = 'none';
                    return false;
                }

                if (type !== 'image') {
                    error.textContent = 'Only image files are allowed.';
                    error.style.display = 'block';
                    fileInput.value = '';
                    preview.style.display = 'none';
                    return false;
                }

                error.textContent = '';
                error.style.display = 'none';
            }

            return true;
        }
    </script>

@endsection
