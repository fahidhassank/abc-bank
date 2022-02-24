<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ABC Bank</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="bg-light">
    <div id="app">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h3 class="mb-4 fw-bold">ABC BANK</h3>
            <div class="card" id="auth-card">
                <div class="card-body p-5">
                    <h5 class="mb-4">Login to your account</h5>
                    <form action="/login" id="login-form" method="post">
                        @csrf
                        <div class="mb-4">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-block" type="submit" id="submit-btn">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <small class="text-muted mt-4">Don't have an account yet? <a href="{{ route('register') }}" class="text-primary">Sign Up</a></small>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $("#login-form").submit(function(event) {
            $("#submit-btn").prop('disabled', true);
        })
    </script>
</body>

</html>
