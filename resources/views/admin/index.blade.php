@extends('admin.admin_master')
<!-- FullCalendar -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />


<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        /* Ubah lebar switch */
        height: 20px;
        /* Ubah tinggi switch */
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 10px;
        /* Ubah radius border slider */
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        /* Ubah tinggi handle slider */
        width: 18px;
        /* Ubah lebar handle slider */
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .2s;
        transition: .4s;
        border-radius: 50%;
        /* Ubah radius border handle slider */
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(27px);
        transform: translateX(27px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 16px;
        /* Mengatur border-radius lebih kecil untuk toggle */
    }

    @media (max-width: 640px) {

        .col-md {
            width: 14%;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 50%;
            padding: 5px;
            font-size: 14px;
        }

        .switch {
            width: 30px;
            /* Ukuran switch pada media query */
            height: 15px;
            /* Ukuran switch pada media query */
        }

        .slider {
            border-radius: 7px;
            /* Ukuran radius border slider pada media query */
        }

        .slider:before {
            height: 13px;
            /* Ukuran handle slider pada media query */
            width: 13px;
            /* Ukuran handle slider pada media query */
        }

        .filter-form {
            flex-direction: row;
            /* Menjaga elemen dalam satu baris */
            justify-content: space-between;
            /* Meletakkan elemen dalam ruang yang lebih baik */
            align-items: center;
            /* Pusatkan elemen secara vertikal */
        }

        .filter-form .form-group {
            margin-bottom: 0;
            /* Hapus margin bawah pada elemen input bulan */
            margin-right: 10px;
            /* Tambahkan ruang antara elemen input bulan */
        }

        .btn-filter {
            margin-top: 5px;
        }
    }
</style>

