@extends('admin.admin_master')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-2">Inventory GA</h3>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Form</a></li>
                        <li class="breadcrumb-item active">Inventory
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
                        <div class="row mb-1">
                            <div class="col">
                                <h4>Inventory All Data</h4>
                            </div>
                            <div class="col">
                                <a type="button" class="btn btn-dark btn-rounded waves-effect waves-light btn-add" data-bs-toggle="modal" data-bs-target="#modalBarang" style="float:right"> Add Data </a>
                            </div>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th>User</th>
                                    <th>Divisi</th>
                                    <th>Lokasi</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Merk</th>
                                    <th width="10%">Jenis</th>
                                    <th width="10%">Tgl Pembelian</th>
                                    {{-- <th>QR CODE</th> --}}
                                    <th>Status</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item['user']['name'] }}</td>
                                        <td>{{ $item['user']['divisi']['nama'] }}</td>
                                        <td>{{ $item['user']['lokasi']['nama'] }}</td>
                                        <td>{{ $item['MasterInventory']['nama'] }}</td>
                                        <td>
                                            @if ($item->image)
                                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $item->id }}">
                                                    <i class="ri-eye-fill"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $item->id }}">
                                                    <i class="ri-eye-off-line"></i>
                                                </button>
                                            @endif
                                        </td>

                                        <td>{{ $item['MasterInventory']['merk'] }}</td>
                                        <td>{{ $item['MasterInventory']['jenis'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tgl_pembelian)->format('d-m-Y') }}</td>
                                        {{-- <td>{!! DNS2D::getBarcodeHTML('https://tinves.toyotaintercom.com/InventarisDetails-' . $item->id,'QRCODE',1,1) !!} --}}
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            {{-- <a class="btn btn-info btn-sm btn-edit" data-bs-target="#modalEdit" data-id="{{ $item->id }} title="Edit Data"> <i class="fas fa-edit"></i></a> --}}
                                            <a href="{{ route('index.delete', $item->id) }}" class="btn btn-danger btn-sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal View -->
                        @foreach ($barang as $item )
                        <div class="modal fade" id="viewImageModal{{ $item->id }}" tabindex="-1" aria-labelledby="viewImageModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewImageModalLabel{{ $item->id }}">View Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($item->image)
                                            <div class="container">
                                                <img src="{{ asset($item->image) }}" class="img-fluid text-center" alt="Image">
                                            </div>
                                        @else
                                            <h4 class="text-center">No Image</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- Modal Add -->
                        <div class="modal fade" id="modalBarang" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Add</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('index.store') }}" enctype="multipart/form-data" id="myForm">
                                            @csrf

                                            <div class="row mb-1">
                                                <div class="col-12 mb-2">
                                                    <label for="" class="col-sm-10 col-form-label">User</label>
                                                    <div class="form-group col-sm-12">
                                                        <select class="form-control select2" name="user_id"
                                                            id="select2Dropdown">
                                                            <option selected="">--Select--</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }} -
                                                                    {{ $user->jabatan }} - {{ $user->lokasi->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 mb-2">
                                                    <label for="" class="col-sm-6 col-form-label">Nama Barang</label>
                                                    <div class="form-group col-sm-12" id="namaBarang">
                                                        <select class="form-select select2" name="master_id" id="select2">
                                                            <option selected="">--Select--</option>
                                                            @foreach ($master as $user)
                                                                <option value="{{ $user->id }}" data-merk="{{ $user->merk }}" data-jenis="{{ $user->jenis }}" data-ukuran="{{ $user->ukuran }}">{{ $user->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-1">
                                                    <div class="button">
                                                        <label for="" class="col-sm-8 col-form-label mb-2"> </label>
                                                        <button type="button" class="btn btn-sm btn-secondary btn-rounded waves-effect waves-light "  id="enableFormButton"> <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle "></i> </button>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="" class="col-sm-6 col-form-label">Choose Image</label>
                                                    <input class="form-control" type="file" name="image" id="formFile">
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col mb-2">
                                                    <label for="merk" class="col-sm-10 col-form-label">Merk</label>
                                                    <div class="form-group col-sm-12">
                                                        <input type="text" name="merk" id="merk" placeholder="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <label for="jenis" class="col-sm-10 col-form-label">Jenis</label>
                                                    <div class="form-group col-sm-12">
                                                        <input type="text" name="jenis" id="jenis" placeholder="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <label for="ukuran" class="col-sm-10 col-form-label">Ukuran</label>
                                                    <div class="form-group col-sm-12">
                                                        <input type="text" name="ukuran" id="ukuran" placeholder="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-2 mb-2">
                                                    <label for="tanggal" class="col-form-label">Tanggal Pembelian</label>
                                                    <div class="form-group">
                                                        <input type="date" name="tgl_pembelian" class="form-control" id="tgl_pembelian">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <label for="tahun" class="col-form-label">Usia Pemakaian</label>
                                                    <div class="form-group">
                                                        <input type="number" name="usia_pemakaian" id="usia_pemakaian" placeholder="Tahun" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mb-2">
                                                    <label for="date" class="col-form-label">Status</label>
                                                    <select class="form-select" name="status"
                                                        aria-label="Default select example">
                                                        <option selected ="">--Select--</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col-md mb-2">
                                                    <label for=""
                                                        class="col-sm-10 col-form-label">Keterangan</label>
                                                    <div class="form-group col-sm-12">
                                                        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="submit" class="btn btn-info waves waves-effect waves-light "
                                                value="Submit">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit -->
                        @foreach ($barang as $value)
                        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditLabel">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Isi formulir edit di sini -->
                                        <form id="editForm" method="POST" action="{{ route('index.update',$item->id) }}" >
                                            @csrf
                                            @method('PUT')
                                            <!-- Tambahkan elemen formulir yang diperlukan untuk mengedit data -->
                                            <div class="row mb-1">
                                                <div class="col-12 mb-2">
                                                    <label for="" class="col-sm-10 col-form-label">User</label>
                                                    <div class="form-group col-sm-12">
                                                        <select class="form-control select2" name="user_id" id="select2Dropdown">
                                                            <option selected="">{{ $value['user']['name'] }} - {{ $value['user']['jabatan'] }} </option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }} -
                                                                    {{ $user->jabatan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label for="" class="col-sm-6 col-form-label">Nama Barang</label>
                                                    <div class="form-group col-sm-12" id="namaBarang">
                                                        <select class="form-select select2" name="master_id" id="select2">
                                                            <option selected="">{{ $value['MasterInventory']['nama']}}</option>
                                                            @foreach ($master as $user)
                                                                <option value="{{ $user->id }}" data-merk="{{ $user->merk }}" data-jenis="{{ $user->jenis }}" data-ukuran="{{ $user->ukuran }}">{{ $user->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-12 mb-2">
                                                    <label for="tanggal" class="col-form-label">Tanggal Pembelian</label>
                                                    <div class="form-group">
                                                        <input type="date" name="tgl_pembelian" value="{{ $value->tgl_pembelian }}" class="form-control" id="tgl_pembelian">
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-2">
                                                    <label for="tahun" class="col-form-label">Usia Pemakaian</label>
                                                    <div class="form-group">
                                                        <input type="number" name="usia_pemakaian" value="{{ $value->usia_pemakaian }}" id="usia_pemakaian" placeholder="Tahun" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <label for="date" class="col-sm-4 col-form-label">Status</label>
                                                    <select class="form-select" name="status"
                                                        aria-label="Default select example">
                                                        <option selected disabled="">{{$value->status}}</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                                <div class="col mb-2">
                                                    <label for=""
                                                        class="col-sm-10 col-form-label">Keterangan</label>
                                                    <div class="form-group col-sm-12">
                                                        <input type="text" name="keterangan" value="{{ $value->keterangan }}" placeholder="Keterangan" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tambahkan elemen formulir lainnya sesuai kebutuhan -->
                                            <div class="mt-3">
                                                <input type="submit" class="btn btn-info waves waves-effect waves-light "
                                                value="Submit">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </form>
                                    </div>
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

    <!-- Js Edit -->
    <script>
        $(document).ready(function () {
            // Tangkap klik pada tombol edit
            $('.btn-edit').click(function () {
                // Ambil data dari atribut tombol "Edit"
                var id = $(this).data('id');
                var merk = $(this).data('merk');
                var jenis = $(this).data('jenis');
                var ukuran = $(this).data('ukuran');

                console.log('ID:', id);
                console.log('Merk:', merk);
                console.log('Jenis:', jenis);
                console.log('Ukuran:', ukuran);

                // Isi nilai formulir di dalam modal dengan data dari atribut tombol "Edit"
                $('#editForm #merk').val(merk);
                $('#editForm #jenis').val(jenis);
                $('#editForm #ukuran').val(ukuran);

                // Ambil ID dari data yang akan diedit
                var id = $(this).data('id');

                // Reset formulir dan ambil data dari baris yang di-klik
                $('#editForm')[0].reset();
                var rowData = $(this).closest('tr').children('td').map(function () {
                    return $(this).text();
                }).get();

                // Isi formulir dengan data yang diambil
                $('#editField').val(rowData[1]); // Ubah angka sesuai dengan indeks kolom yang ingin Anda edit
                // Isi elemen formulir lainnya sesuai kebutuhan

                // Set action URL untuk formulir edit
                var actionUrl = "{{ url('index/update') }}" + '/' + id;
                $('#editForm').attr('action', actionUrl);

                // Tampilkan modal edit
                $('#modalEdit').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#select2Dropdown').select2({
                tags: true,
                dropdownParent: $('#modalBarang')
            });

            $('#select2').select2({
                dropdownParent: $('#modalBarang')
            });

            // // Tangani peristiwa klik pada tombol "Tambah"
            $('#enableFormButton').on('click', function() {
                // Aktifkan formulir dan hapus atribut "disabled" dari input
                $('#merk, #jenis, #ukuran').prop('disabled', false);

                // Kosongkan nilai merk, jenis, dan ukuran
                $('#merk').val('');
                $('#jenis').val('');
                $('#ukuran').val('');

                // Ubah elemen "Nama Barang" menjadi input teks
                $('#namaBarang').html(
                    '<input type="text" name="nama_barang" id="nama_barang" class="form-control">');
            });

            // // Tangani peristiwa perubahan pada dropdown "Nama Barang"
            $('#select2').on('change', function() {
                // Dapatkan data-merk, data-jenis, dan data-ukuran yang sesuai
                var selectedOption = $(this).find(':selected');
                var merk = selectedOption.data('merk');
                var jenis = selectedOption.data('jenis');
                var ukuran = selectedOption.data('ukuran');

                // Isi nilai input "Merk," "Jenis," dan "Ukuran"
                $('#merk').val(merk);
                $('#jenis').val(jenis);
                $('#ukuran').val(ukuran);

                // Nonaktifkan formulir (disabled)
                $('#merk, #jenis, #ukuran').prop('disabled', true);
            });
        });

    </script>

    <script>
        $('#select2edit').select2({
                dropdownParent: $('#modalEdit')
            });
        $('#user_id').select2({
                dropdownParent: $('#modalEdit')
            });
        // Tangani peristiwa perubahan pada dropdown "Nama Barang"
        $('#select2edit').on('change', function() {
                // Dapatkan data-merk, data-jenis, dan data-ukuran yang sesuai
                var selectedOption = $(this).find(':selected');
                var merk = selectedOption.data('merk');
                var jenis = selectedOption.data('jenis');
                var ukuran = selectedOption.data('ukuran');

                // Isi nilai input "Merk," "Jenis," dan "Ukuran"
                $('#merk').val(merk);
                $('#jenis').val(jenis);
                $('#ukuran').val(ukuran);

                // Nonaktifkan formulir (disabled)
                $('#merk, #jenis, #ukuran').prop('disabled', true);
            });
    </script>
@endsection

@endsection
