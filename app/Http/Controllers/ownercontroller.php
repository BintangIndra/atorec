<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\trans_reseller;
use App\Exports\transaksireselEX;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class ownercontroller extends Controller
{
	public function index(){
    	$anggota = User::paginate(10);
    	return view('owner.index',[ 'anggota' => $anggota]);
    }

    public function transaksi($bulan){
        if ($bulan == "agda7") {
            $bulan = date('m');
        }
        $jumlah = trans_reseller::select('created_at', trans_reseller::raw('SUM(tr_qty) as total_sales'))
        		->wheremonth('created_at', $bulan)
        		->groupBy('created_at')
        		->get();
        //dd($bln);
        return view('owner.transaksi',['jumlah' => $jumlah, 'bulan' => $bulan]);
    }

    public function export_excel(Request $request){
        return Excel::download(new transaksireselEX($request->bulan), 'transaksi.xlsx');
    }
}
