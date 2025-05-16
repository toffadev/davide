<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class ComedyController extends Controller
{
    public function index()
    {
        // Get current event (most recent with is_visible = true)
        $currentEvent = Event::where('is_visible', true)
            ->where('event_date', '>=', Carbon::now())
            ->orderBy('event_date', 'asc')
            ->first();

        // Get upcoming events (all future events with is_visible = true, except the current one)
        $upcomingEvents = Event::where('is_visible', true)
            ->where('event_date', '>=', Carbon::now())
            ->when($currentEvent, function ($query) use ($currentEvent) {
                return $query->where('id', '!=', $currentEvent->id);
            })
            ->orderBy('event_date', 'asc')
            ->get();

        // Get past events with YouTube videos
        $pastEvents = Event::where('is_visible', true)
            ->where('event_date', '<', Carbon::now())
            ->whereNotNull('url_youtube')
            ->orderBy('event_date', 'desc')
            ->get();

        return Inertia::render('Comedy', [
            'currentEvent' => $currentEvent,
            'upcomingEvents' => $upcomingEvents,
            'pastEvents' => $pastEvents
        ]);
    }
}
