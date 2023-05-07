<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToothChart extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id','tooth_type_id', 'condition_id',];

    public function toothType() 
    {
        return $this->belongsTo(ToothType::class, 'tooth_type_id', 'id');
    }

    public function condition() 
    {
        return $this->belongsTo(ToothType::class);
    }
    
    public function appointment() 
    {
        return $this->belongsTo(Appointment::class);
    }
}
