@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Notes</h3><br></br><hr>

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

<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                    <div class="div">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control" id="validationCustom01"
                                            placeholder="Deskripsi" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
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
@endsection
