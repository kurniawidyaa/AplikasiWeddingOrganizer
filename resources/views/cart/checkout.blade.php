<x-app-layout title="Checkout">
    <div class="container">
      <div class="p-3"><h1>Checkout</h1></div>
        <div class="row">
          <div class="col col-8">
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
            <div class="row mb-2">
              <div class="col col-12 mb-2">
                <div class="card">
                  <div class="card-header">
                    
                  </div>
                  <div class="card-body">
                    <table class="table table-stripped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Produk</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Qty</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cartitem->CartDetail as $detail)
                        <tr>
                          <td>
                          {{ $loop->iteration}}
                          </td>
                          <td>
                          {{ $detail->service->service_name }}
                          <br />
                          {{ $detail->service->service_code}}
                          </td>
                          <td>
                          @currency($detail->cart_detail_price)
                          </td>
                          <td>
                            @currency($detail->cart_detail_discount)
                          </td>
                          <td>
                            @currency($detail->cart_detail_qty)
                          </td>
                          <td>
                            @currency($detail->cart_detail_subtotal)
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col col-12">
                <div class="card">
                  <div class="card-header">Alamat Pengiriman</div>
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
                        @if($shippingaddress)
                          <tr>
                            <td>
                              {{ $shippingaddress->receipts_name }}
                            </td>
                            <td>
                              {{ $shippingaddress->address }}<br />
                              {{ $shippingaddress->ward}}, {{ $shippingaddress->distric}}<br />
                              {{ $shippingaddress->city}}, {{ $shippingaddress->province}} - {{ $shippingaddress->pos_code}}
                            </td>
                            <td>
                              {{ $shippingaddress->phone_number }}
                            </td>
                            <td>
                              <a href="{{ route('user.shippingaddress.update', $shippingaddress->id) }}" class="btn btn-success btn-sm">
                                Ubah Alamat
                              </a>                        
                            </td>
                          </tr>
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                    <a href="{{ route('user.shippingaddress.index') }}" class="btn btn-sm btn-primary">
                      Tambah Alamat
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col col-4">
            <div class="card">
              <div class="card-header">
                Ringkasan
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <td>No Invoice</td>
                    <td class="text-right">
                      {{ $cartitem->invoice_number }}
                    </td>
                  </tr>
                  <tr>
                    <form action="{{ route('user.order.store', $cartitem->id) }}" method="post">
                      @csrf()
                    <td>Tanggal pengiriman</td>
                    <td class="text-right">
                      <input type="date" name="delivery_date" >
                      @error('delivery_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                    </td>
                  </tr>
                  <tr>
                    <td>Subtotal</td>
                    <td class="text-right">
                        @currency($cartitem->cart_subtotal)
                    </td>
                  </tr>
                  <tr>
                    <td>Diskon</td>
                    <td class="text-right">
                        @currency($cartitem->cart_discount)
                    </td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td class="text-right">
                      @currency($cartitem->cart_total)
                    </td>
                  </tr>
                </table>
              </div>
              <div class="card-footer">
                
                  <button type="submit" class="btn btn-danger btn-block">Buat Pesanan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>