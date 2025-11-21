@extends('layouts.main_login')

@section('title', 'Login Admin | SIPADU')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5 card-custom">
        <div class=" d-flex justify-content-center">
            <img src="{{ asset('assets/img/logo_sipadu.png') }}" alt="" style="width:14rem; opacity:100%;">
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-primary"
                        style="font-weight:700;">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Masukkan Email ">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-primary"
                        style="font-weight:700;">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Password">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                    <label class="form-check-label text-primary" for="inputRememberPassword">Remember
                        Password</label>
                </div>
            </form>
        </div>
        <div class="d-grid text-center p-3">
            <a class="btn btn-primary text-white" type="submit" href="/">Login</a>
        </div>
    </div>
@endsection