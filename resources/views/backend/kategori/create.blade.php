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
    --gold-glow:  rgba(232,197,71,0.18);
    --txt-bright: #f5f0e8;
    --txt-mid:    #c8c0b0;
    --txt-muted:  #8a8070;
    --bdr:        rgba(255,255,255,0.07);
    --bdr-mid:    rgba(255,255,255,0.12);
    --green:      #2ecc71;
    --green-lt:   rgba(46,204,113,0.12);
    --font-d:     'DM Serif Display', serif;
    --font-b:     'DM Sans', sans-serif;
}

.kf-wrap * { box-sizing: border-box; }
.kf-wrap { font-family: var(--font-b); }

/* Header */
.kf-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 1.8rem; flex-wrap: wrap; gap: 12px;
}
.kf-header h1 {
    font-family: var(--font-d); font-size: 1.7rem;
    color: var(--txt-bright); margin: 0 0 2px;
}
.kf-header p { font-size: 13px; color: var(--txt-muted); margin: 0; }

.kf-breadcrumb {
    display: flex; align-items: center; gap: 8px;
    font-size: 12.5px; color: var(--txt-muted); margin-bottom: 12px;
}
.kf-breadcrumb a { color: var(--gold); text-decoration: none; transition: color 0.2s; }
.kf-breadcrumb a:hover { color: var(--gold-dark); }

/* Form Card */
.kf-card {
    background: var(--navy-mid); border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}

.kf-card-header {
    background: linear-gradient(135deg, var(--navy-light) 0%, var(--navy-mid) 100%);
    padding: 1.5rem 1.8rem; border-bottom: 1px solid var(--bdr-mid);
    display: flex; align-items: center; gap: 12px;
}
.kf-card-icon {
    width: 42px; height: 42px; border-radius: 12px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.kf-card-title {
    font-family: var(--font-d); font-size: 1.25rem;
    color: var(--txt-bright); margin: 0;
}

.kf-card-body { padding: 2rem 1.8rem; }

/* Form Group */
.kf-form-group { margin-bottom: 1.5rem; }

.kf-label {
    display: flex; align-items: center; gap: 6px;
    font-size: 13px; font-weight: 600; color: var(--txt-mid);
    margin-bottom: 0.6rem;
}
.kf-label i { color: var(--gold); font-size: 14px; }

.kf-input {
    width: 100%; background: var(--navy-light);
    border: 1px solid var(--bdr-mid); border-radius: 10px;
    color: var(--txt-bright); font-family: var(--font-b);
    font-size: 14px; padding: 0.75rem 1rem;
    outline: none; transition: all 0.2s;
}
.kf-input::placeholder { color: var(--txt-muted); }
.kf-input:focus {
    border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-lt);
}

/* Action Buttons */
.kf-actions {
    display: flex; gap: 12px; margin-top: 2rem;
    padding-top: 1.5rem; border-top: 1px solid var(--bdr-mid);
    flex-wrap: wrap;
}

.kf-btn-primary {
    display: inline-flex; align-items: center; gap: 10px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    color: var(--navy); font-family: var(--font-b);
    font-size: 14px; font-weight: 700; padding: 0.85rem 2rem;
    border: none; border-radius: 10px; cursor: pointer;
    transition: all 0.2s; text-decoration: none;
    box-shadow: 0 4px 16px var(--gold-glow);
}
.kf-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 22px rgba(232,197,71,0.3);
    color: var(--navy);
}

.kf-btn-secondary {
    display: inline-flex; align-items: center; gap: 8px;
    background: transparent; border: 1.5px solid var(--bdr-mid);
    color: var(--txt-mid); font-family: var(--font-b);
    font-size: 14px; font-weight: 600; padding: 0.8rem 1.8rem;
    border-radius: 10px; cursor: pointer; transition: all 0.2s;
    text-decoration: none;
}
.kf-btn-secondary:hover {
    border-color: var(--gold); color: var(--gold);
    transform: translateY(-2px);
}

/* Info Box */
.kf-info {
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    border-radius: 12px; padding: 1rem 1.2rem;
    margin-bottom: 1.5rem; display: flex; align-items: start; gap: 10px;
}
.kf-info-icon {
    width: 24px; height: 24px; border-radius: 6px;
    background: var(--gold); color: var(--navy);
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 700; flex-shrink: 0;
}
.kf-info-text {
    font-size: 12.5px; color: var(--gold); font-weight: 500; line-height: 1.5;
}

@media (max-width: 768px) {
    .kf-card-body { padding: 1.5rem 1.2rem; }
    .kf-actions { flex-direction: column; }
    .kf-btn-primary, .kf-btn-secondary { width: 100%; justify-content: center; }
}
</style>

<div class="kf-wrap">

    {{-- Breadcrumb --}}
    <div class="kf-breadcrumb">
        <a href="{{ route('backend.kategori.index') }}">📂 Data Kategori</a>
        <span>›</span>
        <span>Tambah Kategori</span>
    </div>

    {{-- Header --}}
    <div class="kf-header">
        <div>
            <h1>➕ Tambah Kategori</h1>
            <p>Buat kategori baru untuk mengorganisir resep</p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="kf-card">
        <div class="kf-card-header">
            <div class="kf-card-icon">🏷️</div>
            <h2 class="kf-card-title">Form Kategori Baru</h2>
        </div>

        <div class="kf-card-body">
            {{-- Info Box --}}
            <div class="kf-info">
                <div class="kf-info-icon">💡</div>
                <div class="kf-info-text">
                    Kategori membantu pengguna menemukan resep dengan lebih mudah. Gunakan nama yang jelas dan deskriptif seperti "Makanan Pembuka", "Dessert", atau "Masakan Indonesia".
                </div>
            </div>

            <form action="{{ route('backend.kategori.store') }}" method="POST">
                @csrf

                <div class="kf-form-group">
                    <label class="kf-label">
                        <i class="ti ti-tag"></i> Nama Kategori
                    </label>
                    <input type="text" 
                           name="nama" 
                           class="kf-input @error('nama') is-invalid @enderror" 
                           placeholder="Contoh: Makanan Tradisional"
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="kf-actions">
                    <button type="submit" class="kf-btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        Simpan Kategori
                    </button>
                    <a href="{{ route('backend.kategori.index') }}" class="kf-btn-secondary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"/>
                            <polyline points="12 19 5 12 12 5"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection