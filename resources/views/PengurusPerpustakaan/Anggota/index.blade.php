<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Anggota - Bookify Admin</title>
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
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold text-primary">Data Anggota</h6>
                    <a href="{{ route('pengurus.anggota.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Anggota</a>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th style="width: 210px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggotas as $anggota)
                                    <tr>
                                        <td>{{ ($anggotas->currentPage() - 1) * $anggotas->perPage() + $loop->iteration }}</td>
                                        <td>{{ $anggota->nama_anggota }}</td>
                                        <td>{{ $anggota->email }}</td>
                                        <td>{{ $anggota->no_hp }}</td>
                                        <td>
                                            <form action="{{ route('pengurus.anggota.destroy', $anggota->id) }}" method="POST">
                                                <a class="btn btn-info btn-sm" href="{{ route('pengurus.anggota.show', $anggota->id) }}">Detail</a>
                                                <a class="btn btn-primary btn-sm" href="{{ route('pengurus.anggota.edit', $anggota->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data anggota.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $anggotas->links() !!}
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
