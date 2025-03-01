@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <main class="form-signin w-100 rounded-3 mt-5 p-4 m-auto bg-body-tertiary shadow">
            <h1 class="h3 mb-3 fw-normal text-center">Login Now!</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{old('email')}}">
                <label for="email">Email</label>
                @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <button class="btn btn-primary" type="submit">Login</button>
                <small class="d-block mt-2">Belum punya akun ? <a href="/register" class="text-decoration-none">buat akun sekarang</a></small>
                <small class="d-block mt-2"><a href="{{ route('password.request') }}" class="text-decoration-none">lupa password</a></small>
            </form>
        </main>
    </div>
</div>

@endsection