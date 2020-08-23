@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Shipment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shipment</a></li>
                    <li class="breadcrumb-item active">Create Shipment</li>
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
            
            <div class="col-md-12">

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
                    {{ Form::open(['route' => 'shipment.store', 'files' => true]) }}
                    <div class="card-header">
                        Form Tambah Shipment
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('trxtion_id', 'Transaction') }}
                                    <!-- <label for="trxtion_id">trxtion</label> -->
                                    {{ Form::select('trxtion_id', $transactions, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}

                                    <!-- <select name="category_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!-->

                                </div>
                                <div class="form-group">
                                    {{ Form::label('product', 'Product') }}
                                    {{ Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('customer', 'Customer') }}
                                    {{ Form::text('customer', '', ['class' => 'form-control', 'placeholder' => 'Enter shipment customer']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter shipment name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Enter shipment address']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter shipment name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter shipment phone']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('shipment', 'Date') }}
                                    <!-- {{ Form::input('dateTime-local', 'datetime', '' , array('class' => 'form-control')) }} -->
                                    {{ Form::date('shipment_date', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('employee', 'Employee') }}
                                    {{ Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                                <!-- <div class="form-group">
                                    {{ Form::label('vendor_id', 'Vendor') }}
                                    {{ Form::select('vendor_id', $errors, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}

                                    <select name="category_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    

                                </div> -->
                                <!-- <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', ['class' => 'form-control']) }}

                                    <input type="file" name="image" class="form-control">
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('description', 'Description') }}
                                    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter shipment description']) }}
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('shipment.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Add shipment</button>
                    </div>
                    {{ Form::close() }}
                    <!-- </form> -->
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection