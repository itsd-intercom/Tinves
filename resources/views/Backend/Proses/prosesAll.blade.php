@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Handle Request Support</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Handle
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('proses.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Lokasi</a> <br></br>

                <h4>Proses All Data</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>User</th>
                            <th>Laporan</th>
                            <th>Kendala</th>
                            <th>Pengerjaan</th>
                            <th>Status</th>
                            <th>Tanggal</th>

                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($allData as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $item['history']['laporan']}}</td>
                                <td>{{ $item->laporan}}</td>
                                <td>{{ $item->kendala}}</td>
                                <td>{{ $item->pengerjaan}}</td>
                                <td>{{ $item->status}}</td>
                                <td>
                                     <a href="{{ route('lokasi.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('proses.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                 </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
