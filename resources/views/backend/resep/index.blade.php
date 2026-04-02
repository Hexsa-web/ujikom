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
    --blue:       #4a9eff;
    --blue-lt:    rgba(74,158,255,0.12);
    --font-d:     'DM Serif Display', serif;
    --font-b:     'DM Sans', sans-serif;
}

.ar-wrap * { box-sizing: border-box; }
.ar-wrap { font-family: var(--font-b); }

/* ---- Page header ---- */
.ar-header {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 16px;
    margin-bottom: 1.8rem;
}
.ar-header-left h1 {
    font-family: var(--font-d);
    font-size: 1.7rem; color: var(--txt-bright);
    margin: 0 0 2px;
}
.ar-header-left p { font-size: 13px; color: var(--txt-muted); margin: 0; }

.ar-btn-add {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 22px; border-radius: 99px;
    background: var(--gold); border: none; color: var(--navy);
    font-family: var(--font-b); font-size: 13.5px; font-weight: 700;
    text-decoration: none; cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 16px var(--gold-glow);
}
.ar-btn-add:hover {
    background: var(--gold-dark); color: var(--navy); text-decoration: none;
    transform: translateY(-1px); box-shadow: 0 6px 22px rgba(232,197,71,0.3);
}

/* ---- Stat cards ---- */
.ar-stats {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px;
    margin-bottom: 1.8rem;
}
.ar-stat {
    background: var(--navy-mid);
    border: 1px solid var(--bdr);
    border-radius: 16px; padding: 1.2rem 1.4rem;
    display: flex; align-items: center; gap: 14px;
    transition: border-color 0.2s, transform 0.2s;
}
.ar-stat:hover { border-color: var(--bdr-mid); transform: translateY(-2px); }
.ar-stat-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
}
.ar-stat-num { font-size: 1.6rem; font-weight: 700; color: var(--txt-bright); line-height: 1; margin-bottom: 3px; }
.ar-stat-label { font-size: 11.5px; font-weight: 600; color: var(--txt-muted); text-transform: uppercase; letter-spacing: 0.05em; }

/* ---- Alert ---- */
.ar-alert {
    display: flex; align-items: center; gap: 10px;
    background: var(--green-lt); border: 1px solid rgba(46,204,113,0.25);
    border-radius: 12px; padding: 12px 16px;
    color: var(--green); font-size: 13.5px; font-weight: 600;
    margin-bottom: 1.4rem;
}
.ar-alert-close { margin-left: auto; background: none; border: none; color: var(--green); cursor: pointer; padding: 0; opacity: 0.7; }
.ar-alert-close:hover { opacity: 1; }

/* ---- Table card ---- */
.ar-card {
    background: var(--navy-mid);
    border: 1px solid var(--bdr);
    border-radius: 20px; overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.2);
}

.ar-card-head {
    display: flex; align-items: center; justify-content: space-between;
    padding: 1.2rem 1.6rem;
    border-bottom: 1px solid var(--bdr);
    flex-wrap: wrap; gap: 10px;
}
.ar-card-head-title {
    display: flex; align-items: center; gap: 10px;
}
.ar-card-icon {
    width: 36px; height: 36px; border-radius: 10px;
    background: var(--gold-lt); border: 1px solid rgba(232,197,71,0.2);
    display: flex; align-items: center; justify-content: center; font-size: 16px;
}
.ar-card-title { font-family: var(--font-d); font-size: 1.1rem; color: var(--txt-bright); margin: 0; }
.ar-card-sub { font-size: 12px; color: var(--txt-muted); margin-top: 1px; }

/* Search bar */
.ar-search {
    position: relative; width: 220px;
}
.ar-search input {
    width: 100%; background: var(--navy-light);
    border: 1px solid var(--bdr-mid); border-radius: 99px;
    color: var(--txt-bright); font-family: var(--font-b);
    font-size: 13px; padding: 8px 14px 8px 36px;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
}
.ar-search input::placeholder { color: var(--txt-muted); }
.ar-search input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-lt); }
.ar-search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--txt-muted); pointer-events: none; }

/* ---- Table ---- */
.ar-table-wrap { overflow-x: auto; }
.ar-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
.ar-table thead tr {
    background: rgba(255,255,255,0.03);
    border-bottom: 1px solid var(--bdr-mid);
}
.ar-table th {
    padding: 12px 14px; text-align: left;
    font-size: 11px; font-weight: 700; color: var(--txt-muted);
    text-transform: uppercase; letter-spacing: 0.07em; white-space: nowrap;
}
.ar-table th.center { text-align: center; }
.ar-table td { padding: 13px 14px; border-bottom: 1px solid var(--bdr); vertical-align: middle; color: var(--txt-mid); }
.ar-table tbody tr:last-child td { border-bottom: none; }
.ar-table tbody tr { transition: background 0.15s; }
.ar-table tbody tr:hover { background: rgba(255,255,255,0.025); }
.ar-table td.center { text-align: center; }

