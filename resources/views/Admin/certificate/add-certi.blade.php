@extends('Admin.layout.master')

@section('content')
    <div class="main-content">
        <div class="wrapper">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Add Certificate</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
                @if (session('success'))
                    <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('save.certificate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Upload Certificate (Image or PDF)</label>

                            <div id="drop-area" class="border rounded p-4 text-center bg-light" style="cursor: pointer;">
                                <p class="text-muted">Drag & drop files here or click to select</p>
                                <input type="file" name="files[]" id="files" class="d-none" multiple
                                    accept="image/*,.pdf">
                                <button type="button" class="btn btn-outline-primary mt-2"
                                    onclick="document.getElementById('files').click();">Choose Files</button>
                            </div>

                            @error('files')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mt-3" id="file-preview"></div>
                    </div>
                    <div class="col">
                        <label class="form-label">Certificate Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Certificste title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Upload</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('files');
        const previewArea = document.getElementById('file-preview');

        // Drag-over styling
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                dropArea.classList.add('border-primary');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, e => {
                e.preventDefault();
                dropArea.classList.remove('border-primary');
            });
        });

        // Drop event
        dropArea.addEventListener('drop', function(e) {
            e.preventDefault();
            const files = e.dataTransfer.files;
            fileInput.files = files; // Assign to input
            previewFiles(files);
        });

        fileInput.addEventListener('change', function() {
            previewFiles(this.files);
        });

        function previewFiles(files) {
            previewArea.innerHTML = '';
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-3';
                    if (file.type.startsWith('image/')) {
                        col.innerHTML = `
                    <div class="card">
                        <img src="${e.target.result}" class="card-img-top" style="height: 180px; object-fit: cover;">
                    </div>`;
                    } else if (file.type === 'application/pdf') {
                        col.innerHTML = `
                    <div class="card">
                        <embed src="${e.target.result}" type="application/pdf" width="100%" height="180">
                    </div>`;
                    }
                    previewArea.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endsection
