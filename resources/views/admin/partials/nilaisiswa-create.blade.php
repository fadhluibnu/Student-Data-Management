<input type="hidden" name="user_id" value="{{ $siswa[0]['id'] }}">
<input type="hidden" name="jenis_ujian_id" value="{{ request('jenis') }}">
<input type="hidden" name="tahun_ujian_id" value="{{ request('tahun') }}">
<div class="mb-3">
    <label for="nis" class="form-label">NIS</label>
    <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="NIS"
        required disabled value="{{ $siswa[0]['nis'] }}">
    @error('nis')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="nama" class="form-label ">Nama</label>
    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="nama" placeholder="name"
        required disabled value="{{ $siswa[0]['name'] }}">
    @error('name')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="pkn" class="form-label ">Pendidikan Kewarganegaraan</label>
    <input type="text" name="pkn" class="form-control  @error('pkn') is-invalid @enderror" id="pkn" placeholder="PPKn"
        required>
    @error('pkn')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="mtk" class="form-label ">Matematika</label>
    <input type="text" name="mtk" class="form-control  @error('mtk') is-invalid @enderror" id="mtk" placeholder="MTK"
        required>
    @error('mtk')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="ing" class="form-label ">Bahasa Inggris</label>
    <input type="text" name="ing" class="form-control  @error('ing') is-invalid @enderror" id="ing" placeholder="ING"
        required>
    @error('ing')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="ind" class="form-label ">Bahasa Indonesia</label>
    <input type="text" name="ind" class="form-control  @error('ind') is-invalid @enderror" id="ind" placeholder="IND"
        required>
    @error('ind')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="jawa" class="form-label ">Bahasa Jawa</label>
    <input type="text" name="jawa" class="form-control  @error('jawa') is-invalid @enderror" id="jawa"
        placeholder="Bahasa Jawa" required>
    @error('jawa')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="pjok" class="form-label ">PJOK</label>
    <input type="text" name="pjok" class="form-control  @error('pjok') is-invalid @enderror" id="pjok"
        placeholder="PJOK" required>
    @error('pjok')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="ipa" class="form-label ">Ilmu Pengetahuan Alam</label>
    <input type="text" name="ipa" class="form-control  @error('ipa') is-invalid @enderror" id="ipa" placeholder="IPA"
        required>
    @error('ipa')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="ips" class="form-label ">Ilmu Pengetahuan Sosial</label>
    <input type="text" name="ips" class="form-control  @error('ips') is-invalid @enderror" id="ips" placeholder="IPS"
        required>
    @error('ips')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
{{-- <div class="mb-3">
    <label for="jawa" class="form-label ">B. Jawa</label>
    <input type="text" name="jawa" class="form-control  @error('jawa') is-invalid @enderror" id="B. Jawa"
        placeholder="jawa" required>
    @error('jawa')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="pjok" class="form-label ">PJOK</label>
    <input type="text" name="pjok" class="form-control  @error('pjok') is-invalid @enderror" id="pjok"
        placeholder="PJOK" required>
    @error('pjok')
        <div class="  invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div> --}}
