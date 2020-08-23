@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Instock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Instock</li>
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
                        Detail Instock
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('vendor_id', 'Vendor') }}
                                    {{ Form::select('vendor_id', $vendors, $instock->vendor_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled' => 'disabled']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    <!-- <label for="product_id">product</label> -->
                                    {{ Form::select('product_id', $products, $instock->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled' => 'disabled']) }}

                                    <!-- <select name="category_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!-->

                                </div>
                                <div class="form-group">
                                    {{ Form::label('total', 'Total') }}
                                    {{ Form::text('instock_total', $instock->instock_total, ['class' => 'form-control', 'placeholder' => 'Enter instock total', 'disabled' => 'disabled']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter instock name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Price') }}
                                    {{ Form::number('instock_price', $instock->instock_price, ['class' => 'form-control', 'placeholder' => 'Enter instock price', 'disabled' => 'disabled']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('date', 'Date') }}
                                    {{ Form::text('date', $instock->instock_date, ['class' => 'form-control',  'disabled' => 'disabled']) }}
                                </div>
                                <!-- <div class="form-group">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                    <input class="form-control" type="text" value="{{ $instock['instock_date'] }}" id="example-date-input">
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('instock.index') }}" class="btn btn-outline-info">Back</a>
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