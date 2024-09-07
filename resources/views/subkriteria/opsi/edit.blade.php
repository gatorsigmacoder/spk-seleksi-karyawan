@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data</h1>
</div>
<div class="col-lg-8">
  <form action="/subkriteria/{{ $subkriteria->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="Child of" class="form-label">Child of</label>
      <select class="form-select" aria-label="Default select example" name="kriteria_id" disabled>
        <option value="{{ $subkriteria->kriteria_id }}" >{{ $subkriteria->kriteria->criteria_name }}</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Subkriteria</label>
      <input type="text" class="form-control @error('subctr_name') is-invalid @enderror" id="name" name="subctr_name" value="{{ old('subctr_name', $subkriteria->subctr_name) }}" required autofocus>
      @error('subctr_name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection