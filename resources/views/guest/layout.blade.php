<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PTSP Makassar</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/logo-makassar.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('guest/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('guest/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('guest/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('guest/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{route('index')}}" class="logo d-flex align-items-center">
        <img src="{{asset('img/dpmptsp-mks.png')}}" alt="">
        <span>SOLATA' BOSS</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ (request()->is('/') ? 'active' : '') }}" href="{{route('index')}}">Beranda</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('tentang') ? 'active' : '') }}" href="{{route('tentang')}}">Tentang</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('visi-misi') ? 'active' : '') }}" href="{{route('visi')}}">Visi Misi</a></li>
          <!-- <li><a class="nav-link scrollto {{ (request()->is('struktur-organisasi') ? 'active' : '') }}" href="{{route('struktur')}}">Struktur Organisasi</a></li> -->
          <li><a class="nav-link scrollto {{ (request()->is('lacak-perizinan') ? 'active' : '') }}" href="{{route('lacak')}}">Lacak Perizinan</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('layanan') ? 'active' : '') }}" href="{{route('layanan')}}">Layanan</a></li>
          @guest
          <li><a class="nav-link scrollto" href="{{ route('login') }}">Masuk</a></li>
          <li><a class="getstarted scrollto" href="{{ route('register') }}">Daftar</a></li>
          
          @else
          <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Profile</a></li>
              <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Logout</a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </ul>
          </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">
    <section>
    </section>
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="#" class="logo d-flex align-items-center">
              <img src="{{asset('img/dpmptsp-mks.png')}}" alt="">
              <span>SOLATA' BOSS</span>
            </a>
            <p>Visi: Terwujudnya iklim investasi yang kondusif bagi semua, melalu penyelenggaraan perizinan dan penanaman modal yang berkelas dunia.</p>
            <!-- <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> -->
          </div>

          <div class="col-lg-2 col-sm-12 footer-links">
          </div>

          <div class="col-lg-2 col-sm-12 footer-links">
            <h4>Layanan</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Surat Izin Praktik (SIP)</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Surat Izin Kerja (SIK)</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">KRK</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Pendidikan</a></li>
            </ul>
          </div>
 
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              Jl. Ahmad Yani No.2, Bulo Gading, <br>
              Kec. Ujung Pandang, Kota Makassar,<br>
              Sulawesi Selatan <br><br>
              <strong>Email:</strong> dpmptsp@makassar.go.id<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Ptsp Makassar</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('guest/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('guest/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('guest/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('guest/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('guest/js/main.js') }}"></script>
</body>
</html>