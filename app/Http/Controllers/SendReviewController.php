<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

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

}
