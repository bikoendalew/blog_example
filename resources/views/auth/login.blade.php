@extends('layout.app')
@section('content')  

<div class="flex justify-center">
  <div class="w-6/12 bg-white p-6 rounded-lg">
@if (session('status'))
<div class="bg-gray-500 p-4 rounded-lg mb-6 text-white text-center">
    {{session('status')}}
</div>
@endif

   <form action="{{route('login')}}" method="POST">
@csrf
   
<div class="mb-4">
    <label for="email" class="sr-only">Email</label>
    <input type="text" name="email" id="email" placeholder="Your email"
     class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('email')}}">  
     @error('email')
     <div class="text-gray-100 mt-2 text-sm">
 {{$message}}
 </div>   
      @enderror
 
    </div>
<div class="mb-4">
    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" id="password" placeholder="Your Password"
     class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">  
     @error('password')
     <div class="text-gray-100 mt-2 text-sm">
 {{$message}}
 </div>   
      @enderror
 <div class="mb-4">
    <div class="flex items-center">
        <input type="checkbox" name="remember" id="remember" class="mr-2">
        <label for="remember">Remember Me</label>
    </div>
 </div>

    </div> 

   <div>
    <button type="submit" class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
   </div>
    </form>
  </div>
</div>

@endsection