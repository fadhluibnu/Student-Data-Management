<div class="col-6">
    <div class="p-4 bg-white rounded-3">
        <h1 class="title-box mb-0">{{ $tahun }}</h1>
        <button class="btn btn-primary mt-3" id="btnTambahTahun">
            Tambah
        </button>
        <form action="/tahunjenis" method="POST" class="mt-2 d-none" id="createTahun">
            @csrf
            <input type="hidden" name="table" value="tahun">
            <div class="mb-3">
                <label for="tambahTahun" class="form-label">Tahun Ajaran</label>
                <div class="d-flex align-items-center justify-content-between">
                    <input type="tel" pattern="[0-9]{4}" name="tahun1"
                        class="me-2 form-control @error('tahun1') is-invalid @enderror" required
                        value="{{ old('tahun1') }}">
                    @error('tahun1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <span>-</span>
                    <input type="tel" pattern="[0-9]{4}" name="tahun2"
                        class="ms-2 form-control @error('tahun2') is-invalid @enderror" required
                        value="{{ old('tahun2') }}">
                    @error('tahun1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary" id="closeTahun">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<div class="col-6">
    <div class="p-4 bg-white rounded-3">
        <h1 class="title-box mb-0">{{ $jenis }}</h1>
        <button class="btn btn-primary mt-3" id="btnTambahJenis">
            Tambah
        </button>
        <form action="/tahunjenis" method="POST" class="mt-2 d-none" id="createJenis">
            @csrf
            <input type="text" name="table" value="jenis">
            <div class="mb-3">
                <label for="tambahJenis" class="form-label">Jenis Ujian</label>
                <input type="text" name="tambahJenis" class="form-control @error('tambahJenis') is-invalid @enderror"
                    id="Jenis" placeholder="Jenis Ujian" required value="{{ old('tambahJenis') }}">
                @error('tambahJenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="button" class="btn btn-outline-primary" id="closeJenis">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
