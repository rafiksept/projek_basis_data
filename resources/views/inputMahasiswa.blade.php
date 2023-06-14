<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action = "/actionInputMahasiswa">
        @csrf
        <input type="text" name="nim" placeholder="masukkan nim">
        <input type="text" name="nama" placeholder="masukkan nama">
        <input type="text" name="angkatan" placeholder="masukkan angkatan">
        <input type="text" name="prodi" placeholder="masukkan prodi">

        <button type="submit">Submit Data</button>
    </form>
</body>
</html>