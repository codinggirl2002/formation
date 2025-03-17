@extends('auth.baseauth')

@section('titre', 'Connexion')

@section('content')

    <div class="bg-white shadow-md rounded px-8 py-4 w-full max-w-md">
        <h1 class="text-4xl font-bold text-center text-green-600 mb-6">Connexion</h1>
        <form method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" >
                @error('email')
                {{$message}}
            @enderror
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1">
                @error('password')
                {{$message}}
                @enderror
            </div>

            
            <!-- Bouton de connexion -->
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition font-bold">
                    Se connecter
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600">
                Pas encore inscrit ? <a href="{{route('auth.register')}}" class="text-green-600 hover:underline">Inscrivez-vous!</a>
            </p>
    </div>

@endsection