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
        <form action="{{ isset($event) ? url('/event/'.$event->id) : url('/event') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($event))
            @method('put')
            @endif
            <div class="mb-3">
              <label for="event_name" class="form-label">Nama Event</label>
              <input type="text" class="form-control" id="event_name" placeholder="Nama Event" name="event_name" value="{{ isset($event) ? $event->event_name : old('event_name') }}">
            </div>
            <div class="mb-3">
              <label for="event-image" class="form-label">Gambar</label><br>
              <input type="file"  id="event_image" name="event_image">
            </div>
            <div class="mb-3">
              <label for="registration_end_date" class="form-label">Tanggal Terakhir Registrasi</label>
              <input type="date" class="form-control" id="registration_end_date" placeholder="Tanggal Terakhir Registrasi" name="registration_end_date" value="{{ isset($event) ? $event->registration_end_date : old('registration_end_date') }}">
            </div>
            <div class="mb-3">
              <label for="event_start_date" class="form-label">Tanggal Mulai Event</label>
              <input type="date" class="form-control" id="event_start_date" placeholder="Tanggal Mulai Event" name="event_start_date" value="{{ isset($event) ? $event->event_start_date : old('event_start_date') }}">
            </div>
            <div class="mb-3">
              <label for="event_end_date" class="form-label">Tanggal Berakhir Event</label>
              <input type="date" class="form-control" id="event_end_date" placeholder="Tanggal Berakhir Event" name="event_end_date" value="{{ isset($event) ? $event->event_end_date : old('event_end_date') }}">
            </div>
            <div class="mb-3">
              <label for="location" class="form-label">Lokasi Event</label>
              <input type="text" class="form-control" id="location" placeholder="Lokasi Event" name="location" value="{{ isset($event) ? $event->location : old('location') }}">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label><br>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Deskripsi Event" id="description" name="description">{{ isset($event) ? $event->description : old('description') }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>
@endsection