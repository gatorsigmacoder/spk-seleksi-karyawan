@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Isi Data Regtister</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="name" required value="{{ old('name') }}">
                <label for="Name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="username" required value="{{ old('username') }}">
                <label for="floatingInput">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                <label for="Email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="form-floating">
                <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar</button>
                <small class="d-block mt-2">Udah punya akun ? <a href="/login">Ke halaman login sekarang</a></small>
            </form>
        </main>
    </div>
</div>
@endsection