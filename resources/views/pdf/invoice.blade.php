<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
                .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
        }

        .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        }

        .invoice-box table td {
        padding: 5px;
        vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
        text-align: right;
        }

        .invoice-box table tr.top table td {
        padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
        }

        .invoice-box table tr.information table td {
        padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        }

        .invoice-box table tr.details td {
        padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
        border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
        border-top: 3px solid #eee;
        font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1 class="mb-5" style="text-align: center">INVOICE</h1>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ public_path("/img/logo.jpg") }}" >
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
                    Alamat          : {{ $order->shippingAddress->address }}<br>
                    Nomor Telepon   : {{ $order->shippingAddress->phone_number }}<br>
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
</body>
</html>