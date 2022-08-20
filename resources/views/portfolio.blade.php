<x-app-layout title="Portfolio">
<!-- ======= Our Portfolio Section ======= -->
<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $title }}</h2>
        <ol>
          <li><a href="{{ route('user.home') }}">Home</a></li>
          <li>{{ $title }}</li>
        </ol>
      </div>

    </div>
  </section><!-- End Our Portfolio Section -->

  <!-- ======= Portfolio Section ======= -->
  <section class="portfolio">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($category as $cat)    
            <li data-filter=".filter-app">
              <a href="/portfolio?servcat={{ $cat->identifier }}"> {{ $cat->name }}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        @foreach ($portfolio as $port)
        <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
          <div class="portfolio-item">
            <img src="{{ asset('/storage/' . $port->thumbnail) }}" class="imgPort img-fluid" alt="{{ $port->ServiceCategory->name}}">
            <div class="portfolio-info">
              <h3 href="">{{ $port->ServiceCategory->name }}</h3>
              <div>
                <a href="{{ asset('/storage/' . $port->thumbnail) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
                {{-- <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a> --}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="justify-content-center">
          <div>{{ $portfolio->links() }}</div>
        </div>
      </div>

    </div>
  </section><!-- End Portfolio Section -->
</x-app-layout>