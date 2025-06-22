<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Pinjaman - Bookify</title>

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
            <h1 class="text-center mb-2">Pinjaman</h1>
            <p class="text-center text-muted mb-5">Daftar buku buku yang kamu pinjam</p>

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="input-group">
                    <form action="{{ route('pinjaman.cari') }}" method="GET" class="d-flex mb-3 col-12">
    <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama buku...">
    <button type="submit" class="btn btn-primary">
     Cari
    </button>
</form>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($pinjaman as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/400x600/888/fff?text={{ urlencode($item->buku->nama_buku) }}"
                            class="card-img-top" alt="Cover Buku">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->buku->nama_buku }}</h5>
                            <p class="card-subtitle mb-2 text-muted">Tanggal Pinjaman : {{ \Carbon\Carbon::parse($item->tgl_pinjaman)->format('d F y') }}</p>
                            <p class="card-subtitle mb-2 text-muted">Tanggal Dikembalikan : {{ \Carbon\Carbon::parse($item->tgl_lambat)->format('d F y') }}</p>
                            <p class="card-subtitle mb-2 text-muted">Denda : Rp. {{ $item->denda }}</p>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
