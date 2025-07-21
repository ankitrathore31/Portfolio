<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font (optional for modern look) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }
        .register-card {
            max-width: 500px;
            margin: 60px auto;
            padding: 30px;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn-primary {
            border-radius: 50px;
            transition: 0.3s ease;
        }
        .btn-primary:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="register-card">

        <div class="text-center mb-4">
            <a href="/">
                <i class="fas fa-user-plus fa-3x text-primary"></i>
            </a>
            <h4 class="mt-2 fw-bold">Create Your Account</h4>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-user me-1"></i> Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            {{-- <div class="mb-3">
                <label for="number" class="form-label"><i class="fas fa-envelope me-1"></i>Mobile no.</label>
                <input id="number" type="number" class="form-control" name="number" value="{{ old('number') }}" required>
            </div> --}}

            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope me-1"></i> Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock me-1"></i> Password</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><i class="fas fa-lock me-1"></i> Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login.page') }}" class="text-muted small">
                    <i class="fas fa-sign-in-alt me-1"></i> Already registered?
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus me-1"></i> Register
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
