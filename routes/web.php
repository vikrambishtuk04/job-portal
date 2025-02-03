<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Job;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $jobs = Job::all();
    return Inertia::render('JobSearch', [
        'joblist' => $jobs
    ]);
    // return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/job', function () {
    $jobs = Job::all();
    return Inertia::render('JobSearch', [
        'joblist' => $jobs
    ]);
    // return Inertia::render('JobSearch');
});

// Route::get('/job/create', function () {
//     return Inertia::render('CreateJob');
// })->middleware(['auth'])->name('jobs.create');

require __DIR__.'/auth.php';
