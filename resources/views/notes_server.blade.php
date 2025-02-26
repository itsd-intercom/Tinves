@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Notes</h3><br></br>
            <hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Notes
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

                <a href="{{ route('request.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                    style="float:right">Add Request</a> <br></br>

                <h4>Notes All Data</h4>
                <table id="dttables" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript">
    $(function (){
        $('#dttables').DataTable({
            processing:true,
            serverSide:true,
            ajax:'json',
            columns:[
                {data:'id',name:'id'},
                {data:'deskripsi',name:'deskripsi',visible:false},
            ]
        });
    });
</script>
@endsection

@endsection
