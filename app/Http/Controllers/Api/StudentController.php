<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'status'=> 200,
            'students'=>$students
        ]);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json([
            'status'=> 200,
            'student'=>$student
        ]);
    }
    public function store(Request $request)
    {
        $inputs = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'course'=>$request->input('course'),
            'phone'=>$request->input('phone'),
        ];
        Student::create($inputs);
        return response()->json([
           'status'=> 200,
            'message'=>"Student added successfully"
        ]);
    }
    public function update(Request $request,$id)
    {
        $inputs = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'course'=>$request->input('course'),
            'phone'=>$request->input('phone'),
        ];
        $student = Student::find($id);
       $student->update($inputs);
        return response()->json([
            'status'=> 200,
            'message'=>"Student updated successfully"
        ]);
    }
}
