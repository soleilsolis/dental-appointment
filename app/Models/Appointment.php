<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'start_time',
        'end_time',
        'service_id',
        'notes',
        'completed_at',
        'prescription',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function dentist()
    {
        return $this->belongsTo(User::class , 'dentist_user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
