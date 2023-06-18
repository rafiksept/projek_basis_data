<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Email Verification</title>
</head>
<body>
    <h2>Email Verification</h2>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for registering. Please click the button below to verify your email address:</p>
    <a href="{{ $verificationLink }}">Verify Email</a>
    <br>
    <p>If the button doesn't work, you can also copy and paste the following URL into your web browser:</p>
    <p>{{ $verificationLink }}</p>
    <br>
    <p>Thank you,</p>
    <p>Your Website Team</p>
</body>
</html>
