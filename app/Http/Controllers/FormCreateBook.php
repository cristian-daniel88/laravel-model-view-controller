<?php

namespace App\Http\Controllers;

use App\Models\Books;

use App\Models\Genres;
use App\Models\Instruments;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

 public function deleteBook (Request $request) {
      $book = Books::select('*')
          ->whereRaw('id =' . $request->input('bookId'))->first();
      
      Storage::delete('public/files/' . $book->file);
      
      $book->delete();

      $results = DB::select('delete from reviews where book_id = ?', [$request->input('bookId')]);

      

      return redirect()->action([AppController::class, 'index']);
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
       //$request->file('image')->storeAs('public/images/',  $nameImg);
       $request->file('image')->store('public/images/');

       $nameFile = $request->file('file')->getClientOriginalName();
       $extIFile =   $request->file('file')->getClientOriginalExtension();
       $sizeFile =  $request->file('file')->getSize();
       //$request->file('file')->storeAs('public/files/',  $nameFile);
       $request->file('file')->store('public/files/');

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


      //  return view('form-create-book',  [
      //         'instruments'=> Instruments::all(),
      //         'genres' => Genres::all(),
      //         'succesfull' => 'Book sent' 
       
      //  ]);  
      
      return redirect()->action([AppController::class, 'index']);
       

 }
}
