@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Hasil Seleksi {{ $seleksi->name }}</h1>
</div>
<div class="table bg-success-subtle px-4 py-3 mt-3 rounded-3">
  <table class="table table-sm table-custom">
    <thead>
      <tr>
        <th scope="col">Nama</th>
        <th scope="col">Rank</th>
        <th scope="col">Rincian nilai</th>
      </tr>
    </thead>
    <tbody>
      @foreach($rekrutmen as $key => $value)
      <tr>
        <td class="col-md-5">{{ $value->User->name }}</td>
        <td class="col-md-1">{{ $loop->iteration }}</td>
        <td class="col-md-1">
          <a class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" href="/prioritas-pelamar/hasil/rincian/{{ $value->User->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Nilai">
              <i class='bx bx-show'></i>
            </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- <div class="container">
  <div class="row">
    <div class="w-50">
      <canvas id="myChart"></canvas>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  const data = {
  labels: [
    @foreach($rekrutmen as $key => $value)
        '{{ $value->user->name }}',
    @endforeach
  ],
  datasets: [{
    label: 'Vektor V',
    data: [
      @foreach($rekrutmen as $key => $value)
        '{{ $value->vektor_v }}',
      @endforeach
    ],
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)'
  },
  {
    label: 'Vektor S',
    data: [
      @foreach($rekrutmen as $key => $value)
        '{{ $value->vektor_s }}',
      @endforeach
    ],
    backgroundColor: 'rgba(25, 167, 206, 0.2)',
    borderColor: 'rgb(25, 167, 206)'
  }]
};

  const config = {
    type: 'bar',
    data: data,
    options: {
      indexAxis: 'y',
      // Elements options apply to all of the options unless overridden in a dataset
      // In this case, we are setting the border of each horizontal bar to be 2px wide
      elements: {
        bar: {
          borderWidth: 2,
        }
      },
      responsive: true,
      plugins: {
        legend: {
          position: 'right',
        },
        title: {
          display: true,
          text: 'Ranking Pelamar'
        }
      }
    },
  };
  new Chart(ctx, config);
</script> --}}
@endsection