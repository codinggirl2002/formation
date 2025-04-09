<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supprimer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
        <nav class="bg-white px-4 pt-4 shadow-md">
            <div class="container mx-auto flex  justify-between">
                <span>
                    <a href="{{route('home')}}"><img class="h-14 w-28 pb-0.5" src="{{asset('img/logo FOODHELPER vert.png')}}" alt="logo"></a>
                </span>
                <div class="flex">
                    @auth
                        <form action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="bg-red-600 text-white font-bold p-2 rounded-md flex justify-around">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                  </svg>                                                                    
                                Se deconnecter
                            </button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{route('auth.login')}}">Se connecter</a>
                    @endguest
                </div>
            </div>
        </nav>
    

        <main>
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
                <div class="bg-white p-8 rounded shadow-md text-center">
                    <h1 class="text-2xl font-bold mb-4 text-green-600">Confirmer la suppression</h1>
                    <p class="mb-6">
                        Êtes-vous sûr de vouloir supprimer votre compte utilisateur <strong class="text-green-600">{{ $user->name }}</strong> ?
                    </p>
                    <form action="{{ route('destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            Oui, supprimer
                        </button>
                        <a href="{{ route('auth.dashboarduser') }}" class="ml-4 text-blue-600 hover:underline">
                            Annuler
                        </a>
                    </form>
                </div>
        </main>
</body>
