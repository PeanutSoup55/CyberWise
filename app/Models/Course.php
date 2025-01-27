<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    Use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'order',
    ];
}
