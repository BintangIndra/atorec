<div class="modal fade" id="cart">
    <div clasS="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <p class="modal-title">Shop Cart</p>
        <button type="button" class="close" data-dismiss="modal">&times;</button>                        
    </div>
    <div class="modal-body">
        @if(session('$cart'))
            @foreach(session('$cart') as $ca=>$jumlah)
                @foreach($produk as $pro)
                    @if($pro->id==$ca)
                    <div><img src="{{$pro->img_url}}" width="75px" height="75px"></br>
                    {{$pro->nama_p}}</br>
                    @.Rp{{$pro->harga_r}}</br>
                    jumlah = {{$jumlah[0]}}</br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal"data-target=#{{$pro->nama_p}}> edit jumlah </button>
                    <a href="{{route('reseller.hapus',['hapus' => $pro->id]) }}"><button type="button" class="btn btn-primary"> Hapus </button></a>
                    <div>
                    @endif
                @endforeach
            @endforeach
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
        @if(session('$cart'))
        <a href="{{ route('transaksiR')}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transaksi"> Order </button></a>
        @endif
    </div>
    </div>
</div>