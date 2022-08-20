<x-admin-app-layout title="Kategori Post">
    <div class="d-flex inline">
    {{-- Tambah data --}}
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Tambah Kategori Post</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            {{-- owner side --}}
            @auth('owner')
            <form action="{{ route('owner.postcat.store') }}" method="POST">
                @csrf
            @endauth
            {{-- admin side --}}
            @auth('admin')
            <form action="{{ route('admin.postcat.store') }}" method="POST">
                @csrf
            @endauth
            <div class="card-body">
                <div class="form-group">
                    <label>Kategori Post</label>
                    <input type="text" name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}"
                    placeholder="Masukkan kategori Post">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>         
            </div>
            <div class="card-footer">
                <button class="btn btn-info" type="submit">{{ $submit }}</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    {{-- Tabel data --}}
    <div class="card">
        <div class="card-body table-responsive p-0 p-0">
            <table class="table table-hover table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postcategory as $postcat)
                    <tr>
                        <input type="hidden" class="deletevalue" value="{{ $postcat->slug }}">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $postcat->name }}</td>
                        <td><div class="d-flex">
                            {{-- owner side --}}
                            @auth('owner')
                                <a href="{{ route('owner.postcat.edit', $postcat->slug) }}" class="btn btn-sm btn-warning me-2"><i class="fas fa-edit text-white"></i></a>
                            @endauth
                            {{-- admin side --}}
                            @auth('admin')
                                <a href="{{ route('admin.postcat.edit', $postcat->slug) }}" class="btn btn-sm btn-warning me-2"><i class="fas fa-edit text-white"></i></a>
                            @endauth
                            <button type="button" class="btn btn-sm btn-danger me-2 deletebtn"><i class="fas fa-trash text-white"></i></button>
                            </div></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- owner side --}}
    @auth('owner')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $('.deletebtn').click(function (e) { 
                e.preventDefault();
                var deleteId = $(this).closest("tr").find('.deletevalue').val();
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
                                type: "DELETE",
                                url: "/owner/postcat_delete/" + deleteId,
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
    @endauth

    {{-- admin side --}}
    @auth('admin')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $('.deletebtn').click(function (e) { 
                e.preventDefault();
                var deleteId = $(this).closest("tr").find('.deletevalue').val();
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
                                type: "DELETE",
                                url: "/admin/postcat_delete/" + deleteId,
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
    @endauth
</x-admin-app-layout>