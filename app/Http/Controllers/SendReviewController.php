<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendReviewController extends AppController
{
    public function add (Request $request) {
        session_start();

        $review = new Reviews();
        $review->user_id = $_SESSION['id'];
        $review->rating = $request->input('rating');
        $review->review = $request->input('review');
        $review->book_id = $_SESSION['bookId'];
        $review->created_at = date("Y-m-d H:i:s");
        $review->save(); 
         
         return $this->bookFunction();
      }

    public function delete (Request $request) {
        session_start();
        

        Reviews::find($request->input('reviewId'))->delete();

        $book =  DB::table('books')
          ->select('*')
          
          ->whereRaw('id =' . $_SESSION['bookId'])->first();

          

          if ($book == null) {
           return view('book', ['book' => 'null']);
          }


          $genre = Genres::select('*')
          ->whereRaw('id =' . $book->genre_id)->first();

          $forInst = Instruments::select('*')
          ->whereRaw('id =' . $book->instrument_id)->first();

          $reviews = Reviews::all();
          
          $reviewsArray = array();
          

          $reviewsAll = Reviews::
          join('users', 'users.id', '=', 'reviews.user_id')
          ->orderby('reviews.created_at', 'DESC')
          ->get([
               'reviews.id',
               'reviews.review',
               'reviews.rating',
               'reviews.user_id',
               'reviews.book_id',
               'users.username AS user',
               'users.id AS userId'
             ]);

             foreach ($reviewsAll as $review) {
               if ($review->book_id == $book->id) {
                array_push($reviewsArray, $review );
               }
             }

         
          $ratingArray = array();
          foreach ( $reviewsAll as $rat) {
            if ($rat->book_id == $book->id) {
             array_push($ratingArray, $rat->rating);
            }
           }
           $avgRating = array_sum($ratingArray)/
           (count($ratingArray) == 0 ? 1 : count($ratingArray) );
  
          
         $_SESSION['bookId'] = $book->id;

          return view('book', 
          ['book' => $book],
          ['otherTables'=> [$genre, $forInst, $reviewsArray, $avgRating]], 
          );

    }

}
