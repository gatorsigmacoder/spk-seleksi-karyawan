@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Plotting Kriteria</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="/hitung-kriteria/adjustment/simpan/{{ $rekrutmen->id }}" method="post" id="input-form">
                @csrf
                @foreach($kriteria as $key => $value)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $value->id }}"    name="kriteria_{{ $key }}" id="flexCheckDefault" @if(old('kriteria_'.$key.'') == $value->id) checked="checked" @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $value->criteria_name }}
                        </label>
                    </div>
                @endforeach
                <center>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </center> 
            </form>
        </div>
    </div>
</div>
@endsection