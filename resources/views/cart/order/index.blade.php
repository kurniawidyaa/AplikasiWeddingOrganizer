<x-app-layout>
    <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">
                    {{ $title }}
                  </h3>
              </div>
              <div class="card-body">
                <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Sub Total</th>
                        <th>Diskon</th>
                        <th>Total</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pengiriman</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $order)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>
                          {{ $order->cart->invoice_number }}
                        </td>
                        <td>
                          @currency($order->cart->cart_subtotal)
                        </td>
                        <td>
                          @currency($order->cart->cart_discount)
                        </td>
                        <td>
                          @currency($order->cart->cart_total)
                        </td>
                        <td>
                          {{ $order->cart->payment_status }}
                        </td>                  
                        <td>belum</td>
                        <td>
                          {{-- @auth('owner')
                            <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-sm btn-info mb-2">
                              {{ $submit }}
                            </a>
                          @endauth --}}
                          @auth('web')
                            <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-sm btn-info mb-2">
                              {{ $submit }}
                            </a>
                          @endauth
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>