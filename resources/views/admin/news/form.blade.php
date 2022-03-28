@extends('admin.layout.main')

@section('container')
<div class="row">
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

    </div>
</div>

<div class="row">
  <div class="col-md-8">
      <form method="post" action="{{ isset($newsData) ? url('/news/'.$newsData->id) : url('/news') }}" enctype="multipart/form-data">
          @csrf
          @if(isset($newsData))
          @method('put')
          @endif
          <div class="mb-3">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value="{{ isset($newsData) ? $newsData->title : old('title') }}">
              @if($errors->has('title'))
              <div class="invalid-feedback">
                {{ $errors->first('title') }}
              </div>
              @endif
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" value="{{ isset($newsData) ? $newsData->slug : old('slug') }}" autocomplete="off">
            @if($errors->has('slug'))
            <div class="invalid-feedback">
                {{ $errors->first('slug') }}
            </div>
            @endif
        </div>
          <div class="mb-3">
              <label for="image" class="form-label">Gambar</label><br>
              <input type="file" id="image" name="image">
              @if($errors->has('image'))
              <p class="text-danger" style="font-size: 12px;">{{ $errors->first('image') }}</p>
              @endif
          </div>
          <div class="mb-3">
            <textarea name="news" id="news" rows="10" cols="80">
                {{ isset($newsData) ? $newsData->news : old('news') }}
            </textarea>
            @if($errors->has('news'))
            <p class="text-danger" style="font-size: 12px;">{{ $errors->first('news') }}</p>
            @endif
          </div>
          {{-- <div class="mb-3">
              <input id="news" type="hidden" name="news" value="{{ isset($newsData) ? $newsData->news : old('news') }}">
              <trix-editor input="news"></trix-editor>
          </div> --}}
          <button type="submit" class="btn btn-primary mb-5">Submit</button>
      </form>
  </div>
</div>


<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'news' );
</script>
@endsection

@section('trix-editor')
<script>
  document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
  })

    $('#title').change(function(e) {
       $.get('{{ url('check_slug') }}', 
       { 'title': $(this).val() }, 
       function( data ) {
           $('#slug').val(data.slug);
       }
       );
    });
</script>



@endsection