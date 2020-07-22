@extends('layouts.app')

@section('menu')
<a class="dropdown-item" href="{{ route('produk_show') }}"> Kelola Produk </a>
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

                    <table class="table">
                    <thead>
                      <tr>
                        <th>Nama Reseller</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Nomor Hp</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($anggota as $a)
                        <tr>
                        <td>{{$a->nama_u}}</td>
                        <td>{{$a->alamat_u}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->no_hp}}</td>
                        <td><form action="{{ route('admin.aktivasi') }}" method="POST" name="aktivasi" id="aktivasi">
                            @csrf
                            <select name="status_u" id="status_u">
                                @if($a->aktif == 0)
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                @else
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>                                
                                @endif
                            </select>
                            <input type="hidden" id="id_u" name="id_u" value={{$a->id}}>
                            <td><button class="btn btn-danger" type="submit" value="submit" form="aktivasi">Ubah</button></td>
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
