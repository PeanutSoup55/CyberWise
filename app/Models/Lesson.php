<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order',
    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function videos(){
        return $this->hasMany(Video::class);
    }
    public function quiz(){
        return $this->hasOne(Quiz::class);
    }
}
