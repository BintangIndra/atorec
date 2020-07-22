@extends('layouts.app')

@section('menu')
<a class="dropdown-item" href="{{ route('admin.index') }}" > Kelola User </a>
<a class="dropdown-item" href="{{ route('transaksi_show') }}"> Kelola Transaksi </a>
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
                        <a>welcome</a>
                    @else
                        </br>
                        <a>mohon maaf akun ada belum aktif,</a>
                        <a>mohon tunggu admin untuk meng aktifkan</a>
                    @endif
                    <h2>Produk</h2>
                    <div class="row">                    
                        <div class="col-sm-7">
                            <a class="btn btn-primary" href="#Tambah" data-toggle="modal"> Tambah Produk </a>
                        </div>
                        <div class="col-sm-5">
                            <form method="post" action="{{route('produk_search') }}">
                                @csrf   
                                <input type="text" name="search">
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    

                    <table class="table">
                    <thead>
                      <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>harga</th>
                        <th>harga reseller</th>
                        <th>jumlah produk</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($produk as $pro)
                        <tr>
                        <!-- produk -->
                        <div class="col-md-3">
                        <div class="thumbnail">
                            <td><a href="{{$pro->img_url}}">  
                            <img src="{{$pro->img_url}}" style="width:50px"></a></td>
                            <div class="caption">
                            <td>{{$pro->nama_p}}</br></td>
                            <td>harga : Rp.{{$pro->harga}}</br></td>
                            <td>harga reseller : Rp.{{$pro->harga_r}}</br></td>
                            <td>jumlah produk  : {{$pro->qty_p}}</br></td>
                            <td><form action="{{route('admin.destroy',['admin' => $pro->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" style="width:70px">    Hapus </button>
                            </form></td>
                            <td>
                                <a href=#{{$pro->nama_p}} data-toggle="modal" class="btn btn-primary" style="width:50px">edit</a></td>
                            </div>
                            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=#{{$pro->nama_p}}> Pesan produk </button>-->
                        </div>
                        </div>
                        </tr>
                        @endforeach
                    </tbody>
              </table>
                        @foreach($produk as $pro)
                        <!-- The Modal -->
                        <div class="modal" id={{$pro->nama_p}}>
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Produk</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              
                              <!-- Modal body -->
                              <div class="modal-body">
                                <img src="{{$pro->img_url}}" width="200px" height="200px"></img>
                                <form method="POST" action="{{route('admin.update',['admin' => $pro->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    Nama Produk:
                                    {{$pro->nama_p}}</br>
                                    <input type="text" id="nama_p" name="nama_p">
                                    </br>
                                    harga produk:
                                    {{$pro->harga}}</br>
                                    <input type="number" id="harga" name="harga">
                                    </br>
                                    harga Reseller:
                                    {{$pro->harga_r}}</br>
                                    <input type="number" id="harga_r" name="harga_r">
                                    </br>
                                    Jumlah Produk :
                                    {{$pro->qty_p}}</br>
                                    <input type="number" id="qty_p" name="qty_p">
                                    </br>
                                    URL Gambar :
                                    {{$pro->img_url}}</br>
                                    <input type="text" id="img_url" name="img_url">
                                    </br>
                                    <button type="submit" class="btn btn-primary" value="submit">Edit Produk</button>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- The Modal -->
<div class="modal" id="Tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Tambah Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

      <!-- Modal body -->
    <div class="modal-body">
        <form method="POST" action="{{route('admin.store')}}">
            @csrf
            Nama Produk:
            </br>
            <input type="text" id="nama_p" name="nama_p">
            </br>
            harga produk:
            </br>
            <input type="number" id="harga" name="harga">
            </br>
            harga Reseller:
            </br>
            <input type="number" id="harga_r" name="harga_r">
            </br>
            Jumlah Produk :
            </br>
            <input type="number" id="qty_p" name="qty_p">
            </br>
            URL Gambar :
            </br>
            <input type="text" id="img_url" name="img_url">
            </br>
            <button type="submit" class="btn btn-primary" value="submit">Tambah</button>
        </form>
    </div>
      <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>

    </div>
  </div>
</div>
