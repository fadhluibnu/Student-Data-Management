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
    <div class="walas-data">
        <span class="my-table-header">Wali Kelas</span>
    </div>
    <div class="alamat-data">
        <span class="my-table-header">Alamat</span>
    </div>
</div>
@foreach ($guru as $item)
    <div class="d-flex table-value p-2 me-5 align-items-center">
        <div class="nomor">
            <span class="my-table-main">{{ $loop->iteration }}</span>
        </div>
        <div class="option d-flex g-2">
            <form action="/dataguru/{{ $item->id }}" method="post">
                @method('delete')
                @csrf
                <button class="btn badge bg-danger" onclick="return confirm('Yakin ?')"><i
                        class="bi bi-trash-fill"></i></button>
            </form>
            <a href="/dataguru/{{ $item->id }}/edit" class="nav-link ms-1 badge bg-primary"><i
                    class="bi bi-pencil-square"></i></a>
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
        <div class="walas-data">
            <span class="my-table-main">{{ $item->walikelas->walas }}</span>
        </div>
        <div class="alamat-data">
            <span class="my-table-main">{{ $item->alamat }}</span>
        </div>
    </div>
@endforeach
