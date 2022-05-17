<div class="row header mt-2 p-2 border-bottom border-2 align-items-center">
    <div class="col-2 col-lg-1">
        <span class="my-table-header">No.</span>
    </div>
    <div class="col-3 col-lg-3">
        <span class="my-table-header">Kelas</span>
    </div>
    <div class="col-4 col-lg-5">
        <span class="my-table-header">Wali Kelas</span>
    </div>
    <div class="col-3 col-lg-3">
        <span class="my-table-header">Jmlh Siswa</span>
    </div>
</div>
@foreach ($data as $item)
    <div class="row table-value p-2">
        <div class="col-2 col-lg-1">
            <div class="my-table-main">{{ $loop->iteration }}</div>
        </div>
        <div class="col-3 col-lg-3">
            <div class="my-table-main">{{ $item['nama'] }}</div>
        </div>
        <div class="col-4 col-lg-5">
            <div class="my-table-main">
                {!! $item['walas'] !!}
            </div>
        </div>
        <div class="col-3 col-lg-3">
            <span class="my-table-main">
                @php
                    echo count($item['jmlh']);
                @endphp
            </span>
        </div>
    </div>
@endforeach