@section('admin')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="mb-sm-0">Dashboard </h2>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tinves</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Header Dashboard -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Inventory</p>
                            <h4 class="mb-2">{{ $totalinven }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class=" ri-mac-line font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Users</p>
                            <h4 class="mb-2">{{ $totaluser }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-user-3-line font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Request</p>
                            <h4 class="mb-2">{{ $totalreq }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <i class="ri-file-text-line font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">All Request Proses</p>
                            <h4 class="mb-2">{{ $totalreqpen }}</h4>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-success rounded-3">
                                <i class="ri-file-history-fill font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div> <!-- end row -->

    <!-- Reqeust Proses Data -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Function Header -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                    <h4 class="mb-0 me-5">Proses Request Support</h4>

                    <form class="d-flex align-items-end float-end justify-content-start" method="GET"
                        action="{{ route('dashboard') }}">

                        <div class="col-md me-2 bottom-3">
                            <label for="startMonth" class="form-label">Start Month</label>
                            <input type="month" name="startMonth" id="startMonth" class="form-control">
                        </div>
                        <div class="col-md me-2">
                            <label for="endMonth" class="form-label">End Month</label>
                            <input type="month" name="endMonth" id="endMonth" class="form-control">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-primary btn-filter">Filter</button>
                        </div>

                    </form>


                </div>

                <!-- Toggle Switch -->
                <div class="d-flex justify-between">
                    <h5 class="me-2">Proses</h5>
                    <label class="switch">
                        <input type="checkbox" id="statusToggle">
                        <span class="slider round"></span>
                    </label>
                </div>
                <!-- End Function Header -->
                <table id="datatable-req" class="table table-responsive"
                    style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>User</th>
                            <th>Jenis</th>
                            <th>Laporan</th>
                            <th width="10%">Tgl Req</th>
                            <th>Pengerjaan</th>
                            <th width="10%">Tgl Selesai</th>
                            <th width="10%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item['inventory']['user']['name'] }}</td>
                                <td>{{ $item['inventory']['jenis'] }}</td>
                                <td>{{ $item->laporan }}</td>
                                <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                <td>{{ $item->pengerjaan }}</td>
                                <td>
                                    @if ($item->updated_at)
                                        {{ $item->updated_at->format('d-M-Y') }}
                                    @endif
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if ($item->status == '0')
                                        <a href="{{ route('history.proses', $item->id) }}" class="btn btn-danger sm"
                                            title="Proses"> <i class="fas fa-spinner"></i></a>
                                        <a href="{{ route('history.approvedsh', $item->id) }}" class="btn btn-info sm"
                                            title="Approved" id="ApprovedBtn"> <i class="fas fa-check-circle"></i></a>
                                    @elseif ($item->status == '1')
                                        <span class="badge rounded-pill bg-success"
                                            style="font-size: 1em; padding: 0.5em;">Success</span>
                                    @elseif ($item->status == '1')
                                        <button type="button" class="badge rounded-pill bg-success">
                                            <i class="ri-check-line align-middle me-2"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <!-- Table Details Information & Notes -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>Details Information</h4>
                    <table id="scroll"  class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th width= "2%">No</th>
                                <th>Nama</th>
                                <th width= "5%">Details</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Networking</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" style="margin-left " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa thin fa-info"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Astragraphia</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" style="margin-right:;" data-bs-toggle="modal" data-bs-target="#astragraphiaModal">
                                        <i class="fa thin fa-info"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Vendor</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" style="margin-right:;" data-bs-toggle="modal" data-bs-target="#vendorModal">
                                        <i class="fa thin fa-info"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>Notes</h4>
                    <table id="tableScroll" class="table dt-responsive nowrap w-100" style=" border-collapse:collapse;border-spacing:0; width:100%;">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($notes as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->created_at->format('d-M-Y h:i')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Table Details Information & Notes -->
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Details Information</h4>
                    <div class="table-responsive">
                        <table id="scroll" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>Nama</th>
                                    <th width="5%">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Networking</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" style="margin-left "
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa thin fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Astragraphia</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" style="margin-right:;"
                                            data-bs-toggle="modal" data-bs-target="#astragraphiaModal">
                                            <i class="fa thin fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Vendor</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" style="margin-right:;"
                                            data-bs-toggle="modal" data-bs-target="#vendorModal">
                                            <i class="fa thin fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Notes</h4>
                    <div class="table-responsive">
                        <table id="tableScroll" class="table table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->created_at->format('d-M-Y h:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- FullCalendar -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 style="border-bottom: 1px solid #000 padding-bottom:2px margin-bottom:10px">Monitoring Peripheral
                    </h4><br>
                    <select id="color">
                        <option value="danger">Danger</option>
                        <option value="alert">Alert</option>
                        <option value="success">Success</option>
                    </select><br></br>
                    <div id="calendar" style="width: 100%; height: 85%;"></div>

                    {{-- <p>Keterangan : </p>
                    <p>1. Hijau = OK </p>
                    <p>2. Orange = Pending Perbaikan </p>
                    <p>3. Merah = Pergantian </p> --}}

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Networking-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Networking Details</h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Call Center Indihome Bisnis - 0751 1500250</h5><br>
                    <div class="row">

                        <!-- ISP Details -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- ISP Details -->
                                    <h4 class="card-title">ISP Details</h4>
                                    <table id="datatable-isp" class="table table-striped table-hover"
                                        style="border-collapse:collapse;border-spacing:0; width:100%;">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama ISP</th>
                                                <th>Lokasi</th>
                                                <th>IP</th>
                                                <th>Internet Number</th>
                                                <th>Speed</th>
                                                <th>Up / Down</th>
                                                <th>No Telfon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($isp as $key => $item)
                                                <tr>
                                                    <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                                    <td>{{ $item->name_isp }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->ip }}</td>
                                                    <td>{{ $item->internet_number }}</td>
                                                    <td>{{ $item->speed }}</td>
                                                    <td>{{ $item->up_down }}</td>
                                                    <td>{{ $item->no_telfon }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                        <!-- Wifi Details -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Wifi Details -->
                                    <h4 class="card-title">Wifi Details</h4>
                                    <table id="datatable-wifi" class="table table-striped table-hover "
                                        style="border-collapse:collapse;border-spacing:0; width:100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Wan</th>
                                                <th>Lan</th>
                                                <th>Wifi Password</th>
                                                <th width="2%">Login</th>
                                                <th>Password Login</th>
                                                <th>Merk</th>
                                                <th width="2%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  @php
                                                    $no = 1;
                                                @endphp  --}}
                                            @foreach ($wifi as $key => $item)
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                    </div>
                    <!-- end row-->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Astragraphia-->
    <div class="modal fade" id="astragraphiaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Astragraphia Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Call Center - 0751 1500345 </h5>
                    <h5>Password Setting - Username : 1111 Password : x-admin </h5> <br />
                    <div class="row">
                        <!-- Astragraphia Details -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Astragraphia Details -->
                                    <h4 class="card-title">Astragraphia Details</h4>
                                    <table id="datatable" class="table table-striped table-hover"
                                        style="border-collapse:collapse;border-spacing:0; width:100%;">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Pengguna</th>
                                                <th>Lokasi</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>No Equipment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  @php
                                                        $no = 1;
                                                    @endphp  --}}
                                            @foreach ($fc as $key => $item)
                                                <tr>
                                                    <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                                    <td>{{ $item->pengguna }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->no_equipment }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Vendor-->
    <div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Vendor Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Vendor Details -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Vendor Details -->
                                    <h4 class="card-title">Vendor Details</h4>
                                    <table id="datatable-vendor" class="table table-striped table-hover"
                                        style="border-collapse:collapse;border-spacing:0; width:100%;">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Bagian</th>
                                                <th>Toko</th>
                                                <th>PIC</th>
                                                <th>No Telfon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  @php
                                                        $no = 1;
                                                    @endphp  --}}
                                            @foreach ($vendor as $key => $item)
                                                <tr>
                                                    <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                                    <td>{{ $item->bagian }}</td>
                                                    <td>{{ $item->toko }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->no_telfon }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Wifi Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('wifi.store') }}" enctype="multipart/from-data"
                        id="myForm">
                        @csrf

                        <div class="div">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            id="validationCustom01" placeholder="name" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Wan</label>
                                        <input type="text" name="wan" class="form-control"
                                            id="validationCustom01" placeholder="wan" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Lan</label>
                                        <input type="text" name="lan" class="form-control"
                                            id="validationCustom01" placeholder="lan" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Wifi Password</label>
                                        <input type="text" name="wifi_password" class="form-control"
                                            id="validationCustom01" placeholder="wifi_password" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Login</label>
                                        <input type="text" name="login" class="form-control"
                                            id="validationCustom01" placeholder="login" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Login Pass</label>
                                        <input type="text" name="pass_login" class="form-control"
                                            id="validationCustom01" placeholder="password login" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="validationCustom01" class="form-label">Merk</label>
                                        <input type="text" name="merk" class="form-control"
                                            id="validationCustom01" placeholder="merk" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="form-group col-sm-12">
                                            <select class="form-select" name="status"
                                                aria-label="Default select example">
                                                <option selected="">Open this select menu</option>
                                                <option value="aktif">Aktif</option>
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

    </div>

