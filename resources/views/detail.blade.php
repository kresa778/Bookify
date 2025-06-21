<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- DIUBAH: Menggunakan nama_buku agar judul halaman dinamis dan benar --}}
    <title>Detail Buku: {{ $buku->nama_buku }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    {{-- Ganti komentar ini dengan @include('layouts.partials.navbar') jika sudah dibuat --}}

    <div class="container my-5">
        <div class="row g-5">
            <div class="col-md-4">
                {{-- PENTING: Kolom untuk gambar (path_cover) tidak ada di database Anda. --}}
                {{-- Gambar di bawah ini adalah placeholder. Tambahkan kolom 'path_cover' di tabel_buku untuk menampilkan gambar asli. --}}
                <img src="https://placehold.co/400x600/888/fff?text={{ urlencode($buku->nama_buku) }}" class="img-fluid rounded shadow-lg w-100" alt="Cover Buku {{ $buku->nama_buku }}">
            </div>

            <div class="col-md-8">
                {{-- DIUBAH: dari judul menjadi nama_buku --}}
                <h1>{{ $buku->nama_buku }}</h1>

                {{-- DIKOMENTARI: Kolom 'pengarang' tidak ada di database Anda. --}}
                {{-- <h5 class="text-muted mb-3">oleh: {{ $buku->pengarang }}</h5> --}}

                {{-- DIUBAH: dari status menjadi status_buku --}}
                @if($buku->status_buku == 'Tersedia')
                    <span class="badge bg-success fs-6">Tersedia</span>
                @else
                    <span class="badge bg-danger fs-6">Dipinjam</span>
                @endif

                <hr>

                {{-- Kolom sinopsis sudah benar --}}
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
                            <td>{{ $buku->edisi }}</td> {{-- DITAMBAHKAN: Menampilkan kolom 'edisi' --}}
                        </tr>
                        <tr>
                            <th scope="row">Lokasi Buku</th>
                            <td>{{ $buku->lokasi_buku }}</td> {{-- DITAMBAHKAN: Menampilkan kolom 'lokasi_buku' --}}
                        </tr>
                        <tr>
                            <th scope="row">ISBN</th>
                            <td>{{ $buku->isbn }}</td>
                        </tr>

                        {{-- DIKOMENTARI: Kolom 'tahun_terbit' dan 'jumlah_halaman' tidak ada. --}}
                        {{--
                        <tr>
                            <th scope="row">Tahun Terbit</th>
                            <td>{{ $buku->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Halaman</th>
                            <td>{{ $buku->jumlah_halaman }} hlm.</td>
                        </tr>
                        --}}
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="#" class="btn btn-lg btn-success">
                        <i class="bi bi-hand-index-thumb"></i> Pinjam Buku Ini
                    </a>
                    {{-- Pastikan route 'buku.katalog' ada di web.php Anda --}}
                    <a href="{{ route('katalog') }}" class="btn btn-lg btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Ganti komentar ini dengan @include('layouts.partials.footer') jika sudah dibuat --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
