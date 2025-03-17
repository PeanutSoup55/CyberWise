<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Lesson $lesson)
    {
        return view('admin.courses.lessons.quizzes.create', compact('lesson'));
    }

    public function store(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $quiz = $lesson->quiz()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.lessons.quizzes.edit', ['lesson' => $lesson->id, 'quiz' => $quiz->id])->with('success', 'Quiz created!');
    }

    public function edit(Lesson $lesson, Quiz $quiz){
        $quiz->load('questions');
        return view('admin.courses.lessons.quizzes.edit', compact('quiz', 'lesson'));
    }

    public function update(Request $request, Lesson $lesson, Quiz $quiz){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $quiz->update([
           'title' => $request->title,
           'description' => $request->description,
        ]);

        return redirect()->route('admin.lessons.show', ['lesson' => $lesson->id, 'quiz' => $quiz->id])
            ->with('success', 'Quiz updated! you can now add or edit questions');
    }
    public function show(Lesson $lesson,Quiz $quiz)
    {
        $quiz->load('questions');

        return view('admin.courses.lessons.quizzes.show', compact('quiz', 'lesson'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $score = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            if (isset($request->answers[$question->id]) && $request->answers[$question->id] === $question->correct_option) {
                $score++;
            }
        }

        $percentage = $totalQuestions > 0 ? ($score / $totalQuestions) * 100: 0;

        return view('admin.quizzes.result', compact('score', 'totalQuestions', 'percentage', 'quiz'));
    }
}
