@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Vendor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Vendor</li>
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
                
                @if(!empty($errors->all())) 

                <div class="alert alert-danger"> 
                    <ul> 
                        @foreach($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                        @endforeach 
                    </ul> 
                </div> 

                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit vendor</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('vendor/update/'.$vendor['vendor_id'])}}" method="POST">
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="_method" value="PUT">
                            
                            <input type="hidden" name="vendor_id" value="{{$vendor['vendor_id']}}">

                        <div class="form-group">
                            <label for="">Name vendor</label>
                            <input type="text" id="vendor_name"  name="name" class="form-control" value="{{ $vendor['vendor_name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Address vendor</label>
                            <input type="text" id="vendor_address"  name="address" class="form-control" value="{{ $vendor['vendor_address'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Zipcode vendor</label>
                            <input type="text" id="vendor_zipcode"  name="zipcode" class="form-control" value="{{ $vendor['vendor_zipcode'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email vendor</label>
                            <input type="text" id="vendor_email"  name="email" class="form-control" value="{{ $vendor['vendor_email'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone vendor</label>
                            <input type="text" id="vendor_phone"  name="phone" class="form-control" value="{{ $vendor['vendor_phone'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control"> 
                                <option value="Active" {{ $vendor['vendor_status']=='Active'?'selected':'' }}>Active</option> 
                                <option value="Inactive" {{ $vendor['vendor_status']=='Inactive'?'selected':'' }}>Inactive</option> 
                            </select> 
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('vendors') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection