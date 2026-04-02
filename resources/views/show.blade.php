<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Tentang - Kami</title>

    <!-- CSS yang sama dengan welcome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
</head>

<body>

    <!-- Navbar -->
    @include('layouts.component_frontend.navbar')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<br><br>
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
    --brown-text:  #3d1f0d;
    --muted:       #9e7060;
    --card-border: #f0ddd0;
    --white:       #ffffff;
    --radius-lg:   24px;
    --radius-md:   14px;
    --radius-btn:  99px;
    --font-display:'Playfair Display', serif;
    --font-body:   'Nunito', sans-serif;
    --shadow-soft: 0 8px 40px rgba(180,80,30,0.10);
    --shadow-hover:0 20px 60px rgba(180,80,30,0.16);
}

.rsp-page * { box-sizing: border-box; }
.rsp-page { font-family: var(--font-body); background: var(--oren-pale); padding: 3rem 0 5rem; }

/* ---- Breadcrumb ---- */
.rsp-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    color: var(--muted);
    margin-bottom: 2rem;
}
.rsp-breadcrumb a {
    color: var(--oren-dark);
    text-decoration: none;
    transition: color 0.2s;
}
.rsp-breadcrumb a:hover { color: var(--oren); }
.rsp-breadcrumb .sep {
    width: 4px; height: 4px;
    background: var(--oren-mid);
    border-radius: 50%;
    opacity: 0.6;
}
.rsp-breadcrumb .current { color: var(--brown-text); }

/* ---- Hero card wrap ---- */
.rsp-hero-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-soft);
    border: 1px solid var(--card-border);
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 480px;
    margin-bottom: 2rem;
}

@media (max-width: 900px) {
    .rsp-hero-card { grid-template-columns: 1fr; }
}

/* Foto panel */
.rsp-photo-panel {
    position: relative;
    overflow: hidden;
    min-height: 340px;
}
.rsp-photo-panel img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}
.rsp-hero-card:hover .rsp-photo-panel img {
    transform: scale(1.04);
}
.rsp-photo-placeholder {
    width: 100%; height: 100%;
    min-height: 340px;
    background: linear-gradient(135deg, #ffe0cc 0%, #ffd4b5 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 80px;
}

/* Overlay gradient di bagian bawah foto */
.rsp-photo-overlay {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 100px;
    background: linear-gradient(to top, rgba(61,31,13,0.35), transparent);
    pointer-events: none;
}

/* Badge kategori atas foto */
.rsp-cat-badge {
    position: absolute;
    top: 16px; left: 16px;
    background: var(--oren);
    color: white;
    font-size: 11px;
    font-weight: 800;
    padding: 5px 14px;
    border-radius: var(--radius-btn);
    letter-spacing: 0.05em;
    text-transform: uppercase;
    box-shadow: 0 4px 12px rgba(255,107,53,0.4);
}

/* Info panel */
.rsp-info-panel {
    padding: 2.5rem 2.8rem;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
}

/* Dekorasi lingkaran pojok kanan atas */
.rsp-info-panel::before {
    content: '';
    position: absolute;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: radial-gradient(circle, #ffe0cc 0%, transparent 70%);
    top: -60px; right: -60px;
    opacity: 0.5;
    pointer-events: none;
}

.rsp-meta-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-bottom: 1.5rem;
}

.rsp-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 14px;
    border-radius: var(--radius-btn);
    font-size: 12px;
    font-weight: 700;
}
.rsp-badge-oren {
    background: var(--oren-light);
    color: var(--oren-dark);
    border: 1.5px solid #ffd4b8;
}
.rsp-badge-cream {
    background: var(--cream);
    color: var(--muted);
    border: 1.5px solid #e8d5c5;
}

.rsp-title {
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 900;
    color: var(--brown-text);
    line-height: 1.2;
    margin-bottom: 1rem;
}
.rsp-title em {
    font-style: italic;
    color: var(--oren);
}

.rsp-divider {
    width: 50px; height: 3px;
    background: var(--oren);
    border-radius: 99px;
    margin-bottom: 1.4rem;
}

.rsp-desc {
    font-size: 14.5px;
    color: var(--muted);
    line-height: 1.8;
    flex: 1;
    margin-bottom: 1.8rem;
}

/* Tombol kembali */
.rsp-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 24px;
    border-radius: var(--radius-btn);
    border: 1.5px solid var(--card-border);
    background: var(--white);
    color: var(--brown-text);
    font-family: var(--font-body);
    font-size: 13.5px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.22s;
    align-self: flex-start;
}
.rsp-back-btn:hover {
    background: var(--oren-light);
    border-color: var(--oren-mid);
    color: var(--oren-dark);
    text-decoration: none;
    transform: translateX(-3px);
}
.rsp-back-btn svg { width: 15px; height: 15px; }

