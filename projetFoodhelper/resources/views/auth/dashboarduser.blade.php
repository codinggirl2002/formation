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
    <div>
        <nav class="bg-white  pt-4 shadow-md">
            <div class="container mx-auto flex  justify-between">
                <span>
                    <a href="{{route('home')}}"><img class="h-14 w-28 pb-2.5" src="{{asset('img/logo FOODHELPER2.jpg')}}" alt="logo"></a>
                </span>
                <div class="flex">
                    <!-- Boite modale pour afficher les informations de l'utilisateur -->
                    {{-- bouton pour ouvrir la boite modale --}}
                        <div>
                            <button id="openModal" class="flex px-4 py-2 bg-blue-500 text-white rounded mr-4 font-bold">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                  </svg>                                  
                                Mon Compte
                            </button>
                        </div>
                    {{-- vue d'ensemble de la boite modale --}}
                        <div id="modalContent" class="fixed backdrop-blur inset-0  flex items-center justify-center hidden">
                             {{-- contenu de la boite modale --}}
                             <div class="bg-white rounded-lg w-11/12 mx-2 md:w-1/2 p-6 relative">
                                <div class="flex flex-col ">
                                    <a href="{{route('auth.edit', $user)}}" class="text-md md:text-2xl font-bold text-green-600 hover:underline">Modifier mes informations</a>
                                    @if ($user->isDonateur())
                                      <a href="{{route('donations.index')}}" class="text-md md:text-2xl font-bold text-blue-600 hover:underline">Historique de mes dons</a>
                                    @elseif ($user->isBeneficiaire()) 
                                      <a href="{{route('demandes.index')}}" class="text-md md:text-2xl font-bold text-blue-600 hover:underline">Historique de mes demandes</a>
                                    @endif
                                    <a href="{{route('auth.delete', $user)}}" class="text-md md:text-2xl font-bold text-red-600 hover:underline">Supprimer mon compte</a>
                                </div>                                
                                 {{-- bouton de fermeture de la boite modale --}}
                                  <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-md md:text-2xl font-bold">Fermer</button>
                             </div>
                        </div>
                    @auth
                        <form action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="bg-red-600 text-white font-bold p-2 rounded-md flex">
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
    
        <main class="h-screen grid grid-cols-1 md:grid-cols-2">
            @if ($user->isBeneficiaire())
                <div style="background-image: url({{asset('img/pexels-julia-m-cameron-6994993.jpg')}})" class="h-full bg-cover bg-center md:flex  hidden">
                    <img src="{{asset('img/logo1.png')}}" alt="" class="h-[150px] w-[150px] shadow-2xl shadow-blue-500 rounded-full m-5 duration-100 ease-in-out hover:grayscale">
                </div>
            @elseif ($user->isDonateur())
                <div style="background-image: url({{asset('img/pexels-shkrabaanthony-7345447.jpg')}})" class="h-full bg-cover bg-center md:flex hidden">
                    <img src="{{asset('img/logo1.png')}}" alt="" class="h-[150px] w-[150px] shadow-2xl shadow-green-600 rounded-full m-5 duration-100 ease-in-out hover:grayscale">
                </div>
            @endif
            <div class="container mx-auto p-6">
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-2 rounded mt-2">
                            {{ session('success') }}
                        </div> 
                    @endif
                <h2 class="text-2xl font-bold text-gray-800">Bienvenue, {{ Auth::user()->name }}!</h2> 
            
                @if ($user->isBeneficiaire())
                    <div class="mt-6 p-4 bg-blue-100 border border-blue-400 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800">Espace Bénéficiaire </h3>
                        <p class="text-gray-700 mt-2">Vous pouvez voir les dons disponibles et demander de l'aide.</p>
                        <a href="{{route('donations.list')}}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg">
                            Voir les dons disponibles
                        </a>
                    </div>
                @elseif ($user->isDonateur())
                    <div class="mt-6 p-4 bg-green-100 border border-green-400 rounded-lg">
                        <h3 class="text-xl font-semibold text-green-800">Espace Donateur</h3>
                        <p class="text-gray-700 mt-2">Vous pouvez ajouter des dons alimentaires pour aider les personnes dans le besoin.</p>
                        <a href="{{route('donations.create')}}" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded-lg">
                            Ajouter un don
                        </a>
                    </div>
                @endif
            </div>    
        </main>
    </div>

    {{-- Script pour la boite modale --}}
    <script>
        //ouvrir la modale
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('modalContent').classList.remove('hidden')
        });

        //fermer la modale
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('modalContent').classList.add('hidden')
        });

        //fermer la modale si on clique en dehors du contanu
        document.getElementById('modalContent').addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.add('hidden')
            }
        });

    </script>

</body>
</html>