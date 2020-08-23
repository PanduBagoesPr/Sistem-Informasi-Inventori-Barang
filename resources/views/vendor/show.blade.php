@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Vendor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Vendor</li>
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
                        <h3 class="card-title">Show Vendor</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name Vendor</label>
                            <input type="text" id="vendor_name" class="form-control" value="{{ $vendor['vendor_name'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Address Vendor</label>
                            <input type="text" id="vendor_address" class="form-control" value="{{ $vendor['vendor_address'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Zip Code Vendor</label>
                            <input type="text" id="vendor_zipcode" class="form-control" value="{{ $vendor['vendor_zipcode'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Email Vendor</label>
                            <input type="text" id="vendor_email" class="form-control" value="{{ $vendor['vendor_email'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Vendor</label>
                            <input type="text" id="vendor_phone" class="form-control" value="{{ $vendor['vendor_phone'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" id="status" class="form-control" value="{{ $vendor['vendor_status'] }}" disabled>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('vendors') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection