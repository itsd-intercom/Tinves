@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Request Handling</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms History</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--  Detail Inventory -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-2 mb-2">
                        <label for="validationCustom01" class="form-label">Hostname</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->hostname }}" class="form-control"disabled>
                    </div>

                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Jenis</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->jenis }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Merk</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->merk }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Procsor</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->Processor }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Ram</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->ram }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Grafik</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->grafik }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Hardisk</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->hardisk }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">OS</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->os }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Office</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->Office }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">SSD</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->ssd }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">Internet</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->internet }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">IP </label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->ipaddress }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">User </label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->User->name }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-3 ">AMP </label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->amp }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-4 ">Umbrella </label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->umbrella }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-5 ">Akun Office </label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->akunOffice }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-5 ">Anydesk Id </label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->anydeskid }}" class="form-control"disabled>
                    </div>
                    <div class="col-2 mb-4">
                        <label class="col-sm-5 ">Legal OS ?</label>
                            <input type="text" name="inventory_id" value="{{ $history->inventory->legalos }}" class="form-control"disabled>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                {{--  <h4 class="mb-4">History add Page</h4>  --}}
                <form method="POST" action="{{ route('history.update', $history->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">User - Jenis </label>
                                <select class="form-control select2" name="inventory_id"disabled>
                                    @foreach ($inventory as $inv)
                                    <option value="{{ $inv->id }}" @if($inv->id == $history->inventory_id) selected @endif>{{ $inv->user->name }} - {{ $inv->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{--  Laporan  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Laporan</label>
                                <input type="text" name="laporan" value="{{ $history->laporan }}" class="form-control" id="validationCustom01"
                                    placeholder="Laporan"  required disabled>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Kendala  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Kendala</label>
                                <input type="text" name="kendala" class="form-control" id="validationCustom01"
                                    placeholder="Kendala"  required >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Pengerjaan  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Pengerjaan</label>
                                <input type="text" name="pengerjaan" class="form-control" id="validationCustom01"
                                    placeholder="Pengerjaan"  required >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Vendor  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Vendor</label>
                                <input type="text" name="vendor" class="form-control" id="validationCustom01"
                                    placeholder="vendor"  required >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function() {
        $("#is_internal").change(function() {
            if ($("#is_internal option:selected").val() == "0") {
                $("#external-laporan").show();
            } else {
                $("#external-laporan").hide();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                hostname: {
                    required : true,
                },
                ram: {
                    required : true,
                },
                hardisk: {
                    required : true,
                },
            },
            messages :{
                hostname: {
                    required : 'Please Enter Your Hostname',
                },
                ram: {
                    required : 'Please Enter Your Ram',
                },
                hardisk: {
                    required : 'Please Enter Your hardisk',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>

@endsection
