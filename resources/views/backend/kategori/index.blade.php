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
    --red:        #e05555;
    --red-lt:     rgba(224,85,85,0.12);
    --amber:      #f0a500;
    --amber-lt:   rgba(240,165,0,0.12);
    --font-d:     'DM Serif Display', serif;
    --font-b:     'DM Sans', sans-serif;
}

.kt-wrap * { box-sizing: border-box; }
.kt-wrap { font-family: var(--font-b); }

/* ---- Page header ---- */
.kt-header {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 16px;
    margin-bottom: 1.8rem;
}
.kt-header-left h1 {
    font-family: var(--font-d);
    font-size: 1.7rem; color: var(--txt-bright);
    margin: 0 0 2px;
}
.kt-header-left p { font-size: 13px; color: var(--txt-muted); margin: 0; }

.kt-btn-add {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 22px; border-radius: 99px;
    background: var(--gold); border: none; color: var(--navy);
    font-family: var(--font-b); font-size: 13.5px; font-weight: 700;
    text-decoration: none; cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 16px var(--gold-glow);
}
.kt-btn-add:hover {
    background: var(--gold-dark); color: var(--navy); text-decoration: none;
    transform: translateY(-1px); box-shadow: 0 6px 22px rgba(232,197,71,0.3);
}

/* ---- Stat cards ---- */
.kt-stats {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px;
    margin-bottom: 1.8rem;
}
.kt-stat {
    background: var(--navy-mid);
    border: 1px solid var(--bdr);
    border-radius: 16px; padding: 1.2rem 1.4rem;
    display: flex; align-items: center; gap: 14px;
    transition: border-color 0.2s, transform 0.2s;
}
.kt-stat:hover { border-color: var(--bdr-mid); transform: translateY(-2px); }
.kt-stat-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.kt-stat-num { font-size: 1.6rem; font-weight: 700; color: var(--txt-bright); line-height: 1; margin-bottom: 3px; }
.kt-stat-label { font-size: 11.5px; font-weight: 600; color: var(--txt-muted); text-transform: uppercase; letter-spacing: 0.05em; }

/* ---- Alert ---- */
.kt-alert {
    display: flex; align-items: center; gap: 10px;
    background: var(--green-lt); border: 1px solid rgba(46,204,113,0.25);
    border-radius: 12px; padding: 12px 16px;
    color: var(--green); font-size: 13.5px; font-weight: 600;
    margin-bottom: 1.4rem;
}
.kt-alert-close { margin-left: auto; background: none; border: none; color: var(--green); cursor: pointer; padding: 0; opacity: 0.7; }
.kt-alert-close:hover { opacity: 1; }

/* ---- Table card ---- */
.kt-card {
    background: var(--navy-mid);
    border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}

.kt-card-head {
    display: flex; align-items: center; justify-content: space-between;
    padding: 1.2rem 1.6rem;
    border-bottom: 1px solid var(--bdr);
    flex-wrap: wrap; gap: 10px;
}
.kt-card-head-title {
    display: flex; align-items: center; gap: 10px;
}
.kt-card-icon {
    width: 36px; height: 36px; border-radius: 10px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center; font-size: 16px;
}
.kt-card-title { font-family: var(--font-d); font-size: 1.1rem; color: var(--txt-bright); margin: 0; }
.kt-card-sub { font-size: 12px; color: var(--txt-muted); margin-top: 1px; }

/* ---- Table ---- */
.kt-table-wrap { overflow-x: auto; }
.kt-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
.kt-table thead tr {
    background: rgba(255,255,255,0.03);
    border-bottom: 1px solid var(--bdr-mid);
}
.kt-table th {
    padding: 12px 14px; text-align: left;
    font-size: 11px; font-weight: 700; color: var(--txt-muted);
    text-transform: uppercase; letter-spacing: 0.07em; white-space: nowrap;
}
.kt-table th.center { text-align: center; }
.kt-table td { padding: 13px 14px; border-bottom: 1px solid var(--bdr); vertical-align: middle; color: var(--txt-mid); }
.kt-table tbody tr:last-child td { border-bottom: none; }
.kt-table tbody tr { transition: background 0.15s; }
.kt-table tbody tr:hover { background: rgba(255,255,255,0.025); }
.kt-table td.center { text-align: center; }

/* Number cell */
.kt-num { font-size: 12px; font-weight: 700; color: var(--txt-muted); }

/* Category name */
.kt-cat-name {
    display: flex; align-items: center; gap: 10px;
}
.kt-cat-icon {
    width: 38px; height: 38px; border-radius: 10px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
}
.kt-cat-text { font-weight: 600; color: var(--txt-bright); font-size: 14px; }

