@extends('layouts.main_login')

@section('title', 'Login Siswa | SIPADU')

@section('content')

<div class="card  shadow-lg border-0 rounded-lg mt-5  card-custom">
    <div class=" d-flex justify-content-center">
        <img src="{{ asset('assets/img/logo_sipadu.png') }}" alt="" style="width:14rem; opacity:100%;">
    </div>
    <div class="card-body">
        <form action="{{ route('login.siswa') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label text-primary" style="font-weight:700;">Username</label>
                <input
                    type="text"
                    class="form-control"
                    name="nis"
                    placeholder="Masukkan NIS / NISN (pilih salah satu)"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label text-primary" style="font-weight:700;">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Masukkan Password (Tanggal Lahir)"
                    required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" id="inputRememberPassword" type="checkbox" />
                <label class="form-check-label text-primary" for="inputRememberPassword">
                    Remember Password
                </label>
            </div>

            <button class="btn btn-primary w-100 mt-3" type="submit">
                Login
            </button>
        </form>

    </div>

</div>
@endsection