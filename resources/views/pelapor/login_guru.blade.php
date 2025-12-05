@extends('layouts.main_login')

@section('title', 'Login Guru | SIPADU')

@section('content')
<div class="card shadow-lg border-0 rounded-lg mt-5 card-custom">
    <div class=" d-flex justify-content-center">
        <img src="{{ asset('assets/img/logo_sipadu.png') }}" alt="" style="width:14rem; opacity:100%;">
    </div>
    <div class="card-body">
        <form action="{{ route('login.guru') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-primary"
                    style="font-weight:700;">No Identitas / Email</label>
                <input type="text" name="login" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan No IDentitas / Email silahkan Pilih Salah Satu">
            </div>

            <div class="mb-3">
                <label class="form-label text-primary" style="font-weight:700;">Password</label>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" id="passwordInput " placeholder="Masukkan Password">
                    <button type="button" class="btn btn-outline-secondary border-0 bg-white" style="opacity: 75%;" id="togglePassword">
                        <i class="bi bi-eye-slash" style="color: black;" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember"
                    {{ old('remember') ? 'checked' : '' }} />

                <label class="form-check-label text-primary" for="inputRememberPassword">Remember Password</label>
            </div>
            <div class="d-grid text-center">
                <button class="btn btn-primary text-white" type="submit">Login</button>
            </div>
        </form>
    </div>

</div>
@endsection