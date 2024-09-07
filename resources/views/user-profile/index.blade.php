@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Profile</h1>
</div>
<form action="/user-profile/{{ $user_data->id }}" method="post">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control form-control-sm w-50 @error('name') is-invalid @enderror" id="nama" name="name" value="{{ old('name', $user_data->name) }}" placeholder="Your name">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control form-control-sm w-50 @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user_data->username) }}" placeholder="Username">
    @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control form-control-sm w-50" id="email" value="{{ old('email', $user_data->email) }}" placeholder="email" disabled>
  </div>
  <button type="submit" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class='bx bx-check'></i></button>
</form>
@endsection