@extends('theme.layouts.master')

@section('content')
    <h1>Edit Book</h1>
    @if (session('updated-book'))
        <div class="alert alert-success">
            {{ session('updated-book') }}
        </div>
    @endif
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="book_name">Title:</label>
            <input type="text" name="book_name" class="form-control" value="{{ $book->book_name }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Genre:</label>
            <input type="text" name="category_id" class="form-control" value="{{ $book->category_id }}" required>
        </div>
        <div class="form-group">
            <label for="book_file">Genre:</label>
            <input type="file" name="book_file" class="form-control" value="{{ $book->book_file }}" required>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" value="{{ $book->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Book</button>
    </form>
@endsection
