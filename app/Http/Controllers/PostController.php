<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Team;
use App\Models\Event;
use App\Models\Gallery;


class PostController extends Controller
{

    public function index()
    {
        $event = Event::select('event_name', 'event_image', 'registration_end_date' ,'event_start_date', 'event_end_date', 'location', 'description', 'created_at')->orderBy('id', 'desc')->take(1)->first();
        $news = News::latest()->paginate(3);
        return view('index')->with([
            'title' => 'Home',
            'news' => $news,
            'event' => $event
        ]);
    }

    public function team()
    {
        $team = Team::orderBy('id', 'desc')->paginate(5);
        return view('team')->with([
            'title' => 'Team',
            'teams' => $team
        ]);
    }
    public function showTeam($id)
    {
        $teamDetail = Team::all()->where('id', $id)->first();
        return view('team-detail')->with([
            'title' => 'Team Detail',
            'teamDetail' => $teamDetail
        ]);
    }

    public function blog()
    {
        $news = News::orderBy('id', 'desc')->paginate(5);
        $recentNews = News::select('title', 'image', 'slug', 'created_at')->orderBy('id', 'desc')->take(4)->get();
        return view('blog')->with([
            'title' => 'Blog',
            'news' => $news,
            'recent_news' => $recentNews
        ]);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $news_data = News::where('title', 'like', "%".$keyword."%")->orwhere('news', 'like', "%".$keyword."%")->paginate(5);
        $recentNews = News::select('title', 'image', 'slug', 'created_at')->orderBy('id', 'desc')->take(4)->get();
        if($news_data->count() > 0)
        {
            return view('blog')->with([
                'title' => 'Blog',
                'news' => $news_data,
                'recent_news' => $recentNews,
                'alert' => 'Ditemukan '.$news_data->count().' berita dengan keyword : <strong>'.$keyword.'</strong>',
            ]);
        }else{
            return view('blog')->with([
                'title' => 'Blog',
                'news' => $news_data,
                'recent_news' => $recentNews,
                'alert' => 'Berita dengan keyword : <strong>'.$keyword.'</strong> tidak ditemukan',
            ]);
        }
    }


    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        $recentNews = News::select('title', 'image', 'slug', 'created_at')->orderBy('id', 'desc')->take(4)->get();
        $next = News::where('id', '>', $news->id)->min('id');
        $nextContent = News::where('id', $next)->first();
        $prev = News::where('id', '<', $news->id)->max('id');
        $prevContent = News::where('id', $prev)->first();

        return view('blog-single')->with([
            'title' => 'Single Blog',
            'news' => $news,
            'recent_news' => $recentNews,
            'next' => $next,
            'nextContent' => $nextContent,
            'prev' => $prev,
            'prevContent' => $prevContent,
        ]);
    }
    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(6);
        return view('gallery')->with([
            'galleries' => $galleries
        ]);
    }

}
