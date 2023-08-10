<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'industry',
        'price',
        'delivery_time',
        'image'
    ];

    public function talent()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
