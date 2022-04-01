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

<form action="{{ url('admin/social-media/'.$socialmediaName) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="row">
      <div class="col-md-8">
        <div class="mb-3">
          <label for="{{ $socialmediaName }}" class="form-label">{{ $socialmediaName }}</label>
          <input class="form-control" name="{{ $socialmediaName }}" id="{{ $socialmediaName }}" placeholder="{{ $socialmediaName }} Link" value="{{ isset($socialmediaLink) ? $socialmediaLink : '' }}" required>
        </div>
      </div>          
  </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>
@endsection