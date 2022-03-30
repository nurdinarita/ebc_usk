<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('admin.event.index')->with([
            'title' => 'Event',
            'events' => $events
        ]);
    }

    public function create()
    {
        return view('admin.event.form')->with([
            'title' => 'Add Event'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_name' => 'required',
            'event_image' => 'required',
            'registration_end_date' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        if($request->file('event_image')){
            $request->file('event_image')->storePubliclyAs('public/event-image', $request->file('event_image')->hashName());
            $validatedData['event_image'] = $request->file('event_image')->hashName();
        }

        Event::create($validatedData);
        return redirect('/event')->with('status', 'Event Berhasil Ditambah');
    }

    public function edit($id)
    {
        $event = Event::all()->where('id', $id)->first();
        return view('admin.event.form')->with([
            'title' => 'Edit Event',
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::all()->where('id', $id)->first();
        $validatedData = $request->validate([
            'event_name' => 'required',
            'event_image' => 'max:2000',
            'registration_end_date' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        if(request()->file('event_image')){
            Storage::disk('public')->delete('event-image/'.$event->event_image);
            request()->file('event_image')->storePubliclyAs('public/event-image', request()->file('event_image')->hashName());
            $validatedData['event_image'] = request()->file('event_image')->hashName();
        }

        Event::where('id', $id)->update($validatedData);
        return redirect('/event')->with('status', 'Data Event Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $event = Event::all()->where('id', $id)->first();
        Storage::disk('public')->delete('event-image/'.$event->event_image);
        Event::where('id', $id)->delete();
        return redirect('/event')->with('status', 'Event Berhasil Dihapus');
    }
}
