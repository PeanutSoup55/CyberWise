<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        return view('admin/questions/create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:2',
            'correct_option' => 'required|string|in:' . implode(',', $request->options),
        ]);

        Question::create([
            'quiz_id' => $quiz->id,
            'question' => $request->question,
            'options' => json_encode($request->options),
            'correct_option' => $request->correct_option,
        ]);

        return redirect()->route('admin/quizzes/show', $quiz->id)->with('success', 'Question added!');
    }
}
