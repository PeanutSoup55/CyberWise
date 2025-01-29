<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Video;

class VideoController extends Controller
{
    public function create(Lesson $lesson)
    {
        return view('admin/lessons/videos/create', compact('lesson'));
    }

    // Store the new video in the database
    public function store(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4|max:102400', // max size: 100MB
            'order' => 'required|integer',
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        // Create a new video for the lesson
        $lesson->videos()->create([
            'title' => $request->title,
            'url' => $videoPath,
            'order' => $request->order,
        ]);

        return redirect()->route('admin/lessons/show', $lesson->id)->with('success', 'Video added successfully!');
    }
}
