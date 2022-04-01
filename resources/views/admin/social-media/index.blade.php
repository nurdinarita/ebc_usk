@extends('admin.layout.main')

@section('container')
<div class="row">
  <a class="btn btn-primary btn-sm mb-2 ml-2" href="{{ url('admin/social-media/set') }}"><i class="fas fa-plus"></i> Set Sosial Media</a>
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
              </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Facebook</td>
              <td><a href="{{ isset($social->facebook) ? $social->facebook : ''}}" >{{ isset($social->facebook) ? $social->facebook : '' }}</a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Twitter</td>
              <td><a href="{{ isset($social->twitter) ? $social->twitter : '' }}" >{{ isset($social->twitter) ? $social->twitter : '' }}</a></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Instagram</td>
              <td><a href="{{ isset($social->instagram) ? $social->instagram : ''}}" >{{ isset($social->instagram) ? $social->instagram : '' }}</a></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Skype</td>
              <td><a href="{{ isset($social->skype) ? $social->skype : '' }}" >{{ isset($social->skype) ? $social->skype : '' }}</a></td>
            </tr>
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
