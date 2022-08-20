<x-app-layout title="Layanan">

    <!-- ======= Our Services Section ======= -->
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
      </section><!-- End Our Services Section -->
  
       <!-- ======= Service Details Section ======= -->
    <section class="service-details">
      <div class="container">
        {{-- Service Category --}}
        <div>
          <div class="col-lg-12 portfolio">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active"><a href="{{ route('service') }}">All</a></li>
              @foreach ($servicecategory as $servcat)
              <li data-filter=".filter-app"><a href="/service?servcat={{ $servcat->identifier }}">{{ $servcat->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="row">
          @if ($service->count())
          @foreach ($service as $serv)
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                @if ($serv->service_thumbnail)
                <img src="{{ asset('/storage/'  . $serv->service_thumbnail) }}" alt="{{ $serv->ServiceCategory->name }}" class="imgServices img-fluid"> 
                @else
                <img src="https://source.unsplash.com/500x300?{{ $serv->service_name }}" class="card-img-top" alt="{{ $serv->service_name }}">
                @endif
              </div>
              <div class="card-body">
                <h4 class="card-title"><a href="/service?servcat={{ $serv->ServiceCategory->identifier }}">{{ $serv->service_name }}</a></h4><br>
                <div class="pricing row">
                  <h4>@currency($serv->service_price)</h4>
                  {{-- <h4><span>Discount</span>@currency($serv->servicePromo->final_price)</h4> --}}
                  <a href="{{ route('serviceDetail', $serv->identifier) }}" class="btn btn-primary text-white text-center">{{ $submit }}</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
      </div>
      {{-- <div class="blog-pagination">
        <div class="d-flex justify-content-end">{{ $serv->links() }}</div>
      </div> --}}
      @endif
    </section><!-- End Service Details Section -->
</x-app-layout>