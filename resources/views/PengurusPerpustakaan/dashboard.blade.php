<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bookify</title>

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
            background-color: #343a40; /* Warna gelap untuk sidebar */
            padding-top: 1rem;
        }
        .sidebar .nav-link {
            color: #adb5bd; /* Warna teks link */
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff; /* Warna teks saat aktif/hover */
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
        .card .border-start-primary { border-left: .25rem solid #4e73df!important; }
        .card .border-start-success { border-left: .25rem solid #1cc88a!important; }
        .card .border-start-info { border-left: .25rem solid #36b9cc!important; }
        .card .border-start-danger { border-left: .25rem solid #e74a3b!important; }
        .text-gray-300 { color: #dddfeb!important; }
        .text-gray-800 { color: #5a5c69!important; }
        .text-xs { font-size: .8rem; }
    </style>
</head>
<body>

    <div class="sidebar text-white">
        <h4 class="text-center mb-4">Bookify Admin</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-book-fill"></i> Manajemen Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-people-fill"></i> Manajemen Anggota
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-arrow-down-up"></i> Data Peminjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-person-check-fill"></i> Data Kunjungan
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-person-vcard"></i> Manajemen Pengurus
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3 mb-4">
            <div class="container-fluid">
                <div class="ms-auto">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Nama Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Peminjaman Baru
                </a>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-start-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <div class="text-xs fw-bold text-primary text-uppercase mb-1">Total Buku</div>
                                    <div class="h5 mb-0 fw-bold text-gray-800">1,250</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-book-half fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-start-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <div class="text-xs fw-bold text-success text-uppercase mb-1">Jumlah Anggota</div>
                                    <div class="h5 mb-0 fw-bold text-gray-800">342</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-start-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <div class="text-xs fw-bold text-info text-uppercase mb-1">Peminjaman Aktif</div>
                                    <div class="h5 mb-0 fw-bold text-gray-800">78</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-arrow-down-up fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-start-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col me-2">
                                    <div class="text-xs fw-bold text-danger text-uppercase mb-1">Keterlambatan</div>
                                    <div class="h5 mb-0 fw-bold text-gray-800">5</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-exclamation-triangle-fill fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 fw-bold text-primary">Aktivitas Peminjaman Terbaru</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Anggota</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Budi Santoso</td>
                                            <td>Laskar Pelangi</td>
                                            <td>20 Jun 2025</td>
                                            <td><span class="badge bg-info">Dipinjam</span></td>
                                        </tr>
                                        <tr>
                                            <td>Citra Lestari</td>
                                            <td>Sapiens: Riwayat Singkat Umat Manusia</td>
                                            <td>19 Jun 2025</td>
                                            <td><span class="badge bg-info">Dipinjam</span></td>
                                        </tr>
                                        <tr>
                                            <td>Ahmad Dahlan</td>
                                            <td>Bumi Manusia</td>
                                            <td>18 Jun 2025</td>
                                            <td><span class="badge bg-secondary">Dikembalikan</span></td>
                                        </tr>
                                        <tr>
                                            <td>Dewi Anggraini</td>
                                            <td>Filosofi Teras</td>
                                            <td>15 Jun 2025</td>
                                            <td><span class="badge bg-info">Dipinjam</span></td>
                                        </tr>
                                        <tr>
                                            <td>Eka Kurniawan</td>
                                            <td>Cantik Itu Luka</td>
                                            <td>14 Jun 2025</td>
                                            <td><span class="badge bg-secondary">Dikembalikan</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
