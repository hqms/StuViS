<?php

namespace  App\Http\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = Parents::all();
        return response()->json($parents, Response::HTTP_OK);
    }

    public function show($id)
    {
        $parent = Parents::find($id);
        if ($parent) {
            return response()->json($parent, Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Parent not found'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email',
            'phone' => 'required|string|max:20',
        ]);

        $parent = Parents::create($validatedData);
        return response()->json($parent, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $parent = Parents::find($id);
        if (!$parent) {
            return response()->json(['message' => 'Parent not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:parents,email,' . $id,
            'phone' => 'sometimes|required|string|max:20',
        ]);

        $parent->update($validatedData);
        return response()->json($parent, Response::HTTP_OK);
    }

    function destroy($id)
    {
        $parent = Parents::find($id);
        if (!$parent) {
            return response()->json(['message' => 'Parent not found'], Response::HTTP_NOT_FOUND);
        }

        $parent->delete();
        return response()->json(['message' => 'Parent deleted successfully'], Response::HTTP_OK);
    }
}
