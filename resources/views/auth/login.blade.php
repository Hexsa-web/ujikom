<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - ResepKu</title>

  <link rel="shortcut icon" href="{{ asset('asset/backend/images/logos/food-favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('asset/backend/css/styles.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

  <style>
    :root {
      --oren:       #ff6b35;
      --oren-dark:  #d94f1a;
      --oren-deep:  #b83d0e;
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
      overflow: hidden;
      background: var(--cream);
    }

    /* ---- Background makanan ---- */
    #bg-img {
      position: fixed;
      inset: 0;
      background: url('{{ asset("storage/bg-food.jpg") }}') center/cover no-repeat;
      z-index: 0;
      filter: saturate(0.8);
    }
    #bg-overlay {
      position: fixed;
      inset: 0;
      background: linear-gradient(135deg,
        rgba(253,246,240,0.93) 0%,
        rgba(255,243,238,0.88) 50%,
        rgba(253,246,240,0.93) 100%);
      z-index: 1;
    }

    /* ---- Particles container ---- */
    #particles-bg {
      position: fixed;
      inset: 0;
      z-index: 2;
      pointer-events: none;
    }

    /* ---- Wrapper utama ---- */
    .login-wrapper {
      position: relative;
      z-index: 10;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    /* ---- Kartu utama ---- */
    .login-card {
      width: 100%;
      max-width: 460px;
      background: rgba(255,255,255,0.97);
      border-radius: 28px;
      border: 1px solid var(--border);
      box-shadow:
        0 4px 6px rgba(180,80,30,0.04),
        0 20px 60px rgba(180,80,30,0.13),
        0 0 0 1px rgba(255,180,140,0.1);
      overflow: visible;
      position: relative;
      animation: cardRise 0.55s cubic-bezier(.4,0,.2,1) both;
    }

    @keyframes cardRise {
      from { opacity: 0; transform: translateY(28px) scale(0.97); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* Dekorasi lingkaran pojok */
    .login-card::before {
      content: '';
      position: absolute;
      width: 160px; height: 160px;
      border-radius: 50%;
      background: radial-gradient(circle, #ffd4b8 0%, transparent 70%);
      top: -50px; right: -50px;
      pointer-events: none;
      z-index: -1;
    }
    .login-card::after {
      content: '';
      position: absolute;
      width: 100px; height: 100px;
      border-radius: 50%;
      background: radial-gradient(circle, #ffd4b8 0%, transparent 70%);
      bottom: -30px; left: -30px;
      pointer-events: none;
      z-index: -1;
    }

    /* ---- Chef ilustrasi (SVG inline) ---- */
    .chef-wrap {
      display: flex;
      justify-content: center;
      margin-top: -10px;
      margin-bottom: -10px;
      position: relative;
      z-index: 1;
    }

    .chef-svg {
      width: 140px;
      height: 140px;
      filter: drop-shadow(0 8px 20px rgba(180,80,30,0.18));
      animation: chefFloat 3.5s ease-in-out infinite;
    }

    @keyframes chefFloat {
      0%,100% { transform: translateY(0) rotate(-1deg); }
      50%      { transform: translateY(-10px) rotate(1deg); }
    }

    /* ---- Header text ---- */
    .login-header {
      padding: 2rem 2.5rem 0;
      text-align: center;
    }

    .login-brand {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 0.8rem;
    }
    .login-brand-icon {
      width: 36px; height: 36px;
      background: var(--oren);
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 16px;
      box-shadow: 0 4px 12px rgba(255,107,53,0.35);
    }
    .login-brand-name {
      font-family: var(--font-d);
      font-size: 1.4rem;
      font-weight: 900;
      color: var(--oren-dark);
    }

    .login-title {
      font-family: var(--font-d);
      font-size: 1.65rem;
      font-weight: 900;
      color: var(--brown);
      line-height: 1.2;
      margin-bottom: 0.35rem;
    }
    .login-title span { color: var(--oren); font-style: italic; }

    .login-subtitle {
      font-size: 13px;
      color: var(--muted);
      font-weight: 600;
      margin-bottom: 0;
    }

    /* Divider header */
    .login-divider {
      display: flex;
      align-items: center;
      gap: 6px;
      justify-content: center;
      margin: 1rem 0;
    }
    .login-divider span {
      display: block;
      height: 3px;
      border-radius: 99px;
      background: var(--oren);
    }
    .login-divider span:nth-child(1),
    .login-divider span:nth-child(3) { width: 30px; opacity: 0.35; }
    .login-divider span:nth-child(2) { width: 50px; }

    /* ---- Form body ---- */
    .login-body {
      padding: 0.5rem 2.5rem 2rem;
    }

    /* Alert */
    .login-alert {
      background: #f0fff4;
      border: 1px solid #c3e6cb;
      color: #276745;
      border-radius: 12px;
      padding: 10px 16px;
      font-size: 13px;
      font-weight: 600;
      text-align: center;
      margin-bottom: 1.2rem;
    }

    /* Label */
    .form-label-custom {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 13px;
      font-weight: 700;
      color: var(--brown);
      margin-bottom: 6px;
    }
    .form-label-custom .lbl-icon {
      font-size: 14px;
      opacity: 0.75;
    }

    /* Input */
    .form-input-wrap {
      position: relative;
      margin-bottom: 1.2rem;
    }

    .form-input-custom {
      width: 100%;
      padding: 12px 16px 12px 46px;
      border-radius: 14px;
      border: 1.5px solid var(--border);
      background: var(--oren-pale);
      font-family: var(--font-b);
      font-size: 14px;
      font-weight: 600;
      color: var(--brown);
      transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
      outline: none;
    }
    .form-input-custom::placeholder { color: #c9a898; font-weight: 600; }
    .form-input-custom:focus {
      border-color: var(--oren);
      background: var(--white);
      box-shadow: 0 0 0 4px rgba(255,107,53,0.1);
    }
    .form-input-custom.is-invalid {
      border-color: #e74c3c;
      background: #fff5f5;
    }

    /* Icon di dalam input */
    .input-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px; height: 20px;
      color: var(--oren-mid);
      pointer-events: none;
    }

    /* Toggle password */
    .input-toggle-pw {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      color: var(--muted);
      display: flex;
      align-items: center;
      transition: color 0.2s;
    }
    .input-toggle-pw:hover { color: var(--oren); }

    /* Error text */
    .form-error {
      font-size: 12px;
      color: #e74c3c;
      font-weight: 600;
      margin-top: 5px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* ---- Submit button ---- */
    .btn-submit {
      width: 100%;
      padding: 13px;
      border-radius: 14px;
      border: none;
      background: var(--oren);
      color: white;
      font-family: var(--font-b);
      font-size: 15px;
      font-weight: 800;
      cursor: pointer;
      transition: all 0.22s cubic-bezier(.4,0,.2,1);
      box-shadow: 0 6px 20px rgba(255,107,53,0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      letter-spacing: 0.01em;
      margin-top: 0.4rem;
    }
    .btn-submit:hover {
      background: var(--oren-dark);
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(255,107,53,0.42);
    }
    .btn-submit:active {
      transform: translateY(0);
      box-shadow: 0 4px 12px rgba(255,107,53,0.3);
    }
    .btn-submit svg { width: 18px; height: 18px; }

    /* ---- Footer links ---- */
    .login-footer {
      text-align: center;
      padding: 0 2.5rem 2rem;
    }
    .login-footer-link {
      font-size: 13px;
      color: var(--muted);
      font-weight: 600;
    }
    .login-footer-link a {
      color: var(--oren-dark);
      font-weight: 800;
      text-decoration: none;
      transition: color 0.2s;
    }
    .login-footer-link a:hover { color: var(--oren); }

    .login-copy {
      font-size: 11px;
      color: #c9a898;
      font-weight: 600;
      margin-top: 0.8rem;
    }

    /* ---- Floating food dekorasi di luar kartu ---- */
    .food-float {
      position: fixed;
      font-size: 28px;
      opacity: 0.18;
      pointer-events: none;
      z-index: 5;
      animation: foodDrift linear infinite;
    }
    @keyframes foodDrift {
      0%   { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-100vh) rotate(360deg); }
    }

    @media (max-width: 480px) {
      .login-card { border-radius: 20px; }
      .login-header, .login-body, .login-footer { padding-left: 1.5rem; padding-right: 1.5rem; }
      .chef-svg { width: 110px; height: 110px; }
    }
  </style>
</head>

<body>
  <div id="bg-img"></div>
  <div id="bg-overlay"></div>
  <div id="particles-bg"></div>

  <!-- Floating food emojis dekorasi -->
  <div class="food-float" style="left:5%;  top:90%; animation-duration:12s; animation-delay:0s;   font-size:22px;">🌶️</div>
  <div class="food-float" style="left:15%; top:85%; animation-duration:15s; animation-delay:2s;   font-size:18px;">🧅</div>
  <div class="food-float" style="left:80%; top:92%; animation-duration:14s; animation-delay:1s;   font-size:20px;">🍅</div>
  <div class="food-float" style="left:90%; top:88%; animation-duration:11s; animation-delay:3s;   font-size:16px;">🫚</div>
  <div class="food-float" style="left:70%; top:95%; animation-duration:16s; animation-delay:0.5s; font-size:24px;">🥕</div>
  <div class="food-float" style="left:30%; top:95%; animation-duration:13s; animation-delay:4s;   font-size:18px;">🧄</div>

  <div class="login-wrapper">
    <div class="login-card">

      {{-- Chef ilustrasi SVG --}}
      <div class="chef-wrap">
        <svg class="chef-svg" viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- Bayangan bawah -->
          <ellipse cx="70" cy="133" rx="32" ry="6" fill="rgba(180,80,30,0.12)"/>

          <!-- Topi chef (bagian bawah / band) -->
          <rect x="38" y="52" width="64" height="14" rx="4" fill="#f5e0d0"/>
          <rect x="38" y="54" width="64" height="3" fill="#e8c8b0"/>

          <!-- Topi chef (bagian atas / puff) -->
          <ellipse cx="70" cy="40" rx="28" ry="20" fill="white"/>
          <ellipse cx="70" cy="38" rx="26" ry="18" fill="#fffaf8"/>
          <!-- Lipatan topi -->
          <path d="M44 42 Q55 30 70 38 Q85 30 96 42" stroke="#f0d8c8" stroke-width="1.5" fill="none"/>
          <path d="M46 46 Q57 36 70 42 Q83 36 94 46" stroke="#f0d8c8" stroke-width="1.5" fill="none"/>

          <!-- Wajah -->
          <circle cx="70" cy="75" r="24" fill="#FDBCAF"/>
          <!-- Pipi merah muda -->
          <ellipse cx="58" cy="79" rx="6" ry="4" fill="rgba(255,140,100,0.25)"/>
          <ellipse cx="82" cy="79" rx="6" ry="4" fill="rgba(255,140,100,0.25)"/>
          <!-- Mata -->
          <ellipse cx="63" cy="72" rx="3" ry="3.5" fill="#3d1f0d"/>
          <ellipse cx="77" cy="72" rx="3" ry="3.5" fill="#3d1f0d"/>
          <!-- Kilap mata -->
          <circle cx="64.2" cy="70.8" r="1" fill="white"/>
          <circle cx="78.2" cy="70.8" r="1" fill="white"/>
          <!-- Alis -->
          <path d="M60 68.5 Q63 67 66 68.5" stroke="#7a3e1a" stroke-width="1.5" stroke-linecap="round" fill="none"/>
          <path d="M74 68.5 Q77 67 80 68.5" stroke="#7a3e1a" stroke-width="1.5" stroke-linecap="round" fill="none"/>
          <!-- Senyum -->
          <path d="M63 81 Q70 87 77 81" stroke="#c0603a" stroke-width="2" stroke-linecap="round" fill="none"/>
          <!-- Bibir bawah -->
          <path d="M65 83.5 Q70 86 75 83.5" stroke="#d4826a" stroke-width="1" stroke-linecap="round" fill="none"/>
          <!-- Hidung -->
          <ellipse cx="70" cy="77" rx="2.5" ry="1.8" fill="rgba(180,80,30,0.18)"/>

          <!-- Telinga -->
          <ellipse cx="46.5" cy="75" rx="4" ry="5" fill="#FDBCAF"/>
          <ellipse cx="93.5" cy="75" rx="4" ry="5" fill="#FDBCAF"/>
          <ellipse cx="46.5" cy="75" rx="2" ry="3" fill="#f0a090"/>
          <ellipse cx="93.5" cy="75" rx="2" ry="3" fill="#f0a090"/>

          <!-- Leher -->
          <rect x="63" y="97" width="14" height="10" rx="4" fill="#FDBCAF"/>

          <!-- Baju chef (putih) -->
          <path d="M38 128 L38 108 Q38 102 44 100 L56 97 Q58 102 70 102 Q82 102 84 97 L96 100 Q102 102 102 108 L102 128 Z" fill="white"/>
          <!-- Garis baju tengah -->
          <line x1="70" y1="102" x2="70" y2="128" stroke="#f0ddd0" stroke-width="1.5"/>
          <!-- Kancing baju -->
          <circle cx="70" cy="108" r="2" fill="#ff6b35"/>
          <circle cx="70" cy="116" r="2" fill="#ff6b35"/>
          <circle cx="70" cy="124" r="2" fill="#ff6b35"/>
          <!-- Kerah baju -->
          <path d="M56 97 Q62 105 70 102 Q78 105 84 97" stroke="#e0c8b8" stroke-width="1" fill="none"/>

          <!-- Apron oranye -->
          <path d="M55 105 L50 128 L90 128 L85 105 Q78 108 70 108 Q62 108 55 105Z" fill="#ff6b35" opacity="0.9"/>
          <rect x="58" y="103" width="24" height="5" rx="3" fill="#ff6b35"/>
          <!-- Saku apron -->
          <rect x="62" y="116" width="16" height="10" rx="4" fill="#e85520"/>

          <!-- Tangan kiri - pegang spatula -->
          <path d="M38 110 Q28 112 24 120" stroke="#FDBCAF" stroke-width="10" stroke-linecap="round" fill="none"/>
          <!-- Spatula -->
          <rect x="10" y="108" width="5" height="22" rx="2.5" fill="#c0603a" transform="rotate(-20 10 108)"/>
          <rect x="7" y="104" width="11" height="8" rx="2" fill="#888" transform="rotate(-20 7 104)"/>
          <rect x="8" y="103" width="9" height="9" rx="2" fill="#aaa" transform="rotate(-20 8 103)"/>

          <!-- Tangan kanan - pegang mangkuk -->
          <path d="M102 110 Q112 112 116 120" stroke="#FDBCAF" stroke-width="10" stroke-linecap="round" fill="none"/>
          <!-- Mangkuk -->
          <ellipse cx="122" cy="118" rx="12" ry="7" fill="#ff6b35"/>
          <path d="M110 118 Q122 130 134 118" fill="#e85520"/>
          <ellipse cx="122" cy="118" rx="12" ry="5" fill="#ffb08a"/>
          <!-- Isi mangkuk (uap/makanan) -->
          <ellipse cx="122" cy="116" rx="8" ry="3" fill="#ff6b35" opacity="0.5"/>
          <!-- Uap -->
          <path d="M118 112 Q117 108 119 105" stroke="rgba(180,80,30,0.3)" stroke-width="1.5" stroke-linecap="round" fill="none"/>
          <path d="M122 111 Q121 107 123 104" stroke="rgba(180,80,30,0.3)" stroke-width="1.5" stroke-linecap="round" fill="none"/>
          <path d="M126 112 Q125 108 127 105" stroke="rgba(180,80,30,0.3)" stroke-width="1.5" stroke-linecap="round" fill="none"/>
        </svg>
      </div>

      {{-- Header --}}
      <div class="login-header">
        <div class="login-brand">
          <div class="login-brand-icon">🍳</div>
          <span class="login-brand-name">ResepKu</span>
        </div>
        <h2 class="login-title">Selamat <span>Datang!</span></h2>
        <p class="login-subtitle">Masuk untuk menikmati koleksi resep terbaik</p>
        <div class="login-divider">
          <span></span><span></span><span></span>
        </div>
      </div>

      {{-- Body Form --}}
      <div class="login-body">

        @if(session('status'))
          <div class="login-alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf

          {{-- Email --}}
          <div>
            <label class="form-label-custom" for="email">
              <span class="lbl-icon">✉️</span> Alamat Email
            </label>
            <div class="form-input-wrap">
              <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
              </svg>
              <input id="email" type="email"
                     class="form-input-custom @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}"
                     placeholder="nama@email.com"
                     required autofocus>
              @error('email')
                <p class="form-error">⚠ {{ $message }}</p>
              @enderror
            </div>
          </div>

          {{-- Password --}}
          <div>
            <label class="form-label-custom" for="password">
              <span class="lbl-icon">🔒</span> Kata Sandi
            </label>
            <div class="form-input-wrap">
              <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
              <input id="password" type="password"
                     class="form-input-custom @error('password') is-invalid @enderror"
                     name="password"
                     placeholder="••••••••"
                     required>
              <button type="button" class="input-toggle-pw" onclick="togglePw()" id="pw-toggle-btn" aria-label="Lihat password">
                <svg id="pw-icon-show" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                </svg>
                <svg id="pw-icon-hide" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                  <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>
                </svg>
              </button>
              @error('password')
                <p class="form-error">⚠ {{ $message }}</p>
              @enderror
            </div>
          </div>

          {{-- Submit --}}
          <button type="submit" class="btn-submit">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
              <polyline points="10 17 15 12 10 7"/>
              <line x1="15" y1="12" x2="3" y2="12"/>
            </svg>
            Masuk Sekarang
          </button>

        </form>
      </div>

      {{-- Footer --}}
      <div class="login-footer">
        <p class="login-footer-link">
          Belum punya akun?
          <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
        <p class="login-copy">&copy; {{ date('Y') }} ResepKu. By Hexsa Rizky Ramadhan.</p>
      </div>

    </div>
  </div>

  <script src="{{ asset('asset/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

  <script>
    /* Toggle password visibility */
    function togglePw() {
      const input = document.getElementById('password');
      const show  = document.getElementById('pw-icon-show');
      const hide  = document.getElementById('pw-icon-hide');
      if (input.type === 'password') {
        input.type = 'text';
        show.style.display = 'none';
        hide.style.display = 'block';
      } else {
        input.type = 'password';
        show.style.display = 'block';
        hide.style.display = 'none';
      }
    }

    /* Particles */
    tsParticles.load("particles-bg", {
      fullScreen: false,
      background: { color: "transparent" },
      particles: {
        number: { value: 30 },
        color: { value: ["#ff6b35", "#ffb08a", "#ffd4b8"] },
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