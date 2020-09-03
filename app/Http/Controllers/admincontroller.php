<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\produk;
use App\trans_reseller;
use Illuminate\Support\Facades\Auth;
use App\Mail\send_produk;
use Mail;

class admincontroller extends Controller
{
    public function index(){
    	$anggota = User::where('role','reseller')->get();
    	return view('admin.index',[ 'anggota' => $anggota]);
    }

    public function aktivasi(Request $request){
        $this->validate($request,[
           'status_u' => 'required']);
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
        $this->validate($request,[
           'nama_p' => 'required',
           'harga' => 'required|numeric',
           'harga_r' => 'required',
           'qty_p' => 'required',
           'img_url' => 'required']);
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
        $this->validate($request,[
           'nama_p' => 'required',
           'harga' => 'required|numeric',
           'harga_r' => 'required',
           'qty_p' => 'required',
           'img_url' => 'required']);
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
        $this->validate($request,['search' => 'required']);
        $produk = produk::where('nama_p','like','%'.$request->search.'%')->paginate(5);
        return view('admin.produk',['produk' => $produk]);
    }

    public function traindex(){
        $transaksi = trans_reseller::orderBy('status','asc')->paginate(10);
        return view('admin.transaksi',['transaksi' => $transaksi]);
    }


    public function trakirim(Request $request){
        $this->validate($request,['status' => 'required']);
        $transaksi = trans_reseller::find($request->id);
        $produk = produk::find($transaksi->produk->id);
        $produk->qty_p = $produk->qty_p - $transaksi->tr_qty;
        $transaksi->status = $request->status;
        $email = new send_produk($transaksi);
        Mail::to($transaksi->user->email)->send($email);
        $transaksi->save();
        $produk->save();
        return redirect('admin.transaksi');
    }
}