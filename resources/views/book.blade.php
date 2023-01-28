@extends('treehouse')
@section('body')

    <br>
    <br>
    <br>
    <br>

@if ($book == 'null')
    <div>null</div>
    <a class="nav-link" href="{{env('app_url')}}/"><b>Library</b></a>
@else

@endif

<div class="book-container">

        <div class="column1-book max-w-sm bg-white border border-gray-200 rounded-lg shadow-md 
        dark:bg-gray-800 dark:border-gray-700
        ">
           <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{$book->title}}
           </h5>
           <img class="rounded-t-lg m-auto " 
             src="{{asset('storage/images/' .$book->image)}}" 
             alt="" 
             width="70%"/>
           <br>
           <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
           <b>Authors:</b> {{$book->authors}}
           </p>
           <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
           <b>Genre:</b>  {{$otherTables[0]->name}}
           </p>
           <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
           <b>For:</b>    {{$otherTables[1]->name}}
           </p>
           <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
           <b>Musical arrangements:</b> {{$book->musical_arrangements}}
           </p>
           <div class="image-book_container">

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

        <div class="column2-book column1-book max-w-sm bg-white border border-gray-200 rounded-lg shadow-md 
        dark:bg-gray-800 dark:border-gray-700
        ">
        <p class="font-normal text-gray-700 dark:text-gray-400">
            <b>Rating: </b> 
            @php
            if(!empty($otherTables[3])) {
                         
            if($otherTables[3] >= 1 ) {
                echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
            } else {
                if ($otherTables[3] >= 0.5) {
                    echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                } else {
                    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                }
            }
            
            if($otherTables[3] >= 2 ) {
                echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
            } else {
                if ($otherTables[3] >= 1.5) {
                    echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                } else {
                    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                }
            }
            
            if($otherTables[3] >= 3 ) {
                echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
            } else {
                if ($otherTables[3] >= 2.5) {
                    echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                } else {
                    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                }
            }
            
            if($otherTables[3] >= 4 ) {
                echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
            } else {
                if ($otherTables[3] >= 3.5) {
                    echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                } else {
                    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                }
            }
            
            if($otherTables[3] >= 5 ) {
                echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
            } else {
                if ($otherTables[3] >= 4.5) {
                    echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                } else {
                    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                }
            }
            } else {
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
        }
        
        
        @endphp
        </p>    
   
 </div>

</div>



@endsection


{{-- 
<div class="book-container">
    <div class="reviews-container">
        reviews
    </div>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md 
    dark:bg-gray-800 dark:border-gray-700
    m-auto">
    
    <img class="rounded-t-lg m-auto " 
    src="{{asset('storage/images/' .$book->image)}}" 
    alt="" 
    width="70%"/>
    
    <div class="p-5">
        
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{$book->title}}
        </h5>
        
        <br>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
   <b>Description:</b>
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

</div> --}}
