@extends('layouts.backend')

@section('styles')
<style>
:root {
    --navy:       #1a1a2e;
    --navy-mid:   #22223a;
    --navy-light: #2d2d48;
    --gold:       #e8c547;
    --gold-dark:  #c9a82e;
    --gold-lt:    rgba(232,197,71,0.10);
    --gold-glow:  rgba(232,197,71,0.18);
    --txt-bright: #f5f0e8;
    --txt-mid:    #c8c0b0;
    --txt-muted:  #8a8070;
    --bdr:        rgba(255,255,255,0.07);
    --bdr-mid:    rgba(255,255,255,0.12);
    --green:      #2ecc71;
    --green-lt:   rgba(46,204,113,0.12);
    --red:        #e05555;
    --red-lt:     rgba(224,85,85,0.12);
    --font-d:     'DM Serif Display', serif;
    --font-b:     'DM Sans', sans-serif;
}

.ar-wrap * { box-sizing: border-box; }
.ar-wrap { font-family: var(--font-b); }

/* Header */
.ar-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 1.8rem; flex-wrap: wrap; gap: 12px;
}
.ar-header h1 {
    font-family: var(--font-d); font-size: 1.7rem;
    color: var(--txt-bright); margin: 0 0 2px;
}
.ar-header p { font-size: 13px; color: var(--txt-muted); margin: 0; }

.ar-breadcrumb {
    display: flex; align-items: center; gap: 8px;
    font-size: 12.5px; color: var(--txt-muted); margin-bottom: 12px;
}
.ar-breadcrumb a { color: var(--gold); text-decoration: none; transition: color 0.2s; }
.ar-breadcrumb a:hover { color: var(--gold-dark); }

/* Form Card */
.ar-form-card {
    background: var(--navy-mid); border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}

.ar-form-header {
    background: linear-gradient(135deg, var(--navy-light) 0%, var(--navy-mid) 100%);
    padding: 1.5rem 1.8rem; border-bottom: 1px solid var(--bdr-mid);
    display: flex; align-items: center; gap: 12px;
}
.ar-form-icon {
    width: 42px; height: 42px; border-radius: 12px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.ar-form-title {
    font-family: var(--font-d); font-size: 1.25rem;
    color: var(--txt-bright); margin: 0;
}

.ar-form-body { padding: 2rem 1.8rem; }

/* Section Title */
.ar-section {
    display: flex; align-items: center; gap: 10px;
    margin: 2rem 0 1.2rem; padding-bottom: 0.6rem;
    border-bottom: 2px solid var(--bdr-mid);
}
.ar-section:first-child { margin-top: 0; }
.ar-section-icon {
    width: 32px; height: 32px; border-radius: 8px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.15);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
}
.ar-section-title {
    font-family: var(--font-d); font-size: 1.05rem;
    color: var(--gold); font-weight: 600; margin: 0;
}

/* Form Group */
.ar-form-group { margin-bottom: 1.4rem; }

.ar-label {
    display: flex; align-items: center; gap: 6px;
    font-size: 13px; font-weight: 600; color: var(--txt-mid);
    margin-bottom: 0.5rem;
}
.ar-label i { color: var(--gold); font-size: 14px; }

.ar-input, .ar-select, .ar-textarea {
    width: 100%; background: var(--navy-light);
    border: 1px solid var(--bdr-mid); border-radius: 10px;
    color: var(--txt-bright); font-family: var(--font-b);
    font-size: 13.5px; padding: 0.7rem 1rem;
    outline: none; transition: all 0.2s;
}
.ar-input::placeholder, .ar-textarea::placeholder { color: var(--txt-muted); }
.ar-input:focus, .ar-select:focus, .ar-textarea:focus {
    border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-lt);
}
.ar-textarea { resize: vertical; min-height: 120px; line-height: 1.6; }

.ar-file-input {
    display: block; width: 100%; background: var(--navy-light);
    border: 1px solid var(--bdr-mid); border-radius: 10px;
    color: var(--txt-mid); font-family: var(--font-b);
    font-size: 13px; padding: 0.65rem 0.9rem;
    cursor: pointer; transition: all 0.2s;
}
.ar-file-input:hover { border-color: var(--gold); }

.ar-photo-preview {
    margin-top: 1rem; padding: 1rem;
    background: rgba(255,255,255,0.02);
    border: 1.5px dashed var(--bdr-mid);
    border-radius: 12px; text-align: center;
}
.ar-photo-preview img {
    max-width: 200px; border-radius: 10px;
    border: 2px solid var(--bdr-mid);
}
.ar-photo-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    color: var(--gold); font-size: 11.5px; font-weight: 700;
    padding: 5px 12px; border-radius: 99px; margin-bottom: 10px;
}

/* Dynamic Fields Container */
.ar-dynamic-container {
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--bdr);
    border-radius: 12px; padding: 1.2rem;
    margin-top: 1rem;
}

