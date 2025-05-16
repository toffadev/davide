<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ComedyShow;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ComedyShowController extends Controller
{
    public function index()
    {
        $comedyShows = ComedyShow::orderBy('release_date', 'desc')->get();

        return Inertia::render('ComedyShows', [
            'comedyShows' => $comedyShows,
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
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
            'trailer_url' => 'nullable|string|url',
            'duration' => 'nullable|integer',
            'release_date' => 'nullable|date',
            'is_visible' => 'boolean'
        ]);

        try {
            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('comedy-shows', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            ComedyShow::create($validated);

            return redirect()->back()
                ->with('success', 'Comédie créée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la comédie:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création de la comédie'])
                ->withInput();
        }
    }

    public function update(Request $request, ComedyShow $comedyShow)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif|max:8048',
            'trailer_url' => 'nullable|string|url',
            'duration' => 'nullable|integer',
            'release_date' => 'nullable|date',
            'is_visible' => 'boolean'
        ]);

        try {
            if ($request->hasFile('cover_image')) {
                // Supprimer l'ancienne image
                $oldImagePath = str_replace('/storage/', '', $comedyShow->cover_image);
                Storage::disk('public')->delete($oldImagePath);

                // Enregistrer la nouvelle image
                $imagePath = $request->file('cover_image')->store('comedy-shows', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            $comedyShow->update($validated);

            return redirect()->back()
                ->with('success', 'Comédie mise à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la comédie:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de la comédie'])
                ->withInput();
        }
    }

    public function destroy(ComedyShow $comedyShow)
    {
        try {
            // Supprimer l'image de couverture
            $imagePath = str_replace('/storage/', '', $comedyShow->cover_image);
            Storage::disk('public')->delete($imagePath);

            $comedyShow->delete();
            return redirect()->back()->with('success', 'Comédie supprimée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la comédie:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression de la comédie']);
        }
    }
}
