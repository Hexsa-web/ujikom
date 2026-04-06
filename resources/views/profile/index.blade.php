<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profil - ResepKu</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
    :root {
        --oren:        #ff6b35;
        --oren-dark:   #d94f1a;
        --oren-deep:   #b83d0e;
        --oren-light:  #fff3ee;
        --oren-pale:   #fff9f6;
        --oren-mid:    #ffb08a;
        --oren-glow:   rgba(255,107,53,0.18);
        --cream:       #fdf6f0;
        --brown:       #3d1f0d;
        --muted:       #9e7060;
        --border:      #f0ddd0;
        --white:       #ffffff;
        --green:       #27ae60;
        --green-lt:    rgba(39,174,96,0.10);
        --red:         #e05555;
        --red-lt:      rgba(224,85,85,0.10);
        --font-d:      'Playfair Display', serif;
        --font-b:      'Nunito', sans-serif;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
        font-family: var(--font-b);
        background: var(--cream);
        min-height: 100vh;
        overflow-x: hidden;
        padding-top: 80px;
    }

    /* ======== HERO BANNER ======== */
    .pf-hero {
        position: relative;
        background: var(--brown);
        overflow: hidden;
        padding: 3.5rem 0 0;
    }

    /* Dekorasi lingkaran */
    .pf-hero::before {
        content: '';
        position: absolute;
        width: 400px; height: 400px; border-radius: 50%;
        background: radial-gradient(circle, rgba(255,107,53,0.20) 0%, transparent 70%);
        top: -100px; right: -100px; pointer-events: none;
    }
    .pf-hero::after {
        content: '';
        position: absolute;
        width: 250px; height: 250px; border-radius: 50%;
        background: radial-gradient(circle, rgba(255,176,138,0.15) 0%, transparent 70%);
        bottom: 0; left: -60px; pointer-events: none;
    }

    /* Floating food emojis di banner */
    .pf-food-float {
        position: absolute;
        font-size: 22px; opacity: 0.12;
        pointer-events: none;
        animation: pffloat 5s ease-in-out infinite;
    }
    @keyframes pffloat {
        0%,100% { transform: translateY(0) rotate(-5deg); }
        50%      { transform: translateY(-14px) rotate(5deg); }
    }

    .pf-hero-inner {
        position: relative; z-index: 2;
        display: flex; flex-direction: column; align-items: center;
        text-align: center; padding-bottom: 0;
    }

    /* Avatar */
    .pf-avatar-wrap {
        position: relative; margin-bottom: 1.4rem;
    }
    .pf-avatar {
        width: 110px; height: 110px; border-radius: 50%;
        background: linear-gradient(135deg, var(--oren), var(--oren-mid));
        border: 4px solid rgba(255,255,255,0.15);
        box-shadow: 0 8px 30px rgba(0,0,0,0.3), 0 0 0 6px rgba(255,107,53,0.2);
        display: flex; align-items: center; justify-content: center;
        font-family: var(--font-d); font-size: 2.2rem; color: white; font-weight: 900;
    }
    .pf-avatar-badge {
        position: absolute; bottom: 4px; right: 4px;
        width: 28px; height: 28px; border-radius: 50%;
        background: var(--oren); border: 2.5px solid var(--brown);
        display: flex; align-items: center; justify-content: center;
        font-size: 13px;
    }

    /* User info */
    .pf-name {
        font-family: var(--font-d);
        font-size: 1.8rem; font-weight: 900; color: white;
        margin-bottom: 0.3rem; line-height: 1.2;
    }
    .pf-email {
        font-size: 13.5px; color: rgba(255,255,255,0.55);
        font-weight: 600; margin-bottom: 0.4rem;
    }
    .pf-join {
        display: inline-flex; align-items: center; gap: 5px;
        background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12);
        color: rgba(255,255,255,0.55); font-size: 11.5px; font-weight: 600;
        padding: 4px 12px; border-radius: 99px; margin-bottom: 1.8rem;
        letter-spacing: 0.03em;
    }

    /* Stat mini */
    .pf-stats-row {
        display: flex; gap: 1px;
        background: rgba(255,255,255,0.08);
        border-radius: 16px 16px 0 0; overflow: hidden;
        width: 100%; max-width: 440px;
    }
    .pf-stat {
        flex: 1; padding: 1rem;
        display: flex; flex-direction: column; align-items: center;
        background: rgba(255,255,255,0.06);
    }
    .pf-stat + .pf-stat { border-left: 1px solid rgba(255,255,255,0.07); }
    .pf-stat-num { font-size: 1.5rem; font-weight: 800; color: var(--oren-mid); line-height: 1; }
    .pf-stat-label { font-size: 10.5px; font-weight: 700; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.06em; margin-top: 3px; }

    /* ======== TABS ======== */
    .pf-tabs-wrap {
        background: var(--white);
        border-bottom: 1px solid var(--border);
    }
    .pf-tabs {
        display: flex; justify-content: center; gap: 4px;
        padding: 0.8rem 1rem; max-width: 500px; margin: 0 auto;
    }
    .pf-tab {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 22px; border-radius: 99px;
        border: 1.5px solid var(--border);
        background: transparent; color: var(--muted);
        font-family: var(--font-b); font-size: 13.5px; font-weight: 700;
        cursor: pointer; transition: all 0.2s; white-space: nowrap;
        text-decoration: none;
    }
    .pf-tab:hover { border-color: var(--oren-mid); color: var(--oren-dark); background: var(--oren-light); }
    .pf-tab.active {
        background: var(--oren); border-color: var(--oren); color: white;
        box-shadow: 0 4px 14px var(--oren-glow);
    }

    /* ======== CONTENT AREA ======== */
    .pf-content {
        background: var(--oren-pale);
        min-height: 60vh;
        padding: 2.5rem 0 4rem;
    }

    /* Tambah resep CTA bar */
    .pf-cta-bar {
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 12px;
        margin-bottom: 2rem;
    }
    .pf-cta-title {
        font-family: var(--font-d);
        font-size: 1.3rem; color: var(--brown);
    }
    .pf-cta-title span { color: var(--oren); font-style: italic; }
    .pf-btn-add {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 20px; border-radius: 99px;
        background: var(--oren); border: none; color: white;
        font-family: var(--font-b); font-size: 13px; font-weight: 700;
        text-decoration: none; cursor: pointer; transition: all 0.2s;
        box-shadow: 0 4px 14px var(--oren-glow);
    }
    .pf-btn-add:hover { background: var(--oren-dark); color: white; text-decoration: none; transform: translateY(-1px); box-shadow: 0 6px 20px var(--oren-glow); }

    /* ======== RECIPE CARDS ======== */
    .pf-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
    }

    .pf-card {
        background: var(--white);
        border-radius: 20px;
        border: 1px solid var(--border);
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(180,80,30,0.07);
        transition: transform 0.25s, box-shadow 0.25s;
        display: flex; flex-direction: column;
        animation: pfCardIn 0.4s ease both;
    }
    @keyframes pfCardIn {
        from { opacity: 0; transform: translateY(14px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }
    .pf-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(180,80,30,0.14);
    }

    /* Card image */
    .pf-card-img {
        position: relative; height: 180px; overflow: hidden;
        background: linear-gradient(135deg, #ffe0cc, #ffd4b5);
        flex-shrink: 0;
    }
    .pf-card-img img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        transition: transform 0.4s ease;
    }
    .pf-card:hover .pf-card-img img { transform: scale(1.06); }
    .pf-card-img-placeholder {
        width: 100%; height: 100%;
        display: flex; align-items: center; justify-content: center;
        font-size: 52px;
    }

    /* Status badge di atas foto */
    .pf-card-status {
        position: absolute; top: 10px; left: 10px;
        display: inline-flex; align-items: center; gap: 4px;
        padding: 4px 10px; border-radius: 99px;
        font-size: 10.5px; font-weight: 800;
        backdrop-filter: blur(6px); letter-spacing: 0.03em;
    }
    .pf-card-status.ok     { background: rgba(39,174,96,0.85);  color: white; }
    .pf-card-status.wait   { background: rgba(240,165,0,0.85);   color: white; }
    .pf-card-status.no     { background: rgba(224,85,85,0.85);   color: white; }

    /* Card body */
    .pf-card-body { padding: 1.1rem 1.3rem 1.3rem; display: flex; flex-direction: column; flex: 1; }
    .pf-card-title {
        font-family: var(--font-d);
        font-size: 1rem; font-weight: 700; color: var(--brown);
        margin-bottom: 0.4rem; line-height: 1.3;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    }
    .pf-card-desc {
        font-size: 12.5px; color: var(--muted); line-height: 1.65; flex: 1;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        margin-bottom: 1rem;
    }

    .pf-card-footer {
        display: flex; gap: 8px; align-items: center;
        padding-top: 0.8rem; border-top: 1px solid #f5e8df;
    }
    .pf-btn-view {
        flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 6px;
        padding: 8px 14px; border-radius: 99px;
        background: var(--oren); color: white; border: none;
        font-family: var(--font-b); font-size: 12.5px; font-weight: 700;
        text-decoration: none; transition: all 0.2s; cursor: pointer;
        box-shadow: 0 3px 10px var(--oren-glow);
    }
    .pf-btn-view:hover { background: var(--oren-dark); color: white; text-decoration: none; }

    .pf-btn-del {
        display: inline-flex; align-items: center; justify-content: center;
        width: 34px; height: 34px; border-radius: 99px;
        background: var(--red-lt); border: 1px solid rgba(224,85,85,0.2);
        color: var(--red); cursor: pointer; transition: all 0.2s;
    }
    .pf-btn-del:hover { background: var(--red); color: white; }
    .pf-btn-del svg { width: 14px; height: 14px; }

    /* ======== EMPTY STATE ======== */
    .pf-empty {
        text-align: center; padding: 3.5rem 1.5rem;
        background: var(--white); border-radius: 20px;
        border: 1px dashed var(--border);
    }
    .pf-empty-icon { font-size: 52px; opacity: 0.4; margin-bottom: 1rem; }
    .pf-empty p { color: var(--muted); font-size: 14px; font-weight: 600; margin-bottom: 1.2rem; }

    /* ======== RESPONSIVE ======== */
    @media (max-width: 640px) {
        .pf-grid { grid-template-columns: 1fr 1fr; gap: 14px; }
        .pf-stats-row { max-width: 100%; border-radius: 0; }
        .pf-cta-bar { flex-direction: column; align-items: flex-start; }
        .pf-btn-add { width: 100%; justify-content: center; }
    }
    @media (max-width: 400px) {
        .pf-grid { grid-template-columns: 1fr; }
    }
    </style>
</head>
<body>

    @include('layouts.component_frontend.navbar')

    {{-- ===== HERO BANNER ===== --}}
    <div class="pf-hero">
        {{-- Floating food --}}
        <span class="pf-food-float" style="top:18%;left:6%;animation-delay:0s;">🍳</span>
        <span class="pf-food-float" style="top:55%;left:3%;animation-delay:1.5s;font-size:16px;">🌶️</span>
        <span class="pf-food-float" style="top:15%;right:8%;animation-delay:0.8s;">🥘</span>
        <span class="pf-food-float" style="top:60%;right:5%;animation-delay:2s;font-size:18px;">🧄</span>
        <span class="pf-food-float" style="top:35%;right:14%;animation-delay:1s;font-size:14px;">🥄</span>
        <span class="pf-food-float" style="top:38%;left:11%;animation-delay:2.5s;font-size:15px;">🍴</span>

        <div class="container">
            <div class="pf-hero-inner">

                {{-- Avatar --}}
                <div class="pf-avatar-wrap">
                    <div class="pf-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="pf-avatar-badge">👨‍🍳</div>
                </div>

                {{-- Info --}}
                <div class="pf-name">{{ Auth::user()->name }}</div>
                <div class="pf-email">{{ Auth::user()->email }}</div>
                <div class="pf-join">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Bergabung sejak {{ Auth::user()->created_at->format('d M Y') }}
                </div>

                {{-- Stats --}}
                <div class="pf-stats-row">
                    <div class="pf-stat">
                        <div class="pf-stat-num">{{ $myReseps->count() }}</div>
                        <div class="pf-stat-label">Resep</div>
                    </div>
                    <div class="pf-stat">
                        <div class="pf-stat-num">{{ $myReseps->where('status','approved')->count() }}</div>
                        <div class="pf-stat-label">Disetujui</div>
                    </div>
                    <div class="pf-stat">
                        <div class="pf-stat-num">{{ $favorites->count() }}</div>
                        <div class="pf-stat-label">Favorit</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ===== TABS ===== --}}
    <div class="pf-tabs-wrap">
        <div class="pf-tabs">
            <button class="pf-tab active" onclick="switchTab('resep', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                Resep Saya
            </button>
            <button class="pf-tab" onclick="switchTab('favorit', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                Favorit Saya
            </button>
        </div>
    </div>

    {{-- ===== CONTENT ===== --}}
    <div class="pf-content">
        <div class="container">

            {{-- TAB: Resep Saya --}}
            <div id="tab-resep">
                <div class="pf-cta-bar">
                    <div class="pf-cta-title">Koleksi <span>Resepmu</span></div>
                    <a href="{{ route('user.resep.create') }}" class="pf-btn-add">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Tambah Resep
                    </a>
                </div>

                @if($myReseps->count() > 0)
                    <div class="pf-grid">
                        @foreach($myReseps as $i => $resep)
                            <div class="pf-card" style="animation-delay:{{ $i * 0.05 }}s">
                                <div class="pf-card-img">
                                    @if($resep->foto)
                                        <img src="{{ asset('storage/' . $resep->foto) }}" alt="{{ $resep->judul }}">
                                    @else
                                        <div class="pf-card-img-placeholder">
                                            @php
                                                $nl = strtolower($resep->judul ?? '');
                                                $ei = '🍽️';
                                                if      (str_contains($nl,'nasi'))                          $ei='🍛';
                                                elseif  (str_contains($nl,'ayam'))                          $ei='🍗';
                                                elseif  (str_contains($nl,'ikan')||str_contains($nl,'udang'))$ei='🐟';
                                                elseif  (str_contains($nl,'sup')||str_contains($nl,'soto'))  $ei='🍲';
                                                elseif  (str_contains($nl,'kue')||str_contains($nl,'cake'))  $ei='🎂';
                                                elseif  (str_contains($nl,'mie'))                           $ei='🍜';
                                                elseif  (str_contains($nl,'goreng'))                        $ei='🍳';
                                            @endphp
                                            {{ $ei }}
                                        </div>
                                    @endif
                                    @if(isset($resep->status))
                                        @if($resep->status == 'approved')
                                            <span class="pf-card-status ok">✓ Disetujui</span>
                                        @elseif($resep->status == 'rejected')
                                            <span class="pf-card-status no">✕ Ditolak</span>
                                        @else
                                            <span class="pf-card-status wait">⏳ Review</span>
                                        @endif
                                    @endif
                                </div>
                                <div class="pf-card-body">
                                    <div class="pf-card-title">{{ $resep->judul }}</div>
                                    <div class="pf-card-desc">{{ Str::limit(strip_tags($resep->deskripsi), 80) }}</div>
                                    <div class="pf-card-footer">
                                        <a href="{{ route('front.resep.show', $resep->id) }}" class="pf-btn-view">
                                            Lihat
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                        </a>
                                        <form action="{{ route('user.resep.destroy', $resep) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus resep ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="pf-btn-del" title="Hapus">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="pf-empty">
                        <div class="pf-empty-icon">👨‍🍳</div>
                        <p>Kamu belum membuat resep apapun.</p>
                        <a href="{{ route('user.resep.create') }}" class="pf-btn-add" style="text-decoration:none;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Buat Resep Pertama
                        </a>
                    </div>
                @endif
            </div>

            {{-- TAB: Favorit Saya --}}
            <div id="tab-favorit" style="display:none;">
                <div class="pf-cta-bar">
                    <div class="pf-cta-title">Resep <span>Favoritmu</span></div>
                </div>

                @if($favorites->count() > 0)
                    <div class="pf-grid">
                        @foreach($favorites as $i => $resep)
                            <div class="pf-card" style="animation-delay:{{ $i * 0.05 }}s">
                                <div class="pf-card-img">
                                    @if($resep->foto)
                                        <img src="{{ asset('storage/' . $resep->foto) }}" alt="{{ $resep->judul }}">
                                    @else
                                        <div class="pf-card-img-placeholder">🍽️</div>
                                    @endif
                                        @if($resep->status == 'approved')
        <span class="pf-card-status ok">✓ Disetujui</span>
    @elseif($resep->status == 'rejected')
        <span class="pf-card-status no">✕ Ditolak</span>
    @else
        <span class="pf-card-status wait">⏳ Review</span>
    @endif
                                    <span class="pf-card-status ok">♥ Favorit</span>
                                </div>
                                <div class="pf-card-body">
                                    <div class="pf-card-title">{{ $resep->judul }}</div>
                                    <div class="pf-card-desc">{{ Str::limit(strip_tags($resep->deskripsi), 80) }}</div>
                                    <div class="pf-card-footer">
                                        <a href="{{ route('front.resep.show', $resep->id) }}" class="pf-btn-view">
                                            Lihat Resep
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="pf-empty">
                        <div class="pf-empty-icon">🤍</div>
                        <p>Kamu belum memiliki resep favorit.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

    @include('layouts.component_frontend.footer')

    <script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/theme.js') }}"></script>

    <script>
    function switchTab(name, btn) {
        document.querySelectorAll('.pf-tab').forEach(t => t.classList.remove('active'));
        btn.classList.add('active');
        document.querySelectorAll('[id^="tab-"]').forEach(t => t.style.display = 'none');
        document.getElementById('tab-' + name).style.display = 'block';
        // Re-trigger animasi kartu
        document.querySelectorAll('#tab-' + name + ' .pf-card').forEach((c, i) => {
            c.style.animation = 'none';
            c.offsetHeight;
            c.style.animation = 'pfCardIn 0.4s ease ' + (i * 0.05) + 's both';
        });
    }
    </script>

</body>
</html>