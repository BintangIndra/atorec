@extends('layouts.shopcart')
@extends('layouts.app')

@section('menu')
<a class="dropdown-item" data-toggle="modal" data-target=#cart> Pesan produk </a>
<a class="dropdown-item" data-toggle="modal" data-target=#pesanan> Barang Pesanan Anda </a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @if(Auth::user()->aktif == 1)
                    <h2>Produk</h2>
                    <form method="post" action="{{route('rsearch') }}">
                        @csrf   
                        <input type="text" name="search">
                        <button type="submit">Search</button>
                    </form>
                    <div class="row">
                    @foreach($produk as $pro)

                        <!-- produk -->
                        <div class="col-md-3">
                        <div class="thumbnail">
                          <a href="{{$pro->img_url}}">
                            <img src="{{$pro->img_url}}" style="width:100%">
                            <div class="caption">
                            Nama  : {{$pro->nama_p}}</br>
                            harga : Rp.{{$pro->harga}}</br> 
                            harga reseller : Rp.{{$pro->harga_r}}</br>
                            jumlah produk  : {{$pro->qty_p}}</br>
                            </a>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=#{{$pro->nama_p}}> Pesan produk </button>
                        </div>
                      </div>



                        <!-- The Modal -->
                        <div class="modal" id="{{$pro->nama_p}}">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Masukkan ke Keranjang</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <img src="{{$pro->img_url}}" width="200px" height="200px">
                                <p>{{$pro->nama_p}}</p>
                                <p>harga reseller : Rp.{{$pro->harga_r}}</p>
                                <form method="post" action="{{ route('addproduk') }}">
                                    @csrf
                                    <input type="number" name="qty">
                                    <input type="hidden" name="OP" value={{$pro->id}}>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Masukkan') }}
                                    </button>
                                </form>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>
                    @endforeach
                    <div class="float">{{ $produk->links() }}</div>
                    <div>
                @else
                    </br>
                    <a>mohon maaf akun anda belum aktif,</a>
                    <a>mohon tunggu admin untuk meng aktifkan</a>
                @endif                        
                </div>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="pesanan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Barang Pesanan Anda</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

      <!-- Modal body -->
    <div class="modal-body">
        <table class="table">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Atas Nama</th>
                <th>Alamat</th>
                <th>Jumlah pemesanan</th>
                <th>Status Pesanan</th>
              </tr>
            </thead>
            <tbody>
            @foreach($pesanan as $t)
                <tr>
                <td>{{$t->produk->nama_p}}</td>
                <td>{{$t->atas_nama}}</td>
                <td>{{$t->alamat}}</td>
                <td>{{$t->tr_qty}}</td>
                <td>
                <form action="{{ route('rkonfirm') }}" method="POST" name="konfirmasi" id="konfirmasi">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$t->id}}" form="konfirmasi">
                    @if($t->status == "Telah Dikirim")
                    <select name="status" id="status" form="konfirmasi">
                        <option value="{{$t->status}}">Telah Dikirim</option>
                        <option value="Selesai">Telah Diterima</option>
                        <td><button class="btn btn-danger" type="submit" value="submit" form="konfirmasi">Ubah</button></td>
                    @else
                        <label>{{$t->status}}</label>
                    @endif                                                        
                </form></td>

                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
      <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

    </div>
  </div>
</div>
@endsection