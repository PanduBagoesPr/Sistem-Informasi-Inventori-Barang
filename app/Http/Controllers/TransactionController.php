<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
// use Excel;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 10;
        $data['products'] = Product::pluck('product_name', 'product_id');
        $data['transactions'] = Transaction::with(['product'])->paginate($paginate);
        return view('transaction.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::where('product_status', 'Active')->pluck('product_name', 'product_id');
        return view('transaction.create', $data);
    }

    public function import()
    {
        return view('transaction.import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $messages = [
            'product_id.required' => 'Produk wajib diisi',
            'total_out_stock.required' => 'Stok Keluar wajib diisi',
            'trxtion_date.required' => 'Tanggal wajib diisi'
        ];
        $request->validate([
            'product_id' => 'required',
            'total_out_stock' => 'required',
            'trxtion_date' => 'required'
        ], $messages);

        // Ambil data harga dari table product berdasarkan inputan product_id
        $data_product = Product::find($request->product_id);
        $harga_product = $data_product->product_price;
        
        // Simpan ke database
        $trxtion = new Transaction;
        $trxtion->product_id = $request->product_id;
        $trxtion->trxtion_code = $request->trxtion_code;
        $trxtion->total_out_stock = $request->total_out_stock;
        $trxtion->trxtion_date = $request->trxtion_date;
        $trxtion->trxtion_price = $harga_product;
        
        $simpan = $trxtion->save();

        if($simpan){
            return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
        }
    }
    public function store_import(Request $request)
    {
        $messages = [
            'file_trx.required' => 'File wajib diisi',
            'file_trx.mimes' => 'File hanya boleh berformat .xls atau .xlsx'
        ];
        $request->validate([
            'file_trx' => 'required|mimes:xls,xlsx'
        ], $messages);

        $path = $request->file('file_trx')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'product_id' => $value->product_id, 
                    'trxtion_date' => $value->trxtion_date, 
                    'trxtion_price' => $value->trxtion_price
                ];
            }

            if(!empty($arr)){
                Transaction::insert($arr);
            }
        }

        return redirect()->route('transaction.index')->with('success', 'Transaction imported successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['products'] = Product::pluck('product_name', 'product_id');
    
        $data['transaction'] = Transaction::find($id);
        return view('transaction.edit', $data);
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
        // $messages = [
        //     'product_id.required' => 'Produk wajib diisi',
        //     'trxtion_sold.required' => 'Sold wajib diisi',
        //     'trxtion_date.required' => 'Tanggal wajib diisi'
        // ];
        // $request->validate([
        //     'product_id' => 'required',
        //     'trxtion_sold' => 'required',
        //     'trxtion_date' => 'required'
        // ], $messages);

        // Ambil data harga dari table product berdasarkan inputan product_id
        $data_product = Product::find($request->product_id);
        $harga_product = $data_product->product_price;
        
        // Simpan ke database
        $trxtion = Transaction::find($id);
        $trxtion->product_id = $request->product_id;
        $trxtion->trxtion_code = $request->trxtion_code;
        $trxtion->total_out_stock = $request->total_out_stock;
        $trxtion->trxtion_date = $request->trxtion_date;
        $trxtion->trxtion_price = $harga_product;
        
        $ubah = $trxtion->save();

        // if($ubah){
        //     return redirect()->route('transaction.index')->with('info', 'Transaction updated successfully.');
        // }
        if($ubah){
            return redirect(url('transaction'))->with('info', 'Transaction updated successfully');
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
        $trxtion = Transaction::find($id);
        $hapus = $trxtion->delete();

        if($hapus){
            return redirect()->route('transaction.index')->with('warning', 'Transaction deleted successfully');
        }
    }

    public function download()
    {
        // $field = "transactions.trxtion_id as Id_Transaksi, products.product_name as Nama_Produk, 
        // transactions.trxtion_sold as Produk_Terjual,  
        // transactions.trxtion_date as Tanggal_Transaksi,
        // transactions.trxtion_price as Total";

        // $data = Transaction::selectRaw($field)
        //         ->join('products', 'transactions.product_id', '=', 'products.product_id')
        //         ->get()->toArray();

        // // dd($data);

        // return Excel::create('nama_file_trxtion', function($excel) use($data) {

        //     $excel->sheet('nama_sheet_trxtion', function($sheet) use($data){
                
        //         $sheet->fromArray($data);

        //     });

        // })->download();

        // $field = "transactions.trxtion_id as Id_Transaksi, products.product_name as Nama_Produk, 
        // transactions.trxtion_sold as Produk_Terjual,  
        // transactions.trxtion_date as Tanggal_Transaksi,
        // transactions.trxtion_price as Total";

        // $data = Transaction::selectRaw($field)
        //         ->join('products', 'transactions.product_id', '=', 'products.product_id')
        //         ->get()->toArray();

        // // Send data to the view using loadView function of PDF facade
        // $pdf = \PDF::loadView('pdf.transactions', $data);
        // // If you want to store the generated pdf to the server then you can use the store function
        // $pdf->save(storage_path().'_filename.pdf');
        // // Finally, you can download the file using download function
        // return $pdf->download('transactions.pdf');

        $trxtion = Transaction::all();
 
    	$pdf = PDF::loadview('transaction.trxtion_pdf',['trxtion'=>$trxtion]);
    	return $pdf->stream('laporan-trxtion.pdf');
    	// return $pdf->download('laporan-trxtion-pdf');
    }
}
