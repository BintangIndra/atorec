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
                    @if(isset($jumlah[0]))
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Tanggal', 'Transaksi'],
                          @foreach($jumlah as $s)
                          [{{$s->created_at->format('d')}},  {{$s->total_sales}}],
                          @endforeach
                        ]);

                        var options = {
                          title: 'Jumlah Transaksi bulan  ini',
                          curveType: 'function',
                          legend: { position: 'bottom' }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                        chart.draw(data, options);
                      }
                    </script>

                    <div id="curve_chart" style="width: 450px; height: 250px"></div>
                    @else
                    <p>Bulan ini belum ada transaksi</p>
                    @endif

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection