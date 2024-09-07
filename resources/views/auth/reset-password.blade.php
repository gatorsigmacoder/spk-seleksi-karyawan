@extends('layout.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">
    @if(session()->has('email'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('email') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <main class="w-75 rounded-3 mt-5 p-4 m-auto bg-body-tertiary shadow">
            <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" class="form-control form-control-sm mb-2 @error('token') is-invalid @enderror" id="token" value="{{request()->token}}">
                <input type="hidden" name="email" class="form-control form-control-sm mb-2 @error('email') is-invalid @enderror" id="email" value="{{request()->email}}">
                <div class="form-floating">
                <input type="password" name="password" class="form-control form-control-sm mb-2 @error('password') is-invalid @enderror" id="password" placeholder="name@example.com" autofocus required value="{{old('password')}}">
                <label for="password">Password</label>
                @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-floating">
                <input type="password" name="password_confirmation" class="form-control form-control-sm mb-2 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="name@example.com" autofocus required value="{{old('password_confirmation')}}">
                <label for="password_confirmation">Password Confirmation</label>
                @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </main>
    </div>
</div>

@endsection