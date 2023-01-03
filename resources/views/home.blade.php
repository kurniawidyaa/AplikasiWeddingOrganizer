<x-app-layout title="Home">
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Nikah Murah Tangerang</span></h2>
          {{-- <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a> --}}
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Nikah Murah Tangerang</h2>
          <p class="animate__animated animate__fadeInUp">Merupakan vendor wedding organizer yang berlokasi wilayah cipondoh kota tangerang, banten. Kami berdiri sejak tahun 2020.</p>
          {{-- <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a> --}}
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->
      <!-- ======= Why Us Section ======= -->
      <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
        <div class="container" style="padding: 3rem 2rem 3rem 2rem; border-radius:20px;">
          <div class="about-us">
            <h1 class="title">Tentang Kami</h1>
            <div class="about-us-content">
                <article class="text">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A quia beatae est odit illo, deleniti quam praesentium asperiores, non, soluta quae harum itaque mollitia rerum corrupti nulla dolor sapiente blanditiis ea aperiam saepe temporibus odio id sunt. Illo magni rem exercitationem pariatur dolor suscipit laboriosam, aut quas provident, numquam vero, fuga ex repellendus illum necessitatibus. Laboriosam voluptates recusandae alias commodi pariatur deserunt nihil, in quod voluptate impedit et blanditiis atque.</p>
                </article>
                <aside class="video">
                    <div class="">
                        <div class="item-1"></div>
                        <div class="item-2"></div>
                    </div>
                    <div id="cover-video"></div>
                    <button class="play-btn"><i class="fa-solid fa-play fa-3x"></i></button>
                </aside>
            </div>
          </div>
        </div>
      </section><!-- End Why Us Section -->
  
      <!-- ======= Features Section ======= -->
      <section class="features">
        <div class="container">
  
          <div class="row" data-aos="fade-up">
            <div class="gallery">
              <h1 class="title">Galeri</h1>
              <div class="gallery-box">
                  <div class="gallerybox-1">
                      <div class="gallerybox-row-1">
                          <img src="./img/galeri/mua.jpg" alt="">
                      </div>
                      <div class="gallerybox-row-1 column">
                          <div class="gallerybox-column-2">
                              <img src="./img/galeri/4.jpeg" alt="">
                          </div>
                          <div class="gallerybox-column-2">
                              <img src="./img/galeri/mua-2.jpg" alt="">
                          </div>
                      </div>
                  </div>
                  <div class="gallerybox-1 column">
                      <div class="gallerybox-column-1" style="flex-direction: row;">
                          <div class="gallerybox-row-2">
                              <img src="./img/galeri/pelaminan-2.jpg" alt="">
                          </div>
                          <div class="gallerybox-row-2" style="margin: 0;">
                            <img src="./img/galeri/photobooth-1.jpg" alt=""></div>
                          </div>
                      <div class="gallerybox-column-1">
                          <img src="./img/galeri/pelaminan.jpg" alt="">
                      </div>
                  </div>
                  <div class="gallerybox-1">
                      <div class="gallerybox-row-1">
                          <div class="gallerybox-column-2">
                              <img src="./img/galeri/wed-2.jpg" alt="">
                          </div>
                          <div class="gallerybox-column-2">
                              <img src="./img/galeri/wed-3.jpg" alt="">
                          </div>
                      </div>
                      <div class="gallerybox-row-1">
                          <img src="./img/galeri/wed-1.jpg" alt="">
                      </div>
                  </div>
              </div>
          </div>
          </div>
  
          {{-- <div class="row" data-aos="fade-up"> --}}
            <!-- Swiper -->
    <div class="service">
      <h1 class="title">Layanan</h1>
      <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @if ($service->count())
                @foreach ($service as $serv)
                <div class="swiper-slide">
                  <div class="box">
                    @if ($serv->service_thumbnail)
                        <img src="{{ asset('/storage/' . $serv->service_thumbnail) }}" alt="{{ $serv->ServiceCategory->name }}/img/galeri/mua.jpg">
                    @else
                        <img src="https://source.unsplash.com/500x300?{{ $serv->service_name }}" alt="{{ $serv->service_name }}">
                    @endif
                  </div>
                  <a href="/service?servcat={{ $serv->ServiceCategory->identifier }}">{{ $serv->service_name }}</a>
                </div>
                @endforeach
            @endif
          </div>
          <div class="swiper-pagination"></div>
        </div>
    </div>
          {{-- </div> --}}
  
          {{-- <div class="row" data-aos="fade-up">
            <div class="blog testimonials-carousel">
              <h1 class="title">Blog</h1>
              <div class="blog-box">
                  <div class="blog-property"></div>
                  <div class="blog-card">
                      <div class="blogcard-2">
                          <aside class="cover">
                              <img src="./assets/img/adat-1.jpg" alt="">
                          </aside>
                          <article class="blog-text">
                              <h3>TITLE</h3>
                              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid esse officia voluptas sequi deleniti doloremque a quam omnis voluptates modi?</p>
                              <a href="" class="btn-secondary">Read more</a>
                          </article>
                      </div>
                      <div class="blogcard-2">
                          <aside class="cover">
                              <img src="./assets/img/mua.jpg" alt="">
                          </aside>
                          <article class="blog-text">
                              <h3>TITLE</h3>
                              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid esse officia voluptas sequi deleniti doloremque a quam omnis voluptates modi?</p>
                              <a href="#" class="btn-secondary">Read more</a>
                          </article>
                      </div>
                  </div>
              </div>
          </div>
          </div> --}}
  
        </div>
      </section><!-- End Features Section -->

  </main><!-- End #main -->
</x-app-layout>