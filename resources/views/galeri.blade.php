<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Galeri - YummyBook</title>

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
                    
                    <h1 style="color: white;">Galeri YummyBook</h1>
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

    <section class="gallery_area section-padding">
            <!-- LightGallery Container -->
            <div class="row g-9" id="lightgallery">
                <div class="col-lg-7 all-image" data-src="{{ asset('assets/frontend/img/gallery/g1.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g1.jpg') }}" alt="">
                        <div class="content">
                            <i class="lnr lnr-picture"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 all-image" data-src="{{ asset('assets/frontend/img/gallery/g2.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g2.jpg') }}" alt="">
                        <div class="content">
                            <i class="lnr lnr-picture"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 all-image" data-src="{{ asset('assets/frontend/img/gallery/g3.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g3.jpg') }}" alt="">
                        <div class="content"><i class="lnr lnr-picture"></i></div>
                    </div>
                </div>

                <div class="col-lg-4 all-image" data-src="{{ asset('assets/frontend/img/gallery/g4.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g4.jpg') }}" alt="">
                        <div class="content"><i class="lnr lnr-picture"></i></div>
                    </div>
                </div>

                <div class="col-lg-4 all-image" data-src="{{ asset('assets/frontend/img/gallery/g5.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g5.jpg') }}" alt="">
                        <div class="content"><i class="lnr lnr-picture"></i></div>
                    </div>
                </div>

                <div class="col-lg-5 all-image" data-src="{{ asset('assets/frontend/img/gallery/g6.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g6.jpg') }}" alt="">
                        <div class="content"><i class="lnr lnr-picture"></i></div>
                    </div>
                </div>

                <div class="col-lg-7 all-image" data-src="{{ asset('assets/frontend/img/gallery/g7.jpg') }}">
                    <div class="single-gallery">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/frontend/img/gallery/g7.jpg') }}" alt="">
                        <div class="content"><i class="lnr lnr-picture"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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