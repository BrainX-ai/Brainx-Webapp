<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    protected $fillable = [
        'caption',
        'amount',
        'contract_id'

    ];
}
