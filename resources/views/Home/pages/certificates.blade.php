@extends('Home.layout.master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <div class="container"> --}}
    <div class="main-content">
        <section class="certificate section" id="certificate">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Certificates</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="certificate-heading padd-15">
                        <h2>My Latest Certificates :</h2>
                        <small><b>Onclick For Full image</b></small>
                    </div>
                </div>

                <div class="row mt-3">
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
        </section>
    </div>
    {{-- </div> --}}
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
