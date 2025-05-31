@extends('layouts.app')

@section('content')
    <h2>Edit Pemesanan</h2>
    <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pemesanan.form', ['pemesanan' => $pemesanan])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection