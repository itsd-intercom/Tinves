@extends('admin.admin_master')

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

                    <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#modalAstragraphia" style="float:right">
                    + Add Data
                    </a><br>

                    <h4>Data Pribadi</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="8%">Tgl SPK</th>
                                <th>NO SPK</th>
                                <th>SPV</th>
                                <th>Sales</th>
                                <th>Jenis</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spk as $key => $item)
                                <tr>
                                    <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_spk)->format('d-m-Y') }}</td>
                                    <td>{{ $item->no_spk }}</td>
                                    <td>{{ $item->nama_spv }}</td>
                                    <td>{{ $item->nama_sales }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>{{ $item->nama_customer }}</td>
                                    <td>{{ $item->status }}</td>

                                    </td>
                                    <td>
                                        <a class="btn btn-info sm btn-edit" data-bs-target="#modalEdit" data-id="{{ $item->id }} title="Edit Data" > <i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Add -->
                    <div class="modal fade" id="modalAstragraphia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Add</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/from-data" id="myForm">
                                            @csrf

                                            <div class="row">
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-8 col-form-label">Tanggal SPK</label>
                                                    <div class="form-group col-11">
                                                        <input name="tgl_spk" class="form-control" type="date" placeholder="" id="tgl_spk">
                                                    </div>
                                                </div>
                                                <div class="col-3 mb-2">
                                                    <label for="text" class="col-sm-8 col-form-label">NO SPK</label>
                                                    <div class="form-group col-11">
                                                        <input name="no_spk" class="form-control" type="text" placeholder="" id="no_spk">
                                                    </div>
                                                </div>
                                                <div class="col-3 mb-2">
                                                    <label for="date" class="col-sm-4 col-form-label">Nama SPV</label>
                                                    <select class="form-select" name="nama_spv" aria-label="Default select example">
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

                                            <!-- perusahaan Fields -->
                                            <div id="perusahaanFields" style="display: none;">
                                                <div class="row">
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Akta Pendirian</label>
                                                        <div class="form-group col-11">
                                                            <input name="akta_pendirian" class="form-control" type="date"  id="akta_pendirian">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">SK Kemenkumham</label>
                                                        <div class="form-group col-11">
                                                            <input name="sk_kemenkumham" class="form-control" type="date" placeholder="" id="sk_kemenkumham">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Akta Perubahan</label>
                                                        <div class="form-group col-11">
                                                            <input name="akta_perubahan" class="form-control" type="date" placeholder="" id="akta_perubahan">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">NPWP</label>
                                                        <div class="form-group col-11">
                                                            <input name="npwp_perusahaan" class="form-control" type="date" placeholder="" id="npwp_perusahaan">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">NIB</label>
                                                        <div class="form-group col-11">
                                                            <input name="nib" class="form-control" type="date" placeholder="" id="nib">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Rek Koran</label>
                                                        <div class="form-group col-11">
                                                            <input name="rek_koran_perusahaan" class="form-control" type="date" placeholder="" id="rek_koran_perusahaan">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KTP Direksi</label>
                                                        <div class="form-group col-11">
                                                            <input name="ktp_direksi" class="form-control" type="date" placeholder="" id="ktp_direksi">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KTP Komisaris</label>
                                                        <div class="form-group col-11">
                                                            <input name="ktp_komisaris" class="form-control" type="date" placeholder="" id="ktp_komisaris">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KTP P.Saham</label>
                                                        <div class="form-group col-11">
                                                            <input name="ktp_p_saham" class="form-control" type="date" placeholder="" id="ktp_p_saham">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-8 mb-3">
                                                        <label for="text" class="col-sm-10 col-form-label">Keterangan</label>
                                                        <div class="form-group col-11">
                                                            <input name="keterangan_perusahaan" class="form-control" type="text" placeholder="" id="keterangan">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Pribadi Fields -->

                                            <!-- pribadi Fields -->
                                            <div id="pribadiFields" style="display: none;">
                                                <div class="row">
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KTP Pemohon</label>
                                                        <div class="form-group col-11">
                                                            <input name="ktp_pemohon" class="form-control" type="date" placeholder="" id="ktp_pemohon">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KTP Pasangan</label>
                                                        <div class="form-group col-11">
                                                            <input name="ktp_pasangan" class="form-control" type="date" placeholder="" id="ktp_pasangan">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KTP Penjamin</label>
                                                        <div class="form-group col-11">
                                                            <input name="ktp_penjamin" class="form-control" type="date" placeholder="" id="ktp_penjamin">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">KK</label>
                                                        <div class="form-group col-11">
                                                            <input name="kk" class="form-control" type="date" placeholder="" id="kk">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">NPWP</label>
                                                        <div class="form-group col-11">
                                                            <input name="npwp" class="form-control" type="date" placeholder="" id="npwp">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">PBB</label>
                                                        <div class="form-group col-11">
                                                            <input name="pbb" class="form-control" type="date" placeholder="" id="pbb">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Rek Listrik</label>
                                                        <div class="form-group col-11">
                                                            <input name="rek_listrik" class="form-control" type="date" placeholder="" id="rek_listrik">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Rek Koran</label>
                                                        <div class="form-group col-11">
                                                            <input name="rek_koran" class="form-control" type="date" placeholder="" id="rek_koran">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Rek Gaji</label>
                                                        <div class="form-group col-11">
                                                            <input name="rek_gaji" class="form-control" type="date" placeholder="" id="rek_gaji">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">Bukti Usaha</label>
                                                        <div class="form-group col-11">
                                                            <input name="bukti_usaha" class="form-control" type="date" placeholder="" id="bukti_usaha">
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mb-2">
                                                        <label for="date" class="col-sm-10 col-form-label">SKU</label>
                                                        <div class="form-group col-11">
                                                            <input name="sku" class="form-control" type="date" placeholder="" id="sku">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8 mb-3">
                                                        <label for="text" class="col-sm-10 col-form-label">Keterangan</label>
                                                        <div class="form-group col-11">
                                                            <input name="ket_pribadi" class="form-control" type="text" placeholder="" id="ket_perusahaan">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Perusahaan Fields -->

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
                    @foreach ( $spk as $item )
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEdit" method="POST" action="{{ route('pribadi.update', $item->id) }}" enctype="multipart/from-data" id="myForm">
                                        @csrf
                                        @method('PUT')
                                        <!-- Masukkan input form untuk mengedit data -->
                                        <div class="row">
                                            <div class="col-2 mb-2">
                                                <label for="date" class="col-sm-8 col-form-label">Tanggal SPK</label>
                                                <div class="form-group col-11">
                                                    <input name="tgl_spk" class="form-control" type="date" placeholder="" id="tgl_spk">
                                                </div>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <label for="text" class="col-sm-8 col-form-label">NO SPK</label>
                                                <div class="form-group col-11">
                                                    <input name="no_spk" class="form-control" type="text" placeholder="" id="no_spk">
                                                </div>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <label for="date" class="col-sm-4 col-form-label">Nama SPV</label>
                                                <select class="form-select" name="nama_spv" id="nama_spv" aria-label="Default select example">
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
                                            <div class="col-4 mb-2">
                                                    <label for="text" class="col-sm-4 col-form-label">Nama Sales</label>
                                                    <input type="text" name="nama_sales" class="form-control" id="nama_sales"
                                                        placeholder="Nama Sales" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-2">

                                            <div class="col-5 mb-2">
                                                <label for="text" class="col-sm-4 col-form-label">Nama Customer</label>
                                                <input type="text" name="nama_customer" class="form-control" id="nama_customer"
                                                    placeholder="Nama Customer" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-5 mb-2">
                                                <label for="date" class="col-sm-4 col-form-label">Jenis</label>
                                                    <select name="jenis" id="jenis"  class="form-select" aria-label="Default select example" >
                                                    <option selected="">Open this select menu</option>
                                                    <option value="Pribadi">Pribadi</option>
                                                    <option value="Perusahaan">Perusahaan</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>

                                        <!-- perusahaan Fields -->
                                        {{-- <div id="perusahaanFields" style="display: none;">
                                            <div class="row">
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Akta Pendirian</label>
                                                    <div class="form-group col-11">
                                                        <input name="akta_pendirian" class="form-control" type="date"  id="akta_pendirian">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">SK Kemenkumham</label>
                                                    <div class="form-group col-11">
                                                        <input name="sk_kemenkumham" class="form-control" type="date" placeholder="" id="sk_kemenkumham">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Akta Perubahan</label>
                                                    <div class="form-group col-11">
                                                        <input name="akta_perubahan" class="form-control" type="date" placeholder="" id="akta_perubahan">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">NPWP</label>
                                                    <div class="form-group col-11">
                                                        <input name="npwp_perusahaan" class="form-control" type="date" placeholder="" id="npwp_perusahaan">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">NIB</label>
                                                    <div class="form-group col-11">
                                                        <input name="nib" class="form-control" type="date" placeholder="" id="nib">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Rek Koran</label>
                                                    <div class="form-group col-11">
                                                        <input name="rek_koran_perusahaan" class="form-control" type="date" placeholder="" id="rek_koran_perusahaan">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KTP Direksi</label>
                                                    <div class="form-group col-11">
                                                        <input name="ktp_direksi" class="form-control" type="date" placeholder="" id="ktp_direksi">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KTP Komisaris</label>
                                                    <div class="form-group col-11">
                                                        <input name="ktp_komisaris" class="form-control" type="date" placeholder="" id="ktp_komisaris">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KTP P.Saham</label>
                                                    <div class="form-group col-11">
                                                        <input name="ktp_p_saham" class="form-control" type="date" placeholder="" id="ktp_p_saham">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-8 mb-3">
                                                    <label for="text" class="col-sm-10 col-form-label">Keterangan</label>
                                                    <div class="form-group col-11">
                                                        <input name="keterangan_perusahaan" class="form-control" type="text" placeholder="" id="keterangan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- End Pribadi Fields -->

                                        <!-- pribadi Fields -->
                                        <div id="pribadiFields" style="display: block;">
                                            <div class="row">
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KTP Pemohon</label>
                                                    <div class="form-group col-11">
                                                        <input name="ktp_pemohon" class="form-control" type="date" placeholder="" id="ktp_pemohon">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KTP Pasangan</label>
                                                    <div class="form-group col-11">
                                                        <input name="ktp_pasangan" class="form-control" type="date" placeholder="" id="ktp_pasangan">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KTP Penjamin</label>
                                                    <div class="form-group col-11">
                                                        <input name="ktp_penjamin" class="form-control" type="date" placeholder="" id="ktp_penjamin">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">KK</label>
                                                    <div class="form-group col-11">
                                                        <input name="kk" class="form-control" type="date" placeholder="" id="kk">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">NPWP</label>
                                                    <div class="form-group col-11">
                                                        <input name="npwp" class="form-control" type="date" placeholder="" id="npwp">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">PBB</label>
                                                    <div class="form-group col-11">
                                                        <input name="pbb" class="form-control" type="date" placeholder="" id="pbb">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Rek Listrik</label>
                                                    <div class="form-group col-11">
                                                        <input name="rek_listrik" class="form-control" type="date" placeholder="" id="rek_listrik">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Rek Koran</label>
                                                    <div class="form-group col-11">
                                                        <input name="rek_koran" class="form-control" type="date" placeholder="" id="rek_koran">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Rek Gaji</label>
                                                    <div class="form-group col-11">
                                                        <input name="rek_gaji" class="form-control" type="date" placeholder="" id="rek_gaji">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">Bukti Usaha</label>
                                                    <div class="form-group col-11">
                                                        <input name="bukti_usaha" class="form-control" type="date" placeholder="" id="bukti_usaha">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-10 col-form-label">SKU</label>
                                                    <div class="form-group col-11">
                                                        <input name="sku" class="form-control" type="date" placeholder="" id="sku">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8 mb-3">
                                                    <label for="text" class="col-sm-10 col-form-label">Keterangan</label>
                                                    <div class="form-group col-11">
                                                        <input name="ket_pribadi" class="form-control" type="text" placeholder="" id="keterangan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Perusahaan Fields -->

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

{{-- <script type="text/javascript">
    $(function (){
        $('#admin-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin_json') }}',
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
                {
                    data: 'tgl_spk',
                    name: 'tgl_spk',
                    visible: true,
                    searchable: true,
                    render: function (data) {
                        // Ubah format data dari database menjadi format "d-m-Y"
                        var date = new Date(data);
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();

                        // Pastikan day dan month selalu memiliki 2 digit
                        if (day < 10) {
                            day = '0' + day;
                        }
                        if (month < 10) {
                            month = '0' + month;
                        }

                        return day + '-' + month + '-' + year;
                    }
                },
                {data: 'no_spk', name: 'no_spk'},
                {data: 'nama_spv', name: 'nama_spv'},
                {data: 'nama_sales', name: 'nama_sales'},
                {data: 'jenis', name: 'jenis'},
                {data: 'nama_customer', name: 'nama_customer'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
            ],

            createdRow: function(row, data, dataIndex) {
                var id = data.id;
                // mengubah id menjadi format "I-000X"
                var formattedId = "I-" + ("" + id).slice(-3);
                // mengubah isi sel pada kolom ID
                $('td:eq(0)', row).html(formattedId);

                // menambahkan tombol Edit dan Delete
                var actionBtns = '<a href="/InventarisEdit-' + data.id + '" class="btn btn-success btn-sm mr-2" style="margin-right: 4px;"> <i class="fas fa-edit"></i></a>' +
                                 '<a href="/InventarisDelete-' + data.id + '" class="btn btn-danger btn-sm" style="margin-right: 4px;"> <i class="fas fa-trash-alt"></i></a>' +
                                 '<a href="/InventarisDetails-' + data.id + '" class="btn btn-info btn-sm" style="margin-right: 4px;"> <i class="fa thin fa-info"></i></a>';
                $('td:eq(8)', row).html(actionBtns);
            }
        });


    });

    // $(document).on('click', '.copy-icon', function() {
    //         var textToCopy = $(this).data('clipboard-text');
    //         var tempInput = $('<input>');
    //         $('body').append(tempInput);
    //         tempInput.val(textToCopy).select();
    //         document.execCommand('copy');
    //         tempInput.remove();

    //         // Tampilkan pesan atau efek visual lain untuk memberi tahu pengguna bahwa teks telah disalin
    //         alert('Teks telah disalin: ' + textToCopy);
    //     });
</script> --}}
<!-- jenis Select -->
<script>
    function showFields(selectElement) {
        var jenis = selectElement.value;
        var pribadiFields = document.getElementById('pribadiFields');
        var perusahaanFields = document.getElementById('perusahaanFields');

        if (jenis === 'Pribadi') {
            pribadiFields.style.display = 'block';
            perusahaanFields.style.display = 'none';
        } else if (jenis === 'Perusahaan') {
            pribadiFields.style.display = 'none';
            perusahaanFields.style.display = 'block';
        } else {
            pribadiFields.style.display = 'none';
            perusahaanFields.style.display = 'none';
        }
    }

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var url = "{{ route('admin.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Isi data ke dalam form modal
                    $('#formEdit').attr('action', "{{ route('pribadi.update', ':id') }}".replace(':id', id));
                    $('#formEdit').find('#tgl_spk').val(response.data.tgl_spk);
                    $('#formEdit').find('#no_spk').val(response.data.no_spk);
                    $('#formEdit').find('#nama_spv').val(response.data.nama_spv);
                    $('#formEdit').find('#nama_sales').val(response.data.nama_sales);
                    $('#formEdit').find('#jenis').val(response.data.jenis);
                    $('#formEdit').find('#nama_customer').val(response.data.nama_customer);

                    $('#formEdit').find('#ktp_pemohon').val(response.data.ktp_pemohon);
                    $('#formEdit').find('#ktp_pasangan').val(response.data.ktp_pasangan);
                    $('#formEdit').find('#ktp_penjamin').val(response.data.ktp_penjamin);
                    $('#formEdit').find('#kk').val(response.data.kk);
                    $('#formEdit').find('#npwp').val(response.data.npwp);
                    $('#formEdit').find('#pbb').val(response.data.pbb);
                    $('#formEdit').find('#rek_listrik').val(response.data.rek_listrik);
                    $('#formEdit').find('#rek_koran').val(response.data.rek_koran);
                    $('#formEdit').find('#rek_gaji').val(response.data.rek_gaji);
                    $('#formEdit').find('#bukti_usaha').val(response.data.bukti_usaha);
                    $('#formEdit').find('#sku').val(response.data.sku);
                    $('#formEdit').find('#bukti_tambahan').val(response.data.bukti_tambahan);
                    $('#formEdit').find('#keterangan').val(response.data.keterangan);

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
