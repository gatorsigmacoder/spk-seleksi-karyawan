@extends('dashboard.layouts.main')

@section('container')

<div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="row">
    <div class="col-md-12">
      <h1 class="h2">{{ $rekrutmen->RekrutmenModel->name }}</h1>
    </div>
  </div>
  <div class="row">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/daftar-rekrutmen">Daftar Rekrutmen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pemberkasan</li>
      </ol>
    </nav>
  </div>
</div>

<div class="container mt-3">
        @foreach($pemberkasan as $key => $value)
          @if($value->kriteria->store_berkas === 1)
          <div class="row border p-2 rounded-2 mb-3">
            <div class="col">
              <div class="row">
                <div class="col-md-2 col-sm-3">
                    <p class="fw-semibold">{{ $value->kriteria->criteria_name }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-3">
                    <p class="fw-normal">File</p>
                </div>
                <div class="col">
                    @if($value->client_file_name)
                    <a href="/daftar-rekrutmen/pemberkasan/open-file/{{ $value->id }}" target="_blank" rel="noopener noreferrer">
                    {{ $value->client_file_name }}
                    </a>
                    @else
                    <a href="/daftar-rekrutmen/pemberkasan/upload/{{ $value->id }}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Upload file</a>
                    @endif
                </div>
              </div>
            </div>
          </div>
          @elseif($value->kriteria->store_text === 1)
          <div class="row border p-2 rounded-2 mb-3">
            <div class="col">
              <div class="row">
                <div class="col-md-2 col-sm-3">
                    <p class="fw-semibold">{{ $value->kriteria->criteria_name }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-3">
                    <p class="fw-normal">Deskripsi</p>
                </div>
                <div class="col">
                    @if($value->description)
                    <a href="/daftar-rekrutmen/pemberkasan/edit/{{ $value->id }}" class="btn btn-warning" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</a>
                    @else
                    <a href="/daftar-rekrutmen/pemberkasan/upload/{{ $value->id }}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Isi</a>
                    @endif
                </div>
              </div>
            </div>
          </div>
          @endif
        @endforeach
</div>
@endsection