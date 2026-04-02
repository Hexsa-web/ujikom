<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Yummy Book</title>
	<!-- Bootstrap CSS -->
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
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
</head>

<body>
	<!--================Header Menu Area =================-->
	@include('layouts.component_frontend.navbar')
	<!--================Header Menu Area =================-->
<br>
	<!--================Canvus Menu Area =================-->
	
	<!--================End Canvus Menu Area =================-->

	<!--================ Start banner section =================-->
	<section class="home_banner relative">
		<div class="container-fluid pl-0">
			<div class="row justify-content-center align-items-center full_height">
				<div class="col-lg-6 p-0">
					<div class="banner_left d-flex justify-content-center flex-column">
						<h1>Yummy Book</h1>
						<p>Yummy Book adalah aplikasi berbasis web yang berfungsi sebagai buku resep digital, 
							di mana pengguna dapat mencari, melihat, dan menyimpan resep makanan, 
							sedangkan admin dapat mengelola data resep dan pengguna.
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="banner_right d-flex justify-content-center align-items-center">
						<div class="round-planet planet">
							<div class="round-planet planet2">
								<div class="round-planet planet3">
									<div class="shape shape1"></div>
									<div class="shape shape2"></div>
									<div class="shape shape3"></div>
									<div class="shape shape4"></div>
									<div class="shape shape5"></div>
									<div class="shape shape6"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img class="face-img img-fluid" src="{{ asset('assets/frontend/img/banner/home-banner.png') }}" alt="">
	</section>
	<!--================ End banner section =================-->

	<!--================ Top Dish Area =================-->
	<section class="top_dish_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title position-relative">
						<h1>Inspirasi Menu</h1>
						<hr>
						<div class="round-planet planet">
							<div class="round-planet planet2">
								<div class="shape shape1"></div>
								<div class="shape shape2"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="single_dish col-lg-4 col-md-6 text-center">
    <div class="thumb">
        <img 
            src="{{ asset('storage/cimol.jpg') }}" 
            alt="Bread Fruit Cheese Sandwich"
            style="
                width: 100%;
                max-width: 300px;
                height: 400px;
                object-fit: cover;
                border-radius: 12px;
                margin: 0 auto;
                display: block;
            "
        >
    </div>
    <h4>Cimol Bojot</h4>
    <p>Jajanan khas berbahan dasar aci yang kenyal dan “bojot” (meletup) di mulut saat digigit. 
		Digoreng garing di luar tapi tetap lembut di dalam, 
		lalu ditaburi bumbu gurih atau pedas sesuai selera.
		 Sensasi kriuk-kenyalnya bikin susah berhenti ngemil</p>
</div>

				<div class="single_dish col-lg-4 col-md-6 text-center">
					<div class="thumb">
        <img 
            src="{{ asset('storage/risol.jpg') }}" 
            alt="Bread Fruit Cheese Sandwich"
            style="
                width: 100%;
                max-width: 300px;
                height: 400px;
                object-fit: cover;
                border-radius: 12px;
                margin: 0 auto;
                display: block;
            "
        >
    </div>
					<h4>Risol Mayo</h4>
					<p>
						Camilan gurih dengan kulit risol yang renyah di luar dan lembut di dalam, 
						berisi smoked beef, telur, dan saus mayo yang creamy. Digoreng hingga keemasan,
						 rasanya perpaduan asin, gurih, dan lembut yang bikin nagih di setiap gigitan
						 Cocok buat teman santai atau camilan sore.
					</p>
				</div>

				<div class="single_dish col-lg-4 col-md-6 text-center">
					<div class="thumb">
        <img 
            src="{{ asset('storage/kentang.jpg') }}" 
            alt="Bread Fruit Cheese Sandwich"
            style="
                width: 100%;
                max-width: 300px;
                height: 400px;
                object-fit: cover;
                border-radius: 12px;
                margin: 0 auto;
                display: block;
            "
        >
    </div>
					<h4>Kentang goreng</h4>
					<p>
						Kentang goreng renyah di luar dan lembut di dalam, 
		disajikan hangat dengan cita rasa gurih yang bikin nagih.
					</p>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Top Dish Area =================-->

	<!--================ Menu Area =================-->
