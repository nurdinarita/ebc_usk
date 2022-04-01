<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{

    public function index()
    {
        $social = SocialMedia::latest()->first();
        if(!$social){
            return view('admin.social-media.index')->with([
                'title' => 'Sosial Media',
            ]);
        }else{
            return view('admin.social-media.index')->with([
                'title' => 'Sosial Media',
                'social' => $social
            ]);
        }
    }

    public function form()
    {
        $social = (SocialMedia::latest()->first());
        if(!$social){
            return view('admin.social-media.form')->with([
                'title' => 'Set Sosial Media',
            ]);
        }else{
            return view('admin.social-media.form')->with([
                'title' => 'Set Sosial Media',
                'social' => $social
            ]);
        }
    }

    public function create(Request $request)
    {
        SocialMedia::create($request->all());
        return redirect('admin/social-media')->with('status', 'Sosial Media Berhail Diupdate');
    }

    public function update($id)
    {
        SocialMedia::find($id)->update(request()->all());
        return redirect('admin/social-media')->with('status', 'Sosial Media Berhail Diupdate');
    }

    public function destroy(SocialMedia $socialMedia)
    {
        //
    }
}
