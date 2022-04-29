@extends('layouts.main')

@section('authcontain')
    <a href="/login" class="btn">Back</a>
    <h1 class="form-login-title">Registrasi</h1>
    <form action="/registrasi?@if (request('u') == 'sekolah') u=sekolah @endif" class="mt-4" method="POST">
        @csrf
        @if (session()->has('loginErr'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginErr') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <p class="mb-1"><strong>Profil Admin</strong></p>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="name@example.com" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="name@example.com" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="password" name="password">
                        </div>
                        @if (request('u') == 'sekolah')
                            <div class="mb-3">
                                <label for="posisi" class="form-label">Posisi</label>
                                <input type="text" class="form-control" id="posisi" placeholder="password"
                                    value="Administrator">
                                <input type="hidden" class="form-control" id="posisi" placeholder="password" value="1"
                                    name="role_id">
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @if (request('u') == 'sekolah')
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-6">
                            <p class="mb-1"><strong>Profil Sekolah</strong></p>
                            <div class="mb-3">
                                <label for="Nama" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control" id="Nama" placeholder="Nama" name="nama_sekolah"
                                    value="{{ old('nama_sekolah') }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                                <textarea class="form-control" name="alamat_sekolah" id="alamat_sekolah"
                                    rows="3">{{ old('alamat_sekolah') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <button class="btn my-btn-form p-3 mt-3" type="submit">Daftar</button>
    </form>
@endsection
