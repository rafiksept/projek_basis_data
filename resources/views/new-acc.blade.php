<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Outfit&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/style_login.css') }}" rel="stylesheet" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Created</title>
    </head>
    <body>
        <img class="ftmm" src="{{ asset('img/sidecard2.svg') }}">
        <div class="container">
            <div class="sidebox">
            </div>
            <div class="new-acc">
                <h1>Selamat<br>Akun Anda Telah<br>Berhasil Dibuat!</h1>
                <h2>Verifikasi akun anda pada email yang digunakan pada proses pendaftaran</h2>
                <a class="back-login" style="text-decoration:none;" href="{{ route('login')}}">
                    <img class="img" src="{{ asset('img/arrow-icon.svg') }}" width="20" height="16" style="margin-right: 10px;">
                    Kembali ke halaman login
                </a>
            </div>
</div>
    </body>
</html>