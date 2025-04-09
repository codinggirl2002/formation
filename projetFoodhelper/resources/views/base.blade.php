<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <!-- Alpine.js pour la gestion du comportement au scroll -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener("scroll", function() {
                let navbar = document.getElementById("main-navbar");
                if (window.scrollY > 50) {
                    navbar.classList.add("bg-white", "shadow-lg");
                    navbar.classList.remove("bg-transparent");
                } else {
                    navbar.classList.remove("bg-white", "shadow-lg");
                    navbar.classList.add("bg-transparent");
                }
            });
        });
    </script>
</head>
<body>
    <!-- Navbar -->
    <nav id="main-navbar" class="fixed top-0 w-full z-50 bg-transparent transition-colors duration-300"  x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 py-10">
                <span>
                    <a href="{{route('home')}}"><img class="h-16 w-28 pt-2" src="{{asset('img/logo FOODHELPER vert.png')}}" alt=""></a>
                </span>
                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-green-600 ml-2">Accueil</a>
                    <a href="{{ route('about') }}" class="text-gray-400 hover:text-green-600 ml-2">À propos</a>
                    <a href="{{ route('contact') }}" class="text-gray-400 hover:text-green-600 ml-2">Contact</a>
                    <a href="{{route('auth.register')}}"  class="text-gray-400 ml-2 border-2 border-green-600 rounded-xl px-2.5 py-1.5 hover:bg-green-600 hover:text-white transition ease-out  hover:-translate-y-1 duration-75">S'inscrire</a>
                    <a href="{{route('auth.login')}}" class="bg-green-600 py-2 px-2 ml-2 rounded-xl text-white">Se connecter</a>
                </div>
                <!-- Bouton Menu Hamburger pour Mobile -->
                <div class="flex md:hidden items-center">
                    <button @click = "open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-green-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-600" aria-expanded="false">
                    <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                </div>
            </div>
            <!-- Menu Mobile -->
            <div x-show="open" class="md:hidden bg-white">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-green-600 hover:bg-gray-50">Accueil</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-green-600 hover:bg-gray-50">À propos</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-green-600 hover:bg-gray-50">Contact</a>
                <a href="{{route('auth.register')}}"  class="text-gray-400 border-2  border-green-600 rounded-xl px-2.5 py-1.5 hover:bg-green-600 hover:text-white transition ease-out  hover:-translate-y-1 duration-75">S'inscrire</a>
                <a href="{{route('auth.login')}}" class="bg-green-600 py-2 px-2 rounded-xl ml-2 text-white">Se connecter</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Contenu principal -->
    <div>
        @yield('content')
    </div>

    <!--footer-->
        <footer class="pb-4">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="md:flex justify-between items-center">
                    <img src="{{asset('img/logo1.png')}}" alt="logo" class="h-[400px] w-[400px] hidden md:block" >
                    <div class="w-full mt-4 md:mt-0 space-y-5 md:w-96 justify-between md:space-y-0 md:flex">
                        <div>
                            <h6 class="text-xl dark:text-white font-semibold mb-6">Informations</h6>
                            <ul class="dark:text-gray-400 text-gray-600 space-y-3">
                                <li class="hover:underline flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                  </svg>
                                   <p class="ml-1">+237 697 560 242</p>
                                </li>
                                <li class="hover:underline flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                      </svg>                                      
                                   <p class="ml-1">ivanaazanfack@gmail.com</p>
                                </li>
                                <li class="hover:underline flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                      </svg>                                      
                                    <p class="ml-1">Yaounde, Cameroun</p>
                                </li>
                            </ul>
                        </div>
    
                        <div>
                            <h6 class="text-xl dark:text-white font-semibold mb-6">Aller</h6>
                            <ul class="text-gray-600 space-y-3">
                                <li class="hover:underline"><a href="{{route('home')}}">Acceuil</a></li>
                                <li class="hover:underline"><a href="{{route('about')}}">A Propos</a> </li>
                                <li class="hover:underline"><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <hr class="h-[1px] w-full text-gray-500 mt-2">
                <div class="flex mt-2 items-start justify-between">
                    <span>Develop by <span class="text-green-600">Ivana Teki</span></span>
                    <span>Copyrigth&copy;2025</span>
                </div>
            </div>
        </footer>
        
    <script>
        function Open() {
            document.querySelector('.menu').classList.toggle('hidden');
        }
    </script>
</body>
</html>