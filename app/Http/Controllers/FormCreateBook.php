<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;

class FormCreateBook extends Controller
{
 public function index() {
        return view('form-create-book',  ['categories' => Categories::all()]);  
 }

 public function store(Request $request) {

       if(
       
           !$request->input('title') or
           !$request->input('category') or
           !$request->input('description') or
           !$request->input('authors') or
           !$request->file('image') or
           !$request->file('file') 

        ) 
       {
              return view('form-create-book',  [
                     'categories' => Categories::all(),
                     'failed' => 'Boock sent failed, please check the fields' 
              ]);  
              
       }



      
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
       $book->category_id = $request->input('category');
       $book->description = $request->input('description');
       $book->authors = $request->input('authors');
       $book->image = $nameImg;
       $book->file = $nameFile;
       $book->save(); 

       redirect()->back() ;


       return view('form-create-book',  [
              'categories' => Categories::all(),
              'succesfull' => 'Book sent' 
       
       ]);  
       
       

 }
}
