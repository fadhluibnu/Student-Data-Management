@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-9 mt-3 mt-lg-0">
                    <div class="p-4 bg-white rounded-3 position-relative">
                        <form action="/" method="get" class="d-flex ">
                            <h1 class="title-box mb-0">Nilai Siswa</h1>
                            <div class="dropdown ms-2">
                                <button class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                    type="button" id="jenisUjian" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <input type="hidden" id="jenisSelect" name="jenis_ujian"
                                    value="@if (request('jenis_ujian')) {{ request('jenis_ujian') }}@else{{ $selectJns[0]['slug'] }} @endif">

                                <ul class="dropdown-menu" aria-labelledby="jenisUjian" onclick="showButton()">
                                    @foreach ($jenis as $j)
                                        <li class="dropdown-input jenis-ujian" data-slug-jenis="{{ $j->slug }}">
                                            {{ $j->ujian }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dropdown ms-2">
                                <button class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
                                    type="button" id="tahunUjian" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (request('tahun_ujian'))
                                        @foreach ($tahun as $item)
                                            @if ($item->slug == request('tahun_ujian'))
                                                {{ $item->tahun }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $selectTh[0]['tahun'] }}
                                    @endif
                                </button>
                                <input type="hidden" id="tahunSelect" name="tahun_ujian"
                                    @if (request('tahun_ujian')) value="{{ request('tahun_ujian') }}"
                                @else
                                    value="{{ $selectTh[0]['slug'] }}" @endif>

                                <ul class="dropdown-menu" aria-labelledby="jenisUjian" onclick="showButton()">
                                    @foreach ($tahun as $j)
                                        <li class="dropdown-input tahun-ujian" data-slug-tahun="{{ $j->slug }}">
                                            {{ $j->tahun }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button class="btn btn-primary ms-2 d-none" type="submit" id="cek-nilai-btn">Cek Nilai</button>
                        </form>
                        <div class="fit mt-4" style="width: inherit;overflow-x: auto;">
                            <div class="over" style="width: fit-content">
                                <div class="d-flex p-2 border-bottom border-2">
                                    <div class="nomor">
                                        <span class="my-table-header">No</span>
                                    </div>
                                    <div class="nis-data">
                                        <span class="my-table-header">NIS</span>
                                    </div>
                                    <div class="nama-guru ms-2">
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
                                        <span class="my-table-header">B. Jawa</span>
                                    </div>
                                    <div class="text-center mapel">
                                        <span class="my-table-header">PJOK</span>
                                    </div>
                                    <div class="text-center mapel">
                                        <span class="my-table-header">IPA</span>
                                    </div>
                                    <div class="text-center mapel">
                                        <span class="my-table-header">IPS</span>
                                    </div>
                                </div>
                                @foreach ($data as $item)
                                    <div class="d-flex table-value p-2">
                                        <div class="nomor">
                                            <span class="my-table-main">{{ $loop->iteration }}</span>
                                        </div>
                                        <div class="nis-data ">
                                            <span class="my-table-main">{{ $item['nis'] }}</span>
                                        </div>
                                        <div class="nama-guru ms-2">
                                            <span class="my-table-main">{{ $item['name'] }}</span>
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
                                            <span class="my-table-main">{{ $item['jawa'] }}</span>
                                        </div>
                                        <div class="text-center mapel">
                                            <span class="my-table-main">{{ $item['pjok'] }}</span>
                                        </div>
                                        <div class="text-center mapel">
                                            <span class="my-table-main">{{ $item['ipa'] }}</span>
                                        </div>
                                        <div class="text-center mapel">
                                            <span class="my-table-main">{{ $item['ips'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-white p-4 rounded-3 text-center">
                        <div class="box-profile m-auto"></div>
                        <style>
                            .box-profile {
                                background-image: url(assets/pinguin.jpg);
                            }

                        </style>
                        @foreach ($user as $item)
                            <h2 class="username mt-3">{{ $item->name }}</h2>
                            <h4 class="desc">{{ $item->role->role }}</h4>
                            <h4 class="desc"><strong>Walas : </strong>{{ $item->walikelas->walas }}</h4>
                            <h4 class="desc">{{ $item->sekolah->nama }}</h4>
                        @endforeach
                        <a href="/setting" class="btn my-btn mt-2" style="width: 100%">
                            <i class="bi bi-pen me-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
