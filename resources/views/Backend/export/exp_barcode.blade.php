@extends('admin.admin_master')
@section('admin')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="mb-sm-0">List PC</h2>

            <div class="page-title-right" >
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data PC
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
                        <h4>Inventory All Data</h4>
                    </div>
                    <div class="col">
                        <a href="{{ route('invetaris.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Data</a>
                    </div>
                </div>

                <div class="btn-export mb-1">
                    <a href="/excels" class="btn btn-secondary my-3" target="_blank">Excel</a>
                    {{-- <a href="{{ route('barcode.excel') }}" class="btn btn-secondary"  type="button">Excel</a> --}}
                </div>

                <!-- Table -->
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Jenis - Merk</th>
                            <th>User</th>
                            <th width="10%">Jabatan</th>
                            <th width="10%">Divisi</th>
                            <th width="10%">Lokasi</th>
                            <th width="10%">ID Anydesk</th>
                            <th width="10%">Barcode</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($inventory as $key => $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->jenis }} - {{ $item->merk }}</td>
                                <td>{{ $item['user']['name']}}</td>
                                <td>{{ $item['user']['jabatan'] }}</td>
                                <td>{{ $item['user']['divisi']['nama'] }}</td>
                                <td>{{ $item['user']['lokasi']['nama'] }}</td>
                                <td>{{ $item->anydeskid }}
                                    <a class="btn btn-secondary copy-icon btn-sm" data-clipboard-text="{{ $item->anydeskid }}"><i class="far fa-copy"></i></a>
                                </td>
                                <td>{!! DNS2D::getBarcodeHTML('https://tinves.toyotaintercom.com/InventarisDetails-' . $item->id,'QRCODE',1,1) !!}
                                <td>
                                    <a href="{{ route('inventaris.edit' , $item->id )}}" class="btn btn-primary btn-sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('invetaris.details', $item->id) }}" class="btn btn-info btn-sm" title="Details" > <i class="fa thin fa-info"></i></a>
                                    <a href="{{ route('invetaris.delete', $item->id) }}" class="btn btn-danger btn-sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('js')

<!-- Js btn Copy -->
<script>
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
</script>

@endsection


@endsection
