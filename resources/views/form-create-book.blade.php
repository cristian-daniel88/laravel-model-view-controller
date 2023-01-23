{{-- @extends('treehouse')
@section('body')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card bg-white">
                <div class="card-body ">
                    <h3 class="card-title">Welcome to Create</h3>
                    <div class="row">
                        <form class="col-6 card-text form-group" method="POST" action="/create" enctype="multipart/form-data">
                            @csrf
                            <span id='spancito' style="color:red"> </span>
                            <br>
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                            <br>

                            <label for="category">Choose Category:</label>
                            <select name="category" id="cars" class="form-control">
                                <option value="">--Please choose an option--</option>
                                @foreach ($categories as $item)
                                <option value="<?php echo $item['id'] ?>" ><?php echo $item['category']; ?></option>
                                @endforeach
                            </select>
                            <br>

                            <label for="price">Price £:</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter price">
                            <br>

                            <label for="shortdescription">Short description:</label>
                            <input type="text" class="form-control" name="shortdescription" placeholder="Enter short description">
                            <br>

                            <label for="authors">Authors:</label>
                            <input type="text" class="form-control" name="authors" placeholder="Enter authors">
                            <br>

                            <label for="photo">Photo:</label>
                            <input type="file" class="form-control" name="photo" placeholder="Upload photo">
                            <br>


                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>

                            
                            
                        </form>
                        <div class="col-6">
                            <img src="{{ asset('storage/images/' . 'perfil.png'  )}}" alt="welcome truck">
                            <div id="demo">

                            </div>
                            @php
                                if(!empty($succesfull)) {
                                   echo "<script>
                                         document.getElementById('demo').innerHTML = '$succesfull'
                                        </script>";
                                }
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php



                                if (!empty($failed)) {
                                    
                                    echo "<script>
                                          document.getElementById('spancito').innerHTML = '$failed';
                                          let inputArray = document.getElementsByClassName('form-control');
                                          for (var i = 0; i < inputArray.length; ++i) {
                                            inputArray[i].addEventListener('click',  () => {
                                                document.getElementById('spancito').innerHTML = ''
                                            })
                                          }
                                         </script>";
                                    }
                             
        @endphp
    </div>

@endsection --}}


@extends('treehouse')

@section('body')
<div class="h-28"></div>
<h2 class="text-center uppercase 
text-inherit text-xl

tracking-wider
"
>Add Book</h2>
<br>

@php
 if( !empty($failed)) {
  echo $failed;
 }

@endphp

<div class="w-full max-w-xl m-auto my-auto ">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    method="POST" action="/create" enctype="multipart/form-data"
    >
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="title" id="title" type="text" placeholder="Title">
        <p class="text-red-500 text-xs italic"></p>
    </div>
    
   
    
    <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" 
          for="genre">
           Genre:
          </label>
          <select class="shadow appearance-none border rounded w-full py-2 px-3 
          text-gray-700 leading-tight focus:outline-none 
          focus:shadow-outline" name="genre" id="genre">   
          <option selected class="text-gray-500" 
           value="">
          --Please choose an option--
          </option>
            @foreach ($genres as $item)
            <option value="<?php echo $item['id'] ?>" >
                <?php echo $item['name']; ?>
            </option>
            @endforeach
          </select>
          <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" 
      for="instrument">
       Instrument/Orquesta:
      </label>
      <select class="shadow appearance-none border rounded w-full py-2 px-3 
      text-gray-700 leading-tight focus:outline-none 
      focus:shadow-outline" name="instrument" id="instrument">   
      <option selected class="text-gray-500" 
       value="">
      --Please choose an option--
      </option>
        @foreach ($instruments as $item)
        <option value="<?php echo $item['id'] ?>" >
            <?php echo $item['name']; ?>
        </option>
        @endforeach
      </select>
      <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="authors">
          Authors:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="authors" 
        id="authors" type="text" placeholder="Authors">
        <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="arrangements">
        Musical arrangements
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 
      text-gray-700 leading-tight focus:outline-none 
      focus:shadow-outline" name="arrangements" 
      id="arrangements" type="text" placeholder="Musical arrangements">
      <p class="text-red-500 text-xs italic"></p>
    </div>


    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
          Photo:  <p style="display: inline" class="text-xs italic">(Only jpg or png file)</p>
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="image" 
        id="image" type="file" >
        <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
          File: <p style="display: inline" class="text-xs italic">(Only pdf file)</p>
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="file" 
        id="file" type="file" >
        <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="flex items-center justify-between">
        <button class="bg-gray-500 hover:bg-slate-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
          Send
        </button>
    </div>

    </form>

  </div>

@endsection








