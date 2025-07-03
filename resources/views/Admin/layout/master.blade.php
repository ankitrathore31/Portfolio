<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">

    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {

            background-color: #E6EBEE;

        }
        .sidebar {

            position: fixed;

            top: 0;

            left: 0;

            width: 250px;

            height: 100vh;

            /* Adjust height as needed */

            background-color: blueviolet;

            /* Dark background color */

            padding-top: 20px;

            z-index: 1000;

            overflow-y: auto;

            transition: all 0.3s ease;

            scroll-snap-type: none;

        }



        .sidebar .nav-link {

            color: white;

            /* Light text color */

            font-size: 14px;

            font-weight: 600;

            margin-bottom: 15px;

            border-bottom: 1px solid #374151;

            /* Darker border */

            transition: background-color 0.3s ease;

        }



        .sidebar .nav-link:hover {

            background-color: #4D44B5;

            /* Darker background on hover */

        }



        .sidebar .dropdown-menu {

            background-color: #4D44B5;

            /* Dark dropdown background */

        }



        .sidebar .dropdown-item {

            color: white;

            /* Light text color */

        }



        .sidebar .dropdown-item:hover {

            background-color: #374151;

            /* Darker background on hover */

        }



        .main-content {

            margin-left: 250px;

            padding: 20px;

            /* background-color: #E6EBEE; */

            /* Light content background */

        }



        .open-sidebar-btn {

            display: none;

            position: fixed;

            top: 10px;

            left: 8px;

            background-color: #1f2937;

            /* Dark button background */

            color: #d1d5db;

            /* Light button text color */

            border: none;

            padding: 5px 15px;

            font-size: 18px;

            border-radius: 5px;

            z-index: 1100;

        }



        @media (max-width: 991px) {

            .sidebar {

                left: -100%;

                transition: all 0.3s ease;

            }



            .sidebar.active {

                left: 0;

            }



            .main-content {

                margin-left: 0;

            }



            .open-sidebar-btn {

                display: block;

            }

        }
    </style>

</head>
<body>

    <div class="main-content">

        <!-- Top Navigation Bar -->
        <div class="container-fluid text-white py-2 bg-white">
            <div class="row align-items-center">
                <div class="col-md-4 text-start">
                    <h5 class="text-black" style="color: black;">Admin</h5>
                </div>
                <div class="col-md-8 text-end d-flex justify-content-end align-items-center">
                    <div class="dropdown me-3">
                        <button class="btn btn-light position-relative" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <!-- Font Awesome bell icon -->
                            <i class="fas fa-bell"></i>
                            <!-- Optional badge -->
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                                <span class="visually-hidden">unread notifications</span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">New message from Admin</a></li>
                            <li><a class="dropdown-item" href="#">Project deadline approaching</a></li>
                            <li><a class="dropdown-item" href="#">System update at 3 PM</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="change_password.php"><i class="fas fa-key"></i> Change
                                    Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="logout.php"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar --}}
    @include('Admin.sidebar.sidebar')

    {{-- Main Content --}}
    @yield('content')

</body>

</html>
