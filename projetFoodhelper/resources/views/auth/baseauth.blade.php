<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 bg-cover bg-center  min-h-screen">
    <div class="bg-green-600 w-full h-20 flex justify-between items-center px-4">
        <span class="font-bold text-white text-2xl"><a href="{{route('home')}}">FOODHELPER</a></span>
        <ul class="flex">
            <li class="mr-5 py-1 text-white font-semibold"> <a href="{{route('contact')}}">contactez nous</a></li>
            <li class="border-[1px] border-white px-2 py-1 rounded-xl font-semibold text-white hover:bg-white hover:text-green-600 transition ease-out duration-500"> 
                @php
                    $route_name = request()->route()->getName()
                @endphp
                
                @if ($route_name == 'auth.login')
                    <a href="{{route('auth.register')}}">s'inscrire</a>
                @elseif ($route_name == 'auth.register')
                      <a href="{{route('auth.login')}}">se connecter</a>
                @endif   
            </li>
        </ul>
    </div>

    <section class="flex items-center w-3/4 bg-white m-auto my-10 rounded-lg ">
        <div class="w-1/2 hidden md:block" >
            <img src="{{asset('img/logo1.png')}}" alt="">
        </div>
       
        <div class="mx-16 md:w-1/2 md:mx-auto my-10 w-full">
            @yield('content')
        </div>
    </section>
    
</body>
</html>