<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DataHidup;
use App\Models\User;


class UserController extends Controller
{
    // login
    public function LoginForm()
    {
        $data = DataHidup::getCuy('login');
        return view('login', $data);
    }
    public function login(Request $request)
    {
        // $user = Auth::user();
        // $level = $user->level;
        // $username = $user->username;
        $credentials = $request->only('username', 'password', 'level');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');//->with('success', 'Selamat datang '. $level .' ('. $username .')!');
        }
        // return back()->withErrors(['username' => 'Login Gagal']);
        return redirect()->route('login.form')->with('error', 'Username/Password Salah!');
    }
    // register
    public function RegisterForm()
    {
        // $this->authorize('Admin');
        $data = DataHidup::getCuy('register');
        return view('register', $data);
    }
    public function register(Request $request)
    {
        $rules = [
        'username' => 'required|unique:users',
        // 'password' => 'required|max:255',
        'namalengkap' => 'required|max:255',
        'jk' => 'required|max:15',
        'tempatlahir' => 'required|max:255',
        'tanggallahir' => 'required',
        'level' => 'required'
        //
        ];
        // $user = User::create([
        //     'username' => $request->input('username'),
        //     'password' => bcrypt($request->input('password')),
        //     'namalengkap' => $request->input('namalengkap'),
        //     'jk' => $request->input('jk'),
        //     'tempatlahir' => $request->input('tempatlahir'),
        //     'tanggallahir' => $request->input('tanggallahir'),
        //     'level' => $request->input('level')
        // ]);
        // $validasi['password'] = bcrypt($validasi['password']); //enkripsi
        if ($request->has('passwordbiasa')) {
            $rules['password'] = 'max:255';
            $rules['passwordbiasa'] = 'required';
            // $rules['passwordlama'] = '';
            // $passwordLama = $request->input('passwordlama');
            $passwordBiasa = $request->input('passwordbiasa');

            $validasi = $request->validate($rules);
            $validasi['password'] = bcrypt($request->input('passwordbiasa'));
            // $validasi['passwordlama'] = $passwordLama;
            $validasi['passwordbiasa'] = $passwordBiasa;

            User::create($validasi);
            // User::where('iduser', Auth::id())->update($validasi);
            // return redirect()->route('profile.index')->with('update', 'berhasil di Update');
            return redirect()->route('register.form')->with('success-register', 'Login Sekarang?');
        } else {
            return redirect()->back()->with('error', 'Password tidak boleh kosong.');
        }
        // $getCuy = DataHidup::getCuy('register');
        // $data = array_merge($Register, $getCuy);
        // return view('register', compact('user'));
        // return view('register', $data);
        // session(['user' => $user]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        if ($request->is(!'register')) {
            return redirect('/');
        } else {
            return redirect()->route('login');
        }
    }
}
