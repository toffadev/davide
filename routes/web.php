<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MusicReleaseController;
use App\Http\Controllers\Admin\ActualityController;
use App\Http\Controllers\Admin\ComedyShowController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MediaGalleryController;
use App\Http\Controllers\Admin\NewProjectController;
use App\Http\Controllers\ComedyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes d'authentification - Chargées en premier
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/musique', [App\Http\Controllers\MusicController::class, 'index']);

Route::get('/evenements', [ComedyController::class, 'index']);

Route::get('/biographie', function () {
    return Inertia::render('Biography');
});

Route::get('/actualites', [App\Http\Controllers\ActualityController::class, 'index']);

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        // Routes pour les musiques
        Route::resource('music-releases', MusicReleaseController::class);

        // Routes pour le nouveau projet (singleton)
        Route::get('new-project', [NewProjectController::class, 'index'])->name('new-project.index');
        Route::post('new-project', [NewProjectController::class, 'store'])->name('new-project.store');
        Route::put('new-project/{newProject}', [NewProjectController::class, 'update'])->name('new-project.update');
        Route::delete('new-project/{newProject}', [NewProjectController::class, 'destroy'])->name('new-project.destroy');

        // Routes pour les actualités
        Route::resource('actualities', ActualityController::class);

        // Routes pour les comédies
        Route::resource('comedy-shows', ComedyShowController::class);

        // Routes pour les événements
        Route::resource('events', EventController::class);

        // Routes pour la galerie média
        Route::resource('media-gallery', MediaGalleryController::class);
    });
});
