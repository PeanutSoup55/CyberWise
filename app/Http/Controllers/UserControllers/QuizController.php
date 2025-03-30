<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
        return view('user.courses.lessons.quizzes.show', compact('quiz'));
    }

}
