<?php

use App\Http\Controllers\ProjetController;
use App\Http\Controllers\CategorieProjetController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RealisateurController;
use App\Http\Controllers\TypeArchiveController;
use App\Http\Controllers\Zonecontroller;
use App\Models\Archive;
use App\Models\Realisateur;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');





Route::get('/preview', function () {
    return view('projet.preview');
})->name('preview');

// Route::get('/preview' ,[projetController::class, 'afficherPDF'])->name('preview');

//Route::get('/preview/{$filename}', [projetController::class, 'preview'])->name('preview');

Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('accueil');
    })->name('dashboard');

    Route::resources([
        'roles' => \App\Http\Controllers\RoleController::class,
        'users' => \App\Http\Controllers\UserController::class,
    ]);



    Route::prefix('projet')->group(function () {
        Route::get('/index', [projetController::class, 'index'])->name('projet.index');
        Route::post('/store', [projetController::class, 'store'])->name('projet.store');
        Route::DELETE('/destroy/{projet}', [ProjetController::class, 'destroy'])->name('projet.destroy');
        Route::get('/{projet}/edit', [ProjetController::class, 'edit'])->name('projet.edit');
        Route::get('/{projet}/show', [ProjetController::class, 'show'])->name('projet.show');
        Route::post('/{projet}/update', [ProjetController::class, 'update'])->name('projet.update');
    });

    Route::prefix('categorie_projet')->group(
        function () {
            // categorie_projet
            Route::get('/index', [CategorieProjetController::class, 'index'])->name('categorie_projet.index');
            Route::DELETE('/destroy/{categorie_projet}', [CategorieProjetController::class, 'destroy'])->name('categorie_projet.destroy');
            Route::post('/store', [CategorieProjetController::class, 'store'])->name('categorie_projet.store');
            Route::get('/{categorie_projet}/edit', [CategorieProjetController::class, 'edit'])->name('categorie_projet.edit');
            Route::post('/{categorie_projet}/update', [CategorieProjetController::class, 'update'])->name('categorie_projet.update');
        }

    );

    Route::prefix('zone')->group(
        function () {
            // categorie_projet
            Route::get('/index', [zonecontroller::class, 'index'])->name('zones.index');
            Route::DELETE('/destroy/{zone}', [zonecontroller::class, 'destroy'])->name('zones.destroy');
            Route::post('/store', [zonecontroller::class, 'store'])->name('zone.store');
            Route::get('/{zone}/edit', [zonecontroller::class, 'edit'])->name('zones.edit');
            Route::put('/{zone}/update', [zonecontroller::class, 'update'])->name('zones.update');
            Route::get('/create', [zonecontroller::class, 'create'])->name('zones.create');
        }

    );

    // Route::get('/zone/index', [zonecontroller::class, 'index'])->name('zones.index');


    Route::prefix('archive')->group(function () {
        //archive
        Route::get('/index', [ArchiveController::class, 'index'])->name('archive.index');
        Route::DELETE('/destroy/{archive}', [ArchiveController::class, 'destroy'])->name('archive.destroy');
        Route::get('/create', [ArchiveController::class, 'create'])->name('archive.create');
        Route::post('/store', [ArchiveController::class, 'store'])->name('archive.store');

        Route::post('/{archive}/update', [ArchiveController::class, 'update'])->name('archive.update');
    });
    Route::get('archive/{archive}/edit', [ArchiveController::class, 'edit'])->name('archive.edit');

    Route::post('download/{id}', [Archive::class, 'download']);
    // type archive
    Route::prefix('type_archive')->group(function () {
        Route::get('/index', [TypeArchiveController::class, 'index'])->name('type_archive.index');
        Route::get('/create', [TypeArchiveController::class, 'create'])->name('type_archive.create');
        Route::post('/store', [TypeArchiveController::class, 'store'])->name('type_archive.store');
        Route::DELETE('/destroy/{type_archive}', [TypeArchiveController::class, 'destroy'])->name('type_archive.destroy');
        Route::get('/{type_archive}/edit', [TypeArchiveController::class, 'edit'])->name('type_archive.edit');
        Route::post('/{type_archive}', [TypeArchiveController::class, 'update'])->name('type_archive.update');
    });
});

Route::get('/recherche-projet', 'RechercheController@rechercheProjet')->name('recherche.projet');

Route::get('partenaires/index', [RealisateurController::class, 'index'])->name('partenaires.index');
Route::get('partenaires/create', [RealisateurController::class, 'create'])->name('partenaires.create');
Route::post('partenaires/store', [RealisateurController::class, 'store'])->name('partenaires.store');
Route::DELETE('/destroy/{realisateur}', [RealisateurController::class, 'destroy'])->name('partenaires.destroy');
Route::get('/{realisateur}/edit', [RealisateurController::class, 'edit'])->name('realisateur.edit');
Route::post('/{realisateur}/update', [RealisateurController::class, 'update'])->name('realisateur.update');

Route::get('/download/{filename}', [ProjetController::class, 'download'])->name('file_download');
