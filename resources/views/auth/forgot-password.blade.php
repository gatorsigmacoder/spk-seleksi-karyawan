@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
    @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <main class="w-75 rounded-3 mt-5 p-4 m-auto bg-body-tertiary shadow">
            <h1 class="h3 mb-3 fw-normal text-center">Lupa Password</h1>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="form-floating">
                <input type="email" name="email" class="form-control form-control-sm mb-2 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{old('email')}}">
                <label for="email">Email</label>
                @error('email') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <button class="btn btn-primary" type="submit">Send</button>
            </form>
        </main>
    </div>
</div>
@endsection