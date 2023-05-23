<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Skill extends Model
{
    use HasFactory;
    protected $primaryKey = 'skill_id';

    protected $fillable = [
        'category_id',
        'skill_name'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
}