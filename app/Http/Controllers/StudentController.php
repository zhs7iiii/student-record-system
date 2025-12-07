<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use App\Models\Season;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        $courses = Course::all();
        $countries = Country::all();
        //current season
        $season = Season::where('active', true)->first();
        return view('students.create', [
            'courses' => $courses,
            'countries' => $countries,
            'season' => $season,
        ]);
    }

    public function store()
    {
        $student = request()->validate([
            'course_id' => 'required',
            'subject_id' => 'required',
            'season_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',

            'first_name' => 'nullable',
            'middle_name' => 'nullable',
            'last_name' => 'nullable',
            'gender' => 'nullable',
            'guardian_name' => 'nullable',
            'occupation' => 'nullable',
            'income' => 'nullable',
            'category' => 'nullable',
            'physically_challenged' => 'nullable',
            'nationality' => 'nullable',

            'mobile_number' => 'nullable',
            'email' => 'nullable',
            'permanent_address' => 'nullable',
            'correspondence_address' => 'nullable',

            'board1' => 'nullable',
            'board2' => 'nullable',
            'roll_no1' => 'nullable',
            'roll_no2' => 'nullable',
            'year_pass1' => 'nullable',
            'year_pass2' => 'nullable',

            'subject1' => 'nullable',
            'subject2' => 'nullable',
            'marks_obtained1' => 'nullable',
            'marks_obtained2' => 'nullable',
            'full_marks1' => 'nullable',
            'full_marks2' => 'nullable',
        ]);

        // dd($student);
        Student::create($student);

        return redirect('/students');
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        $countries = Country::all();
        //current season
        return view('students.edit', [
            'courses' => $courses,
            'countries' => $countries,
            'student' => $student,
        ]);
    }

    public function update(Student $student)
    {
        request()->validate([
            'course_id' => 'required',
            'subject_id' => 'required',
            'season_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',

            'first_name' => 'nullable',
            'middle_name' => 'nullable',
            'last_name' => 'nullable',
            'gender' => 'nullable',
            'guardian_name' => 'nullable',
            'income' => 'nullable',
            'category' => 'nullable',
            'physically_challenged' => 'nullable',
            'nationality' => 'nullable',

            'mobile_number' => 'nullable',
            'email' => 'nullable',
            'permanent_address' => 'nullable',
            'correspondence_address' => 'nullable',

            'board1' => 'nullable',
            'board2' => 'nullable',
            'roll_no1' => 'nullable',
            'roll_no2' => 'nullable',
            'year_pass1' => 'nullable',
            'year_pass2' => 'nullable',

            'subject1' => 'nullable',
            'subject2' => 'nullable',
            'marks_obtained1' => 'nullable',
            'marks_obtained2' => 'nullable',
            'full_marks1' => 'nullable',
            'full_marks2' => 'nullable',
        ]);

        $student->update(request()->all());

        return redirect('/students');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students');
    }
}
