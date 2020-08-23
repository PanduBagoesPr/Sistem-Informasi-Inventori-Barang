@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Shipment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Shipment</li>
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
                {{ Form::model($shipment, ['method' => 'PATCH', 'route' => ['shipment.update', $shipment->shipment_id], 'files' => true]) }}
                    <div class="card-header">
                        Form Edit Produk
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    {{ Form::label('trxtion_id', 'Transaction') }}
                                    <!-- <label for="trxtion_id">trxtion</label> -->
                                    {{ Form::select('trxtion_id', $transactions, $shipment->trxtion_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}

                                    <!-- <select name="trxtion_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!-->

                                </div>
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    {{ Form::select('product_id', $products, $shipment->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}
                                </div> 
                                <div class="form-group">
                                    {{ Form::label('employee', 'Employee') }}
                                    {{ Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('customer', 'Customer') }}
                                    {{ Form::text('customer', $shipment->shipment_customer, ['class' => 'form-control', 'placeholder' => 'Enter shipment customer']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter shipment name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address', $shipment->shipment_address, ['class' => 'form-control', 'placeholder' => 'Enter shipment address']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter shipment name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone', $shipment->shipment_phone, ['class' => 'form-control', 'placeholder' => 'Enter shipment phone']) }}
                                </div>
                                <!-- <div class="form-group">
                                    {{ Form::label('shipment', 'Date') }}
                                    {{ Form::input('dateTime-local', 'datetime',   $shipment->shipment_date, array('class' => 'form-control')) }}
                                </div> -->
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" id="shipment_date"  name="datetime" class="form-control" value="{{ $shipment['shipment_date'] }}">
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" id="datetime"  name="datetime" class="form-control" value="{{ date('d-m-Y H:i:s', strtotime($shipment->shipment_date)) }}">
                                </div> -->
                            </div>
                            <!-- <div class="col-md-6">
                                
                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    <br>
                                    <img src="{{ asset('storage/'.$shipment->shipment_image) }}" alt="" class="img-fluid">
                                    {{ Form::label('image', 'Ganti Image') }}
                                    <br>
                                    {{ Form::file('image', ['class' => 'form-control']) }}

                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('description', 'Description') }}
                                    {{ Form::textarea('description', $shipment->shipment_description, ['class' => 'form-control', 'placeholder' => 'Enter shipment description']) }}
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('shipment.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update shipment</button>
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