@extends('admin.layout.main')

@section('container')
<div class="row">
    <div class="col-md-12 text-center">
        <h2>{{ $news->title }}</h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-2"></div>
    <div class="col-md-8 mb-4">
        <img src="{{ url('storage/news-image/'.$news->image) }}" width="100%" height="300px">
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <p class="text-secondary">Updated At : {{ $news->updated_at->format('D, d M Y') }}</p>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-2"></div>
    <div class="col-md-8 mb-5">
        {!! $news->news !!}
    </div>
</div>
@endsection