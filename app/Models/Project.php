<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'link', 'name', 'email', 'gender', 'technologies', 'experience', 'feedback', 'user_id'
    ];

    protected $casts = [
        'technologies' => 'array', // Automatically handle the encoding/decoding of technologies
    ];
}

