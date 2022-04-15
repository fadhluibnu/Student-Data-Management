@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div class="hidden-area-collapse p-3 position-absolute" id="collapse-area" onclick="areaCollapse()"></div>
        <div class="container-fluid mt-4">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-8 mt-3 mt-lg-0">
                    @can('siswa')
                        <div class="row g-3">
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="bg-white p-4 rounded-3 ">
                                    <h1 class="title-box">Nilai Rata Rata</h1>
                                    <div class="d-flex align-items-start">
                                        <h3 class="value-average">{{ $avgStudent }}</h3>
                                        <p style="color: #21d805" class="mt-3 ms-2"><i class="bi bi-check-circle-fill"></i>
                                        </p>
                                    </div>
                                    <div class="point" style="margin-top: -10px">
                                        <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.9);">...........</p>
                                        <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.6);">.......</p>
                                        <p class="m-0 p-0 font" style="color: #FDB2B2;">...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="bg-white p-4 rounded-3">
                                    <h1 class="title-box">Nilai Tertinggi</h1>
                                    <div class="d-flex align-items-start">
                                        <h3 class="value-average">{{ $scoreHigh }}</h3>
                                        <p style="color: #21d805" class="mt-3 ms-2"><i class="bi bi-check-circle-fill"></i>
                                        </p>
                                    </div>
                                    <div class="point" style="margin-top: -10px">
                                        <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.9);">...........</p>
                                        <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.6);">.......</p>
                                        <p class="m-0 p-0 font" style="color: #FDB2B2;">...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="bg-white p-4 rounded-3"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="container bg-white p-4 rounded-3 my-table">
                                    <h1 class="title-box">Nilai Ujian</h1>
                                    <div class="row header mt-4 p-2">
                                        <div class="col-8">
                                            <span class="my-table-header">Mata Pelajaran</span>
                                        </div>
                                        <div class="col-2 text-center">
                                            <span class="my-table-header ">Nilai</span>
                                        </div>
                                        <div class="col-2 text-center">
                                            <span class="my-table-header">Status</span>
                                        </div>
                                    </div>
                                    @foreach ($allScore as $item)
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Pendidikan Kewarganegaraan</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item->pkn }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item->pkn >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item->pkn <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Matematika</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main ">{{ $item->mtk }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item->mtk >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item->mtk <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Bahasa Inggris</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item->ing }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item->ing >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item->ing <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Bahasa Indonesia</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item->ind }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item->ind >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item->ind <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded-3 text-center">
                        <div class="box-profile m-auto"></div>
                        <style>
                            .box-profile {
                                background-image: url(assets/pinguin.jpg);
                            }

                        </style>
                        @foreach ($role as $item)
                            <h2 class="username mt-3">{{ $item->name }}</h2>
                            @can('siswa')
                                <h4 class="desc">{{ $item->nis }}</h4>
                                <h4 class="desc">{{ $item->kelas->kelas }}</h4>
                            @endcan
                            @can('guru')
                                <h4 class="desc">{{ $item->role->role }}</h4>
                                <h4 class="desc"><strong>Walas : </strong>{{ $item->walikelas->walas }}</h4>
                            @endcan
                            @can('admin')
                                <h4 class="desc">{{ $item->role->role }}</h4>
                            @endcan
                            <h4 class="desc">{{ $item->sekolah->nama }}</h4>
                        @endforeach
                        <a href="" class="btn my-btn mt-2" style="width: 100%">
                            <i class="bi bi-pen me-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-inline-block d-sm-none" style="height: 100px"></div>
        </div>
    </div>
@endsection
