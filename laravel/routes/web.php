<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use App\Models\Visit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jokes-page', function () {
    return view('jokes');
});

Route::get('/dashboard', function () {
    $byHour = Visit::selectRaw('EXTRACT(HOUR FROM visited_at) as hour, COUNT(*) as total')
        ->groupBy('hour')
        ->orderBy('hour')
        ->get();

    $byCity = Visit::selectRaw('city, COUNT(*) as total')
        ->groupBy('city')
        ->get();

    return view('dashboard', [
        'byHour' => $byHour,
        'byCity' => $byCity,
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
