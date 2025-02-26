@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inventory Details </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Inventaris</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Start Page  -->

<div class="col-10">
    <div class="card">
        <div class="card-body">
                <div class="row">
                    <h5>User   : {{ $inventaris->user->name }}</h5><br></br>
                    <h6>Divisi : {{ $inventaris->user->Divisi->nama }}</h6><br></br>
                    <h6>Lokasi : {{ $inventaris->user->Lokasi->nama }}</h6>
                    <!-- end row -->
                </div>
        </div>
    </div> <!-- end col -->
</div>

<!--  Page 2  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{--  <form method="post" action="{{ route('invetaris.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf  --}}

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="form-group col-11">
                                <select name="jenis" class="form-select" aria-label="Default select example"disabled>
                                    <option selected="">{{ $inventaris->jenis }}</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                            <div class="form-group col-11">
                                <input name="hostname" class="form-control" value={{ $inventaris->hostname }} type="text"  placeholder="" id="text" disabled>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">OS</label>
                                <div class="form-group col-11">
                                    <select name="os" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">{{ $inventaris->os }}</option>
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Merk</label>
                            <div class="form-group col-11">
                                <input name="merk" class="form-control" type="text" value="{{ $inventaris->merk }}"  id="text"disabled>
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">Office</label>
                                <div class="form-group col-11">
                                    <select name="Office" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">{{ $inventaris->Office }}</option>
                                        </select>
                                </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Processor</label>
                            <div class="form-group col-11">
                                <input name="Processor" class="form-control" type="text" value="{{ $inventaris->Processor }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                            <div class="form-group col-11">
                                <input name="akunOffice" class="form-control" type="text" value="{{ $inventaris->akunOffice }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">RAM</label>
                            <div class="form-group col-11">
                                <input name="ram" class="form-control" type="text" value={{ $inventaris->ram }} placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">SSD</label>
                            <div class="form-group col-11">
                                <input name="ssd" class="form-control" type="text" value={{ $inventaris->ssd }} placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                            <div class="form-group col-11">
                                <input name="grafik" class="form-control" type="text" value={{ $inventaris->grafik }}  placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">Legal OS ?</label>
                                <div class="form-group col-11">
                                    <select name="legalos" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">{{ $inventaris->legalos }}</option>
                                            {{--  <option>{{ $inventaris->amp }}</option>  --}}
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Hardisk</label>
                            <div class="form-group col-11">
                                <input name="hardisk" class="form-control"  type="text" value={{ $inventaris->hardisk }}  placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">Internet ?</label>
                                <div class="form-group col-11">
                                    <select name="internet" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">{{ $inventaris->internet }}</option>
                                            {{--  <option>{{ $inventaris->amp }}</option>  --}}
                                        </select>
                                </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">Security AMP ?</label>
                                <div class="form-group col-11">
                                    <select name="amp" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">{{ $inventaris->amp }}</option>
                                            {{--  <option>{{ $inventaris->amp }}</option>  --}}
                                        </select>
                                </div>
                        </div>
                        <div class="col-6">
                            <label class="col-6 col-form-label">Security Umbrella ?</label>
                                <div class="form-group col-11">
                                    <select name="umbrella" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">{{ $inventaris->umbrella }}</option>
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Ip Address</label>
                            <div class="form-group col-11">
                                <input name="ipaddress" value={{ $inventaris->ipaddress }} class="form-control" type="text"  placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Anydesk ID</label>
                            <div class="form-group col-11">
                                <input name="anydeskid"  class="form-control" type="text" value="{{ $inventaris->anydeskid }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">

                        </div>
                    </div>


                    <div class="row mb-3">

                    </div>
                    <!-- end row -->

                {{--  <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update Inventory">  --}}
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row mt-3">
    <div class="col-12">
        <class class="card container-fluid mb-3">
            <h4 class="mt-3">History Request</h4><br></br>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="20px">Laporan</th>
                    <th width="20px">Kendala</th>
                    <th width="20px">Pengerjaan</th>
                    <th width="20px">Tanggal</th>
                    <th width="10px">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($history as $key => $item)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $item->laporan }}</td>
                        <td>{{ $item->kendala }}</td>
                        <td>{{ $item->pengerjaan }}</td>
                        <td>{{ $item->created_at->format('d-M-Y h:i A')}}</td>
                        <td>
                            @if ($item->status == "0")
                                <button type="button" class="btn btn-warning waves-effect waves-light">
                                    <i class="ri-error-warning-line align-middle me-2"></i> Pending
                                </button>
                            @elseif ($item->status == "1")
                                <button type="button" class="btn btn-success waves-effect waves-light">
                                    <i class="ri-check-line align-middle me-2"></i> Success
                                </button>
                            @endif

                        </td>
                        {{--  <td>
                             <a href="{{ route('inventaris.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                             <a href="{{ route('invetaris.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                             <a href="{{ route('invetaris.details', $item->id) }}" class="btn btn-danger sm" title="Details" > <i class="fa thin fa-info"></i></a>
                        </td>  --}}
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div> <!-- end col -->
</div>

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
<!-- Responsive Table js -->
<script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/table-responsive.init.js"></script>

@endsection
