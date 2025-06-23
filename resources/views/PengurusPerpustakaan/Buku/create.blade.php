<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bookify</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    <x-sidebar-admin></x-sidebar-admin>
    <div class="main-content">
        <x-topbar-admin></x-topbar-admin>

        <main class="container-fluid">
            <div class="container">
    <h1>Tambah Buku Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengurus.buku.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama_buku" class="form-label">Nama Buku:</label>
                <input type="text" name="nama_buku" class="form-control" placeholder="Nama Buku" value="{{ old('nama_buku') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="penerbit" class="form-label">Penerbit:</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ old('penerbit') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" name="isbn" class="form-control" placeholder="ISBN" value="{{ old('isbn') }}">
            </div>
             <div class="col-md-6 mb-3">
                <label for="edisi" class="form-label">Edisi:</label>
                <input type="text" name="edisi" class="form-control" placeholder="Edisi" value="{{ old('edisi') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="lokasi_buku" class="form-label">Lokasi Buku:</label>
                <input type="text" name="lokasi_buku" class="form-control" placeholder="Contoh: Rak A1" value="{{ old('lokasi_buku') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="status_buku" class="form-label">Status Buku:</label>
                <select name="status_buku" class="form-select">
                    <option value="Tersedia" {{ old('status_buku') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Dipinjam" {{ old('status_buku') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Hilang" {{ old('status_buku') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
            </div>
             <div class="col-md-12 mb-3">
                <label for="sinopsis" class="form-label">Sinopsis:</label>
                <textarea class="form-control" style="height:150px" name="sinopsis" placeholder="Sinopsis">{{ old('sinopsis') }}</textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('pengurus.buku.index') }}"> Batal</a>
            </div>
        </div>
    </form>
</div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
