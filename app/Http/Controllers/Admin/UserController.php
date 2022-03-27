<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->where('is_admin', 0);

        return view('admin.users.index')->with([
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.form')->with([
            'title' => 'Add User'
        ]);
    }

    public function store(Request $request)
    {
        if($request->password === $request->passwordconfirmation){
            $validatedData = $request->validate([
                'username' => 'required|unique:users',
                'password' => 'required|min:5',
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);

            User::create($validatedData);
            return redirect('/users')->with('status', 'User Berhasil Ditambah');
        }else {
            return redirect('/users/create')->with('status', 'Konfirmasi Password Tidak Sesuai');
        }
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.form')->with([
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        if($request->password === $request->passwordconfirmation){
            $validatedData = $request->validate([
                'password' => 'required|min:5',
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);

            User::where('id', $user->id)
                ->update([
                'password' => $validatedData['password']
                ]);
            return redirect('/users')->with('status', 'Data Berhasil Diupdate');
        }else {
            return redirect('/users/'.$user->id.'/edit')->with('status', 'Konfirmasi Password Tidak Sesuai');
        }
    }

    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        Team::where('user_id', $user->id)->delete();

        return redirect('/users')->with('status', 'Data Berhasil Dihapus');
    }
}