<!-- ==================== BAGIAN KATEGORI + RESEP (kopas ganti yang lama) ==================== -->

{{-- ============================================
     SECTION: Kategori & Daftar Resep
     Tema: Warm Orange — Playfair Display + Nunito
     ============================================ --}}

{{-- ===== GOOGLE FONTS ===== --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

{{-- ===== CSS ===== --}}
<style>
/* ---- Root Variables ---- */
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
    --shadow-card: 0 8px 32px rgba(180,80,30,0.10);
    --shadow-hover: 0 20px 48px rgba(180,80,30,0.18);
    --radius-card: 20px;
    --radius-btn:  99px;
    --font-display: 'Playfair Display', serif;
    --font-body:    'Nunito', sans-serif;
}

/* ---- Reset scoped ---- */
.resep-page * { box-sizing: border-box; }
.resep-page { font-family: var(--font-body); }

/* ============================================================
   SECTION 1 — HEADER KATEGORI
   ============================================================ */
.resep-hero {
    background: var(--cream);
    padding: 5rem 0 3rem;
    position: relative;
    overflow: hidden;
}

/* Dekorasi lingkaran latar */
.resep-hero::before,
.resep-hero::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}
.resep-hero::before {
    width: 320px; height: 320px;
    background: radial-gradient(circle, #ffd8c0 0%, transparent 70%);
    top: -80px; right: -80px;
    opacity: 0.6;
}
.resep-hero::after {
    width: 200px; height: 200px;
    background: radial-gradient(circle, #ffc4a0 0%, transparent 70%);
    bottom: -50px; left: -50px;
    opacity: 0.45;
}

/* Floating dots decoration */
.resep-hero .deco-dot {
    position: absolute;
    border-radius: 50%;
    background: var(--oren-mid);
    opacity: 0.25;
}
.resep-hero .deco-dot-1 { width:14px; height:14px; top:15%; left:8%; }
.resep-hero .deco-dot-2 { width:8px;  height:8px;  top:60%; left:12%; }
.resep-hero .deco-dot-3 { width:20px; height:20px; top:25%; right:12%; }
.resep-hero .deco-dot-4 { width:10px; height:10px; bottom:20%; right:7%; }

/* Hero inner */
.resep-hero-inner {
    position: relative;
    z-index: 2;
    text-align: center;
}

.resep-hero-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 72px; height: 72px;
    background: var(--oren);
    border-radius: 22px;
    font-size: 32px;
    margin-bottom: 1.4rem;
    box-shadow: 0 10px 30px rgba(255,107,53,0.40);
    animation: float 3.5s ease-in-out infinite;
}

@keyframes float {
    0%,100% { transform: translateY(0); }
    50%      { transform: translateY(-8px); }
}

.resep-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 900;
    color: var(--oren-dark);
    margin-bottom: 0.6rem;
    line-height: 1.15;
}

.resep-hero p {
    font-size: 1rem;
    color: var(--muted);
    font-weight: 600;
    margin-bottom: 1.4rem;
    letter-spacing: 0.02em;
}

.resep-hero-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 0;
}
.resep-hero-divider span {
    display: block;
    height: 4px;
    border-radius: 99px;
    background: var(--oren);
}
.resep-hero-divider span:nth-child(1),
.resep-hero-divider span:nth-child(3) { width: 40px; opacity: 0.45; }
.resep-hero-divider span:nth-child(2) { width: 70px; }

/* ============================================================
   SECTION 2 — FILTER BUTTONS
   ============================================================ */
.filter-section {
    background: var(--white);
    padding: 2.2rem 0 1.5rem;
    border-bottom: 1px solid #f5e6dc;
}

.filter-scroll-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    padding: 0 1rem;
}

.filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 22px;
    border-radius: var(--radius-btn);
    border: 1.5px solid #e8c8b5;
    background: var(--white);
    color: var(--muted);
    font-family: var(--font-body);
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.22s cubic-bezier(.4,0,.2,1);
    white-space: nowrap;
    letter-spacing: 0.01em;
    position: relative;
    overflow: hidden;
}

