@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Outstock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Outstock</li>
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
                {{ Form::model($outstock, ['method' => 'PATCH', 'route' => ['outstock.update', $outstock->outstock_id], 'files' => true]) }}
                    <div class="card-header">
                        Form Edit Outstock
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('trxtion_id', 'Transaction') }}
                                    {{ Form::select('trxtion_id', $transactions, $outstock->trxtion_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}
                                </div> 
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    {{ Form::select('product_id', $products, $outstock->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'test']) }}
                                </div>
                                <!-- <div class="form-group">
                                    {{ Form::label('shipment', 'Date') }}
                                    {{ Form::input('dateTime-local', 'date',   $outstock->instock_date, array('class' => 'form-control')) }}
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="datetime" id="datetime"  name="datetime" class="form-control" value="{{ date('d-m-Y H:i:s', strtotime($outstock->instock_date)) }}">
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('outstock.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update Outstock</button>
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