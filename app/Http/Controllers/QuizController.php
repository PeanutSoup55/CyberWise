<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Lesson $lesson)
    {
        return view('admin/lessons/quizzes/create', compact('lesson'));
    }

    public function store(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $quiz = Quiz::create([
            'lesson_id' => $lesson->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.lessons.quizzes.show', $quiz->id)->with('success', 'Quiz created!');
    }

    public function show(Quiz $quiz)
    {
        return view('admin.lessons.quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $score = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            if ($request->answers[$question->id] === $question->correct_option) {
                $score++;
            }
        }

        $percentage = ($score / $totalQuestions) * 100;

        return view('admin.quizzes.result', compact('score', 'totalQuestions', 'percentage', 'quiz'));
    }
}
