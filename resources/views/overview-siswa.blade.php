@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-9 mt-3 mt-lg-0">
                    <div class="row g-3">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $item)
                            @if ($item['user_id'] == auth()->user()->id)
                                <div class="col-6 col-md-4 col-lg-4">
                                    <div class="bg-white p-4 rounded-3 ">
                                        <h1 class="title-box">Nilai Rata Rata</h1>
                                        <h3 class="value-average">{{ $item['avg'] }}</h3>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4">
                                    <div class="bg-white p-4 rounded-3">
                                        <h1 class="title-box">Nilai Tertinggi</h1>
                                        <h3 class="value-average">{{ $item['hScore'] }}</h3>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-4">
                                    <div class="bg-white p-4 rounded-3">
                                        <h1 class="title-box">Rangking Kelas</h1>
                                        <h3 class="value-average">{{ $i }}</h3>
                                    </div>
                                </div>
                            @endif
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 mt-3 mt-lg-0">
                            <div class="p-4 bg-white rounded-3 position-relative">
                                <form action="/" method="get" class="d-flex ">
                                    <h1 class="title-box mb-0">Nilai Siswa</h1>
                                    <div class="dropdown ms-2">
                                        <button
                                            class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
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
                                                <li class="dropdown-input jenis-ujian"
                                                    data-slug-jenis="{{ $j->slug }}">
                                                    {{ $j->ujian }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="dropdown ms-2">
                                        <button
                                            class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button"
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
                                                <li class="dropdown-input tahun-ujian"
                                                    data-slug-tahun="{{ $j->slug }}">
                                                    {{ $j->tahun }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button class="btn btn-primary ms-2 d-none" type="submit" id="cek-nilai-btn">Cek
                                        Nilai</button>
                                </form>
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
                                @foreach ($data as $item)
                                    @if ($item['user_id'] == auth()->user()->id)
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Pendidikan Kewarganegaraan</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item['pkn'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['pkn'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['pkn'] <= 69)
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
                                                <span class="my-table-main ">{{ $item['mtk'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['mtk'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['mtk'] <= 69)
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
                                                <span class="my-table-main">{{ $item['ing'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['ing'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['ing'] <= 69)
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
                                                <span class="my-table-main">{{ $item['ind'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['ind'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['ind'] <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Bahasa Jawa</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item['jawa'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['jawa'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['jawa'] <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">PJOK</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item['pjok'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['pjok'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['pjok'] <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Ilmu Pengetahuan Alam</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item['ipa'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['ipa'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['ipa'] <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row table-value p-2">
                                            <div class="col-8">
                                                <span class="my-table-main">Ilmu Pengetahuan Sosial</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">{{ $item['ips'] }}</span>
                                            </div>
                                            <div class="col-2 text-center">
                                                <span class="my-table-main">
                                                    @if ($item['ips'] >= 70)
                                                        <i class="bi bi-check-circle-fill" style="color: #21d805"></i>
                                                    @endif
                                                    @if ($item['ips'] <= 69)
                                                        <i class="bi bi-x-circle-fill" style="color: #d80505"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endif
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
                            <h4 class="desc">{{ $item->nis }}</h4>
                            <h4 class="desc">{{ $item->kelas->kelas }}</h4>
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
