@extends('layouts.app')

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

                    @if(Auth::user()->aktif == 1 && Auth::user()->role == 'reseller')
                        <script type="text/javascript">window.location.href="{{route('reseller.index')}}";</script>
                    @elseif(Auth::user()->aktif == 1 && Auth::user()->role == 'admin')
                        <script type="text/javascript">window.location.href="{{route('admin.index')}}";</script>
                    @elseif(Auth::user()->aktif == 1 && Auth::user()->role == 'owner')
                        <script type="text/javascript">window.location.href="{{route('owner.index')}}";</script>
                    @else
                        </br>
                        <a>mohon maaf akun ada belum aktif,</a>
                        <a>mohon tunggu admin untuk meng aktifkan</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
