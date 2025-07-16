<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Production;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::orderBy('created_at', 'desc')->get();

        return Inertia::render('Productions', [
            'productions' => $productions,
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

        // Validation personnalisée pour les fichiers audio
        Validator::extend('is_audio', function ($attribute, $value, $parameters, $validator) {
            if (!$value instanceof \Illuminate\Http\UploadedFile) {
                return false;
            }

            // Vérifier le MIME type réel du fichier
            $mimeType = $value->getMimeType();
            $validMimeTypes = [
                'audio/mpeg',
                'audio/mp3',
                'audio/wav',
                'audio/ogg',
                'audio/x-wav',
                'audio/webm',
                'audio/vorbis',
                'application/octet-stream' // Pour certains fichiers MP3
            ];

            // Vérifier l'extension du fichier
            $extension = strtolower($value->getClientOriginalExtension());
            $validExtensions = ['mp3', 'wav', 'ogg'];

            return in_array($mimeType, $validMimeTypes) || in_array($extension, $validExtensions);
        });

        // Personnaliser le message d'erreur
        $customMessages = [
            'cover_image.is_image_with_avif' => 'Le fichier doit être une image (jpg, png, gif, avif, webp, heic).',
            'audio_sample_path.is_audio' => 'Le fichier audio doit être au format mp3, wav ou ogg.',
            'file_upload.max' => 'Le fichier téléchargeable ne doit pas dépasser 100 Mo.',
            'file_upload.mimes' => 'Le fichier téléchargeable doit être au format ZIP.',
        ];

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|file|is_image_with_avif|max:8048',
            'type' => 'required|in:payant,gratuit',
            'audio_sample_path' => 'nullable|file|is_audio|max:20480',
            'youtube_link' => 'nullable|string|url',
            'price' => 'nullable|numeric|min:0',
            'is_visible' => 'boolean',
            'file_upload' => 'nullable|file|mimes:zip|max:102400', // 100MB max, ZIP uniquement
        ], $customMessages);

        try {
            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('productions', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            if ($request->hasFile('audio_sample_path')) {
                // Renommer le fichier pour éviter les problèmes avec les caractères spéciaux
                $originalName = pathinfo($request->file('audio_sample_path')->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $request->file('audio_sample_path')->getClientOriginalExtension();
                $safeFileName = Str::slug($originalName) . '.' . $extension;

                $audioPath = $request->file('audio_sample_path')
                    ->storeAs('productions/audio', $safeFileName, 'public');
                $validated['audio_sample_path'] = Storage::url($audioPath);
            }

            // Gestion du fichier téléchargeable pour les beats payants
            if ($request->hasFile('file_upload') && $request->type === 'payant') {
                // Renommer le fichier pour éviter les problèmes avec les caractères spéciaux
                $originalName = pathinfo($request->file('file_upload')->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $request->file('file_upload')->getClientOriginalExtension();
                $safeFileName = Str::slug($originalName) . '.zip'; // Forcer l'extension .zip

                $filePath = $request->file('file_upload')
                    ->storeAs('productions/downloads', $safeFileName, 'local');
                $validated['file_path'] = $filePath;
            }

            Production::create($validated);

            return redirect()->back()
                ->with('success', 'Production créée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la production:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la création de la production'])
                ->withInput();
        }
    }

    public function update(Request $request, Production $production)
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

        // Validation personnalisée pour les fichiers audio
        Validator::extend('is_audio', function ($attribute, $value, $parameters, $validator) {
            if (!$value instanceof \Illuminate\Http\UploadedFile) {
                return false;
            }

            // Vérifier le MIME type réel du fichier
            $mimeType = $value->getMimeType();
            $validMimeTypes = [
                'audio/mpeg',
                'audio/mp3',
                'audio/wav',
                'audio/ogg',
                'audio/x-wav',
                'audio/webm',
                'audio/vorbis',
                'application/octet-stream' // Pour certains fichiers MP3
            ];

            // Vérifier l'extension du fichier
            $extension = strtolower($value->getClientOriginalExtension());
            $validExtensions = ['mp3', 'wav', 'ogg'];

            return in_array($mimeType, $validMimeTypes) || in_array($extension, $validExtensions);
        });

        // Personnaliser le message d'erreur
        $customMessages = [
            'cover_image.is_image_with_avif' => 'Le fichier doit être une image (jpg, png, gif, avif, webp, heic).',
            'audio_sample_path.is_audio' => 'Le fichier audio doit être au format mp3, wav ou ogg.',
            'file_upload.max' => 'Le fichier téléchargeable ne doit pas dépasser 100 Mo.',
            'file_upload.mimes' => 'Le fichier téléchargeable doit être au format ZIP.',
        ];

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|file|is_image_with_avif|max:8048',
            'type' => 'required|in:payant,gratuit',
            'audio_sample_path' => 'nullable|file|is_audio|max:20480',
            'youtube_link' => 'nullable|string|url',
            'price' => 'nullable|numeric|min:0',
            'is_visible' => 'boolean',
            'file_upload' => 'nullable|file|mimes:zip|max:102400', // 100MB max, ZIP uniquement
        ], $customMessages);

        try {
            if ($request->hasFile('cover_image')) {
                // Supprimer l'ancienne image
                if ($production->cover_image) {
                    $oldImagePath = str_replace('/storage/', '', $production->cover_image);
                    Storage::disk('public')->delete($oldImagePath);
                }

                // Enregistrer la nouvelle image
                $imagePath = $request->file('cover_image')->store('productions', 'public');
                $validated['cover_image'] = Storage::url($imagePath);
            }

            if ($request->hasFile('audio_sample_path')) {
                // Supprimer l'ancien audio
                if ($production->audio_sample_path) {
                    $oldAudioPath = str_replace('/storage/', '', $production->audio_sample_path);
                    Storage::disk('public')->delete($oldAudioPath);
                }

                // Renommer le fichier pour éviter les problèmes avec les caractères spéciaux
                $originalName = pathinfo($request->file('audio_sample_path')->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $request->file('audio_sample_path')->getClientOriginalExtension();
                $safeFileName = Str::slug($originalName) . '.' . $extension;

                $audioPath = $request->file('audio_sample_path')
                    ->storeAs('productions/audio', $safeFileName, 'public');
                $validated['audio_sample_path'] = Storage::url($audioPath);
            }

            // Gestion du fichier téléchargeable pour les beats payants
            if ($request->hasFile('file_upload') && $request->type === 'payant') {
                // Supprimer l'ancien fichier téléchargeable
                if ($production->file_path) {
                    Storage::delete($production->file_path);
                }

                // Renommer le fichier pour éviter les problèmes avec les caractères spéciaux
                $originalName = pathinfo($request->file('file_upload')->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $request->file('file_upload')->getClientOriginalExtension();
                $safeFileName = Str::slug($originalName) . '.zip'; // Forcer l'extension .zip

                $filePath = $request->file('file_upload')
                    ->storeAs('productions/downloads', $safeFileName, 'local');
                $validated['file_path'] = $filePath;
            }

            $production->update($validated);

            return redirect()->back()
                ->with('success', 'Production mise à jour avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la production:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de la production'])
                ->withInput();
        }
    }

    public function destroy(Production $production)
    {
        try {
            // Supprimer l'image de couverture
            if ($production->cover_image) {
                $imagePath = str_replace('/storage/', '', $production->cover_image);
                Storage::disk('public')->delete($imagePath);
            }

            // Supprimer le fichier audio
            if ($production->audio_sample_path) {
                $audioPath = str_replace('/storage/', '', $production->audio_sample_path);
                Storage::disk('public')->delete($audioPath);
            }

            // Supprimer le fichier téléchargeable
            if ($production->file_path) {
                Storage::delete($production->file_path);
            }

            $production->delete();
            return redirect()->back()->with('success', 'Production supprimée avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la production:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de la suppression de la production']);
        }
    }
}
