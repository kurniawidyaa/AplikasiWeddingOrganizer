<x-admin-app-layout title="Customer">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-tools mt-3 mb-3">
                <div class="input-group input-group-sm" >
                    <input type="text" name="table_search" class="form-control float-right" style="width: 150px;" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                </div>
            </div>
            <div class="button mt-2" style="margin-left: 650px">
                {{-- owner side --}}
                @auth('owner')
                <a href="" class="btn btn-info">{{ $submit }}</a>
                @endauth
                {{-- admin side --}}
                @auth('admin')
                <a href="" class="btn btn-info">{{ $submit }}</a>
                @endauth
            </div>
        </div>

        <div class="card-body table-responsive p-0 p-0">
            <table class="table table-hover table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No.Tlp</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                        <input type="hidden" class="deletevalue" value="{{ $user->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                            {{-- owner side --}}
                            @auth('owner')
                                <a href="" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                            @endauth
                            {{-- admin side --}}
                            @auth('admin')
                                <a href="" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                            @endauth
                            <button type="submit" class="btn btn-sm btn-danger deletebtn"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
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
                                type: "delete",
                                url: "/owner/user_delete/" + deleteId,
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
                                type: "delete",
                                url: "/admin/user_delete/" + deleteId,
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