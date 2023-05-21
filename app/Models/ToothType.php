<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToothType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'id', 'image_path'];

    protected $primaryKey = 'string';
}
