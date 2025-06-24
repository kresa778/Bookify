<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- DIUBAH: Judul halaman dinamis sesuai nama buku --}}
    <title>Detail: {{ $pinjaman->buku->nama_buku }} - Bookify</title>

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
    </style>
</head>

<body>
    {{-- Asumsi Anda memiliki komponen Blade untuk sidebar --}}
    <x-sidebar-anggota></x-sidebar-anggota>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3 mb-4">
            <div class="container-fluid">
                <div class="ms-auto">
                    <div class="dropdown">
                        {{-- Sebaiknya nama anggota diambil dari data otentikasi, contoh: Auth::user()->name --}}
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name ?? 'Nama Anggota' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container my-5">
            <div class="row g-5">
                <div class="col-md-4">
                    {{-- DIUBAH: Variabel disesuaikan menjadi $pinjaman->buku->... --}}
                    {{-- Gambar ini adalah placeholder, ganti 'path_cover' jika Anda punya kolom gambar di tabel buku --}}
                    <img src="https://placehold.co/400x600/888/fff?text={{ urlencode($pinjaman->buku->nama_buku) }}" class="img-fluid rounded shadow-lg w-100" alt="Cover Buku {{ $pinjaman->buku->nama_buku }}">
                </div>

                <div class="col-md-8">
                    {{-- DIUBAH: Variabel disesuaikan menjadi $pinjaman->buku->nama_buku --}}
                    <h1>{{ $pinjaman->buku->nama_buku }}</h1>

                    <hr>

                    {{-- DIUBAH: Menggunakan sinopsis dari $pinjaman->buku->sinopsis --}}
                    <p class="lead">{{ $pinjaman->buku->sinopsis }}</p>

                    {{-- DITAMBAHKAN: Bagian ini menampilkan detail spesifik dari peminjaman --}}
                    <h4 class="mt-5">Status Peminjaman Anda</h4>
                    <table class="table table-striped table-bordered">
                         <tbody>
                             <tr>
                                 <th scope="row" style="width: 200px;">Status</th>
                                 <td>
                                     {{-- Menampilkan status pinjaman dari data $pinjaman --}}
                                     <span class="badge fs-6
                                        @if($pinjaman->status == 'Dipinjam') bg-primary
                                        @elseif($pinjaman->status == 'Kembali') bg-success
                                        @elseif($pinjaman->status == 'Terlambat') bg-danger
                                        @else bg-secondary @endif">
                                         {{ $pinjaman->status }}
                                     </span>
                                 </td>
                             </tr>
                             <tr>
                                 <th scope="row">Tanggal Pinjam</th>
                                 {{-- Memformat tanggal agar lebih mudah dibaca --}}
                                 <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->isoFormat('dddd, D MMMM YYYY') }}</td>
                             </tr>
                             <tr>
                                 <th scope="row">Batas Pengembalian</th>
                                 {{-- Menangani jika tanggal_kembali masih null --}}
                                 <td>
                                     @if($pinjaman->tanggal_kembali)
                                         {{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->isoFormat('dddd, D MMMM YYYY') }}
                                     @else
                                         -
                                     @endif
                                 </td>
                             </tr>
                             <tr>
                                 <th scope="row">Tanggal Dikembalikan</th>
                                 <td>
                                    {{-- Menangani jika tanggal_pengembalian masih null --}}
                                     @if($pinjaman->tanggal_pengembalian)
                                         {{ \Carbon\Carbon::parse($pinjaman->tanggal_pengembalian)->isoFormat('dddd, D MMMM YYYY') }}
                                     @else
                                         Belum dikembalikan
                                     @endif
                                 </td>
                             </tr>
                         </tbody>
                    </table>

                    {{-- DIUBAH: Detail buku sekarang diambil dari $pinjaman->buku->... --}}
                    <h4 class="mt-5">Detail Informasi Buku</h4>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 200px;">Penerbit</th>
                                <td>{{ $pinjaman->buku->penerbit }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Edisi</th>
                                <td>{{ $pinjaman->buku->edisi }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Lokasi Buku</th>
                                <td>{{ $pinjaman->buku->lokasi_buku }}</td>
                            </tr>
                            <tr>
                                <th scope="row">ISBN</th>
                                <td>{{ $pinjaman->buku->isbn }}</td>
                            </tr>
                             <tr>
                                <th scope="row">Status Ketersediaan</th>
                                <td>
                                    {{-- Ini adalah status asli buku di perpustakaan, bukan status peminjaman Anda --}}
                                    @if($pinjaman->buku->status_buku == 'Tersedia')
                                        <span class="badge bg-success">Tersedia untuk Umum</span>
                                    @else
                                        <span class="badge bg-warning">Sedang Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{-- DIUBAH: Tombol kembali ke halaman sebelumnya agar lebih fleksibel --}}
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
