<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\produk;
use App\trans_reseller;
use Illuminate\Support\Facades\Auth;

class resellercontroller extends Controller
{
    public function index(){
    	$produk = produk::paginate(8);
    	$pesanan = trans_reseller::where('id_u', Auth::id())->get();
    	$i=0;
		foreach ($pesanan as $t) {
			$pesanan[$i]->produk;
			$i++;
		}
		//dd($pesanan[0]->produk->nama_p);
    	return view('/reseller',['produk' => $produk ,'pesanan' => $pesanan]);
    }

    public function rsearch(Request $request){
    	$this->validate($request,[
           'search' => 'required']);
        $produk = produk::where('nama_p','like','%'.$request->search.'%')->paginate(5);
        $pesanan = trans_reseller::where('id_u', Auth::id())->get();
    	$i=0;
		foreach ($pesanan as $t) {
			$pesanan[$i]->produk;
			$i++;
		}
		//dd($pesanan[0]->produk->nama_p);
    	return view('/reseller',['produk' => $produk ,'pesanan' => $pesanan]);
    }

    /* 
    @param Illuminate\Http\Request;
    @return cookie
	*/
    public function addproduk(Request $request){
    	$produk = produk::find($request->OP);
    	$this->validate($request,['qty' => 'required|numeric|min:1|max:'.$produk->qty_p]);
    	$OP=[$request->OP => [$request->qty]];
		$AP=session()->get('$cart');
		//mendapatkan barang yg akan ditambahkan dan mendapatkan isi shop cart
		if($AP==Null){
			session()->put('$cart',$OP);
			//$OP=session()->get('$cart');
			return redirect('/reseller');
			//cek apakah shop cart kosong dan mengisi shop cart dengan nilai baru
		}
		elseif(isset($AP[$request->OP])){
			$AP[$request->OP][0] = $request->qty;
			session()->put('$cart',$AP);
			//$OP=session()->get('cart');	
			return redirect('/reseller');
			//mengecek apakah barang sudah ada di shop cart
			//jika ada menambah jumlah barang sesuai dengan barang yang ditambahkan
		}
		
		if(!isset($AP[$request->OP])){
			$AP[$request->OP] = [$request->qty];
			session()->put('$cart',$AP);			
			return redirect('/reseller');
			//mengecek apakah barang tidak ada pada shopcart
			//jika tidak ada menambah barang baru
		}
    }

    public function hapuspro($hapus){
		//mengganti nilai session dengan array
		$value = session()->get('$cart');
		$nex = arr::pull($value,$hapus);
		//mengambil nilai dan menghapus
		session()->put('$cart',$value);
		return redirect('/reseller');
		
	}

    public function show(){
    	return redirect('/reseller');
    }

    public function transaksi(){
    	$value = session()->get('$cart');
    	$total = 0;
    	foreach ($value as $key) {
    		$produk = produk::find(array_search($key,$value));
    		//dd($produk);
    		$total = $total + ($key[0] * $produk->harga_r);
    	}	
    	
    	return view('/layouts.transaksi',['total' => $total]);
    }

    public function addtrans(Request $request){
    	$this->validate($request,[
           'atasnama' => 'required',
           'alamat' => 'required']);
    	if (session('$cart') == null){
	    	return view('/transaksi');
    	}
    	else{
    		$i=0;
    		$value = session()->get('$cart');
	    	foreach ($value as $key) {
	    		trans_reseller::create([
				'id_u' => Auth::id(),
			    'atas_nama' => $request->atasnama,
			    'alamat' => $request->alamat,
			    'id_p' => array_keys($value)[$i], 
			    'tr_qty' => $key[0],
			    'status' => 'Sedang Ditinjau',
				]);
				$i++;
	    	}
	    	return redirect('/reseller');
	    	session::flush();
    	}		
    }

    public function rkonfirm(Request $request){
    	$this->validate($request,['status' => 'required']);
    	$transaksi = trans_reseller::find($request->id);
        $transaksi->status = $request->status;
        $transaksi->save();
    	return redirect('/reseller');
    }



}
