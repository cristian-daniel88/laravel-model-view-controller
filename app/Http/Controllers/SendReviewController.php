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
     
      $review  = Reviews::find($request->input('reviewId'))->delete();
    
      return redirect()->action(
        [AppController::class, 'book'], ['id' => $_SESSION['bookId']]
    );

    }

    public function edit (Request $request) 
    {
      session_start();
      //dd($request->input('reviewId'));
      //$results = DB::select('update reviews where id = ?', []);
      $review = Reviews::find($request->input('reviewId'));
      $review->review = $request->input('textarea');
      $review->rating = $request->input('rating');
      $review->save();

      return redirect()->action(
        [AppController::class, 'book'], ['id' => $_SESSION['bookId']]
    );
      
    }

}
