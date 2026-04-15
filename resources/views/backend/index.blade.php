<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="dark" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/backend/images/logos/favicon.png')}}" />

  <!-- Core Css -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/styles.css') }}"/>

  <title>Admin Panel - Resep Nusantara</title>

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{asset('assets/backend/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}" />

  <!-- Custom Navy Gold Theme -->
  <style>
    :root {
      --navy:       #1a1a2e;
      --navy-mid:   #22223a;
      --navy-light: #2d2d48;
      --gold:       #e8c547;
      --gold-dark:  #c9a82e;
      --gold-lt:    rgba(232,197,71,0.10);
      --gold-glow:  rgba(232,197,71,0.18);
      --txt-bright: #f5f0e8;
      --txt-mid:    #c8c0b0;
      --txt-muted:  #8a8070;
      --bdr:        rgba(255,255,255,0.07);
      --bdr-mid:    rgba(255,255,255,0.12);
      --font-d:     'DM Serif Display', serif;
      --font-b:     'DM Sans', sans-serif;
    }

    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Serif+Display:ital@0;1&display=swap');

    /* Global Override */
    body {
      background: var(--navy) !important;
      font-family: var(--font-b) !important;
      color: var(--txt-mid) !important;
    }

    /* Sidebar */
    .left-sidebar {
      background: var(--navy-mid) !important;
      border-right: 1px solid var(--bdr) !important;
    }

    .sidebar-nav {
      background: var(--navy-mid) !important;
    }

    .sidebar-item .sidebar-link {
      color: var(--txt-mid) !important;
      transition: all 0.2s;
    }

    .sidebar-item .sidebar-link:hover {
      background: var(--gold-lt) !important;
      color: var(--gold) !important;
    }

    .sidebar-item .sidebar-link.active {
      background: var(--gold-lt) !important;
      color: var(--gold) !important;
      border-left: 3px solid var(--gold);
    }

    .nav-small-cap {
      color: var(--gold) !important;
      font-weight: 700;
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      padding: 12px 20px 8px;
    }

    .nav-small-cap-icon {
      color: var(--gold) !important;
    }

    /* Header/Navbar */
    .app-header {
      background: var(--navy-mid) !important;
      border-bottom: 1px solid var(--bdr) !important;
    }

    .navbar-nav .nav-link {
      color: var(--txt-mid) !important;
    }

    .navbar-nav .nav-link:hover {
      color: var(--gold) !important;
    }

    /* Page Wrapper */
    .page-wrapper {
      background: var(--navy) !important;
    }

    .body-wrapper {
      background: var(--navy) !important;
      padding: 20px;
    }

    .container-fluid {
      background: transparent !important;
    }

    /* Cards - Override Bootstrap */
    .card {
      background: var(--navy-mid) !important;
      border: 1px solid var(--bdr) !important;
      border-radius: 16px !important;
      box-shadow: 0 8px 40px rgba(0,0,0,0.2) !important;
    }

    .card-header {
      background: linear-gradient(135deg, var(--navy-light) 0%, var(--navy-mid) 100%) !important;
      border-bottom: 1px solid var(--bdr-mid) !important;
      color: var(--txt-bright) !important;
      font-family: var(--font-d);
      font-size: 1.1rem;
      padding: 1.2rem 1.6rem;
    }

    .card-body {
      background: var(--navy-mid) !important;
      color: var(--txt-mid) !important;
      padding: 1.8rem;
    }

    /* Buttons */
    .btn-primary {
      background: linear-gradient(135deg, var(--gold), var(--gold-dark)) !important;
      border: none !important;
      color: var(--navy) !important;
      font-weight: 700 !important;
      box-shadow: 0 4px 16px var(--gold-glow) !important;
      transition: all 0.2s;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 22px rgba(232,197,71,0.3) !important;
      color: var(--navy) !important;
    }

    .btn-success {
      background: linear-gradient(135deg, #2ecc71, #27ae60) !important;
      border: none !important;
      color: white !important;
      font-weight: 600 !important;
    }

    .btn-danger {
      background: linear-gradient(135deg, #e05555, #c0392b) !important;
      border: none !important;
      color: white !important;
      font-weight: 600 !important;
    }

    .btn-secondary {
      background: transparent !important;
      border: 1.5px solid var(--bdr-mid) !important;
      color: var(--txt-mid) !important;
      font-weight: 600 !important;
    }

    .btn-secondary:hover {
      border-color: var(--gold) !important;
      color: var(--gold) !important;
    }

    /* Forms */
    .form-control, .form-select {
      background: var(--navy-light) !important;
      border: 1px solid var(--bdr-mid) !important;
      color: var(--txt-bright) !important;
      border-radius: 10px !important;
    }

    .form-control:focus, .form-select:focus {
      background: var(--navy-light) !important;
      border-color: var(--gold) !important;
      box-shadow: 0 0 0 3px var(--gold-lt) !important;
      color: var(--txt-bright) !important;
    }

    .form-control::placeholder {
      color: var(--txt-muted) !important;
    }

    .form-label {
      color: var(--txt-mid) !important;
      font-weight: 600;
      font-size: 13px;
    }

    /* Tables */
    .table {
      color: var(--txt-mid) !important;
      border-color: var(--bdr) !important;
    }

    .table thead {
      background: rgba(255,255,255,0.03) !important;
      border-bottom: 1px solid var(--bdr-mid) !important;
    }

    .table thead th {
      color: var(--txt-muted) !important;
      font-weight: 700;
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      border-color: var(--bdr-mid) !important;
    }

    .table tbody td {
      border-color: var(--bdr) !important;
      color: var(--txt-mid) !important;
    }

    .table tbody tr:hover {
      background: rgba(255,255,255,0.025) !important;
    }

    .table-bordered {
      border-color: var(--bdr) !important;
    }

    /* Alerts */
    .alert {
      border-radius: 12px !important;
      border: 1px solid !important;
    }

    .alert-success {
      background: rgba(46,204,113,0.12) !important;
      border-color: rgba(46,204,113,0.25) !important;
      color: #2ecc71 !important;
    }

    .alert-danger {
      background: rgba(224,85,85,0.12) !important;
      border-color: rgba(224,85,85,0.25) !important;
      color: #e05555 !important;
    }

    .alert-warning {
      background: rgba(240,165,0,0.12) !important;
      border-color: rgba(240,165,0,0.25) !important;
      color: #f0a500 !important;
    }

    .alert-info {
      background: rgba(74,158,255,0.12) !important;
      border-color: rgba(74,158,255,0.25) !important;
      color: #4a9eff !important;
    }

    /* Breadcrumb */
    .breadcrumb {
      background: transparent !important;
      margin-bottom: 1rem;
    }

    .breadcrumb-item {
      color: var(--txt-muted) !important;
      font-size: 12.5px;
    }

    .breadcrumb-item.active {
      color: var(--txt-mid) !important;
    }

    .breadcrumb-item a {
      color: var(--gold) !important;
      text-decoration: none;
    }

    .breadcrumb-item a:hover {
      color: var(--gold-dark) !important;
    }

    /* Modal */
    .modal-content {
      background: var(--navy-mid) !important;
      border: 1px solid var(--bdr) !important;
      border-radius: 16px !important;
    }

    .modal-header {
      background: linear-gradient(135deg, var(--navy-light) 0%, var(--navy-mid) 100%) !important;
      border-bottom: 1px solid var(--bdr-mid) !important;
      color: var(--txt-bright) !important;
    }

    .modal-body {
      color: var(--txt-mid) !important;
    }

    .modal-footer {
      border-top: 1px solid var(--bdr-mid) !important;
    }

    .btn-close {
      filter: invert(1) grayscale(100%) brightness(200%);
    }

    /* Dropdown */
    .dropdown-menu {
      background: var(--navy-mid) !important;
      border: 1px solid var(--bdr) !important;
      border-radius: 12px !important;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3) !important;
    }

    .dropdown-item {
      color: var(--txt-mid) !important;
      transition: all 0.2s;
    }

    .dropdown-item:hover {
      background: var(--gold-lt) !important;
      color: var(--gold) !important;
    }

    /* Pagination */
    .pagination .page-link {
      background: var(--navy-light) !important;
      border: 1px solid var(--bdr-mid) !important;
      color: var(--txt-mid) !important;
    }

    .pagination .page-link:hover {
      background: var(--gold-lt) !important;
      color: var(--gold) !important;
      border-color: var(--gold) !important;
    }

    .pagination .page-item.active .page-link {
      background: linear-gradient(135deg, var(--gold), var(--gold-dark)) !important;
      border-color: var(--gold) !important;
      color: var(--navy) !important;
    }

    /* Badges */
    .badge {
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 99px;
      font-size: 11.5px;
    }

    .badge.bg-primary {
      background: var(--gold) !important;
      color: var(--navy) !important;
    }

    .badge.bg-success {
      background: rgba(46,204,113,0.2) !important;
      color: #2ecc71 !important;
    }

    .badge.bg-danger {
      background: rgba(224,85,85,0.2) !important;
      color: #e05555 !important;
    }

    .badge.bg-warning {
      background: rgba(240,165,0,0.2) !important;
      color: #f0a500 !important;
    }

    /* Preloader */
    .preloader {
      background: var(--navy) !important;
    }

    /* Customizer Button */
    .customizer-btn {
      background: linear-gradient(135deg, var(--gold), var(--gold-dark)) !important;
      border: none !important;
      box-shadow: 0 4px 16px var(--gold-glow) !important;
    }

    .customizer-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 22px rgba(232,197,71,0.3) !important;
    }

    /* Offcanvas */
    .offcanvas {
      background: var(--navy-mid) !important;
      border-left: 1px solid var(--bdr) !important;
    }

    .offcanvas-header {
      border-bottom: 1px solid var(--bdr-mid) !important;
      color: var(--txt-bright) !important;
    }

    .offcanvas-body {
      color: var(--txt-mid) !important;
    }

    /* Toast */
    .toast {
      background: var(--navy-mid) !important;
      border: 1px solid var(--bdr) !important;
    }

    /* Text Colors */
    .text-muted {
      color: var(--txt-muted) !important;
    }

    .text-dark {
      color: var(--txt-bright) !important;
    }

    /* Links */
    a {
      color: var(--gold);
      transition: color 0.2s;
    }

    a:hover {
      color: var(--gold-dark);
    }

    /* Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: var(--navy-light);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--gold-lt);
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--gold);
    }

    /* Input Group */
    .input-group-text {
      background: var(--navy-light) !important;
      border: 1px solid var(--bdr-mid) !important;
      color: var(--txt-mid) !important;
    }

    /* Custom Headings */
    h1, h2, h3, h4, h5, h6 {
      color: var(--txt-bright) !important;
    }
  </style>

  @yield('styles')
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{asset('assets/backend/images/logos/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
  </div>

  <div id="main-wrapper">
    <!-- Sidebar Start -->
    @include('layouts.component_backend.sidebar')
    <!--  Sidebar End -->

    <div class="page-wrapper">
      <!--  Header Start -->
      @include('layouts.component_backend.navbar')
      <!--  Header End -->

      <div class="body-wrapper">
        @yield('content')
      </div>

      <!-- Customizer Button -->
      <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" 
              type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="icon ti ti-settings fs-7"></i>
      </button>
    </div>
  </div>

  <div class="dark-transparent sidebartoggler"></div>

  <!-- Scripts -->
  <script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>
  <script src="{{asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/backend/libs/simplebar/dist/simplebar.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/app.init.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/theme.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/app.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/theme/sidebarmenu.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="{{asset('assets/backend/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/backend/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/dashboards/dashboard.js')}}"></script>

  @yield('js')
  @stack('scripts')
</body>

</html>