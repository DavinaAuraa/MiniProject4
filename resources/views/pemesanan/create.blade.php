@extends('layouts.app')

@section('content')
    <h2>Tambah Pemesanan</h2>
    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        @include('pemesanan.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection