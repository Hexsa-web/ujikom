@extends('layouts.backend')

@section('content')

<style>
:root {
    --navy:       #1a1a2e;
    --navy-mid:   #22223a;
    --navy-light: #2d2d48;
    --gold:       #e8c547;
    --gold-dark:  #c9a82e;
    --gold-lt:    rgba(232,197,71,0.10);
    --gold-glow:  rgba(232,197,71,0.22);
    --txt-bright: #f5f0e8;
    --txt-mid:    #c8c0b0;
    --txt-muted:  #8a8070;
    --txt-dim:    #5a5448;
    --bdr:        rgba(255,255,255,0.07);
    --bdr-mid:    rgba(255,255,255,0.13);
    --green:      #2ecc71;
    --green-lt:   rgba(46,204,113,0.10);
    --red:        #e05555;
    --red-lt:     rgba(224,85,85,0.10);
    --font-d:     'DM Serif Display', serif;
    --font-b:     'DM Sans', sans-serif;
}

/* ---- Page header ---- */
.ac-header {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 14px; margin-bottom: 1.8rem;
}
.ac-header-left h1 {
    font-family: var(--font-d, serif);
    font-size: 1.6rem; color: var(--txt-bright);
    margin: 0 0 2px;
}
.ac-header-left p { font-size: 13px; color: var(--txt-muted); margin: 0; }

.ac-btn-back {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 9px 18px; border-radius: 99px;
    border: 1px solid var(--bdr-mid); background: rgba(255,255,255,0.05);
    color: var(--txt-mid); font-size: 13px; font-weight: 600;
    text-decoration: none; transition: all 0.2s;
}
.ac-btn-back:hover {
    border-color: var(--gold); color: var(--gold); text-decoration: none;
    background: var(--gold-lt);
}

/* ---- Main card ---- */
.ac-card {
    background: var(--navy-mid); border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}

/* ---- Section ---- */
.ac-section {
    padding: 1.8rem 2rem; border-bottom: 1px solid var(--bdr);
}
.ac-section:last-of-type { border-bottom: none; }

.ac-section-head {
    display: flex; align-items: center; gap: 10px; margin-bottom: 1.4rem;
    padding-left: 12px; border-left: 3px solid var(--gold); border-radius: 1px;
}
.ac-section-icon {
    width: 34px; height: 34px; border-radius: 9px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0;
}
.ac-section-title { font-size: 1rem; font-weight: 700; color: var(--txt-bright); margin: 0; }
.ac-section-sub { font-size: 11.5px; color: var(--txt-muted); margin-top: 1px; }

/* ---- Form grid ---- */
.ac-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.ac-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
.ac-form-group { margin-bottom: 1.1rem; }
.ac-form-group:last-child { margin-bottom: 0; }

/* ---- Labels & inputs ---- */
.ac-label {
    display: block; font-size: 11px; font-weight: 700;
    color: var(--txt-muted); text-transform: uppercase;
    letter-spacing: 0.07em; margin-bottom: 6px;
}
.ac-label .req { color: var(--gold); margin-left: 2px; }

.ac-input {
    width: 100%; background: var(--navy-light);
    border: 1.5px solid var(--bdr-mid); border-radius: 11px;
    color: var(--txt-bright); font-size: 13.5px; font-weight: 500;
    padding: 10px 14px; outline: none;
    transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    font-family: inherit;
    -webkit-appearance: none;
}
.ac-input::placeholder { color: var(--txt-dim); }
.ac-input:focus { border-color: var(--gold); background: #252540; box-shadow: 0 0 0 3px var(--gold-lt); }
.ac-input.is-invalid { border-color: var(--red); }
select.ac-input { cursor: pointer; }
select.ac-input option { background: var(--navy-mid); color: var(--txt-bright); }
textarea.ac-input { resize: vertical; min-height: 120px; line-height: 1.7; }

/* File upload area */
.ac-file-wrap {
    position: relative; border: 1.5px dashed var(--bdr-mid);
    border-radius: 12px; background: var(--navy-light);
    padding: 1.6rem; text-align: center;
    transition: border-color 0.2s, background 0.2s; cursor: pointer;
}
.ac-file-wrap:hover { border-color: var(--gold); background: #252540; }
.ac-file-wrap input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }
.ac-file-icon {
    width: 40px; height: 40px; border-radius: 10px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; margin: 0 auto 0.6rem;
}
.ac-file-label { font-size: 13px; font-weight: 600; color: var(--txt-mid); }
.ac-file-label span { color: var(--gold); }
.ac-file-hint { font-size: 11px; color: var(--txt-dim); margin-top: 3px; font-weight: 600; }
.ac-file-preview { display: none; margin-top: 0.8rem; border-radius: 8px; overflow: hidden; }
.ac-file-preview img { width: 100%; height: 160px; object-fit: cover; display: block; }

/* Error */
.ac-error { font-size: 11.5px; color: var(--red); font-weight: 600; margin-top: 4px; display: flex; align-items: center; gap: 4px; }

/* ---- Dynamic list (bahan & langkah) ---- */
.ac-dynamic-list { display: flex; flex-direction: column; gap: 8px; margin-bottom: 10px; }

.ac-item-row {
    display: flex; align-items: center; gap: 8px;
    background: var(--navy-light); border: 1px solid var(--bdr-mid);
    border-radius: 11px; padding: 10px 12px;
    animation: acItemIn 0.25s ease both;
}
@keyframes acItemIn { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: translateY(0); } }

