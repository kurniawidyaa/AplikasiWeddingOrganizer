<x-app-layout title="Layanan">
    <main id="main">

        <!-- ======= Our Portfolio Section ======= -->
        <section class="breadcrumbs">
          <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
              <h2>{{ $title }}</h2>
              <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="portfolio.html">Service</a></li>
                <li>{{ $title }}</li>
              </ol>
            </div>
    
          </div>
        </section><!-- End Our Portfolio Section -->
    
        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
          <div class="container">
    
            <div class="row gy-4">
              <div class="col-lg-6">
                <div class="portfolio-details">
                  <div class="align-items-center">   
                    <div class="">
                      @if ($service->service_thumbnail)
                      <img src="{{ asset('/storage/'  . $service->service_thumbnail) }}"> 
                      @else
                      <img src="https://source.unsplash.com/500x300?{{ $service->service_name }}" class="card-img-top">
                      @endif
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
              </div>
    
              <div class="col-lg-6">
                <div class="portfolio-info">
                  <h2>{{ $service->service_name }}</h2>
                  <p class="price">@currency($service->service_price)</p>
                  <ul>
                    <div class="serv-note">
                      <p>{{ $service->service_note }}</p>
                    </div>
                    {{-- <li> --}}
                      {{-- yang dikirim ke orderDetails --}}
                    <form action="{{ route('user.cartdetail.store') }}" method="POST" name="order">
                        @csrf
                      {{-- <input type="text" name="totalQyt" class="form-control"></li> --}}
                  </ul>

                      <div style="text-align:center;">  
                        <input type="hidden" name="service_id" value={{$service->id}}> 
                        <button type="submit" class="btn btn-primary"><i class="bi bi-cart2" style="font-size: 20px"></i>&nbsp;{{ $submit }}</button>
                      </div>
                    </form>
                {{-- keterangan pesanan --}}
                <div class="detail-items">
                  <table>
                    <tr>
                      <th><h5>Keterangan Paket :</h6></th>
                    </tr>
                    <tr>
                      <td><p>{!! $service->service_describe !!}</p></td>
                    </tr>
                  </table>
                </div>
              </div>
              </div> 
            </div>
    
          </div>
        </section><!-- End Portfolio Details Section -->
    
      </main><!-- End #main -->
</x-app-layout>