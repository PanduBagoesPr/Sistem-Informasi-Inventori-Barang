<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Instock;
use App\Outstock;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $trxtion = "SELECT MONTHNAME(trxtion_date) as month, count(*) as total FROM transactions GROUP BY MONTHNAME(trxtion_date) ORDER BY MONTH(trxtion_date)";

        $transactions = DB::select($trxtion);

        $months = [];
        $totals = [];

        foreach($transactions as $transaction){
            $months[] = $transaction->month;
            $totals[] = $transaction->total;
        }

        $data['chart'] = [
            'months' => $months,
            'totals' => $totals
        ];

        // Latest Transaction
        $data['lt'] = Transaction::orderBy('created_at', 'desc')->limit(5)->get();
        // dd($data['lt']);
        return view('dashboard', $data);

       

        //Count Stock
        $category = Category::all();
        $data['page'] = 'dashboard';
        $data['data_count'] = count($category);

        // $datas = DB::table('instocks')->where('instock_total')->orWhere('instock_total')->get();
        // return view('dashboard', $datas);

        return view('dashboard',$data);
    }
}
