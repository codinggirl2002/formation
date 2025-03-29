<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link href={{ asset("bootstrap.min.css") }} rel="stylesheet"-->
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen">
    <nav class="flex justify-between items-center bg-white shadow-md shadow-blue-200 px-6 py-2">
        {{-- <span class="font-bold text-blue-600 text-2xl">FOODHELPER</span> --}}
        <span>
            <a href="{{route('home')}}"><img class="h-14 w-28 pb-0.5" src="{{asset('img/logo FOODHELPER bleu.png')}}" alt="logo"></a>
        </span>
        <div>
            @php
                $route_name = request()->route()->getName()
            @endphp
            
            @if ($route_name == 'donations.edit' || $route_name == 'donations.show')
              <a href="{{route('donations.index')}}"  class="text-red-500 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                  </svg>                  
                Retour
              </a>
            @else
              <a href="{{route('auth.dashboarduser')}}"  class="text-red-500 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                  </svg>                  
                Retour
              </a>
            @endif   
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>