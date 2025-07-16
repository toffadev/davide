<?php

namespace App\Console\Commands;

use App\Models\Production;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;

class VerifyZipFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zip:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérifier et réparer les fichiers ZIP des productions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Vérification des fichiers ZIP des productions...');

        // Récupérer toutes les productions avec un fichier
        $productions = Production::whereNotNull('file_path')->get();

        $this->info("Nombre de productions avec fichiers: " . $productions->count());

        $validCount = 0;
        $invalidCount = 0;

        foreach ($productions as $production) {
            $this->line("Vérification du fichier pour la production: " . $production->title);

            // Vérifier si le fichier existe
            if (!Storage::exists($production->file_path)) {
                $this->error("Le fichier n'existe pas: " . $production->file_path);
                $invalidCount++;
                continue;
            }

            // Vérifier si c'est un fichier ZIP valide
            $filePath = Storage::path($production->file_path);
            $zip = new ZipArchive();
            $result = $zip->open($filePath);

            if ($result === true) {
                $this->info("Le fichier ZIP est valide: " . $production->file_path);
                $zip->close();
                $validCount++;
            } else {
                $this->error("Le fichier ZIP est invalide: " . $production->file_path);
                $this->error("Code d'erreur: " . $result);
                $invalidCount++;
            }
        }

        $this->info("Vérification terminée.");
        $this->info("Fichiers valides: " . $validCount);
        $this->info("Fichiers invalides: " . $invalidCount);

        return Command::SUCCESS;
    }
}
