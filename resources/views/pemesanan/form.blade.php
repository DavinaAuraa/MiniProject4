<div class="mb-3">
    <label class="form-label">Bahan Baku</label>
    <select name="bahan_baku_id" class="form-select @error('bahan_baku_id') is-invalid @enderror" required>
        <option value="">-- Pilih Bahan Baku --</option>
        @foreach($bahanBakus as $bahan)
            <option value="{{ $bahan->id }}"
                {{ old('bahan_baku_id', $pemesanan->bahan_baku_id ?? '') == $bahan->id ? 'selected' : '' }}>
                {{ $bahan->nama }} ({{ $bahan->satuan }})
            </option>
        @endforeach
    </select>
    @error('bahan_baku_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Jumlah</label>
    <input type="number" name="jumlah" min="1" class="form-control @error('jumlah') is-invalid @enderror"
        value="{{ old('jumlah', $pemesanan->jumlah ?? '') }}" required>
    @error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Tanggal Pesan</label>
    <input type="date" name="tanggal_pesan" class="form-control @error('tanggal_pesan') is-invalid @enderror"
        value="{{ old('tanggal_pesan', $pemesanan->tanggal_pesan ?? date('Y-m-d')) }}" required>
    @error('tanggal_pesan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
@if(isset($pemesanan))
<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
        <option value="pending" {{ $pemesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="diterima" {{ $pemesanan->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
        <option value="ditolak" {{ $pemesanan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
    </select>
</div>
@endif