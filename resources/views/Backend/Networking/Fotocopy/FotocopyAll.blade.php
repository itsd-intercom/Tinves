@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Astragraphia All</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Astragraphia details
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
                        <h4>Astragraphia All Data</h4>
                    </div>
                    <div class="col">
                        <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#modalAstragraphia" style="float:right">
                            + Add Data
                         </a><br>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Pengguna</th>
                            <th>Lokasi</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>No Equipment</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($fc as $key => $item)
                                <tr>
                                    <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $item->pengguna }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->no_equipment }}</td>
                                    <td>
                                        <a class="btn btn-info sm btn-edit" data-id="{{ $item->id }} title="Edit Data" > <i class="fas fa-edit"></i></a>
                                        <a href="{{ route('fc.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

                <!-- Modal Add -->
                <div class="modal fade" id="modalAstragraphia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Astragraphia Add</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('fc.store') }}" enctype="multipart/from-data" id="myForm">
                                        @csrf

                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Pengguna</label>
                                                            <input type="text" name="pengguna" class="form-control" id="validationCustom01"
                                                                placeholder="Pengguna" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Lokasi</label>
                                                        <select class="form-select" name="lokasi" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Head Office">Head Office</option>
                                                            <option value="Body Paint">Body Paint</option>
                                                            <option value="Payakumbuh">Payakumbuh</option>
                                                            <option value="Pasaman Barat">Pasaman Barat</option>
                                                            <option value="Dharmasraya">Dharmasraya</option>
                                                            <option value="Imam Bonjol">Imam Bonjol</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Type</label>
                                                            <input type="text" name="type" class="form-control" id="validationCustom01"
                                                                placeholder="Type" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Status</label>
                                                            <select class="form-select" name="status" aria-label="Default select example">
                                                                <option selected="">Open this select menu</option>
                                                                <option value="Milik Sendiri">Milik Sendiri</option>
                                                                <option value="Rental">Rental</option>
                                                            </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">No Equipment</label>
                                                            <input type="text" name="no_equipment" class="form-control" id="validationCustom01"
                                                                placeholder="No Equipment" value="" required>
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
                @foreach ($fc as $item)
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fotocopy Edit</h1>
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
                                                        <label for="validationCustom01" class="form-label">Pengguna</label>
                                                            <input type="text" name="pengguna" id="pengguna" class="form-control" id="validationCustom01"
                                                                placeholder="Pengguna"  required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Lokasi</label>
                                                        <select class="form-select" name="lokasi" id="lokasi"  value="" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Head Office">Head Office</option>
                                                            <option value="Body Paint">Body Paint</option>
                                                            <option value="Payakumbuh">Payakumbuh</option>
                                                            <option value="Pasaman Barat">Pasaman Barat</option>
                                                            <option value="Dharmasraya">Dharmasraya</option>
                                                            <option value="Imam Bonjol">Imam Bonjol</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Type</label>
                                                            <input type="text" name="type" class="form-control" id="validationCustom01"
                                                                placeholder="Type" id="type"  value="{{ $item->type }}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Status</label>
                                                            <select class="form-select" name="status" value="{{ $item->status }}" aria-label="Default select example">
                                                                <option selected="">Open this select menu</option>
                                                                <option value="Milik Sendiri" {{ $item->status === 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                                                <option value="Rental" {{ $item->status === 'Rental' ? 'selected' : '' }} >Rental</option>
                                                            </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">No Equipment</label>
                                                            <input type="text" name="no_equipment" id="no_equipment" class="form-control" id="validationCustom01"
                                                                placeholder="No Equipment" value="" required>
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
            var url = "{{ route('fc.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Isi data ke dalam form modal
                    $('#formEdit').attr('action', "{{ route('fc.update', ':id') }}".replace(':id', id));
                    $('#formEdit').find('#pengguna').val(response.data.pengguna);
                    $('#formEdit').find('#lokasi').val(response.data.lokasi);
                    $('#formEdit').find('#type').val(response.data.type);
                    $('#formEdit').find('#status').val(response.data.status);
                    $('#formEdit').find('#no_equipment').val(response.data.no_equipment);

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


