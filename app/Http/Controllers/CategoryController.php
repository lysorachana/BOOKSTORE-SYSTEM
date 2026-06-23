<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'categories' => Category::all(),
            'message' => 'Categories retrieved successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        $category = Category::create($validatedData);
        return response()->json([
            'category' => $category,
            'message' => 'Category created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }
        return response()->json([
            'category' => $category,
            'message' => 'Category retrieved successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::find($category->id);
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|boolean',
        ]);
        $category->update($validatedData);
        return response()->json([
            'category' => $category,
            'message' => 'Category updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }
        $category->delete();
        return response()->json([
            'category' => $category,
            'message' => 'Category deleted successfully',
        ]);
    }
}
