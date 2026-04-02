<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita Kami - Tasty Food</title>
  <style>
    
    /* Reset dasar */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    body {
      background: #fff;
      color: #111;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
    }

    /* === NAVBAR === */
    /* Reset dasar */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #fff;
      color: #111;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* HEADER */
    header {
      position: relative;
      background: url('{{ asset('storage/ASET/Group 70.png') }}') no-repeat center center/cover;
      height: 400px;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 20px 30px;
    }

    .container-header {
      max-width: 1140px;
      margin: 0 auto;
      width: 100%;
    }

    .header-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header-content .logo h2 {
      font-size: 22px;
      font-weight: 900;
      letter-spacing: 1px;
    }

    /* NAVBAR */
    header nav {
      display: flex;
      gap: 20px;
      font-weight: 600;
    }

    header nav a {
      color: #fff;
      text-transform: uppercase;
      font-size: 13px;
      transition: opacity 0.3s ease-in-out;
    }

    header nav a:hover {
      opacity: 0.7;
    }

    header h1 {
      font-size: 32px;
      font-weight: 900;
      text-transform: uppercase;
      margin-top: 80px;
    }

    /* CONTENT */
    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 0 20px;
    }

    .container h1 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .container img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .content {
      font-size: 15px;
      line-height: 1.8;
      color: #333;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 15px;
      }

      header h1 {
        text-align: center;
        margin-top: 40px;
      }

      .container h1 {
        font-size: 22px;
      }
    }
    /* === HERO === */


    .hero h1 {
      font-size: 48px;
      font-weight: 900;
      text-transform: uppercase;
      color: #fff;
      margin-left: 60px;
    }

    /* === SECTION BERITA UTAMA === */
    .berita-utama {
      padding: 60px 20px;
      background: #f8f8f8;
    }

    .berita-utama .container {
      max-width: 1140px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      align-items: center;
    }

    .berita-utama img {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .berita-utama h3 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .berita-utama p {
      font-size: 15px;
      color: #555;
      margin-bottom: 20px;
    }

    .berita-utama .btn {
      display: inline-block;
      background: #111;
      color: #fff;
      padding: 10px 18px;
      border-radius: 8px;
      font-size: 14px;
      transition: background 0.3s;
    }

    .berita-utama .btn:hover {
      background: #333;
    }

    /* === SECTION BERITA LAINNYA === */
    .berita-lainnya {
      padding: 60px 20px;
    }

    .berita-lainnya .container {
      max-width: 1140px;
      margin: auto;
    }

    .berita-lainnya h3 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .grid-berita {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .card-berita {
      display: flex;
      flex-direction: column;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: transform 0.3s;
      background: #fff;
    }

    .card-berita:hover {
      transform: translateY(-5px);
    }

    .card-berita img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-body {
      padding: 15px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .card-body h5 {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .card-body p {
      font-size: 14px;
      color: #666;
      margin-bottom: 15px;
    }

    .card-body a {
      margin-top: auto;
      font-size: 14px;
      font-weight: 600;
      color: #ff9900;
      transition: color 0.3s;
    }

    .card-body a:hover {
      color: #cc7a00;
    }

    /* Pagination */
    .pagination {
      margin-top: 30px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .pagination li {
      list-style: none;
    }

    .pagination a, .pagination span {
      display: block;
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 14px;
      color: #111;
      border: 1px solid #ddd;
    }

    .pagination .active span {
      background: #111;
      color: #fff;
      border-color: #111;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .berita-utama .container {
        flex-direction: column;
      }

      .hero h1 {
        margin-left: 20px;
        font-size: 36px;
      }
    }
  </style>
</head>
<body>

 <!-- NAVBAR -->
<header>
    <div class="container-header">
      <div class="header-content">
        <div class="logo">
          <h2>TASTY FOOD</h2>
        </div>
        <nav>
          <a href="{{ route('front.index') }}">Home</a>
          <a href="{{ route('front.tentang') }}">Tentang</a>
          <a href="{{ route('front.berita') }}">Berita</a>
          <a href="{{ route('front.galeri') }}">Galeri</a>
          <a href="{{ route('front.kontak') }}">Kontak</a>
        </nav>
      </div>
      <h1>Berita Kami</h1>
    </div>
  </header>
<!-- HERO -->
<div class="hero">
  <h1>BERITA KAMI</h1>
</div>

  <!-- BERITA UTAMA -->
  <section class="berita-utama">
    <div class="container">
      @if($berita->count() > 0)
        @php $utama = $berita->first(); @endphp
        <div class="col-img" style="flex:1;">
          <img src="{{ asset('storage/' . $utama->gambar) }}" alt="{{ $utama->judul }}">
        </div>
        <div class="col-text" style="flex:1;">
          <h3>{{ $utama->judul }}</h3>
          <p class="text-muted">{{ $utama->deskripsi }}</p>
          <p>{{ Str::limit(strip_tags($utama->deskripsi), 300) }}</p>
          <a href="{{ route('front.berita.show', $utama->id) }}" class="btn">Baca Selengkapnya</a>
        </div>
      @endif
    </div>
</section>


  <!-- BERITA LAINNYA -->
  <section class="berita-lainnya">
    <div class="container">
      <h3>Berita Lainnya</h3>
      <div class="grid-berita">
        @foreach($berita->skip(1) as $item)
          <div class="card-berita">
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
            <div class="card-body">
              <h5>{{ $item->judul }}</h5>
              <p>{{ Str::limit(strip_tags($item->deskripsi), 80) }}</p>
              <a href="{{ route('front.berita.show', $item->id) }}">Baca Selengkapnya</a>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="pagination">
        {{ $berita->links() }}
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('layouts.component_frontend.footer')

</body>
</html>

berita