@extends('layouts.main')

@section('authcontain')
    <h1 class="form-login-title">Login</h1>
    <form action="/login" class="mt-4" method="POST">
        @csrf
        @if (session()->has('loginErr'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" />
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" />
            <label for="password">Password</label>
        </div>
        <button class="btn my-btn-form p-3 mt-3" type="submit">Masuk</button>
        <a href="" class="btn my-btn-form seccond p-3 mt-3">
            Daftar Admin
        </a>
    </form>
@endsection
