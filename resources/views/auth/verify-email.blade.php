@extends('layout.main')

@section('container')
<div class="row justify-content-center position-absolute top-50 start-50 translate-middle">
  <div class="col ">
    <div class="card border-success mb-3 w-100" style="max-width: 18rem;">
      <div class="card-header">Akun anda sudah terdaftar</div>
      <div class="card-body">
        <p class="card-text">Silahkan cek email anda untuk melakukan aktifasi akun.</p>
        @if(session()->has('message'))
        <p class="card-text text-success">{{ session('message') }}</p>  
        @endif
      </div>
      <div class="card-body">
      <div class="row">
        <div class="col">
          <form action="{{ route('verification.send') }}" method="post">
          @csrf
          <button type="submit" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-primary text-decoration-none">Resend e-mail</button>
          </form>
        </div>
        <div class="col">
          <form action="/logout" method="post">
          @csrf
          <button type="submit" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-danger text-decoration-none">Logout</button>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection