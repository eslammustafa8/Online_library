<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('theme.books.index');
// });

// Route::get('/books/create', function () {
//     return view('theme.books.create');
// })->name('books.create');




Route::controller(ThemeController::class)->name('books.')->group( function (){
    Route::get('/','index')->name('index');
    Route::get('/category','category')->name('category');
  
});


Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
Route::resource('books',BookController::class)->except('index');



require __DIR__.'/auth.php';
