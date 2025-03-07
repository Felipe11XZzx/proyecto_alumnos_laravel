<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;


Route::get('/', function () {
    return view('main');
})->name ("main");

Route::resource("alumnos", AlumnoController::class)
->middleware('auth');

Route::get('/dashboard', function () {
    return view('main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::view("home", "home");
Route::view("about", "about");
Route::view("contact", "contact");
Route::view("noticias", "noticias");

require __DIR__.'/auth.php';
