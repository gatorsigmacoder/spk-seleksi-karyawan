@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Analisa Bobot Nilai</h1>
</div>
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3 shadow">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kriteria</th>
        <th scope="col">Di hitung</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subctr_compare_list as $scl)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $scl->criteria_name }}</td>
        <td><i class="bx {{ $scl->is_calculated == 1 ? 'bx-check-circle text-success' : 'bx-x-circle text-danger'}}"></i></td>
        <td>
            {{-- <button type="button" class="btn btn-primary"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hitung">
                <i class='bx bx-bar-chart-alt-2'></i>
            </button> --}}
            <a href="/hitung-subkriteria/analisa/{{ $kriteria = $scl->id }}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Analisa">
                <i class='bx bxs-analyse' ></i>
            </a>
            <button onclick="location.href='/hitung-subkriteria/{{ $hitung_subkriterium = $scl->id }}'" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Lihat statistik" {{ $scl->is_calculated == 0 ? 'disabled' : '' }}>
                <i class='bx bx-bar-chart-alt-2'></i>
            </button>
            <form action="/hitung-subkriteria/{{ $scl->id }}" method="post" class="d-inline hapus">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger delete" data-text = "reset"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" id="del"><i class='bx bx-reset'></i></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection