<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} | NMT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/styles.css" rel="stylesheet">
</head>

<body>

  <x-navbar></x-navbar>

  <main id="main">
{{ $slot }}
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kami</h4>
            <ul>
              {{-- @foreach($seviceCategory as $sc)
              <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $sc->name }}</a></li>
              @endforeach --}}
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <p>
              Dasana Indah, <br>
              Ruko Blok RF 1 No.21 dan 22<br>
              Kabupaten Tangerang <br><br>
              <strong>Phone:</strong> +62 951 748 7191<br>
              <strong>Email:</strong> nikahmurahtangerang@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Tentang Kami</h3>
            <p>Nikah Murah Tangerang Hadir untuk mempermurah dan mempermudah Pernikahan anda. mulai dari makeup, gaun, dekorasi, ketering, dll.</p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/nikahmurahtangerang/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/nikahmurahtangerang/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Nikah Murah Tangerang</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->

  {{-- WA Floating --}}
  <button class="btn btn-floating active">
    <a href="https://wa.me/62085717927709/?text=Halo...%20ada%20yang%20bisa%20kami%20bantu%20?">
        <i class="bi bi-whatsapp" style="color: white"></i></a>
  </button>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @include('sweetalert::alert')
  <!-- Vendor JS Files -->
  <script src="/vendor/purecounter/purecounter.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="/js/app.js">
  </script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>