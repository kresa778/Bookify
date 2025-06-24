<div class="sidebar text-white">
    <h4 class="text-center mb-4">Bookify</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            {{-- Aktif jika nama route persis 'admin.dashboard' --}}
            <a class="nav-link {{ request()->routeIs('pengurus.dashboard') ? 'active' : '' }}" href="{{ route('pengurus.dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            {{-- Aktif jika nama route diawali dengan 'pengurus.buku' --}}
            <a class="nav-link {{ request()->routeIs('pengurus.buku.index*') ? 'active' : '' }}" href="{{ route('pengurus.buku.index') }}">
                <i class="bi bi-book-fill"></i> Manajemen Buku
            </a>
        </li>
        <li class="nav-item">
            {{-- Aktif jika nama route diawali dengan 'pengurus.buku' --}}
            <a class="nav-link {{ request()->routeIs('pengurus.pinjaman.index*') ? 'active' : '' }}" href="{{ route('pengurus.pinjaman.index') }}">
                <i class="bi bi-journal"></i> Daftar Pinjaman
            </a>
        </li>
        <li class="nav-item">
            {{-- Aktif jika nama route diawali dengan 'pengurus.buku' --}}
            <a class="nav-link {{ request()->routeIs('pengurus.anggota.index*') ? 'active' : '' }}" href="{{ route('pengurus.anggota.index') }}">
                <i class="bi bi-person-badge-fill"></i> Daftar Anggota
            </a>
        </li>
    </ul>
</div>
