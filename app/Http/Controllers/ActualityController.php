<?php

namespace App\Http\Controllers;

use App\Models\Actuality;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActualityController extends Controller
{
    public function index()
    {
        // Get the most recent featured actuality
        $featuredActuality = Actuality::where('is_visible', true)
            ->where('is_featured', true)
            ->orderBy('date', 'desc')
            ->first();

        // If no featured actuality exists, get the most recent one
        if (!$featuredActuality) {
            $featuredActuality = Actuality::where('is_visible', true)
                ->orderBy('date', 'desc')
                ->first();
        }

        // Get all visible actualities ordered by date (newest first)
        $actualities = Actuality::where('is_visible', true)
            ->orderBy('date', 'desc')
            ->get();

        // Get all upcoming events ordered by date
        $upcomingEvents = Event::where('is_visible', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        return Inertia::render('Actuality', [
            'featuredActuality' => $featuredActuality,
            'actualities' => $actualities,
            'upcomingEvents' => $upcomingEvents
        ]);
    }
}
