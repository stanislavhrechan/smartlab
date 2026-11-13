<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// CONTROLLERS FOR ADMIN ------------------>
use App\Http\Controllers\Admin\{AdminDashboard, UsersController, ProjectsController };

Route::get('/adm1n/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
Route::get('/adm1n/dashboard/users', [UsersController::class, 'index'])->name('dashboard.admin.users');
Route::get('/adm1n/dashboard/projects', [ProjectsController::class, 'index'])->name('dashboard.admin.projects');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('home.about');
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
