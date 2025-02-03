<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Jobs\{Index};
use App\Livewire\Pages\Skills\{Index as SkillsIndex};
use App\Http\Controllers\Admin\JobController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Job;

Route::redirect('/', '/admin/dashboard');

// Dashboard
Route::get('/dashboard', Dashboard::class)->name('dashboard');

// Skills
Route::get('/skills', SkillsIndex::class)->name('skills.index');

// Jobs
Route::get('/jobs', function() {
    $jobs = Job::all();
    return Inertia::render('Index', [
        'jobs' => $jobs
    ]);
})->name('jobs.index');
Route::get('/jobs/create', function () {
    return Inertia::render('CreateJob');
})->name('jobs.create');

Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');


