@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $rekrutmen->name }}</h1>
</div>
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Pendaftar</th>
        <th scope="col">Penilaian</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rekrutmen->DaftarRekrutmen as $key => $value)
      <tr>
        <td class="col-md-1">{{ $loop->iteration }}</td>
        <td class="col-md-8">{{ $value->User->name }}</td>
        <td>
          <a class="btn btn-primary"
                  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="/prioritas-pelamar/{{ $value->id }}/edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Nilai">
            <i class='bx bx-slider'></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-md-2">
    <p class="fw-bold">Operation</p>
  </div>
</div>
<div class="row">
@if($rekrutmen->ready_to_announce == false)
  <div class="col-sm-2 col-lg-1 me-1">
    <form action="/prioritas-pelamar/hitung/{{ $rekrutmen->id }}" method="post">
      @csrf
      <button type="submit" class="btn btn-primary btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Prioritas">Prioritaskan</a>
    </form>
  </div>
@else
  <div class="col-md-2">
    <form action="/prioritas-pelamar/reset-hitung/{{ $rekrutmen->id }}" method="post">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Reset"><i class='bx bx-reset'></i> Reset perangkingan</a>
    </form>
  </div>
@endif
  <div class="col-sm-1">
    <a class="btn btn-primary btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="/prioritas-pelamar/hasil/{{ $rekrutmen->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hasil">Hasil</a>
  </div>
  @if($rekrutmen->is_announced == 0)
  <div class="col-md-1">
    <form action="/prioritas-pelamar/announce/{{ $rekrutmen->id }}" method="post">
      @csrf
      <button type="submit" class="btn btn-primary btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Prioritas" {{ $rekrutmen->ready_to_announce == 0 ? 'disabled' : '' }}>Umumkan</a>
    </form>
  </div>
  @else
  <div class="col-md">
    <form action="/prioritas-pelamar/cancel-announce/{{ $rekrutmen->id }}" method="post">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Batalkan" {{ $rekrutmen->ready_to_announce == 0 ? 'disabled' : '' }}><i class='bx bx-x-circle'></i> Batalkan pengumuman</a>
    </form>
  </div>
  @endif
</div>

@endsection