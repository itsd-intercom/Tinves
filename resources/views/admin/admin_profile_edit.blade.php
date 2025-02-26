@extends('admin.admin_master')

@section('admin')

{{--  start page title  --}}
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Profile Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Profile</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/storeProfile" enctype="multipart/from-data">
                    @csrf
                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-8">
                        <input name="name" class="form-control" type="text" value="{{ $editData->name }}" placeholder="Nama" id="text">
                    </div>
                </div>

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-8">
                        <input name="username" class="form-control" type="text" value="{{ $editData->username }}" placeholder="Username" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">User Email</label>
                    <div class="col-8">
                        <input name="email" class="form-control" type="email" value="{{ $editData->email }}" placeholder="Nama" id="text">
                    </div>
                </div>

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update Profile">
                </form>

                {{--  <form>
                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-8">
                        <input name="email" class="form-control" type="email" placeholder="Nama" id="text">
                    </div>
                </div>
                </form>  --}}
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
{{--  end page title  --}}

@endsection
