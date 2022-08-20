<x-admin-app-layout>
    <div class="d-flex inline">
    {{-- Tambah data --}}
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Tambah Kategori Layanan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            @auth('admin')
            <form action="{{ route('admin.servcat.store') }}" method="POST">
                @csrf
            @endauth
            @auth('owner')
            <form action="{{ route('owner.servcat.store') }}" method="POST">
                @csrf 
            @endauth
            <div class="card-body">
                <div class="form-group">
                    <label>Kategori Layanan</label>
                    <input type="text" name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}"
                    placeholder="Masukkan kategori layanan">
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
                    @foreach ($servicecat as $servcat)
                    <tr>
                        @auth('owner')
                        <input type="hidden" class="servcatdel_val" value="{{ $servcat->identifier }}">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $servcat->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('owner.servcat.edit', $servcat->identifier) }}" class="btn btn-sm btn-warning me-2"><i class="fas fa-edit text-white"></i></a>
                                <button type="button" class="btn btn-sm btn-danger me-2 servcat_deletebtn"><i class="fas fa-trash text-white"></i></button>
                            </div>
                        </td>
                        @endauth

                        {{-- admin side --}}
                        @auth('admin')
                            <input type="hidden" class="servcatdel_val" value="{{ $servcat->identifier }}">
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $servcat->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('owner.servcat.edit', $servcat->identifier) }}" class="btn btn-sm btn-warning me-2"><i class="fas fa-edit text-white"></i></a>
                                <button type="button" class="btn btn-sm btn-danger me-2 servcat_deletebtn"><i class="fas fa-trash text-white"></i></button>
                            </div>
                        </td>
                        @endauth
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @auth('owner')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $('.servcat_deletebtn').click(function (e) { 
                e.preventDefault();
                var deleteId = $(this).closest("tr").find('.servcatdel_val').val();
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
                                url: "/owner/servcat_delete/" + deleteId,
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

            $('.servcat_deletebtn').click(function (e) { 
                e.preventDefault();
                var deleteId = $(this).closest("tr").find('.servcatdel_val').val();
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
                                url: "/admin/servcat_delete/" + deleteId,
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