<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Support\Facades\File;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class LessonController extends Controller
{
    public function show(Lesson $lesson) {
        $markdown = File::get(resource_path('lessons/intro-to-cyber.md'));

        $lessonContent = (new MarkdownRenderer())->toHtml($markdown);

        return view('user.courses.lessons.show', compact('lesson', 'lessonContent'));
    }
}
