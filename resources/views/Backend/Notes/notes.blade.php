@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Notes</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item active">Notes
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Datatable Notes-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Header Table  -->
                <div class="row mb-1">
                    <div class="col">
                        <h4>Notes List Data</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('notesAdd') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Notes</a>
                    </div>
                </div>

                <table id="notes-table" class="table .table-responsive table-bordered dt-responsive" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Action</th>
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
        $('#notes-table').DataTable({
            processing:true,
            serverSide:true,
            ajax:'{{ route('notes-json') }}',
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex', orderable: false, searchable: false},
                {data:'deskripsi',name:'deskripsi'},
                {data:'created_at',name:'created_at'},
                {data:'action',name:'action'},
            ],

            createdRow: function(row, data, dataIndex) {
                var id = data.id;
                // mengubah id menjadi format "R-000X"
                var formattedId = "N-" + ("" + id).slice(-3);

                // mengubah isi sel pada kolom ID
                $('td:eq(0)', row).html(formattedId);

                // menambahkan tombol Edit dan Delete
                var actionBtns = '<a href="/notesEdit-' + data.id + '" class="btn btn-success btn-sm mr-2 edit-btn ' + (data.is_finished ? ' disabled-btn' : '') + '" style="margin-right: 4px;"><i class="fas fa-edit"></i></a>';


                if (!data.is_finished) {
                    actionBtns += '<a href="/finish-' + data.id + '" class="btn btn-primary btn-sm finish-btn" onclick="return confirm(\'Apakah sudah yakin notes sudah selesai?\')"> <i class="fas fa-check-circle"></i> </a>';
                } else {
                    actionBtns += '<a href="#" class="btn btn-primary btn-sm finish-btn disabled-btn">Selesai</a>';
                }

                $('td:eq(3)', row).html(actionBtns);

                // Tambahkan event click pada tombol Finish
                $('td:eq(3)', row).on('click', '.finish-btn', function(e) {
                    e.preventDefault();
                    // Hilangkan tombol Edit dan Delete
                    $(this).siblings('.edit-btn, .delete-btn').remove();
                    // Tambahkan class CSS agar tombol Finish tidak bisa diklik
                    $(this).addClass('disabled-btn').css({'pointer-events': 'none', 'opacity': 0.5}).css({ 'display':'block' , 'margin': '0 auto'});
                });
            }
        });
    });
</script>
@endsection

@endsection
