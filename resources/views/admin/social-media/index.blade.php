@extends('admin.layout.main')

@section('container')
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
              <th scope="row">1</th>
              <td>Facebook</td>
              <td><a href="{{ $item->facebook }}" target='_blank'>{{ $item->facebook }}</a></td>
              <td>
                <a class="btn btn-primary btn-sm" href="{{ url('admin/social-media/facebook/edit') }}"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Twitter</td>
              <td><a href="{{ $item->Twitter }}" target='_blank'>{{ $item->twitter }}</a></td>
              <td>
                <a class="btn btn-primary btn-sm" href="{{ url('admin/social-media/twitter/edit') }}"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Instagram</td>
              <td><a href="{{ $item->instagram }}" target='_blank'>{{ $item->instagram }}</a></td>
              <td>
                <a class="btn btn-primary btn-sm" href="{{ url('admin/social-media/instagram/edit') }}"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Skype</td>
              <td><a href="{{ $item->skype }}" target='_blank'>{{ $item->skype }}</a></td>
              <td>
                <a class="btn btn-primary btn-sm" href="{{ url('admin/social-media/skype/edit') }}"><i class="fas fa-edit"></i></a>
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
