@extends('layout.main')

@section('container')
{{-- {{ $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') }} --}}
<!-- Start banner Area -->
<!--::breadcrumb part start::-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h1>Register</h1>
                        <p>Home<span>/</span>Register</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h3 class="mb-30">Register Your Team</h3>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ isset($team) ? url('/register/'.$team->id) : url('/register')}}" method="post" enctype="multipart/form-data">@csrf
                        @if(isset($team))
                            @method('put')
                        @endif
                        <div class="mt-5">
                            <div class="form-select" >
                                <label for="school"><h6>Asal Instansi</h6></label>
                                <select name="school" id="school" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    <option value="">Pilih Instansi</option>
                                    <option value="SMP" @if(isset($team) && $team->school === 'SMP' || old('school') === 'SMP') {{ 'selected' }} @endif>SMP</option>
                                    <option value="SMA" @if(isset($team) && $team->school === 'SMA' || old('school') === 'SMA') {{ 'selected' }} @endif>SMA</option>
                                    <option value="Perguruan Tinggi" @if(isset($team) && $team->school === 'Perguruan Tinggi' || old('school') === 'Perguruan Tinggi') {{ 'selected' }} @endif>Perguruan Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5">
                            @if($errors->has('school')) <sup>{{ $errors->first('school') }}</sup><br> @endif
                            <div class="form-select" >
                                <label for="match_category"><h6>Kategori Pertandingan</h6></label>
                                <select name="match_category" id="match_category" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    <option value="">Pilih Kategori Pertandingan</option>
                                    <option value="3 : 3" @if(isset($team) && $team->match_category == '3 : 3' || old('match_category') == '3 : 3') selected @endif>3 : 3</option>
                                    <option value="5 : 5" @if(isset($team) && $team->match_category == '5 : 5' || old('match_category') == '5 : 5') selected @endif>5 : 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5">
                            @if($errors->has('match_category')) <sup>{{ $errors->first('match_category') }}</sup><br> @endif
                            <div class="form-select" >
                                <label for="player_category"><h6>Kategori Pemain</h6></label>
                                <select name="player_category" id="player_category" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    <option value="">Pilih Kategori Pemain</option>
                                    <option value="Laki - Laki" @if(isset($team) && $team->player_category == 'Laki - Laki' || old('player_category') == '3 : 3') selected @endif>Laki - Laki</option>
                                    <option value="Perempuan" @if(isset($team) && $team->player_category == 'Perempuan' || old('player_category') == '5 : 5') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5">
                            @if($errors->has('category')) <sup>{{ $errors->first('category') }}</sup><br> @endif
                            <label for="team_name"><h6>Nama Tim</h6></label>
                            <input type="text" name="team_name" id="team_name" placeholder="Nama Tim" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Tim'"
                                 class="single-input" value="{{ isset($team) ? $team->team_name : old('team_name') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                            @if($errors->has('team_name')) <sup>{{ $errors->first('team_name') }}</sup> @endif
                        </div>
                        <div class="mt-3">
                            <label for="team_logo"><h6>Logo Tim</h6></label><br>
                            <input type="file" name="logo" id="team_logo" @if(!isset($team)) required @endif {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}><br>
                            @if($errors->has('logo')) <sup>{{ $errors->first('logo') }}</sup> @endif
                        </div>
                        <div class="mt-3">
                            <label for="address"><h6>Alamat</h6></label>
                            <input type="text" name="address" id="address" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'"
                                 class="single-input" value="{{ isset($team) ? $team->address : old('address') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                            @if($errors->has('address')) <sup>{{ $errors->first('address') }}</sup> @endif
                        </div>
                        <div class="mt-4">
                            <label for="city"><h6>Kota/Kabupaten</h6></label>
                            <div class="form-select" id="default-select">
                                <select name="city" id="city" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    <option value="">Pilih Kota/Kabupaten</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @if(isset($team) && $team->city == $city->id || old('city') == $city->id) selected @endif>{{ $city->kab_kota }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('city')) <sup>{{ $errors->first('city') }}</sup> @endif
                        </div>
                        <div class="mt-3">
                            <label for="document"><h6>Document</h6></label><br>
                            <input type="file" name="document" id="document" @if(!isset($team)) required @endif {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}><br>
                            @if($errors->has('document')) <sup>{{ $errors->first('document') }}</sup> @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="coach_name"><h6>Nama Pelatih</h6></label>
                                    <input type="text" name="coach_name" id="coach_name" placeholder="Nama Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->coach_name : old('coach_name') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    @if($errors->has('coach_name')) <sup>{{ $errors->first('coach_name') }}</sup> @endif
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="coach_nik"><h6>NIK Pelatih</h6></label>
                                    <input type="text" name="coach_nik" id="coach_nik" placeholder="Coach NIK" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Coach NIK'"
                                     class="single-input" value="{{ isset($team) ? $team->coach_nik : old('coach_nik') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    @if($errors->has('coach_nik')) <sup>{{ $errors->first('coach_nik') }}</sup> @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="coach_lisense"><h6>Nomor Lisensi Pelatih</h6></label>
                                    <input type="text" name="coach_lisense" id="coach_lisense" placeholder="Nomor Lisensi Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Lisensi Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->coach_lisense : old('coach_lisense') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                     @if($errors->has('coach_lisense')) <sup>{{ $errors->first('coach_lisense') }}</sup> @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="coach_photo"><h6>Foto Pelatih</h6></label><br>
                                    <input type="file" name="coach_photo" id="coach_photo" @if(!isset($team)) required @endif {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}><br>
                                    @if($errors->has('coach_photo')) <sup>{{ $errors->first('coach_photo') }}</sup> @endif
                                </div>
                            </div>	
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="assistant_coach"><h6>Nama Asisten Pelatih</h6></label>
                                    <input type="text" name="assistant_coach" id="assistant_coach" placeholder="Nama Asisten Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Asisten Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->assistant_coach : old('assistant_coach') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                     @if($errors->has('assistant_coach')) <sup>{{ $errors->first('assistant_coach') }}</sup> @endif
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="assistant_coach_nik"><h6>NIK Asisten Pelatih</h6></label>
                                    <input type="text" name="assistant_coach_nik" id="assistant_coach_nik" placeholder="NIK Asisten Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Asisten Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->assistant_coach_nik : old('assistant_coach_nik') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                     @if($errors->has('assistant_coach_nik')) <sup>{{ $errors->first('assistant_coach_nik') }}</sup> @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="assistant_coach_lisense"><h6>Nomor Lisensi Asisten Pelatih</h6></label>
                                    <input type="text" name="assistant_coach_lisense" id="assistant_coach_lisense" placeholder="Nomor Lisensi Asisten Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Lisensi Asisten Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->assistant_coach_lisense : old('assistant_coach_lisense') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                     @if($errors->has('assistant_coach_lisense')) <sup>{{ $errors->first('assistant_coach_lisense') }}</sup> @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="assistant_coach_photo"><h6>Foto Asisten Pelatih</h6></label><br>
                                    <input type="file" name="assistant_coach_photo" id="assistant_coach_photo" @if(!isset($team)) required @endif {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}><br>
                                    @if($errors->has('assistant_coach_photo')) <sup>{{ $errors->first('assistant_coach_photo') }}</sup> @endif
                                </div>
                            </div>	
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-5">
                                    <label for="manager_name"><h6>Nama Manager</h6></label>
                                    <input type="text" name="manager_name" id="manager_name" placeholder="Nama Manager" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Manager'"
                                     class="single-input"value="{{ isset($team) ? $team->manager_name : old('manager_name') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                     @if($errors->has('manager_name')) <sup>{{ $errors->first('manager_name') }}</sup> @endif
                                </div>
                            </div>	
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-5">
                                    <label for="manager_nik"><h6>NIK Manager</h6></label>
                                    <input type="text" name="manager_nik" id="manager_nik" placeholder="NIK Manager" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Manager'"
                                     class="single-input" value="{{ isset($team) ? $team->manager_nik : old('manager_nik') }}" required {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                     @if($errors->has('manager_nik')) <sup>{{ $errors->first('manager_nik') }}</sup> @endif

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-5">
                                    <label for="manager_photo"><h6>Foto Manager</h6></label><br>
                                    <input type="file" name="manager_photo" id="manager_photo" @if(!isset($team)) required @endif {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}><br>
                                    @if($errors->has('manager_photo')) <sup>{{ $errors->first('manager_photo') }}</sup> @endif
                                </div>
                            </div>	
                        </div>

                        <div class="mt-5">
                            <h4 class="mb-20">Players</h4>
                        </div>
                        
                        @for($i=1;$i<=15;$i++)
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="p_name_{{ $i }}"><h6>Nama Pemain {{ $i }}</h6></label>
                                    <input type="text" name="p_name_{{ $i }}" id="p_name_{{ $i }}" placeholder="Nama Pemain {{ $i }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain {{ $i }}'"
                                     class="single-input" value="{{ isset($team['p_name_'.$i]) ? $team['p_name_'.$i] : old('p_name_'.$i) }}" {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    @if($errors->has('p_name_'.$i)) <sup>{{ $errors->first('p_name_'.$i) }}</sup> @endif

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="p_nik_{{ $i }}"><h6>NIK Pemain {{ $i }}</h6></label>
                                    <input type="text" name="p_nik_{{ $i }}" id="p_nik_{{ $i }}" placeholder="NIK Pemain {{ $i }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain {{ $i }}'"
                                     class="single-input" value="{{ isset($team['p_nik_'.$i]) ? $team['p_nik_'.$i] : old('p_nik_'.$i) }}" {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}>
                                    @if($errors->has('p_nik_'.$i)) <sup>{{ $errors->first('p_nik_'.$i) }}</sup> @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="p_photo_{{ $i }}"><h6>Foto Pemain {{ $i }}</h6></label>
                                        <input type="file" name="p_photo_{{ $i }}" id="p_photo_{{ $i }}" {{ isset($dateNow) && $dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d') ? 'disabled' : '' }}><br>
                                        @if($errors->has('p_photo_'.$i)) <sup>{{ $errors->first('p_photo_'.$i) }}</sup> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                        

 
                        <div class="mt-5">
                            @if(isset($dateNow) && !($dateNow->format('Y-m-d') > $dateRegistration->format('Y-m-d')))
                            <button type="submit" class="genric-btn primary">Simpan</button>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@endsection
