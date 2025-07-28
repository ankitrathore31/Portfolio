@extends('Admin.layout.master')
@Section('content')
    <style>
        /* Container styling */
        .project-container {
            background: #f9fbfd;
            padding: 25px;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            color: #2d3436;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        /* Titles & Subtitles */
        .project-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .project-sub-title {
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.4;
        }

        .project-info {
            font-size: 0.95rem;
            margin-top: 8px;
        }

        /* Section Titles (Mission, Conclusion) */
        .section-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 8px;
            border-left: 4px solid blueviolet;
            padding-left: 10px;
            color: #2c3e50;
        }

        /* Section Content */
        .section-text {
            font-size: 1rem;
            background: #ffffff;
            padding: 12px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
        }

        /* Normal screen styles remain as you already defined */
    </style>
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
        <div class=" project-container mt-2 mb-2">

            <div class="card shadow-lg p-4 print-area">
                <!-- Report Header -->
                <div class="text-center mb-4 border-bottom">
                    <h4 class="fw-bold text-primary">- Project View -</h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            @php
                                $images = json_decode($project->images, true);
                            @endphp

                            @if ($images && count($images) > 0)
                                <div id="projectCarousel{{ $project->id }}" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="2000" style="width:100%; height:350px; overflow:hidden;">
                                    <div class="carousel-inner">
                                        @foreach ($images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($image) }}" class="d-block w-100 rounded"
                                                    style="object-fit: contain; max-height:350px;" alt="slide images">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#projectCarousel{{ $project->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#projectCarousel{{ $project->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row mb-2">
                            <div class="col-sm-12 mb-2">
                                <div class="bg-light p-3 rounded border h-100">
                                    <small class="text-muted">Project Name</small>
                                    <div class="fw-bold text-dark">{{ $project->name }}</div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="bg-light p-3 rounded border h-100">
                                    <small class="text-muted">Live Link</small>
                                    <div class="fw-bold text-dark"><a
                                            href="{{ $project->live_link }}">{{ $project->live_link }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="bg-light p-3 rounded border h-100">
                                    <small class="text-muted">Github Link</small>
                                    <div class="fw-bold text-dark"><a
                                            href="{{ $project->github_link }}">{{ $project->github_link }}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="section-title">
                    <span>Project Highlight</span>
                </h5>
                <p class="section-text">{{ $project->keyword ?? 'N/A' }}</p>

                <h5 class="section-title">
                    <span>Project Description</span>
                </h5>
                <p class="section-text">{{ $project->description ?? 'N/A' }}</p>
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
        <style>
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                filter: invert(1);
                /* Turns white to black */
            }
        </style>
    </div>
@endsection
