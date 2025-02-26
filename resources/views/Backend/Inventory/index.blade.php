@extends('admin.admin_master')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Inventory</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item active">Inventory
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Datatable Inventory-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!-- Header Table  -->
                <div class="row mb-2">
                    <div class="col">
                        <h4>Inventory All Data</h4>
                    </div>

                    <div class="col-md-1 col-12">
                        <a href="{{ route('inventory.export') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right" >
                            <i class="fas fa-file-export"></i></a>
                    </div>

                    <!-- Filter Inventory -->
                    <div class=" col-md-2 col-12 btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" onclick="filterInventory('PC')">
                        <label class="btn btn-outline-secondary" for="btnradio1">PC</label>

                        <input type="radio" class="btn-check " name="btnradio" id="btnradio2" autocomplete="off" onclick="filterInventory('Laptop')">
                        <label class="btn btn-outline-secondary" for="btnradio2"  >Laptop</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" onclick="filterInventory('Peripheral')">
                        <label class="btn btn-outline-secondary" for="btnradio3">Peripheral</label>
                    </div>

                    <!-- Add Data -->
                    <div class="col-md-1 col-12">
                        <a href="{{ route('invetaris.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Data</a>
                    </div>

                </div>
                <!-- Table  -->
                <table id="inventory-table" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Jenis</th>
                            <th>User</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Lokasi</th>
                            <th width="3%">ID Anydesk</th>
                            <th width="4%" class="text-center">Action</th>
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
        $('#inventory-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('index_json') }}',
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
                {data: 'jenis', name: 'jenis'},
                {data: 'user.name', name: 'user.name'},
                {data: 'user.jabatan', name: 'user.jabatan'},
                {data: 'divisi.nama', name: 'divisi.nama'},
                {data: 'lokasi.nama', name: 'lokasi.nama'},
                {data: 'anydeskid', name: 'anydeskid', render: function(data, type, row) {
                    return '<div class="d-flex align-items-left">' +
                        '<div class="me-2">' +
                        '<i class="far fa-copy copy-icon" data-clipboard-text="' + data + '"></i>' +
                        '</div>' +
                        '<div>' + data + '</div>' +
                        '</div>';
                }},
                {data: null, orderable: false, searchable: false}
            ],

            createdRow: function(row, data, dataIndex) {
                var id = data.id;
                // mengubah id menjadi format "I-000X"
                var formattedId = (id).slice();

                // mengubah isi sel pada kolom ID
                $('td:eq(0)', row).html(formattedId);

                // menambahkan tombol Edit dan Delete
                var actionBtns = '<a href="/InventarisEdit-' + data.id + '" class="btn btn-success btn-sm mr-2" style="margin-right: 4px;"> <i class="fas fa-edit"></i></a>' +
                                 '<a href="/InventarisDelete-' + data.id + '" class="btn btn-danger btn-sm" style="margin-right: 4px;"> <i class="fas fa-trash-alt"></i></a>' +
                                 '<a href="/InventarisDetails-' + data.id + '" class="btn btn-info btn-sm" style="margin-right: 4px;"> <i class="fa thin fa-info"></i></a>';
                $('td:eq(7)', row).html(actionBtns);
            }
        });
    });

    $(document).on('click', '.copy-icon', function() {
            var textToCopy = $(this).data('clipboard-text');
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(textToCopy).select();
            document.execCommand('copy');
            tempInput.remove();

            // Tampilkan pesan atau efek visual lain untuk memberi tahu pengguna bahwa teks telah disalin
            alert('Teks telah disalin: ' + textToCopy);
        });

        // Store the last selected radio button
        let lastSelected;

        function filterInventory(jenis) {
            if (lastSelected === jenis) {
                // If the same radio button is clicked again, reload all data
                $('#inventory-table').DataTable().ajax.url('{{ route('index_json') }}').load();
                lastSelected = undefined;
            } else {
                // Otherwise, update the last selected radio button and apply filtering
                $('#inventory-table').DataTable().ajax.url('{{ route('index_json') }}?jenis=' + jenis).load();
                lastSelected = jenis;
            }
        }
</script>
@endsection

@endsection
