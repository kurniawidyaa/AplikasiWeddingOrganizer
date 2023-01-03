<x-admin-app-layout>
    {{-- <button id="normalalert">normalalert</button>
    <button id="sweetalert">sweetalert</button>
    <button id="toastr" >Success Toast</button> --}}
    <div class="row">
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ $order->count() }}</h3>
        <p>Orders</p>
        </div>
        <div class="icon">
        <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-success">
        <div class="inner">
        <h3>{{ $service }}</h3>
        <p>Layanan</p>
        </div>
        <div class="icon">
        <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-warning" style="color: white">
        <div class="inner">
        <h3>{{ $user }}</h3>
        <p>User Registrations</p>
        </div>
        <div class="icon">
        <i class="fas fa-user-plus"></i>
        </div>
        <a href="#" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        
        <div class="small-box bg-danger">
        <div class="inner">
        <h3>{{ $promo }}</h3>
        <p>Promo</p>
        </div>
        <div class="icon">
        <i class="fas fa-chart-pie"></i>
        </div>
        <a href="#" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
        </div>
        
        </div>     

    <div class="card">
        <form action="{{ route('admin.process') }}" method="get">
            @csrf
        <div class="card-header d-flex inline">
            <div class="form-group row" >
                <label for="bulan">Bulan </label>
                    <select name="bulan" id="bulan" class="costum-select" style="width: 150px">
                        <option selected>-- Pilih Bulan --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">Nopember</option>
                      <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group ml-3 row" >
                    <label for="tahun">Tahun </label>
                    <select name="tahun" id="tahun" class="costum-select" style="width: 150px">
                        <option selected>-- Pilih Tahun --</option>
                        @for($a = 2022; $a <= 2050; $a++)
                        <option value="{{$a}}">{{$a}}</option>
                        @endfor
                      </select>
                    </div>
                    <div class="button mt-3" >
                    <button type="submit" class="btn btn-info">Cari</button>
                </div>
                </form>
        </div>

        <div class="card-body table-responsive p-0 p-0">
            <table class="table table-hover table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        {{-- <th>Nama Penerima</th>
                        <th>Nomor Tlp</th> --}}
                        <th>Tanggal Pengiriman</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->cart->invoice_number }}</td>
                        {{-- <td>{{ $order->shippingAddress->recipients_name}}</td> --}}
                        {{-- <td>{{ $order->shippingAddress->phone_number }}</td> --}}
                        <td>{{ $order->delivery_date }}</td>
                        <td><span class="tag tag-success">{{ $order->cart->payment_status }}</span></td>
                        <td><div class="btn-group btn-group-sm">
                            <a href="" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                            <a href="#" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    
    </div>

    <script>
    var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    iconColor: 'white',
  customClass: {
    popup: 'colored-toast'
  },
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
        document.getElementById('normalalert').addEventListener('click', function(){
            alert('I am a Normal Alert');
        })
        document.getElementById('sweetalert').addEventListener('click', function(){
            swal.fire('I am a Sweet Alert');
        })
        document.getElementById('toastr').addEventListener('click', function(){
        toastMixin.fire({
            animation: true,
            // title: 'Signed in Successfully'
        });
        });
    </script>
</x-admin-app-layout>