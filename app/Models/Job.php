<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Job extends Model
{
    use HasFactory;
    protected $primaryKey = 'job_id';


    public function actions(){
        return $this->hasMany(Action::class,'job_id');
    }

    public function client(){
        return $this->hasOne(User::class,'id','client_id')->with('client');
    }

    public function talent(){
        return $this->hasOne(User::class,'id','talent_user_id')->with('talent');
    }

    public function contract(){
        return $this->hasOne(Contract::class,'job_id','job_id')->with('milestones')->latest();
    }

    public function project_requests(){
        return $this->hasMany(ProjectRequest::class,'job_id')->with('talent');
    }

    public function latest_project_request(){
        return $this->hasMany(ProjectRequest::class,'job_id')->latest();
    }

    public function isAccepted(){
        
        return $projectRequest = $this->hasOne(ProjectRequest::class,'job_id')->where('user_id', Auth::user()->id)->latest();
       
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_title',
        'job_description',
        'hourly_rate_from',
        'hourly_rate_to',
        'duration_in_weeks',
        'hours_per_week',
        'job_type',
        'budget',
        'client_id'

    ];
}
