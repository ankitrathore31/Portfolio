@extends('Admin.layout.master')

@section('content')
    <div class="main-content">
        <div class="wrapper">
            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Certificate List</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Certificate</li>
                        </ol>
                    </nav>
                </div>
                @if (session('success'))
                    <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    @foreach ($cert as $file)
                        @php
                            $extension = strtolower(pathinfo($file->file_path, PATHINFO_EXTENSION));
                            $fileUrl = asset($file->file_path);
                        @endphp

                        <div class="col-md-3 mb-4">
                            <div class="card">

                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp']))
                                    <img src="{{ $fileUrl }}" class="card-img-top img-thumbnail"
                                        style="height: 200px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#previewModal" onclick="showPreview('{{ $fileUrl }}')"
                                        alt="Certificate Image">
                                @elseif ($extension === 'pdf')
                                    <div class="d-flex justify-content-center align-items-center"
                                        style="height: 200px; background: #f8f9fa; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#previewModal" onclick="showPreview('{{ $fileUrl }}')">
                                        <i class="bi bi-file-earmark-pdf" style="font-size: 3rem; color: red;"></i>
                                    </div>
                                @endif

                                <div class="card-body text-center">
                                    <span class="m-1">Title: {{ $file->title }}</span><br>
                                    <a href="{{ route('delete.certificate', $file->id) }}"
                                        onclick="return confirm('Are you sure to delete this Certificate?');"
                                        class="btn btn-sm btn-danger mt-2">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Modal -->
                <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Preview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center" id="modalPreviewContent" style="min-height: 500px;">
                                <!-- Preview content loaded via JS -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        function showPreview(fileUrl) {
            const modalContent = document.getElementById('modalPreviewContent');
            const extension = fileUrl.split('.').pop().toLowerCase();

            if (['jpg', 'jpeg', 'png', 'webp'].includes(extension)) {
                modalContent.innerHTML = `<img src="${fileUrl}" class="img-fluid" style="max-height: 90vh;">`;
            } else if (extension === 'pdf') {
                modalContent.innerHTML = `
                <embed src="${fileUrl}" type="application/pdf" width="100%" height="600px">
            `;
            } else {
                modalContent.innerHTML = `<p class="text-danger">Preview not supported for this file type.</p>`;
            }
        }
    </script>
@endsection
