@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Instock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Instock</a></li>
                    <li class="breadcrumb-item active">Create Instock</li>
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
                    {{ Form::open(['route' => 'instock.store', 'files' => true]) }}
                    <div class="card-header">
                        Form Tambah Instock
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('vendor_id', 'Vendor') }}
                                    {{ Form::select('vendor_id', $vendors, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}

                                    <!-- <select name="category_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!-->

                                </div>
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    {{ Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('total', 'Total') }}
                                    {{ Form::text('total', '', ['class' => 'form-control', 'placeholder' => 'Enter product total']) }}

                                    <!-- <input type="text" name="name" value="" class="form-control" placeholder="Enter product name"> -->
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Total Price') }}
                                    {{ Form::number('price', '', ['class' => 'form-control', 'placeholder' => 'Enter product price']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('shipment', 'Date') }}
                                    <!-- {{ Form::input('dateTime-local', 'datetime', '' , array('class' => 'form-control')) }} -->
                                    {{ Form::date('date', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('status', 'Status') }}
                                    <label for="category_id">Category</label>
                                    {{ Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('product_id', 'Product') }}
                                    {{ Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('vendor_id', 'Vendor') }}
                                    {{ Form::select('vendor_id', $vendors, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}

                                    <select name="category_id" id="test" class="form-control">
                                        <option value="" selected>Choose One</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        </select>
                                    </!

                                </div>
                                <div class="form-group">
                                    {{ Form::label('image', 'Image') }}
                                    {{ Form::file('image', ['class' => 'form-control']) }}

                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('description', 'Description') }}
                                    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter product description']) }}
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('instock.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Add Instock</button>
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