<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// CONTROLLERS FOR ADMIN ------------------>
<<<<<<< HEAD

use App\Http\Controllers\Admin\{AdminDashboard, UsersController, ProjectsController, EventsController, ArticlesController};
// --- VEREJNÉ CESTY (Dostupné pre každého bez prihlásenia) ---
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('home.about');
});
=======
use App\Http\Controllers\Admin\{AdminDashboard, UsersController, ProjectsController, AktualisController};
use App\Http\Controllers\Partner\{PartnerController};
use App\Http\Controllers\User\{HomeController, ProjectController, StudentiController, PartneriController};
use App\Http\Controllers\Network\{OnboardingController};


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function() {
    return view('home.about');
})->name('about');

Route::get('/aktualits', function() {
    return view('home.aktualits');
})->name('aktualits');

Route::get('/podujatia', function() {
    return view('home.podujatia');
})->name('podujatia');

Route::get('/projects', function() {
    return view('home.projects');
})->name('projekts');

Route::get('/partneri', [PartneriController::class, 'index'])->name('partneri');

Route::get('/kontakt', function() {
    return view('home.kontakt');
})->name('kontakt');

Route::get('/studenti', [StudentiController::class, 'index'])->name('studenti');

Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])
    ->name('projects.show');


Route::middleware(['auth', 'role:USR'])->group(function() {
    Route::get('/onboarding', [OnboardingController::class, 'index'])->name('onboarding');
    Route::post('/onboarding', [OnboardingController::class, 'store'])->middleware('auth');
});


Route::middleware(['auth', 'role:ADM'])->group(function()
{
    Route::get('/adm1n/dashboard', [AdminDashboard::class, 'index'])->name('dashboard.admin');
    Route::get('/adm1n/dashboard/users', [UsersController::class, 'index'])->name('dashboard.admin.users');
    Route::get('/adm1n/dashboard/projects', [ProjectsController::class, 'index'])->name('dashboard.admin.projects');
    Route::post('/adm1n/dashboard/project/store', [ProjectsController::class, 'store'])->name('dashboard.admin.projects.store');
    Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('dashboard.admin.projects.update');
    Route::get('/adm1n/dashboard/aktualits', [AktualisController::class, 'index'])->name('dashboard.admin.aktualits');
});

Route::middleware(['auth', 'role:PARTNER'])->group(function()
{
    Route::get('/par4ner/dashboard', [PartnerController::class, 'index'])->name('dashboard.partner');
});

Route::middleware(['auth', 'onboarding'])->group(function()
{

});


>>>>>>> ef2776f25ff51fe84add03dd13d911ca8ac9fc97

Route::get('/rezervation/rooms', function () {
    return view('rezervations.index');
});


<<<<<<< HEAD
// --- CHRÁNENÉ CESTY (Dostupné iba pre prihlásených používateľov/admina) ---
=======
>>>>>>> ef2776f25ff51fe84add03dd13d911ca8ac9fc97
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
