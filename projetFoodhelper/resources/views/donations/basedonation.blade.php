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
    <nav class="flex justify-between items-center bg-white shadow-md shadow-green-200 px-6 py-2">
        {{-- <span class="font-bold text-green-600 text-2xl">FOODHELPER</span> --}}
        <span>
            <a href="{{route('home')}}"><img class="h-14 w-28 pb-0.5" src="{{asset('img/logo FOODHELPER vert.png')}}" alt="logo"></a>
        </span>
        <div>
            @php
                $route_name = request()->route()->getName()
            @endphp
            
            @if ($route_name == 'donations.edit' || $route_name == 'donations.show')
              <a href="{{route('donations.index')}}"  class="text-red-500">Retour</a>
            @else
              <a href="{{route('auth.dashboarduser')}}"  class="text-red-500">Retour</a>
            @endif   
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>