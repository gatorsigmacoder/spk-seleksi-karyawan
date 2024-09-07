@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Show</h1>
</div>
<div class="container">
  <div class="row mb-2">
    <div class="col-md-2 align-middle">
      <span class="input-group-text bg-transparent border-0" id="basic-addon1">Nama</span>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" value="{{ $data_pelamar->name }}" disabled>
    </div>
  </div>
  
  <div class="row mb-2">
    <div class="col-md-2 align-middle">
      <span class="input-group-text bg-transparent border-0" id="basic-addon1">Username</span>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" value="{{ $data_pelamar->username }}" disabled>
    </div>
  </div>
  
  <div class="row mb-2">
    <div class="col-md-2 align-middle">
      <span class="input-group-text bg-transparent border-0" id="basic-addon1">Email</span>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" value="{{ $data_pelamar->email }}" disabled>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-5 align-middle">
      <span class="input-group-text bg-transparent border-0 fw-bold" id="basic-addon1">Rekrutmen yang diikuti</span>
    </div>
  </div>
  @if($data_pelamar->DaftarRekrutmen->isNotEmpty())
      @foreach($data_pelamar->DaftarRekrutmen as $key => $value)
    <div class="row mb-1">
      <div class="col-md-5 align-middle">
        <span class="input-group-text bg-transparent border-0" id="basic-addon1">{{ $loop->iteration }}. {{ $value->RekrutmenModel->name }}</span>
      </div>
    </div>
      @endforeach
  @else
    <div class="row mb-1">
      <div class="col-md-5 align-middle">
        <span class="input-group-text bg-transparent border-0" id="basic-addon1">Tidak ada rekrutmen yang diikuti.</span>
      </div>
    </div>
  @endif
</div>
@endsection