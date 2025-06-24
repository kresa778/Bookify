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
    public function index()
    {
        $pinjamans = Pinjaman::with(['buku', 'anggota'])->latest()->paginate(10);
        return view('PengurusPerpustakaan.Pinjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        $bukus = Buku::where('status_buku', 'Tersedia')->orderBy('nama_buku')->get();
        $anggotas = Anggota::orderBy('nama_anggota')->get();
        return view('PengurusPerpustakaan.Pinjaman.create', compact('bukus', 'anggotas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'buku_id' => 'required|exists:tabel_buku,id',
            'anggota_id' => 'required|exists:tabel_anggota,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        Pinjaman::create($validatedData);

        $buku = Buku::find($request->buku_id);
        if ($buku) {
            $buku->update(['status_buku' => 'Dipinjam']);
        }

        return redirect()->route('pengurus.pinjaman.index')
                         ->with('success', 'Transaksi peminjaman berhasil ditambahkan.');
    }

    public function show(Pinjaman $pinjaman)
    {
        $pinjaman->load(['buku', 'anggota']);
        return view('PengurusPerpustakaan.Pinjaman.show', compact('pinjaman'));
    }

    public function edit(Pinjaman $pinjaman)
    {
        return view('PengurusPerpustakaan.Pinjaman.edit', compact('pinjaman'));
    }

    public function update(Request $request, Pinjaman $pinjaman)
    {
        $request->validate([
            'status' => 'required|in:Dipinjam,Kembali,Terlambat',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:'.$pinjaman->tanggal_pinjam,
        ]);

        $updateData = $request->only('status', 'tanggal_pengembalian');

        if ($request->status == 'Kembali' && $pinjaman->status != 'Kembali') {
            if (empty($updateData['tanggal_pengembalian'])) {
                $updateData['tanggal_pengembalian'] = Carbon::now();
            }
            $buku = Buku::find($pinjaman->buku_id);
            if ($buku) {
                $buku->update(['status_buku' => 'Tersedia']);
            }
        }
        else if ($request->status == 'Dipinjam' && $pinjaman->status == 'Kembali') {
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

    public function destroy(Pinjaman $pinjaman)
    {
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
