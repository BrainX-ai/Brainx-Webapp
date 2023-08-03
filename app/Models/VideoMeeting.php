<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'provider_value'
    ];
}
