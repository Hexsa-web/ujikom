<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar - ResepKu</title>

  <link rel="shortcut icon" href="{{ asset('asset/backend/images/logos/food-favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('asset/backend/css/styles.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

  <style>
    :root {
      --oren:       #ff6b35;
      --oren-dark:  #d94f1a;
      --oren-light: #fff3ee;
      --oren-pale:  #fff9f6;
      --oren-mid:   #ffb08a;
      --cream:      #fdf6f0;
      --brown:      #3d1f0d;
      --muted:      #9e7060;
      --border:     #f0ddd0;
      --white:      #ffffff;
      --font-d:     'Playfair Display', serif;
      --font-b:     'Nunito', sans-serif;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: var(--font-b);
      min-height: 100vh;
      background: var(--cream);
      overflow-x: hidden;
      overflow-y: auto;
    }

    #bg-img {
      position: fixed; inset: 0;
      background: url('{{ asset("storage/bg-food.jpg") }}') center/cover no-repeat;
      z-index: 0; filter: saturate(0.8);
    }
    #bg-overlay {
      position: fixed; inset: 0;
      background: linear-gradient(135deg,
        rgba(253,246,240,0.93) 0%,
        rgba(255,243,238,0.88) 50%,
        rgba(253,246,240,0.93) 100%);
      z-index: 1;
    }
    #particles-bg { position: fixed; inset: 0; z-index: 2; pointer-events: none; }

    /* ---- Floating emojis ---- */
    .food-float {
      position: fixed; opacity: 0.15;
      pointer-events: none; z-index: 5;
      animation: foodDrift linear infinite;
    }
    @keyframes foodDrift {
      0%   { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-100vh) rotate(360deg); }
    }

    /* ---- Wrapper ---- */
    .register-wrapper {
      position: relative; z-index: 10;
      min-height: 100vh;
      display: flex; align-items: center; justify-content: center;
      padding: 2.5rem 1rem;
    }

    /* ---- Kartu ---- */
    .register-card {
      width: 100%; max-width: 480px;
      background: rgba(255,255,255,0.97);
      border-radius: 28px;
      border: 1px solid var(--border);
      box-shadow:
        0 4px 6px rgba(180,80,30,0.04),
        0 20px 60px rgba(180,80,30,0.13),
        0 0 0 1px rgba(255,180,140,0.08);
      position: relative; overflow: visible;
      animation: cardRise 0.55s cubic-bezier(.4,0,.2,1) both;
    }
    @keyframes cardRise {
      from { opacity: 0; transform: translateY(28px) scale(0.97); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
    }
    .register-card::before {
      content: ''; position: absolute;
      width: 170px; height: 170px; border-radius: 50%;
      background: radial-gradient(circle, #ffd4b8 0%, transparent 70%);
      top: -55px; right: -55px; pointer-events: none; z-index: -1;
    }
    .register-card::after {
      content: ''; position: absolute;
      width: 110px; height: 110px; border-radius: 50%;
      background: radial-gradient(circle, #ffd4b8 0%, transparent 70%);
      bottom: -35px; left: -35px; pointer-events: none; z-index: -1;
    }

    /* ---- Ilustrasi alat masak ---- */
    .tools-wrap {
      display: flex; justify-content: center;
      padding-top: 2.2rem; margin-bottom: -6px;
      position: relative; z-index: 1;
    }
    .tools-svg {
      width: 200px; height: 120px;
      filter: drop-shadow(0 8px 18px rgba(180,80,30,0.16));
      animation: toolsFloat 4s ease-in-out infinite;
    }
    @keyframes toolsFloat {
      0%,100% { transform: translateY(0) rotate(-0.5deg); }
      50%      { transform: translateY(-10px) rotate(0.5deg); }
    }

    /* ---- Header ---- */
    .register-header { padding: 1.2rem 2.5rem 0; text-align: center; }
    .reg-brand { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 0.7rem; }
    .reg-brand-icon {
      width: 36px; height: 36px; border-radius: 10px;
      background: var(--oren);
      display: flex; align-items: center; justify-content: center;
      font-size: 16px; box-shadow: 0 4px 12px rgba(255,107,53,0.35);
    }
    .reg-brand-name { font-family: var(--font-d); font-size: 1.4rem; font-weight: 900; color: var(--oren-dark); }
    .reg-title { font-family: var(--font-d); font-size: 1.6rem; font-weight: 900; color: var(--brown); line-height: 1.2; margin-bottom: 0.3rem; }
    .reg-title span { color: var(--oren); font-style: italic; }
    .reg-subtitle { font-size: 13px; color: var(--muted); font-weight: 600; }
    .reg-divider { display: flex; align-items: center; gap: 6px; justify-content: center; margin: 0.9rem 0 0.2rem; }
    .reg-divider span { display: block; height: 3px; border-radius: 99px; background: var(--oren); }
    .reg-divider span:nth-child(1), .reg-divider span:nth-child(3) { width: 30px; opacity: 0.35; }
    .reg-divider span:nth-child(2) { width: 50px; }

    /* ---- Form ---- */
    .register-body { padding: 0.8rem 2.5rem 1.5rem; }
    .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .form-group { margin-bottom: 1rem; }
    .form-label-custom { display: flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 700; color: var(--brown); margin-bottom: 6px; }
    .form-input-wrap { position: relative; }
    .form-input-custom {
      width: 100%; padding: 11px 42px 11px 44px;
      border-radius: 13px; border: 1.5px solid var(--border);
      background: var(--oren-pale);
      font-family: var(--font-b); font-size: 13.5px; font-weight: 600; color: var(--brown);
      transition: border-color 0.2s, box-shadow 0.2s, background 0.2s; outline: none;
    }
    .form-input-custom::placeholder { color: #c9a898; font-weight: 600; }
    .form-input-custom:focus { border-color: var(--oren); background: var(--white); box-shadow: 0 0 0 4px rgba(255,107,53,0.1); }
    .form-input-custom.is-invalid { border-color: #e74c3c; background: #fff5f5; }
    .form-input-custom.no-toggle { padding-right: 16px; }
    .input-icon { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--oren-mid); pointer-events: none; }
    .input-toggle-pw { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 0; color: var(--muted); display: flex; align-items: center; transition: color 0.2s; }
    .input-toggle-pw:hover { color: var(--oren); }
    .form-error { font-size: 11.5px; color: #e74c3c; font-weight: 600; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
    .pw-strength-bar { height: 4px; border-radius: 99px; background: #f0e0d5; margin-top: 6px; overflow: hidden; }
    .pw-strength-fill { height: 100%; border-radius: 99px; width: 0%; transition: width 0.3s, background 0.3s; }
    .pw-strength-text { font-size: 11px; font-weight: 700; margin-top: 3px; color: var(--muted); }

    /* ---- Submit ---- */
    .btn-submit {
      width: 100%; padding: 13px; border-radius: 14px; border: none;
      background: var(--oren); color: white;
      font-family: var(--font-b); font-size: 14.5px; font-weight: 800;
      cursor: pointer; transition: all 0.22s cubic-bezier(.4,0,.2,1);
      box-shadow: 0 6px 20px rgba(255,107,53,0.35);
      display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 0.6rem;
    }
    .btn-submit:hover { background: var(--oren-dark); transform: translateY(-2px); box-shadow: 0 10px 28px rgba(255,107,53,0.42); }
    .btn-submit:active { transform: translateY(0); box-shadow: 0 4px 12px rgba(255,107,53,0.3); }

    /* ---- Footer ---- */
    .register-footer { text-align: center; padding: 0 2.5rem 2rem; }
    .reg-footer-link { font-size: 13px; color: var(--muted); font-weight: 600; }
    .reg-footer-link a { color: var(--oren-dark); font-weight: 800; text-decoration: none; transition: color 0.2s; }
    .reg-footer-link a:hover { color: var(--oren); }
    .reg-copy { font-size: 11px; color: #c9a898; font-weight: 600; margin-top: 0.7rem; }

    @media (max-width: 520px) {
      .form-row-2 { grid-template-columns: 1fr; }
      .register-card { border-radius: 20px; }
      .register-header, .register-body, .register-footer { padding-left: 1.5rem; padding-right: 1.5rem; }
      .tools-svg { width: 160px; height: 96px; }
    }
  </style>
</head>

<body>
  <div id="bg-img"></div>
  <div id="bg-overlay"></div>
  <div id="particles-bg"></div>

  <!-- Floating emojis alat masak -->
  <div class="food-float" style="left:4%;  top:92%; font-size:20px; animation-duration:13s; animation-delay:0s;">🫙</div>
  <div class="food-float" style="left:13%; top:88%; font-size:17px; animation-duration:16s; animation-delay:2s;">🥄</div>
  <div class="food-float" style="left:82%; top:90%; font-size:22px; animation-duration:12s; animation-delay:1s;">🍴</div>
  <div class="food-float" style="left:91%; top:85%; font-size:16px; animation-duration:14s; animation-delay:3s;">🫕</div>
  <div class="food-float" style="left:72%; top:94%; font-size:20px; animation-duration:17s; animation-delay:0.5s;">🧂</div>
  <div class="food-float" style="left:28%; top:96%; font-size:18px; animation-duration:11s; animation-delay:4s;">🥘</div>

  <div class="register-wrapper">
    <div class="register-card">

      <!-- ===== ILUSTRASI ALAT MASAK SVG ===== -->
      <div class="tools-wrap">
        <svg class="tools-svg" viewBox="0 0 200 120" fill="none" xmlns="http://www.w3.org/2000/svg">

          <!-- Bayangan -->
          <ellipse cx="100" cy="115" rx="72" ry="5" fill="rgba(180,80,30,0.10)"/>

          <!-- ======= PISAU CHEF (kiri, miring) ======= -->
          <g transform="translate(8,10) rotate(-30, 40, 60)">
            <rect x="4" y="54" width="32" height="11" rx="5.5" fill="#5a2e10"/>
            <rect x="5" y="55.5" width="30" height="8" rx="4" fill="#7a4020"/>
            <line x1="10" y1="55.5" x2="10" y2="63.5" stroke="rgba(80,30,10,0.25)" stroke-width="0.7"/>
            <line x1="18" y1="55.5" x2="18" y2="63.5" stroke="rgba(80,30,10,0.25)" stroke-width="0.7"/>
            <line x1="26" y1="55.5" x2="26" y2="63.5" stroke="rgba(80,30,10,0.25)" stroke-width="0.7"/>
            <circle cx="11" cy="59.5" r="2" fill="#c0603a"/>
            <circle cx="20" cy="59.5" r="2" fill="#c0603a"/>
            <circle cx="29" cy="59.5" r="2" fill="#c0603a"/>
            <rect x="34" y="52" width="6" height="15" rx="1.5" fill="#999"/>
            <rect x="34.5" y="52.5" width="5" height="14" rx="1" fill="#bbb"/>
            <path d="M40 54 L92 46 L92 56 L40 67 Z" fill="#ccc"/>
            <path d="M40 54 L92 46 L92 51 L40 61 Z" fill="#e0e0e0"/>
            <line x1="40" y1="54" x2="92" y2="46" stroke="#bbb" stroke-width="1"/>
            <path d="M52 55 L80 50" stroke="rgba(255,255,255,0.65)" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M56 59 L74 55" stroke="rgba(255,255,255,0.35)" stroke-width="1" stroke-linecap="round"/>
          </g>

          <!-- ======= SPATULA (tengah) ======= -->
          <g transform="translate(80,0) rotate(8, 20, 60)">
            <rect x="15" y="5" width="9" height="46" rx="4.5" fill="#c0603a"/>
            <rect x="16" y="6" width="7" height="44" rx="3.5" fill="#d4735a"/>
            <ellipse cx="19.5" cy="28" rx="3" ry="2" fill="rgba(180,60,20,0.2)"/>
            <rect x="13" y="49" width="13" height="6" rx="2" fill="#999"/>
            <rect x="13.5" y="50" width="12" height="4" rx="1.5" fill="#bbb"/>
            <rect x="10" y="54" width="19" height="28" rx="4" fill="#999"/>
            <rect x="11" y="55" width="17" height="26" rx="3" fill="#b0b0b0"/>
            <rect x="13" y="58" width="5.5" height="4" rx="1.5" fill="#888"/>
            <rect x="20.5" y="58" width="5.5" height="4" rx="1.5" fill="#888"/>
            <rect x="13" y="65" width="5.5" height="4" rx="1.5" fill="#888"/>
            <rect x="20.5" y="65" width="5.5" height="4" rx="1.5" fill="#888"/>
            <rect x="13" y="72" width="5.5" height="4" rx="1.5" fill="#888"/>
            <rect x="20.5" y="72" width="5.5" height="4" rx="1.5" fill="#888"/>
            <path d="M12 56 L27 56" stroke="rgba(255,255,255,0.4)" stroke-width="1" stroke-linecap="round"/>
          </g>

          <!-- ======= SENDOK KAYU (kanan) ======= -->
          <g transform="translate(128,4) rotate(22, 20, 55)">
            <rect x="15" y="22" width="8" height="50" rx="4" fill="#8B5E3C"/>
            <rect x="16" y="23" width="6" height="48" rx="3" fill="#a06840"/>
            <path d="M16 33 Q19 35 22 33" stroke="rgba(100,60,20,0.3)" stroke-width="0.8" fill="none"/>
            <path d="M16 43 Q19 45 22 43" stroke="rgba(100,60,20,0.3)" stroke-width="0.8" fill="none"/>
            <path d="M16 53 Q19 55 22 53" stroke="rgba(100,60,20,0.3)" stroke-width="0.8" fill="none"/>
            <path d="M16 63 Q19 65 22 63" stroke="rgba(100,60,20,0.3)" stroke-width="0.8" fill="none"/>
            <ellipse cx="19" cy="17" rx="12" ry="8" fill="#8B5E3C"/>
            <ellipse cx="19" cy="16.5" rx="10.5" ry="6.5" fill="#a06840"/>
            <ellipse cx="19" cy="16" rx="7.5" ry="4.5" fill="#7a5230"/>
            <ellipse cx="16" cy="14.5" rx="3" ry="1.8" fill="rgba(255,200,150,0.3)" transform="rotate(-15 16 14.5)"/>
          </g>

          <!-- ======= WAJAN (latar) ======= -->
          <g transform="translate(0,55)">
            <rect x="130" y="18" width="34" height="8" rx="4" fill="#c0603a"/>
            <rect x="131" y="19" width="32" height="6" rx="3" fill="#d4735a"/>
            <ellipse cx="100" cy="24" rx="32" ry="9" fill="#999"/>
            <ellipse cx="100" cy="22" rx="32" ry="9" fill="#b5b5b5"/>
            <ellipse cx="100" cy="22" rx="30" ry="7.5" fill="#d0d0d0"/>
            <ellipse cx="100" cy="20.5" rx="24" ry="5.5" fill="#fff8e8"/>
            <ellipse cx="94" cy="19.5" rx="8" ry="4" fill="white"/>
            <ellipse cx="107" cy="20" rx="6.5" ry="3.5" fill="white"/>
            <circle cx="94" cy="19" r="3.5" fill="#ff9800"/>
            <circle cx="94" cy="19" r="2.5" fill="#ffb300"/>
            <ellipse cx="93" cy="18" rx="1.2" ry="0.8" fill="rgba(255,255,255,0.55)"/>
            <ellipse cx="100" cy="22" rx="32" ry="9" stroke="#aaa" stroke-width="0.8" fill="none"/>
          </g>

          <!-- Uap wajan -->
          <path d="M88 50 Q87 44 89 39"  stroke="rgba(180,80,30,0.18)" stroke-width="2" stroke-linecap="round" fill="none"/>
          <path d="M100 48 Q99 42 101 37" stroke="rgba(180,80,30,0.18)" stroke-width="2" stroke-linecap="round" fill="none"/>
          <path d="M112 50 Q111 44 113 39" stroke="rgba(180,80,30,0.18)" stroke-width="2" stroke-linecap="round" fill="none"/>

          <!-- Dekorasi -->
          <circle cx="168" cy="18" r="2.5" fill="#ff6b35" opacity="0.35"/>
          <circle cx="22"  cy="100" r="2" fill="#ff6b35" opacity="0.3"/>
          <circle cx="185" cy="90" r="2" fill="#ffb08a" opacity="0.45"/>
        </svg>
      </div>

      <!-- Header -->
      <div class="register-header">
        <div class="reg-brand">
          <div class="reg-brand-icon">🍳</div>
          <span class="reg-brand-name">ResepKu</span>
        </div>
        <h2 class="reg-title">Buat <span>Akun Baru</span></h2>
        <p class="reg-subtitle">Bergabung dan temukan ribuan resep lezat</p>
        <div class="reg-divider"><span></span><span></span><span></span></div>
      </div>

      <!-- Form -->
      <div class="register-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <!-- Nama & Email 2 kolom -->
          <div class="form-row-2">
            <div class="form-group">
              <label class="form-label-custom" for="name">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--oren-mid)"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                Nama Lengkap
              </label>
              <div class="form-input-wrap">
                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                <input id="name" type="text" class="form-input-custom no-toggle @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" placeholder="Nama kamu" required autofocus>
                @error('name')<p class="form-error">⚠ {{ $message }}</p>@enderror
              </div>
            </div>
            <div class="form-group">
              <label class="form-label-custom" for="email">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--oren-mid)"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                Email
              </label>
              <div class="form-input-wrap">
                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                <input id="email" type="email" class="form-input-custom no-toggle @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" placeholder="email@kamu.com" required>
                @error('email')<p class="form-error">⚠ {{ $message }}</p>@enderror
              </div>
            </div>
          </div>

          <!-- Password -->
          <div class="form-group">
            <label class="form-label-custom" for="password">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--oren-mid)"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              Kata Sandi
            </label>
            <div class="form-input-wrap">
              <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input id="password" type="password" class="form-input-custom @error('password') is-invalid @enderror"
                     name="password" placeholder="Min. 8 karakter" oninput="checkStrength(this.value)" required>
              <button type="button" class="input-toggle-pw" onclick="togglePw('password','pw1s','pw1h')">
                <svg id="pw1s" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <svg id="pw1h" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
              </button>
              @error('password')<p class="form-error">⚠ {{ $message }}</p>@enderror
            </div>
            <div class="pw-strength-bar"><div class="pw-strength-fill" id="strength-fill"></div></div>
            <p class="pw-strength-text" id="strength-text"></p>
          </div>

          <!-- Konfirmasi Password -->
          <div class="form-group">
            <label class="form-label-custom" for="password_confirmation">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--oren-mid)"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              Konfirmasi Kata Sandi
            </label>
            <div class="form-input-wrap">
              <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <input id="password_confirmation" type="password" class="form-input-custom"
                     name="password_confirmation" placeholder="Ulangi kata sandi" required>
              <button type="button" class="input-toggle-pw" onclick="togglePw('password_confirmation','pw2s','pw2h')">
                <svg id="pw2s" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <svg id="pw2h" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
              </button>
            </div>
          </div>

          <!-- Submit -->
          <button type="submit" class="btn-submit">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
            Daftar Sekarang
          </button>

        </form>
      </div>

      <!-- Footer -->
      <div class="register-footer">
        <p class="reg-footer-link">
          Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </p>
        <p class="reg-copy">&copy; {{ date('Y') }} ResepKu. By Hexsa Rizky Ramadhan.</p>
      </div>

    </div>
  </div>

  <script src="{{ asset('asset/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    function togglePw(inputId, showId, hideId) {
      const input = document.getElementById(inputId);
      const show  = document.getElementById(showId);
      const hide  = document.getElementById(hideId);
      if (input.type === 'password') {
        input.type = 'text'; show.style.display = 'none'; hide.style.display = 'block';
      } else {
        input.type = 'password'; show.style.display = 'block'; hide.style.display = 'none';
      }
    }

    function checkStrength(val) {
      const fill = document.getElementById('strength-fill');
      const text = document.getElementById('strength-text');
      if (!val) { fill.style.width = '0%'; text.textContent = ''; return; }
      let score = 0;
      if (val.length >= 8)          score++;
      if (/[A-Z]/.test(val))        score++;
      if (/[0-9]/.test(val))        score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;
      const map = [
        { w:'20%',  c:'#e74c3c', t:'Sangat lemah' },
        { w:'40%',  c:'#e67e22', t:'Lemah' },
        { w:'65%',  c:'#f1c40f', t:'Cukup' },
        { w:'85%',  c:'#2ecc71', t:'Kuat' },
        { w:'100%', c:'#27ae60', t:'Sangat kuat 💪' },
      ];
      const s = map[Math.min(score, 4)];
      fill.style.width      = s.w;
      fill.style.background = s.c;
      text.textContent      = s.t;
      text.style.color      = s.c;
    }

    tsParticles.load("particles-bg", {
      fullScreen: false,
      background: { color: "transparent" },
      particles: {
        number: { value: 30 },
        color: { value: ["#ff6b35","#ffb08a","#ffd4b8"] },
        shape: { type: "circle" },
        opacity: { value: 0.2 },
        size: { value: { min: 2, max: 6 } },
        move: { enable: true, speed: 1.2, direction: "none", random: true, outModes: "out" },
        links: { enable: true, color: "#ffb08a", distance: 140, opacity: 0.18, width: 1 }
      }
    });
  </script>
</body>
</html>