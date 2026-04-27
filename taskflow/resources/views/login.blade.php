<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #0d6efd, #6f42c1);
            height: 100vh;
        }

        .login-card {
            max-width: 420px;
            width: 100%;
            border-radius: 15px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="card shadow-lg login-card">

        <div class="card-body p-4">

            <h3 class="text-center mb-4">Login</h3>

            <form method="POST" action="#">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <!-- Remember -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                        Remember me
                    </label>
                </div>

                <!-- Button -->
                <button class="btn btn-primary w-100">
                    Login
                </button>

            </form>

            <p class="text-center mt-3 mb-0">
                Don't have an account? <a href="#">Sign up</a>
            </p>

        </div>
    </div>

</body>
</html>