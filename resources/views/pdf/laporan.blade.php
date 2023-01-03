<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');
* {
    box-sizing: border-box;
    font-family: 'Roboto';
}
.card-body{
    display: grid;
    grid-auto-flow: column;
}
.card-title {
    text-align: center;
    margin: 50px 0 0 50px;
}
table {
    border-collapse: collapse;
    max-width: 100%;
}
th {
    background-color: #7ABDC1;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
}

     </style>
</head>

<body>
    <div class="card-title">
        <img src="" alt="">
        <h1>Laporan Penjualan</h1>
        <h3>Periode {{ $bulan != "" ? "Bulan ".$bulan: "" }} {{ $tahun }}</h3>
    </div>
    <div class="card-body">
        <div class="ringkasan">
            <h2>Ringkasan Transaksi</h2>
            <!-- cetak totalnya -->
            <?php
            $total = 0;
            foreach ($transactionitem as $k) {
              $total += $k->cart->cart_total;
            }
            ?>
              <!-- end cetak totalnya -->
            <table>
                <tr>
                    <th>Total Penjualan</th>
                    <td>@currency($total)</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>{{ count($transactionitem) }} Transaksi</td>
                </tr>
            </table>
        </div>
        <div class="data">
            <h2>Rincian Transaksi</h2>
            <table>
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
                      <td>{{ $transaksi->cart->invoice_number }}</td>
                      <td>@currency($transaksi->cart->cart_subtotal)</td>                     
                      <td>@currency($transaksi->cart->cart_diskon)</td>
                      <td>@currency($transaksi->cart->cart_total)</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</body>

</html>