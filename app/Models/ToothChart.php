<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToothChart extends Model
{
    use HasFactory;

    public function toothType() {
        return $this->hasOne(ToothType::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
