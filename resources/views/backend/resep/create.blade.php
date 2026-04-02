@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Resep Baru</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('backend.resep.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Judul Resep <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul') }}" required autofocus>
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penerbit <span class="text-danger">*</span></label>
                            <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" 
                                   value="{{ old('penerbit') }}" required>
                            @error('penerbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Resep <span class="text-danger">*</span></label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" 
                                   accept="image/*" required>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <!-- Bahan -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Bahan-bahan</label>
                    <div id="bahan-container" class="mt-2"></div>
                    <button type="button" class="btn btn-success btn-sm mt-2" id="btn-add-bahan">
                        <i class="ti ti-plus"></i> Tambah Bahan
                    </button>
                </div>

                <!-- Langkah -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Langkah-langkah</label>
                    <div id="langkah-container" class="mt-2"></div>
                    <button type="button" class="btn btn-success btn-sm mt-2" id="btn-add-langkah">
                        <i class="ti ti-plus"></i> Tambah Langkah
                    </button>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-primary px-4">Simpan Resep</button>
                    <a href="{{ route('backend.resep.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let bahanIndex = 0;
    let langkahIndex = 0;

    // Tambah field bahan
    document.getElementById('btn-add-bahan').addEventListener('click', function () {
        const container = document.getElementById('bahan-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="bahan[${bahanIndex}][nama]" class="form-control" placeholder="Nama bahan" required>
            <input type="text" name="bahan[${bahanIndex}][jumlah]" class="form-control" placeholder="Jumlah (contoh: 500 gr)">
            <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
        `;
        container.appendChild(div);
        bahanIndex++;
    });

    // Tambah field langkah
    document.getElementById('btn-add-langkah').addEventListener('click', function () {
        const container = document.getElementById('langkah-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <textarea name="langkah[${langkahIndex}]" class="form-control" rows="2" placeholder="Langkah ke-${langkahIndex + 1}" required></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
        `;
        container.appendChild(div);
        langkahIndex++;
    });

    // Hapus field
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.input-group').remove();
        }
    });
});
</script>
@endsection