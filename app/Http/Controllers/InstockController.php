<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instock;
use App\Totalstock;
use App\Vendor;
use App\Product;
use DB;

class InstockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // // Category
        // $data['category'] = $request->query('category');
        // $category = $data['category'];
        // // Vendor
        // $data['vendor'] = $request->query('vendor');
        // $vendor = $data['vendor'];
        // // // Keyword
        // // $data['keyword'] = $request->query('keyword');
        // // // Categories
        // // $keyword = $data['keyword'];
        // // $data['categories'] = Category::pluck('category_name', 'category_id');
        // // Batas Paginate
        // $paginate = 10;
        // // Array Where Conditional
        // $where = [];
        // $or_where1 = [];
        // $or_where2 = [];
        // // Kondisi jika category terpilih
        // if(!empty($category)){
        //     $where[] = ['category_id', '=', $category];
        // }
        // // Kondisi jika keyword terinput
        // if(!empty($data['keyword'])){
        //     $where[] = ['product_name', 'LIKE', "%{$keyword}%"];
        //     $or_where1[] = ['product_sku', 'LIKE', "%{$keyword}%"];
        //     $or_where2[] = ['product_description', 'LIKE', "%{$keyword}%"];
        // }
        // // Query berdasarkan pencarian
        // if(empty($data['category']) && empty($data['keyword'])){
        //     $data['products'] = Product::with(['category'])->paginate($paginate);

        // } else {
            
        //     $data['products'] = Product::with(['category'])->where($where)->orWhere($or_where1)->orWhere($or_where2)->paginate($paginate);
        // }

        // // View
        // // $products = Product::all();
        
        // // $data = [
        // //     'products' => $products
        // // ];
        // return view('product.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 

        // return view('product.index')->with($data);

        $paginate = 10;
        $data['vendors'] = Vendor::pluck('vendor_name', 'vendor_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['instocks'] = Instock::with(['vendor'])->paginate($paginate);
        return view('instock.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['vendors'] = Vendor::where('vendor_status', 'Active')->pluck('vendor_name', 'vendor_id');
        $data['products'] = Product::where('product_status', 'Active')->pluck('product_name', 'product_id');
        // dd($categories);
        return view('instock.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instock = new Instock;
        $instock->product_id = $request->product_id;
        $instock->vendor_id = $request->vendor_id;
        $instock->instock_price = $request->price;
        $instock->instock_total = $request->total;
        $instock->instock_date = $request->date;

        // if(!empty($request->file('image'))){
        //     // Request dari form
        //     $image = $request->file('image');
        //     // Dapatkan nama asli file image
        //     $filename = $image->getClientOriginalName();
        //     // Ubah spasi menjadi - di dalam file name image
        //     $charFileName = str_replace(" ", "-", $filename);
        //     //Simpan gambar ke storage
        //     $image->storeAs('instocks', $charFileName, 'public');

        // } else {

        //     $charFileName = "no-image.png";

        // }

        // $instock->instock_image = "instocks/".$charFileName;



        $simpan = $instock->save();

        if($simpan){
            return redirect()->route('instock.index')->with('success', 'instock created successfully');
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
        $data['vendors'] = Vendor::pluck('vendor_name', 'vendor_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        
        $data['instock'] = Instock::find($id);
        return view('instock.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['vendors'] = Vendor::where('vendor_status', 'Active')->pluck('vendor_name', 'vendor_id');
        $data['products'] = Product::where('product_status', 'Active')->pluck('product_name', 'product_id');
        
        $data['instock'] = Instock::find($id);
        return view('instock.edit', $data);
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
        $instock = Instock::find($id);
        $instock->product_id = $request->product_id;
        $instock->vendor_id = $request->vendor_id;
        $instock->instock_price = $request->price;
        $instock->instock_total = $request->total;
        $instock->instock_date = $request->date;

        // if(!empty($request->file('image'))){
        //     // Request dari form
        //     $image = $request->file('image');
        //     // Dapatkan nama asli file image
        //     $filename = $image->getClientOriginalName();
        //     // Ubah spasi menjadi - di dalam file name image
        //     $charFileName = str_replace(" ", "-", $filename);
        //     //Simpan gambar ke storage
        //     $image->storeAs('instocks', $charFileName, 'public');

        //     $instock->instock_image = "instocks/".$charFileName;

        // } 


        $ubah = $instock->save();

        if($ubah){
            return redirect()->route('instock.index')->with('info', 'instock updated successfully');
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
        $instock = Instock::find($id);
        $hapus = $instock->delete();

        if($hapus){
            return redirect()->route('instock.index')->with('warning', 'instock deleted successfully');
        }
    }
}
