<x-app-layout title="Keranjang">
    <!-- ======= Our Services Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2><i class="bi bi-cart-fill"></i> {{ $title }}</h2>
            <ol>
              <li><a href="{{ route('user.home') }}">Home</a></li>
              <li>{{ $title }}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Our Services Section -->
    <div class="text-center p-3">
        {{-- <h1 class=""><i class="bi bi-cart-fill"></i> Keranjang Saya</h1> --}}
        @if (!empty($order))
            <h4 class="">({{ $orderDetail->count() }}) layanan di dalam keranjang</h4>
    </div>
<section class="section-content bg padding-y border-top">
  <div class="container">
      <div class="row">
          <div class="col-sm-9">
            <p align="right"><strong>Tanggal Pesan :</strong> {{ $order->date }}</p>
          </div>
      </div>
      <div class="row">
          <main class="col-sm-9">
                  <div class="card">
                      <table class="table table-hover shopping-cart-wrap">
                          <thead class="text-muted">
                          <tr>   
                              <th scope="col">#</th>
                              <th scope="col">Layanan</th>
                              <th scope="col" width="" title="Quantity">Jumlah</th>
                              <th scope="col" width="">Harga</th>
                              <th scope="col" class="text-right" width="200">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($orderDetail as $od)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                  <td>
                                      <figure class="media">
                                          <figcaption class="media-body">
                                              <h6 class="title text-truncate">{{ $od->Service->name }}</h6>
                                          </figcaption>
                                      </figure>
                                  </td>
                                  <td>
                                      <var class="qty">{{ $od->qty}}</var>
                                  </td>
                                  <td>
                                      <div class="price-wrap">
                                          <var class="price">@currency($od->Service->price)</var>
                                      </div>
                                  </td>
                                  <td class="text-right">
                                  <form action="{{ route('user.cart.del', $od->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" class="delete" value="{{ $od->id }}">
                                  <button type="submit" class="btn btn-sm btn-danger deletebtn"><i class="bi bi-cart-x"></i></button>
                                   </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  
          </main>
          <aside class="col-sm-3">
              <form action="{{ route('user.deleteall', $order->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-block mb-4">Bersihkan Keranjang</button>
              </form>
              
              <div class="p2">
                  <p>Sub Total : @currency($order->totalPrice)</p>
                  <p>Tax (10%) : </p>
              </div>
              <dl class="dlist-align h4">
                  <dt>Total:</dt>
                  <dd class="text-right">@currency($order->totalPrice) <strong></strong></dd>
              </dl>
              <hr>

              <a href="" class="btn btn-success btn-lg btn-block">Proses untuk Checkout</a>
          </aside>
          @else
          <div class="no-item-bg p-5">
            <img src="/img/noitem-cart.gif" alt="" class="p-5">
            <h3 class="mb-5">Opsss... keranjangmu kosong</h3>
            <a href="{{ route('service') }}" class="chart btn-primary">Yuk Belanja</a>
          </div>
          @endif
      </div>
  </div>
</section>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $('.deletebtn').click(function (e) { 
            e.preventDefault();
            var deleteId = $(this).closest("tr").find('.delete').val();
            Swal.fire({
                title: 'Peringatan!',
                text: "Apakah anda yakin akan menghapus data?",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = {
                            "_token": $('input[name="csrf-token"]').val(),
                            "id": deleteId,
                        };
                        $.ajax({
                            type: "delete",
                            url: "/user/delete" + deleteId,
                            data: data,
                            success: function (response) {
                                Swal.fire(
                                'Deleted!',
                                response.status,
                                'success'
                                )
                                .then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                })
            
        });
    });
</script>
</x-app-layout>