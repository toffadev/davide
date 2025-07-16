<?php

namespace App\Http\Controllers;

use App\Models\MusicRelease;
use App\Models\ComedyShow;
use App\Models\Actuality;
use App\Models\Event;
use App\Models\MediaGallery;
use App\Models\Production;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les 3 derniers singles
        $latestSingles = MusicRelease::where('is_visible', true)
            ->where('type', 'single')
            ->orderBy('release_date', 'desc')
            ->take(4)
            ->get();

        // Récupérer les 2 derniers albums
        $latestAlbums = MusicRelease::where('is_visible', true)
            ->where('type', 'album')
            ->orderBy('release_date', 'desc')
            ->take(2)
            ->get();

        // Récupérer les 3 dernières comédies
        $latestComedies = ComedyShow::where('is_visible', true)
            ->orderBy('release_date', 'desc')
            ->take(3)
            ->get();

        // Récupérer les 3 dernières actualités
        $latestActualities = Actuality::where('is_visible', true)
            ->orderBy('date', 'desc')
            ->take(3)
            ->get();

        // Récupérer les 3 prochains événements
        $upcomingEvents = Event::where('is_visible', true)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        // Récupérer les éléments de la galerie médias
        $galleryItems = MediaGallery::where('is_visible', true)
            ->orderBy('order', 'asc')
            ->take(8)
            ->get();

        // Récupérer les productions payantes
        $paidProductions = Production::where('is_visible', true)
            ->where('type', 'payant')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Récupérer les productions gratuites
        $freeProductions = Production::where('is_visible', true)
            ->where('type', 'gratuit')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return Inertia::render('Home', [
            'latestReleases' => [
                'singles' => $latestSingles,
                'albums' => $latestAlbums
            ],
            'latestComedies' => $latestComedies,
            'latestActualities' => $latestActualities,
            'upcomingEvents' => $upcomingEvents,
            'galleryItems' => $galleryItems,
            'paidProductions' => $paidProductions,
            'freeProductions' => $freeProductions
        ]);
    }
}
