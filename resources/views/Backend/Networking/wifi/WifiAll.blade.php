@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Wifi All</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Wifi details
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<body class="">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Header Table  -->
                <div class="row mb-1">
                    <div class="col">
                        <h4>Wifi All Data</h4>
                    </div>
                    <div class="col">
                        <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right">
                            + Add Wifi
                         </a>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Wan</th>
                            <th>Lan</th>
                            <th>Wifi Password</th>
                            <th>Login</th>
                            <th>Password Login</th>
                            <th>Merk</th>
                            <th width="2%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($all as $key => $item)
                            <tr>
                                <td>{{ '' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->wan }}</td>
                                <td>{{ $item->lan }}</td>
                                <td>{{ $item->wifi_password }}</td>
                                <td>{{ $item->login }}</td>
                                <td>{{ $item->login_pass }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>{{ $item->status }}</td>
                                <td>

                                     <a class="btn btn-info sm btn-edit" data-id="{{ $item->id }} title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     {{-- <a class="btn btn-info sm wifi-btn-edit" data-id="{{ $item->id }} title="Edit Data"><i class="fas fa-edit"></i></a> --}}
                                     <a href="{{ route('wifi.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>

                <!-- Modal Add -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Wifi Add</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('wifi.store') }}" enctype="multipart/from-data" id="myForm">
                                        @csrf

                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Name</label>
                                                            <input type="text" name="name" class="form-control" id="validationCustom01"
                                                                placeholder="name" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Wan</label>
                                                            <input type="text" name="wan" class="form-control" id="validationCustom01"
                                                                placeholder="wan" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Lan</label>
                                                            <input type="text" name="lan" class="form-control" id="validationCustom01"
                                                                placeholder="lan" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Wifi Password</label>
                                                            <input type="text" name="wifi_password" class="form-control" id="validationCustom01"
                                                                placeholder="wifi_password" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Login</label>
                                                            <input type="text" name="login" class="form-control" id="validationCustom01"
                                                                placeholder="login" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Login Pass</label>
                                                            <input type="text" name="login_pass" class="form-control" id="validationCustom01"
                                                                placeholder="password login" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Merk</label>
                                                            <input type="text" name="merk" class="form-control" id="validationCustom01"
                                                                placeholder="merk" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                   <div class="row mb-4">
                                                        <label class="col-sm-2 col-form-label">Status</label>
                                                        <div class="form-group col-sm-12">
                                                            <select class="form-select" name="status" aria-label="Default select example">
                                                                <option selected="">Open this select menu</option>
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Non Aktif">Non Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-info waves waves-effect waves-light " value="Submit">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                @foreach ($all as $item)
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Astragraphia Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEdit" method="POST" action="{{ route('wifi.update', $item->id) }}" enctype="multipart/from-data" id="myForm">
                                        @csrf
                                        @method('PUT')

                                        <!-- Masukkan input form untuk mengedit data -->
                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Name</label>
                                                            <input type="text" name="name" id="name" class="form-control"
                                                                placeholder="name"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">WAN</label>
                                                            <input type="text" name="wan" id="wan" class="form-control"
                                                                placeholder="wan"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">lan</label>
                                                            <input type="text" name="lan" id="lan" class="form-control"
                                                                placeholder="lan"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">wifi_password</label>
                                                            <input type="text" name="wifi_password" id="wifi_password" class="form-control"
                                                                placeholder="wifi_password"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">login</label>
                                                            <input type="text" name="login" id="login" class="form-control"
                                                                placeholder="login"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">login_pass</label>
                                                            <input type="text" name="login_pass" id="login_pass" class="form-control"
                                                                placeholder="login_pass"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">merk</label>
                                                            <input type="text" name="merk" id="merk" class="form-control"
                                                                placeholder="merk"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Status</label>
                                                        <select class="form-select" name="status" value="{{ $item->status }}" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Aktif" {{ $item->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                            <option value="Non Aktif" {{ $item->status === 'Non Aktif' ? 'selected' : '' }} >Non Aktif</option>
                                                        </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
</body>

@section('js')
<!-- JS Edit -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var url = "{{ route('wifi.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Isi data ke dalam form modal
                    $('#formEdit').attr('action', "{{ route('wifi.update', ':id') }}".replace(':id', id));
                    $('#formEdit').find('#name').val(response.data.name);
                    $('#formEdit').find('#wan').val(response.data.wan);
                    $('#formEdit').find('#lan').val(response.data.lan);
                    $('#formEdit').find('#wifi_password').val(response.data.wifi_password);
                    $('#formEdit').find('#login').val(response.data.login);
                    $('#formEdit').find('#login_pass').val(response.data.login_pass);
                    $('#formEdit').find('#merk').val(response.data.merk);
                    $('#formEdit').find('#status').val(response.data.status);

                    // Tampilkan modal edit
                    $('#modalEdit').modal('show');
                },
                error: function(xhr, status, error) {
                    // Tangani jika terjadi error saat mengambil data
                    alert("Terjadi kesalahan saat mengambil data.");
                }
            });
        });
    });
</script>
@endsection

@endsection
