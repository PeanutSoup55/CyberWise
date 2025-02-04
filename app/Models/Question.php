<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'question_text',
        'options',
        'correct_option'
    ];
    protected $casts = [
        'options' => 'array'
    ];


    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
