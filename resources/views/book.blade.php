@extends('treehouse')
@section('body')

    <br>
    <br>
    <br>
    <br>

    
<div class="
     max-w-sm bg-white border border-gray-200 rounded-lg shadow-md 
     dark:bg-gray-800 dark:border-gray-700
     m-auto
     ">
 
        <img class="rounded-t-lg m-auto " 
        src="{{asset('storage/images/' .$book->image)}}" 
        alt="{{$book->description}}" 
        width="70%"/>
    
    <div class="p-5">
       
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{$book->title}}
            </h5>
        
        <br>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        <b>Description: {{$book->description}}</b>
        </p>
        
        <p class="mb-3 font-light text-gray-700 dark:text-gray-400">
            <b>Authors: {{$book->authors}}</b>
        </p>
        <div class="download-big_card">

            <a href="{{asset('storage/files/' .$book->file)}}" 
                class="
                px-3 py-2 text-sm font-medium text-center 
                text-white bg-blue-700 rounded-lg 
                hover:bg-blue-800 focus:ring-4 
                focus:outline-none focus:ring-blue-300 
                dark:bg-blue-600 dark:hover:bg-blue-700
                dark:focus:ring-blue-800
                
                "
                download="{{$book->file}}">
                Download
                
            </a>


        </div>
    </div>
</div>

<br>

@endsection
