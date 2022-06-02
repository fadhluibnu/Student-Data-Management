@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-8 mt-3 mt-lg-0">
                    @can('siswa')
                        <div class="row g-3">
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="bg-white p-4 rounded-3 ">
                                    <h1 class="title-box">Nilai Rata Rata</h1>
                                    @if ($avgStudent == false)
                                        <span class="my-table-main text-danger">Data Tidak Ditemukan</span>
                                    @else
                                        <div class="d-flex align-items-start">
                                            <h3 class="value-average">{{ $avgStudent }}</h3>
                                            <p style="color: #21d805" class="mt-3 ms-2"><i
                                                    class="bi bi-check-circle-fill"></i>
                                            </p>
                                        </div>
                                        <div class="point" style="margin-top: -10px">
                                            <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.9);">...........</p>
                                            <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.6);">.......</p>
                                            <p class="m-0 p-0 font" style="color: #FDB2B2;">...</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="bg-white p-4 rounded-3">
                                    <h1 class="title-box">Nilai Tertinggi</h1>
                                    @if ($scoreHigh == false)
                                        <span class="my-table-main text-danger">Data Tidak Ditemukan</span>
                                    @else
                                        <div class="d-flex align-items-start">
                                            <h3 class="value-average">{{ $scoreHigh }}</h3>
                                            <p style="color: #21d805" class="mt-3 ms-2"><i
                                                    class="bi bi-check-circle-fill"></i>
                                            </p>
                                        </div>
                                        <div class="point" style="margin-top: -10px">
                                            <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.9);">...........</p>
                                            <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.6);">.......</p>
                                            <p class="m-0 p-0 font" style="color: #FDB2B2;">...</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="bg-white p-4 rounded-3">
                                    <h1 class="title-box">Rangking Kelas</h1>
                                    @if ($rank == false)
                                        <span class="my-table-main text-danger">Data Tidak Ditemukan</span>
                                    @else
                                        <div class="d-flex align-items-start">
                                            <h3 class="value-average">{{ $rank }}</h3>
                                            <p style="color: #21d805" class="mt-3 ms-2"><i
                                                    class="bi bi-check-circle-fill"></i>
                                            </p>
                                        </div>
                                        <div class="point" style="margin-top: -10px">
                                            <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.9);">...........</p>
                                            <p class="mb-3 p-0 font" style="color: rgba(31, 199, 4, 0.6);">.......</p>
                                            <p class="m-0 p-0 font" style="color: #FDB2B2;">...</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endcan
                    <div class="row @can('siswa') mt-3 @endcan">
                        <div class="col">
                            <div class="container bg-white p-4 rounded-3 my-table">
                                <form action="/" method="get" class="d-flex align-items-center">
                                    <h1 class="title-box mb-0">
                                        @can('siswa')
                                            Nilai Ujian
                                        @endcan
                                        @can('guru')
                                            Daftar Siswa
                                        @endcan
                                    </h1>
                                    <div class="dropdown ms-2">
                                        @if ($allScore == false)
                                            <button
                                                class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                                type="button" id="jenisUjian" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                {{ request('jenis_ujian') }}
                                            </button>
                                            <input type="hidden" id="jenisSelect" name="jenis_ujian"
                                                value="{{ request('jenis_ujian') }}">
                                        @else
                                            @can('guru')
                                                {{-- {{ $selectJns[0]['ujian'] }} --}}
                                                <button
                                                    class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                                    type="button" id="jenisUjian" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    @if (request('jenis_ujian'))
                                                        @foreach ($jenis as $item)
                                                            @if ($item->slug == request('jenis_ujian'))
                                                                {{ $item->ujian }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        {{ $selectJns[0]['ujian'] }}
                                                    @endif
                                                </button>
                                                <input type="text" id="jenisSelect" name="jenis_ujian"
                                                    @if (request('jenis_ujian')) value="{{ request('jenis_ujian') }}"
                                                @else
                                                value="{{ $selectJns[0]['slug'] }}" @endif>
                                            @endcan
                                            @can('siswa')
                                                <button
                                                    class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                                    type="button" id="jenisUjian" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    @foreach ($allScore as $item)
                                                        {{ $item->jenis_ujian->ujian }}
                                                    @endforeach
                                                </button>
                                                @foreach ($allScore as $item)
                                                    <input type="hidden" id="jenisSelect" name="jenis_ujian"
                                                        value="{{ $item->jenis_ujian->slug }}">
                                                @endforeach
                                            @endcan
                                        @endif
                                        <ul class="dropdown-menu" aria-labelledby="jenisUjian" onclick="showButton()">
                                            @foreach ($jenis as $item)
                                                <li class="dropdown-input jenis-ujian"
                                                    data-slug-jenis="{{ $item->slug }}">
                                                    {{ $item->ujian }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="dropdown ms-2">
                                        @if ($allScore == false)
                                            <button
                                                class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                                type="button" id="tahunUjian" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                {{ request('tahun_ujian') }}
                                            </button>
                                            <input type="hidden" id="tahunSelect" name="tahun_ujian"
                                                value="{{ request('tahun_ujian') }}">
                                        @else
                                            @can('guru')
                                                <button
                                                    class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                                    type="button" id="tahunUjian" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    {{ $allScore[0]['tahun_ujian'] }}
                                                </button>
                                                <input type="hidden" id="tahunSelect" name="tahun_ujian"
                                                    value="{{ $allScore[0]['tahun_ujian_slug'] }}">
                                            @endcan
                                            @can('siswa')
                                                <button
                                                    class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                                    type="button" id="tahunUjian" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    @foreach ($allScore as $item)
                                                        {{ $item->tahun_ujian->tahun }}
                                                    @endforeach
                                                </button>
                                                @foreach ($allScore as $item)
                                                    <input type="hidden" id="tahunSelect" name="tahun_ujian"
                                                        value="{{ $item->tahun_ujian->slug }}">
                                                @endforeach
                                            @endcan
                                        @endif
                                        <ul class="dropdown-menu" aria-labelledby="tahunUjian" onclick="showButton()">
                                            @foreach ($thnUjian as $item)
                                                <li class="dropdown-input tahun-ujian"
                                                    data-slug-tahun="{{ $item->slug }}">
                                                    {{ $item->tahun }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button class="btn btn-primary ms-2 d-none" type="submit" id="cek-nilai-btn">Cek
                                        Nilai</button>
                                </form>
                                @can('siswa')
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
                                    @if ($allScore == false)
                                        <div class="row table-value p-2">
                                            <div class="col-12 text-center">
                                                <span class="my-table-main text-danger">Data Tidak Ditemukan</span>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($allScore as $item)
                                            @can('siswa')
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
                                            @endcan
                                        @endforeach
                                    @endif
                                @endcan
                                @can('guru')
                                    <div class="fit mt-4" style="width: inherit;overflow-x: auto;">
                                        <div class="over" style="width: fit-content">
                                            <div class="d-flex p-2 border-bottom border-2">
                                                <div class="nomor">
                                                    <span class="my-table-header">No</span>
                                                </div>
                                                <div class="nama-guru">
                                                    <span class="my-table-header">Nama</span>
                                                </div>
                                                <div class="text-center mapel">
                                                    <span class="my-table-header">PPKn</span>
                                                </div>
                                                <div class="text-center mapel">
                                                    <span class="my-table-header">MTK</span>
                                                </div>
                                                <div class="text-center mapel">
                                                    <span class="my-table-header">ING</span>
                                                </div>
                                                <div class="text-center mapel">
                                                    <span class="my-table-header">IND</span>
                                                </div>
                                                <div class="text-center mapel">
                                                    <span class="my-table-header">IND</span>
                                                </div>
                                            </div>
                                            @if ($allScore == false)
                                                <div class="d-flex table-value p-2">
                                                    <div class="text-center" style="width: 100%">
                                                        <span class="my-table-main text-danger">Data Tidak Ditemukan</span>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($allScore as $item)
                                                    <div class="d-flex table-value p-2">
                                                        <div class="nomor">
                                                            <span class="my-table-main">{{ $loop->iteration }}</span>
                                                        </div>
                                                        <div class="nama-guru">
                                                            <span class="my-table-main">{{ $item['nama'] }}</span>
                                                        </div>
                                                        <div class="text-center mapel">
                                                            <span class="my-table-main">{{ $item['pkn'] }}</span>
                                                        </div>
                                                        <div class="text-center mapel">
                                                            <span class="my-table-main ">{{ $item['mtk'] }}</span>
                                                        </div>
                                                        <div class="text-center mapel">
                                                            <span class="my-table-main">{{ $item['ing'] }}</span>
                                                        </div>
                                                        <div class="text-center mapel">
                                                            <span class="my-table-main">{{ $item['ind'] }}</span>
                                                        </div>
                                                        <div class="text-center mapel">
                                                            <span class="my-table-main">{{ $item['ind'] }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>

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
                        <a href="/setting" class="btn my-btn mt-2" style="width: 100%">
                            <i class="bi bi-pen me-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-inline-block d-sm-none" style="height: 100px"></div>
        </div>
    </div>
@endsection