@section('js')
    <!-- FullCalendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Datatables -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>



    <!-- Js Fullcalendar -->
    <script type="text/javascript">
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/fullcalender",
                displayEventTime: false,
                editable: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event : ');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                        var color = $("#color").val();
                        var backgroundColor = '';

                        if (color === 'success') {
                            backgroundColor = 'green';
                        } else if (color === 'alert') {
                            backgroundColor = 'orange';
                        } else if (color === 'danger') {
                            backgroundColor = 'red';
                        } else {
                            backgroundColor = 'blue';
                        }

                        $.ajax({
                            url: SITEURL + "/fullcalenderAjax",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                color: color,
                                backgroundColor: backgroundColor,
                                type: 'add'
                            },
                            type: "POST",
                            success: function(data) {
                                displayMessage("Event Created Successfully");

                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    color: color,
                                    allDay: allDay,
                                    backgroundColor: backgroundColor
                                }, true);

                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Event Updated Successfully");
                        }
                    });
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            }
                        });
                    }
                }

            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>

    <!-- Js Table scroll -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableScroll').DataTable({
                "scrollY": "20vh",
                "scrollCollapse": true,
                "lengthChange": false,
                "paging": false,
                "searching": false,

            });
            $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function() {
            $('#scroll').DataTable({
                "scrollY": "30vh",
                "scrollCollapse": true,
                "lengthChange": false,
                "searching": false,
                "paging": false,
            });
            $('.dataTables_length').addClass('bs-select');
        });

        $(document).ready(function() {
            $('#datatable-isp').DataTable(); // Inisialisasi DataTable untuk tabel ISP
            $('#datatable-wifi').DataTable(); // Inisialisasi DataTable untuk tabel Wifi
            $('#datatable-vendor').DataTable(); // Inisialisasi DataTable untuk tabel Vendor
        });

        $('#datatable-req').DataTable({
            "scrollY": "30vh",
            "scrollCollapse": true,
            "lengthChange": false,
            paging: false,
            pageLength: 5, // Ganti angka sesuai keinginan
            lengthMenu: [5, 10, 15, 20, 25],
            columnDefs: [{
                    targets: [7], // Indeks kolom "Status"
                    visible: false // Sembunyikan kolom "Status"
                },
                // Tambahkan definisi kolom lain di sini
                // Misalnya, untuk mengatur lebar kolom, mengubah render, dll.
            ]

        });

        $(document).ready(function() {
            const statusToggle = document.getElementById('statusToggle');
            const table = $('#datatable-req').DataTable();

            statusToggle.addEventListener('change', function() {
                if (this.checked) {
                    table.column(7).search('0').draw(); // Menampilkan hanya status 0
                } else {
                    table.column(7).search('').draw(); // Menghapus filter pada kolom status
                }
            });
        });
    </script>
@endsection

@endsection
