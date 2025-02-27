<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    //CREATE A NEW LESSON
    public function create(Course $course){
        return view('admin.courses.lessons.create', compact('course'));
    }

    //STORE A LESSON
    public function store(Request $request, Course $course){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);
        $lesson = new Lesson($validated);
        $lesson->course()->associate($course);
        $lesson->save();
        return redirect()
            ->route('admin.courses.show', $course)
            ->with('success', 'lesson added successfully');
    }

    //SHOW ALL STORED LESSONS
    public function show(Lesson $lesson)
    {
        // The lesson will be passed to the view

        return view('admin.courses.lessons.show', compact('lesson'));
    }

    //EDIT LESSON FORM
    public function edit(Lesson $lesson)
    {
        return view('admin.courses.lessons.update', compact('lesson'));
    }

    //UPDATE THE LESSON
    public function update(Request $request, Lesson $lesson)
    {
        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'order' => 'required|integer',
        ]);

        // Update the lesson details
        $lesson->update($validatedData);

        return redirect()
            ->route('admin.lessons.show', $lesson)
            ->with('success', 'lesson updated successfully');

        // Redirect to the lesson details page
        //return redirect()->route('admin.lessons.show', $lesson)->with('success', 'Lesson updated successfully!');
    }

    // DELETE A LESSON
    public function destroy(Lesson $lesson)
    {
        // Delete the lesson and associated videos (if needed)
        $lesson->delete();

        // Redirect back to the course page with success message
        return redirect()
            ->route('admin.courses.show', $lesson->course_id)
            ->with('success', 'Lesson deleted successfully!');
    }
}
