@extends('layouts.app')

@section('head')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection
    
@section('menu')
<a class="dropdown-item" href="{{ route('owner.index') }}"> Kelola anggota </a>
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
                    <p>transaksi chart anda</p>
                    <div class="dropdown">
                      <button class="dropdown-toggle" data-toggle="dropdown">
                        pilih bulan
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '1']) }}">
                        Januari
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '2']) }}">
                        Febuari
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '3']) }}">
                        Maret
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '4']) }}">
                        April
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '5']) }}">
                        Mei
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '6']) }}">
                        Juni
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '7']) }}">
                        July
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '8']) }}">
                        Agustus
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '9']) }}">
                        September
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '10']) }}">
                        Oktober
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '11']) }}">
                        November
                        </a>
                        <a class="dropdown-item" 
                        href="{{ route('owner.transaksi',['bulan' => '12']) }}">
                        Desember
                        </a>
                      </div>
                    </div>
                    @if(isset($jumlah[0]))  
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Tanggal', 'Transaksi'],
                          @foreach($jumlah as $s)
                          [{{intval(explode("-", $s->waktu)[2])}},  {{$s->total_sales}}],
                          @endforeach
                        ]);

                        var options = {
                          title: 'jumlah transaksi per 1 bulan',
                          curveType: 'function',
                          legend: { position: 'bottom' }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                        chart.draw(data, options);
                      }
                    </script>

                    <div id="curve_chart" style="width: 450px; height: 250px"></div>
                    @else
                    <p>pada bulan yang anda pilih belum ada transaksi</p>
                    @endif
                    <h4>export transaksi bulan {{date("F",mktime(0,0,0,$bulan+1,0,0))}}</h4>
                    <a href="{{ route('owner.export',['bulan'=> $bulan]) }}" class="btn btn-primary">Export Excel</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection