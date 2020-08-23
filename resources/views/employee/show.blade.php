@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Employee</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Show Employee</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Code Employee</label>
                            <input type="text" id="employee_code" class="form-control" value="{{ $employee['employee_code'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Name Employee</label>
                            <input type="text" id="employee_name" class="form-control" value="{{ $employee['employee_name'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Datebirth Employee</label>
                            <input type="text" id="employee_datebirth" class="form-control" value="{{ $employee['employee_datebirth'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Gender Employee</label>
                            <input type="text" id="employee_gender" class="form-control" value="{{ $employee['employee_gender'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Address Employee</label>
                            <input type="text" id="employee_address" class="form-control" value="{{ $employee['employee_address'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Zip Code employee</label>
                            <input type="text" id="employee_zipcode" class="form-control" value="{{ $employee['employee_zipcode'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Email employee</label>
                            <input type="text" id="employee_email" class="form-control" value="{{ $employee['employee_email'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Phone employee</label>
                            <input type="text" id="employee_phone" class="form-control" value="{{ $employee['employee_phone'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <input type="text" id="role" class="form-control" value="{{ $employee['employee_role'] }}" disabled>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('employees') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection