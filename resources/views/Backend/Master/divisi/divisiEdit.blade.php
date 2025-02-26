@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Divisi add Page</h4>
                </div>
                <form method="post" action="{{ route('divisi.update') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                    <input type="hidden" name="id"  value="{{ $divisi->id }}" >
                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Divisi</label>
                        <div class="form-group col-10">
                            <input name="nama" class="form-control" type="text" value="{{ $divisi->nama }}" placeholder=""                                id=" text">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#myForm').validate({
        rules: {
            nama: {
                required: true,
            },
        },
        messages: {
            nama: {
                required: 'Please Enter Your Nama Divisi',
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});
</script>

@endsection
