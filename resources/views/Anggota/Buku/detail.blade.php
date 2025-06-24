<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Dashboard - Bookify</title>

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
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
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
        <x-topbar-admin></x-topbar-admin>


        <div class="container my-5">
            <div class="row g-5">
                <div class="col-md-4">
                    <img src="https://placehold.co/400x600/888/fff?text={{ urlencode($buku->nama_buku) }}"
                        class="img-fluid rounded shadow-lg w-100" alt="Cover Buku {{ $buku->nama_buku }}">
                </div>

                <div class="col-md-8">
                    <h1>{{ $buku->nama_buku }}</h1>

                    @if ($buku->status_buku == 'Tersedia')
                        <span class="badge bg-success fs-6">Tersedia</span>
                    @else
                        <span class="badge bg-danger fs-6">Dipinjam</span>
                    @endif

                    <hr>

                    <p class="lead">{{ $buku->sinopsis }}</p>

                    <h4 class="mt-4">Detail Informasi</h4>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 200px;">Penerbit</th>
                                <td>{{ $buku->penerbit }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Edisi</th>
                                <td>{{ $buku->edisi }}</td>
                            <tr>
                                <th scope="row">Lokasi Buku</th>
                                <td>{{ $buku->lokasi_buku }}</td>
                            </tr>
                            <tr>
                                <th scope="row">ISBN</th>
                                <td>{{ $buku->isbn }}</td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('anggota.buku') }}" class="btn btn-lg btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
