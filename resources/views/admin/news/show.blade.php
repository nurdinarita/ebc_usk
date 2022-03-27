@extends('admin.layout.main')

@section('container')
<div class="row">
    <div class="col-md-12 text-center">
        <h2>{{ $news->title }}</h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12 text-center">
        <img src="{{ url('storage/'.$news->image) }}" width="500px">
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-2"></div>
    <div class="col-md-8 mb-5">
        {!! $news->news !!}
    </div>
</div>
@endsection