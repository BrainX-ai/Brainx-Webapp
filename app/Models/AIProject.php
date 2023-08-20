<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'email', 'title', 'budget'
    ];
}
