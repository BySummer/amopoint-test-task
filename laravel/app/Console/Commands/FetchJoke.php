<?php

namespace App\Console\Commands;

use App\Models\Joke;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchJoke extends Command
{
    protected $signature = 'jokes:fetch';
    protected $description = 'Fetch joke from external API and store it';

    public function handle(): int
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');

        if (!$response->ok()) {
            $this->error('API request failed');
            return 1;
        }

        $data = $response->json();

        Joke::create([
            'external_id' => $data['id'] ?? null,
            'type' => $data['type'] ?? null,
            'setup' => $data['setup'],
            'punchline' => $data['punchline'],
        ]);

        $this->info('Joke saved');
        return 0;
    }
}
