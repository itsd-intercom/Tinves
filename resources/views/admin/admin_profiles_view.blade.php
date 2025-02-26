@extends('admin.admin_master')

@section('admin')

<div class="containter-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Profile</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Forms Profile</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-4">
        <div class="card"><br><br/>
            <center>
            <img class="rounded-circle avatar-xl" src="assets/images/small/img-5.jpg" alt="Card image cap">
            </center>
            <div class="card-body">
                <h4 class="card-title">Name     : {{ $adminData->name }}</h4>
                <hr>
                <h4 class="card-title">User name : {{ $adminData->username }}</h4>
                </hr>
                <hr>
                <h4 class="card-title">User Email : {{ $adminData->email }}</h4>
                </hr>
                <hr>
                {{--  <button class="type="button" class="btn btn-info btn-rounded waves-effect waves-light">Info </button>  --}}
                <a href="/editProfile" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile </a>
             </hr>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
