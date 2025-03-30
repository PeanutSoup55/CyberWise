<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(){
        $courses = Course::orderBy('order')->get();

        return view('user.courses.index', compact('courses'));
    }

    public function show(Course $course){
        $course->load('lessons');
        return view('user.courses.show', compact('course'));
    }
}
