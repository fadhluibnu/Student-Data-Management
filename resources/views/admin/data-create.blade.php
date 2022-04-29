@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">

            <form class="bg-white p-4 rounded-3" action="/dataguru" method="POST">
                @csrf
                <input type="hidden" name="role_id" value="2">
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis"
                        placeholder="NIS" required value="{{ old('nis') }}">
                    @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label ">Nama</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="nama"
                        placeholder="name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="  invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                        placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                        <div class="  invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_data_guru" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                        id="password_data_guru" placeholder="Password" required value="{{ old('password') }}">
                    @error('password')
                        <div class="  invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <p class="form-label">Wali Kelas</p>
                    <button class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button" type="button"
                        id="walikelas" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih kelas
                    </button>
                    <input type="hidden" id="walasSelect" name="walikelas_id" value="">
                    <ul class="dropdown-menu" aria-labelledby="walikelas" onclick="showButton()">
                        @foreach ($walas as $item)
                            <li class="dropdown-input walas" data-slug-walas="{{ $item->id }}">
                                {{ $item->walas }}
                            </li>
                        @endforeach
                    </ul>
                    @error('walikelas_id')
                        <div class="  invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sekolah" class="form-label">Sekolah</label>
                    <input type="hidden" class="form-control" id="sekolah_hide" placeholder="name@example.com"
                        name="sekolah_id" value="{{ auth()->user()->sekolah_id }}" required>
                    <input type="text" class="form-control" id="sekolah" placeholder="name@example.com"
                        value="{{ auth()->user()->sekolah->nama }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label  @error('alamat') is-invalid @enderror">Alamat</label>
                    <textarea class="form-control " id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="  invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

        </div>
    </div>
@endsection
