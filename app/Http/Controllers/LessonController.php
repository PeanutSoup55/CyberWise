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

    public function edit(Lesson $lesson)
    {
        return view('admin/lessons/edit', compact('lesson'));
    }

    // Update the lesson
    public function update(Request $request, Lesson $lesson)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'order' => 'required|integer',
        ]);

        // Update the lesson details
        $lesson->update([
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
        ]);

        // Redirect to the lesson details page
        return redirect()->route('admin/lessons/show', $lesson->id)->with('success', 'Lesson updated successfully!');
    }

    public function destroy(Lesson $lesson)
    {
        // Delete the lesson and associated videos (if needed)
        $lesson->delete();

        // Redirect back to the course page with success message
        return redirect()->route('admin/courses/show', $lesson->course_id)->with('success', 'Lesson deleted successfully!');
    }
}
