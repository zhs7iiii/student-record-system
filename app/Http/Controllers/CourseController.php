<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('courses.index',['courses' => $courses]);
    }
    public function create(){
        return view('courses.create');
    }

    public function store(){
        request()->validate([
            'shortName' => ['required'],
            'fullName' => ['required'],
        ]);

        $course = Course::create([
            'short_name' => request('shortName'),
            'full_name' => request('fullName')
        ]);

        return redirect('/courses');
    }

    public function edit(Course $course){
        return view('courses.edit',['course' => $course]);
    }

    public function update(Course $course){
        request()->validate([
            'shortName' => ['required'],
            'fullName' => ['required']
        ]);

        $course->update([
            'short_name' => request('shortName'),
            'full_name' => request('fullName')
        ]);

        return redirect('/courses');
    }
    public function destroy(Course $course){
        $course->delete();
        return redirect('/courses');
    }
}
