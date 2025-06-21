<div class="sidebar text-white">
    <h4 class="text-center mb-4">Bookify Anggota</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            {{-- Aktif jika nama route persis 'admin.dashboard' --}}
            <a class="nav-link {{ request()->routeIs('anggota.dashboard') ? 'active' : '' }}" href="{{ route('anggota.dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            {{-- Aktif jika nama route diawali dengan 'pengurus.buku' --}}
            <a class="nav-link {{ request()->routeIs('anggota.buku*') ? 'active' : '' }}" href="{{ route('anggota.buku') }}">
                <i class=" bi bi-book-fill"></i> Daftar Buku
            </a>
        </li>

        {{-- ... Terapkan pola yang sama untuk link lainnya ... --}}
    </ul>
</div>