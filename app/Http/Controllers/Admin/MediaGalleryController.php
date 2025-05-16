<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaGallery;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MediaGalleryController extends Controller
{
    public function index()
    {
        $mediaGallery = MediaGallery::orderBy('order', 'asc')->get();

        return Inertia::render('MediaGallery', [
            'mediaGallery' => $mediaGallery,
            'flash' => [
                'success' => session('success'),
                'error' => session('error')
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'url' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
            'category' => 'required|in:comedy,music,personal',
            'is_visible' => 'boolean',
            'order' => 'integer'
        ]);

        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('media-gallery', 'public');
                $validated['thumbnail'] = Storage::url($thumbnailPath);
            }

            MediaGallery::create($validated);

            return redirect()->back()
                ->with('success', 'Média ajouté avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du média:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création du média'])
                ->withInput();
        }
    }

    public function update(Request $request, MediaGallery $mediaGallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'url' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
            'category' => 'required|in:comedy,music,personal',
            'is_visible' => 'boolean',
            'order' => 'integer'
        ]);

        try {
            if ($request->hasFile('thumbnail')) {
                // Supprimer l'ancienne image
                if ($mediaGallery->thumbnail) {
                    $oldThumbnailPath = str_replace('/storage/', '', $mediaGallery->thumbnail);
                    Storage::disk('public')->delete($oldThumbnailPath);
                }

                // Enregistrer la nouvelle image
                $thumbnailPath = $request->file('thumbnail')->store('media-gallery', 'public');
                $validated['thumbnail'] = Storage::url($thumbnailPath);
            }

            $mediaGallery->update($validated);

            return redirect()->back()
                ->with('success', 'Média mis à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du média:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour du média'])
                ->withInput();
        }
    }

    public function destroy(MediaGallery $mediaGallery)
    {
        try {
            // Supprimer la miniature
            if ($mediaGallery->thumbnail) {
                $thumbnailPath = str_replace('/storage/', '', $mediaGallery->thumbnail);
                Storage::disk('public')->delete($thumbnailPath);
            }

            $mediaGallery->delete();
            return redirect()->back()->with('success', 'Média supprimé avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du média:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression du média']);
        }
    }
}
