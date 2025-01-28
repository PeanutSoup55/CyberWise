<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Lesson;

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

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
