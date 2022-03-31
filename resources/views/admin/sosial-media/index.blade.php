@extends('admin.layout.main')

@section('container')
<div class="row">
    <a class="btn btn-primary btn-sm mb-2 ml-2" href="{{ url('admin/gallery/create') }}"><i class="fas fa-plus"></i> Add Gallery</a>
</div>

<div class="row">
    <div class="col-md-12">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-bordered" style="background-color: white">
            <thead>
              <tr>
                <th>#</th>
                <th >Nama Sosial Media</th>
                <th >Link</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($social as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $item->name }}</td>
              <td>{{ $item->link }}</td>
              <td>
                  <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modalDelete" data-id="{{ $item->id }}" data-name="{{ $item->name }}"><i class="fas fa-trash"></i></a>
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
    var name = button.data('name')
  
    var modal = $(this)
    currLoc = $(location).attr('href')
    modal.find('.modal-footer form').attr("action", currLoc + "/" + id)
    modal.find('.modal-body').html("Yakin Ingin Menghapus "+ name +"?")
  })
</script>
@endsection