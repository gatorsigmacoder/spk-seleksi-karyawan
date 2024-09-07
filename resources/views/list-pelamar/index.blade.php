@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pelamar</h1>
</div>
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Mendaftar Rekrutmen</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data_pelamar as $dat)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $dat->name}}</td>
        <td>@if($dat->DaftarRekrutmen)
            {{ count($dat->DaftarRekrutmen) }}
        @else
            {{ 0 }}
        @endif</td>
        <td>
            <a href="/list-pelamar/{{ $dat->id }}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show {{ $dat->name }}">
              <i class='bx bxs-show'></i>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection