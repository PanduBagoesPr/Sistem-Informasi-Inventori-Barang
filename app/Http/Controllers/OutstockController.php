<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outstock;
use App\Product;
use App\Transaction;

class OutstockController extends Controller
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
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['outstocks'] = outstock::with(['product'])->paginate($paginate);
        return view('outstock.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        // dd($categories);
        return view('outstock.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ambil data total dari table product berdasarkan inputan product_id
        $data_trxtion = Transaction::find($request->trxtion_id);
        $sold_trxtion = $data_trxtion->trxtion_sold;

        $dataa_trxtion = Transaction::find($request->trxtion_id);
        $date_trxtion = $dataa_trxtion->trxtion_date;
        
        $outstock = new Outstock;
        $outstock->product_id = $request->product_id;
        $outstock->trxtion_id = $request->trxtion_id;
        $outstock->outstock_total = $sold_trxtion;
        $outstock->outstock_date = $date_trxtion;

        // if(!empty($request->file('image'))){
        //     // Request dari form
        //     $image = $request->file('image');
        //     // Dapatkan nama asli file image
        //     $filename = $image->getClientOriginalName();
        //     // Ubah spasi menjadi - di dalam file name image
        //     $charFileName = str_replace(" ", "-", $filename);
        //     //Simpan gambar ke storage
        //     $image->storeAs('outstocks', $charFileName, 'public');

        // } else {

        //     $charFileName = "no-image.png";

        // }

        // $outstock->outstock_image = "outstocks/".$charFileName;

        $simpan = $outstock->save();

        if($simpan){
            return redirect()->route('outstock.index')->with('success', 'outstock created successfully');
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
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        
        $data['outstock'] = Outstock::find($id);
        return view('outstock.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['transactions'] = Transaction::pluck('trxtion_code', 'trxtion_id');
        $data['products'] = Product::pluck('product_name', 'product_id');
        
        $data['outstock'] = Outstock::find($id);
        return view('outstock.edit', $data);
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
        // Ambil data total dari table product berdasarkan inputan product_id
        $data_trxtion = Transaction::find($request->trxtion_id);
        $sold_trxtion = $data_trxtion->trxtion_sold;

        $dataa_trxtion = Transaction::find($request->trxtion_id);
        $date_trxtion = $dataa_trxtion->trxtion_date;

        $outstock = Outstock::find($id);
        $outstock->product_id = $request->product_id;
        $outstock->trxtion_id = $request->trxtion_id;
        $outstock->outstock_total = $sold_trxtion;
        $outstock->outstock_date = $date_trxtion;

        // if(!empty($request->file('image'))){
        //     // Request dari form
        //     $image = $request->file('image');
        //     // Dapatkan nama asli file image
        //     $filename = $image->getClientOriginalName();
        //     // Ubah spasi menjadi - di dalam file name image
        //     $charFileName = str_replace(" ", "-", $filename);
        //     //Simpan gambar ke storage
        //     $image->storeAs('outstocks', $charFileName, 'public');

        //     $outstock->outstock_image = "outstocks/".$charFileName;

        // } 


        $ubah = $outstock->save();

        if($ubah){
            return redirect()->route('outstock.index')->with('info', 'outstock updated successfully');
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
        $outstock = Outstock::find($id);
        $hapus = $outstock->delete();

        if($hapus){
            return redirect()->route('outstock.index')->with('warning', 'outstock deleted successfully');
        }
    }
}
