@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Pengajuan Add</h4><br><br>
                </div>
                    <form method="post" action="{{ route('pengajuan.store') }}" enctype="multipart/from-data" id="myForm">
                        @csrf

                        <div class="row mb-3">
                            <div class="col mb-2">
                                <label for="spk_id" class="col-sm-4 col-form-label">No SPK</label>
                                <div class="form-group col-sm-12">
                                    <select class="form-control select2" name="spk_id" id="spk_id">
                                        <option value="">Pilih No SPK</option>
                                        @foreach ($spk as $spkOption)
                                            <option value="{{ $spkOption->id }}">{{ $spkOption->no_spk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col mb-2">
                                <label for="spk_id" class="col-sm-4 col-form-label">Leasing</label>
                                <div class="form-group col-sm-12">
                                    <select class="form-control select2" name="leasing_id" id="leasing_id">
                                        <option value="">Pilih Leasing</option>
                                        @foreach ($leasing as $spkOption)
                                            <option value="{{ $spkOption->id }}">{{ $spkOption->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 mb-2">
                                <label for="date" class="col-sm-10 col-form-label">Nama SPV</label>
                                <div class="form-group col-11">
                                    <input name="id="nama_spv"" class="form-control" type="text" placeholder="" id="id="nama_spv"">
                                </div>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="date" class="col-sm-10 col-form-label">Nama SPV</label>
                                <div class="form-group col-11">
                                    <input name="id="nama_sales"" class="form-control" type="text" placeholder="" id="id="nama_sales"">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-2 mb-2">
                                <label for="date" class="col-sm-10 col-form-label">Tanggal Pengajuan</label>
                                <div class="form-group col-11">
                                    <input name="tgl_pengajuan" class="form-control" type="date" placeholder="" id="tgl_pengajuan">
                                </div>
                            </div>
                            <div class="col-2 mb-2">
                                <label for="date" class="col-sm-10 col-form-label">Tanggal Result</label>
                                <div class="form-group col-11">
                                    <input name="tgl_hasil" class="form-control" type="date" placeholder="" id="tgl_hasil">
                                </div>
                            </div>
                            <div class="col-8 mb-2">
                                <label for="date" class="col-sm-4 col-form-label">Hasil</label>
                                    <select name="hasil" id="hasil" class="form-select" aria-label="Default select example" >
                                    <option selected="">Open this select menu</option>
                                    <option value="Reject Kapasitas">Reject Kapasitas</option>
                                    <option value="Reject Coll">Reject Coll</option>
                                    <option value="Reject Atas Nama">Reject Atas Nama</option>
                                    <option value="Reject BI">Reject BI</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                    <button type="button" class="btn btn-secondary" onclick="goBack()">Kembali</button>
                    <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">

                    </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

@section('js')
<script>
    $(document).ready(function() {
        // Ketika dropdown No SPK berubah
        $('#spk_id').change(function() {
            var selectedOption = $(this).find('option:selected');
            var spkId = selectedOption.val();

            // Buat permintaan Ajax untuk mendapatkan data SPK
            $.ajax({
                url: '/get-spk-data/' + spkId, // Ganti dengan URL sesuai dengan rute Anda
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Isi input Nama SPV dan Nama Sales dengan data yang diterima
                    $('#nama_spv').val(data.nama_spv).prop('disabled', false);
                    $('#nama_sales').val(data.nama_sales).prop('disabled', false);
                },
                error: function() {
                    // Handle error jika permintaan gagal
                    console.log('Error fetching SPK data');
                }
            });
        });
    });
</script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
{{-- <script type="text/javascript">
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

</script> --}}

@endsection
