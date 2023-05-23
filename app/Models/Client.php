<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_id';

    protected $fillable = [
        'name',
        'email',
        'country',
        'job_title',
        'user_id',
        'password'
    ];
}
