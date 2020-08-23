@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Outstock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Outstock</li>
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
                        Detail Outstock
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('trxtion_id', 'Transaction') }}
                                    {{ Form::select('trxtion_id', $transactions, $outstock->trxtion_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled' => 'disabled']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    <!-- <label for="product_id">product</label> -->
                                    {{ Form::select('product_id', $products, $outstock->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled' => 'disabled']) }}

                                    <!-- <select name="category_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!-->

                                </div>
                                <div class="form-group">
                                    {{ Form::label('total', 'Total') }}
                                    {{ Form::text('outstock_total', $outstock->outstock_total, ['class' => 'form-control', 'placeholder' => 'Enter outstock total', 'disabled' => 'disabled']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter outstock name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('date', 'Date') }}
                                    {{ Form::text('date', $outstock->outstock_date, ['class' => 'form-control',  'disabled' => 'disabled']) }}
                                </div>
                                <!-- <div class="form-group">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                    <input class="form-control" type="text" value="{{ $outstock['outstock_date'] }}" id="example-date-input">
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('outstock.index') }}" class="btn btn-outline-info">Back</a>
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