/* Number cell */
.ar-num { font-size: 12px; font-weight: 700; color: var(--txt-muted); }

/* Foto */
.ar-photo {
    width: 52px; height: 52px; border-radius: 10px;
    object-fit: cover; border: 1.5px solid var(--bdr-mid);
    display: block;
}
.ar-photo-empty {
    width: 52px; height: 52px; border-radius: 10px;
    background: var(--navy-light); border: 1.5px dashed var(--bdr-mid);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; color: var(--txt-dim);
}

/* Title & desc */
.ar-title { font-weight: 600; color: var(--txt-bright); font-size: 13.5px; margin-bottom: 2px; }
.ar-publisher { font-size: 12px; color: var(--txt-muted); }
.ar-desc { font-size: 12.5px; color: var(--txt-muted); max-width: 220px; }

/* Badges */
.ar-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 99px;
    font-size: 11.5px; font-weight: 700; white-space: nowrap;
}
.ar-badge-cat  { background: var(--blue-lt);  color: var(--blue); }
.ar-badge-ok   { background: var(--green-lt); color: var(--green); }
.ar-badge-no   { background: var(--red-lt);   color: var(--red); }
.ar-badge-wait { background: var(--amber-lt); color: var(--amber); }

/* Action buttons */
.ar-actions { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
.ar-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 32px; height: 32px; border-radius: 8px;
    border: 1px solid transparent; cursor: pointer;
    font-size: 14px; transition: all 0.18s; text-decoration: none;
    background: none;
}
.ar-btn-view   { background: var(--blue-lt);  color: var(--blue);  border-color: rgba(74,158,255,0.2); }
.ar-btn-edit   { background: var(--amber-lt); color: var(--amber); border-color: rgba(240,165,0,0.2); }
.ar-btn-ok     { background: var(--green-lt); color: var(--green); border-color: rgba(46,204,113,0.2); }
.ar-btn-reject { background: var(--red-lt);   color: var(--red);   border-color: rgba(224,85,85,0.2); }
.ar-btn-del    { background: var(--red-lt);   color: var(--red);   border-color: rgba(224,85,85,0.2); }
.ar-btn:hover  { filter: brightness(1.15); transform: scale(1.08); }
.ar-btn svg    { width: 15px; height: 15px; }

/* Footer */
.ar-footer {
    padding: 1rem 1.6rem;
    border-top: 1px solid var(--bdr);
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 8px;
}
.ar-footer-count { font-size: 12.5px; color: var(--txt-muted); font-weight: 500; }

/* Empty state */
.ar-empty { text-align: center; padding: 4rem 2rem; }
.ar-empty-icon { font-size: 48px; opacity: 0.3; margin-bottom: 1rem; }
.ar-empty p { color: var(--txt-muted); font-size: 14px; font-weight: 500; margin-bottom: 1rem; }

@media (max-width: 900px) {
    .ar-stats { grid-template-columns: repeat(2, 1fr); }
    .ar-search { width: 160px; }
}
@media (max-width: 540px) {
    .ar-stats { grid-template-columns: 1fr 1fr; }
    .ar-header { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="ar-wrap">

    {{-- Header --}}
    <div class="ar-header">
        <div class="ar-header-left">
            <h1>Data Resep</h1>
            <p>Kelola seluruh resep yang masuk ke platform</p>
        </div>
        <a href="{{ route('backend.resep.create') }}" class="ar-btn-add">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Tambah Resep
        </a>
    </div>

    {{-- Stat cards --}}
    <div class="ar-stats">
        @php
            $total    = $reseps->count();
            $approved = $reseps->where('status','approved')->count();
            $pending  = $reseps->where('status','pending')->count();
            $rejected = $reseps->where('status','rejected')->count();
        @endphp
        <div class="ar-stat">
            <div class="ar-stat-icon" style="background:var(--gold-lt);border:1px solid rgba(232,197,71,0.2);">🍽️</div>
            <div>
                <div class="ar-stat-num" style="color:var(--gold);">{{ $total }}</div>
                <div class="ar-stat-label">Total Resep</div>
            </div>
        </div>
        <div class="ar-stat">
            <div class="ar-stat-icon" style="background:var(--green-lt);border:1px solid rgba(46,204,113,0.2);">✅</div>
            <div>
                <div class="ar-stat-num" style="color:var(--green);">{{ $approved }}</div>
                <div class="ar-stat-label">Disetujui</div>
            </div>
        </div>
        <div class="ar-stat">
            <div class="ar-stat-icon" style="background:var(--amber-lt);border:1px solid rgba(240,165,0,0.2);">⏳</div>
            <div>
                <div class="ar-stat-num" style="color:var(--amber);">{{ $pending }}</div>
                <div class="ar-stat-label">Menunggu</div>
            </div>
        </div>
        <div class="ar-stat">
            <div class="ar-stat-icon" style="background:var(--red-lt);border:1px solid rgba(224,85,85,0.2);">❌</div>
            <div>
                <div class="ar-stat-num" style="color:var(--red);">{{ $rejected }}</div>
                <div class="ar-stat-label">Ditolak</div>
            </div>
        </div>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="ar-alert" id="ar-alert">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            {{ session('success') }}
            <button class="ar-alert-close" onclick="document.getElementById('ar-alert').remove()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    @endif

    {{-- Table card --}}
    <div class="ar-card">

        {{-- Card header --}}
        <div class="ar-card-head">
            <div class="ar-card-head-title">
                <div class="ar-card-icon">📋</div>
                <div>
                    <div class="ar-card-title">Daftar Resep</div>
                    <div class="ar-card-sub">{{ $total }} resep terdaftar</div>
                </div>
            </div>
            <div class="ar-search">
                <svg class="ar-search-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="arSearch" placeholder="Cari resep..." oninput="filterTable(this.value)">
            </div>
        </div>

        {{-- Table --}}
        <div class="ar-table-wrap">
            <table class="ar-table" id="arTable">
                <thead>
                    <tr>
                        <th class="center" style="width:44px;">No</th>
                        <th class="center" style="width:68px;">Foto</th>
                        <th>Judul & Penerbit</th>
                        <th>Deskripsi</th>
                        <th class="center">Kategori</th>
                        <th class="center">Status</th>
                        <th class="center" style="width:160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reseps as $item)
                        <tr>
                            <td class="center"><span class="ar-num">{{ $loop->iteration }}</span></td>

                            <td class="center">
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         alt="{{ $item->judul }}" class="ar-photo">
                                @else
                                    <div class="ar-photo-empty">🍴</div>
                                @endif
                            </td>

                            <td>
                                <div class="ar-title">{{ $item->judul }}</div>
                                <div class="ar-publisher">👤 {{ $item->penerbit }}</div>
                            </td>

                            <td>
                                <div class="ar-desc">{{ Str::limit(strip_tags($item->deskripsi), 75) }}</div>
                            </td>

                            <td class="center">
                                <span class="ar-badge ar-badge-cat">
                                    {{ $item->kategori->nama ?? 'Umum' }}
                                </span>
                            </td>

                            <td class="center">
                                @if($item->status == 'approved')
                                    <span class="ar-badge ar-badge-ok">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                        Approved
                                    </span>
                                @elseif($item->status == 'rejected')
                                    <span class="ar-badge ar-badge-no">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                        Rejected
                                    </span>
                                @else
                                    <span class="ar-badge ar-badge-wait">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td class="center">
                                <div class="ar-actions" style="justify-content:center;">

                                    {{-- Detail --}}
                                    <a href="{{ route('backend.resep.show', $item->id) }}"
                                       class="ar-btn ar-btn-view" title="Lihat Detail">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('backend.resep.edit', $item->id) }}"
                                       class="ar-btn ar-btn-edit" title="Edit">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('backend.resep.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus resep ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="ar-btn ar-btn-del" title="Hapus">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        </button>
                                    </form>

                                    @if($item->status == 'pending')
                                        {{-- Approve --}}
                                        <form action="{{ route('backend.resep.approve', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Approve resep ini?')">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="ar-btn ar-btn-ok" title="Approve">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                            </button>
                                        </form>

                                        {{-- Reject --}}
                                        <form action="{{ route('backend.resep.reject', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Tolak resep ini?')">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="ar-btn ar-btn-reject" title="Tolak">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="ar-empty">
                                    <div class="ar-empty-icon">🍽️</div>
                                    <p>Belum ada data resep</p>
                                    <a href="{{ route('backend.resep.create') }}" class="ar-btn-add" style="text-decoration:none;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        Tambah Resep Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="ar-footer">
            <span class="ar-footer-count" id="arCount">Menampilkan {{ $total }} resep</span>
        </div>
    </div>

</div>
@endsection

@section('js')
<script>
function filterTable(q) {
    const rows = document.querySelectorAll('#arTable tbody tr');
    let visible = 0;
    rows.forEach(row => {
        const txt = row.textContent.toLowerCase();
        const match = txt.includes(q.toLowerCase());
        row.style.display = match ? '' : 'none';
        if (match) visible++;
    });
    document.getElementById('arCount').textContent = 'Menampilkan ' + visible + ' resep';
}
</script>
@endsection