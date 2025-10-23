<?php

namespace  App\Http\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Dedoc\Scramble\Scramble;


class StudentController extends Controller
{
    public function register(): void
    {
        Scramble::ignoreDefaultRoutes();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students, Response::HTTP_OK);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json($student, Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display a listing of the resource by parent ID.
     * 
     * @param int $parent_id
     * @return \Illuminate\Http\JsonResponse
     */
    #GET /students/by-parent/{parent_id}
    public function show_by_parent($parent_id)
    {
        $students = Student::where('parent_id', $parent_id)->get();
        return response()->json($students, Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1',
            'class' => 'required|string|max:100',
            'parent_id' => 'required|exists:parents,id',
        ]);

        $student = Student::create($validatedData);
        return response()->json($student, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $id,
            'age' => 'sometimes|required|integer|min:1',
            'class' => 'sometimes|required|string|max:100',
            'parent_id' => 'sometimes|exists:parents,id',
        ]);

        $student->update($validatedData);
        return response()->json($student, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], Response::HTTP_OK);
    }
}
