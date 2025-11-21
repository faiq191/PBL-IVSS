<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Tampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Proses register
    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:4|confirmed', // INI PENTING
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role'     => 'member'
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    // Proses login
    public function doLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect("admin");
        } else {
            return redirect()->route('login')
                ->with('error', 'Username atau Password salah');
        }
    }

    // Logout
    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda berhasil keluar dari sistem');
    }

    public function createSample()
    {
        User::create([
            'username' => 'adminlab',
            'password' => bcrypt('1234'),
            'role'     => 'admin_lab'
        ]);

        echo "User admin_lab berhasil ditambahkan!";
    }
}
