@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>បង្កើតសៀវភៅថ្មី</h2>
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <div class="mb-3">
                <label class="form-label">ចំណងជើងសៀវភៅ:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">អ្នកនិពន្ធ:</label>
                <select name="author_id" class="form-select" required>
                    <option value="">-- Select Author --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">ប្រភេទ:</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <label class="form-label">តម្លៃ:</label>
            <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">ចំនួន:</label>
        <input type="number" name="qty" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">ការពិពណ៌នា:</label><br>
        <textarea name="description" class="form-control" rows="3" cols="79"
            placeholder="Enter book description..."></textarea>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="cover_image">រូបភាពលើសៀវភៅ:</label>
            <input type="file" name="cover_image" class="form-control-file">
        </div>
        <button type="button" class="btn btn-secondary"
            onclick="window.location.href='{{ route('books.ui') }}'">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Book</button>
        </form>
    </div>
@endsection