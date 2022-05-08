@foreach ($walas as $item)
    <input type="hidden" name="role_id" value="2">
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
            id="password_data_guru" placeholder="Password" required value="">
        @error('password')
            <div class="  invalid-feedback">
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
