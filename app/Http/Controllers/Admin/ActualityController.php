<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actuality;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ActualityController extends Controller
{
    public function index()
    {
        $actualities = Actuality::orderBy('date', 'desc')->get();

        return Inertia::render('Actualities', [
            'actualities' => $actualities,
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
            'content' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
            'date' => 'required|date',
            'is_featured' => 'boolean',
            'category' => 'required|in:event,news,release',
            'is_visible' => 'boolean'
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('actualities', 'public');
                $validated['image'] = Storage::url($imagePath);
            }

            Actuality::create($validated);

            return redirect()->back()
                ->with('success', 'Actualité créée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'actualité:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'actualité'])
                ->withInput();
        }
    }

    public function update(Request $request, Actuality $actuality)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
            'date' => 'required|date',
            'is_featured' => 'boolean',
            'category' => 'required|in:event,news,release',
            'is_visible' => 'boolean'
        ]);

        try {
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image
                $oldImagePath = str_replace('/storage/', '', $actuality->image);
                Storage::disk('public')->delete($oldImagePath);

                // Enregistrer la nouvelle image
                $imagePath = $request->file('image')->store('actualities', 'public');
                $validated['image'] = Storage::url($imagePath);
            }

            $actuality->update($validated);

            return redirect()->back()
                ->with('success', 'Actualité mise à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de l\'actualité:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de l\'actualité'])
                ->withInput();
        }
    }

    public function destroy(Actuality $actuality)
    {
        try {
            // Supprimer l'image
            $imagePath = str_replace('/storage/', '', $actuality->image);
            Storage::disk('public')->delete($imagePath);

            $actuality->delete();
            return redirect()->back()->with('success', 'Actualité supprimée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'actualité:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression de l\'actualité']);
        }
    }
}
