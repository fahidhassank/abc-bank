<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ABC Bank</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="bg-light">
    <div id="app">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h3 class="mb-4 fw-bold">ABC BANK</h3>
            <div class="card" id="auth-card">
                <div class="card-body">
                    <h5 class="mb-4">Create new account</h5>
                    <form action="/register" id="register-form" method="post">
                        @csrf
                        <div class="mb-4">
                            <label>Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Enter name" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-4">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @else
                                <small class="text-muted d-block">Use 8 or more characters with a mix of letters, numbers & symbols</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="terms" id="terms" required @if (old('terms')) checked @endif>
                                <label class="form-check-label" for="terms">
                                    Agree the <a href="#" target="/terms-and-conditions">terms and policy</a>
                                </label>
                            </div>
                            @error('terms')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-block" type="submit" id="submit-btn">Create new account</button>
                        </div>
                    </form>
                </div>
            </div>
            <small class="text-muted mt-4">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign in</a></small>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $("#register-form").submit(function(event) {
            $("#submit-btn").prop('disabled', true);
        })
    </script>
</body>

</html>
