@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Prioritas Kriteria</h1>
</div>
<div class="container">
        <div class="row justify-content-center">
        <table>
            <thead>
                <th scope="col">Kriteria</th>
                
        @for($i = 0; $i < count($kriteria); $i++)
        <th scope="col" class="text-center">{{ $kriteria[$i]['criteria_name'] }}</th>
        @endfor
        </thead>
        <tbody>
            <form action="/prioritas/store/{{ $rekrutmen->id }}" method="post" id="input-form">
                @csrf
                @for($i = 0; $i < count($kriteria); $i++)
                <tr>
                <th scope="row">
                    {{ $kriteria[$i]['criteria_name'] }}
                </th>
                    @for($j = 0; $j < count($kriteria); $j++)
                    @if($j == $i)
                    <td>
                            <select class="form-select" id="inputGroupSelect{{ $i }}-{{ $j }}" disabled>
                                <option value="1" @if(old(''.$i.'-'.$j.'') == "1") selected="selected" @endif>1</option>
                            </select>
                    </td>
                    @elseif($j < $i)
                    <td>
                            <select class="form-select" id="inputGroupSelect{{ $i }}-{{ $j }}" disabled>
                            </select>
                    </td>
                    @elseif($j >= $i)
                    <td>
                            <select class="form-select" id="inputGroupSelect{{ $i }}-{{ $j }}" name="{{ $i }}-{{ $j }}">
                                <option value="9" @if(old(''.$i.'-'.$j.'') == "9") selected="selected" @endif>9</option>
                                <option value="8" @if(old(''.$i.'-'.$j.'') == "8") selected="selected" @endif>8</option>
                                <option value="7" @if(old(''.$i.'-'.$j.'') == "7") selected="selected" @endif>7</option>
                                <option value="6" @if(old(''.$i.'-'.$j.'') == "6") selected="selected" @endif>6</option>
                                <option value="5" @if(old(''.$i.'-'.$j.'') == "5") selected="selected" @endif>5</option>
                                <option value="4" @if(old(''.$i.'-'.$j.'') == "4") selected="selected" @endif>4</option>
                                <option value="3" @if(old(''.$i.'-'.$j.'') == "3") selected="selected" @endif>3</option>
                                <option value="2" @if(old(''.$i.'-'.$j.'') == "2") selected="selected" @endif>2</option>
                                <option value="1" @if(old(''.$i.'-'.$j.'') == "1") selected="selected" @endif>1</option>

                                <option value="0.5" @if(old(''.$i.'-'.$j.'') == "0.5") selected="selected" @endif>1/2</option>
                                <option value="0.33333333333333333333333333333333" @if(old(''.$i.'-'.$j.'') == "0.33333333333333333333333333333333") selected="selected" @endif>1/3</option>
                                <option value="0.25" @if(old(''.$i.'-'.$j.'') == "0.25") selected="selected" @endif>1/4</option>
                                <option value="0.2" @if(old(''.$i.'-'.$j.'') == "0.2") selected="selected" @endif>1/5</option>
                                <option value="0.16666666666666666666666666666667" @if(old(''.$i.'-'.$j.'') == "0.16666666666666666666666666666667") selected="selected" @endif>1/6</option>
                                <option value="0.14285714285714285714285714285714" @if(old(''.$i.'-'.$j.'') == "0.14285714285714285714285714285714") selected="selected" @endif>1/7</option>
                                <option value="0.125" @if(old(''.$i.'-'.$j.'') == "0.125") selected="selected" @endif>1/8</option>
                                <option value="0.11111111111111111111111111111111" @if(old(''.$i.'-'.$j.'') == "0.11111111111111111111111111111111") selected="selected" @endif>1/9</option>
                            </select> 
                    </td>
                    @endif
                    @endfor
                    </tr>
                @endfor
            </tbody>
            </table>
                <center>
                    <button type="submit" class="btn btn-primary mt-2">Hitung</button>
                </center> 
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>
    <div class="row mt-3">
        <div class="col-md-5">
            <table class="table table-bordered table-sm text-center">
                <thead>
                    <tr>
                        <th>
                            Intensitas Kepentingan
                        </th>
                        <th>
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($intensitas as $key => $value)
                    <tr>
                        <td>
                            {{ $key }}
                        </td>
                        <td>
                            {{ $value }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>

<script>
    function hideElm(identifier){
        let arg1 = $(identifier).data('switch');
        console.log(arg1);
    }
</script>
@endsection