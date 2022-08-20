<x-admin-app-layout title="Tambah Promo">
    <div class="container-fluid">
        <div class="row">
          <div class="col col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Produk</h3>
                <div class="card-tools">
                  <a href="" class="btn btn-sm btn-danger">
                    Tutup
                  </a>
                </div>
              </div>
              <div class="card-body">
                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
                @endforeach
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form action="{{ route('owner.promo.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="service_id">Layanan</label>
                    <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror">
                      @error('service_id')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                      <option selected>--- Pilih Layanan ---</option>
                      @foreach($service as $service)
                        @if (old('service_id') == $service->id)
                          <option value="{{ $service->id }}" selected>{{ $service->service_name}}</option>
                        @else
                          <option value="{{ $service->id }}">{{ $service->service_name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="starting_price">Harga Awal</label>
                    <input type="text" name="starting_price" id="starting_price" class="form-control" value="{{ old('starting_price') }}">      
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="percent_discount">Diskon Persen</label>
                        <input type="text" name="percent_discount" id="percent_discount" class="form-control" value={{ old('percent_discount') }}>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="nominal_discount">Diskon Nominal</label>
                        <input type="text" name="nominal_discount" id="nominal_discount" class="form-control" value={{ old('nominal_discount') }}>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="final_price">Harga Akhir</label>
                    <input type="text" name="final_price" id="final_price" class="form-control" value={{ old('final_price') }}>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        // cari nominal diskon
        $('#percent_discount').on('keyup', function() {
          var starting_price = $('#starting_price').val();
          var percent_discount = $('#percent_discount').val();
          var nominal_discount = percent_discount / 100 * starting_price;
          var final_price = starting_price - nominal_discount;
          $('#nominal_discount').val(nominal_discount);
          $('#final_price').val(final_price);
        })
        // cari nominal persen
        $('#nominal_discount').on('keyup', function() {
          var starting_price = $('#starting_price').val();
          var nominal_discount = $('#nominal_discount').val();
          var percent_discount = nominal_discount / starting_price * 100;
          var final_price = starting_price - nominal_discount;
          $('#percent_discount').val(percent_discount);
          $('#final_price').val(final_price);
        })
        // load produk detail
        $('#service_id').on('change', function() {
          var id = $('#service_id').val();
          $.ajax({
            url: '/owner/loadasync/'+id,
            type: 'get',
            dataType: 'json',
            success: function (data,status) {
              if (status == 'success') {
                $('#starting_price').val(data.itemproduk.harga);
              }
            },
            error : function(x,t,m) {
            }
          })
        })
      </script>
</x-admin-app-layout>