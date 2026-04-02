{{-- NAVBAR RESEPKU - ENHANCED --}}

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- HERO BACKGROUND -->
<div class="hero-bg"></div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top" id="main-navbar">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('front.index') }}">
            <div class="brand-icon">🍳</div>
            <span class="brand-text">
                <span class="brand-resep">Yummy</span><span class="brand-ku">Book</span>
            </span>
        </a>

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false">
            <div class="toggler-bar"></div>
            <div class="toggler-bar"></div>
            <div class="toggler-bar"></div>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-1">

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'front.index' ? 'active' : '' }}"
                       href="{{ route('front.index') }}">Beranda</a>
                </li>
                <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('front.galeri') ? 'active' : '' }}"
       href="{{ route('front.galeri') }}">Galeri</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('front.tentang') ? 'active' : '' }}"
       href="{{ route('front.tentang') }}">Tentang</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('user.resep.create') ? 'active' : '' }}"
       href="{{ route('user.resep.create') }}">Tambah Resep</a>
</li>

                <!-- AUTH -->
                <li class="nav-item ms-3">
                    @guest
                        <a href="{{ route('login') }}" class="btn-masuk">
                            🙎🏻‍♂️ Masuk
                        </a>
                    @else
                        <div class="dropdown">
                            <button class="user-pill dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <div class="user-avatar">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                                <span class="user-name d-none d-md-inline">
                                    {{ Str::limit(Auth::user()->name, 16) }}
                                </span>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="dropdown-header-custom">
                                        <div class="dropdown-avatar">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="dropdown-user-name">{{ Auth::user()->name }}</div>
                                            <div class="dropdown-user-email">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                </li>
                                <li><hr class="dropdown-divider mx-3"></li>
                                <li>
    <a class="dropdown-item" href="{{ route('profile.index') }}">
        👤 Profil Saya
    </a>
</li>
                                <li><hr class="dropdown-divider mx-3"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        🚪 Keluar
                                    </a>
                                </li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- SCRIPT: NAVBAR HIDE ON SCROLL DOWN -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('main-navbar');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;

        if (currentScroll > lastScroll && currentScroll > 80) {
            navbar.style.transform = 'translateY(-100%)';
        } else {
            navbar.style.transform = 'translateY(0)';
        }

        navbar.classList.toggle('scrolled', currentScroll > 30);
        lastScroll = currentScroll;
    });
});
</script>

<!-- STYLE -->
<style>
:root {
    --oren:       #ff6b35;
    --oren-muda:  #ff9a6c;
    --oren-pale:  #fff3ed;
    --oren-border:#ffe0d2;
    --coklat-tua: #2d1200;
    --coklat-mid: #5a3a25;
    --coklat-soft:#a0734e;
}


/* ── NAVBAR SHELL ── */
#main-navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border-bottom: 1.5px solid var(--oren-border);
    box-shadow: 0 4px 24px rgba(255,107,53,0.07);
    padding: 10px 0;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    z-index: 9999;
}

#main-navbar.scrolled {
    box-shadow: 0 8px 32px rgba(255,107,53,0.13);
}

/* ── LOGO ── */
.brand-icon {
    width: 46px;
    height: 46px;
    background: linear-gradient(135deg, var(--oren), var(--oren-muda));
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.45rem;
    box-shadow: 0 4px 14px rgba(255,107,53,0.32);
    flex-shrink: 0;
    transition: transform 0.25s;
}

.navbar-brand:hover .brand-icon {
    transform: rotate(-6deg) scale(1.08);
}

.brand-text {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 800;
    line-height: 1;
}

.brand-resep { color: var(--oren); }
.brand-ku    { color: var(--coklat-tua); }

/* ── NAV LINKS ── */
.nav-link {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--coklat-mid);
    padding: 8px 16px !important;
    border-radius: 50px;
    transition: all 0.25s ease;
    position: relative;
}

.nav-link:hover {
    color: white;
    background: linear-gradient(135deg, var(--oren), var(--oren-muda));
    box-shadow: 0 4px 14px rgba(255,107,53,0.28);
    transform: translateY(-1px);
}

.nav-link.active {
    color: var(--oren);
    background: var(--oren-pale);
    font-weight: 700;
}

/* ── TOMBOL MASUK ── */
.btn-masuk {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, var(--oren), var(--oren-muda));
    color: white;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.875rem;
    font-weight: 700;
    padding: 9px 22px;
    border-radius: 50px;
    text-decoration: none;
    box-shadow: 0 4px 16px rgba(255,107,53,0.35);
    transition: all 0.25s ease;
    border: none;
}

.btn-masuk:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(255,107,53,0.45);
    background: linear-gradient(135deg, #e85a25, #ff8059);
}

/* ── USER PILL ── */
.user-pill {
    background: white;
    border: 1.5px solid var(--oren-border);
    border-radius: 50px;
    padding: 6px 14px 6px 6px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--coklat-mid);
    transition: all 0.25s;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(255,107,53,0.08);
}

.user-pill:hover {
    border-color: var(--oren);
    box-shadow: 0 4px 14px rgba(255,107,53,0.18);
}

.user-pill::after {
    filter: opacity(0.5);
}

/* ── AVATAR ── */
.user-avatar {
    width: 34px;
    height: 34px;
    background: linear-gradient(135deg, var(--oren), var(--oren-muda));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 800;
    flex-shrink: 0;
}

/* ── DROPDOWN MENU ── */
.dropdown-menu {
    border-radius: 18px;
    border: 1px solid var(--oren-border);
    box-shadow: 0 16px 48px rgba(0,0,0,0.12);
    padding: 8px;
    min-width: 220px;
    animation: fadeDown 0.22s ease;
}

.dropdown-header-custom {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 12px;
}

.dropdown-avatar {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--oren), var(--oren-muda));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 800;
    flex-shrink: 0;
}

.dropdown-user-name {
    font-weight: 700;
    font-size: 0.88rem;
    color: var(--coklat-tua);
    line-height: 1.2;
}

.dropdown-user-email {
    font-size: 0.75rem;
    color: var(--coklat-soft);
}

.dropdown-divider {
    border-color: var(--oren-border);
    opacity: 1;
}

.dropdown-item {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--coklat-mid);
    border-radius: 10px;
    padding: 9px 14px;
    transition: all 0.2s;
}

.dropdown-item:hover {
    background: var(--oren-pale);
    color: var(--oren);
}

.dropdown-item.text-danger:hover {
    background: #fff1f0;
    color: #e02020;
}

/* ── TOGGLER MOBILE ── */
.toggler-bar {
    width: 24px;
    height: 2.5px;
    background: var(--oren);
    border-radius: 3px;
    margin: 4px 0;
    transition: all 0.3s;
}

/* ── ANIMASI ── */
@keyframes fadeDown {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── RESPONSIVE ── */
@media (max-width: 991px) {
    #navbarNav {
        background: rgba(255,255,255,0.98);
        border-radius: 16px;
        border: 1.5px solid var(--oren-border);
        padding: 16px;
        margin-top: 10px;
        box-shadow: 0 12px 32px rgba(255,107,53,0.1);
    }

    .nav-link {
        border-radius: 12px;
    }

    .btn-masuk {
        width: 100%;
        justify-content: center;
        margin-top: 8px;
    }
}
</style>