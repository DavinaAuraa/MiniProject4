<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    // Tampilkan semua data bahan baku
    public function index()
    {
        $bahanBakus = BahanBaku::orderBy('nama')->get();
        return view('bahan_baku.index', compact('bahanBakus'));
    }

    // Tampilkan form tambah bahan baku
    public function create()
    {
        return view('bahan_baku.create');
    }

    // Proses simpan bahan baku baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100|unique:bahan_bakus,nama',
            'stok'   => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'harga'  => 'required|numeric|min:0',
        ]);

        BahanBaku::create($request->all());

        return redirect()->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil ditambahkan!');
    }

    // Tampilkan form edit bahan baku
    public function edit(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.edit', compact('bahanBaku'));
    }

    // Proses update data bahan baku
    public function update(Request $request, BahanBaku $bahanBaku)
    {
        $request->validate([
            'nama'   => 'required|string|max:100|unique:bahan_bakus,nama,' . $bahanBaku->id,
            'stok'   => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'harga'  => 'required|numeric|min:0',
        ]);

        $bahanBaku->update($request->all());

        return redirect()->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil diupdate!');
    }

    // Proses hapus bahan baku
    public function destroy(BahanBaku $bahanBaku)
    {
        $bahanBaku->delete();
        return redirect()->route('bahan-baku.index')
            ->with('success', 'Data bahan baku berhasil dihapus!');
    }
}