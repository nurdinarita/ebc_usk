@extends('admin.layout.main')

@section('container')
<div class="row">
    <a class="btn btn-primary btn-sm mb-2 ml-2" href="{{ url('/users/create') }}"><i class="fas fa-plus"></i> Add User</a>
</div>

<div class="row">
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-bordered" style="background-color: white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Users</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->username }}</td>
              <td>
                  <a class="btn btn-primary btn-sm" href="{{ url('users/'.$user->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection