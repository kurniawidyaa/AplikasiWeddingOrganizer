<x-app-layout>
    <div class="container">
      <div class="p-3"><h1>Alamat Pengiriman</h1></div>
        <div class="row">
          <div class="col col-12 mb-2">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    Alamat Pengiriman
                  </div>
                  <div class="col-auto">
                    <a href="{{ route('user.cart.co') }}" class="btn btn-sm btn-danger">
                      Tutup
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-stripped">
                    <thead>
                      <tr>
                        <th>Nama Penerima</th>
                        <th>Alamat</th>
                        <th>No tlp</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $pengiriman)
                      <tr>
                        <td>
                          {{ $pengiriman->recipients_name }}
                        </td>
                        <td>
                          {{ $pengiriman->address }}<br>
                          {{ $pengiriman->ward}}, {{ $pengiriman->distric}}<br>
                          {{ $pengiriman->city}}, {{ $pengiriman->province}} - {{ $pengiriman->postal_code}}
                        </td>
                        <td>
                          {{ $pengiriman->phone_number }}
                        </td>
                        <td>
                          <form action="{{ route('user.shippingaddress.update', $pengiriman->id) }}" method="post">
                            @method('patch')
                            @csrf()
                            @if($pengiriman->status == 'utama')
                            <button type="submit" class="btn btn-primary btn-sm" disabled>Set Utama</button>
                            @else
                            <button type="submit" class="btn btn-primary btn-sm">Set Utama</button>
                            @endif
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col col-8">
            <div class="card">
              <div class="card-header">
                Form Alamat Pengiriman
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
                <form action="{{ route('user.shippingaddress.store') }}" method="post">
                  @csrf()
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="recipients_name">Nama Penerima</label>
                        <input type="text" name="recipients_name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="phone_number">No Tlp</label>
                        <input type="text" name="phone_number" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="province">Provinsi</label>
                        <input type="text" name="province" class="form-control">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="city">Kota</label>
                        <input type="text" name="city" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="ward">Kecamatan</label>
                        <input type="text" name="ward" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="distric">Kelurahan</label>
                        <input type="text" name="distric" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="postal_code">Kodepos</label>
                        <input type="text" name="postal_code" class="form-control">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>