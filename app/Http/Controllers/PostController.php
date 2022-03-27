<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class PostController extends Controller
{

    public function index()
    {
        $news = News::latest()->paginate(3);
        return view('index')->with([
            'title' => 'Home',
            'news' => $news
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('blog-single')->with([
            'title' => 'Single Blog',
            'news' => $news
        ]);
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
