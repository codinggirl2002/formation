<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link href={{ asset("bootstrap.min.css") }} rel="stylesheet"-->
    <title>Admin login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen">
    <nav class="flex justify-between items-center bg-white shadow-md shadow-blue-200 px-6 py-2">
        {{-- <span class="font-bold text-blue-600 text-2xl">FOODHELPER</span> --}}
        <span>
            <a href="{{route('home')}}"><img class="h-14 w-28 pb-0.5" src="{{asset('img/logo FOODHELPER bleu.png')}}" alt="logo"></a>
        </span>
        <div>
              <a href="{{route('home')}}"  class="text-red-500 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                  </svg>                  
                Retour
              </a>  
        </div>
    </nav>

    <section class="flex justify-center items-center mt-40">
        <div class="bg-white shadow-md rounded px-8 py-4 w-full max-w-md ">
            <h1 class="text-4xl font-bold text-center text-green-600 mb-6">Inscription</h1>
            <form method="POST" action="{{route('admin.login.submit')}}">
                @csrf
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" required>
                    @error('email')
                       {{$message}}
                   @enderror
                </div>

                <!-- Mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="outline-none mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 pl-1" required>
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
                pas encore inscrit ? <a href="{{route('admin.register')}}" class="text-green-600 hover:underline">Inscrivez-vous</a>
            </p>
        </div>        
    </section>
</body>
</html>