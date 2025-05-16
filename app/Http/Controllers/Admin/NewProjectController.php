<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewProject;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class NewProjectController extends Controller
{
    public function index()
    {
        $newProject = NewProject::first();

        return Inertia::render('NewProject', [
            'newProject' => $newProject,
            'flash' => [
                'success' => session('success'),
                'error' => session('error')
            ]
        ]);
    }

    public function store(Request $request)
    {
        // Vérifier si un projet existe déjà
        if (NewProject::exists()) {
            return redirect()->back()
                ->withErrors(['error' => 'Un projet existe déjà. Veuillez le mettre à jour plutôt que d\'en créer un nouveau.']);
        }

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
                $imagePath = $request->file('cover_image')->store('new-projects', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            // Assurer que c'est le seul enregistrement
            $validated['singleton'] = true;

            NewProject::create($validated);

            return redirect()->back()
                ->with('success', 'Projet créé avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du projet:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création du projet'])
                ->withInput();
        }
    }

    public function update(Request $request, NewProject $newProject)
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
                $oldImagePath = str_replace('/storage/', '', $newProject->cover_image);
                Storage::disk('public')->delete($oldImagePath);

                // Enregistrer la nouvelle image
                $imagePath = $request->file('cover_image')->store('new-projects', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            // Assurer que c'est le seul enregistrement
            $validated['singleton'] = true;

            $newProject->update($validated);

            return redirect()->back()
                ->with('success', 'Projet mis à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du projet:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour du projet'])
                ->withInput();
        }
    }

    public function destroy(NewProject $newProject)
    {
        try {
            // Supprimer l'image de couverture
            $imagePath = str_replace('/storage/', '', $newProject->cover_image);
            Storage::disk('public')->delete($imagePath);

            $newProject->delete();
            return redirect()->back()->with('success', 'Projet supprimé avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du projet:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression du projet']);
        }
    }
}
