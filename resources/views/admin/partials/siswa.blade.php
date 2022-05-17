<div class="d-flex p-2 border-bottom border-2">
    <div class="nomor me-1">
        <span class="my-table-header">No</span>
    </div>
    <div class="option me-1">
        <span class="my-table-header">Option</span>
    </div>
    <div class="nis-data me-1">
        <span class="my-table-header">NIS</span>
    </div>
    <div class="nama-data me-1">
        <span class="my-table-header">Nama</span>
    </div>
    <div class="email-data me-1">
        <span class="my-table-header">Email</span>
    </div>
    <div class="walas-data me-1">
        <span class="my-table-header">Kelas</span>
    </div>
    <div class="alamat-data me-1">
        <span class="my-table-header">Alamat</span>
    </div>
</div>
@foreach ($siswa as $item)
    <div class="d-flex table-value p-2 me-5 align-items-center">
        <div class="nomor me-1">
            <span class="my-table-main">{{ $loop->iteration }}</span>
        </div>
        <div class="option d-flex g-2 me-1">
            <form action="/datasiswa/{{ $item->id }}" method="post">
                @method('delete')
                @csrf
                <button class="btn badge bg-danger" onclick="return confirm('Yakin ?')"><i
                        class="bi bi-trash-fill"></i></button>
            </form>
            <a href="/datasiswa/{{ $item->id }}/edit" class="nav-link ms-1 badge bg-primary"><i
                    class="bi bi-pencil-square"></i></a>
        </div>
        <div class="nis-data me-1">
            <span class="my-table-main">{{ $item->nis }}</span>
        </div>
        <div class="nama-data me-1">
            <span class="my-table-main">{{ $item->name }}</span>
        </div>
        <div class="email-data me-1">
            <span class="my-table-main">{{ $item->email }}</span>
        </div>
        <div class="walas-data me-1">
            <span class="my-table-main">{{ $item->kelas->kelas }}</span>
        </div>
        <div class="alamat-data me-1">
            <span class="my-table-main">{{ $item->alamat }}</span>
        </div>
    </div>
@endforeach
