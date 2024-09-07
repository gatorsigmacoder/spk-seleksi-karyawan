@extends('layout.main')

@section('container')

<div class="container mt-3">
@if($rekrutmen->count() > 0)
@foreach($rekrutmen as $key => $value)
  <div class="card mb-3 overflow-hidden" style="max-width: 400px; background: #1B2430;">
      <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title text-light">{{ $value->name }}</h5>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
                <a class="btn btn-light btn-sm" href="/info/{{ $value->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                  View Job
                </a>
            </div>
          </div>
      </div>
  </div>
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
     Belum ada rekrutmen yang dibuka.
  </div>
</div>
@endif
</div>

@endsection