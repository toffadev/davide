<?php

namespace App\Http\Controllers;

use App\Models\MusicRelease;
use App\Models\NewProject;
use App\Models\ComedyShow;
use Inertia\Inertia;

class MusicController extends Controller
{
    public function index()
    {
        // Récupérer tous les albums, pas seulement le plus récent
        $albums = MusicRelease::where('is_visible', true)
            ->where('type', 'album')
            ->orderBy('release_date', 'desc')
            ->get();

        // Récupérer l'album mis en avant (le plus récent) - gardé pour compatibilité
        $featuredAlbum = $albums->first();

        // Récupérer les singles pour la section "Singles & Collaborations"
        $singles = MusicRelease::where('is_visible', true)
            ->where('type', 'single')
            ->orderBy('release_date', 'desc')
            ->get();

        // Récupérer les singles avec liens YouTube pour la section YouTube
        $youtubeVideos = MusicRelease::where('is_visible', true)
            ->whereNotNull('youtube_link')
            ->orderBy('release_date', 'desc')
            ->take(6)
            ->get();

        // Récupérer la prochaine sortie (NewProject)
        $upcomingRelease = NewProject::where('is_visible', true)
            ->first();

        // Récupérer les spectacles de comédie
        $comedyShows = ComedyShow::where('is_visible', true)
            ->orderBy('release_date', 'desc')
            ->get();

        return Inertia::render('Music', [
            'featuredAlbum' => $featuredAlbum,
            'albums' => $albums,
            'singles' => $singles,
            'youtubeVideos' => $youtubeVideos,
            'upcomingRelease' => $upcomingRelease,
            'comedyShows' => $comedyShows
        ]);
    }
}
