<x-app-layout>
    <section class="breadcrumbs mb-5">
        <div class="container">
    
          <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $title }}</h2>
            <ol>
              <li><a href="{{ route('user.home') }}">Home</a></li>
              <li>{{ $title }}</li>
            </ol>
          </div>
    
        </div>
      </section><!-- End Our Portfolio Section -->
      <div class="pdfbutton d-flex justify-content-end" style="margin-right: 200px; margin-bottom:30px">
        <a href="{{ route('user.generatepdf') }}" class="btn btn-primary">Download</a>
      </div>
        <div class="invoice-box mb-5">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="/img/logo.jpg">
                                </td>
                                
                                <td>
                                    Invoice             : {{ $order->cart->invoice_number }}  <br>
                                    Tanggal Pemesanan   : {{ $order->created_at }}<br>
                                    Tanggal Pengiriman  : {{ $order->delivery_date }}<br>
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
    
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Nikah Murah Tangerang.<br>
                                    Jl. Dasana Indah Ruko RF 1 no 21 dan 22<br>
                                    Kabupaten Tangerang, Banten
                                </td>
    
                                <td>
                                    Nikahmurahtangerang@gmail.com
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
    
                <tr class="heading">
                    <td>
                        Data Pelanggan
                    </td>
                </tr>
    
                <tr class="details">
                    <td>
                        Nama            : {{ $order->cart->user->name}} <br>
                        {{-- Alamat          : {{ $order->shippingAddress->address }}<br>
                        Nomor Telepon   : {{ $order->shippingAddress->phone_number }}<br> --}}
                        Email           : {{ $order->cart->user->email }}<br><br>
                        Catatan order   : <p>-</p>
                    </td>
                </tr>
    
                <tr class="heading">
                    <td>
                        Pesanan
                    </td>
    
                    <td>
                        Harga
                    </td>
                </tr>
                
                @foreach ($order->cart->cartDetail as $order)
                <tr class="item">
                    <td>
                      {{ $order->service->service_name }}
                    </td>
                        
                    <td>
                        @currency($order->cart_detail_subtotal)
                    </td>
                </tr>
                @endforeach
    
                <tr class="total">
                    <td>
                       Sub Total: @currency($order->cart->cart_subtotal)<br>
                       Discount : @currency($order->cart->cart_discount)<br>
                       Total    : @currency($order->cart->cart_total)
                    </td>
                </tr>
            </table>
        </div>
</x-app-layout>