<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
</head>
<body>
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
</body>
</html>