@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penilaian > {{ $rekrutmen->User->name }}</h1>
</div>

<div class="col-lg-8">
  <form action="/prioritas-pelamar/{{ $rekrutmen->id }}" method="post">
    @method('put')
    @csrf
    @foreach($rekrutmen->Pemberkasan as $key => $value)
    <div class="row border rounded-3 mb-3 p-3">
      <div class="row">
        <div class="col-md-2">
          <label for="nilai_{{ $key }}" class="form-label fw-bold">{{ $value->kriteria->criteria_name }}</label>
        </div>
        @if($value->kriteria->store_text == 1)
        <div class="col-md-8">
          <p>{{ $value->description }}</p>
        </div>
        @endif
      </div>
      @if($value->kriteria->store_nilai == 1)
      <div class="row">
        <div class="col-md-2">
          <label for="nilai" class="form-label fw-bold">Nilai</label>
        </div>
        <div class="col-md-8">
          <select class="form-select w-50" aria-label="Default select example" name="nilai_{{ $key }}">
            @foreach($value->kriteria->Subkriteria as $key => $val)
            <option value="{{ $val->weight }}" {{ $value->nilai == $val->weight ? 'selected='.'"'.'selected'.'"' : '' }}>{{ $val->subctr_name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      @endif

      @if($value->kriteria->store_berkas == 1)
      <div class="row mt-1">
        <div class="col-md-2">
          <label for="berkas" class="form-label">Berkas</label>
        </div>
        <div class="col-md-8">
          @if(empty($value->client_file_name))
          <p class="text-danger">File belum terupload.</p>
          @else
          <a href="/prioritas-pelamar/file/{{ $value->id }}" target="_blank" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Open file">
          <i class='bx bx-folder-open'></i>
          </a>
          <a href="/prioritas-pelamar/download/{{ $value->id }}" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download">
          <i class='bx bxs-download'></i>
          </a>
          @endif
        </div>
      </div>
      @endif  
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection