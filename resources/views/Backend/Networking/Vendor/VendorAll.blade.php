@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Vendor All</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Vendor details
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<body class="">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Header Table  -->
                <div class="row mb-1">
                    <div class="col">
                        <h4>Vendor All Data</h4>
                    </div>
                    <div class="col">
                        <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#modalVendor" style="float:right">
                            + Add Data
                         </a>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Bagian</th>
                            <th>Toko</th>
                            <th>Nama</th>
                            <th>No Telfon</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($vendor as $key => $item)
                            <tr>
                                <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->bagian }}</td>
                                <td>{{ $item->toko }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_telfon }}</td>
                                <td>

                                    <a class="btn btn-info sm btn-edit" data-id="{{ $item->id }} title="Edit Data" > <i class="fas fa-edit"></i></a>
                                     {{-- <a class="btn btn-info sm btn-edit" data-id="{{ $item->id }} data-target="modalEdit" title="Edit Data" > <i class="fas fa-edit"></i></a> --}}
                                     <a href="{{ route('vendor.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Add -->
                <div class="modal fade" id="modalVendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Vendor Add</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('vendor.store') }}" enctype="multipart/from-data" id="myForm">
                                        @csrf

                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Nama PIC</label>
                                                            <input type="text" name="nama" class="form-control" id="validationCustom01"
                                                                placeholder="nama" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Toko</label>
                                                            <input type="text" name="toko" class="form-control" id="validationCustom01"
                                                                placeholder="Toko" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">No telfon</label>
                                                            <input type="number" name="no_telfon" class="form-control" id="validationCustom01"
                                                                placeholder="No Telfon" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Bagian</label>
                                                            <input type="text" name="bagian" class="form-control" id="validationCustom01"
                                                                placeholder="Bagian" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
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
                @foreach ($vendor as $item)
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Vendor Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEdit" method="POST" action="{{ route('fc.update', $item->id) }}" enctype="multipart/from-data" id="myForm">
                                        @csrf
                                        @method('PUT')

                                        <!-- Masukkan input form untuk mengedit data -->
                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Nama PIC</label>
                                                            <input type="text" name="nama" id="nama" class="form-control" id="validationCustom01"
                                                                placeholder="nama" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Toko</label>
                                                            <input type="text" name="toko" id="toko" class="form-control" id="validationCustom01"
                                                                placeholder="Toko" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">bagian</label>
                                                            <input type="text" name="bagian" id="bagian" class="form-control" id="validationCustom01"
                                                                placeholder="bagian" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">No Telfon</label>
                                                            <input type="text" name="no_telfon" id="no_telfon" class="form-control" id="validationCustom01"
                                                                placeholder="No Telfon" value="" required>
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
            var url = "{{ route('vendor_edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Isi data ke dalam form modal
                    $('#formEdit').attr('action', "{{ route('vendor.update', ':id') }}".replace(':id', id));
                    $('#formEdit').find('#nama').val(response.data.nama);
                    $('#formEdit').find('#toko').val(response.data.toko);
                    $('#formEdit').find('#no_telfon').val(response.data.no_telfon);
                    $('#formEdit').find('#bagian').val(response.data.bagian);

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
