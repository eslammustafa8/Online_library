@extends('theme.layouts.master')

@section('content')
    <h1>All Books</h1>
    <a href="/books/create" class="btn btn-primary mb-3">Add New Book</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>categories</th>
                <th>Price</th>
                <th>user</th>
                <th>book</th>
                <th>Actions</th>
            </tr>
            @if (count($books) > 0)
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->user->name }}</td>
                        <td><a href="{{ route('books.show', $book->id) }}">{{ $book->book_name }}</a></td>
                        <td><a href="{{ route('books.edit', $book->id) }}">Edit</a>|<a
                                href="{{ route('books.edit', $book->id) }}">Delet</a></td>
                    </tr>
                @endforeach
            @endif
        </thead>
        <tbody>
            <!-- Display each book -->
        </tbody>
    </table>
@endsection
