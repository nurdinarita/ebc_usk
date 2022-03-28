@extends('layout.main')

@section('container')

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
                                <select name="school" id="school">
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
                                <label for="category"><h6>Kategori</h6></label>
                                <select name="category" id="category">
                                    <option value="">Pilih Kategori</option>
                                    <option value="3 : 3" @if(isset($team) && $team->category === '3 : 3' || old('category') === '3 : 3') {{ 'selected' }} @endif>3 : 3</option>
                                    <option value="5 : 5" @if(isset($team) && $team->category === '5 : 5' || old('category') === '5 : 5') {{ 'selected' }} @endif>5 : 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5">
                            @if($errors->has('category')) <sup>{{ $errors->first('category') }}</sup><br> @endif
                            <label for="team_name"><h6>Nama Tim</h6></label>
                            <input type="text" name="team_name" id="team_name" placeholder="Nama Tim" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Tim'"
                                 class="single-input" value="{{ isset($team) ? $team->team_name : old('team_name') }}">
                            @if($errors->has('team_name')) <sup>{{ $errors->first('team_name') }}</sup> @endif
                        </div>
                        <div class="mt-3">
                            <label for="team_logo"><h6>Logo Tim</h6></label><br>
                            <input type="file" name="logo" id="team_logo"><br>
                            @if($errors->has('logo')) <sup>{{ $errors->first('logo') }}</sup> @endif
                        </div>
                        <div class="mt-3">
                            <label for="address"><h6>Alamat</h6></label>
                            <input type="text" name="address" id="address" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'"
                                 class="single-input" value="{{ isset($team) ? $team->address : old('address') }}">
                            @if($errors->has('address')) <sup>{{ $errors->first('address') }}</sup> @endif
                        </div>
                        <div class="mt-4">
                            <label for="city"><h6>Kota/Kabupaten</h6></label>
                            <div class="form-select" id="default-select">
                                <select name="city" >
                                    <option value="">Pilih Kota/Kabupaten</option>
                                    <option value="Kota Banda Aceh" @if(isset($team) && $team->city === 'Kota Banda Aceh') {{ 'selected' }} @endif>Kota Banda Aceh</option>
                                    <option value="Kabupaten Aceh Besar" @if(isset($team) && $team->city === 'Kabupaten Aceh Besar') {{ 'selected' }} @endif>Kabupaten Aceh Besar</option>
                                </select>
                            </div>
                            @if($errors->has('city')) <sup>{{ $errors->first('city') }}</sup> @endif
                        </div>
                        <div class="mt-3">
                            <label for="document"><h6>Document</h6></label><br>
                            <input type="file" name="document" id="document"><br>
                            @if($errors->has('document')) <sup>{{ $errors->first('document') }}</sup> @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="coach_name"><h6>Nama Pelatih</h6></label>
                                    <input type="text" name="coach_name" id="coach_name" placeholder="Nama Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->coach_name : old('coach_name') }}">
                                    @if($errors->has('coach_name')) <sup>{{ $errors->first('coach_name') }}</sup> @endif
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="coach_nik"><h6>NIK Pelatih</h6></label>
                                    <input type="text" name="coach_nik" id="coach_nik" placeholder="Coach NIK" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Coach NIK'"
                                     class="single-input" value="{{ isset($team) ? $team->coach_nik : old('coach_nik') }}">
                                    @if($errors->has('coach_nik')) <sup>{{ $errors->first('coach_nik') }}</sup> @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="coach_lisense"><h6>Nomor Lisensi Pelatih</h6></label>
                                    <input type="text" name="coach_lisense" id="coach_lisense" placeholder="Nomor Lisensi Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Lisensi Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->coach_lisense : old('coach_lisense') }}">
                                     @if($errors->has('coach_lisense')) <sup>{{ $errors->first('coach_lisense') }}</sup> @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="coach_photo"><h6>Foto Pelatih</h6></label><br>
                                    <input type="file" name="coach_photo" id="coach_photo" ><br>
                                    @if($errors->has('coach_photo')) <sup>{{ $errors->first('coach_photo') }}</sup> @endif
                                </div>
                            </div>	
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="assistant_coach"><h6>Nama Asisten Pelatih</h6></label>
                                    <input type="text" name="assistant_coach" id="assistant_coach" placeholder="Nama Asisten Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Asisten Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->assistant_coach : old('assistant_coach') }}">
                                     @if($errors->has('assistant_coach')) <sup>{{ $errors->first('assistant_coach') }}</sup> @endif
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-5">
                                    <label for="assistant_coach_nik"><h6>NIK Asisten Pelatih</h6></label>
                                    <input type="text" name="assistant_coach_nik" id="assistant_coach_nik" placeholder="NIK Asisten Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Asisten Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->assistant_coach_nik : old('assistant_coach_nik') }}">
                                     @if($errors->has('assistant_coach_nik')) <sup>{{ $errors->first('assistant_coach_nik') }}</sup> @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="assistant_coach_lisense"><h6>Nomor Lisensi Asisten Pelatih</h6></label>
                                    <input type="text" name="assistant_coach_lisense" id="assistant_coach_lisense" placeholder="Nomor Lisensi Asisten Pelatih" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Lisensi Asisten Pelatih'"
                                     class="single-input" value="{{ isset($team) ? $team->assistant_coach_lisense : old('assistant_coach_lisense') }}">
                                     @if($errors->has('assistant_coach_lisense')) <sup>{{ $errors->first('assistant_coach_lisense') }}</sup> @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="mt-3">
                                    <label for="assistant_coach_photo"><h6>Foto Asisten Pelatih</h6></label><br>
                                    <input type="file" name="assistant_coach_photo" id="assistant_coach_photo"><br>
                                    @if($errors->has('assistant_coach_photo')) <sup>{{ $errors->first('assistant_coach_photo') }}</sup> @endif
                                </div>
                            </div>	
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-5">
                                    <label for="manager_name"><h6>Nama Manager</h6></label>
                                    <input type="text" name="manager_name" id="manager_name" placeholder="Nama Manager" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Manager'"
                                     class="single-input"value="{{ isset($team) ? $team->manager_name : old('manager_name') }}">
                                     @if($errors->has('manager_name')) <sup>{{ $errors->first('manager_name') }}</sup> @endif
                                </div>
                            </div>	
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-5">
                                    <label for="manager_nik"><h6>NIK Manager</h6></label>
                                    <input type="text" name="manager_nik" id="manager_nik" placeholder="NIK Manager" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Manager'"
                                     class="single-input" value="{{ isset($team) ? $team->manager_nik : old('manager_nik') }}">
                                     @if($errors->has('manager_nik')) <sup>{{ $errors->first('manager_nik') }}</sup> @endif

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-5">
                                    <label for="manager_photo"><h6>Foto Manager</h6></label><br>
                                    <input type="file" name="manager_photo" id="manager_photo"><br>
                                    @if($errors->has('manager_photo')) <sup>{{ $errors->first('manager_photo') }}</sup> @endif
                                </div>
                            </div>	
                        </div>

                        <div class="mt-5">
                            <h4 class="mb-20">Players</h4>
                        </div>
                        
                        @for($i=1;$i<=10;$i++)
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="p_name_{{ $i }}"><h6>Nama Pemain {{ $i }}</h6></label>
                                    <input type="text" name="p_name_{{ $i }}" id="p_name_{{ $i }}" placeholder="Nama Pemain {{ $i }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain {{ $i }}'"
                                     class="single-input" value="{{ isset($team) ? $team['p_name_'.$i] : old('p_name_'.$i) }}">
                                    @if($errors->has('p_name_'.$i)) <sup>{{ $errors->first('p_name_'.$i) }}</sup> @endif

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="p_nik_{{ $i }}"><h6>NIK Pemain {{ $i }}</h6></label>
                                    <input type="text" name="p_nik_{{ $i }}" id="p_nik_{{ $i }}" placeholder="NIK Pemain {{ $i }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain {{ $i }}'"
                                     class="single-input" value="{{ isset($team) ? $team['p_nik_'.$i] : old('p_nik_'.$i) }}">
                                    @if($errors->has('p_nik_'.$i)) <sup>{{ $errors->first('p_nik_'.$i) }}</sup> @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="p_photo_{{ $i }}"><h6>Foto Pemain {{ $i }}</h6></label>
                                        <input type="file" name="p_photo_{{ $i }}" id="p_photo_{{ $i }}"><br>
                                        @if($errors->has('p_photo_'.$i)) <sup>{{ $errors->first('p_photo_'.$i) }}</sup> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                        
