@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Nilai</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-2"><span class="align-middle">Data Nilai</span></div>
    <div class="col-6 col-sm-3">
        <a href="/subkriteria/create" class="btn btn-primary btn-sm">Tambah data</a>
    </div>
  </div>
</div>
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3 shadow-lg">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nilai</th>
        <th scope="col">Kriteria</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subkriteria as $key => $subctr)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $subctr->subctr_name }}</td>
        <td>{{ $subctr->kriteria->criteria_name }}</td>
        <td>
          <a class="btn btn-warning"
                  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="/subkriteria/{{ $subctr->id }}/edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
            <i class='bx bx-edit-alt'></i>
          </a>
          <form action="/subkriteria/{{ $subctr->id }}" method="post" class="d-inline">
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