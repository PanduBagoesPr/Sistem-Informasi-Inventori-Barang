<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Totalstock;
use App\Instock;
use App\Product;
use App\Transaction;

class TotalstockController extends Controller
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
        $data['instocks'] = Instock::pluck('instock_total', 'instock_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['transactions'] = Transaction::pluck('trxtion_sold', 'trxtion_id');
        $data['totalstocks'] = Totalstock::with(['instock'])->paginate($paginate);
        return view('totalstock.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['instocks'] = Instock::pluck('instock_total', 'instock_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['transactions'] = Transaction::pluck('trxtion_sold', 'trxtion_id');
        // dd($categories);
        return view('totalstock.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $totalstock = new Totalstock;
        $totalstock->instock_id = $request->instock_id;
        $totalstock->outstock_id = $request->outstock_id;
        $totalstock->totalstock_total = $request->total;

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

        $simpan = $totalstock->save();

        if($simpan){
            return redirect()->route('totals$totalstock.index')->with('success', 'totals$totalstock created successfully');
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
        $data['instocks'] = Instock::pluck('instock_total', 'instock_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['transactions'] = Transaction::pluck('trxtion_sold', 'trxtion_id');
        
        $data['totalstock'] = Totalstock::find($id);
        return view('totalstock.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['instocks'] = Instock::pluck('instock_total', 'instock_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['transactions'] = Transaction::pluck('trxtion_sold', 'trxtion_id');
        
        $data['totalstock'] = Totalstock::find($id);
        return view('totalstock.edit', $data);
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
        $totalstock = Totalstock::find($id);
        $totalstock->instock_id = $request->instock_id;
        $totalstock->outstock_id = $request->outstock_id;
        $totalstock->totalstock_total = $request->total;

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


        $ubah = $totalstock->save();

        if($ubah){
            return redirect()->route('totalstock.index')->with('info', 'totalstock updated successfully');
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
        $totalstock = Totalstock::find($id);
        $hapus = $totalstock->delete();

        if($hapus){
            return redirect()->route('totalstock.index')->with('warning', 'totalstock deleted successfully');
        }
    }
}
