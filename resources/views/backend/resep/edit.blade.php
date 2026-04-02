@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Resep: {{ Str::limit($resep->judul, 40) }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('backend.resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Judul Resep</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $resep->judul) }}" required>
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" 
                                   value="{{ old('penerbit', $resep->penerbit) }}" required>
                            @error('penerbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $resep->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Resep</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror

                            @if($resep->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $resep->foto) }}" alt="Foto saat ini" class="img-thumbnail" width="180">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="10" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $resep->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <!-- Bahan -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Bahan-bahan</label>
                    <div id="bahan-container" class="mt-2">
                        @foreach(old('bahan', $resep->bahan ?? []) as $index => $item)
                            <div class="input-group mb-2">
                                <input type="text" name="bahan[{{ $index }}][nama]" class="form-control" 
                                       value="{{ $item['nama'] ?? '' }}" placeholder="Nama bahan" required>
                                <input type="text" name="bahan[{{ $index }}][jumlah]" class="form-control" 
                                       value="{{ $item['jumlah'] ?? '' }}" placeholder="Jumlah">
                                <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success btn-sm mt-2" id="btn-add-bahan">
                        <i class="ti ti-plus"></i> Tambah Bahan
                    </button>
                </div>

                <!-- Langkah -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Langkah-langkah</label>
                    <div id="langkah-container" class="mt-2">
                        @foreach(old('langkah', $resep->langkah ?? []) as $index => $step)
                            <div class="input-group mb-2">
                                <textarea name="langkah[{{ $index }}]" class="form-control" rows="2" required>{{ $step }}</textarea>
                                <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success btn-sm mt-2" id="btn-add-langkah">
                        <i class="ti ti-plus"></i> Tambah Langkah
                    </button>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-primary px-4">Update Resep</button>
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
    let bahanIndex = {{ count(old('bahan', $resep->bahan ?? [])) }};
    let langkahIndex = {{ count(old('langkah', $resep->langkah ?? [])) }};

    // Tambah bahan
    document.getElementById('btn-add-bahan').addEventListener('click', function () {
        const container = document.getElementById('bahan-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" name="bahan[${bahanIndex}][nama]" class="form-control" placeholder="Nama bahan" required>
            <input type="text" name="bahan[${bahanIndex}][jumlah]" class="form-control" placeholder="Jumlah">
            <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
        `;
        container.appendChild(div);
        bahanIndex++;
    });

    // Tambah langkah
    document.getElementById('btn-add-langkah').addEventListener('click', function () {
        const container = document.getElementById('langkah-container');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <textarea name="langkah[${langkahIndex}]" class="form-control" rows="2" required placeholder="Langkah ${langkahIndex + 1}"></textarea>
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