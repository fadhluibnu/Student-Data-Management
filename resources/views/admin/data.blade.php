@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">
            <div class="row g-2 flex-column-reverse flex-lg-row">
                @if (!Request::is('tahunjenis*'))
                    <div class="col-lg-8">
                        <div class=" p-4 bg-white rounded-3 position-relative">
                            <h1 class="title-box mb-0">{{ $title }}</h1>
                            @if (session()->has('success'))
                                <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('fail'))
                                <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('fail') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="d-flex">
                                <div class="fit-parent mt-2 overflow-auto" style="width: inherit">
                                    <div class="fit-centent " style="width: fit-content">
                                        @if (Request::is('dataguru'))
                                            @include('admin.partials.guru')
                                        @endif
                                        @if (Request::is('datasiswa'))
                                            @include('admin.partials.siswa')
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if (Request::is('datakelas'))
                                @include('admin.partials.kelas')
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class=" p-4 bg-white rounded-3">
                            <h1 class="title-box mb-0">Tambah Data</h1>
                            @if (Request::is('dataguru'))
                                <a href="/dataguru/create" class="btn btn-primary mt-3">
                                    Tambah
                                </a>
                            @endif
                            @if (Request::is('datasiswa'))
                                <a href="/datasiswa/create" class="btn btn-primary mt-3">
                                    Tambah
                                </a>
                            @endif
                            @if (Request::is('datakelas'))
                                <button class="btn btn-primary mt-3" id="btnTambah">
                                    Tambah
                                </button>
                                <form action="/datakelas" method="POST" class="mt-2 d-none" id="createkelas">
                                    @csrf
                                    <input type="text" name="id_sekolah"
                                        value="{{ auth()->user()->sekolah->id_sekolah }}">
                                    <div class="mb-3">
                                        <label for="tambahKelas" class="form-label">Kelas</label>
                                        <input type="text" name="tambahKelas"
                                            class="form-control @error('tambahKelas') is-invalid @enderror" id="kelas"
                                            placeholder="Kelas" required value="{{ old('tambahKelas') }}">
                                        @error('tambahKelas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" id="closekelas">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @elseif(Request::is('tahunjenis*'))
                    @if (session()->has('success'))
                        <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @include('admin.partials.tahunjenis')
                @endif
            </div>
        </div>
    </div>
@endsection
