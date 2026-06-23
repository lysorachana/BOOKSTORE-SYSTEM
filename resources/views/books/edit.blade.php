@extends('layouts.app')

@section('content')
    <h2>កែប្រែសៀវភៅ</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>ចំណងជើងសៀវភៅ:</label><br>
        <input type="text" name="title" value="{{ $book->title }}" required><br><br>

        <label>អ្នកនិពន្ធ:</label><br>
        <select name="author_id" required>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select><br><br>

        <label>ប្រភេទ:</label><br>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>
        <label>តម្លៃ:</label><br>
        <input type="number" name="price" value="{{ $book->price }}" required><br><br>
        <label>ចំនួន:</label><br>
        <input type="number" name="quantity" value="{{ $book->qty }}" required><br><br>

        <div class="form-group">
            <label for="cover_image">រូបភាពលើសៀវភៅ:</label>
            <input type="file" name="cover_image" class="form-control-file">
        </div>
        <!-- <label>ការពិពណ៌នាលម្អិត៖</label><br> -->
        <!-- <textarea name="description" rows="4" style="width: 100%; ">{{ $book->description }}</textarea><br><br> -->
        <button type="button" onclick="window.location.href='{{ route('books.ui') }}'">Cancel</button>
        <button type="submit">Update</button>

    </form>
@endsection