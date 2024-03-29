@extends('admin.layout.main')

@section('container')
<div class="row">
  <div class="col-md-6">
    <div class="card mt-2 mb-2">
      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            <img src="{{ url('storage/teams-logo/'.$team->logo) }}" height="80px">
          </div>
          <div class="col-md-2">
            <a href="{{ url('/teams') }}">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h5 class="mt-3">{{ $team->team_name }}</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <p class="card-subtitle mt-2">Kategori Pertandingan : {{ $team->match_category }}</p>
            <p class="card-subtitle mt-2">Kategori Pemain : {{ $team->player_category }}</p>
            <p class="card-subtitle mt-2"><img src="{{ url('storage/manager-photo/'.$team->manager_photo) }}" width="80px" alt=""></p>
            <p class="card-subtitle mt-2">Manager : {{ $team->manager_name }}</p>
            <p class="card-subtitle mt-2">NIK Manager : {{ $team->manager_nik }}</p>
            <p class="card-subtitle mt-3"><img src="{{ url('storage/coach-photo/'.$team->coach_photo) }}" width="80px" alt=""></p>
            <p class="card-subtitle mt-2">Pelatih : {{ $team->coach_name }}</p>
            <p class="card-subtitle mt-2">NIK Pelatih : {{ $team->coach_nik }}</p>
            <p class="card-subtitle mt-2">Lisensi Pelatih : {{ $team->coach_lisense }}</p>
            <p class="card-subtitle mt-3"><img src="{{ url('storage/assistant-coach-photo/'.$team->assistant_coach_photo) }}" width="80px" alt=""></p>
            <p class="card-subtitle mt-2">Asisten Pelatih : {{ $team->assistant_coach }}</p>
            <p class="card-subtitle mt-2">NIK Asisten Pelatih : {{ $team->assistant_coach_nik }}</p>
            <p class="card-subtitle mt-2">Lisensi Asisten Pelatih : {{ $team->assistant_coach_lisense }}</p>
          </div>
          <div class="col-md-5">
            <p class="card-subtitle mt-2">Alamat : {{ $team->address }}</p>
            <p class="card-subtitle mt-2">Kota : {{ $team->city }}</p>
            <p class="card-subtitle mt-2">Document : <a href="{{ url('storage/'.$team->document) }}">Document Team</a></p>
          </div>
        </div>
        {{-- <a href="{{ url('/bagian/'.$bagian->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>  --}}
        {{-- <button type="submit" class="btn btn-small btn-danger" data-toggle="modal" data-target="#deleteBagian" data-id="{{ $bagian->id }}"><i class="fas fa-trash"></i></button> --}}
      </div>
    </div>
  </div>

  <div class="col-md-6 mt-2">
    <table class="table table-bordered" style="background-color: white">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Player Name</th>
          <th scope="col">Player NIK</th>
          <th scope="col">Player Photo</th>
        </tr>
      </thead>
      <tbody>
      
      @for($i=1;$i<=10;$i++)
      <tr>
        <th scope="row">{{ $i }}</th>
        <td>{{ $team['p_name_'.$i] }}</td>
        <td>{{ $team['p_nik_'.$i]}}</td>
        <td class="col-2">
          @if(isset($team['p_photo_'.$i]) != '')
          <img src="{{ url('storage/player-photo/'.$team['p_photo_'.$i])}}" width="100%">
          @endif
        </td>
      </tr>
      @endfor
      
      </tbody>
  </table>
  </div>
</div>
@endsection