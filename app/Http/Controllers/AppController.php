<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AppController extends Controller
{
        
        public function index() {
           //Storage::delete('public/images/pp.jpg');

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


             $genre = Genres::select('*')
             ->whereRaw('id =' . $book->genre_id)->first();

             $forInst = Instruments::select('*')
             ->whereRaw('id =' . $book->instrument_id)->first();

             $reviews = Reviews::all();
             $reviewsArray = array();
             
             foreach ($reviews as $review) {
               if ($review->book_id == $book->id) {
                array_push($reviewsArray, $review );
               }
             }

             $rating = Reviews::all();
             $ratingArray = array();
             foreach ($rating as $rat) {
               if ($rat->book_id == $book->id) {
                array_push($ratingArray, $rat->rating);
               }
             }

             $avgRating = array_sum($ratingArray)/count($ratingArray);
             
           
             

            

             return view('book', 
             ['book' => $book],
             ['otherTables'=> [$genre, $forInst, $reviewsArray, $avgRating]], 
             );
        
           
        }
}
