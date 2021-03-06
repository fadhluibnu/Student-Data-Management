@foreach ($siswa as $item)
    <input type="hidden" name="role_id" value="3">
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="NIS"
            required value="{{ $item->nis }}">
        @error('nis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label ">Nama</label>
        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="nama"
            placeholder="name" required value="{{ $item->name }}">
        @error('name')
            <div class="  invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email"
            placeholder="name@example.com" required value="{{ $item->email }}">
        @error('email')
            <div class="  invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password_data_guru" class="form-label">Password</label>
        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
            id="password_data_guru" placeholder="Password">
        @error('password')
            <div class="  invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <p class="form-label">Kelas</p>
        <button class="btn btn-outline-secondary my-costume-table dropdown-toggle show-button" type="button"
            id="btnClass" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $item->kelas->kelas }}
        </button>
        <input type="hidden" id="kelasSelect" name="kelas_id" value="{{ $item->kelas->id }}">
        <ul class="dropdown-menu" aria-labelledby="walikelas" onclick="showButton()">
            @foreach ($kelas as $kelas)
                <li class="dropdown-input kelas_list" data-slug-kelas="{{ $kelas->id }}">
                    {{ $kelas->kelas }}
                </li>
            @endforeach
        </ul>
        @error('kelas_id')
            <div class="invalid-feedback d-inline-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label  @error('alamat') is-invalid @enderror">Alamat</label>
        <textarea class="form-control " id="alamat" rows="3" name="alamat">{{ $item->alamat }}</textarea>
        @error('alamat')
            <div class="  invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endforeach
