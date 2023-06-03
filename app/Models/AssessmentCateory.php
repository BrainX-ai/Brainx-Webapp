<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class AssessmentCateory extends Model
{
    use HasFactory;

    function result(){
        return $this->hasMany(Quiz::class)->where('user_id', Auth::user()->id)->latest();
    }

    protected $fillable = [
        'category_name',
        'description',
    ];
}
