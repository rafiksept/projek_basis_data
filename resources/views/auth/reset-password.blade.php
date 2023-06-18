<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Outfit&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/style_login.css') }}" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <img class="ftmm" src="{{ asset('img/images_login/sidecard2.svg') }}">
    <div class="container">
        <div class="sidebox"></div>
        <div class="logininfo">
            <div class="formbox">
                <form action="{{ route('reset-password.submit') }}" method="POST">
                    @csrf
                    <h1>Reset Password</h1>
                    <div class="inputbox">
                        <h3 class="inputlabel">Password Baru</h3>
                        <input type="password" name="password" placeholder="Enter your new password" required>
                        <img class="right-icon" src="{{ asset('img/images_login/lock-icon.svg') }}">
                    </div>
                    <div class="inputbox">
                        <h3 class="inputlabel">Konfirmasi Password</h3>
                        <input type="password" name="password_confirmation" placeholder="Confirm your new password" required>
                        <img class="right-icon" src="{{ asset('img/images_login/lock-icon.svg') }}">
                    </div>
                    <div class="login-button">
                        <button type="submit" class="btn">Reset Password</button>
                    </div>
                    <div class="inputbox">
                        <a class="back-login-white" style="text-decoration:none" href="{{ route('login') }}">
                            <img class="img" src="{{ asset('img/images_login/arrow-icon.svg') }}" width="20" height="16" style="margin-right: 10px;">
                            Kembali ke halaman login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
