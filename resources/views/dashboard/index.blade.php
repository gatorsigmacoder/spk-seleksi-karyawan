@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>
<div class="container">
  <div class="row">
    <a href="/list-pelamar" class="col-md-3 border rounded-3 p-3 text-center bg-success text-light text-decoration-none">
      <i class='bx bxs-user fs-5'></i><p class="fw-normal">{{ count($pelamar) }} Pelamar</p>
    </a>
    <a href="/rekrutmen" class="col-md-3 border rounded-3 p-3 text-center bg-primary text-light ms-3 text-decoration-none">
      <i class='bx bxs-briefcase-alt-2'></i><p class="fw-normal">{{ count($rekrutmen) }} Rekrutmen</p>
    </a>
  </div>
</div>
@endsection