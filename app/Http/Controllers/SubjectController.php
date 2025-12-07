<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function getSubjects($course_id) {
        $subjects = Subject::where('course_id', $course_id)->get();
        return response()->json($subjects);
    }

    public function index(){
        $subjects = Subject::all();
        return view('subjects.index', ['subjects' => $subjects]);

    }
    public function create(){
        $courses = Course::all();
        return view('subjects.create',['courses' => $courses]);
    }

    public function store(){
        request()->validate([
            'course' => ['required'],
            'subject1' => ['required'],
            'subject2' => ['required'],
            'subject3' => ['required'],
            'subject4' => ['required'],
        ]);

        $subject = Subject::create([
            'course_id' => request('course'),
            'subject1' => request('subject1'),
            'subject2' => request('subject2'),
            'subject3' => request('subject3'),
            'subject4' => request('subject4'),
        ]);

        return redirect('/subjects');
    }

    public function edit(Subject $subject){
        $courses = Course::all();
        return view('subjects.edit', ['subject' => $subject,'courses'=>$courses]);
    }

    public function update(Subject $subject){
        //validate
        request()->validate([
            'course' => ['required'],
            'subject1' => ['required'],
            'subject2' => ['required'],
            'subject3' => ['required'],
            'subject4' => ['required'],
        ]);

        //update
        $subject->update([
            'course_id' => request('course'),
            'subject1' => request('subject1'),
            'subject2' => request('subject2'),
            'subject3' => request('subject3'),
            'subject4' => request('subject4'),
        ]);

        //redirect
        return redirect('/subjects');
    }

    public function destroy(Subject $subject){
        $subject->delete();
        return redirect('/subjects');
    }
}
