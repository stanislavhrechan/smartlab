<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// CONTROLLERS FOR ADMIN ------------------>
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



Route::get('/rezervation/rooms', function () {
    return view('rezervations.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
