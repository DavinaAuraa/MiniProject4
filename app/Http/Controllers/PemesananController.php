<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\BahanBaku;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan semua data pemesanan
    public function index()
    {
        $pemesanans = Pemesanan::with('bahanBaku')->orderByDesc('created_at')->get();
        return view('pemesanan.index', compact('pemesanans'));
    }

    // Menampilkan form tambah pemesanan
    public function create()
    {
        $bahanBakus = BahanBaku::all();
        return view('pemesanan.create', compact('bahanBakus'));
    }

    // Proses simpan pemesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'bahan_baku_id' => 'required|exists:bahan_bakus,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pesan' => 'required|date',
        ]);

        $bahanBaku = BahanBaku::findOrFail($request->bahan_baku_id);

        Pemesanan::create([
            'bahan_baku_id' => $bahanBaku->id,
            'jumlah' => $request->jumlah,
            'satuan' => $bahanBaku->satuan,
            'tanggal_pesan' => $request->tanggal_pesan,
            'status' => 'pending',
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dibuat!');
    }

    // Menampilkan form edit pemesanan
    public function edit(Pemesanan $pemesanan)
    {
        $bahanBakus = BahanBaku::all();
        return view('pemesanan.edit', compact('pemesanan', 'bahanBakus'));
    }

    // Proses update pemesanan
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'bahan_baku_id' => 'required|exists:bahan_bakus,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pesan' => 'required|date',
            'status' => 'required|in:pending,diterima,ditolak'
        ]);

        $bahanBaku = BahanBaku::findOrFail($request->bahan_baku_id);

        $old_status = $pemesanan->status;
        $old_jumlah = $pemesanan->jumlah;
        $new_status = $request->status;
        $new_jumlah = $request->jumlah;

        // 1. Dari status bukan diterima → diterima: stok berkurang
        if ($old_status !== 'diterima' && $new_status === 'diterima') {
            $bahanBaku->decrement('stok', $new_jumlah);
        }

        // 2. Dari status diterima → bukan diterima: stok dikembalikan
        else if ($old_status === 'diterima' && $new_status !== 'diterima') {
            $bahanBaku->increment('stok', $old_jumlah);
        }

        // 3. Status tetap diterima, jumlah berubah → sesuaikan stok
        else if ($old_status === 'diterima' && $new_status === 'diterima' && $old_jumlah != $new_jumlah) {
            $selisih = $new_jumlah - $old_jumlah;
            // Jika selisih > 0, berarti stok perlu dikurangi lebih banyak
            if ($selisih > 0) {
                $bahanBaku->decrement('stok', $selisih);
            }
            // Jika selisih < 0, berarti stok perlu dikembalikan sebagian
            else {
                $bahanBaku->increment('stok', abs($selisih));
            }
        }

        $pemesanan->update([
            'bahan_baku_id' => $bahanBaku->id,
            'jumlah' => $new_jumlah,
            'satuan' => $bahanBaku->satuan,
            'tanggal_pesan' => $request->tanggal_pesan,
            'status' => $new_status,
        ]);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    // Proses hapus pemesanan
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus!');
    }
}
