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
        'password' => 'required|min:6',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('users', 'public');
    }

    User::create([
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'member',
        'image' => $imagePath
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

            // ROLE CHECK
            $role = Auth::user()->role;
            // Jika Admin Berita
            if ($role === 'admin_berita') {
                return redirect('/admin');          // admin berita → /admin
            }
            // Jika Kepala Admin
            if ($role === 'admin_kepala') {
                return redirect('/headadmin');      // kepala admin → /headadmin
            }

            // Jika Member B aja
            return redirect('/index');
        }

        return redirect()->route('login')
            ->with('error', 'Username atau Password salah');
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
        public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();

        return redirect()->route('halaman.headadmin')->with('success', 'User approved');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'rejected';
        $user->save();

        return redirect()->route('halaman.headadmin')->with('success', 'User rejected');
    }

}
