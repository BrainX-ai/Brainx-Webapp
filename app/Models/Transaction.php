<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';

    public function job(){
        return $this->belongsTo(Job::class, 'job_id','job_id')->with(['client', 'talent']);
    }

    protected $fillable = [
        'job_id',
        'milestone_id',
        'status'

    ];
}
