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
    --amber:      #f0a500;
    --amber-lt:   rgba(240,165,0,0.12);
    --blue:       #4a9eff;
    --blue-lt:    rgba(74,158,255,0.12);
    --font-d:     'DM Serif Display', serif;
    --font-b:     'DM Sans', sans-serif;
}

/* ---- Page header ---- */
.ad-header {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 14px; margin-bottom: 1.8rem;
}
.ad-header-left h1 {
    font-family: var(--font-d, serif);
    font-size: 1.6rem; color: var(--txt-bright); margin: 0 0 2px;
}
.ad-header-left p { font-size: 13px; color: var(--txt-muted); margin: 0; }

.ad-header-actions { display: flex; gap: 8px; flex-wrap: wrap; }

.ad-btn {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 9px 18px; border-radius: 99px;
    font-size: 13px; font-weight: 600; text-decoration: none;
    cursor: pointer; transition: all 0.2s; border: none; font-family: inherit;
}
.ad-btn-gold {
    background: var(--gold); color: var(--navy);
    box-shadow: 0 4px 14px var(--gold-glow);
}
.ad-btn-gold:hover {
    background: var(--gold-dark); color: var(--navy); text-decoration: none;
    transform: translateY(-1px); box-shadow: 0 6px 20px rgba(232,197,71,0.3);
}
.ad-btn-ghost {
    background: rgba(255,255,255,0.05); border: 1px solid var(--bdr-mid); color: var(--txt-mid);
}
.ad-btn-ghost:hover { border-color: var(--gold); color: var(--gold); text-decoration: none; background: var(--gold-lt); }

/* ---- Main grid ---- */
.ad-grid { display: grid; grid-template-columns: 300px 1fr; gap: 18px; align-items: start; }
@media (max-width: 860px) { .ad-grid { grid-template-columns: 1fr; } }

/* ---- Photo card ---- */
.ad-photo-card {
    background: var(--navy-mid); border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}
.ad-photo-wrap {
    position: relative; height: 260px; overflow: hidden;
    background: linear-gradient(135deg, rgba(232,197,71,0.08), rgba(255,255,255,0.03));
}
.ad-photo-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }
.ad-photo-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center; font-size: 64px;
}
.ad-photo-cat {
    position: absolute; top: 12px; left: 12px;
    background: var(--gold); color: var(--navy);
    font-size: 10.5px; font-weight: 800;
    padding: 4px 12px; border-radius: 99px;
    letter-spacing: 0.05em; text-transform: uppercase;
}

.ad-photo-meta {
    padding: 1.2rem;
    display: flex; flex-direction: column; gap: 8px;
}
.ad-meta-row {
    display: flex; align-items: center; gap: 10px;
    font-size: 13px; color: var(--txt-mid);
}
.ad-meta-row svg { flex-shrink: 0; color: var(--gold); opacity: 0.7; }
.ad-meta-label { font-size: 10.5px; font-weight: 700; color: var(--txt-dim); text-transform: uppercase; letter-spacing: 0.06em; }
.ad-meta-val { font-weight: 600; color: var(--txt-bright); font-size: 13px; margin-top: 1px; }

.ad-status-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 99px;
    font-size: 12px; font-weight: 800;
}
.ad-status-ok   { background: var(--green-lt); color: var(--green); }
.ad-status-wait { background: var(--amber-lt); color: var(--amber); }
.ad-status-no   { background: var(--red-lt);   color: var(--red); }

/* ---- Info card ---- */
.ad-info-card {
    background: var(--navy-mid); border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}

.ad-section { padding: 1.6rem 1.8rem; border-bottom: 1px solid var(--bdr); }
.ad-section:last-of-type { border-bottom: none; }

