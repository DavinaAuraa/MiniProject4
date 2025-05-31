@extends('layouts.app')

@section('content')
    <div class="hstack align-items-center justify-content-between mb-3">
        <h2 class="mb-0">Data Pemesanan</h2>
        <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pemesanan</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Bahan Baku</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Tanggal Pesan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemesanans as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->bahanBaku->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->tanggal_pesan }}</td>
                <td>
                    <span class="badge bg-{{ $item->status == 'pending' ? 'warning' : ($item->status == 'diterima' ? 'success' : 'danger') }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('pemesanan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pemesanan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data pemesanan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection