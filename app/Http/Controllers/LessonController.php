<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function create(Course $course){
        return view('admin/lessons/create', compact('course'));
    }

    public function store(Request $request, Course $course){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);
        $lesson = new Lesson($validated);
        $lesson->course()->associate($course);
        $lesson->save();
        return redirect()->route('admin/courses/show', $course->id)->with('success', 'lesson added succesfully');
    }
    public function show(Lesson $lesson)
    {
        // The lesson will be passed to the view
        return view('admin/lessons/show', compact('lesson'));
    }
}
