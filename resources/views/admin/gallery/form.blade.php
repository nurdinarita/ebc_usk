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
        <form action="{{ isset($gallery) ? url('admin/gallery/'.$gallery->id) : url('admin/gallery') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($gallery))
            @method('put')
            @endif
            <div class="mb-3">
              <label for="gallery_image" class="form-label">Gambar Galery</label><br>
              <input type="file"  id="gallery_image" name="gallery_image" required>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
@endsection