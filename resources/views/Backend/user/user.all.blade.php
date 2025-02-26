@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="mb-sm-0">Data Users</h2>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Users
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

                <a href="{{ route('users.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Inventory</a> <br></br>

                <h4>Inventory All Data</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hostname</th>
                            <th>Ram</th>
                            <th>Hardisk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($inventory as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $item->hostname }}</td>
                                <td>{{ $item->hardisk }}</td>
                                <td>{{ $item->ram }}</td>
                                <td>
                                     <a href="{{ route('users.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('users.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
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
