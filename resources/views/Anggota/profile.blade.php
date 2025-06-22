<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Profile - Bookify</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            display: flex;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 280px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            /* Warna gelap untuk sidebar */
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            /* Warna teks link */
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            /* Warna teks saat aktif/hover */
            background-color: #495057;
        }

        .sidebar .nav-link .bi {
            margin-right: 0.75rem;
        }

        .main-content {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 0;
        }

        .navbar-admin {
            width: 100%;
        }

        .card .border-start-primary {
            border-left: .25rem solid #4e73df !important;
        }

        .card .border-start-success {
            border-left: .25rem solid #1cc88a !important;
        }

        .card .border-start-info {
            border-left: .25rem solid #36b9cc !important;
        }

        .card .border-start-danger {
            border-left: .25rem solid #e74a3b !important;
        }

        .text-gray-300 {
            color: #dddfeb !important;
        }

        .text-gray-800 {
            color: #5a5c69 !important;
        }

        .text-xs {
            font-size: .8rem;
        }
    </style>
</head>

<body>
    <x-sidebar-anggota></x-sidebar-anggota>
    <div class="main-content">
        <x-topbar></x-topbar>

         <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Form Profile Anggota
                        </div>

                        <form method="POST" action="{{ route('anggota.profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @session('success')
                                <div class="alert alert-success">
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                </div>
                                @endsession

                                @session('warning')
                                <div class="alert alert-warning">
                                    <strong>Peringatan!</strong> {{ session('warning') }}
                                </div>
                                @endsession

                                <!-- Nama Anggota -->
                                <div class="form-group row mb-4">
                                    <label for="nama_anggota" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input id="nama_anggota" type="text" 
                                            class="form-control @error('nama_anggota') is-invalid @enderror" 
                                            name="nama_anggota" 
                                            value="{{ old('nama_anggota', $data['anggota']['nama_anggota'] ?? '') }}" 
                                            autocomplete="name" autofocus
                                        >
                                        @error('nama_anggota')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="form-group row mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email', $data['anggota']['email'] ?? '') }}" 
                                            autocomplete="email"
                                        >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Nomor HP -->
                                <div class="form-group row mb-4">
                                    <label for="no_hp" class="col-md-4 col-form-label text-md-right">Nomor HP/WhatsApp</label>
                                    <div class="col-md-6">
                                        <input id="no_hp" type="tel" 
                                            class="form-control @error('no_hp') is-invalid @enderror" 
                                            name="no_hp" 
                                            value="{{ old('no_hp', $data['anggota']['no_hp'] ?? '') }}"
                                        >
                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="form-group row mb-4">
                                    <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat Lengkap</label>
                                    <div class="col-md-6">
                                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat', $data['anggota']['alamat'] ?? '') }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Ganti Password --}}
                                <hr>
                                <h6>Ganti Password <i>(jika ingin diubah)</i></h6>

                                <div class="form-group row mb-4">
                                    <label for="old_password" class="col-md-4 col-form-label text-md-right">Password Lama</label>
                                    <div class="col-md-6">
                                        <input id="old_password" type="password" 
                                            class="form-control @error('old_password') is-invalid @enderror" 
                                            name="old_password"
                                        >
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password"
                                        >
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Password Baru</label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" 
                                            class="form-control" 
                                            name="password_confirmation"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
