<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return view('admin.news.index')->with([
            'title' => 'Berita',
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('admin.news.form')->with([
            'title' => 'Post Berita'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:news',
            'image' => 'required|image|max:2000',
            'news' => 'required'
        ]);

        if(request()->file('image')){
            $validatedData['image'] = request()->file('image')->store('news-image');
        }  

        News::create($validatedData);
        return redirect('/news')->with('status', 'Berita Berhasil Dipost'); 
    }
    public function show($slug)
    {
        $news = News::all()->where('slug', $slug)->first();
        return view('admin.news.show')->with([
            'title' => 'Detail Post Berita',
            'news' => $news
        ]);

    }

    public function edit($slug)
    {
        $newsData = News::all()->where('slug', $slug)->first();
        return view('admin.news.form')->with([
            'title' => 'Edit Berita',
            'newsData' => $newsData
        ]);
    }

    public function update(Request $request, $id)
    {
        $news = News::all()->where('id', $id)->first();
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'image' => 'image|max:2000',
            'news' => 'required'
        ]);
        if(request()->file('image')){
            Storage::delete([$news->image]);
            $validatedData['image'] = request()->file('image')->store('news-image');
        }

        News::where('id', $id)->update($validatedData);
        return redirect('/news')->with('status', 'Berita Berhasil Diedit');
    }

    public function destroy($id)
    {
        //
    }
}
