@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Analisa Bobot Kriteria</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Rekrutmen</th>
        <th scope="col">Di plotting</th>
        <th scope="col">Di hitung</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rekrutmen as $rek)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $rek->name }}</td>
        <td><i class="bx {{ $rek->is_plotted == 1 ? 'bx-check-circle text-success' : 'bx-x-circle text-danger'}}"></i></td>
        <td><i class="bx {{ $rek->is_calculated == 1 ? 'bx-check-circle text-success' : 'bx-x-circle text-danger'}}"></i></td>
        <td>
            <a href="/hitung-kriteria/adjustment/{{ $hitung_kriterium = $rek->id }}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Plotting kriteria">
              <i class='bx bx-list-plus'></i>
            </a>
            <a href="/hitung-kriteria/analisa/{{ $hitung_kriterium = $rek->id }}" class="btn btn-primary btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Prioritaskan kriteria">
              <i class='bx bxs-analyse' ></i>
            </a>
            <button onclick="location.href='/hitung-kriteria/{{ $hitung_kriterium = $rek->id }}'" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Lihat statistik" {{ $rek->is_calculated === 0 ? 'disabled' : '' }}>
                <i class='bx bx-bar-chart-alt-2'></i>
            </button>
            <form action="/hitung-kriteria/{{ $rek->id }}" method="post" class="d-inline hapus">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger delete" data-text = "reset"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reset" id="del"><i class='bx bx-reset'></i></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection