<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Outfit&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <style>
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <img class="ftmm" src="{{ asset('img/images_login/sidecard2.svg') }}">
    <div class="container">
        <div class="sidebox"></div>
        <div class="logininfo">
            <div class="formbox">
                <form action="{{ route('forgot-password.submit') }}" method="POST">

                    @csrf
                    <h1>Lupa Password?</h1>
                    <h2>Jangan panik, kami akan mengirimkan instruksi untuk mereset password anda</h2>
                    <div class="inputbox">
                        <h3 class="inputlabel">Email*</h3>
                        <input type="email" name="email" placeholder="Masukkan email yang anda gunakan">
                        <img class="right-icon" src="{{ asset('img/images_login/@-icon.svg') }}">
                        @if($errors->has('email'))
                            <div class="notif-box">
                                <a class="notif-text">
                                    Maaf kami tidak bisa menemukan email anda. Kirim kembali email yang anda gunakan saat proses pembuatan akun
                                </a> 
                                <img class="left-icon" src="{{ asset('img/images_login/warn-icon.svg') }}">                                         
                            </div>
                        @endif
                    </div>

                    @if(session('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif

                    <button type="submit" class="back-login">Kirim Verifikasi Email</button>

                    <div class="inputbox">
                        <a class="back-login-white" style="text-decoration:none" href="{{ route('login') }}">
                            <img class="img" src="{{ asset('img/images_login/arrow-icon.svg') }}" width="20" height="16" style="margin-right: 10px;">
                            Kembali ke halaman login
                        </a>
                    </div>

                    <div class="register">
                        <p>Belum punya akun?
                            <a href="{{ route('sign-up') }}" class="register-link">Daftar</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
