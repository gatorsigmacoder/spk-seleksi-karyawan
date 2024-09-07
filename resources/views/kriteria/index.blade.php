@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kriteria</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-sm-2"><span class="align-middle">Data kriteria</span></div>
    <div class="col-6 col-sm-3">
        <a href="/kriteria/create/" class="btn btn-primary btn-sm">Tambah data</a>
    </div>
  </div>
</div>
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3 shadow">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kriteria</th>
        <th scope="col">Nilai</th>
        <th scope="col">Berkas</th>
        <th scope="col">Teks</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kriteria as $kriterium)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $kriterium->criteria_name }}</td>
        <td><i class="bx {{ $kriterium->store_nilai == 1 ? 'bx-check-circle text-success' : 'bx-x-circle text-danger'}}"></i></td>
        <td><i class="bx {{ $kriterium->store_berkas == 1 ? 'bx-check-circle text-success' : 'bx-x-circle text-danger'}}"></i></td>
        <td><i class="bx {{ $kriterium->store_text == 1 ? 'bx-check-circle text-success' : 'bx-x-circle text-danger'}}"></i></td>
        <td>
          <a class="btn btn-warning"
                  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="/kriteria/{{ $kriterium->id }}/edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
            <i class='bx bx-edit-alt'></i>
          </a>
          <form action="/kriteria/{{ $kriterium->id }}" method="post" class="d-inline hapus">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger delete" data-text = "delete"
                  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" id="del"><i class='bx bx-trash'></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection