<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aplikasi Toko Online dan Reseller controller</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #000;
                color: #982;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                scroll-behavior: smooth;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #982;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    ATOReC
                </div>
                <p>Aplikasi Toko Online dan Reseller Control</p>
                <div class="links">
                    <a href="#Features">Features</a>
                    <a href="#Profile">Profile</a>
                    <a href="#Contact">Contact</a>
                    <a href="#About">About</a>
                </div>
            </div>
        </div>
        <div class="content">
            <h1 id="Features">Features</h1>
            <p>
                Tujuan dari dibuatnya aplikasi ini adalah sebagai toko online branding produk sekaligus mempermudah pengurusan reseller.</p></br>
                <p>
                feature yang dapat ditemukan pada aplikasi ini adalah:</br>
                1.memiliki 3 role yaitu : owner,admin,reseller</br>
                2.dilengkapi dengan Authentifikasi dan authorisasi</br>
                </p>

                <h2>Reseller</h2>
                <p>
                1.Sistem register reseller dengan pola pengizinan pengaktifan oleh admin</br>
                2.sistem beli product oleh reseller dan guest</br>
                3.search produk</br>
                4.shop cart</br>
                5.konfirmasi barang pesanan yang telah diterima</br>
                </p>

                <h2>Admin</h2>
                <p>
                1.aktivasi reseller</br>
                2.Menambah edit dan hapus produk</br>
                3.search produk</br>
                4.Mengelola transaksi apakah barang sudah dikirim</br>
            </p>
            <h2>Next Update</h2>
            <p>
                1.Menambah feature owner:</br>
                - menampilkan data transaksi secara statistik</br>
                - menampilkan data persebaran reseller dengan maps</br>
                - menghitung modal, laba dll</br>
                2.feature transaksi menggunakan kartu kredit</br>
                3.feature konfirmasi pengiriman barang oleh kurir</br>
                4.push notification
            </p></br></br></br>
            <h1 id="Profile">Profile</h1>
            <img src="2222.jpg" height="170px" width="140px"><br>
            <table style="margin-right: auto; margin-left: auto;text-align:left;">
                <tr>
                    <th>Nama</th>
                    <td>: Bintang Indra Wijaya</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: Tanjung Anom Rt 1 Rw 5, Sukoharjo, Grogol, Kwarasan</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>: Laki-laki</td>
                </tr>
                <tr>
                    <th>TTL</th>
                    <td>: Sukoharjo,28 Agustus 1997</td>
                </tr>
                <tr>
                    <th>Riwayat Pendidikan</th>
                    <td>-Sd Muhammadiyah 2 Surakarta<br>
                    -SMP Al Islam Surakarta<br>
                    -SMK Al Islam Surakata<br>
                    -Universitas Muhammadiyah Surakarta<br>
                    </td>
                </tr>
            </table></br></br></br>
            <h1 id="Contact">Contact</h1>
            <table style="margin-right: auto; margin-left: auto;text-align:left;">
                <tr>
                    <th>Email</th>
                    <td>: bintangindrawijaya@gmail.com</td>
                </tr>
                <tr>
                    <th>Whatsapp</th>
                    <td>: 082135377639</td>
                </tr>
            </table>
            </br></br></br>
            <h1 id="About">About</h1>
                <p>
                    Aplikasi ini dibuat dengan menggunakan laravel versi 7.1<br>
                    dengan menggunakan local host xampp versi V.3.2.4<br>
                    Maksud pembuatan aplikasi ini adalah sebagai portofolio untuk pendamping
                    surat lamaran kerja<br>

                    Untuk mengakses Aplikasi ini gunakan akun berikut:<br>
                    admin:<br>
                    Email : susanto@tanto.com<br>
                    Password : keanureeve<br>
                </p>
            </br></br></br>
        </div>
    </body>
</html>