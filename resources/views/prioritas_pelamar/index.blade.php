@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Rangking Pendaftar</h1>
</div>

<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3 shadow">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Rekrutmen</th>
        <th scope="col">Kuota</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @if($rekrutmen)
      @foreach($rekrutmen as $key => $value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->kuota }}</td>
            <td>
            <a class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="/prioritas-pelamar/{{ $value->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Prioritas Pelamar">
                <i class='bx bxs-analyse' ></i>
            </a>
            </td>
        </tr>
      @endforeach
      @else
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>

        <div class="alert alert-primary d-flex align-items-center w-50" role="alert">
        <i class='bx bxs-info-circle me-2'></i>
        <div>
            Belum ada rekrutmen yang didaftarkan.
        </div>
        </div>
      @endif
    </tbody>
  </table>
</div>
@endsection