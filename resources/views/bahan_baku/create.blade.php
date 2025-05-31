@extends('layouts.app')

@section('content')
    <h2>Tambah Bahan Baku</h2>
    <form action="{{ route('bahan-baku.store') }}" method="POST">
        @csrf
        @include('bahan_baku.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('bahan-baku.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection