@extends('admin.layout.main')

@section('container')
<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered" style="background-color: white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Teams</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $team->team_name }}</td>
              <td>
                  <a class="btn btn-info btn-sm" href="{{ url('teams/'.$team->id) }}"><i class="fas fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection