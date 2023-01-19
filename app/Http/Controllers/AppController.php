<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class AppController extends Controller
{
        
        public function index() {
      
           $books = Books::join('categories', 'categories.id', 
           '=', 'books.category_id')
           ->get([
                 'categories.category', 
                 'books.image',
                 'books.title',
                 'books.description',
                 'books.authors',
                 'books.file'
                ]);
           return view('library', ['books' => $books]) ;
        }

  
        public function tracks() {
      
                return view('tracks');
        
           
        }
}
