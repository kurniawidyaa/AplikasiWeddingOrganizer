<x-app-layout title="Layanan">
    <main id="main">

        <!-- ======= Our Portfolio Section ======= -->
        <section class="breadcrumbs">
          <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
              <h2>Portfolio Details</h2>
              <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li>Portfolio Details</li>
              </ol>
            </div>
    
          </div>
        </section><!-- End Our Portfolio Section -->
    
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
          <div class="container">
    
            <div class="row gy-4">
              <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                  <div class="swiper-wrapper align-items-center">   
                    <div class="swiper-slide">
                      @if ($service->service_thumbnail)
                      <img src="{{ asset('/storage/'  . $service->service_thumbnail) }}"> 
                      @else
                      <img src="https://source.unsplash.com/500x300?{{ $service->service_name }}" class="card-img-top">
                      @endif
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
                <div class="p-3">
                  <p><strong>DETAIL</strong><br>{!! $service->service_describe !!}</p>
                  <p><strong>CATATAN</strong>: {{ $service->service_note }}</p>
                </div>
              </div>
    
              <div class="col-lg-4">
                <div class="portfolio-info">
                  <h2>{{ $service->service_name }}</h2><br>
                  <h5><strong>Harga : </strong>@currency($service->service_price)</h5>
                  <ul>
                    {{-- <li> --}}
                      {{-- yang dikirim ke orderDetails --}}
                      <form action="{{ route('user.cartdetail.store') }}" method="POST" name="order">
                        @csrf
                      {{-- <input type="text" name="totalQyt" class="form-control"></li> --}}
                  </ul>
                  <div style="text-align:center">  
                    <input type="hidden" name="service_id" value={{$service->id}}> 
                    <button type="submit" class="btn btn-primary"><i class="bi bi-cart2" style="font-size: 20px"></i>&nbsp;{{ $submit }}</button>
                  </div>
                </form>
                </div>
               
              </div>
    
            </div>
    
          </div>
        </section><!-- End Portfolio Details Section -->
    
      </main><!-- End #main -->
</x-app-layout>