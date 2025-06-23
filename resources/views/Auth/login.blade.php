<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5; /* Light gray background */
        }
        .card {
            border-radius: 15px; /* Rounded corners for the card */
            overflow: hidden; /* Ensures shadow is within bounds */
        }
        .card-header {
            background-color: #007bff; /* Blue header */
            color: white; /* White text for header */
            border-bottom: none; /* Remove default border */
            padding: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 1rem;
            font-size: 1.1rem;
            border-radius: 8px; /* Rounded buttons */
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control {
            border-radius: 8px; /* Rounded input fields */
            padding: 0.75rem 1rem;
        }
        .alert {
            border-radius: 8px;
        }
        .text-center a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card shadow-lg"> <div class="card-header text-center">
                        <h3>Login Perpustakaan</h3>
                    </div>
                    <div class="card-body p-4"> @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0"> @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="mb-4"> <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
