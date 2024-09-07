@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Data</h1>
</div>
<div class="col-lg-8">
  <form action="/subkriteria" method="post">
    @csrf
    <div class="mb-3">
      <label for="parent" class="form-label">Kriteria</label>
      <select class="form-select" aria-label="Default select example" name="kriteria_id" id="parent">
        @foreach($kriteria as $key => $value)
        <option value="{{ $value->id }}" >{{ $value->criteria_name }}</option>
        @endforeach
      </select>
    </div>
    <span class="form-label fw-bold">Subkriteria</span>
    <div class="mb-3" id="container">
      <div class="row mb-2">
        <div class="col-md-5">
          <input type="text" class="form-control @error('subctr_name[]') is-invalid @enderror" name="subctr_name[]" placeholder="Subkriteria" required autofocus>
          @error('subctr_name[]')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-2">
          <a onclick="addElm();" class="btn btn-success border p-auto text-center" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add"><i class='bx bx-plus'></i></a>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
  function addElm(){
        $("#container").append(
          `<div class="row mb-2">
        <div class="col-md-5">
          <input type="text" class="form-control @error('subctr_name[]') is-invalid @enderror" name="subctr_name[]" placeholder="Subkriteria" required autofocus>
          @error('subctr_name[]')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-2">
          <a class="btn btn-danger border p-auto text-center remove-button" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Add"><i class='bx bx-minus'></i></a>
        </div>
      </div>`
        );
    }

  $(document).on('click', '.remove-button', function(e){
    e.preventDefault();
    let row = $(this).parent().parent();
    $(row).remove();
  }); 
</script>