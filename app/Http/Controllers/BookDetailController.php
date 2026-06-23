<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'book_details' => BookDetail::all(),
            'message' => 'Book details retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'publisher' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'page_count' => 'required|integer',
        ]);
        $bookDetail = BookDetail::create($validatedData);
        return response()->json([
            'book_detail' => $bookDetail,
            'message' => 'Book detail created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookDetail $bookDetail)
    {
        $bookDetail = BookDetail::find($bookDetail->id);
        if (!$bookDetail) {
            return response()->json(['message' => 'Book detail not found'], 404);
        }
        return response()->json([
            'book_detail' => $bookDetail,
            'message' => 'Book detail retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookDetail $bookDetail)
    {
        $bookDetail = BookDetail::find($bookDetail->id);
        if (!$bookDetail) {
            return response()->json(['message' => 'Book detail not found'], 404);
        }
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'publisher' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'page_count' => 'required|integer',
        ]);
        $bookDetail->update($validatedData);
        return response()->json([
            'book_detail' => $bookDetail,
            'message' => 'Book detail updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDetail $bookDetail)
    {
        $bookDetail = BookDetail::find($bookDetail->id);
        if (!$bookDetail) {
            return response()->json(['message' => 'Book detail not found'], 404);
        }
        $bookDetail->delete();
        return response()->json([
            'book_detail' => $bookDetail,
            'message' => 'Book detail deleted successfully'
        ]);
    }
}
