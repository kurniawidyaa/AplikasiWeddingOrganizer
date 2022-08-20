<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" width="100%" class="rounded mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-6">
                                <h3></h3>
                                <table class="table" >
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. </td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <form action="" method="POST">
                                                @csrf
                                            <td>
                                                <input type="text" name="jumlah_pesan" class="form-control" >
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
                                            </td>
                                            </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>