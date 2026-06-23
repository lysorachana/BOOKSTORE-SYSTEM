<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'authors' => Author::all(),
            'message' => 'Authors retrieved successfully'
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:authors',
            'biography' => 'nullable|string',
        ]);
        $author = Author::create($validatedData);
        return response()->json([
            'author' => $author,
            'message' => 'Author created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author = Author::find($author->id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return response()->json([
            'author' => $author,
            'message' => 'Author retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $author = Author::find($author->id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:authors,email,' . $author->id,
            'biography' => 'nullable|string',
        ]);
        $author->update($validatedData);
        return response()->json([
            'author' => $author,
            'message' => 'Author updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author = Author::find($author->id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        $author->delete();
        return response()->json([
            'author' => $author,
            'message' => 'Author deleted successfully'
        ]);
    }
}
