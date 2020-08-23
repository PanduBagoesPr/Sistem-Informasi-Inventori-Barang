@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Product</li>
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

                <div class="card">
                    <div class="card-header">
                        Detail Produk
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    {{ Form::label('trxtion_id', 'Transaction') }}
                                    <!-- <label for="trxtion_id">trxtion</label> -->
                                    {{ Form::select('trxtion_id', $transactions, $shipment->trxtion_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test',  'disabled' => 'disabled']) }}

                                    <!-- <select name="trxtion_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!-->

                                </div>
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    {{ Form::select('product_id', $products, $shipment->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test',  'disabled' => 'disabled']) }}
                                </div> 
                                <div class="form-group">
                                    {{ Form::label('employee', 'Employee') }}
                                    {{ Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Choose One',  'disabled' => 'disabled']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('customer', 'Customer') }}
                                    {{ Form::text('customer', $shipment->shipment_customer, ['class' => 'form-control', 'placeholder' => 'Enter shipment customer',  'disabled' => 'disabled']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter shipment name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address', $shipment->shipment_address, ['class' => 'form-control', 'placeholder' => 'Enter shipment address',  'disabled' => 'disabled']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter shipment name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone', $shipment->shipment_phone, ['class' => 'form-control', 'placeholder' => 'Enter shipment phone',  'disabled' => 'disabled']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('shipment', 'Date') }}
                                    {{ Form::text('datetime', $shipment->shipment_date, ['class' => 'form-control',  'disabled' => 'disabled']) }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('shipment.index') }}" class="btn btn-outline-info">Back</a>
                    </div>
                    <!-- </form> -->
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection