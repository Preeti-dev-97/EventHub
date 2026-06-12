<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function events(Request $request)
    {
        $query = Event::query();

        if ($request->search)
        {
            $query ->where('title', 'like', '%'. $request->search .'%');
        }

        if ($request->address) 
        {
            $query->where('address', $request->address);
        }

        if ($request->city) 
        {
            $query->where('city', $request->city);
        }

        if ($request->state) 
        {
            $query->where('state', $request->state);
        }
        if ($request->country) 
        {
            $query->where('country', $request->country);
        }

        if ($request->date)
        {
            $query->whereDate('date', $request->date);
        }

        if ($request->min_price) 
        {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) 
        {
            $query->where('price', '<=', $request->max_price);
        }

        $events = $query->where('status', 'published')->latest()->paginate(6)->withQueryString();

        return view('events', compact('events'));
    }

    public function show(Request $request, $event)
    {
        $event = Event::find($event);
        return view('eventShow', compact('event'));
    }
}
