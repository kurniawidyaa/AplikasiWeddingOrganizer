<x-admin-app-layout title="Detail Layanan">
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="" class="btn btn-sm btn-danger">{{ $submit }}</a>
        </div>
        <div class="card-body">
            <h2 class="px-2">{{ $service->service_name }}</h2><br>
            <div class="d-flex">
                <div class="card-img col-lg-8">
                    @if ($service->service_thumbnail)
                    <img src="{{ asset('/storage/'  . $service->service_thumbnail) }}" class="imgServices img-fluid"> 
                    @else
                    <img src="https://source.unsplash.com/500x300?{{ $service->service_name }}" class="card-img-top">
                    @endif
    
                    <div class="describe py-5">
                        <h5><strong>Harga : </strong>@currency($service->service_price)</h5>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="info">
                        <p><strong>DETAIL</strong><br>{!! $service->service_describe !!}</p>
                        <p><strong>CATATAN</strong>: {{ $service->service_note }}</p>
                    </div>
                  </div>
            </div>
            </div>
        <div class="card-footer"></div>
    </div>
</x-admin-app-layout>