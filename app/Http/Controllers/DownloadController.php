<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    /**
     * Télécharger un beat après achat
     */
    public function downloadBeat(Request $request, $id)
    {
        $production = Production::findOrFail($id);

        // Vérifier si l'utilisateur a acheté ce beat
        $query = Purchase::where('production_id', $id)
            ->where('status', 'completed')
            ->where('download_expires_at', '>', Carbon::now());

        if (Auth::check()) {
            $query->where(function ($q) {
                $q->where('user_id', Auth::id())
                    ->orWhere('email', Auth::user()->email);
            });
        } else {
            // Si l'utilisateur n'est pas connecté, on vérifie seulement avec la session
            $sessionId = $request->session()->get('stripe_session_id');
            if ($sessionId) {
                $query->where('stripe_session_id', $sessionId);
            } else {
                return redirect()->route('productions')->with('error', 'Vous devez être connecté pour télécharger ce fichier.');
            }
        }

        $purchase = $query->first();

        if (!$purchase) {
            return redirect()->route('productions')->with('error', 'Vous n\'avez pas accès à ce téléchargement ou votre lien a expiré.');
        }

        if (!$production->file_path || !Storage::exists($production->file_path)) {
            return redirect()->route('productions')->with('error', 'Le fichier n\'est pas disponible pour le téléchargement.');
        }

        // Obtenir le chemin physique du fichier
        $file = Storage::path($production->file_path);

        // Vérifier que le fichier existe physiquement
        if (!File::exists($file)) {
            return redirect()->route('productions')->with('error', 'Le fichier n\'est pas disponible pour le téléchargement.');
        }

        // Obtenir le nom du fichier original (conserver l'extension .zip)
        $fileName = basename($production->file_path);

        // Ajouter le titre de la production au nom du fichier si nécessaire
        if (strpos($fileName, $production->title) === false) {
            $fileName = $production->title . '-' . $fileName;
        }

        // S'assurer que le fichier a l'extension .zip
        if (!str_ends_with(strtolower($fileName), '.zip')) {
            $fileName .= '.zip';
        }

        // Télécharger le fichier avec les en-têtes appropriés
        return response()->download($file, $fileName, [
            'Content-Type' => 'application/zip',
            'Content-Length' => filesize($file),
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    }
}
