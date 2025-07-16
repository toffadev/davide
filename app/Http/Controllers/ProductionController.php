<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductionController extends Controller
{
    /**
     * Affiche la page des productions
     */
    public function index()
    {
        // Récupérer les productions payantes
        $paidProductions = Production::where('is_visible', true)
            ->where('type', 'payant')
            ->orderBy('created_at', 'desc')
            ->get();

        // Récupérer les productions gratuites
        $freeProductions = Production::where('is_visible', true)
            ->where('type', 'gratuit')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Productions', [
            'paidProductions' => $paidProductions,
            'freeProductions' => $freeProductions
        ]);
    }
}