.ac-item-num {
    width: 26px; height: 26px; border-radius: 50%;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.25);
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 800; color: var(--gold); flex-shrink: 0;
}

.ac-item-input {
    flex: 1; background: transparent; border: none;
    color: var(--txt-bright); font-size: 13.5px; font-weight: 500;
    outline: none; font-family: inherit;
}
.ac-item-input::placeholder { color: var(--txt-dim); }

.ac-item-sep { width: 1px; height: 20px; background: var(--bdr-mid); flex-shrink: 0; }

.ac-item-del {
    width: 28px; height: 28px; border-radius: 8px;
    background: var(--red-lt); border: 1px solid rgba(224,85,85,0.2);
    color: var(--red); display: flex; align-items: center; justify-content: center;
    cursor: pointer; flex-shrink: 0; transition: all 0.18s;
    font-size: 13px; font-weight: 700; line-height: 1;
}
.ac-item-del:hover { background: var(--red); color: white; }

/* Tambah button */
.ac-btn-add {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 16px; border-radius: 99px;
    background: var(--green-lt); border: 1px solid rgba(46,204,113,0.25);
    color: var(--green); font-size: 12.5px; font-weight: 700;
    cursor: pointer; transition: all 0.18s; font-family: inherit;
}
.ac-btn-add:hover { background: var(--green); color: white; border-color: var(--green); }
.ac-btn-add svg { width: 14px; height: 14px; }

/* Empty hint */
.ac-empty-hint {
    display: flex; align-items: center; gap: 8px;
    padding: 12px 14px; border-radius: 10px;
    border: 1px dashed var(--bdr-mid); background: rgba(255,255,255,0.02);
    font-size: 12.5px; color: var(--txt-dim); font-weight: 600;
    margin-bottom: 8px;
}

/* ---- Submit section ---- */
.ac-submit-section {
    padding: 1.5rem 2rem 2rem;
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 12px;
    background: rgba(0,0,0,0.1); border-top: 1px solid var(--bdr);
}
.ac-submit-note { font-size: 12px; color: var(--txt-dim); display: flex; align-items: center; gap: 6px; }

.ac-btn-submit {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 12px 28px; border-radius: 99px;
    background: var(--gold); border: none; color: var(--navy);
    font-size: 14px; font-weight: 700; cursor: pointer;
    transition: all 0.22s; box-shadow: 0 5px 18px var(--gold-glow);
    font-family: inherit;
}
.ac-btn-submit:hover {
    background: var(--gold-dark); transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(232,197,71,0.35);
}
.ac-btn-submit:active { transform: translateY(0); }

.ac-btn-cancel {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 11px 20px; border-radius: 99px;
    border: 1px solid var(--bdr-mid); background: transparent; color: var(--txt-muted);
    font-size: 13px; font-weight: 600; text-decoration: none; transition: all 0.2s;
    font-family: inherit;
}
.ac-btn-cancel:hover { border-color: var(--txt-muted); color: var(--txt-mid); text-decoration: none; }

@media (max-width: 640px) {
    .ac-grid-2, .ac-grid-3 { grid-template-columns: 1fr; }
    .ac-section { padding: 1.3rem; }
    .ac-submit-section { flex-direction: column; align-items: stretch; }
    .ac-btn-submit, .ac-btn-cancel { width: 100%; justify-content: center; }
}
</style>

