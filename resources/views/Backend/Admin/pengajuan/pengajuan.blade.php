@extends('admin.admin_master')
<link rel="stylesheet" href="https://cdn.datatables.net/tabledit/1.2.3/css/dataTables.tableEdit.min.css">
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Data SPK & DO </h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Admin Details
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

                <a href="{{ route('pengajuan.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Data</a> <br>

                <h4>Data SPK & DO</h4>
                <a href="/excel" class="btn btn-secondary my-3" target="_blank">Excel</a>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">NO SPK</th>
                            <th>Leasing</th>
                            <th>Tgl Pengajuan</th>
                            <th>Tgl Hasil</th>
                            <th>Hasil</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item['spk']['no_spk'] }}</td>
                                <td>{{ $item['leasing']['nama'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_pengajuan)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_hasil)) }}</td>
                                <td>{{ $item->hasil }}</td>
                                <td>

                                </td>
                        @endforeach
                    </tbody>
                </table>

                {{-- <!-- Modal Add -->
                <div class="modal fade" id="modalAstragraphia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Add</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                    <form method="POST" action="" enctype="multipart/from-data" id="myForm">
                                        @csrf

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">No SPK</label>
                                            <div class="form-group col-sm-10">
                                                <select class="form-control select2" name="spk_id">
                                                    @foreach ($data as $data)
                                                        <option value="{{ $data->spk->id }}">{{ $data->spk->no_spk }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <label for="date" class="col-sm-4 col-form-label">Nama SPV</label>
                                                <select class="form-select" name="nama_spv" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="DENI USMAN EFENDI">DENI USMAN EFENDI</option>

                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-4 mb-2">
                                                    <label for="text" class="col-sm-4 col-form-label">Nama Sales</label>
                                                    <input type="text" name="nama_sales" class="form-control" id="validationCustom01"
                                                        placeholder="Nama Sales" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-5 mb-2">
                                                <label for="text" class="col-sm-4 col-form-label">Nama Customer</label>
                                                <input type="text" name="nama_customer" class="form-control" id="validationCustom01"
                                                    placeholder="Nama Customer" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                            <div class="col-5 mb-2">
                                                <label for="date" class="col-sm-4 col-form-label">Jenis</label>
                                                    <select name="jenis" id="jenis_id" class="form-select" aria-label="Default select example" onchange="showFields(this)">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="Pribadi">Pribadi</option>
                                                    <option value="Perusahaan">Perusahaan</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
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
                </div> --}}

                {{-- <!-- Modal Edit -->
                @foreach ($spk as $item)
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fotocopy Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEdit" method="POST" action="" enctype="multipart/from-data" id="myForm">
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
                                                        <label for="validationCustom01" class="form-label">Nama SPV</label>
                                                        <select class="form-select" name="nama_spv" id="nama_spv"  value="" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="DENI USMAN EFENDI">DENI USMAN EFENDI</option>
                                                            <option value="FAULY BUDIMAN">FAULY BUDIMAN</option>
                                                            <option value="HARINI RAHMI">HARINI RAHMI</option>
                                                            <option value="RIO SATRIO PRASOJO">RIO SATRIO PRASOJO</option>
                                                            <option value="RAMON DM">RAMON DM</option>
                                                            <option value="FERRY MYENDRA PUTRA">FERRY MIYENDRA PUTRA</option>
                                                            <option value="YUSUF">YUSUF</option>
                                                            <option value="JAYENG KARMIANTO">JAYENG KARMIANTO</option>
                                                            <option value="MUHAMMAD RIZKY ALAMSYAH HUTARI">MUHAMMAD RIZKY ALAMSYAH HUTARI</option>
                                                            <option value="HENDRA WIDJAJA">HENDRA WIDJAJA</option>
                                                            <option value="LILI RAHMAWATI">LILI RAHMAWATI</option>
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
                @endforeach --}}

            </div>
        </div>
    </div>
</div>
</body>

@endsection


