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

<form action="{{ isset($social) ? url('admin/social-media/'.$social->id) : url('admin/social-media/') }}" method="post">
  @csrf
  @if(isset($social))
    @method('put')
  @endif
  <div class="row">
      <div class="col-md-8">
        <div class="mb-3">
          <label for="facebook" class="form-label">Facebook</label>
          <input class="form-control" name="facebook" id="facebook" placeholder="Facebook Link" value="{{ isset($social->facebook) ? $social->facebook : '' }}">
        </div>
      </div>          
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="mb-3">
        <label for="twitter" class="form-label">Twitter</label>
        <input class="form-control" name="twitter" id="twitter" placeholder="Twitter Link" value="{{ isset($social->twitter) ? $social->twitter : '' }}">
      </div>
    </div>          
</div>
  <div class="row">
      <div class="col-md-8">
        <div class="mb-3">
          <label for="instagram" class="form-label">Instagram</label>
          <input class="form-control" name="instagram" id="instagram" placeholder="Instagram Link" value="{{ isset($social->instagram) ? $social->instagram : '' }}">
        </div>
      </div>          
  </div>
  <div class="row">
      <div class="col-md-8">
        <div class="mb-3">
          <label for="skype" class="form-label">Skype</label>
          <input class="form-control" name="skype" id="skype" placeholder="Skype Link" value="{{ isset($social->skype) ? $social->skype : '' }}">
        </div>
      </div>          
  </div>

        <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>
@endsection