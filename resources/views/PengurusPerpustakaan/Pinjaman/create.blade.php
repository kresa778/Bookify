<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Peminjaman - Bookify Admin</title>
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
                    <h6 class="m-0 fw-bold text-primary">Form Peminjaman Buku</h6>
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
                    <form action="{{ route('pengurus.pinjaman.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="buku_id" class="form-label">Pilih Buku (Hanya yang tersedia)</label>
                                <select name="buku_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Judul Buku --</option>
                                    @foreach ($bukus as $buku)
                                        <option value="{{ $buku->id }}">{{ $buku->nama_buku }} (ISBN:
                                            {{ $buku->isbn }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="anggota_id" class="form-label">Pilih Peminjam</label>
                                <select name="anggota_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Nama Anggota --</option>
                                    @foreach ($anggotas as $anggota)
                                        <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }} (Email:
                                            {{ $anggota->email }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" name="tanggal_pinjam" class="form-control"
                                    value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_kembali" class="form-label">Tanggal Kembali (Jatuh Tempo)</label>
                                <input type="date" name="tanggal_kembali" class="form-control" required>
                            </div>
                            <div class="col-12 text-end">
                                <a href="{{ route('pengurus.pinjaman.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
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
