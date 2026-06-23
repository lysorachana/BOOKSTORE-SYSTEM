<?php


namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * បង្ហាញបញ្ជីសៀវភៅទាំងអស់ (GET /api/books)
     */
    public function index()
    {
        // ទាញយកសៀវភៅទាំងអស់ពី Database
        $books = Book::all(); 
        
        // ប្រើ BookResource::collection() ព្រោះវាជាទិន្នន័យច្រើន (Array/Collection)
        return BookResource::collection($books);
    }

    /**
     * បង្កើតសៀវភៅថ្មីមួយ (POST /api/books)
     */
    public function store(Request $request)
    {
        // កំណត់លក្ខខណ្ឌមុននឹងបញ្ជូនចូល Database (Validation)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
        ]);

        // បង្កើតទិន្នន័យថ្មី
        $book = Book::create($validated);

        // បញ្ជូនទិន្នន័យដែលទើបបង្កើតរួចទៅកាន់ Client វិញ
        return new BookResource($book);
    }

    /**
     * បង្ហាញសៀវភៅមួយជាក់លាក់ (GET /api/books/{book})
     */
    public function show(Book $book)
    {
        // ប្រើ new BookResource() ព្រោះវាជាទិន្នន័យតែមួយ (Single Model)
        return new BookResource($book);
    }

    /**
     * កែប្រែទិន្នន័យសៀវភៅ (PUT/PATCH /api/books/{book})
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'published_year' => 'sometimes|required|integer',
        ]);

        // ធ្វើបច្ចុប្បន្នភាពទិន្នន័យ (Update)
        $book->update($validated);

        // បញ្ជូនទិន្នន័យដែលបានកែប្រែរួចទៅកាន់ Client វិញ
        return new BookResource($book);
    }

    /**
     * លុបសៀវភៅ (DELETE /api/books/{book})
     */
    public function destroy(Book $book)
    {
        // លុបទិន្នន័យ
        $book->delete();

        // ជាទូទៅពេលលុបរួច យើងបញ្ជូនត្រឹមសារបញ្ជាក់ការលុបជោគជ័យ
        return response()->json([
            'message' => 'សៀវភៅត្រូវបានលុបដោយជោគជ័យ'
        ], 200); // ឬប្រើ 204 No Content ក៏បាន
    }
}
