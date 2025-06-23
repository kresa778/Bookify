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
                <h1>Detail Buku</h1>

                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Nama Buku:</strong>
                            <p>{{ $buku->nama_buku }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Penerbit:</strong>
                            <p>{{ $buku->penerbit }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>ISBN:</strong>
                            <p>{{ $buku->isbn }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Edisi:</strong>
                            <p>{{ $buku->edisi ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Lokasi Buku:</strong>
                            <p>{{ $buku->lokasi_buku }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Status Buku:</strong>
                            <p><span class="badge bg-info">{{ $buku->status_buku }}</span></p>
                        </div>
                        <div class="mb-3">
                            <strong>Sinopsis:</strong>
                            <p>{{ $buku->sinopsis ?? 'Tidak ada sinopsis.' }}</p>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary mt-3" href="{{ route('pengurus.buku.index') }}">Kembali</a>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>