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
                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modalDelete" data-id="{{ $item->id }}" data-title="{{ $item->title }}"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <form action="" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('delete')
<script>
  $('#modalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var title = button.data('title')
  
    var modal = $(this)
    currLoc = $(location).attr('href')
    modal.find('.modal-footer form').attr("action", currLoc + "/" + id)
    modal.find('.modal-body').html("Yakin Ingin Menghapus <strong>" + title + "</strong> ?")
  })
</script>
@endsection