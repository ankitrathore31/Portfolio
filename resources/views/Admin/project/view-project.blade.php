@extends('Admin.layout.master')
@Section('content')
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-3 m-2">
            <h5 class="mb-0">Project Report</h5>

            <!-- Breadcrumb aligned to right -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                    <li class="breadcrumb-item"><a href="{{ route('project.list') }}">Project List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project</li>
                </ol>
            </nav>
        </div>
        <div class="container my-5">

            <div class="card shadow-lg p-4 print-area">
                <!-- Report Header -->
                <div class="text-center mb-4 border-bottom">
                    <h4 class="fw-bold text-primary">- Project View -</h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <div class="card border-1 rounded shadow-sm mx-auto d-flex align-items-center justify-content-center"
                                style="width: 100%; height: 350px; background-color: #f8f9fa; overflow: hidden;">
                                <img src="{{ asset($project->image) }}" alt="Project Image"
                                    style="max-width: 100%; max-height: 100%; object-fit: contain;" class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row mb-2">
                            <div class="col-sm-12 mb-2">
                                <div class="bg-light p-3 rounded border h-100">
                                    <small class="text-muted">Project Name</small>
                                    <div class="fw-bold text-dark"><strong>{{ $project->name }}</strong></div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="bg-light p-3 rounded border h-100">
                                    <small class="text-muted">Live Link</small>
                                    <div class="fw-bold text-dark"><strong><a
                                                href="{{ $project->live_link }}">{{ $project->live_link }}</a></strong>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="bg-light p-3 rounded border h-100">
                                    <small class="text-muted">Github Link</small>
                                    <div class="fw-bold text-dark"><strong><a
                                                href="{{ $project->live_link }}">{{ $project->name }}</a></strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Details Section -->
                <div class="row g-4">

                    <div class="col-sm-12 mb-2">
                        <div class="bg-light p-3 rounded border h-100">
                            <small class="text-muted">Project Highlight</small>
                            <div class="fw-bold text-dark"><b>{{ $project->keyword }}</b></div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-2">
                        <div class="bg-light p-3 rounded border h-100">
                            <small class="text-muted">Project Description</small>
                            <div class="fw-bold text-dark"><b>{{ $project->description }}</b></div>
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
