<div class="col-10">
    <div class="p-4 bg-white rounded-3 position-relative">
        <form action="/nilaisiswa" method="get" class="d-flex ">
            <h1 class="title-box mb-0">{{ $title }}</h1>
            <div class="dropdown ms-2">
                <button class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button" type="button"
                    id="jenisUjian" data-bs-toggle="dropdown" aria-expanded="false">
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
                <button class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button" type="button"
                    id="tahunUjian" data-bs-toggle="dropdown" aria-expanded="false">
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

        @if (session()->has('success'))
            <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('fail'))
            <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="fit mt-4" style="width: inherit;overflow-x: auto;">
            <div class="over" style="width: fit-content">
                <div class="d-flex p-2 border-bottom border-2">
                    <div class="nomor">
                        <span class="my-table-header">No</span>
                    </div>
                    <div class="option">
                        <span class="my-table-header">Action</span>
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
                        <div class="option">
                            <span class="my-table-main">
                                @if ($item['status'] == 'terisi')
                                    <a href="/nilaisiswa/{{ $item['id'] }}/edit?jenis_ujian={{ $item['jenis']['slug'] }}&tahun_ujian={{ $item['tahun']['slug'] }}"
                                        type="button" class="btn btn-warning btn-sm">Edit</a>
                                @else
                                    <a href="/nilaisiswa/create?id={{ $item['user_id'] }}&jenis={{ $item['jenis']['id'] }}&tahun={{ $item['tahun']['id'] }}"
                                        type="button" class="btn btn-primary btn-sm">Insert</a>
                                @endif
                            </span>
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
