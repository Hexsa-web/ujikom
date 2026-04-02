<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Perpus - Register</title>

  <link rel="shortcut icon" href="{{ asset('assets/backend/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/backend/css/styles.css') }}" />
  <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

  <style>
    body { background: #f5f5f5; font-family: 'Segoe UI', sans-serif; overflow: hidden; }
    #particles-bg { position: fixed; width: 100%; height: 100%; z-index: -1; }
    .card { border-radius: 1rem; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05); }
    .form-control { border-radius: 0.5rem; }
    .btn-register { background-color: #2196F3; color: #fff; border-radius: 0.5rem; }
    .btn-register:hover { background-color: #1976D2; }
    .btn-login { background-color: #4CAF50; color: #fff; border-radius: 0.5rem; }
    .btn-login:hover { background-color: #43a047; }
    .logo-image { width: 130px; border-radius: 12px; }
  </style>
</head>

<body>
  <div id="particles-bg"></div>

  <div class="min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-8 col-lg-5 col-xxl-4">
      <div class="card p-4">
        <div class="card-body text-center">
          <img src="{{ asset('storage/ikon-buku.jpg') }}" class="logo-image mb-3" alt="Logo">
          <h3 class="fw-bold mt-2 text-dark mb-1">Registrasi E-Perpus</h3>
          <small class="text-muted">Isi data untuk membuat akun</small>

          <form method="POST" action="{{ route('register') }}" class="text-start mt-4">
            @csrf

            <div class="mb-3">
              <label for="name">Nama</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                     name="name" value="{{ old('name') }}" required autofocus>
              @error('name')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                     name="email" value="{{ old('email') }}" required>
              @error('email')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                     name="password" required>
              @error('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-4">
              <label for="password-confirm">Konfirmasi Password</label>
              <input id="password-confirm" type="password" class="form-control"
                     name="password_confirmation" required>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-register fw-semibold">Daftar</button>
            </div>

            <div class="text-center">
              <span class="text-muted small">Sudah punya akun?</span><br>
              <a href="{{ route('login') }}" class="btn btn-sm btn-login mt-2">Login</a>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center mt-3 text-muted">
        <small>&copy; {{ date('Y') }} E-Perpus. Oleh Hexsa Rizky Ramadhan.</small>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    tsParticles.load("particles-bg", {
      fullScreen: false,
      background: { color: "#f5f5f5" },
      particles: {
        number: { value: 40 },
        color: { value: "#2196F3" },
        shape: { type: "circle" },
        opacity: { value: 0.4 },
        size: { value: 4 },
        move: { enable: true, speed: 5 },
        links: { enable: true, color: "#90caf9", distance: 100, opacity: 0.3 }
      }
    });
  </script>
</body>
</html>
