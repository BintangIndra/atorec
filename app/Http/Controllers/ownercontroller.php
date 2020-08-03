<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\trans_reseller;

class ownercontroller extends Controller
{
	public function index(){
    	$anggota = User::paginate(10);
    	return view('owner.index',[ 'anggota' => $anggota]);
    }

    public function transaksi(){
        $jumlah = trans_reseller::select('created_at', trans_reseller::raw('SUM(tr_qty) as total_sales'))
        		->wheremonth('created_at', date('m'))
        		->groupBy('created_at')
        		->get();
        //dd($jumlah);
        return view('owner.transaksi',['jumlah' => $jumlah]);
    }
}
