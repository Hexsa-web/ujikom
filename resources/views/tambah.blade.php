<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Resep - ResepKu</title>

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
        --border-mid:  #e0c0a8;
        --white:       #ffffff;
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

    /* Dekorasi latar */
    body::before {
        content: '';
        position: fixed; inset: 0;
        background:
            radial-gradient(ellipse 55% 40% at 10% 5%,  rgba(255,176,138,0.18) 0%, transparent 60%),
            radial-gradient(ellipse 45% 35% at 90% 90%, rgba(255,107,53,0.10) 0%, transparent 60%),
            radial-gradient(ellipse 40% 30% at 50% 50%, rgba(253,246,240,0.5) 0%, transparent 70%);
        pointer-events: none; z-index: 0;
    }

    /* ===== PAGE HEADER ===== */
    .page-header {
        position: relative; z-index: 1;
        text-align: center;
        padding: 3rem 1rem 2rem;
    }

    /* Floating food dekorasi header */
    .hdr-food {
        position: absolute; font-size: 20px; opacity: 0.14;
        pointer-events: none;
        animation: hdrFloat ease-in-out infinite;
    }
    @keyframes hdrFloat {
        0%,100% { transform: translateY(0) rotate(-4deg); }
        50%      { transform: translateY(-10px) rotate(4deg); }
    }

    .page-header-badge {
        display: inline-flex; align-items: center; gap: 7px;
        background: var(--oren-light); border: 1.5px solid #ffd4b8;
        color: var(--oren-dark); font-size: 11.5px; font-weight: 700;
        padding: 5px 16px; border-radius: 99px;
        letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 1.2rem;
    }

    .page-header h1 {
        font-family: var(--font-d);
        font-size: clamp(2rem, 5vw, 2.8rem);
        color: var(--brown); line-height: 1.15; margin-bottom: 0.5rem;
    }
    .page-header h1 em { font-style: italic; color: var(--oren); }
    .page-header p { font-size: 14.5px; color: var(--muted); max-width: 420px; margin: 0 auto; font-weight: 600; }

    /* ===== STEPPER ===== */
    .stepper {
        display: flex; align-items: center; justify-content: center;
        max-width: 480px; margin: 0 auto 2.5rem;
        position: relative; z-index: 1;
    }
    .step { display: flex; flex-direction: column; align-items: center; gap: 6px; flex: 1; position: relative; }
    .step-circle {
        width: 36px; height: 36px; border-radius: 50%;
        background: var(--white); border: 2px solid var(--border-mid);
        display: flex; align-items: center; justify-content: center;
        font-size: 12px; font-weight: 800; color: var(--muted);
        transition: all 0.3s; position: relative; z-index: 2;
    }
    .step.active .step-circle {
        background: var(--oren); border-color: var(--oren);
        color: white; box-shadow: 0 0 0 5px var(--oren-light);
    }
    .step.done .step-circle { background: var(--oren-light); border-color: var(--oren); color: var(--oren-dark); }
    .step-label { font-size: 10px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.07em; white-space: nowrap; }
    .step.active .step-label { color: var(--oren-dark); }
    .step.done  .step-label { color: var(--oren-dark); }
    .step-line { flex: 1; height: 2px; background: var(--border); margin-top: -22px; z-index: 1; }
    .step-line.done { background: var(--oren-mid); }

    /* ===== FORM CARD ===== */
    .form-card {
        background: var(--white); border: 1px solid var(--border);
        border-radius: 24px; overflow: hidden;
        box-shadow: 0 8px 40px rgba(180,80,30,0.10), 0 2px 8px rgba(180,80,30,0.05);
        position: relative; z-index: 1;
        animation: cardIn 0.5s cubic-bezier(.4,0,.2,1) both;
    }
    @keyframes cardIn { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }

    /* ===== FORM SECTIONS ===== */
    .form-section { padding: 2rem 2.4rem; border-bottom: 1px solid var(--border); }
    .form-section:last-of-type { border-bottom: none; }

    /* Section header strip oranye kiri */
    .section-head {
        display: flex; align-items: center; gap: 12px; margin-bottom: 1.5rem;
        padding-left: 14px; border-left: 3.5px solid var(--oren); border-radius: 2px;
    }
    .section-icon {
        width: 38px; height: 38px; border-radius: 10px;
        background: var(--oren-light); border: 1.5px solid #ffd4b8;
        display: flex; align-items: center; justify-content: center;
        font-size: 17px; flex-shrink: 0;
    }
    .section-title { font-family: var(--font-d); font-size: 1.12rem; color: var(--brown); }
    .section-sub { font-size: 12px; color: var(--muted); font-weight: 600; margin-top: 1px; }

    /* ===== FORM CONTROLS ===== */
    .form-label-custom {
        display: block; font-size: 11.5px; font-weight: 800;
        color: var(--muted); text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 7px;
    }
    .form-label-custom .req { color: var(--oren); margin-left: 2px; }

    .fc {
        width: 100%; background: var(--oren-pale);
        border: 1.5px solid var(--border); border-radius: 12px;
        color: var(--brown); font-family: var(--font-b);
        font-size: 14px; font-weight: 500; padding: 11px 16px;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s; outline: none;
        -webkit-appearance: none;
    }
    .fc::placeholder { color: #c9a898; font-weight: 500; }
    .fc:focus { border-color: var(--oren); background: var(--white); box-shadow: 0 0 0 4px var(--oren-light); }
    .fc.is-invalid { border-color: #e07878; background: #fff5f5; }
    select.fc { cursor: pointer; }
    select.fc option { background: white; color: var(--brown); }
    textarea.fc { resize: vertical; min-height: 110px; line-height: 1.75; }
    .fc[readonly] { opacity: 0.55; cursor: not-allowed; }

    /* 2-col grid */
    .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
    .form-group { margin-bottom: 1.2rem; }
    .form-group:last-child { margin-bottom: 0; }

    /* File upload */
    .file-wrap {
        position: relative; border: 2px dashed var(--border-mid);
        border-radius: 16px; background: var(--oren-pale);
        padding: 2.2rem; text-align: center;
        transition: border-color 0.2s, background 0.2s; cursor: pointer;
    }
    .file-wrap:hover { border-color: var(--oren); background: var(--oren-light); }
    .file-wrap.has-file { border-style: solid; border-color: var(--oren); background: var(--oren-light); }
    .file-wrap input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }
    .file-icon {
        width: 52px; height: 52px; border-radius: 14px;
        background: var(--oren-light); border: 1.5px solid #ffd4b8;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px; margin: 0 auto 0.8rem;
    }
    .file-label { font-size: 14px; font-weight: 700; color: var(--muted); }
    .file-label span { color: var(--oren); }
    .file-hint { font-size: 12px; color: #c9a898; margin-top: 4px; font-weight: 600; }
    .file-preview { display: none; margin-top: 1rem; border-radius: 12px; overflow: hidden; }
    .file-preview img { width: 100%; height: 200px; object-fit: cover; display: block; }

    /* Textarea hint */
    .fc-hint {
        font-size: 11px; color: #c9a898; font-weight: 600;
        margin-top: 5px; display: flex; align-items: center; gap: 4px;
    }

    /* Error */
    .form-error { font-size: 12px; color: #e07878; font-weight: 600; margin-top: 5px; display: flex; align-items: center; gap: 4px; }

    /* ===== SUBMIT ===== */
    .submit-section {
        padding: 1.6rem 2.4rem 2.2rem;
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 14px;
        background: var(--oren-pale); border-top: 1px solid var(--border);
    }
    .submit-note {
        display: flex; align-items: center; gap: 7px;
        font-size: 12.5px; color: var(--muted); font-weight: 600;
    }
    .submit-note svg { color: var(--oren); flex-shrink: 0; }

    .btn-submit {
        display: inline-flex; align-items: center; gap: 9px;
        padding: 13px 30px; border-radius: 99px;
        background: var(--oren); border: none; color: white;
        font-family: var(--font-b); font-size: 14.5px; font-weight: 800;
        cursor: pointer; transition: all 0.22s;
        box-shadow: 0 6px 22px var(--oren-glow); letter-spacing: 0.01em;
    }
    .btn-submit:hover { background: var(--oren-dark); transform: translateY(-2px); box-shadow: 0 10px 30px rgba(255,107,53,0.35); }
    .btn-submit:active { transform: translateY(0); }

    .btn-cancel {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 12px 22px; border-radius: 99px;
        border: 1.5px solid var(--border-mid); background: var(--white); color: var(--muted);
        font-family: var(--font-b); font-size: 13.5px; font-weight: 700;
        text-decoration: none; transition: all 0.2s; cursor: pointer;
    }
    .btn-cancel:hover { border-color: var(--oren-mid); color: var(--oren-dark); background: var(--oren-light); text-decoration: none; }

    @media (max-width: 640px) {
        .form-section { padding: 1.4rem; }
        .form-grid-2 { grid-template-columns: 1fr; gap: 0; }
        .submit-section { flex-direction: column; align-items: stretch; }
        .btn-submit, .btn-cancel { width: 100%; justify-content: center; }
    }
    </style>
</head>
<body>

    @include('layouts.component_frontend.navbar')

    <div class="container" style="max-width:780px; position:relative; z-index:1;">

        {{-- Page Header --}}
        <div class="page-header">
            {{-- Floating emojis dekorasi --}}
            <span class="hdr-food" style="top:10%;left:3%;animation-duration:4s;animation-delay:0s;">🍳</span>
            <span class="hdr-food" style="top:60%;left:1%;font-size:16px;animation-duration:5s;animation-delay:1s;">🌶️</span>
            <span class="hdr-food" style="top:15%;right:3%;animation-duration:4.5s;animation-delay:0.5s;">🥘</span>
            <span class="hdr-food" style="top:65%;right:2%;font-size:16px;animation-duration:5.5s;animation-delay:2s;">🧄</span>
            <span class="hdr-food" style="top:40%;right:8%;font-size:14px;animation-duration:6s;animation-delay:1.5s;">🥄</span>

            <div class="page-header-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                Bagikan Resepmu
            </div>
            <h1>Tambah <em>Resep Baru</em></h1>
            <p>Ceritakan resep favoritmu dan inspirasi jutaan koki rumahan</p>
        </div>

        {{-- Stepper --}}
        <div class="stepper">
            <div class="step active" id="step1">
                <div class="step-circle">1</div>
                <span class="step-label">Info</span>
            </div>
            <div class="step-line" id="line1"></div>
            <div class="step" id="step2">
                <div class="step-circle">2</div>
                <span class="step-label">Foto</span>
            </div>
            <div class="step-line" id="line2"></div>
            <div class="step" id="step3">
                <div class="step-circle">3</div>
                <span class="step-label">Bahan</span>
            </div>
            <div class="step-line" id="line3"></div>
            <div class="step" id="step4">
                <div class="step-circle">4</div>
                <span class="step-label">Langkah</span>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="form-card">
        <form action="{{ route('user.resep.store') }}" method="POST" enctype="multipart/form-data" id="recipeForm">
        @csrf

            {{-- SECTION 1 --}}
            <div class="form-section">
                <div class="section-head">
                    <div class="section-icon">📝</div>
                    <div>
                        <div class="section-title">Informasi Dasar</div>
                        <div class="section-sub">Judul, kategori, dan penerbit resep</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label-custom" for="judul">Judul Resep <span class="req">*</span></label>
                    <input type="text" id="judul" name="judul"
                           class="fc @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}"
                           placeholder="Contoh: Ayam Goreng Kremes Gurih..."
                           required>
                    @error('judul')<p class="form-error">⚠ {{ $message }}</p>@enderror
                </div>

                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label-custom" for="kategori_id">Kategori <span class="req">*</span></label>
                        <select id="kategori_id" name="kategori_id"
                                class="fc @error('kategori_id') is-invalid @enderror" required>
                            <option value="">Pilih kategori...</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')<p class="form-error">⚠ {{ $message }}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label-custom">Penerbit / Oleh</label>
                        <input type="text" name="penerbit" class="fc" value="{{ Auth::user()->name }}" readonly>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Foto --}}
            <div class="form-section">
                <div class="section-head">
                    <div class="section-icon">📸</div>
                    <div>
                        <div class="section-title">Foto Resep</div>
                        <div class="section-sub">Upload foto yang menggugah selera</div>
                    </div>
                </div>

                <div class="file-wrap" id="fileWrap">
                    <input type="file" name="foto" id="fotoInput"
                           class="@error('foto') is-invalid @enderror"
                           accept="image/*" required onchange="previewFoto(this)">
                    <div class="file-icon" id="fileIcon">🖼️</div>
                    <div class="file-label" id="fileLabel">Seret foto ke sini atau <span>klik untuk pilih</span></div>
                    <div class="file-hint" id="fileHint">JPG, PNG, WEBP — Maksimal 5MB</div>
                    <div class="file-preview" id="filePreview">
                        <img id="previewImg" src="" alt="Preview">
                    </div>
                </div>
                @error('foto')<p class="form-error mt-2">⚠ {{ $message }}</p>@enderror
            </div>

            {{-- SECTION 3: Deskripsi --}}
            <div class="form-section">
                <div class="section-head">
                    <div class="section-icon">💬</div>
                    <div>
                        <div class="section-title">Deskripsi Resep</div>
                        <div class="section-sub">Ceritakan resep ini dengan penuh semangat</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label-custom" for="deskripsi">Deskripsi <span class="req">*</span></label>
                    <textarea id="deskripsi" name="deskripsi" rows="5"
                              class="fc @error('deskripsi') is-invalid @enderror"
                              placeholder="Ceritakan asal-usul, rasa, dan keistimewaan resep ini..."
                              required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<p class="form-error">⚠ {{ $message }}</p>@enderror
                </div>
            </div>

            {{-- SECTION 4: Bahan & Langkah --}}
            <div class="form-section">
                <div class="section-head">
                    <div class="section-icon">🥘</div>
                    <div>
                        <div class="section-title">Bahan & Langkah</div>
                        <div class="section-sub">Tulis tiap item di baris baru</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label-custom" for="bahan">Bahan-bahan</label>
                    <textarea id="bahan" name="bahan" rows="7" class="fc"
                              placeholder="500gr ayam potong&#10;2 siung bawang putih&#10;1 sdt garam&#10;...">{{ old('bahan') }}</textarea>
                    <div class="fc-hint">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Satu bahan per baris, tanpa nomor
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label-custom" for="langkah">Langkah-langkah</label>
                    <textarea id="langkah" name="langkah" rows="9" class="fc"
                              placeholder="Panaskan minyak goreng di wajan&#10;Tumis bawang putih hingga harum&#10;Masukkan ayam, aduk rata&#10;...">{{ old('langkah') }}</textarea>
                    <div class="fc-hint">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Satu langkah per baris, sistem akan otomatis menomori
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="submit-section">
                <div class="submit-note">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Resep akan ditinjau sebelum dipublikasi
                </div>
                <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
                    <a href="{{ url()->previous() }}" class="btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-submit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        Unggah Resep
                    </button>
                </div>
            </div>

        </form>
        </div>

        <div style="height:4rem;"></div>
    </div>

    @include('layouts.component_frontend.footer')

    <script src="{{ asset('assets/frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/theme.js') }}"></script>

    <script>
    function previewFoto(input) {
        const wrap    = document.getElementById('fileWrap');
        const preview = document.getElementById('filePreview');
        const img     = document.getElementById('previewImg');
        const icon    = document.getElementById('fileIcon');
        const label   = document.getElementById('fileLabel');
        const hint    = document.getElementById('fileHint');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.style.display = 'block';
                icon.style.display    = 'none';
                label.textContent     = input.files[0].name;
                hint.textContent      = (input.files[0].size / 1024 / 1024).toFixed(2) + ' MB';
                wrap.classList.add('has-file');
            };
            reader.readAsDataURL(input.files[0]);
        }
        updateStepper();
    }

    const fileWrap = document.getElementById('fileWrap');
    fileWrap.addEventListener('dragover',  () => { fileWrap.style.borderColor = '#ff6b35'; fileWrap.style.background = '#fff3ee'; });
    fileWrap.addEventListener('dragleave', () => { fileWrap.style.borderColor = ''; fileWrap.style.background = ''; });

    function updateStepper() {
        const vals = [
            !!document.getElementById('judul').value.trim(),
            document.getElementById('fotoInput').files.length > 0,
            !!document.getElementById('bahan').value.trim(),
            !!document.getElementById('langkah').value.trim(),
        ];
        const ids   = ['step1','step2','step3','step4'];
        const lines = ['line1','line2','line3'];

        ids.forEach((id, i) => {
            const el = document.getElementById(id);
            el.classList.remove('active','done');
            if (vals[i]) el.classList.add('done');
        });

        const first = vals.findIndex(v => !v);
        if (first >= 0) document.getElementById(ids[first]).classList.add('active');

        lines.forEach((lid, i) => {
            const el = document.getElementById(lid);
            if (el) el.classList.toggle('done', vals[i]);
        });
    }

    ['judul','deskripsi','bahan','langkah'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', updateStepper);
    });
    </script>

</body>
</html>