@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data</h1>
</div>
<div class="col-lg-8">
  <form action="/rekrutmen" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
      @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="kuota" class="form-label">Kuota</label>
      <p class="text-primary fs-6"><small class="fst-italic">Kuota merupakan batas jumlah yang akan diterima dari rangking teratas.</small></p>
      <input type="text" class="form-control @error('kuota') is-invalid @enderror" id="kuota" name="kuota" value="{{ old('kuota') }}" required>
      @error('kuota')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="informasi" class="form-label">Informasi</label>
      <input id="informasi" type="hidden" name="informasi" value="{{ old('informasi') }}">
      <trix-editor input="informasi"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

<script>
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
</script>