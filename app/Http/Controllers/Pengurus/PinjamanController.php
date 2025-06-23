<?php

namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PinjamanController extends Controller
{
    /**
     * Menampilkan daftar semua data peminjaman.
     */
    public function index()
    {
        // Ambil data pinjaman, dan juga data relasinya (buku dan anggota) untuk efisiensi query
        $pinjamans = Pinjaman::with(['buku', 'anggota'])->latest()->paginate(10);
        return view('PengurusPerpustakaan.Pinjaman.index', compact('pinjamans'));
    }

    /**
     * Menampilkan form untuk membuat peminjaman baru.
     */
    public function create()
    {
        // Kita hanya akan menampilkan buku yang statusnya "Tersedia" untuk dipinjam
        $bukus = Buku::where('status_buku', 'Tersedia')->orderBy('nama_buku')->get();
        $anggotas = Anggota::orderBy('nama_anggota')->get();
        return view('PengurusPerpustakaan.Pinjaman.create', compact('bukus', 'anggotas'));
    }

    /**
     * Menyimpan data peminjaman baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi request dan simpan hasilnya ke dalam variabel
        $validatedData = $request->validate([
            'buku_id' => 'required|exists:tabel_buku,id',
            'anggota_id' => 'required|exists:tabel_anggota,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        // 2. Buat data peminjaman baru menggunakan data yang sudah tervalidasi
        Pinjaman::create($validatedData);

        // 3. Update status buku yang dipinjam menjadi "Dipinjam"
        $buku = Buku::find($request->buku_id);
        if ($buku) {
            $buku->update(['status_buku' => 'Dipinjam']);
        }

        return redirect()->route('pengurus.pinjaman.index')
                         ->with('success', 'Transaksi peminjaman berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu data peminjaman.
     */
    public function show(Pinjaman $pinjaman)
    {
        // Memuat relasi agar bisa ditampilkan di view
        $pinjaman->load(['buku', 'anggota']);
        return view('PengurusPerpustakaan.Pinjaman.show', compact('pinjaman'));
    }

    /**
     * Menampilkan form untuk mengedit data peminjaman.
     * (Dalam kasus ini, lebih fokus ke proses pengembalian)
     */
    public function edit(Pinjaman $pinjaman)
    {
        return view('PengurusPerpustakaan.Pinjaman.edit', compact('pinjaman'));
    }

    /**
     * Mengupdate data peminjaman (proses pengembalian).
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        // Validasi input, termasuk tanggal pengembalian
        $request->validate([
            'status' => 'required|in:Dipinjam,Kembali,Terlambat',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:'.$pinjaman->tanggal_pinjam,
        ]);

        // Ambil data dari request
        $updateData = $request->only('status', 'tanggal_pengembalian');

        // LOGIKA PENGEMBALIAN BUKU
        if ($request->status == 'Kembali' && $pinjaman->status != 'Kembali') {
            // Jika tanggal pengembalian tidak diisi manual, set ke hari ini
            if (empty($updateData['tanggal_pengembalian'])) {
                $updateData['tanggal_pengembalian'] = Carbon::now();
            }
            // Ubah status buku menjadi "Tersedia" kembali
            $buku = Buku::find($pinjaman->buku_id);
            if ($buku) {
                $buku->update(['status_buku' => 'Tersedia']);
            }
        }
        // Jika status dibatalkan (dari 'Kembali' menjadi 'Dipinjam' lagi)
        else if ($request->status == 'Dipinjam' && $pinjaman->status == 'Kembali') {
            // Hapus tanggal pengembalian & ubah status buku jadi dipinjam
            $updateData['tanggal_pengembalian'] = null;
            $buku = Buku::find($pinjaman->buku_id);
            if ($buku) {
                $buku->update(['status_buku' => 'Dipinjam']);
            }
        }

        $pinjaman->update($updateData);

        return redirect()->route('pengurus.pinjaman.index')
                         ->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    /**
     * Menghapus data peminjaman.
     */
    public function destroy(Pinjaman $pinjaman)
    {
        // Sebelum menghapus transaksi, pastikan status buku dikembalikan
        if ($pinjaman->status == 'Dipinjam') {
            $buku = Buku::find($pinjaman->buku_id);
            if ($buku) {
                $buku->update(['status_buku' => 'Tersedia']);
            }
        }

        $pinjaman->delete();

        return redirect()->route('pengurus.pinjaman.index')
                         ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
