<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman - Bookify Admin</title>
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
                    <h6 class="m-0 fw-bold text-primary">Detail Transaksi Peminjaman</h6>
                    <a href="{{ route('pengurus.pinjaman.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Data Buku</h5>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th style="width: 150px;">Judul Buku</th>
                                    <td>: {{ $pinjaman->buku->nama_buku ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>ISBN</th>
                                    <td>: {{ $pinjaman->buku->isbn ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Penerbit</th>
                                    <td>: {{ $pinjaman->buku->penerbit ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Data Peminjam</h5>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th style="width: 150px;">Nama Peminjam</th>
                                    <td>: {{ $pinjaman->anggota->nama_anggota ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{ $pinjaman->anggota->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>No. HP</th>
                                    <td>: {{ $pinjaman->anggota->no_hp ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <h5>Data Peminjaman</h5>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th style="width: 200px;">Tanggal Pinjam</th>
                            <td>: {{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Jatuh Tempo</th>
                            <td>: {{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('l, d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if ($pinjaman->status == 'Dipinjam')
                                    <span class="badge bg-warning text-dark">{{ $pinjaman->status }}</span>
                                @elseif($pinjaman->status == 'Kembali')
                                    <span class="badge bg-success">{{ $pinjaman->status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $pinjaman->status }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Aktual Pengembalian</th>
                            <td>:
                                @if ($pinjaman->tanggal_pengembalian)
                                    {{ \Carbon\Carbon::parse($pinjaman->tanggal_pengembalian)->format('l, d F Y') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