/* Action buttons */
.kt-actions { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
.kt-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 32px; height: 32px; border-radius: 8px;
    border: 1px solid transparent; cursor: pointer;
    font-size: 14px; transition: all 0.18s; text-decoration: none;
    background: none;
}
.kt-btn-edit   { background: var(--amber-lt); color: var(--amber); border-color: rgba(240,165,0,0.2); }
.kt-btn-del    { background: var(--red-lt);   color: var(--red);   border-color: rgba(224,85,85,0.2); }
.kt-btn:hover  { filter: brightness(1.15); transform: scale(1.08); }
.kt-btn svg    { width: 15px; height: 15px; }

/* Footer */
.kt-footer {
    padding: 1rem 1.6rem;
    border-top: 1px solid var(--bdr);
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 8px;
}
.kt-footer-count { font-size: 12.5px; color: var(--txt-muted); font-weight: 500; }

/* Empty state */
.kt-empty { text-align: center; padding: 4rem 2rem; }
.kt-empty-icon { font-size: 48px; opacity: 0.3; margin-bottom: 1rem; }
.kt-empty p { color: var(--txt-muted); font-size: 14px; font-weight: 500; margin-bottom: 1rem; }

@media (max-width: 900px) {
    .kt-stats { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 540px) {
    .kt-stats { grid-template-columns: 1fr; }
    .kt-header { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="kt-wrap">

    {{-- Header --}}
    <div class="kt-header">
        <div class="kt-header-left">
            <h1>Data Kategori</h1>
            <p>Kelola kategori untuk mengorganisir resep</p>
        </div>
        <a href="{{ route('backend.kategori.create') }}" class="kt-btn-add">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Kategori
        </a>
    </div>

    {{-- Stat cards --}}
    <div class="kt-stats">
        @php
            $total = $kategoris->count();
        @endphp
        <div class="kt-stat">
            <div class="kt-stat-icon" style="background:var(--gold-lt);border:1px solid rgba(232,197,71,0.2);">📂</div>
            <div>
                <div class="kt-stat-num" style="color:var(--gold);">{{ $total }}</div>
                <div class="kt-stat-label">Total Kategori</div>
            </div>
        </div>
        <div class="kt-stat">
            <div class="kt-stat-icon" style="background:var(--green-lt);border:1px solid rgba(46,204,113,0.2);">✅</div>
            <div>
                <div class="kt-stat-num" style="color:var(--green);">{{ $total }}</div>
                <div class="kt-stat-label">Aktif</div>
            </div>
        </div>
        <div class="kt-stat">
            <div class="kt-stat-icon" style="background:var(--amber-lt);border:1px solid rgba(240,165,0,0.2);">🏷️</div>
            <div>
                <div class="kt-stat-num" style="color:var(--amber);">{{ $kategoris->sum(function($k) { return $k->reseps->count(); }) }}</div>
                <div class="kt-stat-label">Total Resep</div>
            </div>
        </div>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="kt-alert" id="kt-alert">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            {{ session('success') }}
            <button class="kt-alert-close" onclick="document.getElementById('kt-alert').remove()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    @endif

    {{-- Table card --}}
    <div class="kt-card">

        {{-- Card header --}}
        <div class="kt-card-head">
            <div class="kt-card-head-title">
                <div class="kt-card-icon">🏷️</div>
                <div>
                    <div class="kt-card-title">Daftar Kategori</div>
                    <div class="kt-card-sub">{{ $total }} kategori terdaftar</div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="kt-table-wrap">
            <table class="kt-table">
                <thead>
                    <tr>
                        <th class="center" style="width:60px;">No</th>
                        <th>Nama Kategori</th>
                        <th class="center" style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris as $item)
                        <tr>
                            <td class="center"><span class="kt-num">{{ $loop->iteration }}</span></td>

                            <td>
                                <div class="kt-cat-name">
                                    <div class="kt-cat-icon">📋</div>
                                    <span class="kt-cat-text">{{ $item->nama }}</span>
                                </div>
                            </td>

                            <td class="center">
                                <div class="kt-actions" style="justify-content:center;">
                                    {{-- Hapus --}}
                                    <form action="{{ route('backend.kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="kt-btn kt-btn-del" title="Hapus">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="kt-empty">
                                    <div class="kt-empty-icon">📂</div>
                                    <p>Belum ada kategori</p>
                                    <a href="{{ route('backend.kategori.create') }}" class="kt-btn-add" style="text-decoration:none;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        Tambah Kategori Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="kt-footer">
            <span class="kt-footer-count">Menampilkan {{ $total }} kategori</span>
        </div>
    </div>

</div>
@endsection