/* ---- 2-kolom konten bawah ---- */
.rsp-content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .rsp-content-grid { grid-template-columns: 1fr; }
    .rsp-info-panel { padding: 1.8rem; }
}

.rsp-content-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    border: 1px solid var(--card-border);
    box-shadow: var(--shadow-soft);
    overflow: hidden;
}

/* Section header dalam card */
.rsp-section-head {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 1.4rem 1.8rem 1rem;
    border-bottom: 1px solid #f5e8df;
    margin-bottom: 0;
}
.rsp-section-icon {
    width: 38px; height: 38px;
    background: var(--oren-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}
.rsp-section-title {
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--brown-text);
    margin: 0;
}

/* ---- Bahan ---- */
.rsp-bahan-list {
    list-style: none;
    padding: 0.8rem 1.8rem 1.5rem;
    margin: 0;
}
.rsp-bahan-list li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 9px 0;
    border-bottom: 1px dashed #f0e0d5;
    font-size: 14px;
    gap: 12px;
}
.rsp-bahan-list li:last-child { border-bottom: none; }

.rsp-bahan-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--oren);
    flex-shrink: 0;
    margin-right: 2px;
    opacity: 0.7;
}
.rsp-bahan-nama {
    font-weight: 600;
    color: var(--brown-text);
    flex: 1;
    display: flex;
    align-items: center;
    gap: 8px;
}
.rsp-bahan-jumlah {
    color: var(--muted);
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
    background: var(--cream);
    padding: 2px 10px;
    border-radius: var(--radius-btn);
    border: 1px solid #edd5c0;
}

.rsp-empty-text {
    padding: 1.5rem 1.8rem;
    color: var(--muted);
    font-size: 13.5px;
    font-weight: 600;
}

/* ---- Langkah ---- */
.rsp-steps-list {
    list-style: none;
    padding: 0.8rem 1.8rem 1.5rem;
    margin: 0;
    counter-reset: steps;
}
.rsp-steps-list li {
    display: flex;
    gap: 14px;
    align-items: flex-start;
    padding: 12px 0;
    border-bottom: 1px dashed #f0e0d5;
    font-size: 14px;
    color: var(--brown-text);
    line-height: 1.7;
    counter-increment: steps;
}
.rsp-steps-list li:last-child { border-bottom: none; }

.rsp-step-num {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: var(--oren);
    color: white;
    font-size: 12px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 1px;
    box-shadow: 0 3px 10px rgba(255,107,53,0.3);
}
.rsp-steps-list li:nth-child(even) .rsp-step-num {
    background: var(--oren-dark);
}
</style>

<div class="rsp-page">
<div class="container">

    {{-- Hero Card --}}
    <div class="rsp-hero-card">

        {{-- Foto --}}
        <div class="rsp-photo-panel">
            @if($resep->foto)
                <img src="{{ asset('storage/' . $resep->foto) }}" alt="{{ $resep->judul }}">
            @else
                <div class="rsp-photo-placeholder">
                    @php
                        $nL = strtolower($resep->judul ?? '');
                        $ei = '🍽️';
                        if      (str_contains($nL, 'nasi'))                         $ei = '🍛';
                        elseif  (str_contains($nL, 'ayam'))                         $ei = '🍗';
                        elseif  (str_contains($nL, 'ikan') || str_contains($nL, 'udang')) $ei = '🐟';
                        elseif  (str_contains($nL, 'sup') || str_contains($nL, 'soto'))   $ei = '🍲';
                        elseif  (str_contains($nL, 'kue') || str_contains($nL, 'cake'))   $ei = '🎂';
                        elseif  (str_contains($nL, 'mie') || str_contains($nL, 'pasta'))  $ei = '🍜';
                        elseif  (str_contains($nL, 'sate'))                         $ei = '🍡';
                        elseif  (str_contains($nL, 'jus') || str_contains($nL, 'es'))     $ei = '🥤';
                        elseif  (str_contains($nL, 'sayur'))                        $ei = '🥗';
                        elseif  (str_contains($nL, 'goreng'))                       $ei = '🍳';
                    @endphp
                    {{ $ei }}
                </div>
            @endif
            <div class="rsp-photo-overlay"></div>
            <span class="rsp-cat-badge">{{ $resep->kategori->nama ?? 'Umum' }}</span>
        </div>

        {{-- Info --}}
        <div class="rsp-info-panel">
            <div class="rsp-meta-row">
                <span class="rsp-badge rsp-badge-oren">
                    🍴 {{ $resep->kategori->nama ?? 'Umum' }}
                </span>
                @if($resep->penerbit)
                <span class="rsp-badge rsp-badge-cream">
                    👤 {{ $resep->penerbit }}
                </span>
                @endif
            </div>
           <!-- Tombol Favorite yang Dipercantik -->
