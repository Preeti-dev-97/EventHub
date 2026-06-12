<?php

namespace App\Http\Controllers;

use App\Jobs\ImportEventsJob;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data =
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'date' => 'required',
                'start' => 'required',
                'end' => 'required',
                'price' => 'required',
                'capacity' => 'required',
                'contact_number' => 'required'
            ]);

        $data['user_id'] = auth()->id();

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('events', 's3');
        }
        Event::create($data);
        return redirect()->route('events.index');
    }

    public function edit($event)
    {
        $event = Event::find($event);
        return view('admin.events.edit', compact('event'));
    }
    
    public function update(Request $request, $event)
    {
        $event = Event::find($event);
        $data = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'date' => 'required',
                'start' => 'required',
                'end' => 'required',
                'price' => 'required',
                'capacity' => 'required',
                'contact_number' => 'required'
            ]);

        $data['user_id'] = auth()->id();

        if ($request->hasFile('banner')) {

            // delete old file
            if ($event->banner && Storage::disk('s3')->exists($event->banner)) 
            {
                Storage::disk('s3')->delete($event->banner);
            }

            // upload new file
            $data['banner'] = $request->file('banner')->store('events', 's3');
        }

        $event->update($data);
        return redirect()->route('events.index');
    }

    public function delete($event)
    {
        $event = Event::find($event);

        if ($event->banner && Storage::disk('s3')->exists($event->banner)) 
        {
            Storage::disk('s3')->delete($event->banner);
        }
        $event->delete();

        return redirect()->route('events.index');
    }

    public function editStatus($event)
    {
        $event = Event::find($event);
        return view('admin.events.editStatus', compact('event'));
    }

    public function updateStatus(Request $request, $event)
    {
        $event = Event::find($event);
        $event->update(['status' => $request->status]);
        return redirect()->route('events.index');
    }

    public function upload()
    {
        return view('admin.events.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimetypes:text/csv,text/plain'
        ]);

        $file = $request->file('file')->store('imports', 'local');

        ImportEventsJob::dispatch($file, auth()->id());

        return back()->with('success', 'File will import shortly');
    }
}
