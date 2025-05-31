@extends('layouts.app')

@section('content')
    <div class="hstack align-items-center justify-content-between mb-3">
        <h2 class="mb-0">Data Bahan Baku</h2>
        <a href="{{ route('bahan-baku.create') }}" class="btn btn-primary">Tambah</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bahanBakus as $i => $bahan)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $bahan->nama }}</td>
                <td>{{ $bahan->stok }}</td>
                <td>{{ $bahan->satuan }}</td>
                <td>Rp{{ number_format($bahan->harga,0,',','.') }}</td>
                <td>
                    <a href="{{ route('bahan-baku.edit', $bahan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bahan-baku.destroy', $bahan->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data bahan baku.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection