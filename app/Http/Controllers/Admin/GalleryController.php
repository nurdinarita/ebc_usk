<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index')->with([
            'title' => 'Gallery',
            'galleries' => $galleries
        ]);
    }

    public function create()
    {
        return view('admin.gallery.form')->with([
            'title' => 'Add Gallery',
        ]);
    }

    public function store(Request $request)
    {
        if(request()->file('gallery_image')){
            // $validatedData['image'] = request()->file('image')->storePubliclyAs('public/news-image', request()->file('image')->getClientOriginalName());
            request()->file('gallery_image')->storePubliclyAs('public/galleries-image', request()->file('gallery_image')->hashName());
            $validatedData['gallery_image'] = request()->file('gallery_image')->hashName();
        }
        Gallery::create($validatedData);
        return redirect('admin/gallery')->with('status', 'Gallery Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $gallery = Gallery::all()->where('id', $id)->first();
        Storage::disk('public')->delete('galleries-image/'.$gallery->gallery_image);
        Gallery::where('id', $id)->delete();
        return redirect('admin/gallery')->with('status', 'Gallery Berhasil Dihapus');
    }
}
