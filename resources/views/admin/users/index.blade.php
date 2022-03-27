@extends('admin.layout.main')

@section('container')
<div class="row">
    <a class="btn btn-primary btn-sm mb-2 ml-2" href="{{ url('/users/create') }}"><i class="fas fa-plus"></i> Add User</a>
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
                <th scope="col">#</th>
                <th scope="col">Users</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->username }}</td>
              <td>
                  <a class="btn btn-primary btn-sm" href="{{ url('users/'.$user->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modalDelete" data-id="{{ $user->id }}" data-user="{{ $user->username }}"><i class="fas fa-trash"></i></a>
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
    var user = button.data('user')
  
    var modal = $(this)
    currLoc = $(location).attr('href')
    modal.find('.modal-footer form').attr("action", currLoc + "/" + id)
    modal.find('.modal-body').html("Yakin Ingin Menghapus <strong>" + user + "</strong> ?")
  })
</script>
@endsection