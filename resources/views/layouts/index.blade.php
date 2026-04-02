<!doctype html>
<html lang="en">
  <head>
    <title>Nitro &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css')}}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    

  @include('layouts.component_frontend.navbar')
  @yield('content')
  @include('layouts.component_frontend.footer')
     
    

    
    

  </div> <!-- .site-wrap -->

  <script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/jquery-ui.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/popper.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/aos.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.sticky.js')}}"></script>
  <script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js')}}"></script>

  
  <script src="{{ asset('assets/frontend/js/main.js')}}"></script>
    
  </body>
</html>