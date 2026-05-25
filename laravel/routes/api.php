<?php

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Joke;

Route::get('/jokes', function () {
    return response()->json(
        Joke::query()
            ->latest()
            ->get()
    );
});

Route::post('/track', function (Request $request) {

    $ip = $request->ip();

    $city = null;

    try {
        $response = Http::get("http://ip-api.com/json/{$ip}");

        if ($response->successful()) {
            $city = $response->json()['city'] ?? null;
        }

    } catch (Throwable $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }

    Visit::create([
        'ip' => $ip,
        'city' => $city,
        'user_agent' => $request->userAgent(),
        'visited_at' => now(),
    ]);

    return response()->json([
        'success' => true
    ]);
});
