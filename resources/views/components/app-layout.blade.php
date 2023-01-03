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

  {{-- swiperJS --}}
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
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
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Alamat Kami</h4>
            <p>
              Dasana Indah, <br>
              Ruko Blok RF 1 No.21 dan 22<br>
              Kabupaten Tangerang <br><br>
              <strong>Phone:</strong> +62 951 748 7191<br>
              <strong>Email:</strong> nikahmurahtangerang@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Lokasi Kami</h4>
            <div id="googleMap">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7932.165365710675!2d106.5965993!3d-6.2528363!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc44b944a02f%3A0xfa509463fb714b4b!2sJl.%20Dasana%20Indah%20Blok%20RF1%20No.21%2C%20Bojong%20Nangka%2C%20Kec.%20Klp.%20Dua%2C%20Kabupaten%20Tangerang%2C%20Banten%2015810!5e0!3m2!1sen!2sid!4v1667204479277!5m2!1sen!2sid" width="250" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Social Media Kami</h3>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/nikahmurahtangerang/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/nikahmurahtangerang/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href=""><i class="bi bi-tiktok"></i></a>
            </div>
            {{-- <div class="socmed">
              <i class="fa-brands fa-whatsapp"></i>
              <i class="fa-brands fa-instagram"></i>
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-tiktok"></i>
          </div> --}}
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Nikah Murah Tangerang</span></strong>. All Rights Reserved
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