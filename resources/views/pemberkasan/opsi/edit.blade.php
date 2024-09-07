@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@if($pemberkasan->kriteria->store_berkas == true)Upload File @else Isi @endif {{ $pemberkasan->kriteria->criteria_name }}</h1>
</div>

<a href="{{ url()->previous() }}" class="btn btn-primary mb-3" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class='bx bx-arrow-back'></i>Kembali</a>

<div class="col-lg-8">
  <form action="/pemberkasan/update/{{ $pemberkasan->id }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="formFile" class="form-label">{{ $pemberkasan->kriteria->criteria_name }}</label>
      <input class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" value="{{ old('description',$pemberkasan->description) }}">
      @error('description')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection