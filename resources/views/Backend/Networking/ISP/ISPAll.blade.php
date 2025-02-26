@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">ISP All</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">ISP details
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
                        <h4>ISP All Data</h4>
                    </div>
                    <div class="col">
                        <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right">
                            + Add ISP
                         </a>
                    </div>
                </div>

                {{-- <a href="" class="btn btn-dark btn-rounded waves-effect waves-light tombol-tambah" style="float:right">Add ISP</a> <br></br> --}}
                <!-- Button trigger modal -->




                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama ISP</th>
                            <th>IP</th>
                            <th>Lokasi</th>
                            <th>Internet Number</th>
                            <th>Speed</th>
                            <th>Up / Down</th>
                            <th>No Telfon</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            {{--  @php
                                $no = 1;
                            @endphp  --}}
                            @foreach ($isp as $key => $item)
                            <tr>
                                <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->name_isp }}</td>
                                <td>{{ $item->ip }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->internet_number }}</td>
                                <td>{{ $item->speed }}</td>
                                <td>{{ $item->up_down }}</td>
                                <td>{{ $item->no_telfon }}</td>
                                <td>

                                    <a class="btn btn-info sm btn-edit" data-id="{{ $item->id }} title="Edit Data" > <i class="fas fa-edit"></i></a>
                                     {{-- <a href="{{ route('wifi.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a> --}}
                                     <a href="{{ route('isp.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                     {{--  <a href="{{ route('jenis.details', $item->id) }}" class="btn btn-danger sm" title="Details" > <i class="fa thin fa-info"></i></a>  --}}
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ISP Add</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('isp.store') }}" enctype="multipart/from-data" id="myForm">
                                        @csrf

                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Nama ISP</label>
                                                            <input type="text" name="name_isp" class="form-control" id="validationCustom01"
                                                                placeholder="Nama" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">IP</label>
                                                            <input type="text" name="ip" class="form-control" id="validationCustom01"
                                                                placeholder="IP" value="" required>
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
                                                            <option value="Tapan">Tapan</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Internet Number</label>
                                                            <input type="text" name="internet_number" class="form-control" id="validationCustom01"
                                                                placeholder="Internet Number" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Speed</label>
                                                            <input type="text" name="speed" class="form-control" id="validationCustom01"
                                                                placeholder="Speed" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Upload / Download</label>
                                                            <input type="text" name="up_down" class="form-control" id="validationCustom01"
                                                                placeholder="Upload / Download" value="" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">No Telfon</label>
                                                            <input type="text" name="no_telfon" class="form-control" id="validationCustom01"
                                                                placeholder="No Telfon" value="" required>
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
                @foreach ($isp as $item)
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Astragraphia Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEdit" method="POST" action="{{ route('isp.update', $item->id) }}" enctype="multipart/from-data" id="myForm">
                                        @csrf
                                        @method('PUT')

                                        <!-- Masukkan input form untuk mengedit data -->
                                        <div class="div">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Nama ISP</label>
                                                            <input type="text" name="name_isp" class="form-control" id="name_isp"
                                                                placeholder="Nama" value="{{ $item->name_isp }}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">IP</label>
                                                            <input type="text" name="ip" class="form-control" id="ip"
                                                                placeholder="IP" value="{{ $item->ip }}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Lokasi</label>
                                                        <select class="form-select" name="lokasi" id="lokasi" value="{{ $item->lokasi }}" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Head Office">Head Office</option>
                                                            <option value="Body Paint">Body Paint</option>
                                                            <option value="Payakumbuh">Payakumbuh</option>
                                                            <option value="Pasaman Barat">Pasaman Barat</option>
                                                            <option value="Dharmasraya">Dharmasraya</option>
                                                            <option value="Imam Bonjol">Imam Bonjol</option>
                                                            <option value="Tapan">Tapan</option>
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Internet Number</label>
                                                            <input type="text" name="internet_number" class="form-control" id="internet_number"
                                                                placeholder="Internet Number" value="{{ $item->internet_number }}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Speed</label>
                                                            <input type="text" name="speed" class="form-control" id="speed"
                                                                placeholder="Speed" value="{{ $item->speed }}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">Upload / Download</label>
                                                            <input type="text" name="up_down" class="form-control" id="up_down"
                                                                placeholder="Upload / Download" value="{{ $item->up_down }}" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">No Telfon</label>
                                                            <input type="text" name="no_telfon" class="form-control" id="no_telfon"
                                                                placeholder="No Telfon" value="{{ $item->no_telfon }}" required>
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
            var url = "{{ route('isp.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Isi data ke dalam form modal
                    $('#formEdit').attr('action', "{{ route('isp.update', ':id') }}".replace(':id', id));
                    $('#formEdit').find('#name_isp').val(response.data.name_isp);
                    $('#formEdit').find('#ip').val(response.data.ip);
                    $('#formEdit').find('#lokasi').val(response.data.lokasi);
                    $('#formEdit').find('#internet_number').val(response.data.internet_number);
                    $('#formEdit').find('#speed').val(response.data.speed);
                    $('#formEdit').find('#up_down').val(response.data.up_down);
                    $('#formEdit').find('#no_telfon').val(response.data.no_telfon);

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

{{-- <script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (e) {
            var modal = $(this);

            // Mendapatkan data lokasi dari variabel PHP
            var lokasiData = <?php echo json_encode($history); ?>;

            // Mengosongkan elemen select
            a

            // Menambahkan opsi ke elemen select dari data lokasi
            for (var i = 0; i < lokasiData.length; i++) {
                modal.find('#lokasi_id').append('<option value="' + lokasiData[i].id + '">' + lokasiData[i].Nama + '</option>');
            }
        });
    });
</script> --}}

@endsection
@endsection
