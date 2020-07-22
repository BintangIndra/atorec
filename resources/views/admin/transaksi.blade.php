@extends('layouts.app')

@section('menu')
<a class="dropdown-item" href="{{ route('produk_show') }}"> Kelola Produk </a>
<a class="dropdown-item" href="{{ route('admin.index') }}" > Kelola User </a>
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

                    <table class="table">
                    <thead>
                      <tr>
                        <th>Nama Reseller</th>
                        <th>Alamat</th>
                        <th>Jumlah pesanan</th>
                        <th>Nama produk</th>
                        <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksi as $a)
                        <tr>
                        <td>{{$a->atas_nama}}</td>
                        <td>{{$a->alamat}}</td>
                        <td>{{$a->tr_qty}}</td>
                        <td>{{$a->produk->nama_p}}</td>
                        <td><form action="{{ route('transaksi_kirim') }}" method="POST" name="kirim" id="kirim">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{$a->id}}" form="kirim">
                            @if($a->status == "Sedang Ditinjau")
                            <select name="status" id="status" form="kirim">
                                <option value="{{$a->status}}">Sedang Ditinjau</option>
                                <option value="Telah Dikirim">Telah Dikirim</option>
                            @else
                                <label>{{$a->status}}</label>
                            @endif
                            <td><button class="btn btn-danger" type="submit" value="submit" form="kirim">Ubah</button></td>
                        </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection