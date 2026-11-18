<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// CONTROLLERS FOR ADMIN ------------------>
use App\Http\Controllers\Admin\{AdminDashboard, UsersController, ProjectsController, EventsController, ArticlesController};

// --- VEREJNÉ CESTY (Dostupné pre každého bez prihlásenia) ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('home.about');
});

Route::get('/rezervation/rooms', function () {
    return view('rezervations.index');
});

// --- CHRÁNENÉ CESTY (Dostupné iba pre prihlásených používateľov/admina) ---
Route::middleware('auth')->group(function () {

    // -- Profil --
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // -- Administrátorský Dashboard a Používatelia --
    Route::get('/adm1n/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/adm1n/dashboard/users', [UsersController::class, 'index'])->name('dashboard.admin.users');

    // -- Administrácia Projektov --
    Route::prefix('adm1n/dashboard/projects')->name('dashboard.admin.projects.')->group(function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('index');
        Route::get('/create', [ProjectsController::class, 'create'])->name('create');
        Route::post('/', [ProjectsController::class, 'store'])->name('store');
        Route::get('/{project}/edit', [ProjectsController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectsController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectsController::class, 'destroy'])->name('destroy');
    });

    // -- Administrácia Podujatí (Events) --
    Route::prefix('adm1n/dashboard/events')->name('dashboard.admin.events.')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('index');
        Route::get('/create', [EventsController::class, 'create'])->name('create');
        Route::post('/', [EventsController::class, 'store'])->name('store');
        Route::get('/{event}/edit', [EventsController::class, 'edit'])->name('edit');
        Route::put('/{event}', [EventsController::class, 'update'])->name('update');
        Route::delete('/{event}', [EventsController::class, 'destroy'])->name('destroy');
    });

    // -- Administrácia Aktualít (Articles) --
    Route::prefix('adm1n/dashboard/articles')->name('dashboard.admin.articles.')->group(function () {
        Route::get('/', [ArticlesController::class, 'index'])->name('index');
        Route::get('/create', [ArticlesController::class, 'create'])->name('create');
        Route::post('/', [ArticlesController::class, 'store'])->name('store');
        Route::get('/{article}/edit', [ArticlesController::class, 'edit'])->name('edit');
        Route::put('/{article}', [ArticlesController::class, 'update'])->name('update');
        Route::delete('/{article}', [ArticlesController::class, 'destroy'])->name('destroy');
    });

});

require __DIR__.'/auth.php';
