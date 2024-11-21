<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ThemeController extends Controller
{
    
 public function index()
    {
          $books=Book::get();
          $categories = Category::get();
        return view('theme.books.index',compact('categories','books'));  
    }
    public function category()  {
        

    $categories = Category::get();

        // $categoryName=Category::get();
       
        return view('theme.books.category',compact('categories'));
        
    }
 
}