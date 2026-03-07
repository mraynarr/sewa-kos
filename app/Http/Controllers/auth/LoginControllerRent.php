<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginControllerRent extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $userExists = User::where('email', $request->email)->first();

        if (!$userExists) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan dalam sistem kami.',
            ])->withInput($request->only('email'));
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->isAdmin()) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akses ditolak. Silakan gunakan jalur khusus Admin Master.',
                ])->withInput($request->only('email'));
            }

            $request->session()->regenerate();

            if ($user->isOwner()) {
                return redirect()->route('owner.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'password' => 'Kata sandi yang Anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:15|unique:users,nickname',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'phone'    => 'required|string|max:15|unique:users,phone',
            'password' => 'required|string|min:8',
        ], [
            'nickname.unique' => 'Nama panggilan ini sudah digunakan, pilih nama lain.',
            'email.unique'    => 'Email ini sudah terdaftar, silakan gunakan email lain.',
            'phone.unique'    => 'Nomor telepon ini sudah terdaftar di sistem kami.',
        ]);

        User::create([
            'nickname' => $request->nickname,
            'name'     => $request->nickname,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'penyewa',
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
