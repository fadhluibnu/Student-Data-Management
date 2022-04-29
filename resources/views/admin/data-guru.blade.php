@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">
            <div class="row g-2 flex-column-reverse flex-lg-row">
                <div class="col-lg-8">
                    <div class=" p-4 bg-white rounded-3 position-relative">
                        <h1 class="title-box mb-0">Data Guru</h1>
                        @if (session()->has('success'))
                            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="d-flex">
                            <div class="fit-parent mt-3 overflow-auto" style="width: inherit">
                                <div class="fit-centent " style="width: fit-content">
                                    <div class="d-flex p-2 border-bottom border-2">
                                        <div class="nomor">
                                            <span class="my-table-header">No</span>
                                        </div>
                                        <div class="option">
                                            <span class="my-table-header">Option</span>
                                        </div>
                                        <div class="nis-data">
                                            <span class="my-table-header">NIS</span>
                                        </div>
                                        <div class="nama-data">
                                            <span class="my-table-header">Nama</span>
                                        </div>
                                        <div class="email-data">
                                            <span class="my-table-header">Email</span>
                                        </div>
                                        <div class="email-data">
                                            <span class="my-table-header">Wali Kelas</span>
                                        </div>
                                        <div class="alamat-data">
                                            <span class="my-table-header">Alamat</span>
                                        </div>
                                    </div>
                                    @foreach ($guru as $item)
                                        <div class="d-flex table-value p-2 me-5">
                                            <div class="nomor">
                                                <span class="my-table-main">{{ $loop->iteration }}</span>
                                            </div>
                                            <div class="option">
                                                <span class="my-table-main">Option</span>
                                            </div>
                                            <div class="nis-data">
                                                <span class="my-table-main">{{ $item->nis }}</span>
                                            </div>
                                            <div class="nama-data">
                                                <span class="my-table-main">{{ $item->name }}</span>
                                            </div>
                                            <div class="email-data">
                                                <span class="my-table-main">{{ $item->email }}</span>
                                            </div>
                                            <div class="email-data">
                                                <span class="my-table-main">{{ $item->walikelas->walas }}</span>
                                            </div>
                                            <div class="alamat-data">
                                                <span class="my-table-main">{{ $item->alamat }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class=" p-4 bg-white rounded-3">
                        <h1 class="title-box mb-0">Tambah Data</h1>
                        <a href="/dataguru/create" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