.ad-section-head {
    display: flex; align-items: center; gap: 10px; margin-bottom: 1.2rem;
    padding-left: 12px; border-left: 3px solid var(--gold);
}
.ad-section-icon {
    width: 32px; height: 32px; border-radius: 8px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0;
}
.ad-section-title { font-size: 1rem; font-weight: 700; color: var(--txt-bright); margin: 0; }

/* Info table */
.ad-info-table { width: 100%; border-collapse: collapse; }
.ad-info-table tr td { padding: 7px 0; vertical-align: top; }
.ad-info-table tr td:first-child {
    font-size: 11px; font-weight: 700; color: var(--txt-dim);
    text-transform: uppercase; letter-spacing: 0.07em;
    width: 110px; padding-right: 16px; padding-top: 9px;
}
.ad-info-table tr td:last-child {
    font-size: 13.5px; color: var(--txt-mid); font-weight: 500; line-height: 1.6;
    border-bottom: 1px solid var(--bdr);
}
.ad-info-table tr:last-child td:last-child { border-bottom: none; }

/* Bahan list */
.ad-bahan { list-style: none; padding: 0; margin: 0; }
.ad-bahan li {
    display: flex; justify-content: space-between; align-items: center;
    padding: 9px 0; border-bottom: 1px dashed rgba(255,255,255,0.05); gap: 10px; font-size: 13.5px;
}
.ad-bahan li:last-child { border-bottom: none; }
.ad-bahan-name { display: flex; align-items: center; gap: 8px; font-weight: 600; color: var(--txt-bright); flex: 1; }
.ad-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--gold); opacity: 0.6; flex-shrink: 0; }
.ad-qty {
    font-size: 12px; color: var(--txt-dim); font-weight: 700;
    background: rgba(255,255,255,0.05); padding: 2px 10px;
    border-radius: 99px; border: 1px solid var(--bdr-mid); white-space: nowrap;
}

/* Langkah list */
.ad-steps { list-style: none; padding: 0; margin: 0; }
.ad-steps li {
    display: flex; gap: 12px; align-items: flex-start;
    padding: 10px 0; border-bottom: 1px dashed rgba(255,255,255,0.05);
    font-size: 13.5px; color: var(--txt-mid); line-height: 1.7;
}
.ad-steps li:last-child { border-bottom: none; }
.ad-step-num {
    width: 26px; height: 26px; border-radius: 50%;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.25);
    color: var(--gold); font-size: 11px; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; margin-top: 2px;
}
.ad-steps li:nth-child(even) .ad-step-num {
    background: rgba(232,197,71,0.18); border-color: rgba(232,197,71,0.35);
}

.ad-empty { font-size: 13px; color: var(--txt-dim); font-weight: 600; padding: 8px 0; }
</style>