.ar-field-group {
    display: flex; gap: 10px; align-items: start;
    margin-bottom: 0.9rem; padding: 0.8rem;
    background: var(--navy-light); border: 1px solid var(--bdr-mid);
    border-radius: 10px; transition: all 0.2s;
}
.ar-field-group:hover { border-color: var(--gold); transform: translateY(-1px); }

.ar-field-group .ar-input,
.ar-field-group .ar-textarea {
    flex: 1; margin: 0; background: var(--navy-mid);
}

.ar-step-number {
    width: 32px; height: 32px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    color: var(--navy); border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 700;
}

.ar-btn-remove {
    flex-shrink: 0; width: 36px; height: 36px;
    background: var(--red-lt); border: 1px solid rgba(224,85,85,0.2);
    color: var(--red); border-radius: 8px; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s; font-size: 15px;
}
.ar-btn-remove:hover {
    background: var(--red); color: white;
    transform: scale(1.05);
}

.ar-btn-add {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--green-lt); border: 1px solid rgba(46,204,113,0.2);
    color: var(--green); font-size: 13px; font-weight: 700;
    padding: 0.6rem 1.2rem; border-radius: 10px;
    cursor: pointer; transition: all 0.2s; margin-top: 0.5rem;
}
.ar-btn-add:hover {
    background: var(--green); color: white;
    transform: translateY(-1px);
}

/* Action Buttons */
.ar-actions {
    display: flex; gap: 12px; margin-top: 2.5rem;
    padding-top: 2rem; border-top: 1px solid var(--bdr-mid);
    flex-wrap: wrap;
}

.ar-btn-primary {
    display: inline-flex; align-items: center; gap: 10px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    color: var(--navy); font-family: var(--font-b);
    font-size: 14px; font-weight: 700; padding: 0.85rem 2rem;
    border: none; border-radius: 10px; cursor: pointer;
    transition: all 0.2s; text-decoration: none;
    box-shadow: 0 4px 16px var(--gold-glow);
}
.ar-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 22px rgba(232,197,71,0.3);
    color: var(--navy);
}

.ar-btn-secondary {
    display: inline-flex; align-items: center; gap: 8px;
    background: transparent; border: 1.5px solid var(--bdr-mid);
    color: var(--txt-mid); font-family: var(--font-b);
    font-size: 14px; font-weight: 600; padding: 0.8rem 1.8rem;
    border-radius: 10px; cursor: pointer; transition: all 0.2s;
    text-decoration: none;
}
.ar-btn-secondary:hover {
    border-color: var(--gold); color: var(--gold);
    transform: translateY(-2px);
}

/* Animation */
@keyframes slideIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
.ar-animate { animation: slideIn 0.3s ease; }

@keyframes slideOut {
    to { opacity: 0; transform: translateX(-15px); }
}

/* Responsive */
@media (max-width: 768px) {
    .ar-form-body { padding: 1.5rem 1.2rem; }
    .ar-actions { flex-direction: column; }
    .ar-btn-primary, .ar-btn-secondary { width: 100%; justify-content: center; }
}
</style>
@endsection

