<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Team;

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

    public function team()
    {
        $team = Team::orderBy('id', 'desc')->paginate(1);
        return view('team')->with([
            'title' => 'Team',
            'teams' => $team
        ]);
    }

    public function blog()
    {
        $news = News::orderBy('id', 'desc')->paginate(3);
        return view('blog')->with([
            'title' => 'Blog',
            'news' => $news
        ]);
    }


    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('blog-single')->with([
            'title' => 'Single Blog',
            'news' => $news
        ]);
    }

}
