<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Added for debugging

class QuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        return view('admin.courses.lessons.quizzes.questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {


        $validatedData = $request->validate([
            'question_text' => 'required|string', // FIXED: Correct input name
            'options' => 'required|array|min:2',
            'correct_option' => 'required|string'
        ]);



        // Ensure correct_option is in options array
        if (!in_array($validatedData['correct_option'], $validatedData['options'])) {
            return back()->withErrors([
                'Correct_option' => 'the correct answer must be a listed option'
            ])->withInput();
        }

        // Create question
        $question = Question::create([
            'quiz_id' => $quiz->id,
            'question' => $validatedData['question_text'],
            'options' => json_encode($validatedData['options']),
            'correct_option' => $validatedData['correct_option'],
        ]);

        dd('saved question: ', $question );

        return redirect()->route('admin.lessons.quizzes.edit', [
            'lesson' => $quiz->lesson_id,
            'quiz' => $quiz->id
        ])->with('success', 'Question added!');
    }
}
