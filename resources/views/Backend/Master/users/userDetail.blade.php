@extends('admin.admin_master')

@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-2">Users Details</h3>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Form</a></li>
                        <li class="breadcrumb-item active">User Details
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="col d-flex mb-0">
                        <img class="me-2 rounded-circle avatar-lg" src="{{ asset('assets/images/users/avatar-2.jpeg') }}"
                            alt="Generic placeholder image">
                        <div class="flex-1">
                            <h3 class="font-size-20 my-1">{{ $user->name }}</h3>
                            <small class="font-size-18 my-1">Jabatan : {{ $user->jabatan }}</small><br>
                            <small class="font-size-17 my-1">Lokasi : {{ $user['lokasi']['nama'] }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div class="">
                            <div class="mail-list">
                                <a href="#"><i class="fas fa-suitcase me-2"></i>Total Inventory GA<span
                                        class="ms-1 float-end">( {{ $countGA }} )</span></a>
                                <a href="#"><i class="ri-mac-line font-size-15 me-2"></i>Total Inventory IT<span
                                        class="ms-1 float-end">( {{ $countIT }} )</span></a>
                                <a href="{{ route('invetaris.add') }}"><i class="ri-add-circle-line me-2"></i>Add Inventory
                                    IT</a>
                                <a href="{{ route('index.all') }}"><i class="ri-add-circle-line me-2"></i>Add Inventory
                                    GA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Inventory IT List</h4>
                            <table id="datatable-IT" class="table dt-responsive nowrap w-100"
                                style=" border-collapse:collapse;border-spacing:0; width:100%;">
                                <thead>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th>Jenis</th>
                                        <th>Merk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->merk }}</td>
                                            <td>
                                                <a href="{{ route('invetaris.details', $item->id) }}"
                                                    class="btn btn-info btn-sm" title="Details"> <i
                                                        class="ri-eye-line"></i></a>
                                                <a href="{{ route('inventaris.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit Data"> <i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Inventory IT List</h4>
                            <table id="datatable-GA" class="table dt-responsive nowrap w-100"
                                style=" border-collapse:collapse;border-spacing:0; width:100%;">
                                <thead>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th>Jenis - Merk</th>
                                        <th>Laporan</th>
                                        <th>Kendala</th>
                                        <th>Pengerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->jenis }} - {{ $item->merk ?? '' }}</td>
                                            <td>{{ $item->laporan ?? 'NO' }}</td>
                                            <td>{{ $item->kendala ?? 'N/A' }}</td>
                                            <td>{{ $item->pengerjaan ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Col-9 -->

@section('js')
    <!-- Js Table scroll -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable-IT').DataTable(); // Inisialisasi DataTable untuk tabel ISP
            $('#datatable-GA').DataTable(); // Inisialisasi DataTable untuk tabel Wifi
            $('#datatable-History').DataTable(); // Inisialisasi DataTable untuk tabel History
        });
    </script>
    <!-- JS Edit -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                var id = $(this).data('id');
                var url = "{{ route('invetaris.details', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        // Isi data ke dalam form modal
                        $('#formEdit').attr('action', "{{ route('printer.update', ':id') }}"
                            .replace(':id', id));
                        $('#formEdit').find('#user_id').val(response.data.user_id);
                        $('#formEdit').find('#jenis').val(response.data.jenis);
                        $('#formEdit').find('#hostname').val(response.data.hostname);
                        $('#formEdit').find('#os').val(response.data.os);
                        $('#formEdit').find('#os').val(response.data.os);
                        $('#formEdit').find('#merk').val(response.data.merk);
                        $('#formEdit').find('#Office').val(response.data.Office);
                        $('#formEdit').find('#Processor').val(response.data.Processor);
                        $('#formEdit').find('#akunOffice').val(response.data.akunOffice);
                        $('#formEdit').find('#ram').val(response.data.ram);
                        $('#formEdit').find('#ssd').val(response.data.ssd);
                        $('#formEdit').find('#grafik').val(response.data.grafik);
                        $('#formEdit').find('#legalos').val(response.data.legalos);
                        $('#formEdit').find('#hardisk').val(response.data.hardisk);
                        $('#formEdit').find('#amp').val(response.data.amp);
                        $('#formEdit').find('#umbrella').val(response.data.umbrella);
                        $('#formEdit').find('#ipaddress').val(response.data.ipaddress);
                        $('#formEdit').find('#anydeskid').val(response.data.anydeskid);
                        $('#formEdit').find('#tanggal').val(response.data.tanggal);

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
