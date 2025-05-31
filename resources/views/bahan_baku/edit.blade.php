@extends('layouts.app')

@section('content')
    <h2>Edit Bahan Baku</h2>
    <form action="{{ route('bahan-baku.update', $bahanBaku->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('bahan_baku.form', ['bahanBaku' => $bahanBaku])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('bahan-baku.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection