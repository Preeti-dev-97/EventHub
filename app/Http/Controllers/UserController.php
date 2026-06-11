<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function events(Request $request)
    {
        $events = Event::get();
        return view('events', compact('events'));
    }

    public function show(Request $request, $event)
    {
        $event = Event::find($event);
        return view('eventShow', compact('event'));
    }
}
