<?php

use Illuminate\Support\Facades\Route;
use App\Models\Joke;

Route::get('/jokes', function () {
    return response()->json(
        Joke::query()
            ->latest()
            ->get()
    );
});
