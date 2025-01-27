<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::orderBy('id', 'desc')->get();
        $total = Course::count();
        return view('admin.courses.home', compact(['courses', 'total']));
    }
    public function create()
    {
        return view('admin.courses.create');
    }
    public function save(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'difficulty' => 'required',
            'order' => 'required',
        ]);
        $data = Course::create($validation);
        if ($data) {
            session()->flash('success', 'Course Add Successfully');
            return redirect(route('admin/courses'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.courses/create'));
        }
    }
    public function edit($id)
    {
        $courses = Course::findOrFail($id);
        return view('admin.courses.update', compact('courses'));
    }
 
    public function delete($id)
    {
        $courses = Course::findOrFail($id)->delete();
        if ($courses) {
            session()->flash('success', 'Course Deleted Successfully');
            return redirect(route('admin/courses'));
        } else {
            session()->flash('error', 'Course Not Delete successfully');
            return redirect(route('admin/courses'));
        }
    }
 
    public function update(Request $request, $id)
    {
        $courses = Course::findOrFail($id);
        $name = $request->name;
        $description = $request->description;
        $difficulty = $request->difficulty;
        $order = $request->order;
 
        $courses->name = $name;
        $courses->description = $description;
        $courses->difficulty = $difficulty;
        $courses->order = $order;
        $data = $courses->save();
        if ($data) {
            session()->flash('success', 'Course Update Successfully');
            return redirect(route('admin/courses'));
        } else {
            session()->flash('error', 'Some problem occured');
            return redirect(route('admin/courses/update'));
        }
    }

    public function show($id)
    {
        $course = Course::findOrFail($id); // Fetch course by ID
        return view('admin.courses.show', compact('course')); // Pass the course to the view
    }
}
