<x-admin-app-layout title="Detail Layanan">
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            @auth('owner')
            <a href="{{ route('owner.serv.index') }}" class="btn btn-sm btn-danger">{{ $submit }}</a>
            @endauth
            @auth('admin')
            <a href="{{ route('admin.serv.index') }}" class="btn btn-sm btn-danger">{{ $submit }}</a>
            @endauth
        </div>
        <div class="card-body">
            <h2 class="px-2">{{ $service->service_name }}</h2><br>
            <div class="d-flex">
                <div class="card-img col-lg-7">
                    @if ($service->service_thumbnail)
                    <img src="{{ asset('/storage/'  . $service->service_thumbnail) }}" class="imgServices"> 
                    @else
                    <img src="https://source.unsplash.com/500x300?{{ $service->service_name }}" class="imgServices">
                    @endif
    
                    <div class="describe py-5">
                        <h5><strong>Harga : </strong>@currency($service->service_price)</h5>
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="info">
                        <p><strong>Catatan</strong> : {{ $service->service_note }}</p>
                        <p><strong>Keterangan Paket</strong> :<br>{!! $service->service_describe !!}</p>
                    </div>
                  </div>
            </div>
            </div>
        <div class="card-footer"></div>
    </div>
</x-admin-app-layout>