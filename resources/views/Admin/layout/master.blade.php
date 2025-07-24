<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome 6 (Free version) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #eaedf7;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
            transition: box-shadow 0.3s ease;
            /* z-index: 1030; */
        }

        .navbar.scrolled {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            color: #555;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #000;
        }

        .dropdown-menu {
            animation: dropdownFade 0.3s ease;
        }

        /* Avatar wrapper for "Me" menu */
        .me-avatar .avatar-wrapper {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            /* border: 2px solid #ddd; */
            transition: border-color 0.3s ease;
        }

        .me-avatar .avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .me-avatar:hover .avatar-wrapper {
            border-color: #007bff;
        }


        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .search-box {
            border-radius: 999px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            width: 300px;
            margin-left: 10px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            margin-left: 8px;
        }

        /* Me avatar */
        .nav-item.me .nav-link img {
            border: 2px solid #eee;
            transition: border-color 0.3s;
        }

        .nav-item.me .nav-link:hover img {
            border-color: #007bff;
        }

        /* Responsive menu toggle */
        .menu-items {
            transition: transform 0.3s ease;
        }

        .i {
            width: 12px;
        }

        @media (max-width: 767.98px) {
            .menu-items {
                flex-direction: column;
                position: absolute;
                top: 56px;
                left: 0;
                width: 100%;
                background-color: #fff;
                border-top: 1px solid #eee;
                transform: translateY(-200%);
                z-index: 1020;
            }

            .menu-items.show {
                transform: translateY(0);
            }

            .navbar .navbar-nav {
                border-left: 3px solid #f1f1f1;
            }

            .search-box {
                display: none;
            }
        }
    </style>

    <script>
        // Add scroll shadow on navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            navbar.classList.toggle('scrolled', window.scrollY > 0);
        });
    </script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="d-flex flex-grow-1 align-items-center">

            <!-- Logo and Toggle -->
            <a class="navbar-brand d-flex align-items-center me-3 text-decoration-none me-avatar" href="#">
                <div class="avatar-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Akki">
                </div>
                <small class="ms-2 d-none d-md-inline"><strong>{{ Auth()->user()->name }}</strong></small>
            </a>

            <!-- Toggle Button (mobile only) -->
            <button class="navbar-toggler d-md-none ms-auto" type="button" id="menuToggle">
                <i class="bi bi-list fs-2"></i>
            </button>

            <!-- Search Bar (hidden on small screens) -->
            <form class="search-box me-auto d-none d-md-flex">
                <input type="text" class="form-control" placeholder="Search">
            </form>
        </div>

        <!-- Nav Menu -->
        <ul class="navbar-nav d-md-flex flex-row align-items-center menu-items px-2 border-start" id="mainMenu">
            <!-- Dashboard -->
            <li class="nav-item mx-2">
                <a class="nav-link active text-center" href="{{ route('admin') }}">
                    <i class="bi bi-speedometer2 fs-5"></i><br><span>Dashboard</span>
                </a>
            </li>

            <!-- Project -->
            <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle text-center" href="#" id="projectDropdown"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-kanban fs-5"></i><br><span>Project</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('add.project') }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Project
                        </a></li>
                    <li><a class="dropdown-item" href="{{ route('project.list') }}">
                            <i class="bi bi-list-check me-2"></i>Project List
                        </a></li>
                </ul>
            </li>

            <!-- Certificate -->
            <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle text-center" href="#" id="certificateDropdown"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-award fs-5"></i><br><span>Certificate</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('add.certificate') }}">
                            <i class="bi bi-plus-circle me-2"></i>Add Certificate
                        </a></li>
                    <li><a class="dropdown-item" href="{{ route('list.certificate') }}">
                            <i class="bi bi-collection me-2"></i>Certificate List
                        </a></li>
                </ul>
            </li>

            {{-- Email  --}}
            <li class="nav-item mx-2">
                <a class="nav-link text-center" href="{{ route('email.list') }}">
                    <i class="bi bi-envelope fs-5"></i><br><span>Email</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item dropdown mx-2">
                <a class="nav-link dropdown-toggle text-center" href="#" id="settingsDropdown"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-gear fs-5"></i><br><span>Setting</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('site.setting') }}">
                            <i class="bi bi-sliders me-2"></i>Site Setting
                        </a></li>
                </ul>
            </li>

            <li class="nav-item dropdown mx-2">
                <button class="btn btn-light position-relative" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <!-- Font Awesome bell icon -->
                    <i class="bi bi-bell"></i>
                    <!-- Optional badge -->
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">unread notifications</span>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach (limit_email_list() as $item)
                    <li><a class="dropdown-item" href="{{route('view.email',$item->id)}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <!-- Me -->
            <li class="nav-item dropdown mx-2 me">
                <a class="nav-link dropdown-toggle text-center me-avatar" href="#" id="meDropdown"
                    data-bs-toggle="dropdown">
                    <div class="avatar-wrapper mx-auto">
                        <img src="{{ asset('images/image.jpg') }}" alt="Me">
                    </div>
                    <span>Me</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile') }}"><i
                                class="bi bi-person me-2"></i>Profile</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('change.pass.show') }}"><i
                                class="bi bi-key me-2"></i>Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger"><i
                                    class="bi bi-box-arrow-right me-2"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div style="margin-top: 80px;">
        @yield('content')
    </div>

    <script>
        const toggleBtn = document.getElementById('menuToggle');
        const menuItems = document.getElementById('mainMenu');

        toggleBtn.addEventListener('click', () => {
            menuItems.classList.toggle('show');
        });
    </script>


</body>

</html>
