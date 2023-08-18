<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_id',
        'payment_status',
        'user_id'

    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
