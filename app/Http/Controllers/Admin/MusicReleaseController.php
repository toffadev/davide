<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MusicRelease;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class MusicReleaseController extends Controller
{
    public function index()
    {
        $musicReleases = MusicRelease::orderBy('release_date', 'desc')->get();

        return Inertia::render('MusicReleases', [
            'musicReleases' => $musicReleases,
            'flash' => [
                'success' => session('success'),
                'error' => session('error')
            ]
        ]);
    }

    public function store(Request $request)
    {
        // Enregistrer AVIF comme MIME type valide
        Validator::extend('is_image_with_avif', function ($attribute, $value, $parameters, $validator) {
            if (!$value instanceof \Illuminate\Http\UploadedFile) {
                return false;
            }

            $mimeType = $value->getMimeType();
            return in_array($mimeType, [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/avif',
                'image/webp',
                'image/heic'
            ]);
        });

        // Personnaliser le message d'erreur
        $customMessages = [
            'cover_image.is_image_with_avif' => 'Le fichier doit être une image (jpg, png, gif, avif, webp, heic).',
        ];

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'required|file|is_image_with_avif|max:8048',
            'release_date' => 'required|date',
            'type' => 'required|in:single,album,ep',
            'spotify_link' => 'nullable|string|url',
            'apple_music_link' => 'nullable|string|url',
            'youtube_link' => 'nullable|string|url',
            'is_visible' => 'boolean'
        ], $customMessages);

        try {
            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('music-releases', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            MusicRelease::create($validated);

            return redirect()->back()
                ->with('success', 'Sortie musicale créée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la sortie musicale:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création de la sortie musicale'])
                ->withInput();
        }
    }

    public function update(Request $request, MusicRelease $musicRelease)
    {
        // Enregistrer AVIF comme MIME type valide
        Validator::extend('is_image_with_avif', function ($attribute, $value, $parameters, $validator) {
            if (!$value instanceof \Illuminate\Http\UploadedFile) {
                return false;
            }

            $mimeType = $value->getMimeType();
            return in_array($mimeType, [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/avif',
                'image/webp',
                'image/heic'
            ]);
        });

        // Personnaliser le message d'erreur
        $customMessages = [
            'cover_image.is_image_with_avif' => 'Le fichier doit être une image (jpg, png, gif, avif, webp, heic).',
        ];

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|file|is_image_with_avif|max:8048',
            'release_date' => 'required|date',
            'type' => 'required|in:single,album,ep',
            'spotify_link' => 'nullable|string|url',
            'apple_music_link' => 'nullable|string|url',
            'youtube_link' => 'nullable|string|url',
            'is_visible' => 'boolean'
        ], $customMessages);

        try {
            if ($request->hasFile('cover_image')) {
                // Supprimer l'ancienne image
                $oldImagePath = str_replace('/storage/', '', $musicRelease->cover_image);
                Storage::disk('public')->delete($oldImagePath);

                // Enregistrer la nouvelle image
                $imagePath = $request->file('cover_image')->store('music-releases', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            $musicRelease->update($validated);

            return redirect()->back()
                ->with('success', 'Sortie musicale mise à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la sortie musicale:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de la sortie musicale'])
                ->withInput();
        }
    }

    public function destroy(MusicRelease $musicRelease)
    {
        try {
            // Supprimer l'image de couverture
            $imagePath = str_replace('/storage/', '', $musicRelease->cover_image);
            Storage::disk('public')->delete($imagePath);

            $musicRelease->delete();
            return redirect()->back()->with('success', 'Sortie musicale supprimée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la sortie musicale:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression de la sortie musicale']);
        }
    }
}
