@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data</h1>
</div>
<div class="col-lg-8">
  <form action="/hitung-kriteria" method="post">
    @csrf
    <div class="mb-3">
      <label for="Status" class="form-label">Rekrutmen</label>
      <select class="form-select @error('rekrutmen_model_id') is-invalid @enderror" aria-label="Default select example" name="rekrutmen_model_id">
        @foreach($rekrutmen as $rek)
            <option value="{{ $rek->id }}">{{ $rek->name }}</option>
        @endforeach
      </select>
      @error('rekrutmen_model_id')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection