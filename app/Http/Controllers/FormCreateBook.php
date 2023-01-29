<?php

namespace App\Http\Controllers;

use App\Models\Books;

use App\Models\Genres;
use App\Models\Instruments;
use Illuminate\Http\Request;

class FormCreateBook extends Controller
{
 public function index() {
       session_start();
       if (empty($_SESSION["username"])) {
         return redirect()->action([LoginController::class, 'index']);
       }

        return view('form-create-book',  
        ['genres' => Genres::all(),
         'instruments' => Instruments::all()
        ]);  
 }

 public function store(Request $request) {

       // if(
       
       //     !$request->input('title') or
       //     !$request->input('genre') or
       //     !$request->input('description') or
       //     !$request->input('authors') or
       //     !$request->file('image') or
       //     !$request->file('file') 

       //  ) 
       // {
       //        return view('form-create-book',  [
                     
       //               'genres' => Genres::all(),
       //               'failed' => 'Boock sent failed, please check the fields' 
       //        ]);  
              
       // }



      
       $nameImg = $request->file('image')->getClientOriginalName();
       $extImg =   $request->file('image')->getClientOriginalExtension();
       $sizeImg =  $request->file('image')->getSize();
       $request->file('image')->storeAs('public/images/',  $nameImg);


       $nameFile = $request->file('file')->getClientOriginalName();
       $extIFile =   $request->file('file')->getClientOriginalExtension();
       $sizeFile =  $request->file('file')->getSize();
       $request->file('file')->storeAs('public/files/',  $nameFile);


       $book = new Books();
       $book->title = $request->input('title');
       $book->genre_id = $request->input('genre');
       $book->instrument_id = $request->input('instrument');
       $book->authors = $request->input('authors');
       $book->musical_arrangements = $request->input('arrangements');
       $book->image = $nameImg;
       $book->file = $nameFile;
       $book->save(); 

       redirect()->back() ;


       return view('form-create-book',  [
              'instruments'=> Instruments::all(),
              'genres' => Genres::all(),
              'succesfull' => 'Book sent' 
       
       ]);  
       
       

 }
}
