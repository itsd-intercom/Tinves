@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Master Barang </h3>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Form</a></li>
                        <li class="breadcrumb-item active">Master
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
                            <h4>Master Barang</h4>
                        </div>
                        <div class="col">
                            <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#modalBarang" style="float:right">
                                + Add Data
                                </a>
                        </div>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Merk</th>
                                <th>Jenis</th>
                                <th>Ukuran</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $key => $item)
                                <tr>
                                    <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->merk }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->ukuran }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm btn-edit" data-bs-target="#modalEdit" data-id="{{ $item->id }} title="Edit Data" > <i class="fas fa-edit"></i></a>
                                        <a href="{{ route('barang.delete', $item->id) }}" class="btn btn-danger btn-sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Add -->
                    <div class="modal fade" id="modalBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Add</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/from-data" id="myForm">
                                            @csrf

                                            <div class="row mb-1">
                                                <div class="col-6 mb-2">
                                                    <label for="text" class="col-sm-12 col-form-label">Nama Barang</label>
                                                    <div class="form-group col-12">
                                                        <input name="nama" class="form-control" type="text" placeholder="" id="nama">
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <label for="text" class="col-sm-8 col-form-label">Merk</label>
                                                    <div class="form-group col-11">
                                                        <input name="merk" class="form-control" type="text" placeholder="" id="merk">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6 mb-2">
                                                    <label for="text" class="col-sm-8 col-form-label">Jenis</label>
                                                    <div class="form-group col-11">
                                                        <input name="jenis" class="form-control" type="text" placeholder="" id="ukuran">
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <label for="text" class="col-sm-8 col-form-label">ukuran</label>
                                                    <div class="form-group col-11">
                                                        <input name="ukuran" class="form-control" type="text" placeholder="" id="ukuran">
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
                    @foreach ( $barang as $item )
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEdit" method="POST" action="{{ route('barang.update', $item->id) }}" enctype="multipart/from-data" id="myForm">
                                        @csrf
                                        @method('PUT')
                                        <!-- Masukkan input form untuk mengedit data -->

                                        <div class="row mb-1">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-12 col-form-label">Nama Barang</label>
                                                <div class="form-group col-12">
                                                    <input name="nama" class="form-control" type="text" placeholder="" id="nama">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-8 col-form-label">Merk</label>
                                                <div class="form-group col-11">
                                                    <input name="merk" class="form-control" type="text" placeholder="" id="merk">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-6 mb-2">
                                                <label for="date" class="col-sm-4 col-form-label">Jenis</label>
                                                <select class="form-select" name="jenis" id="jenis" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="Kursi">Kursi</option>
                                                    <option value="Meja">Meja</option>
                                                    <option value="Papan Tulis">Papan Tulis</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-8 col-form-label">ukuran</label>
                                                <div class="form-group col-11">
                                                    <input name="ukuran" class="form-control" type="text" placeholder="" id="ukuran">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var url = "{{ route('barang.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Isi data ke dalam form modal
                    $('#formEdit').attr('action', "{{ route('barang.update', ':id') }}".replace(':id', id));
                    $('#formEdit').find('#nama').val(response.data.nama);
                    $('#formEdit').find('#merk').val(response.data.merk);
                    $('#formEdit').find('#ukuran').val(response.data.ukuran);
                    $('#formEdit').find('#jenis').val(response.data.jenis);

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
