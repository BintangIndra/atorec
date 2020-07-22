<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\produk;
use App\trans_reseller;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function index(){
    	$anggota = User::where('role','reseller')->get();
    	return view('admin.index',[ 'anggota' => $anggota]);
    }

    public function aktivasi(Request $request){
    	$anggota = User::find($request->id_u);
    	$anggota->aktif = $request->status_u;
    	$anggota->save();
    	return redirect('/admin');
    }

    public function show($admin){
    	return $this->index();
    }

    public function proindex(){
    	$produk = produk::paginate(15);    
    	return view('admin.produk',['produk' => $produk]);
    }

    public function destroy($admin)
    {
    	$produk = produk::find($admin);
        $produk->delete();
        return redirect('admin.produk');
    }

    public function update(Request $request,$admin){
        $produk = produk::find($admin);
        $produk->nama_p = $request->nama_p;
        $produk->harga = $request->harga;
        $produk->harga_r = $request->harga_r;
        $produk->qty_p = $request->qty_p;
        $produk->img_url = $request->img_url;
        $produk->save();
        return redirect('admin.produk');
    }

    public function store(Request $request){
        produk::create([
        'nama_p' => $request->nama_p,
        'harga' => $request->harga,
        'harga_r' => $request->harga_r,
        'qty_p' => $request->qty_p,
        'img_url' => $request->img_url,
        ]);
        return redirect('admin.produk');
    }

    public function psearch(Request $request){
        $produk = produk::where('nama_p','like','%'.$request->search.'%')->paginate(5);
        return view('admin.produk',['produk' => $produk]);
    }

    public function traindex(){
        $transaksi = trans_reseller::all();
        return view('admin.transaksi',['transaksi' => $transaksi]);
    }

    public function trakirim(Request $request){
        $transaksi = trans_reseller::find($request->id);
        $transaksi->status = $request->status;
        $transaksi->save();
        return redirect('admin.transaksi');
    }
}
