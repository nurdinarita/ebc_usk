<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if(auth()->check()){
            if(auth()->user()->is_registered == 1){
                $team = Team::all()->where('user_id', auth()->user()->id)->first();
                return view('auth.form')->with([
                    'team' => $team
                ]);
            }else{
                return view('auth.form');
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
        
        // Validasi Pemain Jika 3:3
        if($request->category === "3 : 3"){
            for($i=1;$i<=3;$i++){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'required|image';
            }
        }
        
        //Validasi Pemain Jika 5:5
        if($request->category === "5 : 5"){
            for($i=1;$i<=5;$i++){
                $validate_array['p_name_'.$i]  = 'required';
                $validate_array['p_nik_'.$i] = 'required';
                $validate_array['p_photo_'.$i] = 'required|image';
            }
        }

        // Validasi Pemain 3:3/5:5 Keatas
        for($i;$i<=10;$i++){
                $validate_array['p_name_'.$i]  = '';
                $validate_array['p_nik_'.$i] = '';
                $validate_array['p_photo_'.$i] = '';
        }

        $validatedData = $this->validate($request, $validate_array);

        if($request->file('logo')){
            $validatedData['logo'] = $request->file('logo')->store('teams-logo');
        }
        if($request->file('document')){
            $validatedData['document'] = $request->file('document')->store('teams-document');
        }

        if($request->file('coach_photo')){
            $validatedData['coach_photo'] = $request->file('coach_photo')->store('coach-photo');
        }           
        if($request->file('assistant_coach_photo')){
            $validatedData['assistant_coach_photo'] = $request->file('assistant_coach_photo')->store('assistant-coach-photo');
        }           
        if($request->file('manager_photo')){
            $validatedData['manager_photo'] = $request->file('manager_photo')->store('manager-photo');
        }

        for($i=1;$i<=10; $i++){
            if($request->file('p_photo_'.$i)){
                $validatedData['p_photo_'.$i] = $request->file('p_photo_'.$i)->store('player_photo');
            }          
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Team::create($validatedData);
        User::where('id', $validatedData['user_id'])->update(['is_registered' => 1]);
        

        return redirect('/register')->with('status', 'Berhasil Registrasi');

    }



    // UPdate Database Team
    public function update($id){
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
            'assistant_coach' => 'required',
            'assistant_coach_nik' => 'required',
            'assistant_coach_lisense' => 'required',
            'assistant_coach_photo' => 'image',
            'manager_name' => 'required',
            'manager_nik' => 'required',
            'manager_photo' => 'image',
        ];
        
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

        // Validasi Pemain 3:3/5:5 Keatas
        for($i;$i<=10;$i++){
                $validate_array['p_name_'.$i]  = '';
                $validate_array['p_nik_'.$i] = '';
                $validate_array['p_photo_'.$i] = '';
        }

        $validatedData = $this->validate(request(), $validate_array);

        if(request()->file('logo')){
            Storage::delete([$team->logo]);
            $validatedData['logo'] = request()->file('logo')->store('teams-logo');
        }
        if(request()->file('document')){
            Storage::delete([$team->document]);
            $validatedData['document'] = request()->file('document')->store('teams-document');
        }

        if(request()->file('coach_photo')){
            Storage::delete([$team->coach_photo]);
            $validatedData['coach_photo'] = request()->file('coach_photo')->store('coach-photo');
        }           
        if(request()->file('assistant_coach_photo')){
            Storage::delete([$team->assistant_coach_photo]);
            $validatedData['assistant_coach_photo'] = request()->file('assistant_coach_photo')->store('assistant-coach-photo');
        }           
        if(request()->file('manager_photo')){
            Storage::delete([$team->manager_photo]);
            $validatedData['manager_photo'] = request()->file('manager_photo')->store('manager-photo');
        }

        for($i=1;$i<=10; $i++){
            if(request()->file('p_photo_'.$i)){
                Storage::delete($team['p_photo_'.$i]);
                $validatedData['p_photo_'.$i] = request()->file('p_photo_'.$i)->store('player_photo');
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
