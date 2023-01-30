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
        
        <div class="column2-book   bg-white border border-gray-200 rounded-lg shadow-md 
        dark:bg-gray-800 dark:border-gray-700 
        ">

        <div class="font-normal text-gray-700 
        dark:text-gray-400 flex  w-52">
        <b>Rating:</b>
        <div class="flex justify-around w-2/5 items-center ">

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
</div>

</div>

<div class="">
    <b>Reviews: </b>
<div class="overflow-y-auto h-50">
    <div>
        @php
            //dd($otherTables[2])
        @endphp
        @foreach ($otherTables[2] as $review)
            <div class="p-3">
                <div class="bg-slate-200 float-left px-3 rounded"> {{$review->user}} </div>:
                    <i>{{$review->review}} Lorem ipsum dolor sit 
                    amet consectetur adipisicing elit. Harum, 
                    incidunt dolore perferendis deleniti ipsam 
                    eveniet fugiat quam magnam eaque modi. Recusandae, 
                    unde soluta? Porro voluptas vitae ex maiores nemo officia?
                    </i>
                    <div class="flex">
                        Rating: &nbsp;
                        <div class="rating-user">
                            @php
                            if(!empty($review->rating)) {
                             if($review->rating >= 1 ) {
                             echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
                            } else {
                            if ($review->rating >= 0.5) {
                            echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                           } else {
                            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                            }
                          }
    
                     if($review->rating >= 2 ) {
                     echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
                     } else {
                     if ($review->rating >= 1.5) {
                     echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                     } else {
                     echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                     }
                     }
    
                  if($review->rating >= 3 ) {
                   echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
                  } else {
                  if ($review->rating >= 2.5) {
                  echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                  } else {
                   echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                  }
                  }
    
                 if($review->rating >= 4 ) {
                echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
                } else {
                if ($review->rating >= 3.5) {
                echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                } else {
               echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                }
                } 
    
                if($review->rating >= 5 ) {
                 echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
                } else {
                 if ($review->rating >= 4.5) {
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
                        </div>
                    </div>
                    @if ($review->user_id == $_SESSION["id"])
                        <div>
                            <button class="m-2">
                                <i class="fas fa-edit"></i>
                            </button>

                            <button>
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    @endif
                    
                </div>
                
                <hr class="w-48 h-1 mx-auto  bg-gray-200 border-0 rounded dark:bg-gray-700">
                @endforeach
            </div>
        </div>
        <br>



</div>  
<form action="" class="review-textarea">
    <div>

        <textarea name=""cols="100" rows="3"></textarea>
        <br>
        <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        Send
        </button>

       
    </div>
</form>

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
