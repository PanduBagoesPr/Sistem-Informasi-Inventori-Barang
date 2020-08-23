<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = Vendor::all();
        
        $data = [
            'vendors' => $vendor
        ];

        return view('vendor/index')->with($data);
    }

    public function create()
    {
        return view('vendor/create');
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
            
        ]);

        // var_dump($val);

        $vendor = new Vendor;
        $vendor->vendor_name = $request->name;
        $vendor->vendor_address = $request->address;
        $vendor->vendor_zipcode = $request->zipcode;
        $vendor->vendor_phone = $request->phone;
        $vendor->vendor_email = $request->email;
        $vendor->vendor_status = $request->status;
        $simpan = $vendor->save();

        if($simpan){
            return redirect(url('vendors'))->with('success', 'vendor created successfully');
        }
    }

    public function show($vendor_id)
    {
        $vendor = vendor::find($vendor_id);

        $data = [
            'vendor' => $vendor
        ];


        return view('vendor/show')->with($data);
    }

    public function edit($vendor_id)
    {
        $vendor = vendor::find($vendor_id);

        $data['vendor'] = $vendor;

        return view('vendor/edit')->with($data);
    }

    public function update(Request $request, $vendor_id)
    {
        $val = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
            
        ]);

        // var_dump($val);

        $vendor = Vendor::find($vendor_id);
        $vendor->vendor_name = $request->name;
        $vendor->vendor_address = $request->address;
        $vendor->vendor_zipcode = $request->zipcode;
        $vendor->vendor_phone = $request->phone;
        $vendor->vendor_email = $request->email;
        $vendor->vendor_status = $request->status;
        $ubah = $vendor->save();

        if($ubah){
            return redirect(url('vendors'))->with('info', 'vendor updated successfully');
        }

    }

    public function destroy($vendor_id)
    {
        // SELECT * FROM vendors WHERE vendor_id = $vendor_id;
        $vendor = Vendor::find($vendor_id);
        // $vendor = vendor::where('vendor_id', $vendor_id)->first();
        // Fungsi yang akan menghapus data berdasarkan model dan where
        $hapus = $vendor->delete();

        if($hapus){
            return redirect(url('vendors'))->with('warning', 'vendor deleted successfully');
        }
    }
}
