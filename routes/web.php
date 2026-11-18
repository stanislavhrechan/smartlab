<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomReservationController;
use Illuminate\Support\Facades\Route;


// CONTROLLERS FOR ADMIN ------------------>
use App\Http\Controllers\Admin\{AdminDashboard, UsersController, ProjectsController };

Route::get('/adm1n/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
Route::get('/adm1n/dashboard/users', [UsersController::class, 'index'])->name('dashboard.admin.users');
Route::get('/adm1n/dashboard/projects', [ProjectsController::class, 'index'])->name('dashboard.admin.projects');

Route::view('/', 'pages.home')->name('home');
Route::view('/o-smart', 'pages.about')->name('about');
Route::view('/aktuality', 'pages.news')->name('news');
Route::view('/projekty', 'pages.projects')->name('projects');
Route::view('/podujatia', 'pages.events')->name('events');
Route::view('/partneri', 'pages.partners')->name('partners');
Route::view('/kontakty', 'pages.contacts')->name('contacts');
Route::view('/studenti', 'pages.students')->name('students');
Route::get('/rezervacie/dostupnost', [RoomReservationController::class, 'availability'])->name('reservations.availability');
Route::get('/rezervacie', [RoomReservationController::class, 'create'])->name('reservations.create');
Route::post('/rezervacie', [RoomReservationController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('reservations.store');

// Route::('/about', function() {
//     return view('home.about');
// });

Route::redirect('/rezervation/rooms', '/rezervacie');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
