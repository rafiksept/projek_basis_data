<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'peran' => ['required', 'string'],
            'prodi' => ['required', 'string'],
            'nik' => ['required', 'numeric'],
        ]);
    }

    protected function register(Request $request)
{
    $validator = $this->validator($request->all());
    if ($validator->fails()) {
        return redirect()->route('sign-up')->withErrors($validator)->withInput();
    }
    

    $user = new User();
    $user->name = $request->input('nama');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->prodi = $request->input('prodi');
    $user->nik = $request->input('nik');
    $user->role_id = 1;  // JUST DUMMY, PERLU DIGANTI !
    $user->save();

    // Optionally, you can log in the user or perform any other necessary actions

    return redirect()->route('home')->with('message', 'Registration successful!');
}



}
