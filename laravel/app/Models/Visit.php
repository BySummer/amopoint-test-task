<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'ip',
        'city',
        'user_agent',
        'visited_at',
    ];
}
