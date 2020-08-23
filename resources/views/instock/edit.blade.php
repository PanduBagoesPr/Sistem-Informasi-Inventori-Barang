@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Instock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Instock</li>
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
                {{ Form::model($instock, ['method' => 'PATCH', 'route' => ['instock.update', $instock->instock_id], 'files' => true]) }}
                    <div class="card-header">
                        Form Edit Instock
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('vendor_id', 'Vendor') }}
                                    {{ Form::select('vendor_id', $vendors, $instock->vendor_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}
                                </div> 
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    {{ Form::select('product_id', $products, $instock->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}
                                </div> 
                                <div class="form-group">
                                    {{ Form::label('total', 'Total') }}
                                    {{ Form::text('total', $instock->instock_total, ['class' => 'form-control', 'placeholder' => 'Enter instock total']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter product name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Price') }}
                                    {{ Form::number('price', $instock->instock_price, ['class' => 'form-control', 'placeholder' => 'Enter instock price']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('date', 'Date') }}
                                    {{ Form::date('date', $instock->instock_date, ['class' => 'form-control', 'placeholder' => 'Enter instock date']) }}
                                </div>
                                <!-- <div class="form-group">
                                    {{ Form::label('shipment', 'Date') }}
                                    {{ Form::input('dateTime-local', 'date',   $instock->instock_date, array('class' => 'form-control')) }}
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="datetime" id="datetime"  name="datetime" class="form-control" value="{{ date('d-m-Y H:i:s', strtotime($instock->instock_date)) }}">
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('instock.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update Instock</button>
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