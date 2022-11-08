<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'dentist_user_id',
        'user_id',
        'start_date',
        'end_date',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class);
    }
    
    public function dentist()
    {
        return $this->belongsTo(User::class , 'dentist_user_id');
    }
}
