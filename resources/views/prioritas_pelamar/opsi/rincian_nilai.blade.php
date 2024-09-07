@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Rincian Nilai</h1>
</div>
@foreach($pendaftar as $key => $value)
    @foreach($value->Pemberkasan as $k => $val)
        <p>{{ $val->kriteria->criteria_name }} : 
        @foreach($val->kriteria->Subkriteria as $kei => $v)
         {{ $val->nilai == $v->weight ? $v->subctr_name : '' }}
        @endforeach</p>
    @endforeach
@endforeach
@endsection