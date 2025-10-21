<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::all();
        return response()->json($violations);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'type' => 'required|string',
            'severity' => 'required|string',
            'evidence' => 'nullable|string',
        ]);

        $violation = Violation::create($validatedData);
        return response()->json($violation, 201);
    }

    public function show($id)
    {
        $violation = Violation::findOrFail($id);
        return response()->json($violation);
    }

    public function update(Request $request, $id)
    {
        $violation = Violation::findOrFail($id);

        $validatedData = $request->validate([
            'type' => 'sometimes|required|string',
            'severity' => 'sometimes|required|string',
            'evidence' => 'nullable|string',
        ]);

        $violation->update($validatedData);
        return response()->json($violation);
    }

    public function destroy($id)
    {
        $violation = Violation::findOrFail($id);
        $violation->delete();
        return response()->json(null, 204);
    }
}