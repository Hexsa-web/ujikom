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

    <!--================ Galeri Area =================-->
<section class="gallery_area section-padding"
    style="
        background-image: url('{{ asset('storage/ASET/back3.jpg') }}');
        background-size: 100% auto;
        background-position: center;
        background-repeat: no-repeat;
    ">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title position-relative">
                    
                    <h1 style="color: white;">Tentang YummyBook</h1>
                    <hr style="background-color: white;">

                    <div class="round-planet planet">
                        <div class="round-planet planet2">
                            <div class="shape shape1"></div>
                            <div class="shape shape2"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<br><br>

<!-- Tasty Food Section -->
    <section class="about_section section-padding">
    <div class="container">

        <!-- ABOUT -->
<div class="row align-items-center mb-5">
    <div class="col-lg-5">
        <h2 class="mb-4" style="color: #ff6b35;">Tentang</h2>
        <p class="text-muted mb-4">
            Yummy Book adalah platform web digital untuk menyimpan dan berbagi resep makanan secara modern. Platform ini memudahkan pengguna mengakses berbagai resep, menemukan inspirasi masakan, serta mengelola dan menyimpan resep favorit dalam satu tempat tanpa perlu buku fisik.
        </p>
        <p class="text-muted">
            Yummy Book tidak hanya menyimpan resep, tetapi juga menjadi wadah bagi pecinta kuliner untuk berbagi dan mengekspresikan kreativitas memasak. Pengguna dapat menambahkan resep lengkap yang mudah diikuti, dengan tampilan sederhana yang nyaman digunakan oleh pemula maupun yang sudah mahir.
        </p>
    </div>

    <div class="col-lg-7">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img src="{{ asset('storage/ASET/chef.jpg') }}" 
                     class="img-fluid rounded shadow" 
                     style="height:450px; object-fit:cover;" alt="">
            </div>
            <div class="col-md-5">
                <img src="{{ asset('storage/ASET/chef3.jpg') }}"
                     class="img-fluid rounded shadow" 
                     style="height:450px; object-fit:cover;" alt="">
            </div>
        </div>
    </div>
</div>

<!-- VISI -->
<div class="row align-items-center mb-5">
    <div class="col-lg-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <img src="{{ asset('storage/ASET/chef5.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="height:450px; object-fit:cover;" alt="Visi">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <h3 class="mb-3" style="color: #ff6b35;">Visi Kami</h3>
        <p class="text-muted">
            Menjadi platform resep makanan digital yang mudah digunakan, inovatif, dan informatif, serta mampu menjadi sumber inspirasi utama bagi masyarakat dalam mengeksplorasi berbagai jenis masakan, meningkatkan keterampilan memasak, dan memanfaatkan teknologi untuk mempermudah aktivitas di dapur.
        </p>
    </div>
</div>
<br>
<!-- MISI -->
<div class="row align-items-center">
    <div class="col-lg-6 order-lg-2">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <img src="{{ asset('storage/ASET/chef6.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="height:450px; object-fit:cover;" alt="Misi">
            </div>

            <div class="col-md-6">
                <img src="{{ asset('storage/ASET/chef2.jpg') }}"
                     class="img-fluid rounded shadow"
                     style="height:450px; object-fit:cover;" alt="Misi">
            </div>

        </div>
    </div>

    <div class="col-lg-6 order-lg-1">
        <h3 class="mb-3" style="color: #ff6b35;">Misi Kami</h3>
        <p class="text-muted">
            Yummy Book berupaya menyediakan resep yang mudah dipahami serta membantu pengguna mengelola resep secara praktis tanpa perlu buku fisik. Selain itu, platform ini juga mendorong pengguna untuk saling berbagi resep dan pengalaman memasak, sehingga tercipta lingkungan yang bermanfaat dan inspiratif bagi semua kalangan. 
        </p>
    </div>
</div>
<br><br><br><br>

    <center>
        <h2 class="mb-2" style="color: #000000;">Lokasi Kami</h2>
        <hr style="width: 100px; border: 1px solid #333131; margin: auto;">
    </center>
<br><br>
    <section class="map-container" aria-label="Peta lokasi SMK Assalaam Bandung">
    <iframe 
        src="https://www.google.com/maps?q=SMK+Assalaam+Bandung&output=embed"
        width="1200" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>
    </div>
</section>
<br><br>
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
</html>