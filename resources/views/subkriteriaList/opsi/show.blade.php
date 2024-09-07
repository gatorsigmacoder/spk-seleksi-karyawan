@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Statistik pembobotan</h1>
</div>

<div class="container">
  <div class="row">
    <div class="w-50">
      <canvas id="myChart"></canvas>
    </div>
    <div class="w-50">
      <p class="fw-bolder fs-5">Rasio Konsistensi</p>
      <div class="row">
        <div class="w-auto h-auto fw-semibold fs-6"><p>&lambda; max : </p></div>
        <div class="w-auto"><p>{{ $konsistensi->l_max }}</p></div>
      </div>
      <div class="row">
        <div class="w-auto h-auto fw-semibold fs-6"><p>Consistency Index : </p></div>
        <div class="w-auto"><p>{{ $konsistensi->c_index }}</p></div>
      </div>
      <div class="row">
        <div class="w-auto h-auto fw-semibold fs-6"><p>Consistency Ratio : </p></div>
        <div class="w-auto"><p>{{ $konsistensi->c_ratio }}</p></div>
        @if($konsistensi->c_ratio > 0.1)
          <div class="w-auto"><p class="badge text-bg-danger">melebihi batas konsistensi!</p></div>
        @else
          <div class="w-auto"><p class="badge text-bg-success">Dibawah batas konsistensi</p></div>
        @endif
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  const data = {
  labels: [
    @foreach($subkriteria as $key => $value)
      '{{ $value->subctr_name }}',
    @endforeach
  ],
  datasets: [{
    label: 'Subkriteria',
    data: [
      @foreach($subkriteria as $key => $value)
        '{{ $value->weight }}',
      @endforeach
    ],
    fill: true,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  }]
};

  const config = {
    type: 'radar',
    data: data,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    },
  };
  new Chart(ctx, config);
</script>
@endsection
