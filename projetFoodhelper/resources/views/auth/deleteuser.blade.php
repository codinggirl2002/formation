<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
        <nav class="bg-white p-4 shadow-md">
            <div class="container mx-auto flex  justify-between">
                <a href="#" class="text-xl font-bold p-2">FoodHelper</a>
                <div class="flex">
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