<div>

    {{-- Header --}}
    <div class="ac-header">
        <div class="ac-header-left">
            <h1>Tambah Resep Baru</h1>
            <p>Isi semua informasi resep dengan lengkap</p>
        </div>
        <a href="{{ route('backend.resep.index') }}" class="ac-btn-back">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali ke Daftar
        </a>
    </div>

    {{-- Form Card --}}
    <div class="ac-card">
    <form action="{{ route('backend.resep.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        {{-- SECTION 1: Info Dasar --}}
        <div class="ac-section">
            <div class="ac-section-head">
                <div class="ac-section-icon">📝</div>
                <div>
                    <div class="ac-section-title">Informasi Dasar</div>
                    <div class="ac-section-sub">Judul, penerbit, dan kategori resep</div>
                </div>
            </div>

            <div class="ac-grid-3">
                <div class="ac-form-group">
                    <label class="ac-label" for="judul">Judul Resep <span class="req">*</span></label>
                    <input type="text" id="judul" name="judul"
                           class="ac-input @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}"
                           placeholder="Nama resep..." required autofocus>
                    @error('judul')<p class="ac-error">⚠ {{ $message }}</p>@enderror
                </div>

                <div class="ac-form-group">
                    <label class="ac-label" for="penerbit">Penerbit <span class="req">*</span></label>
                    <input type="text" id="penerbit" name="penerbit"
                           class="ac-input @error('penerbit') is-invalid @enderror"
                           value="{{ old('penerbit') }}"
                           placeholder="Nama penulis..." required>
                    @error('penerbit')<p class="ac-error">⚠ {{ $message }}</p>@enderror
                </div>

                <div class="ac-form-group">
                    <label class="ac-label" for="kategori_id">Kategori <span class="req">*</span></label>
                    <select id="kategori_id" name="kategori_id"
                            class="ac-input @error('kategori_id') is-invalid @enderror" required>
                        <option value="">Pilih kategori...</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')<p class="ac-error">⚠ {{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- SECTION 2: Foto & Deskripsi --}}
        <div class="ac-section">
            <div class="ac-section-head">
                <div class="ac-section-icon">📸</div>
                <div>
                    <div class="ac-section-title">Foto & Deskripsi</div>
                    <div class="ac-section-sub">Gambar dan penjelasan singkat resep</div>
                </div>
            </div>

            <div class="ac-grid-2">
                <div class="ac-form-group">
                    <label class="ac-label">Foto Resep <span class="req">*</span></label>
                    <div class="ac-file-wrap" id="fileWrap">
                        <input type="file" name="foto" id="fotoInput"
                               class="@error('foto') is-invalid @enderror"
                               accept="image/*" required onchange="previewFoto(this)">
                        <div class="ac-file-icon" id="fileIcon">🖼️</div>
                        <div class="ac-file-label" id="fileLabel">Klik atau seret foto di sini <span>pilih file</span></div>
                        <div class="ac-file-hint" id="fileHint">JPG, PNG, WEBP — Maks. 5MB</div>
                        <div class="ac-file-preview" id="filePreview">
                            <img id="previewImg" src="" alt="Preview">
                        </div>
                    </div>
                    @error('foto')<p class="ac-error mt-1">⚠ {{ $message }}</p>@enderror
                </div>

                <div class="ac-form-group">
                    <label class="ac-label" for="deskripsi">Deskripsi <span class="req">*</span></label>
                    <textarea id="deskripsi" name="deskripsi" rows="7"
                              class="ac-input @error('deskripsi') is-invalid @enderror"
                              placeholder="Ceritakan keistimewaan resep ini..."
                              required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<p class="ac-error">⚠ {{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- SECTION 3: Bahan --}}
        <div class="ac-section">
            <div class="ac-section-head">
                <div class="ac-section-icon">🥘</div>
                <div>
                    <div class="ac-section-title">Bahan-bahan</div>
                    <div class="ac-section-sub">Tambah bahan satu per satu</div>
                </div>
            </div>

            <div id="bahan-list" class="ac-dynamic-list">
                <div class="ac-empty-hint" id="bahan-empty">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Klik tombol di bawah untuk menambah bahan
                </div>
            </div>

            <button type="button" class="ac-btn-add" id="btn-add-bahan">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Bahan
            </button>
        </div>

        {{-- SECTION 4: Langkah --}}
        <div class="ac-section">
            <div class="ac-section-head">
                <div class="ac-section-icon">📋</div>
                <div>
                    <div class="ac-section-title">Langkah-langkah</div>
                    <div class="ac-section-sub">Tambah langkah pembuatan secara berurutan</div>
                </div>
            </div>

            <div id="langkah-list" class="ac-dynamic-list">
                <div class="ac-empty-hint" id="langkah-empty">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    Klik tombol di bawah untuk menambah langkah
                </div>
            </div>

            <button type="button" class="ac-btn-add" id="btn-add-langkah">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Langkah
            </button>
        </div>

        {{-- Submit --}}
        <div class="ac-submit-section">
            <div class="ac-submit-note">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Semua field bertanda * wajib diisi
            </div>
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="{{ route('backend.resep.index') }}" class="ac-btn-cancel">Batal</a>
                <button type="submit" class="ac-btn-submit">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v14a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Resep
                </button>
            </div>
        </div>

    </form>
    </div>