.filter-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: var(--oren-light);
    opacity: 0;
    transition: opacity 0.2s;
}

.filter-btn:hover {
    border-color: var(--oren);
    color: var(--oren-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 14px var(--oren-glow);
}
.filter-btn:hover::before { opacity: 1; }

.filter-btn.active {
    background: var(--oren);
    border-color: var(--oren);
    color: var(--white);
    box-shadow: 0 6px 20px rgba(255,107,53,0.38);
    transform: translateY(-2px);
}
.filter-btn.active::before { opacity: 0; }

.filter-btn .btn-icon {
    font-size: 15px;
    position: relative; z-index: 1;
}
.filter-btn .btn-label {
    position: relative; z-index: 1;
}
.filter-btn .btn-count {
    position: relative; z-index: 1;
    background: rgba(0,0,0,0.08);
    border-radius: 99px;
    padding: 1px 7px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0;
    transition: background 0.2s;
}
.filter-btn.active .btn-count {
    background: rgba(255,255,255,0.25);
    color: white;
}

/* ============================================================
   SECTION 3 — RESEP GRID
   ============================================================ */
.resep-grid-section {
    background: var(--oren-pale);
    padding: 3rem 0 5rem;
    position: relative;
}

/* Section title */
.resep-grid-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 2.2rem;
}

.resep-grid-title {
    font-family: var(--font-display);
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--brown-text);
}
.resep-grid-title span {
    color: var(--oren);
}

.resep-count-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--oren-light);
    border: 1.5px solid #ffd4b8;
    color: var(--oren-dark);
    font-size: 13px;
    font-weight: 700;
    padding: 6px 16px;
    border-radius: var(--radius-btn);
    transition: all 0.25s;
}

/* Grid */
.recipe-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
}

/* ---- Card ---- */
.recipe-card {
    background: var(--white);
    border-radius: var(--radius-card);
    overflow: hidden;
    border: 1px solid var(--card-border);
    box-shadow: var(--shadow-card);
    transition: transform 0.28s cubic-bezier(.4,0,.2,1),
                box-shadow 0.28s cubic-bezier(.4,0,.2,1),
                opacity 0.25s;
    display: flex;
    flex-direction: column;
    animation: cardIn 0.4s ease both;
}

