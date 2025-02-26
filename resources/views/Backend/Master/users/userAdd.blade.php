@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{--  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Divisi add Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Divisi</li>
                </ol>
            </div>
        </div>
    </div>
</div>  --}}
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Users add Page</h4><br></br>
                </div>

                <form method="post" action="{{ route('user.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                <div class="row mb-3">
                    <label for="text" class="col-2 col-form-label">Users</label>
                    <div class="form-group col-10">
                        <input name="name" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-2 col-form-label">Username</label>
                    <div class="form-group col-10">
                        <input name="username" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-2 col-form-label">Jabatan</label>
                    <div class="form-group col-10">
                        <input name="jabatan" class="form-control" type="text" placeholder="" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Divisi</label>
                    <div class="form-group col-sm-10">
                        <select name="divisi_id" class="form-select" aria-label="Default select example">
                            <option selected="">Select Option .. </option>
                            @foreach($divisi as $u)
                            <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                            </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="form-group col-sm-10">
                        <select name="lokasi_id" class="form-select" aria-label="Default select example">
                            <option selected="">Select Option .. </option>
                            @foreach($lokasi as $u)
                            <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                            </select>
                    </div>
                </div>

                {{--  <div class="row mb-3">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('kata sandi') }}</label>
                        <div class="col-sm-10">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>  --}}

                {{--  <div class="row mb-3">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi') }}</label>
                        <div class="col-sm-10">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                </div>   --}}


                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                users: {
                    required : true,
                },
            },
            messages :{
                users: {
                    required : 'Please Enter Your Users',
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
