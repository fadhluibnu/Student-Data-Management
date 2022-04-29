@extends('layouts.main')
@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div class="container-fluid mt-4">
            <div class="row bg-white p-4 rounded-3 align-items-start">
                <div class="col-md-3 col-lg-2 ">
                    <div class="box-profile m-auto"></div>
                    <style>
                        .box-profile {
                            background-image: url(assets/pinguin.jpg);
                        }

                    </style>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="ms-md-5">
                        @foreach ($user as $item)
                            <form action="/setting/{{ $item->id }}" method="post">
                                @method('put')
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $item->id }}" disabled>
                                @if (session()->has('updateSucc'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('updateSucc') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label font-setting">Nama</label>
                                            <input type="text" class="form-control font-setting-inp" id="nama"
                                                placeholder="Nama" value="{{ $item->name }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label font-setting">Email</label>
                                            <input type="email" class="form-control font-setting-inp" id="email"
                                                placeholder="Nama" value="{{ $item->email }}" disabled>
                                        </div>
                                        @can('siswa')
                                            <div class="mb-3">
                                                <label for="kelas" class="form-label font-setting">Kelas</label>
                                                <input type="text" class="form-control font-setting-inp" id="kelas"
                                                    placeholder="Nama" value="{{ $item->kelas->kelas }}" disabled>
                                            </div>
                                        @endcan
                                        @can('guru')
                                            <div class="mb-3">
                                                <label for="kelas" class="form-label font-setting">Wali Kelas</label>
                                                <input type="text" class="form-control font-setting-inp" id="kelas"
                                                    placeholder="Nama" value="{{ $item->walikelas->walas }}" disabled>
                                            </div>
                                        @endcan
                                        <div class="mb-3 p-2 rounded-3 d-flex" id="btn-ganti-pass"
                                            style="border: 1px solid #ced8ff; cursor: pointer;">
                                            <div class="btn p-0 font-setting">Ganti Password
                                            </div>
                                            <input type="text" class="form-control" name="password" id="password">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="nis" class="form-label font-setting">NIS</label>
                                            <input type="text" class="form-control font-setting-inp" id="nis"
                                                placeholder="Nama" value="{{ $item->nis }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nis" class="form-label font-setting">Status</label>
                                            <input type="text" class="form-control font-setting-inp" id="nis"
                                                placeholder="Nama"
                                                value="{{ $item->role->role }} {{ $item->sekolah->nama }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label font-setting">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $item->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
