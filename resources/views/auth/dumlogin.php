<!-- resources/views/auth/login.blade.php -->

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first('message') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required autofocus>
        {{-- <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus> --}}
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Ingat Akun </label>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>

    <div>
        <a href="{{ route('forget-password') }}" class="btn btn-primary">Lupa Password</a>
    </div>

    
    <div>
        <a href="{{ route('sign-up') }}" class="btn btn-primary">Daftar</a>
    </div>


</form>