</div>
@endsection

@section('js')
<script>
function previewFoto(input) {
    const wrap    = document.getElementById('fileWrap');
    const preview = document.getElementById('filePreview');
    const img     = document.getElementById('previewImg');
    const icon    = document.getElementById('fileIcon');
    const label   = document.getElementById('fileLabel');
    const hint    = document.getElementById('fileHint');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.style.display = 'block';
            icon.style.display    = 'none';
            label.textContent     = input.files[0].name;
            hint.textContent      = (input.files[0].size / 1024 / 1024).toFixed(2) + ' MB';
            wrap.style.borderStyle = 'solid';
            wrap.style.borderColor = '#e8c547';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    let bahanIdx   = 0;
    let langkahIdx = 0;

    function updateNums(container, prefix) {
        const items = container.querySelectorAll('.ac-item-row');
        items.forEach((row, i) => {
            const num = row.querySelector('.ac-item-num');
            if (num) num.textContent = i + 1;
        });
    }

    function toggleEmpty(listEl, emptyEl) {
        const hasItems = listEl.querySelectorAll('.ac-item-row').length > 0;
        emptyEl.style.display = hasItems ? 'none' : 'flex';
    }

    /* ---- Bahan ---- */
    document.getElementById('btn-add-bahan').addEventListener('click', function () {
        const list  = document.getElementById('bahan-list');
        const empty = document.getElementById('bahan-empty');
        const div   = document.createElement('div');
        div.className = 'ac-item-row';
        div.innerHTML = `
            <span class="ac-item-num">${list.querySelectorAll('.ac-item-row').length + 1}</span>
            <input type="text" name="bahan[${bahanIdx}][nama]"   class="ac-item-input" placeholder="Nama bahan..." required>
            <span class="ac-item-sep"></span>
            <input type="text" name="bahan[${bahanIdx}][jumlah]" class="ac-item-input" placeholder="Jumlah (cth: 500 gr)" style="max-width:140px;">
            <button type="button" class="ac-item-del remove-bahan" title="Hapus">✕</button>
        `;
        list.appendChild(div);
        bahanIdx++;
        toggleEmpty(list, empty);
        div.querySelector('.remove-bahan').addEventListener('click', function () {
            div.remove();
            updateNums(list, 'bahan');
            toggleEmpty(list, empty);
        });
    });

    /* ---- Langkah ---- */
    document.getElementById('btn-add-langkah').addEventListener('click', function () {
        const list  = document.getElementById('langkah-list');
        const empty = document.getElementById('langkah-empty');
        const num   = list.querySelectorAll('.ac-item-row').length + 1;
        const div   = document.createElement('div');
        div.className = 'ac-item-row';
        div.style.alignItems = 'flex-start';
        div.innerHTML = `
            <span class="ac-item-num" style="margin-top:2px;">${num}</span>
            <textarea name="langkah[${langkahIdx}]" class="ac-item-input" rows="2"
                      placeholder="Langkah ke-${num}..." required
                      style="resize:vertical;min-height:60px;"></textarea>
            <button type="button" class="ac-item-del remove-langkah" title="Hapus" style="margin-top:2px;">✕</button>
        `;
        list.appendChild(div);
        langkahIdx++;
        toggleEmpty(list, empty);
        div.querySelector('.remove-langkah').addEventListener('click', function () {
            div.remove();
            updateNums(list, 'langkah');
            toggleEmpty(list, empty);
        });
    });
});
</script>
@endsection