@keyframes cardIn {
    from { opacity: 0; transform: translateY(18px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

.recipe-card:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: var(--shadow-hover);
}

.recipe-card.is-hidden {
    opacity: 0;
    transform: scale(0.92);
    pointer-events: none;
    position: absolute;
    visibility: hidden;
    width: 0; height: 0; overflow: hidden;
    padding: 0; margin: 0; border: none;
}

/* Card image */
.card-img-wrap {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    background: linear-gradient(135deg, #ffe0cc 0%, #ffd4b5 100%);
    flex-shrink: 0;
}

.card-img-wrap img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
    display: block;
}

.recipe-card:hover .card-img-wrap img {
    transform: scale(1.06);
}

/* Kategori label di atas gambar */
.card-cat-badge {
    position: absolute;
    bottom: 12px; left: 12px;
    background: rgba(255,255,255,0.92);
    color: var(--oren-dark);
    font-size: 11px;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: var(--radius-btn);
    border: 1px solid rgba(255,107,53,0.2);
    backdrop-filter: blur(4px);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Placeholder gambar jika kosong */
.card-img-placeholder {
    width: 100%; height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 56px;
}

/* Card body */
.card-body-custom {
    padding: 1.25rem 1.4rem 1.4rem;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.card-title-custom {
    font-family: var(--font-display);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--brown-text);
    margin-bottom: 0.5rem;
    line-height: 1.35;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-desc {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.65;
    flex: 1;
    margin-bottom: 1.1rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-footer-custom {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-top: 0.9rem;
    border-top: 1px solid #f5e8df;
    margin-top: auto;
}

.btn-lihat {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 20px;
    background: var(--oren);
    color: white;
    border: none;
    border-radius: var(--radius-btn);
    font-family: var(--font-body);
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s;
    box-shadow: 0 4px 14px rgba(255,107,53,0.3);
}

.btn-lihat:hover {
    background: var(--oren-dark);
    color: white;
    text-decoration: none;
    transform: translateX(2px);
    box-shadow: 0 6px 20px rgba(255,107,53,0.4);
}

.btn-lihat svg {
    width: 14px; height: 14px;
    transition: transform 0.2s;
}
.btn-lihat:hover svg { transform: translateX(3px); }

/* ---- Empty state ---- */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
}
.empty-state-icon {
    font-size: 56px;
    margin-bottom: 1rem;
    opacity: 0.5;
}
.empty-state p {
    color: var(--muted);
    font-size: 1rem;
    font-weight: 600;
}

/* ---- Responsive ---- */
@media (max-width: 768px) {
    .recipe-grid { grid-template-columns: 1fr 1fr; gap: 16px; }
    .resep-hero { padding: 3.5rem 0 2.5rem; }
    .filter-section { padding: 1.4rem 0 1rem; position: static; }
    .resep-grid-header { flex-direction: column; align-items: flex-start; }
}

@media (max-width: 480px) {
    .recipe-grid { grid-template-columns: 1fr; }
}
</style>

{{-- ===== SECTION 1: HERO HEADER ===== --}}
<section class="resep-page resep-hero">
    <div class="deco-dot deco-dot-1"></div>
    <div class="deco-dot deco-dot-2"></div>
    <div class="deco-dot deco-dot-3"></div>
    <div class="deco-dot deco-dot-4"></div>
    <div class="container">
        <div class="resep-hero-inner">
            <div class="resep-hero-icon">🍳</div>
            <h1>Kategori Resep</h1>
            <p>Temukan resep favorit dari berbagai kategori pilihan</p>
            <div class="resep-hero-divider">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>
</section>

{{-- ===== SECTION 2: FILTER TOMBOL ===== --}}
<div class="resep-page filter-section" id="filter-section">
    <div class="container">
        <div class="filter-scroll-wrap" id="category-buttons">

            {{-- Tombol Semua --}}
            <button class="filter-btn active" data-category="all">
                <span class="btn-icon">🍽️</span>
                <span class="btn-label">Semua Resep</span>
                <span class="btn-count">{{ $reseps->count() }}</span>
            </button>

            {{-- Tombol per Kategori --}}
            @foreach ($kategoris as $kategori)
                <button class="filter-btn" data-category="{{ $kategori->id }}">
                    <span class="btn-icon">
                        {{-- Ikon emoji otomatis berdasarkan nama (opsional, bisa dihapus) --}}
                        @php
                            $namaLower = strtolower($kategori->nama);
                            $icon = '🍴';
                            if (str_contains($namaLower, 'minum'))  $icon = '🥤';
                            elseif (str_contains($namaLower, 'kue') || str_contains($namaLower, 'dessert') || str_contains($namaLower, 'manis')) $icon = '🍮';
                            elseif (str_contains($namaLower, 'camil') || str_contains($namaLower, 'snack')) $icon = '🧆';
                            elseif (str_contains($namaLower, 'sarap') || str_contains($namaLower, 'pagi')) $icon = '🥞';
                            elseif (str_contains($namaLower, 'ayam')) $icon = '🍗';
                            elseif (str_contains($namaLower, 'ikan') || str_contains($namaLower, 'seafood')) $icon = '🐟';
                            elseif (str_contains($namaLower, 'sayur') || str_contains($namaLower, 'vegan')) $icon = '🥗';
                            elseif (str_contains($namaLower, 'sup') || str_contains($namaLower, 'soto')) $icon = '🍲';
                            elseif (str_contains($namaLower, 'nasi') || str_contains($namaLower, 'berat')) $icon = '🍛';
                        @endphp
                        {{ $icon }}
                    </span>
                    <span class="btn-label">{{ $kategori->nama }}</span>
                    <span class="btn-count">
                        {{ $reseps->where('kategori_id', $kategori->id)->count() }}
                    </span>
                </button>
            @endforeach

        </div>
    </div>
</div>

{{-- ===== SECTION 3: DAFTAR RESEP ===== --}}
<section class="resep-page resep-grid-section">
    <div class="container">

        <div class="resep-grid-header">
            <h2 class="resep-grid-title">Pilih <span>Resep</span></h2>
            <span class="resep-count-pill" id="resep-count">
                🍽️ <span id="resep-count-num">{{ $reseps->count() }}</span> resep tersedia
            </span>
        </div>

        <div class="recipe-grid" id="recipe-container">

            @forelse ($reseps as $resep)
                <div class="recipe-card" data-category="{{ $resep->kategori_id }}" style="animation-delay: {{ $loop->index * 0.05 }}s">

                    {{-- Gambar --}}
                    <div class="card-img-wrap">
                        @if($resep->foto)
                            <img src="{{ asset('storage/' . $resep->foto) }}"
                                 alt="{{ $resep->judul }}"
                                 loading="lazy">
                        @else
                            <div class="card-img-placeholder">
                                @php
                                    $nL = strtolower($resep->judul ?? '');
                                    $ei = '🍽️';
                                    if (str_contains($nL, 'nasi'))   $ei = '🍛';
                                    elseif (str_contains($nL, 'ayam')) $ei = '🍗';
                                    elseif (str_contains($nL, 'ikan') || str_contains($nL, 'udang')) $ei = '🐟';
                                    elseif (str_contains($nL, 'sup') || str_contains($nL, 'soto'))   $ei = '🍲';
                                    elseif (str_contains($nL, 'kue') || str_contains($nL, 'cake'))   $ei = '🎂';
                                    elseif (str_contains($nL, 'mie') || str_contains($nL, 'pasta'))  $ei = '🍜';
                                    elseif (str_contains($nL, 'sate'))  $ei = '🍡';
                                    elseif (str_contains($nL, 'jus') || str_contains($nL, 'es'))     $ei = '🥤';
                                    elseif (str_contains($nL, 'sayur')) $ei = '🥗';
                                    elseif (str_contains($nL, 'goreng')) $ei = '🍳';
                                @endphp
                                {{ $ei }}
                            </div>
                        @endif
                        {{-- Badge kategori di atas foto --}}
                        <span class="card-cat-badge">
                            {{ $resep->kategori->nama ?? 'Umum' }}
                        </span>
                    </div>

                    {{-- Body --}}
                    <div class="card-body-custom">
                        <h3 class="card-title-custom">{{ $resep->judul }}</h3>
                        <p class="card-desc">
                            {{ Str::limit(strip_tags($resep->deskripsi), 90) }}
                        </p>
                        <div class="card-footer-custom">
                            <a href="{{ route('resep.detail', $resep->id) }}" class="btn-lihat">
    Lihat Resep
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5 12h14M12 5l7 7-7 7"/>
    </svg>
</a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">🍽️</div>
                    <p>Belum ada resep yang tersedia.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>

{{-- ===== JAVASCRIPT FILTER ===== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons  = document.querySelectorAll('#category-buttons .filter-btn');
    const cards    = document.querySelectorAll('#recipe-container .recipe-card');
    const countNum = document.getElementById('resep-count-num');

    function filterByCategory(categoryId) {
        let visible = 0;

        cards.forEach(card => {
            const match = categoryId === 'all' || card.dataset.category === categoryId;
            if (match) {
                card.classList.remove('is-hidden');
                visible++;
            } else {
                card.classList.add('is-hidden');
            }
        });

        // Update counter
        if (countNum) countNum.textContent = visible;

        // Update tombol active
        buttons.forEach(btn => {
            btn.classList.toggle('active', btn.dataset.category === categoryId);
        });
    }

    // Klik tombol
    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            filterByCategory(this.dataset.category);
        });
    });

    // Default
    filterByCategory('all');
});
</script>
	<!--================End Book Table Area =================-->
	<!--================Member Area =================-->
	<!--================End Member Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/stellar.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.lightbox.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/isotope/isotope-min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/counter-up/jquery.counterup.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/mail-script.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/popup/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/swiper/js/swiper.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/vendors/scroll/jquery.mCustomScrollbar.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/theme.js') }}"></script>

  @yield('content')
  @include('layouts.component_frontend.footer')
</body>

</html>