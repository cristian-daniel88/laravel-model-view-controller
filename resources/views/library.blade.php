@extends('treehouse')
@section('body')
<div class="h-14"></div>
<br>
<br>

    





<div class="grid md:grid-cols-2 
and lg:grid-cols-3 gap-8
grid-books
">

    
    
    @foreach ($books as $book)
    
    
    <div class="container-card shadow-lg bg-slate-100
    transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-110 duration-300
    ">
        <div class="column1-card">
            <div class="category_container">
                <p class="text-center border-r-4 
                border-l-4 border-indigo-500
                bg-slate-200
                ">
                {{ucfirst($book->category)}}
            </p>       
        </div>
        <div class="img-container 
        border-double border-4 
        border-lime-800
        ">
            <img src="{{asset('storage/images/' . $book->image)}}" 
            alt=""
            class="border-double"
            >
        </div>
        
        
    </div>
    <div class="column2-card">
        <h4 class="font-serif underline 
        decoration-solid text-center
        tracking-widest
        text-xl"
        >
        {{
            strlen($book->title) < 25 ? 
            strip_tags($book->title) : 
            strip_tags(substr($book->title, 0, strpos($book->title, ' ', 12))) . '...'
        }}
        </h4>
        
        <p class=""><b>Description:</b>
            {{
                strlen($book->description) < 23 ? 
                strip_tags($book->description) : 
                strip_tags(substr($book->description, 0, strpos($book->description, ' ', 21))) . '...'
            }}
        </p>
        
        <p><b>Authors: </b> 
            {{
                strlen($book->authors) < 23 ? 
                strip_tags($book->authors) : 
                strip_tags(substr($book->authors, 0, strpos($book->authors, ' ', 21))) . '...'
            }}
        
    </p>
    
    <br>
    <a
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold 
    py-2 px-4 border border-blue-700 rounded
    
    w-36
    "
    >
    Download
</a>



</div>
</div>



@endforeach

</div>

@endsection

{{-- <img class="rounded-t-lg"
src="{{asset('storage/images/' . $book->image)}}" 
alt="" /> --}}


