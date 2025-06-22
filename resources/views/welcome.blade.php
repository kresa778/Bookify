<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpus [Nama Sekolah] - Selamat Datang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Menggunakan font Poppins jika tersedia */
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary shadow-sm" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-book-half"></i>
                E-Perpus [Nama Sekolah]
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-bold">Gerbang Menuju Dunia Pengetahuan</h1>
                    <p class="lead text-body-secondary">
                        Aplikasi Perpustakaan Digital [Nama Sekolah]. Cari, pinjam, dan baca buku favoritmu di mana saja dan kapan saja.
                    </p>
                    <p>
                        <a href="/login" class="btn btn-primary my-2">Masuk Sekarang</a>
                    </p>
                </div>
            </div>
        </section>

        <section id="fitur" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Fitur Unggulan Kami</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card text-center h-100 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-search fs-1 text-primary"></i>
                                <h5 class="card-title mt-3">Katalog Online</h5>
                                <p class="card-text">Cari koleksi buku, majalah, dan referensi lainnya dengan cepat dan mudah.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center h-100 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-hand-index-thumb fs-1 text-primary"></i>
                                <h5 class="card-title mt-3">Peminjaman Digital</h5>
                                <p class="card-text">Pinjam dan perpanjang masa pinjam buku langsung dari aplikasi tanpa perlu ke perpustakaan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center h-100 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-clock-history fs-1 text-primary"></i>
                                <h5 class="card-title mt-3">Riwayat & Notifikasi</h5>
                                <p class="card-text">Lihat riwayat peminjaman dan dapatkan notifikasi pengingat tanggal pengembalian buku.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="login" class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="text-center mb-4">Login Akun</h3>
                                <form>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username / ID Siswa</label>
                                        <input type="text" class="form-control" id="username" placeholder="Masukkan username Anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
                                    <div class="text-center mt-3">
                                        <a href="#" class="form-text">Lupa password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white text-center p-3">
        <div class="container">
            <p class="mb-0">&copy; 2025 [Nama Sekolah]. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
