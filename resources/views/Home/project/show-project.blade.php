@extends('Home.layout.master')
@Section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-3 m-2">
            <h5 class="mb-0">Project View</h5>

            <!-- Breadcrumb aligned to right -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                    <li class="breadcrumb-item"><a href="{{ route('project.list') }}">Project List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project</li>
                </ol>
            </nav>
        </div>
        <div class="container my-5">

            <div class="card shadow-lg p-4 print-area bg-white rounded-4">
                <!-- Report Header -->
                <div class="text-center mb-4 border-bottom pb-2">
                    <h4 class="fw-bold text-primary">— Project View —</h4>
                </div>

                <div class="row">
                    <!-- Project Image -->
                    <div class="col-md-6 mb-4">
                        <div
                            class="card border-0 shadow-sm h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset($project->image) }}" alt="Project Image" class="img-fluid rounded"
                                style="max-height: 320px; object-fit: contain;">
                        </div>
                    </div>

                    <!-- Project Details -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <small class="text-muted">Project Name</small>
                            <div class="fw-semibold fs-5">{{ $project->name }}</div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">Live Link</small>
                            <div>
                                <a href="{{ $project->live_link }}" target="_blank"
                                    class="fw-semibold text-primary text-decoration-underline">
                                    {{ $project->live_link }}
                                </a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">GitHub Link</small>
                            <div>
                                <a href="{{ $project->github_link }}" target="_blank"
                                    class="fw-semibold text-primary text-decoration-underline">
                                    {{ $project->github_link }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Description Section -->
                <div class="row mt-4">
                    <div class="col-12 mb-3">
                        <small class="text-muted">Project Highlight</small>
                        <div class="fw-semibold text-dark bg-light p-3 rounded border">
                            {{ $project->keyword }}
                        </div>
                    </div>

                    <div class="col-12">
                        <small class="text-muted">Project Description</small>
                        <div class="fw-semibold text-dark bg-light p-3 rounded border">
                            {{ $project->description }}
                        </div>
                    </div>
                </div>
            </div>


            <!-- Action Buttons -->
            <div class="text-center mt-5 no-print">
                <button class="btn btn-primary me-2" onclick="window.print()">🖨️ Print </button>
            </div>
        </div>

        <!-- Print Styles -->
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }

                .print-area,
                .print-area * {
                    visibility: visible;
                }

                .print-area {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    padding: 0;
                    box-shadow: none;
                }

                .no-print {
                    display: none !important;
                }
            }
        </style>
    </div>
@endsection
