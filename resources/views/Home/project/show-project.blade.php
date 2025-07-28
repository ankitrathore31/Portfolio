@extends('Home.layout.master')
@Section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h3>Project  Deatails</h3>
                </div>
            </div>
            <div class=" project-container mt-2 mb-2">

                <div class="card shadow-lg p-4 print-area">
                    <!-- Report Header -->
                    <div class="text-center mb-4 border-bottom">
                        <h4 class=""><span style="color: blueviolet;">-</span> Project Details <span style="color: blueviolet;">-</span></h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <div class="card border-1 rounded shadow-sm mx-auto d-flex align-items-center justify-content-center"
                                    style="width: 100%; height: 350px; overflow: hidden;">
                                    <img src="{{ asset($project->image) }}" alt="Project Image"
                                        style="max-width: 100%; max-height: 100%; object-fit: contain;" class="rounded">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-2">
                                <div class="col-sm-12 mb-2">
                                    <div class=" p-3 rounded border h-100">
                                        <small class="text-muted">Project Name</small>
                                        <div class="fw-bold text-dark">{{ $project->name }}</div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <div class=" p-3 rounded border h-100">
                                        <small class="text-muted">Live Link</small>
                                        <div class=" text-dark"><a
                                                href="{{ $project->live_link }}" target="_blank">{{ $project->live_link }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <div class=" p-3 rounded border h-100">
                                        <small class="text-muted">Github Link</small>
                                        <div class=" text-dark"><a
                                                href="{{ $project->github_link }}" target="_blank">{{ $project->github_link }}</a></div>
                                    </div>
                                </div>
                                 <div class="col-sm-12 mb-2">
                                    <div class=" p-3 rounded border h-100">
                                        <small class="text-muted">LinkedIn Link</small>
                                        <div class=" text-dark"><a
                                                href="{{-- $project->github_link --}}" target="_blank">{{-- $project->github_link --}}</a></div>
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
