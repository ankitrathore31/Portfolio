@extends('Admin.layout.master')
@Section('content')
    <style>
        @page {
            size: auto;
            margin: 0;
            /* Remove all margins including top */
        }

        @media print {

            html,
            body {
                margin: 0 !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
            }

            body * {
                visibility: hidden;
            }

            .printable,
            .printable * {
                visibility: visible;
            }

            .table th,
            .table td {
                padding: 4px !important;
                font-size: 9px !important;
                border: 1px solid #000 !important;
            }

            .card,
            .table-responsive {
                box-shadow: none !important;
                border: none !important;
                overflow: visible !important;
            }

            .btn,
            .navbar,
            .footer,
            .no-print {
                display: none !important;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }
        }
    </style>

    <div class="main-content">
        <div class="wrapper">
            <div class="container-fluid mt-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Project List</h5>

                    <!-- Breadcrumb aligned to right -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light px-3 py-2 mb-0 rounded">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Project List</li>
                        </ol>
                    </nav>
                </div>
                @if (session('success'))
                    <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <form method="GET" action="{{ route('project.list') }}" class="row g-3 mb-4">
                            <div class="col-md-4 col-sm-6 form-group mb-3">
                                <input type="text" name="name_filter" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Search by name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary me-2">Search</button>
                                <a href="{{ route('project.list') }}" class="btn btn-info text-white me-2">Reset</a>
                                <button onclick="printTable()" class="btn btn-primary me-2">Print Table</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center no-print">
                        <a href="{{ route('add.project') }}" class="btn btn-success btn-sm">+ Add Project</a>
                    </div>
                    <div class="card-body table-responsive printable">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>Sr. No.</th>
                                    {{-- <th>Project Image</th> --}}
                                    <th>Project Name</th>
                                    <th>Github Link</th>
                                    <th>Live Link</th>
                                    <th class="no-print">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>
                                            <img src="{{ asset($item->image) }}" alt="image"
                                                class="img-thumbnail" width="80">
                                        </td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td><a href="{{ $item->github_link }}">{{ $item->github_link }}</a></td>
                                        <td><a href="{{ $item->live_link }}">{{ $item->live_link }}</a></td>
                                        <td class="no-print">
                                                <a href="{{ route('view.project', $item->id) }}" class="btn btn-sm me-2 btn-success"
                                                    title="View">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('edit.project', $item->id) }}" class="btn btn-sm me-2 btn-primary"
                                                    title="Edit">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('delete.project', $item->id) }}" 
                                                    onclick="return confirm('Do you want delete project')" class="btn btn-sm me-2 btn-danger"
                                                    title="Delete">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printTable() {
            window.print();
        }
    </script>
@endsection
