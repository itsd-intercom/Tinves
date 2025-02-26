@extends('admin.admin_master')

@section('admin')

<!-- Header -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inventory Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Inventaris</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Start Page  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('invetaris.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf
                    <div class="row">

                        <div class="col-3 mb-2">
                            <label class="col-sm-2 col-form-label">User</label>
                            <div class="form-group col-sm-10">
                                <select class="form-control select2" name="user_id" autofocus>
                                <option selected="">Open this select menu</option>
                                    @foreach ($user as $inv)
                                        <option value="{{ $inv->id }}">{{ $inv->name }} - {{ $inv->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                            <div class="form-group col-sm-10">
                                <select name="jenis" id="jenis_id" class="form-control select2" aria-label="Default select example" onchange="showFields(this)">
                                    <option selected="">Open this select menu</option>
                                        <option value="PC">PC</option>
                                        <option value="LAPTOP">LAPTOP</option>
                                        <option value="PRINTER">PRINTER</option>
                                        <option value="UPS">UPS</option>
                                        <option value="MONITOR">MONITOR</option>
                                        <option value="KEYBOARD">KEYBOARD</option>
                                        <option value="MOUSE">MOUSE</option>
                                        <option value="TELEPHONE">TELEPHONE</option>
                                        <option value="SPEAKER">SPEAKER</option>
                                        <option value="HEADSEAT">HEADSEAT</option>
                                        <option value="WEBCAM">WEBCAM</option>
                                        <option value="HARDISK">HARDISK</option>
                                        <option value="POINTER">POINTER</option>
                                        <option value="MICROPHONE">MICROPHONE</option>
                                        <option value="GIMBAL">GIMBAL</option>
                                        <option value="CAMERA">CAMERA</option>
                                        <option value="LENSA">LENSA</option>
                                        <option value="FLASH">FLASH</option>
                                        <option value="LED">LED</option>
                                        <option value="SCANNER">SCANNER</option>
                                        <option value="PENGHANCUR KERTAS">PENGHANCUR KERTAS</option>
                                        <option value="MESIN PENGHITUNG UANG">MESIN PENGHITUNG UANG</option>
                                        <option value="HUB">HUB</option>
                                        <option value="TV">TV</option>
                                        <option value="TWIN CLIENT">TWIN CLIENT</option>
                                        <option value="HP">HP</option>
                                        <option value="SARAMONIC">SARAMONIC</option>
                                </select
                                </div>
                            </div>
                        </div>

                            <!-- Printer Fields -->
                            <div id="printerFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="printerMerk" class="form-label">Merk</label>
                                    <input type="text" name="printerMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="printerTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="printerTanggal" class="form-control">
                                </div>
                            </div>
                            <!-- End Printer Fields -->

                            <div id="pcFields" style="display: none;">
                                <div class="row">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                                                <div class="form-group col-11">
                                                    <input name="hostname" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="col-6">
                                                <label class="col-6 col-form-label">OS </label>
                                                    <div class="form-group col-11">
                                                        <select name="os" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="WIN 11">WIN 11 </option>
                                                            <option value="WIN 10">WIN 10 </option>
                                                            <option value="WIN 7">WIN 7 </option>
                                                            <option value="WINDOWS SERVER">WINDOWS SERVER </option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="pcMerk" class="col-sm-2 col-form-label">Merk</label>
                                                <div class="form-group col-11">
                                                    <input name="pcMerk" class="form-control" type="text" placeholder="" id="text">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Office </label>
                                                    <div class="form-group col-11">
                                                        <select name="Office" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>

                                                            <option value="OHS 2021">OHS 2021 </option>
                                                            <option value="OHS 2019">OHS 2019 </option>
                                                                <option value="WPS">WPS </option>
                                                            </select>
                                                    </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="pcTanggal" class="col-sm-6 col-form-label">Tanggal Pembelian</label>
                                                <div class="form-group col-11">
                                                    <input name="pcTanggal" class="form-control" type="date" placeholder="" id="tanggal">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                                                <div class="form-group col-11">
                                                    <input name="akunOffice" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Processor</label>
                                                <div class="form-group col-11">
                                                    <input name="Processor" class="form-control" type="text" placeholder="" id="text">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">SSD</label>
                                                <div class="form-group col-11">
                                                    <input name="ssd" class="form-control" type="text" placeholder="" id="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">RAM</label>
                                                <div class="form-group col-11">
                                                    <input name="ram" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Legal OS ?</label>
                                                    <div class="form-group col-11">
                                                        <select name="legalos" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>

                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                                                <div class="form-group col-11">
                                                    <input name="grafik" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Internet?</label>
                                                    <div class="form-group col-11">
                                                        <select name="internet" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>

                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">POINTER</label>
                                                <label for="text" class="col-sm-2 col-form-label">POINTER</label>
                                                <div class="form-group col-11">
                                                    <input name="hardisk" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Security Umbrella ?</label>
                                                    <div class="form-group col-11">
                                                        <select name="umbrella" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label class="col-6 col-form-label">Security AMP ?</label>
                                                    <div class="form-group col-11">
                                                        <select name="amp" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Anydesk ID</label>
                                                <div class="form-group col-11">
                                                    <input name="anydeskid" class="form-control" type="number"  placeholder="" id="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Ip Address</label>
                                                <div class="form-group col-11">
                                                    <input name="ipaddress" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                    </div>
                                </div>
                            </div>

                            <div id="laptopFields" style="display: none;">
                                <div class="row">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopHostname" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="col-6">
                                                <label class="col-6 col-form-label">OS </label>
                                                    <div class="form-group col-11">
                                                        <select name="laptopOs" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="WIN 11">WIN 11 </option>
                                                            <option value="WIN 10">WIN 10 </option>
                                                            <option value="WIN 7">WIN 7 </option>
                                                            <option value="WINDOWS SERVER">WINDOWS SERVER </option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="pcMerk" class="col-sm-2 col-form-label">Merk</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopMerk" class="form-control" type="text" placeholder="" id="text">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Office </label>
                                                    <div class="form-group col-11">
                                                        <select name="laptopOffice" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>

                                                            <option value="OHS 2021">OHS 2021 </option>
                                                            <option value="OHS 2019">OHS 2019 </option>
                                                                <option value="WPS">WPS </option>
                                                            </select>
                                                    </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="pcTanggal" class="col-sm-6 col-form-label">Tanggal Pembelian</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopTanggal" class="form-control" type="date" placeholder="" id="tanggal">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopAkunOffice" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Processor</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopProcessor" class="form-control" type="text" placeholder="" id="text">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">SSD</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopSsd" class="form-control" type="text" placeholder="" id="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">RAM</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopRam" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Legal OS ?</label>
                                                    <div class="form-group col-11">
                                                        <select name="laptopLegalos" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>

                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopGrafik" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Internet?</label>
                                                    <div class="form-group col-11">
                                                        <select name="laptopInternet" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>

                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Hardisk</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopHardisk" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="col-6 col-form-label">Security Umbrella ?</label>
                                                    <div class="form-group col-11">
                                                        <select name="laptoUmbrella" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label class="col-6 col-form-label">Security AMP ?</label>
                                                    <div class="form-group col-11">
                                                        <select name="laptopAmp" class="form-select" aria-label="Default select example">
                                                            <option selected="">Open this select menu</option>
                                                            <option value="Yes">Yes </option>
                                                            <option value="NO">NO </option>
                                                            </select>
                                                    </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Anydesk ID</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopAnydeskid" class="form-control" type="number"  placeholder="" id="text">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <label for="text" class="col-sm-2 col-form-label">Ip Address</label>
                                                <div class="form-group col-11">
                                                    <input name="laptopIpaddress" class="form-control" type="text"  placeholder="" id="text">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                    </div>
                                </div>
                            </div>

                            <div id="upsFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="speakerMerk" class="form-label">Merk</label>
                                    <input type="text" name="upsMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="upsTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="upsTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="monitorFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="monitorMerk" class="form-label">Merk</label>
                                    <input type="text" name="monitorMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="monitorTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="monitorTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="keyboardFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="keyboardMerk" class="form-label">Merk</label>
                                    <input type="text" name="keyboardMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="keyboardTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="keyboardTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="mouseFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="mouseMerk" class="form-label">Merk</label>
                                    <input type="text" name="mouseMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="mouseTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="mouseTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="telephoneFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="telephoneMerk" class="form-label">Merk</label>
                                    <input type="text" name="telephoneMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="telephoneMerk" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="telephoneMerk" class="form-control">
                                </div>
                            </div>

                            <div id="speakerFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="speakerMerk" class="form-label">Merk</label>
                                    <input type="text" name="speakerMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="speakerTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="speakerTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="headsetFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="headsetMerk" class="form-label">Merk</label>
                                    <input type="text" name="headsetMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="headsetTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="headsetTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="pointerFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="pointerMerk" class="form-label">Merk</label>
                                    <input type="text" name="pointerMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="pointerTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="pointerTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="microphoneFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="microphoneMerk" class="form-label">Merk</label>
                                    <input type="text" name="microphoneMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="microphoneTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="microphoneTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="gimbalFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="gimbalMerk" class="form-label">Merk</label>
                                    <input type="text" name="gimbalMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="gimbalTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="gimbalTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="cameraFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="cameraMerk" class="form-label">Merk</label>
                                    <input type="text" name="cameraMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="cameraTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="cameraTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="lensaFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="lensaMerk" class="form-label">Merk</label>
                                    <input type="text" name="lensaMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="lensaTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="lensaTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="flashFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="flashMerk" class="form-label">Merk</label>
                                    <input type="text" name="flashMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="flashTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="flashTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="ledFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="ledMerk" class="form-label">Merk</label>
                                    <input type="text" name="ledMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="ledTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="ledTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="scannerFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="scannerMerk" class="form-label">Merk</label>
                                    <input type="text" name="scannerMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="scannerTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="scannerTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="penghancurkertasFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="penghancurkertasMerk" class="form-label">Merk</label>
                                    <input type="text" name="penghancurkertasMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="penghancurkertasTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="penghancurkertasTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="mesinFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="mesinMerk" class="form-label">Merk</label>
                                    <input type="text" name="mesinMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="mesinTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="mesinTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="hubFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="hubMerk" class="form-label">Merk</label>
                                    <input type="text" name="hubMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="hubTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="hubTanggal" class="form-control">
                                </div>
                            </div>
                            <div id="tvFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="tvMerk" class="form-label">Merk</label>
                                    <input type="text" name="tvMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="tvTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="tvTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="tcFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="tcMerk" class="form-label">Merk</label>
                                    <input type="text" name="tcMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="tcTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="tcTanggal" class="form-control">
                                </div>
                            </div>

                            <div id="hpFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="hpMerk" class="form-label">Merk</label>
                                    <input type="text" name="hpMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="hpTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="hpTanggal" class="form-control">
                                </div>
                            </div>
                            <div id="hardiskFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="hardiskMerk" class="form-label">Merk</label>
                                    <input type="text" name="hardiskMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="hardiskTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="hardiskTanggal" class="form-control">
                                </div>
                            </div>
                            <div id="saramonicFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="saramonicMerk" class="form-label">Merk</label>
                                    <input type="text" name="saramonicMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="saramonicTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="saramonicTanggal" class="form-control">
                                </div>
                            </div>
                            <div id="webcamFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="webcamMerk" class="form-label">Merk</label>
                                    <input type="text" name="webcamMerk" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="webcamTanggal" class="form-label">Tanggal Pembelian</label>
                                    <input type="date" name="webcamTanggal" class="form-control">
                                </div>
                            </div>
                    </div>

                    <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

@section('js')


<script>
    // Objek yang menyimpan data terkait jenis dan elemen-elemen
    var fieldsData = {
        'PRINTER': ['printerFields'],
        'PC': ['pcFields'],
        'UPS': ['upsFields'],
        'LAPTOP': ['laptopFields'],
        'MONITOR': ['monitorFields'],
        'KEYBOARD': ['keyboardFields'],
        'MOUSE': ['mouseFields'], // Tambahkan elemen MOUSE ke sini
        'TELEPHONE': ['telephoneFields'],
        'SPEAKER': ['speakerFields'],
        'HEADSEAT': ['headsetFields'],
        'POINTER': ['pointerFields'],
        'MICROPHONE': ['microphoneFields'],
        'GIMBAL': ['gimbalFields'],
        'CAMERA': ['cameraFields'],
        'LENSA': ['lensaFields'],
        'FLASH': ['flashFields'],
        'LED': ['ledFields'],
        'SCANNER': ['scannerFields'],
        'PENGHANCUR KERTAS': ['penghancurkertasFields'],
        'MESIN PENGHITUNG UANG': ['mesinFields'],
        'HUB': ['hubFields'],
        'TV': ['tvFields'],
        'TWIN CLIENT': ['tcFields'],
        'HP': ['hpFields'],
        'WEBCAM': ['webcamFields'],
        'HARDISK': ['hardiskFields'],
        'SARAMONIC': ['saramonicFields'],
    };

    function showFields(selectElement) {
        var jenis = selectElement.value;

        // Semua elemen disetel menjadi 'none' secara default
        var allFields = ['printerFields', 'pcFields', 'upsFields', 'laptopFields', 'monitorFields', 'keyboardFields', 'mouseFields', 'telephoneFields', 'speakerFields','headsetFields','pointerFields','microphoneFields','gimbalFields','cameraFields','lensaFields','flashFields','ledFields','scannerFields','penghancurkertasFields','mesinFields','hubFields','tvFields','tcFields','hpFields','hardiskFields','webcamFields','saramonicFields'];
        allFields.forEach(function(field) {
            document.getElementById(field).style.display = 'none';
        });

        // Tampilkan elemen-elemen sesuai dengan jenis yang dipilih
        if (fieldsData[jenis]) {
            fieldsData[jenis].forEach(function(field) {
                document.getElementById(field).style.display = 'block';
            });
        }
    }
</script>

{{--  <script>
    function showFields(selectElement) {
        var jenis = selectElement.value;
        var fields = {
            'PRINTER': ['printerFields'],
            'PC': ['pcFields'],
            'UPS': ['upsFields'],
            'LAPTOP': ['laptopFields'],
            'MONITOR': ['monitorFields'],
            'KEYBOARD': ['keyboardFields'],
            'MOUSE': ['mouseFields'],
            'TELEPHONE': ['telephoneFields'],
            'SPEAKER': ['speakerFields'],
            'HEADSET': ['headsetFields'],
            'WEBCAM': ['webcamFields'],
            'HARDISK': ['hardiskFields'],
            'POINTER': ['pointerFields'],
        };

        // Semua elemen dibuat tidak terlihat terlebih dahulu
        for (var key in fields) {
            fields[key].forEach(function(field) {
                document.getElementById(field).style.display = 'none';
            });
        }

        // Tampilkan elemen yang sesuai dengan jenis yang dipilih
        if (fields[jenis]) {
            fields[jenis].forEach(function(field) {
                document.getElementById(field).style.display = 'block';
            });
        }
    }
</script>  --}}

@endsection

@endsection
