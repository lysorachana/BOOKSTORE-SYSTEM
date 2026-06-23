<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;

class BookController extends Controller
{
    public function uiIndex()
    {
        $books = Book::with(['authorData', 'category', 'bookDetail'])->get();
        return view('books.index', compact('books'));
    }
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            // $filename = time() . '_' . $file->getClientOriginalName();
            $filename = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('books', $filename, 'public');
        }
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'cover_image' => $imagePath,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);
        return redirect('ui/books')->with('success', 'Book created successfully');
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        if ($request->hasFile('cover_image')) {
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $file = $request->file('cover_image');
            // $filename = time() . '_' . $file->getClientOriginalName();
            $filename = time() . '_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            $book->cover_image = $file->storeAs('books', $filename, 'public');
        }

        $book->update();
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->qty = $request->quantity;
        $book->save();
        return redirect()->route('books.ui')->with('success', 'Book updated successfully');
    }       
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
            Storage::disk('public')->delete($book->cover_image);
        }
        $book->delete();
        return redirect()->route('books.ui')->with('success', 'Book deleted successfully');
    }
    // public function destroy($id)
    // {
    //     // Check if the user is logged in AND is an admin
    //     if (auth()->user()->role !== 'admin') {
    //         // If they are a customer, kick them out with a 403 Forbidden error
    //         abort(403, 'Unauthorized action. Only admins can delete books.');
    //     }

    //     $book = Book::findOrFail($id);
    //     $book->delete();

    //     return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    // }

    public function index()
    {
        $book = Book::with(['authorData', 'category', 'bookDetail'])->get();
        return response()->json([
            'books' => $book,
            'success' => 'Books retrieved successfully'
        ]);
    }
    public function show($id)
    {
        $book = Book::with(['authorData', 'category', 'bookDetail'])->find($id);
        if (!$book) {
            return response()->json(['success' => 'Book not found'], 404);
        }
        return response()->json([
            'book' => $book,
            'success' => 'Book show_id successfully'
        ]);
    }

}
