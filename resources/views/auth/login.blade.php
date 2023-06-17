<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Outfit&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <img class="ftmm" src="{{ asset('img/images_login/sidecard2.svg') }}">
    <div class="container">
        <div class="sidebox"></div>
        <div class="logininfo">
            <div class="formbox">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="teks-log">
                        <img src="{{ asset('img/images_login/ftmm-logo.png') }}">
                        <h1 class="teks-h1-log">Selamat Datang!</h1>
                        <h2 class="teks-h2-log">Website ini digunakan untuk menilai Capaian Pembelajaran Prodi maupun Mahasiswa</h2>
                    </div>
                    <div class="alert-box">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong style="font-size: 16px;">{{ $errors->first('message') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="inputbox">
                        <input type="text" name="email" placeholder="Email/NIK" required autofocus>
                        <img class="right-icon-log" src="{{ asset('img/images_login/@-icon.svg') }}">
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" placeholder="Password" required>
                        <img class="right-icon-log" src="{{ asset('img/images_login/lock-icon.svg') }}">
                    </div>
                    <div class="rememberme">
                        <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Akun</label>
                        <a href="{{ route('forget-password') }}">Lupa Sandi?</a>
                    </div>
                    <div class="login-button">
                        <button type="submit" class="btn">Login</button>
                    </div>
                    <div class="register">
                        <p>Belum punya akun? <a href="{{ route('sign-up') }}" class="register-link">Daftar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
