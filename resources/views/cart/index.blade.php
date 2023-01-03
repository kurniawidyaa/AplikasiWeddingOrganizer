<x-app-layout>
    <div class="container">
      <div class="p-3">
        <h1>Keranjang Saya</h1>
      </div>
        <div class="row">
          <div class="col col-md-8">
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
            <div class="card card-table">
              <div class="card-header">
                Item
              </div>
              <div class="card card-body">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Layanan</th>
                      <th>Harga</th>
                      <th>Diskon</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                      <th></th>
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
                      {{ $detail->service->service_code }}
                      </td>
                      <td>
                        @currency($detail->cart_detail_price)
                      </td>
                      <td>
                        @currency($detail->cart_detail_discount)
                      </td>
                      <td>
                        <div class="btn-group" role="group">
                          <form action="{{ route('user.cartdetail.update', $detail->id) }}" method="post">
                          @method('patch')
                          @csrf()
                            <input type="hidden" name="param" value="kurang">
                            <button class="btn btn-primary btn-sm">
                            -
                            </button>
                          </form>
                          <button class="btn btn-outline-primary btn-sm" disabled="true">
                            {{ $detail->cart_detail_qty }}
                          {{-- {{ number_format($detail->qty, 2) }} --}}
                          </button>
                          <form action="{{ route('user.cartdetail.update', $detail->id) }}" method="post">
                          @method('patch')
                          @csrf()
                            <input type="hidden" name="param" value="tambah">
                            <button class="btn btn-primary btn-sm">
                            +
                            </button>
                          </form>
                        </div>
                      </td>
                      <td>
                        @currency($detail->cart_detail_subtotal)
                      {{-- {{ number_format($detail->subtotal, 2) }} --}}
                      </td>
                      <td>
                      <form action="{{ route('user.cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-sm btn-danger mb-2">
                          Hapus
                        </button>                    
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col col-md-4">
            <div class="card">
              <div class="card-header">
                Ringkasan
              </div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <td>No Invoice</td>
                    <td class="text-right">
                      {{ $cartitem->invoice_number}}
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
                <div class="row">
                  <div class="col">
                    <a href="{{ route('user.cart.co') }}" class="btn btn-primary btn-block">
                      Checkout
                    </a>
                  </div>
                  <div class="col">
                    <form action="{{ route('user.cart.destroy', $cartitem->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>