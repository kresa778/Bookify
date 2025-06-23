<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pinjaman - Bookify Admin</title>
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
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold text-primary">Data Peminjaman Buku</h6>
                    <a href="{{ route('pengurus.pinjaman.create') }}" class="btn btn-primary"><i
                            class="bi bi-plus-circle me-1"></i> Buat Peminjaman Baru</a>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status</th>
                                    <th style="width: 200px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pinjamans as $pinjaman)
                                    <tr>
                                        <td>{{ ($pinjamans->currentPage() - 1) * $pinjamans->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $pinjaman->buku->nama_buku ?? 'Buku Dihapus' }}</td>
                                        <td>{{ $pinjaman->anggota->nama_anggota ?? 'Anggota Dihapus' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}
                                        </td>
                                        <td>
                                            @if ($pinjaman->status == 'Dipinjam')
                                                <span class="badge bg-warning text-dark">{{ $pinjaman->status }}</span>
                                            @elseif($pinjaman->status == 'Kembali')
                                                <span class="badge bg-success">{{ $pinjaman->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $pinjaman->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('pengurus.pinjaman.destroy', $pinjaman->id) }}"
                                                method="POST">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('pengurus.pinjaman.show', $pinjaman->id) }}">Detail</a>
                                                @if ($pinjaman->status == 'Dipinjam')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('pengurus.pinjaman.edit', $pinjaman->id) }}">Kembali</a>
                                                @endif
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data peminjaman.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $pinjamans->links() !!}
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
