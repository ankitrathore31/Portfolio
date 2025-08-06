@extends('Admin.layout.master')
@section('content')
    <style>
        .dashboard-card {
            background: linear-gradient(to right, #dbe5eb, #1681ec);
            /* Adjust gradient colors */
            border-radius: 0.5rem;
            height: 100%;
            transition: transform 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Add subtle shadow */
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            /* Adjust hover effect */
        }

        .dashboard-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .dashboard-avatar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
            /* Optional: add a border around avatar */
        }

        .dashboard-label {
            font-weight: 600;
            font-size: 0.95rem;
            color: #343a40;
            /* Darker label color */
            margin-bottom: 0.5rem;
            /* Adjust spacing */
        }

        .dashboard-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: #0d6efd;
            /* Accent color for values */
        }
    </style>

    <div class="main-content">
        <div class="wrapper">
            <div class="container my-4">
                <div class="row g-4">
                    <!-- User Info Card -->
                    <div class="col-md-4">
                        <div class="card dashboard-card shadow-sm p-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="dashboard-avatar me-3">
                                        <img src="{{ asset('images/image.jpg') }}" alt="Akki">
                                    </div>
                                    <div>
                                        <div class="dashboard-label">{{ Auth()->user()->name }}</div>
                                        <div class="text-muted small">{{ Auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total Projects Card -->
                    <div class="col-md-4">
                        <div class="card dashboard-card shadow-sm p-3 ">
                            <div class="card-body">
                                <h6 class=" mb-3"><strong>Projects</strong></h6>
                                <ul class="list-unstyled mb-0">
                                    <li><span class="dashboard-label">Total Projects:</span> <span
                                            class="dashboard-value">&nbsp; {{ total_project() }}</span></li>
                                    {{-- <li><span class="dashboard-label">This Month:</span> <span
                                            class="dashboard-value">&nbsp; {{ This_Month_Projects() }}</span></li> --}}
                                    <li><span class="dashboard-label">This Year:</span> <span class="dashboard-value">&nbsp;
                                            {{ This_Year_Projecrs() }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Total Certificates Card -->
                    <div class="col-md-4">
                        <div class="card dashboard-card shadow-sm p-3">
                            <div class="card-body">
                                <h6 class=" mb-3"><strong>Certificates</strong></h6>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <span class="dashboard-label">Total: </span><span class="dashboard-value">&nbsp;
                                            {{ total_certificates() }}</span>
                                    </li>
                                    <li>
                                        <span class="dashboard-label">This Year: </span><span class="dashboard-value">&nbsp;
                                            {{ This_Year_Certifictaes() }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container my-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <!-- Chart -->
                        <div class="card shadow-sm p-3">
                            <div class="card-body">
                                <h6 class="mb-3"><strong>Website Traffic Chart</strong></h6>
                                <canvas id="trafficChart" style="max-height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <!-- Dashboard Card -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card shadow-sm p-3 mb-3">
                                    <div class="card-body">
                                        <h6 class="mb-3"><strong>Website Traffic</strong></h6>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <span class="dashboard-label">Total Visitor: </span><span
                                                    class="dashboard-value">&nbsp;{{ total_vistior() }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card shadow-sm p-3 mb-3">
                                    <div class="card-body">
                                        <h6 class="mb-3"><strong>Today Traffic</strong></h6>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <span class="dashboard-label">Today Visitor: </span><span
                                                    class="dashboard-value">&nbsp;{{ today_visitor() }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-4">
                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-md-6 mb-4">
                        <canvas id="barChart" style="background-color: #fff" style="max-height: 300px;"></canvas>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card-body table-responsive printable">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Project Name</th>
                                        <th>Github Link</th>
                                        <th>Live Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (limit_project() as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><a href="{{ $item->github_link }}">{{ $item->github_link }}</a></td>
                                            <td><a href="{{ $item->live_link }}">{{ $item->live_link }}</a></td>
                                            <td><a href="{{ route('view.project', $item->id) }}"
                                                    class="btn btn-sm me-2 btn-success" title="View">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container my-4">
                    <div class="row">
                        <!-- Line Chart -->
                        <div class="col-md-6 mb-4">
                            <canvas id="lineChart" style="background-color: #fff" style="max-height: 300px;"></canvas>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card-body table-responsive printable">
                                <table class="table table-bordered table-hover align-middle text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (limit_email_list() as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td><a href="{{ route('view.email', $item->id) }}"
                                                        class="btn btn-sm me-2 btn-success" title="View">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const projectData = @json(getMonthProjectCount());

        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Projects Created',
                    data: projectData,
                    backgroundColor: '#0d6efd',
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Sample data for line chart
        const EmailData = @json(getMonthEmailCount());
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Emails',
                    data: EmailData,
                    fill: false,
                    borderColor: '#198754',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        window.onload = function() {
            const canvas = document.getElementById('trafficChart');
            if (!canvas || canvas.tagName.toLowerCase() !== 'canvas') {
                console.error("'trafficChart' is not a canvas element.");
                return;
            }

            const visitorData = @json(monthly_visitors());

            const ctx = canvas.getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Monthly Visitors',
                        data: visitorData,
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        };
    </script>
@endsection
