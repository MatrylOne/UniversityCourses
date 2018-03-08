<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|min:3|max:255',
            'lastName' => 'required|string|min:3|max:255',
        ]);

        $student = new Student([
            'firstName' => $validatedData->firstName,
            'lastName' => $validatedData->lastName
        ]);

        $student->save();
        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|min:3|max:255',
            'lastName' => 'required|string|min:3|max:255',
        ]);

        $student -> firstName = $validatedData -> firstName;
        $student -> lastName = $validatedData -> lastName;
        $student -> save();
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('student');
    }

    public function courses(Student $student){
        $courses = Course::all();
        return view('students.courses', ['student' => $student, 'courses' => $courses]);
    }

    public function assignCourse(Request $request, Student $student){
        $request->validate([
            'course_id' => 'required|numeric',
        ]);

        if($request->course_id >= 0) {
            $student->course_id = $request->course_id;
        }else{
            $student->course_id = null;
        }
        $student->save();
        return redirect('student');
    }
}
