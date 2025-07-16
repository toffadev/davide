<?php

namespace App\Console\Commands;

use App\Models\Production;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class RepairZipFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zip:repair';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Réparer les fichiers ZIP des productions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Réparation des fichiers ZIP des productions...');

        // Récupérer toutes les productions avec un fichier
        $productions = Production::whereNotNull('file_path')->get();

        $this->info("Nombre de productions avec fichiers: " . $productions->count());

        $repairedCount = 0;
        $failedCount = 0;

        foreach ($productions as $production) {
            $this->line("Vérification du fichier pour la production: " . $production->title);

            // Vérifier si le fichier existe
            if (!Storage::exists($production->file_path)) {
                $this->error("Le fichier n'existe pas: " . $production->file_path);
                $failedCount++;
                continue;
            }

            // Vérifier si c'est un fichier ZIP valide
            $filePath = Storage::path($production->file_path);
            $zip = new ZipArchive();
            $result = $zip->open($filePath);

            if ($result === true) {
                $this->info("Le fichier ZIP est déjà valide: " . $production->file_path);
                $zip->close();
                continue;
            }

            // Le fichier est corrompu, essayons de le réparer
            $this->warn("Le fichier ZIP est invalide, tentative de réparation: " . $production->file_path);

            // 1. Vérifier si le fichier a l'extension .zip
            $pathInfo = pathinfo($production->file_path);
            if (!isset($pathInfo['extension']) || strtolower($pathInfo['extension']) !== 'zip') {
                $newPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '.zip';

                // Renommer le fichier avec l'extension .zip
                if (Storage::exists($production->file_path)) {
                    Storage::move($production->file_path, $newPath);
                    $production->file_path = $newPath;
                    $production->save();
                    $this->info("Extension corrigée: " . $newPath);
                }
            }

            // 2. Si le fichier est toujours corrompu, demander à l'utilisateur de le remplacer
            $filePath = Storage::path($production->file_path);
            $zip = new ZipArchive();
            $result = $zip->open($filePath);

            if ($result !== true) {
                $this->error("Le fichier est toujours corrompu après réparation de l'extension.");
                $this->warn("Vous devrez remplacer ce fichier manuellement dans le panneau d'administration.");
                $failedCount++;
            } else {
                $this->info("Fichier réparé avec succès!");
                $zip->close();
                $repairedCount++;
            }
        }

        $this->info("Réparation terminée.");
        $this->info("Fichiers réparés: " . $repairedCount);
        $this->info("Fichiers non réparés: " . $failedCount);

        return Command::SUCCESS;
    }
}
