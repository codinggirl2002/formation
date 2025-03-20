@extends('auth.baseauth')
@section('title', 'Modifier')
    
@section('content')
    {{-- @dd(Auth::user()) --}}
    <div class="bg-white shadow-md rounded px-8 py-4 w-full max-w-md">
        <h1 class="text-4xl font-bold text-center text-green-600 mb-6">Mise a jour </h1>
        <form method="POST">
            @csrf
            <!-- Nom complet -->
            <div class="mb-4 ">
                <label for="name" class="block text-gray-700">Nom complet</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name)  }}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" required>
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" required>
                @error('email')
                   {{$message}}
               @enderror
            </div>

            <!-- Mot de passe -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" value="{{ old('password', $user->password )}}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" required>
                @error('password')
                   {{$message}}
                @enderror
            </div>

            <!-- Confirmer le mot de passe -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password'), $user->password }}" class="outline-none  mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" required>
                @error('password')
                   {{$message}}
                @enderror
            </div>

            <!-- Téléphone -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Téléphone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone )}}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1">
                @error('phone')
                  {{$message}}
                @enderror
            </div>

            <!-- Adresse -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Adresse</label>
                <input type="text" name="address" id="address" value="{{ old('address', $user->address )}}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1">
                @error('address')
                   {{$message}}
                @enderror
            </div>

            <!-- Sélection du rôle : Donateur ou Bénéficiaire -->
            <div class="mb-4">
                <span class="block text-gray-700 mb-2">Je suis :</span>
                <div class="flex items-center">
                    <input {{ $user->role == 'donor' ? 'checked' : '' }} type="radio" name="role" value="donor" id="role_donor" class="mr-2">
                    <label for="role_donor" class="text-gray-700">Donateur</label>
                </div>
                <div class="flex items-center mt-2">
                    <input  {{ $user->role == 'beneficiary' ? 'checked' : '' }}  type="radio" name="role" value="beneficiary" id="role_beneficiary" class="mr-2">
                    <label for="role_beneficiary" class="text-gray-700">Bénéficiaire</label>
                </div>
                @error('role')
                  {{$message}}
                @enderror
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition font-bold">
                Modifier
            </button>
            <a href="{{route('auth.dashboarduser')}}" class="text-red-500 text-center font-bold text-xl py-4 mx-auto mt-2">Retour</a>
        </form>
    </div>
@endsection    