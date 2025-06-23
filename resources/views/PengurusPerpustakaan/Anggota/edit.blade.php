<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota - Bookify Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            background-color: #f8f9fa
        }

        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #343a40;
            padding-top: 1rem;
            flex-shrink: 0
        }

        .sidebar .nav-link {
            color: #adb5bd;
            font-size: 1rem;
            padding: .75rem 1.5rem
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #495057
        }

        .sidebar .nav-link .bi {
            margin-right: .75rem
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            height: 100vh
        }

        .content-container {
            flex-grow: 1;
            overflow-y: auto;
            padding: 1.5rem
        }
    </style>
</head>

<body>
    <x-sidebar-admin></x-sidebar-admin>

    {{-- Konten Utama --}}
    <div class="main-content">
        <x-topbar-admin></x-topbar-admin>
        <main class="content-container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Form Edit Data Anggota</h6>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pengurus.anggota.update', $anggota->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_anggota" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_anggota" class="form-control"
                                    value="{{ old('nama_anggota', $anggota->nama_anggota) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $anggota->email) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control"
                                    value="{{ old('no_hp', $anggota->no_hp) }}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $anggota->alamat) }}</textarea>
                            </div>
                            <hr class="my-3">
                            <div class="col-12">
                                <p class="text-muted">Ganti Password (opsional)</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Kosongkan jika tidak diubah">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="col-12 text-end">
                                <a href="{{ route('pengurus.anggota.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
