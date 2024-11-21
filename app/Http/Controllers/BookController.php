<?php

namespace App\Http\Controllers;

use App\Http\Requests\booksRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Book;
use App\Models\Category;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Auth\Middleware\Authorize;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $categories=Category::get();
    //     return view('theme.books.index',compact('categories'));  
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   
        $categories=Category::get();
        return view('theme.books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(booksRequest $request)
    {
        $book = $request->validated();

// Check if the uploaded file is a valid file
    $bookFile = $request->file('book_file');  // Access the uploaded file (this is the file object)

    // Generate a new name for the book file
    $newBookName = uniqid() . '-' . $bookFile->getClientOriginalName();

    // Move the file to the 'books' directory in the 'public' storage disk
    $bookFile->storeAs('books', $newBookName, 'public');

    // Update the book data array with the new file name and user ID
    $book['book_file'] = $newBookName;
    $book['user_id'] = Auth::user()->id;

    // Save the new book data to the database
    Book::create($book);

    return back()->with('status-book', 'Your book was added successfully');


    }
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
                

        $book=Book::findOrFail($id);
   $filepath = asset('storage/books/' . $book->book_file);

    return view('theme.books.show',compact('book','filepath'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $updated=Book::findOrFail($id);
                if($updated->user_id ==Auth::user()->id){

        $categories=Category::get();
        $book=Book::findOrFail($id);
        return view('theme.books.edit',compact('book','categories'));
    }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $updated=Book::findOrFail($id);
        if($updated->user_id ==Auth::user()->id){

    $book = $request->validated();

// Check if the uploaded file is a valid file
    $bookFile = $request->file('book_file');  // Access the uploaded file (this is the file object)

    // Generate a new name for the book file
    $newBookName = uniqid() . '-' . $bookFile->getClientOriginalName();

    // Move the file to the 'books' directory in the 'public' storage disk
    $bookFile->storeAs('books', $newBookName, 'public');

    // Update the book data array with the new file name and user ID
    $book['book_file'] = $newBookName;
    $book['user_id'] = Auth::user()->id;

    // Save the new book data to the database
    $updated->update($book);

    return back()->with('updated-book', 'Your book was updated successfully');

        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
