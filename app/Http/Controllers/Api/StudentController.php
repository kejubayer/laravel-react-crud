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
}
