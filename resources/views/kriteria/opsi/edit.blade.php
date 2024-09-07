@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data</h1>
</div>
<div class="col-lg-8">
  <form action="/kriteria/{{ $kriteria->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Kriteria</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="criteria_name" value="{{ old('name', $kriteria->criteria_name) }}" required autofocus>
      @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>  
    <div class="mb-3">
        <label for="berkas" class="form-label fw-bold">Berkas</label>
        <div class="form-check">
            <input class="form-check-input cursor-active" type="radio" name="store_berkas" id="store_berkas" value="1" {{ old('store_berkas', $kriteria->store_berkas) == 1 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label class="form-check-label" for="store_berkas">
                Ada
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="store_berkas" id="store_berkas" value="0" style="cursor: pointer;" {{ old('store_berkas', $kriteria->store_berkas) == 0 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label class="form-check-label" for="store_berkas">
                Tidak ada
            </label>
        </div>
        <p class="fst-italic text-info-emphasis">Pilih ada jika diperlukan berkas.</p>
    </div>
    <div class="mb-3">
        <label for="berkas" class="form-label fw-bold">Nilai</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="store_nilai" id="store_nilai" value="1" {{ old('store_nilai', $kriteria->store_nilai) == 1 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label class="form-check-label" for="store_nilai">
                Ada
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="store_nilai" id="store_nilai" value="0" {{ old('store_nilai', $kriteria->store_nilai) == 0 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label class="form-check-label" for="store_nilai">
                Tidak ada
            </label>
        </div>
        <p class="fst-italic text-info-emphasis">Pilih ada jika diperlukan penilaian.</p>
    </div>
    <div class="mb-3">
        <label for="berkas" class="form-label fw-bold">Teks</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="store_text" id="store_text" value="1" {{ old('store_text', $kriteria->store_text) == 1 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label class="form-check-label" for="store_text">
                Ada
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="store_text" id="store_text" value="0" {{ old('store_text', $kriteria->store_text) == 0 ? 'checked='.'"'.'checked'.'"' : '' }}>
            <label class="form-check-label" for="store_text">
                Tidak ada
            </label>
        </div>
        <p class="fst-italic text-info-emphasis">Pilih ada jika diperlukan teks.</p>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection