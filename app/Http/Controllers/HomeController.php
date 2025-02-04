<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Video;
use App\Models\Quiz;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard', [
            'totalCourses' => Course::count(),
            'totalLessons' => Lesson::count(),
            'totalVideos' => Video::count(),
            'totalQuizzes' => Quiz::count(),
            'totalUsers' => User::count(),
        ]);
    }
}