<div class="mb-4 text-end">
    <button id="favorite-btn" 
            class="favorite-btn-custom {{ $resep->isFavoritedBy(auth()->user()) ? 'active' : '' }}"
            data-resep-id="{{ $resep->id }}"
            onclick="toggleFavorite(this)">
        
        <i class="bi bi-heart{{ $resep->isFavoritedBy(auth()->user()) ? '-fill' : '' }} me-2"></i>
        <span id="favorite-text">
            {{ $resep->isFavoritedBy(auth()->user()) ? 'Sudah Difavoritkan' : 'Tambah ke Favorit' }}
        </span>
    </button>
</div>
<style>
    .favorite-btn-custom {
    padding: 12px 28px;
    border-radius: 50px;
    border: 2px solid #ff6b35;
    background: transparent;
    color: #ff6b35;
    font-weight: 700;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255,107,53,0.15);
}

.favorite-btn-custom:hover {
    background: #ff6b35;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255,107,53,0.3);
}

.favorite-btn-custom.active {
    background: #ff6b35;
    color: white;
    border-color: #ff6b35;
    box-shadow: 0 6px 20px rgba(255,107,53,0.4);
}

.favorite-btn-custom i {
    transition: transform 0.3s ease;
}

.favorite-btn-custom:hover i {
    transform: scale(1.2);
}

.favorite-btn-custom.active i {
    color: white;
}
</style>

            <h1 class="rsp-title">{{ $resep->judul }}</h1>
            <div class="rsp-divider"></div>

            <p class="rsp-desc">{!! nl2br(e($resep->deskripsi)) !!}</p>

            <a href="{{ url()->previous() }}" class="rsp-back-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali ke Daftar Resep
            </a>
        </div>

    </div>

    {{-- Bahan & Langkah --}}
    <div class="rsp-content-grid">

        {{-- Bahan-bahan --}}
        <div class="rsp-content-card">
            <div class="rsp-section-head">
                <div class="rsp-section-icon">🥘</div>
                <h2 class="rsp-section-title">Bahan-bahan</h2>
            </div>
            @if(count($resep->bahan ?? []) > 0)
                <ul class="rsp-bahan-list">
                    @foreach($resep->bahan as $item)
    <li>
        <span class="rsp-bahan-nama">
            <span class="rsp-bahan-dot"></span>

            {{-- kalau array --}}
            @if(is_array($item))
                {{ $item['nama'] ?? '-' }}
            {{-- kalau string --}}
            @else
                {{ $item }}
            @endif
        </span>

        {{-- jumlah hanya kalau array --}}
        @if(is_array($item) && !empty($item['jumlah']))
            <span class="rsp-bahan-jumlah">
                {{ $item['jumlah'] }}
            </span>
        @endif
    </li>
@endforeach
                </ul>
            @else
                <p class="rsp-empty-text">Belum ada daftar bahan.</p>
            @endif
        </div>

        {{-- Langkah-langkah --}}
        <div class="rsp-content-card">
            <div class="rsp-section-head">
                <div class="rsp-section-icon">📋</div>
                <h2 class="rsp-section-title">Langkah-langkah</h2>
            </div>
            @if(count($resep->langkah ?? []) > 0)
                <ol class="rsp-steps-list">
                    @foreach($resep->langkah as $step)
                        <li>
                            <span class="rsp-step-num">{{ $loop->iteration }}</span>
                            <span>{{ $step }}</span>
                        </li>
                    @endforeach
                </ol>
            @else
                <p class="rsp-empty-text">Belum ada langkah pembuatan.</p>
            @endif
        </div>

    </div>

</div>
</div>

        <!-- Footer -->
        @include('layouts.component_frontend.footer')

        <!-- Scripts -->
        <script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/theme.js') }}"></script>
        
        <!-- LightGallery JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lg-zoom.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lg-thumbnail.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#lightgallery").lightGallery({
                    selector: '.all-image',
                    download: false,
                    zoom: true,
                    thumbnail: true,
                    animateThumb: true,
                    showThumbByDefault: true,
                    mode: 'lg-slide',
                    speed: 400
                });
            });
        </script>

    </body>
    <script>
function toggleFavorite(btn) {
    const resepId = btn.getAttribute('data-resep-id');
    const icon = btn.querySelector('i');
    const text = document.getElementById('favorite-text');

    fetch(`/resep/${resepId}/favorite`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'added') {
            icon.classList.remove('bi-heart');
            icon.classList.add('bi-heart-fill');
            text.textContent = 'Sudah Difavoritkan';
            btn.classList.add('btn-danger');
            btn.classList.remove('btn-outline-danger');
        } else {
            icon.classList.remove('bi-heart-fill');
            icon.classList.add('bi-heart');
            text.textContent = 'Tambah ke Favorit';
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-outline-danger');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan. Silakan coba lagi.');
    });
}
</script>
    </html>