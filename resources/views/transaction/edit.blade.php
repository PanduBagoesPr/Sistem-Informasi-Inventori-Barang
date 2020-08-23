@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Transaction</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Transaction</li>
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
                        <h3 class="card-title">Edit Transaction</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('transaction/update/'.$transaction['trxtion_id'])}}" method="POST">
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="_method" value="PUT">
                            
                            <input type="hidden" name="trxtion_id" value="{{$transaction['trxtion_id']}}">

                        <div class="form-group">
                            <label for="">Transaction Code</label>
                            <input type="text" id="trxtion_code"  name="trxtion_code" class="form-control" value="{{ $transaction['trxtion_code'] }}">
                        </div>
                        <div class="form-group">
                            {{ Form::label('product', 'Product') }}
                            {{ Form::select('product_id', $products, null, ['class' => 'form-control', 'id' => 'edit_product']) }}
                        </div>
                        <div class="form-group">
                            <label for="">Transaction Sold</label>
                            <input type="number" id="total_out_stock"  name="total_out_stock" class="form-control" value="{{ $transaction['total_out_stock'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Transaction Date</label>
                            <input type="datepicker" id="trxtion_date"  name="trxtion_date" class="form-control" value="{{ $transaction['trxtion_date'] }}">
                        </div>
                        <!-- <div class="form-group">
                            {{ Form::label('date', 'Transaction Date') }}
                            {{ Form::date('date', $transaction->trxtion_date, ['class' => 'form-control', 'placeholder' => 'Enter transaction date']) }}
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="">Transaction Date</label>
                            <input type="text" id="trxtion_date"  name="trxtion_date" class="form-control" value="{{ date('d-m-Y H:i:s', strtotime($transaction->trxtion_date)) }}">
                        </div> -->
                    
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('transaction') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Edit Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection