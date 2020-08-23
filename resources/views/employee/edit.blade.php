@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
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
                        <h3 class="card-title">Edit Employee</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('employee/update/'.$employee['employee_id'])}}" method="POST">
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="_method" value="PUT">
                            
                            <input type="hidden" name="employee_id" value="{{$employee['employee_id']}}">

                        <div class="form-group">
                            <label for="">Code Employee</label>
                            <input type="text" id="employee_code"  name="code" class="form-control" value="{{ $employee['employee_code'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Name Employee</label>
                            <input type="text" id="employee_name"  name="name" class="form-control" value="{{ $employee['employee_name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Datebirth Employee</label>
                            <input type="date" id="employee_datebirth"  name="datebirth" class="form-control" value="{{ $employee['employee_datebirth'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Gender Employee</label>
                            <input type="text" id="employee_gender"  name="gender" class="form-control" value="{{ $employee['employee_gender'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Address employee</label>
                            <input type="text" id="employee_address"  name="address" class="form-control" value="{{ $employee['employee_address'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Zipcode employee</label>
                            <input type="text" id="employee_zipcode"  name="zipcode" class="form-control" value="{{ $employee['employee_zipcode'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email employee</label>
                            <input type="text" id="employee_email"  name="email" class="form-control" value="{{ $employee['employee_email'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone employee</label>
                            <input type="text" id="employee_phone"  name="phone" class="form-control" value="{{ $employee['employee_phone'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" class="form-control"> 
                                <option value="Admin" {{ $employee['employee_status']=='Admin'?'selected':'' }}>Admin</option> 
                                <option value="Employee" {{ $employee['employee_status']=='Employee'?'selected':'' }}>Employee</option> 
                            </select> 
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('employees') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection