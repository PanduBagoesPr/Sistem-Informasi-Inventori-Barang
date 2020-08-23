<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        
        $data = [
            'employees' => $employee
        ];

        return view('employee/index')->with($data);
    }

    public function create()
    {
        return view('employee/create');
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'datebirth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role' => 'required',
            
        ]);

        // var_dump($val);

        $employee = new Employee;
        $employee->employee_code = $request->code;
        $employee->employee_name = $request->name;
        $employee->employee_datebirth = $request->datebirth;
        $employee->employee_gender = $request->gender;
        $employee->employee_address = $request->address;
        $employee->employee_zipcode = $request->zipcode;
        $employee->employee_phone = $request->phone;
        $employee->employee_email = $request->email;
        $employee->employee_role = $request->role;
        $simpan = $employee->save();

        if($simpan){
            return redirect(url('employees'))->with('success', 'employee created successfully');
        }
    }

    public function show($employee_id)
    {
        $employee = Employee::find($employee_id);

        $data = [
            'employee' => $employee
        ];


        return view('employee/show')->with($data);
    }

    public function edit($employee_id)
    {
        $employee = Employee::find($employee_id);

        $data['employee'] = $employee;

        return view('employee/edit')->with($data);
    }

    public function update(Request $request, $employee_id)
    {
        $val = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'datebirth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role' => 'required',
            
        ]);

        // var_dump($val);

        $employee = Employee::find($employee_id);
        $employee->employee_code = $request->code;
        $employee->employee_name = $request->name;
        $employee->employee_datebirth = $request->datebirth;
        $employee->employee_gender = $request->gender;
        $employee->employee_address = $request->address;
        $employee->employee_zipcode = $request->zipcode;
        $employee->employee_phone = $request->phone;
        $employee->employee_email = $request->email;
        $employee->employee_role = $request->role;
        $ubah = $employee->save();

        if($ubah){
            return redirect(url('employees'))->with('info', 'employee updated successfully');
        }

    }

    public function destroy($employee_id)
    {
        // SELECT * FROM employees WHERE employee_id = $employee_id;
        $employee = Employee::find($employee_id);
        // $employee = employee::where('employee_id', $employee_id)->first();
        // Fungsi yang akan menghapus data berdasarkan model dan where
        $hapus = $employee->delete();

        if($hapus){
            return redirect(url('employees'))->with('warning', 'employee deleted successfully');
        }
    }
}
