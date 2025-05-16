<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->get();

        return Inertia::render('Events', [
            'events' => $events,
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
            'address' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'event_date' => 'required|date',
            'ticket_link' => 'nullable|string|url',
            'is_sold_out' => 'boolean',
            'is_visible' => 'boolean'
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('events', 'public');
                $validated['image'] = Storage::url($imagePath);
            }

            Event::create($validated);

            return redirect()->back()
                ->with('success', 'Événement créé avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'événement:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création de l\'événement'])
                ->withInput();
        }
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
            'address' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'event_date' => 'required|date',
            'ticket_link' => 'nullable|string|url',
            'is_sold_out' => 'boolean',
            'is_visible' => 'boolean'
        ]);

        try {
            if ($request->hasFile('image')) {
                // Delete old image
                $oldImagePath = str_replace('/storage/', '', $event->image);
                Storage::disk('public')->delete($oldImagePath);

                // Save new image
                $imagePath = $request->file('image')->store('events', 'public');
                $validated['image'] = Storage::url($imagePath);
            }

            $event->update($validated);

            return redirect()->back()
                ->with('success', 'Événement mis à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de l\'événement:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de l\'événement'])
                ->withInput();
        }
    }

    public function destroy(Event $event)
    {
        try {
            // Delete the image
            $imagePath = str_replace('/storage/', '', $event->image);
            Storage::disk('public')->delete($imagePath);

            $event->delete();
            return redirect()->back()->with('success', 'Événement supprimé avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'événement:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression de l\'événement']);
        }
    }
}
