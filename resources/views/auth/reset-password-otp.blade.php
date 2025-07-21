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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
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
    <div class="container my-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Enter OTP & Reset Password</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="card-body">
                <form method="POST" action="{{ route('password.otp.reset') }}">
                    @csrf
                    <div class="mb-3">
                        <label>OTP</label>
                        <input type="text" name="otp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
