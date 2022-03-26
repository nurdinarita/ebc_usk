@extends('admin.layout.main')

@section('container')

@if(session('status'))
<div class="row">
  <div class="col-md-8">
    <p class="text-danger">
      {{ session('status') }}
    </p>
  </div>
</div>
@endif

<div class="row">
    <div class="col-md-8">
        <form action="{{ isset($user) ? url('/users/'.$user->id) : url('/users') }}" method="post">
            @csrf
            @if(isset($user))
            @method('put')
            @endif
            <div class="mb-3">
              <label for="username" class="form-label">username</label>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ isset($user) ? $user->username : old('username') }}" autofocus {{ isset($user) ? 'disabled' : '' }}>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="mb-3">
              <label for="passwordconfirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="passwordconfirmation" placeholder="Konfirmasi Password" name="passwordconfirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection