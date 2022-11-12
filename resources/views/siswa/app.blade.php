<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PSBB SMK Negeri 3 KOTA SORONG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{ asset('user') }}/img/favicon.png" rel="icon">
  <link href="{{ asset('user') }}/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('user') }}/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('user') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('user') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('user') }}/css/style.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SMK Negeri 3 KOTA SORONG</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('user') }}//img/logo.png" alt="" class="img-fluid"></a> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li class="{{ Request::path() === '/' ? '' : '' }}"><a href="{{ route ('siswa.dashboard') }}">Home</a></li>
          
          <li><a href="{{ route ('siswa.pendaftaran') }}" class="active">Pendaftaran</a></li>
          <li><a href="{{ route ('siswa.pengumuman') }}">Pengumuman</a></li>
          <li><a href="{{ route ('siswa.kontak') }}">Kontak</a></li>
          <li><a href="{{ route ('siswa.profil') }}">Profil</a></li>
          <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li class="{{ Request::path() === 'berita' ? '' : '' }}"><a href="{{ route ('siswa.berita') }}">Berita</a></li>
              <li><a href="{{ route ('siswa.jurusan') }}">Jurusan</a></li>
              <li><a href="{{ route ('siswa.galeri') }}">Galeri</a></li>     
              
              <li><a href="{{ route ('siswa.tentang') }}">About</a></li>
              <li><a href="team.html">Visi dan Misi</a></li>
              <!-- <li><a href="testimonials.html">Testimonials</a></li> -->
            </ul>
          </li>
          <li><a href="{{ route ('logout') }}"           
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="getstarted">logout</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->
  <main id="main">
  @yield('content')
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
@extends('siswa.partials.footer')
@section('footer')
  @yield('footer')
 <!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{ asset('user') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('user') }}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('user') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('user') }}/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('user') }}/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('user') }}/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('user') }}/js/main.js"></script>
</body>
</html>