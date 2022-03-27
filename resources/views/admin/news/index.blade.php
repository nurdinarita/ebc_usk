@extends('admin.layout.main')

@section('container')
<div class="row">
    <a class="btn btn-primary btn-sm mb-2 ml-2" href="{{ url('/news/create') }}"><i class="fas fa-plus"></i> Post Berita</a>
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
                  <th class="col-1">#</th>
                  <th scope="col">Judul</th>
                  <th class="col-3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($news as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->title }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ url('/news/'.$item->slug) }}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/news/'.$item->slug.'/edit') }}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection