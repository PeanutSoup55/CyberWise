<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    //COURSE LISTING
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        $total = Course::count();
        return view('admin.courses.index' , compact(['courses', 'total']));
        //return view('admin.courses.home', compact(['courses', 'total']));
    }

    //COURSE CREATION FORM
    public function create()
    {
        return view('admin.courses.create');
    }

    //STORE A COURSE
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'difficulty' => 'required',
            'order' => 'required',
        ]);

        Course::create($validatedData);

        session()->flash('success', 'Course Created Successfully');
        return redirect()->route('admin.courses.index');

        /*if ($data) {
            session()->flash('success', 'Course Add Successfully');
            return redirect(route('courses'));
            //return redirect(route('admin.courses'));
        } else {
            session()->flash('error', 'Some problem occurred, please try again.');
            return redirect(route('courses.create'));
            //return redirect(route('admin.courses.create'));
        }*/
    }
    //COURSE EDIT FORM
    public function edit(Course $course)
    {
        return view('admin.courses.update', compact('course'));

        //$courses = Course::findOrFail($id);
        //return view('admin.courses.update', compact('courses'));
    }

    //UPDATE COURSE
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'difficulty' => 'required',
            'order' => 'required'
        ]);

        $course->update($validatedData);
        session()->flash('success', 'Course Updated Successfully');
        return redirect()->route('admin.courses.index');

        /*
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
            return redirect(route('courses'));
            //return redirect(route('admin.courses'));
        } else {
            session()->flash('error', 'Some problem occurred, please try again.');
            return redirect(route('courses.update'));
            //return redirect(route('admin.courses.update'));
        } */
    }

    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('success', 'Course Deleted Successfully');
        return redirect()->route('admin.courses.index');

        /*
        $courses = Course::findOrFail($id)->delete();
        if ($courses) {
            session()->flash('success', 'Course Deleted Successfully');
            return redirect(route('courses'));
            //return redirect(route('admin.courses'));
        } else {
            session()->flash('error', 'Course Not Delete successfully');
            return redirect(route('courses'));
            //return redirect(route('admin.courses'));
        } */

    }



    public function show(Course $course)
    {
        return view ('admin.courses.show', compact('course'));

        /*
        $course = Course::findOrFail($id); // Fetch course by ID
        return view('courses.show', compact('course'));
        return view('admin.courses.show', compact('course')); // Pass the course to the view */
    }
}
