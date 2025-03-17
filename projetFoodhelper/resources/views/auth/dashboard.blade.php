<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
{{-- <body>
    @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mt-2">
                {{ session('success') }}
            </div> 
       @endif
    <h1>Bienvenue sur le tableau de bord !</h1>
    <div class="mr-2">
        @auth
            {{ Auth::user()->name }}
            <form action="{{ route('auth.logout') }}" method="post">
                @method('delete')
                @csrf
                <button>Se deconnecter</button>
            </form>
        @endauth
        @guest
            <a href="{{route('auth.login')}}">Se connecter</a>
        @endguest
    </div>
</body> --}}
<body class="bg-gray-100">
    <div>
        <nav class="bg-white p-4 shadow-md">
            <div class="container mx-auto flex  justify-between">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold p-2">FoodHelper</a>
                <div>
                    @auth
                        <form action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="bg-red-600 text-white font-bold p-2 rounded-md">Se deconnecter</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{route('auth.login')}}">Se connecter</a>
                    @endguest
                </div>
            </div>
        </nav>
    
        <main class="p-6 bg-[url('img/pexels-julia-m-cameron-6995212.jpg')] bg-center bg-cover h-screen">
            <div class="container mx-auto p-6">
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-2 rounded mt-2">
                            {{ session('success') }}
                        </div> 
                    @endif
                <h2 class="text-2xl font-bold text-gray-800">Bienvenue, {{ Auth::user()->name }}!</h2> 
            
                @if ($user->isDonateur())
                    <div class="mt-6 p-4 bg-blue-100 border border-blue-400 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800">Espace Donateur</h3>
                        <p class="text-gray-700 mt-2">Vous pouvez ajouter des dons alimentaires pour aider les personnes dans le besoin.</p>
                        <a href="#" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Ajouter un don
                        </a>
                    </div>
                @elseif ($user->isBeneficiaire())
                    <div class="mt-6 p-4 bg-green-100 border border-green-400 rounded-lg">
                        <h3 class="text-xl font-semibold text-green-800">Espace Bénéficiaire</h3>
                        <p class="text-gray-700 mt-2">Vous pouvez voir les dons disponibles et demander de l'aide.</p>
                        <a href="#" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded-lg">
                            Voir les dons disponibles
                        </a>
                    </div>
                @endif
            </div>    
        </main>
    </div>
</body>
</html>