@section('content')
<div class="ar-wrap">

    {{-- Breadcrumb --}}
    <div class="ar-breadcrumb">
        <a href="{{ route('backend.resep.index') }}">📋 Data Resep</a>
        <span>›</span>
        <span>Edit Resep</span>
    </div>

    {{-- Header --}}
    <div class="ar-header">
        <div>
            <h1>✏️ Edit Resep</h1>
            <p>Perbarui informasi resep: <strong style="color:var(--gold)">{{ Str::limit($resep->judul, 40) }}</strong></p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="ar-form-card">
        <div class="ar-form-header">
            <div class="ar-form-icon">🍳</div>
            <h2 class="ar-form-title">Form Edit Resep</h2>
        </div>

        <div class="ar-form-body">
            <form action="{{ route('backend.resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Informasi Dasar --}}
                <div class="ar-section">
                    <div class="ar-section-icon">📝</div>
                    <h3 class="ar-section-title">Informasi Dasar</h3>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="ar-form-group">
                            <label class="ar-label">
                                <i class="ti ti-book"></i> Judul Resep
                            </label>
                            <input type="text" name="judul" class="ar-input @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $resep->judul) }}" 
                                   placeholder="Masukkan judul resep yang menarik..." required>
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ar-form-group">
                            <label class="ar-label">
                                <i class="ti ti-building"></i> Penerbit
                            </label>
                            <input type="text" name="penerbit" class="ar-input @error('penerbit') is-invalid @enderror" 
                                   value="{{ old('penerbit', $resep->penerbit) }}" 
                                   placeholder="Nama penerbit" required>
                            @error('penerbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ar-form-group">
                            <label class="ar-label">
                                <i class="ti ti-category"></i> Kategori
                            </label>
                            <select name="kategori_id" class="ar-select @error('kategori_id') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" 
                                            {{ old('kategori_id', $resep->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ar-form-group">
                            <label class="ar-label">
                                <i class="ti ti-photo"></i> Foto Resep
                            </label>
                            <input type="file" name="foto" class="ar-file-input @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror

                            @if($resep->foto)
                                <div class="ar-photo-preview">
                                    <div class="ar-photo-badge">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                        Foto Saat Ini
                                    </div>
                                    <br>
                                    <img src="{{ asset('storage/' . $resep->foto) }}" alt="Foto resep">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="ar-form-group">
                            <label class="ar-label">
                                <i class="ti ti-file-text"></i> Deskripsi
                            </label>
                            <textarea name="deskripsi" class="ar-textarea @error('deskripsi') is-invalid @enderror" 
                                      rows="5" placeholder="Ceritakan tentang resep ini, asal-usulnya, atau tips khusus..." required>{{ old('deskripsi', $resep->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                {{-- Bahan-bahan --}}
                <div class="ar-section">
                    <div class="ar-section-icon">🥘</div>
                    <h3 class="ar-section-title">Bahan-bahan</h3>
                </div>

                <div class="ar-dynamic-container">
                    <div id="bahan-container">
                        @foreach(old('bahan', $resep->bahan ?? []) as $index => $item)
                            <div class="ar-field-group ar-animate">
                                <input type="text" name="bahan[{{ $index }}][nama]" class="ar-input" 
                                       value="{{ $item['nama'] ?? '' }}" 
                                       placeholder="Nama bahan (contoh: Bawang merah)" required>
                                <input type="text" name="bahan[{{ $index }}][jumlah]" class="ar-input" 
                                       value="{{ $item['jumlah'] ?? '' }}" 
                                       placeholder="Jumlah (contoh: 3 siung)" style="max-width:180px;">
                                <button type="button" class="ar-btn-remove remove-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ar-btn-add" id="btn-add-bahan">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Tambah Bahan
                    </button>
                </div>

                {{-- Langkah-langkah --}}
                <div class="ar-section">
                    <div class="ar-section-icon">📋</div>
                    <h3 class="ar-section-title">Langkah-langkah Memasak</h3>
                </div>

                <div class="ar-dynamic-container">
                    <div id="langkah-container">
                        @foreach(old('langkah', $resep->langkah ?? []) as $index => $step)
                            <div class="ar-field-group ar-animate">
                                <span class="ar-step-number">{{ $index + 1 }}</span>
                                <textarea name="langkah[{{ $index }}]" class="ar-textarea" rows="2" 
                                          placeholder="Jelaskan langkah ini secara detail..." required>{{ $step }}</textarea>
                                <button type="button" class="ar-btn-remove remove-item">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ar-btn-add" id="btn-add-langkah">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Tambah Langkah
                    </button>
                </div>

                {{-- Action Buttons --}}
                <div class="ar-actions">
                    <button type="submit" class="ar-btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Update Resep
                    </button>
                    <a href="{{ route('backend.resep.index') }}" class="ar-btn-secondary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                        Kembali
                    </a>
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
        div.className = 'ar-field-group ar-animate';
        div.innerHTML = `
            <input type="text" name="bahan[${bahanIndex}][nama]" class="ar-input" 
                   placeholder="Nama bahan (contoh: Bawang merah)" required>
            <input type="text" name="bahan[${bahanIndex}][jumlah]" class="ar-input" 
                   placeholder="Jumlah (contoh: 3 siung)" style="max-width:180px;">
            <button type="button" class="ar-btn-remove remove-item">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
            </button>
        `;
        container.appendChild(div);
        bahanIndex++;
    });

    // Tambah langkah
    document.getElementById('btn-add-langkah').addEventListener('click', function () {
        const container = document.getElementById('langkah-container');
        const div = document.createElement('div');
        div.className = 'ar-field-group ar-animate';
        div.innerHTML = `
            <span class="ar-step-number">${langkahIndex + 1}</span>
            <textarea name="langkah[${langkahIndex}]" class="ar-textarea" rows="2" 
                      placeholder="Jelaskan langkah ini secara detail..." required></textarea>
            <button type="button" class="ar-btn-remove remove-item">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
            </button>
        `;
        container.appendChild(div);
        langkahIndex++;
        updateStepNumbers();
    });

    // Hapus field
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item') || e.target.closest('.remove-item')) {
            const group = e.target.closest('.ar-field-group');
            group.style.animation = 'slideOut 0.25s ease';
            setTimeout(() => {
                group.remove();
                updateStepNumbers();
            }, 250);
        }
    });

    // Update nomor langkah
    function updateStepNumbers() {
        const steps = document.querySelectorAll('#langkah-container .ar-step-number');
        steps.forEach((step, index) => {
            step.textContent = index + 1;
        });
    }
});
</script>
@endsection