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

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]); 
        
        $petugas = \App\Models\User::where('email', $request->email)->first();

        if ($petugas && $petugas->status === 'nonaktif') {
            return back()->withErrors([
                'login' => 'Akun Anda telah nonaktif. Hubungi admin untuk mengaktifkannya.',
            ]);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status'   => 'aktif',


        ];

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

        
        $siswa = \App\Models\Siswa::where('nis', $request->nis)->first();

        if ($siswa && $siswa->status === 'nonaktif') {
            return back()->withErrors([
                'login' => 'Akun Anda telah nonaktif. Hubungi admin untuk mengaktifkannya.',
            ]);
        }

        $credentials = [
            'nis' => $request->nis,
            'password' => $request->password,
            'status'   => 'aktif',


        ];

        $remember = $request->has('remember');

        if (Auth::guard('siswa')->attempt($credentials, $remember)) {
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

        $guru = \App\Models\Guru::where($loginField, $request->login)->first();

        if ($guru && $guru->status === 'nonaktif') {
            return back()->withErrors([
                'login' => 'Akun Anda telah nonaktif. Hubungi admin untuk mengaktifkannya.',
            ]);
        }

        $credentials = [
            $loginField => $request->login,
            'password' => $request->password,
            'status'   => 'aktif',


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
