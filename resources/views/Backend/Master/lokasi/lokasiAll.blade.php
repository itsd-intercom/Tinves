@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Master Lokasi</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Lokasi
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
                        <h4>Lokasi All Data</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('lokasi.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Lokasi</a>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Lokasi</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            {{--  @php
                                $no = 1;
                            @endphp  --}}
                            @foreach ($lokasi as $key => $item)
                            <tr>
                                <td>{{ 'L-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                     <a href="{{ route('lokasi.edit', $item->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('lokasi.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                     {{--  <a href="{{ route('jenis.details', $item->id) }}" class="btn btn-danger sm" title="Details" > <i class="fa thin fa-info"></i></a>  --}}
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
