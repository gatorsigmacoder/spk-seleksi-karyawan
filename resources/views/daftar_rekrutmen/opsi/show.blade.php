@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pengumuman</h1>
</div>
<div class="container">
  @if($DaftarRekrutmen->is_accepted == true)
    <div class="card">
        <h5 class="card-header">Pengumuman {{ $DaftarRekrutmen->RekrutmenModel->name }}</h5>
        <div class="card-body">
            <p class="card-text">Nama   : {{ $DaftarRekrutmen->User->name }}</p>
            <p class="card-text text-success">Selamat! Anda kami terima. Untuk proses selanjutnya silahkan hubungi pihak terkait.</p>
            <a href="{{ URL::previous() }}" class="btn btn-primary"><i class='bx bx-arrow-back'></i> Kembali</a>
        </div>
    </div>
  @else
    <div class="card">
        <h5 class="card-header">Pengumuman {{ $DaftarRekrutmen->RekrutmenModel->name }}</h5>
        <div class="card-body">
            <p class="card-text">Nama   : {{ $DaftarRekrutmen->User->name }}</p>
            <p class="card-text text-danger">Mohon maaf anda belum dapat kami terima untuk saat ini.</p>
            <a href="{{ URL::previous() }}" class="btn btn-primary"><i class='bx bx-arrow-back'></i> Kembali</a>
        </div>
    </div>
  @endif
</div>
@endsection