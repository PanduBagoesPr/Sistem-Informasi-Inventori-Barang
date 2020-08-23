<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shipment;
use App\Employee;
use App\Transaction;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // // Transactions
        // $data['trxtion'] = $request->query('trxtion');
        // $trxtion = $data['trxtion'];
        // // Employees
        // $data['employee'] = $request->query('employee');
        // $employee = $data['employee'];
        //Products
        
        // // Keyword
        // $data['keyword'] = $request->query('keyword');
        // // Categories
        // $keyword = $data['keyword'];
        // $data['categories'] = Category::pluck('category_name', 'category_id');
        // Batas Paginate
        $paginate = 10;
        // Array Where Conditional
        // $where = [];
        // $or_where1 = [];
        // $or_where2 = [];
        // // Kondisi jika category terpilih
        // if(!empty($trxtion)){
        //     $where[] = ['trxtion_id', '=', $trxtion];
        // }
        // // Kondisi jika keyword terinput
        // // if(!empty($data['keyword'])){
        // //     $where[] = ['product_name', 'LIKE', "%{$keyword}%"];
        // //     $or_where1[] = ['product_sku', 'LIKE', "%{$keyword}%"];
        // //     $or_where2[] = ['product_description', 'LIKE', "%{$keyword}%"];
        // // }
        // // Query berdasarkan pencarian
        // if(empty($data['trxtion']) && empty($data['keyword'])){
        //     $data['shipments'] = Shipment::with(['trxtion'])->paginate($paginate);

        // } else {
            
        //     $data['shipments'] = Shipment::with(['trxtion'])->where($where)->orWhere($or_where1)->orWhere($or_where2)->paginate($paginate);
        // }

        // View
        // $products = Product::all();
        
        // $data = [
        //     'products' => $products
        // ];
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['employees'] = Employee::pluck('employee_name', 'employee_id');
        $data['shipments'] = Shipment::with(['product'])->paginate($paginate);
        return view('shipment.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 

        // return view('product.index')->with($data);

        // $paginate = 1;
        // $data['categories'] = Category::pluck('category_name', 'category_id');
        // $data['vendors'] = Vendor::pluck('vendor_name', 'vendor_id');
        // $data['products'] = Product::with(['product'])->paginate($paginate);
        // return view('product.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = Employee::pluck('employee_name', 'employee_id');
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::where('product_status', 'Active')->pluck('product_name', 'product_id');
        // dd($categories);
        return view('shipment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data_product = Product::find($request->product_id);
        // $harga_product = $data_product->product_price;

        $shipment = new Shipment;
        $shipment->trxtion_id = $request->trxtion_id;
        $shipment->employee_id = $request->employee_id;
        $shipment->product_id = $request->product_id;
        $shipment->shipment_customer = $request->customer;
        $shipment->shipment_address = $request->address;
        $shipment->shipment_phone = $request->phone;
        $shipment->shipment_date = $request->shipment_date;

        // if(!empty($request->file('image'))){
        //     // Request dari form
        //     $image = $request->file('image');
        //     // Dapatkan nama asli file image
        //     $filename = $image->getClientOriginalName();
        //     // Ubah spasi menjadi - di dalam file name image
        //     $charFileName = str_replace(" ", "-", $filename);
        //     //Simpan gambar ke storage
        //     $image->storeAs('products', $charFileName, 'public');

        // } else {

        //     $charFileName = "no-image.png";

        // }

        // $product->product_image = "products/".$charFileName;

        $simpan = $shipment->save();

        if($simpan){
            return redirect()->route('shipment.index')->with('success', 'Shipment created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['employees'] = Employee::pluck('employee_name', 'employee_id');
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        
        $data['shipment'] = Shipment::find($id);
        return view('shipment.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employees'] = Employee::pluck('employee_name', 'employee_id');
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        
        $data['shipment'] = Shipment::find($id);
        return view('shipment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shipment = Shipment::find($id);
        $shipment->trxtion_id = $request->trxtion_id;
        $shipment->employee_id = $request->employee_id;
        $shipment->product_id = $request->product_id;
        $shipment->shipment_customer = $request->customer;
        $shipment->shipment_address = $request->address;
        $shipment->shipment_phone = $request->phone;
        $shipment->shipment_date = $request->datetime;

        // if(!empty($request->file('image'))){
        //     // Request dari form
        //     $image = $request->file('image');
        //     // Dapatkan nama asli file image
        //     $filename = $image->getClientOriginalName();
        //     // Ubah spasi menjadi - di dalam file name image
        //     $charFileName = str_replace(" ", "-", $filename);
        //     //Simpan gambar ke storage
        //     $image->storeAs('products', $charFileName, 'public');

        //     $product->product_image = "products/".$charFileName;

        // } 


        $ubah = $shipment->save();

        if($ubah){
            return redirect()->route('shipment.index')->with('info', 'Shipment updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::find($id);
        $hapus = $shipment->delete();

        if($hapus){
            return redirect()->route('shipment.index')->with('warning', 'shipment deleted successfully');
        }
    }
}