<div>

    {{-- Header --}}
    <div class="ad-header">
        <div class="ad-header-left">
            <h1>Detail Resep</h1>
            <p>{{ $resep->judul }}</p>
        </div>
        <div class="ad-header-actions">
            <a href="{{ route('backend.resep.edit', $resep->id) }}" class="ad-btn ad-btn-gold">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Edit Resep
            </a>
            <a href="{{ route('backend.resep.index') }}" class="ad-btn ad-btn-ghost">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- Grid utama --}}
    <div class="ad-grid">

        {{-- Kolom kiri: foto + meta --}}
        <div class="ad-photo-card">
            <div class="ad-photo-wrap">
                @if($resep->foto)
                    <img src="{{ asset('storage/' . $resep->foto) }}" alt="{{ $resep->judul }}">
                @else
                    <div class="ad-photo-placeholder">
                        @php
                            $nL = strtolower($resep->judul ?? '');
                            $ei = '🍽️';
                            if      (str_contains($nL,'nasi'))                            $ei='🍛';
                            elseif  (str_contains($nL,'ayam'))                            $ei='🍗';
                            elseif  (str_contains($nL,'ikan')||str_contains($nL,'udang')) $ei='🐟';
                            elseif  (str_contains($nL,'sup')||str_contains($nL,'soto'))   $ei='🍲';
                            elseif  (str_contains($nL,'kue')||str_contains($nL,'cake'))   $ei='🎂';
                            elseif  (str_contains($nL,'mie'))                             $ei='🍜';
                            elseif  (str_contains($nL,'goreng'))                          $ei='🍳';
                        @endphp
                        {{ $ei }}
                    </div>
                @endif
                <span class="ad-photo-cat">{{ $resep->kategori->nama ?? 'Umum' }}</span>
            </div>

            <div class="ad-photo-meta">
                {{-- Status --}}
                <div>
                    <div class="ad-meta-label" style="margin-bottom:6px;">Status</div>
                    @if($resep->status == 'approved')
                        <span class="ad-status-badge ad-status-ok">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                            Approved
                        </span>
                    @elseif($resep->status == 'rejected')
                        <span class="ad-status-badge ad-status-no">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            Rejected
                        </span>
                    @else
                        <span class="ad-status-badge ad-status-wait">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Pending
                        </span>
                    @endif
                </div>

                <div style="height:1px;background:var(--bdr);margin:4px 0;"></div>

                {{-- Penerbit --}}
                <div class="ad-meta-row">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                    <div>
                        <div class="ad-meta-label">Penerbit</div>
                        <div class="ad-meta-val">{{ $resep->penerbit }}</div>
                    </div>
                </div>

                {{-- Kategori --}}
                <div class="ad-meta-row">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>
                    <div>
                        <div class="ad-meta-label">Kategori</div>
                        <div class="ad-meta-val">{{ $resep->kategori->nama ?? '-' }}</div>
                    </div>
                </div>

                {{-- Dibuat --}}
                <div class="ad-meta-row">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <div>
                        <div class="ad-meta-label">Dibuat</div>
                        <div class="ad-meta-val">{{ $resep->created_at->format('d M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom kanan: info detail --}}
        <div class="ad-info-card">

            {{-- Deskripsi --}}
            <div class="ad-section">
                <div class="ad-section-head">
                    <div class="ad-section-icon">📝</div>
                    <h2 class="ad-section-title">Informasi Resep</h2>
                </div>
                <table class="ad-info-table">
                    <tr>
                        <td>Judul</td>
                        <td>{{ $resep->judul }}</td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>{{ $resep->penerbit }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>{{ $resep->kategori->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>{{ $resep->deskripsi }}</td>
                    </tr>
                </table>
            </div>

            {{-- Bahan --}}
            <div class="ad-section">
                <div class="ad-section-head">
                    <div class="ad-section-icon">🥘</div>
                    <h2 class="ad-section-title">Bahan-bahan</h2>
                </div>
                @if(count($resep->bahan ?? []) > 0)
                    <ul class="ad-bahan">
                        @foreach($resep->bahan as $item)
                            <li>
                                <span class="ad-bahan-name">
                                    <span class="ad-dot"></span>
                                    @if(is_array($item)){{ $item['nama'] ?? '-' }}
                                    @else{{ $item }}
                                    @endif
                                </span>
                                @if(is_array($item) && !empty($item['jumlah']))
                                    <span class="ad-qty">{{ $item['jumlah'] }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="ad-empty">Belum ada daftar bahan.</p>
                @endif
            </div>

            {{-- Langkah --}}
            <div class="ad-section">
                <div class="ad-section-head">
                    <div class="ad-section-icon">📋</div>
                    <h2 class="ad-section-title">Langkah-langkah</h2>
                </div>
                @if(count($resep->langkah ?? []) > 0)
                    <ol class="ad-steps">
                        @foreach($resep->langkah as $step)
                            <li>
                                <span class="ad-step-num">{{ $loop->iteration }}</span>
                                <span>{{ $step }}</span>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p class="ad-empty">Belum ada langkah pembuatan.</p>
                @endif
            </div>

        </div>

    </div>

</div>

@endsection