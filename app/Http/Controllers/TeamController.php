<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('admin.teams.index')->with([
            'title' => 'Team Terdaftar',
            'teams' => $teams
        ]);     
    }

    public function register(){
        $cities = City::all();
        if(auth()->check()){
            if(auth()->user()->is_registered == 1){
                $team = Team::all()->where('user_id', auth()->user()->id)->first();
                
                return view('auth.form')->with([
                    'team' => $team,
                    'cities' => $cities
                ]);
            }else{
                return view('auth.form')->with([
                    'cities' => $cities
                ]);
            }
        }
        
    }

    // Insert Data Team To DataBase
    public function store(Request $request){
        // Validasi Team
        $validate_array = [
            'school' => 'required',
            'category' => 'required',
            'team_name' => 'required',
            'logo' => 'required|image',
            'address' => 'required',
            'city' => 'required',
            'document' => 'required|file',
            'coach_name' => 'required',
            'coach_nik' => 'required',
            'coach_lisense' => 'required',
            'coach_photo' => 'required|image',
            'assistant_coach' => 'required',
            'assistant_coach_nik' => 'required',
            'assistant_coach_lisense' => 'required',
            'assistant_coach_photo' => 'required|image',
            'manager_name' => 'required',
            'manager_nik' => 'required',
            'manager_photo' => 'required|image',
        ];
        $validatedData = $this->validate($request, $validate_array);
        // Validasi Pemain Jika 3:3
        if($validatedData['category'] === "3 : 3"){
            for($i=1;$i<=3;$i++){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'required|image';
            }
        }
        
        //Validasi Pemain Jika 5:5
        if($validatedData['category'] === "5 : 5"){
            for($i=1;$i<=5;$i++){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'required|image';
            }
        }

        // Validasi Pemain Lanjut Validate 3 atau 5 Keatas jika diisi 
        for($i ;$i<=10;$i++){
            if($request['p_name_'.$i] || $request['p_nik_'.$i] || $request['p_photo_'.$i]){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'required|image';
            }
        }

        $validatedData = $this->validate($request, $validate_array);

        if($request->file('logo')){
            $request->file('logo')->storePubliclyAs('public/teams-logo', $request->file('logo')->getClientOriginalName());
            $validatedData['logo'] = $request->file('logo')->getClientOriginalName();
        }
        if($request->file('document')){
            // $validatedData['document'] = $request->file('document')->store('teams-document');
            $request->file('document')->storePubliclyAs('public/teams-document', $request->file('document')->getClientOriginalName());
            $validatedData['document'] = $request->file('document')->getClientOriginalName();
        }

        if($request->file('coach_photo')){
            // $validatedData['coach_photo'] = $request->file('coach_photo')->store('coach-photo');
            $request->file('coach_photo')->storePubliclyAs('public/coach-photo', $request->file('coach_photo')->getClientOriginalName());
            $validatedData['coach_photo'] = $request->file('coach_photo')->getClientOriginalName();
        }           
        if($request->file('assistant_coach_photo')){
            // $validatedData['assistant_coach_photo'] = $request->file('assistant_coach_photo')->store('assistant-coach-photo');
            $request->file('assistant_coach_photo')->storePubliclyAs('public/assistant-coach-photo', $request->file('assistant_coach_photo')->getClientOriginalName());
            $validatedData['assistant_coach_photo'] = $request->file('assistant_coach_photo')->getClientOriginalName();
        }           
        if($request->file('manager_photo')){
            // $validatedData['manager_photo'] = $request->file('manager_photo')->store('manager-photo');
            $request->file('manager_photo')->storePubliclyAs('public/manager-photo', $request->file('manager_photo')->getClientOriginalName());
            $validatedData['manager_photo'] = $request->file('manager_photo')->getClientOriginalName();
        }

        for($i=1;$i<=10; $i++){
            if($request->file('p_photo_'.$i)){
                // $validatedData['p_photo_'.$i] = $request->file('p_photo_'.$i)->store('player_photo');
                $request->file('p_photo_'.$i)->storePubliclyAs('public/player-photo', $request->file('p_photo_'.$i)->getClientOriginalName());
                $validatedData['p_photo_'.$i] = $request->file('p_photo_'.$i)->getClientOriginalName();
            }          
        }
        $validatedData['user_id'] = auth()->user()->id;
        
        Team::create($validatedData);
        User::where('id', $validatedData['user_id'])->update(['is_registered' => 1]);
        

        return redirect('/register')->with('status', 'Berhasil Registrasi');

    }



    // UPdate Database Team
    public function update(Request $request,$id){
        $team = Team::all()->where('id', $id)->first();
        // Validasi Team
        $validate_array = [
            'school' => 'required',
            'category' => 'required',
            'team_name' => 'required',
            'logo' => 'image',
            'address' => 'required',
            'city' => 'required',
            'document' => 'file',
            'coach_name' => 'required',
            'coach_nik' => 'required',
            'coach_lisense' => 'required',
            'coach_photo' => 'image',
            'assistant_coach' => 'required|required',
            'assistant_coach_nik' => 'required',
            'assistant_coach_lisense' => 'required',
            'assistant_coach_photo' => 'image',
            'manager_name' => 'required',
            'manager_nik' => 'required',
            'manager_photo' => 'image',
        ];
        $validatedData = $this->validate($request, $validate_array);
        
        // Validasi Pemain Jika 3:3
        if(request()->category === "3 : 3"){
            for($i=1;$i<=3;$i++){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'image';
            }
        }
        
        //Validasi Pemain Jika 5:5
        if(request()->category === "5 : 5"){
            for($i=1;$i<=5;$i++){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'image';
            }
        }

        // Validasi Pemain Lanjut Validate 3 atau 5 Keatas jika diisi 
        for($i ;$i<=10;$i++){
            if($team['p_name_'.$i] || $team['p_nik_'.$i] || $team['p_photo_'.$i]){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'image';
            }else{
                if($request['p_name_'.$i] || $request['p_nik_'.$i] || $request['p_photo_'.$i]){
                    $validate_array['p_name_'.$i]  = 'required';
                    $validate_array['p_nik_'.$i] = 'required';
                    $validate_array['p_photo_'.$i] = 'required|image';
                }
            }
        }

        $validatedData = $this->validate(request(), $validate_array);

        if(request()->file('logo')){
            Storage::disk('public')->delete('teams-logo/'.$team->logo);
            // $validatedData['logo'] = request()->file('logo')->store('teams-logo');
            request()->file('logo')->storePubliclyAs('public/teams-logo', request()->file('logo')->hashName());
            $validatedData['logo'] = request()->file('logo')->hashName();
        }
        if(request()->file('document')){
            Storage::disk('public')->delete('teams-document/'.$team->document);
            // $validatedData['document'] = request()->file('document')->store('teams-document');
            $request->file('document')->storePubliclyAs('public/teams-document', $request->file('document')->hashName());
            $validatedData['document'] = $request->file('document')->hashName();
        }

        if(request()->file('coach_photo')){
            Storage::disk('public')->delete('coach-photo/'.$team->coach_photo);
            // $validatedData['coach_photo'] = request()->file('coach_photo')->store('coach-photo');
            $request->file('coach_photo')->storePubliclyAs('public/coach-photo', $request->file('coach_photo')->hashName());
            $validatedData['coach_photo'] = $request->file('coach_photo')->hashName();
        }           
        if(request()->file('assistant_coach_photo')){
            Storage::disk('public')->delete('assistant-coach-photo/'.$team->assistant_coach_photo);
            // $validatedData['assistant_coach_photo'] = request()->file('assistant_coach_photo')->store('assistant-coach-photo');
            $request->file('assistant_coach_photo')->storePubliclyAs('public/assistant-coach-photo', $request->file('assistant_coach_photo')->hashName());
            $validatedData['assistant_coach_photo'] = $request->file('assistant_coach_photo')->hashName();
        }           
        if(request()->file('manager_photo')){
            Storage::disk('public')->delete('manager-photo/'.$team->manager_photo);
            // $validatedData['manager_photo'] = request()->file('manager_photo')->store('manager-photo');
            $request->file('manager_photo')->storePubliclyAs('public/manager-photo', $request->file('manager_photo')->hashName());
            $validatedData['manager_photo'] = $request->file('manager_photo')->hashName();
        }

        for($i=1;$i<=10; $i++){
            if(request()->file('p_photo_'.$i)){
                Storage::disk('public')->delete('player-photo/'.$team->manager_photo);
                // $validatedData['p_photo_'.$i] = request()->file('p_photo_'.$i)->store('player_photo');
                $request->file('p_photo_'.$i)->storePubliclyAs('public/player-photo', $request->file('p_photo_'.$i)->getClientOriginalName());
                $validatedData['p_photo_'.$i] = $request->file('p_photo_'.$i)->hashName();
            }          
        }

        Team::where('id', $id)->update($validatedData);
        return redirect('/register')->with('status', 'Data Berhasil Diupdate');

    }

    public function show($id){
        $team = Team::all()->where('id', $id)->first();
        return view('admin.teams.show')->with([
            'title' => 'Detail Team',
            'team' => $team
        ]);
    }
}
