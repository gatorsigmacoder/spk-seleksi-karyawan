@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pelamar</h1>
</div>

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col" class="text-center">Options</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>NULL</td>
                <td>{{ $user->email}}</td>
                <td class="text-center"><span data-feather="more-vertical" class="align-text-bottom"></span></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection