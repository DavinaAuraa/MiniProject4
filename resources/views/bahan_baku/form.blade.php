<div class="mb-3">
    <label class="form-label">Nama Bahan Baku</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
        value="{{ old('nama', $bahanBaku->nama ?? '') }}" required>
    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" name="stok" min="0" class="form-control @error('stok') is-invalid @enderror"
        value="{{ old('stok', $bahanBaku->stok ?? 0) }}" required>
    @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Satuan</label>
    <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
        value="{{ old('satuan', $bahanBaku->satuan ?? '') }}" required>
    @error('satuan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="harga" min="0" step="0.01" class="form-control @error('harga') is-invalid @enderror"
        value="{{ old('harga', $bahanBaku->harga ?? 0) }}" required>
    @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>