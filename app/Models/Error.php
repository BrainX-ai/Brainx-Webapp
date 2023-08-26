<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    protected $appends = ['created_at'];

    protected $fillable = [
        'message',
        'line',
        'file',
        'created_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format("d M Y H:i:s");
    }
}
