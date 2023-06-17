<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Outfit&display=swap" rel="stylesheet" />
  <link href="{{ asset('css/style_login.css') }}" rel="stylesheet" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Sign Up</title>
</head>
<body>
  <img class="ftmm" src="{{ asset('img/sidecard2.svg') }}">
  <div class="container">
    <div class="sidebox">
    </div>
    <div class="logininfo">
      <div class="formbox">
        <form action="{{ route('sign-up.process') }}" method="POST">
          @csrf    
          <div class="teks">
            <h1 class="teks-h1">Buat Akun</h1>
            <h2 class="teks-h2">Buat akun penilaian CPL Anda!</h2>
          </div>
          <div class="inputbox">
            <h3 class="inputlabel">Nama*</h3>
            <input type="text" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
          </div>

          <div class="inputbox">
            <h3 class="inputlabel">Email*</h3>
            <input type="email" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
          </div>

          <div class="inputbox">
            <h3 class="inputlabel">Peran*</h3> 
            <select id="peran" name="peran" required>
              <i class="bx bx-chevron-down"></i>
              <option value="" disabled selected>Pilih peran Anda</option>
              <option value="PJMK" {{ old('peran') == 'PJMK' ? 'selected' : '' }}>PJMK</option>
              <option value="Admin" {{ old('peran') == 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
          </div>

          <div class="inputbox">
            <h3 class="inputlabel">Prodi*</h3>
            <select id="prodi" name="prodi" required>
              <option value="" disabled selected>Pilih program studi Anda</option>
              <option value="Rekayasa Nanoteknologi" {{ old('prodi') == 'Rekayasa Nanoteknologi' ? 'selected' : '' }}>Rekayasa Nanoteknologi</option>
              <option value="Teknik Elektro" {{ old('prodi') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
              <option value="Teknik Industri" {{ old('prodi') == 'Teknik Industri' ? 'selected' : '' }}>Teknik Industri</option>
              <option value="Teknik Rekayasa dan Kecerdasan Buatan" {{ old('prodi') == 'Teknik Rekayasa dan Kecerdasan Buatan' ? 'selected' : '' }}>Teknik Rekayasa dan Kecerdasan Buatan</option>
              <option value="Teknologi Sains Data" {{ old('prodi') == 'Teknologi Sains Data' ? 'selected' : '' }}>Teknologi Sains Data</option>
            </select>
          </div>

          <div class="inputbox">
            <h3 class="inputlabel">NIK*</h3>
            <input type="number" name="nik" placeholder="Masukkan NIK Anda" value="{{ old('nik') }}" required>
          </div>

          <div class="inputbox">
            <h3 class="inputlabel">Password*</h3>
            <input type="password" name="password" placeholder="Buat password Anda" minlength="8" required>
          </div>

          <div class="login-button">
            <button type="submit" class="btn" id="register">Daftar</button>
          </div>

          <div class="register">
            <p class="register-p">Sudah punya akun?
              <a href="login.html" class="register-link">Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
