@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Master Jenis</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Jenis
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

                <!-- Header Table  -->
                <div class="row mb-1">
                    <div class="col">
                        <h4>Jenis All Data</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('jenis.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Jenis</a> <br>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis</th>
                            <th width="10%" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $key => $item)
                            <tr>
                                <td>{{ '' . str_pad($loop->iteration, 1, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm btn-edit" data-bs-target="#modalEdit" data-id="{{ $item->id }} title="Edit Data" > <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('barang.delete', $item->id) }}" class="btn btn-danger btn-sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
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
