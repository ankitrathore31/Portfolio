<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
        }

        .left-panel {
            background-color: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            animation: slideIn 1.2s ease-out;
        }

        .left-panel h1 {
            font-size: 2.5rem;
        }

        .left-panel i {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        .right-panel {
            padding: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1.2s ease-in;
        }

        .right-panel {
            opacity: 0;
            transform: translateY(50px);
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Left side (branding) -->
            <div class="col-md-6 d-none d-md-flex left-panel">
                <i class="bi bi-person-circle"></i>
                <h1>Welcome to Portfolio</h1>
                <p class="text-light text-center">Please login to continue exploring the dashboard</p>
            </div>

            <!-- Right side (login form) -->
            <div class="col-md-6 col-12 right-panel">
                <div class="w-100" style="max-width: 400px;">
                    @if (session('success'))
                        <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 class="mb-4 text-center">Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>

                        @if (Route::has('password.forgot'))
                            <div class="text-center mt-3">
                                <a class="btn btn-link" href="{{ route('password.forgot') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif

                        <!-- Create Account -->
                        <div class="create-account mt-1">
                            <p>Don't have an account? <a href="{{ route('register.show') }}" class="text-primary">Sign Up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons (for the animated icon) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        const loginForm = document.querySelector("form");
        const formContainer = document.querySelector(".right-panel");

        if (formContainer) {
            formContainer.style.opacity = "0";
            formContainer.style.transform = "translateY(50px)";

            // Animate after a short delay
            setTimeout(() => {
                formContainer.style.transition = "all 0.6s ease";
                formContainer.style.opacity = "1";
                formContainer.style.transform = "translateY(0)";
            }, 100);
        }

        if (loginForm) {
            loginForm.addEventListener("submit", function(e) {
                // Optional: Add simple animation on submit
                loginForm.style.opacity = "0.5";
                loginForm.style.transition = "opacity 0.3s ease";
            });
        }
    </script>


</body>

</html>
