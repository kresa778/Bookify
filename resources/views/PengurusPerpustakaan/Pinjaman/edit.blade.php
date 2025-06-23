<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pengembalian - Bookify Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{display:flex;background-color:#f8f9fa}.sidebar{width:280px;min-height:100vh;background-color:#343a40;padding-top:1rem;flex-shrink:0}.sidebar .nav-link{color:#adb5bd;font-size:1rem;padding:.75rem 1.5rem}.sidebar .nav-link:hover,.sidebar .nav-link.active{color:#fff;background-color:#495057}.sidebar .nav-link .bi{margin-right:.75rem}.main-content{flex-grow:1;display:flex;flex-direction:column;height:100vh}.content-container{flex-grow:1;overflow-y:auto;padding:1.5rem}
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
                    <h6 class="m-0 fw-bold text-primary">Proses Pengembalian Buku</h6>
                </div>
                <div class="card-body">
                    @if(optional($pinjaman->buku)->nama_buku && optional($pinjaman->anggota)->nama_anggota)
                    <div class="alert alert-info">
                        Anda sedang memproses pengembalian untuk buku <strong>"{{ $pinjaman->buku->nama_buku }}"</strong> yang dipinjam oleh <strong>{{ $pinjaman->anggota->nama_anggota }}</strong>.
                    </div>
                    @endif

                    <form action="{{ route('pengurus.pinjaman.update', $pinjaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                             <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Ubah Status Peminjaman</label>
                                <select name="status" class="form-select" required>
                                    <option value="Dipinjam" {{ $pinjaman->status == 'Dipinjam' ? 'selected' : '' }}>Masih Dipinjam</option>
                                    <option value="Kembali" {{ $pinjaman->status == 'Kembali' ? 'selected' : '' }}>Sudah Kembali</option>
                                    <option value="Terlambat" {{ $pinjaman->status == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_pengembalian" class="form-label">Tanggal Aktual Pengembalian</label>
                                <input type="date" name="tanggal_pengembalian" class="form-control" value="{{ old('tanggal_pengembalian', $pinjaman->tanggal_pengembalian ?? date('Y-m-d')) }}">
                                <div class="form-text">Kosongkan untuk menggunakan tanggal hari ini jika status diubah ke "Kembali".</div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <a href="{{ route('pengurus.pinjaman.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
