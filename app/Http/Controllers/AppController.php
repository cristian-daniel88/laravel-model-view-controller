<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
        
        public function index() {
           $reviews = Reviews::all();
           $books = Books::
             join('genres', 'genres.id', '=', 'books.genre_id')
           ->join('instruments', 'instruments.id', '=', 'books.instrument_id')
           
           
           
           ->orderby('genres.name', 'ASC')
           
           ->get([
               
                 'instruments.name AS instrument',
                 'genres.name AS genre', 
                 'books.image',
                 'books.title',
                 'books.musical_arrangements',
                 'books.authors',
                 'books.file',
                 'books.id',
                 
           ]);

           return view('library', 
           ['books' => $books,
            'reviews' => $reviews
           ]) ;
        }

  
        public function book(Request $request) {
             
             $current_page = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
             
             
             $book =  DB::table('books')
             ->select('*')
             ->whereRaw('id =' . $current_page)->first();


             if ($book == null) {
              return view('book', ['book' => 'null']);
             }

             return view('book', ['book' => $book]);
        
           
        }
}
