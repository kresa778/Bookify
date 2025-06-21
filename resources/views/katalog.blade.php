<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            /* Warna latar belakang abu-abu muda */
        }

        .card {
            border: none;
            /* Hilangkan border default */
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            /* Efek kartu terangkat saat di-hover */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .card-img-top {
            width: 100%;
            height: 350px;
            /* Atur tinggi gambar agar seragam */
            object-fit: cover;
            /* Gambar akan mengisi area tanpa distorsi */
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-2">Koleksi Buku Perpustakaan</h1>
        <p class="text-center text-muted mb-5">Temukan buku favoritmu di sini</p>

        <div class="row mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari judul buku atau pengarang...">
                    <button class="btn btn-primary" type="button"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option selected>Semua Kategori</option>
                    <option value="1">Fiksi</option>
                    <option value="2">Sains</option>
                    <option value="3">Sejarah</option>
                    <option value="4">Biografi</option>
                </select>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($buku as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/400x600/888/fff?text={{ urlencode($item->nama_buku) }}"
                            class="card-img-top" alt="Cover Buku">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->nama_buku }}</h5>
                            <p class="card-subtitle mb-2 text-muted">{{ $item->penerbit }}</p>
                            <div class="mt-2">
                                <span class="badge bg-primary">{{ $item->edisi }}</span>
                                <span class="badge {{ $item->status_buku == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->status_buku }}
                                </span>
                            </div>
                            <div class="mt-auto pt-3">
                                <a href="{{ route('katalog.show', $item->id) }}" class="btn btn-outline-primary w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
