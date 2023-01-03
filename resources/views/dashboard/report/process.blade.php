<x-admin-app-layout>
    <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Laporan Penjualan</h3>
                <div class="card-tools">
                  @auth('owner')
                    <a href="{{ route('owner.pdf.report') }}" class="btn btn-sm btn-info mx-2">Download</a>
                  @endauth
                  @auth('admin')
                    <a href="{{ route('admin.pdf.report') }}" class="btn btn-sm btn-info mx-2">Download</a>
                  @endauth
                  <a href="" class="btn btn-sm btn-danger">
                    Tutup
                  </a>
                </div>
              </div>
              <div class="card-body">
                <h3 class="text-center">Periode {{ $bulan != "" ? "Bulan ".$bulan: "" }} {{ $tahun }}</h3>
                <div class="row">
                  <div class="col col-lg-4 col-md-4">
                    <h4 class="text-center">Ringkasan Transaksi</h4>
                    <!-- cetak totalnya -->
                    <?php
                    $total = 0;
                    foreach ($transactionitem as $k) {
                      $total += $k->cart->cart_total;
                    }
                    ?>
                    <!-- end cetak totalnya -->
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td>Total Penjualan</td>
                          <td>@currency($total)</td>
                        </tr>
                        <tr>
                          <td>Total Transaksi</td>
                          <td>{{ count($transactionitem) }} Transaksi</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col col-lg-8 col-md-8">
                    <h4 class="text-center">Rincian Transaksi</h4>
                    <div class="table-responsive">
                      <table class="table table-stripped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Subtotal</th>
                            <th>Diskon</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($transactionitem as $transaksi)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                            {{ $transaksi->cart->invoice_number }}
                            </td>
                            <td>
                            @currency($transaksi->cart->cart_subtotal)
                            </td>                     
                            <td>
                            @currency($transaksi->cart->cart_diskon)
                            </td>
                            <td>
                            @currency($transaksi->cart->cart_total)
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
        </div>
      </div>
</x-admin-app-layout>