<!--------------------------------------------------------------------------------------------------------
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_1_name"><h6>Nama Pemain 1</h6></label>
                                    <input type="text" name="player_1_name" id="player_1_name" placeholder="Nama Pemain 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 1'"
                                     class="single-input" value="{{ isset($team) ? $team->player_1_name : old('player_1_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_1_nik"><h6>NIK Pemain 1</h6></label>
                                    <input type="text" name="player_1_nik" id="player_1_nik" placeholder="NIK Pemain 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 1'"
                                     class="single-input" value="{{ isset($team) ? $team->player_1_nik : old('player_1_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_1_photo"><h6>Foto Pemain 1</h6></label>
                                        <input type="file" name="player_1_photo" id="player_1_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_2_name"><h6>Nama Pemain 2</h6></label>
                                    <input type="text" name="player_2_name" id="player_2_name" placeholder="Nama Pemain 2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 2'"
                                     class="single-input" value="{{ isset($team) ? $team->player_2_name : old('player_2_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_2_nik"><h6>NIK Pemain 2</h6></label>
                                    <input type="text" name="player_1_nik" id="player_2_nik" placeholder="NIK Pemain 2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 2'"
                                     class="single-input" value="{{ isset($team) ? $team->player_1_nik : old('player_1_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_2_photo"><h6>Foto Pemain 2</h6></label>
                                        <input type="file" name="player_2_photo" id="player_2_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_3_name"><h6>Nama Pemain 3</h6></label>
                                    <input type="text" name="player_3_name" id="player_3_name" placeholder="Nama Pemain 3" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 3'"
                                     class="single-input" value="{{ isset($team) ? $team->player_3_name : old('player_3_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_3_nik"><h6>NIK Pemain 3</h6></label>
                                    <input type="text" name="player_3_nik" id="player_3_nik" placeholder="NIK Pemain 3" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 3'"
                                     class="single-input" value="{{ isset($team) ? $team->player_3_nik : old('player_3_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_3_photo"><h6>Foto Pemain 3</h6></label>
                                        <input type="file" name="player_3_photo" id="player_3_photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_4_name"><h6>Nama Pemain 4</h6></label>
                                    <input type="text" name="player_4_name" id="player_4_name" placeholder="Nama Pemain 4" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 4'"
                                     class="single-input" value="{{ isset($team) ? $team->player_4_name : old('player_4_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_4_nik"><h6>NIK Pemain 4</h6></label>
                                    <input type="text" name="player_1_nik" id="player_4_nik" placeholder="NIK Pemain 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 4'"
                                     class="single-input" value="{{ isset($team) ? $team->player_4_nik : old('player_4_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_4_photo"><h6>Foto Pemain 4</h6></label>
                                        <input type="file" name="player_4_photo" id="player_4_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_5_name"><h6>Nama Pemain 5</h6></label>
                                    <input type="text" name="player_5_name" id="player_5_name" placeholder="Nama Pemain 5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 5'"
                                     class="single-input" value="{{ isset($team) ? $team->player_5_name : old('player_5_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_5_nik"><h6>NIK Pemain 5</h6></label>
                                    <input type="text" name="player_5_nik" id="player_5_nik" placeholder="NIK Pemain 5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 5'"
                                     class="single-input" value="{{ isset($team) ? $team->player_5_nik : old('player_5_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_5_photo"><h6>Foto Pemain 5</h6></label>
                                        <input type="file" name="player_5_photo" id="player_5_photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_6_name"><h6>Nama Pemain 6</h6></label>
                                    <input type="text" name="player_6_name" id="player_6_name" placeholder="Nama Pemain 6" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 6'"
                                     class="single-input" value="{{ isset($team) ? $team->player_6_name : old('player_6_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_6_nik"><h6>NIK Pemain 6</h6></label>
                                    <input type="text" name="player_6_nik" id="player_6_nik" placeholder="NIK Pemain 6" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 6'"
                                     class="single-input" value="{{ isset($team) ? $team->player_6_nik : old('player_6_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_6_photo"><h6>Foto Pemain 6</h6></label>
                                        <input type="file" name="player_6_photo" id="player_6_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_7_name"><h6>Nama Pemain 7</h6></label>
                                    <input type="text" name="player_7_name" id="player_7_name" placeholder="Nama Pemain 7" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 7'"
                                     class="single-input" value="{{ isset($team) ? $team->player_7_name : old('player_7_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_7_nik"><h6>NIK Pemain 7</h6></label>
                                    <input type="text" name="player_7_nik" id="player_7_nik" placeholder="NIK Pemain 7" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 7'"
                                     class="single-input" value="{{ isset($team) ? $team->player_7_nik : old('player_7_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_7_photo"><h6>Foto Pemain 7</h6></label>
                                        <input type="file" name="player_7_photo" id="player_7_photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_8_name"><h6>Nama Pemain 8</h6></label>
                                    <input type="text" name="player_8_name" id="player_8_name" placeholder="Nama Pemain 8" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 8'"
                                     class="single-input" value="{{ isset($team) ? $team->player_8_name : old('player_8_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_8_nik"><h6>NIK Pemain 8</h6></label>
                                    <input type="text" name="player_8_nik" id="player_8_nik" placeholder="NIK Pemain 8" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 8'"
                                     class="single-input" value="{{ isset($team) ? $team->player_8_nik : old('player_8_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_8_photo"><h6>Foto Pemain 8</h6></label>
                                        <input type="file" name="player_8_photo" id="player_8_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_9_name"><h6>Nama Pemain 9</h6></label>
                                    <input type="text" name="player_9_name" id="player_9_name" placeholder="Nama Pemain 9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 9'"
                                     class="single-input" value="{{ isset($team) ? $team->player_9_name : old('player_9_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_9_nik"><h6>NIK Pemain 9</h6></label>
                                    <input type="text" name="player_9_nik" id="player_9_nik" placeholder="NIK Pemain 9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 9'"
                                     class="single-input" value="{{ isset($team) ? $team->player_9_nik : old('player_9_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_9_photo"><h6>Foto Pemain 9</h6></label>
                                        <input type="file" name="player_9_photo" id="player_9_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_10_name"><h6>Nama Pemain 10</h6></label>
                                    <input type="text" name="player_10_name" id="player_10_name" placeholder="Nama Pemain 10" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemain 10'"
                                     class="single-input" value="{{ isset($team) ? $team->player_10_name : old('player_10_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="mt-3">
                                    <label for="player_10_nik"><h6>NIK Pemain 10</h6></label>
                                    <input type="text" name="player_10_nik" id="player_10_nik" placeholder="NIK Pemain 10" onfocus="this.placeholder = ''" onblur="this.placeholder = 'NIK Pemain 10'"
                                     class="single-input" value="{{ isset($team) ? $team->player_10_nik : old('player_10_nik') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mt-3">
                                        <label for="player_10_photo"><h6>Foto Pemain 10</h6></label>
                                        <input type="file" name="player_10_photo" id="player_10_photo">
                                    </div>
                                </div>
                            </div>
                        </div> 
------------------------------------------------------------------------------------------------------->

 
                        <div class="mt-5">
                            <button type="submit" class="genric-btn primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->
@endsection
