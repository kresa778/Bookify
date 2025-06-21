<div class="sidebar text-white">
    <h4 class="text-center mb-4">Bookify Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            {{-- Aktif jika nama route persis 'admin.dashboard' --}}
            <a class="nav-link {{ request()->routeIs('pengurus.dashboard') ? 'active' : '' }}" href="{{ route('pengurus.dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            {{-- Aktif jika nama route diawali dengan 'pengurus.buku' --}}
            <a class="nav-link {{ request()->routeIs('pengurus.buku*') ? 'active' : '' }}" href="{{ route('pengurus.buku') }}">
                <i class="bi bi-book-fill"></i> Manajemen Buku
            </a>
        </li>
        <li class="nav-item">
            {{-- Link Manajemen Anggota: Aktif jika URL diawali dengan 'admin/anggota' --}}
            <a class="nav-link {{ request()->is('admin/anggota*') ? 'active' : '' }}" href="#">
                <i class="bi bi-people-fill"></i> Manajemen Anggota
            </a>
        </li>
        <li class="nav-item">
            {{-- Link Data Peminjaman: Aktif jika URL diawali dengan 'admin/peminjaman' --}}
            <a class="nav-link {{ request()->is('admin/peminjaman*') ? 'active' : '' }}" href="#">
                <i class="bi bi-arrow-down-up"></i> Data Peminjaman
            </a>
        </li>
        <li class="nav-item">
            {{-- Link Data Kunjungan: Aktif jika URL diawali dengan 'admin/kunjungan' --}}
            <a class="nav-link {{ request()->is('admin/kunjungan*') ? 'active' : '' }}" href="#">
                <i class="bi bi-person-check-fill"></i> Data Kunjungan
            </a>
        </li>
         <li class="nav-item">
            {{-- Link Manajemen Pengurus: Aktif jika URL diawali dengan 'admin/pengurus' --}}
            <a class="nav-link {{ request()->is('admin/pengurus*') ? 'active' : '' }}" href="#">
                <i class="bi bi-person-vcard"></i> Manajemen Pengurus
            </a>
        </li>
        {{-- ... Terapkan pola yang sama untuk link lainnya ... --}}
    </ul>
</div>
