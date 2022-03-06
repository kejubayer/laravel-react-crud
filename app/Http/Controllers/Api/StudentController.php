<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => 200,
            'students' => $students
        ]);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Student found!"
            ]);
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'course' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validator_err' => $validator->messages()
            ]);
        } else {
            $inputs = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'course' => $request->input('course'),
                'phone' => $request->input('phone'),
            ];
            Student::create($inputs);
            return response()->json([
                'status' => 200,
                'message' => "Student added successfully"
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'course' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validator_err' => $validator->messages()
            ]);
        } else {
            $inputs = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'course' => $request->input('course'),
                'phone' => $request->input('phone'),
            ];
            $student = Student::find($id);
            if ($student) {
                $student->update($inputs);
                return response()->json([
                    'status' => 200,
                    'message' => "Student updated successfully"
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Student found!"
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => "Student deleted successfully"
        ]);
    }
}
