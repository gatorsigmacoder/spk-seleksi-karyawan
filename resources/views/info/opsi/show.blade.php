@extends('layout.main')

@section('container')

<div class="container mt-3">
    <a class="text-decoration-none text-dark " href="{{ url()->previous() }}">
        <u>< Back</u>
    </a>
    <div class="row mt-1" style="background:#1B2430;">
        <div class="col-lg-9 p-4 h-50 mx-auto d-flex">
            <h2 class="text-light">{{ $rekrutmen->name }}</h2>
        </div>
        <div class="col-md-3 p-4 h-50 mx-auto d-flex">
            <a class="btn btn-outline-light btn-sm" href="/login">
                Apply Now!
            </a>
        </div>
    </div>
    <p>
    {!! $rekrutmen->informasi !!}
    </p>
</div>


@endsection