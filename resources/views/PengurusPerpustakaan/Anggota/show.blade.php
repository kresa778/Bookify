<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota - Bookify Admin</title>
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
                    <h6 class="m-0 fw-bold text-primary">Detail Data Anggota</h6>
                    <a href="{{ route('pengurus.anggota.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Nama Lengkap</th>
                                        <td>: {{ $anggota->nama_anggota }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Email</th>
                                        <td>: {{ $anggota->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor HP</th>
                                        <td>: {{ $anggota->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>: {{ $anggota->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Bergabung</th>
                                        <td>: {{ $anggota->created_at->format('d F Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
