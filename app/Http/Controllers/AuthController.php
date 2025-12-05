<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.login_admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember');

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login_siswa(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');

        if (Auth::guard('siswa')->attempt([
            'nis' => $request->nis,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('lapor.siswa.create');
        }

        return back()->withErrors(['nis' => 'NIS atau password salah!']);
    }


    public function logout_siswa(Request $request)
    {
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login_guru(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah isinya email atau bukan
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'no_identitas';

        $credentials = [
            $loginField => $request->login,
            'password' => $request->password,
        ];

        $remember = $request->has('remember');

        if (Auth::guard('guru')->attempt($credentials, $remember)) {
            return redirect()->route('lapor.guru.create');
        }

        return back()->withErrors([
            'login' => 'Email/No Identitas atau password salah!',
        ]);
    }

    public function logout_guru(Request $request)
    {
        Auth::guard('guru')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
