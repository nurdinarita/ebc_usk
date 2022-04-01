<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{

    public function index()
    {
        $social = SocialMedia::all();
        return view('admin.social-media.index')->with([
            'title' => 'Sosial Media',
            'social' => $social
        ]);
    }

    public function create()
    {
        return view('admin.social-media.form')->with([
            'title' => 'Add Sosial Media',
        ]);
    }

    public function edit($socialmedia)
    {
        $socialmediaLink = SocialMedia::all()->pluck($socialmedia)->first() ;
        return view('admin.social-media.form')->with([
            'title' => 'Edit Sosial Media',
            'socialmediaName' => $socialmedia,
            'socialmediaLink' => $socialmediaLink,
        ]);
    }

    public function update(Request $request,$socialmedia)
    {
        SocialMedia::find(1)->update($request->all());
        return redirect('admin/social-media')->with('status', 'Sosial Media Berhail Diupdate');
    }

    public function destroy(SocialMedia $socialMedia)
    {
        //
    }
}
