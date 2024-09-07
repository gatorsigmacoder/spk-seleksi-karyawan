@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data</h1>
</div>
<div class="col-lg-8">
  <form action="/hitung-subkriteria" method="post">
    @csrf
    <div class="mb-3">
      @foreach($kriteria as $kr =>$val )
      <div class="form-check">
        <input class="form-check-input @error('kriteria_id') is-invalid @enderror" type="checkbox" value="{{ $val->id }}" id="flexCheckDefault" name="kriteria_id[]">
        <label class="form-check-label" for="flexCheckDefault">
          {{ $val->criteria_name }}
        </label>
      </div>
      @error('kriteria_id')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection