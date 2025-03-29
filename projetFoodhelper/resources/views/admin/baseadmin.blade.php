<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <span class="absolute text-white text-2xl top-5 left-4 cursor-pointer bg-green-600 rounded-md p-2" onclick="Open()">
        close
    </span>
    <div class="sidebar fixed  top-0 bottom-0 md:left-0 p-2 w-[300px] left-[-300px] overflow-y-auto text-center bg-white">
        <div class="text-gray-100 text-xl mb-28 mt-4">
            <div class="p-2.5 mt-1 flex items-center justify-between">
                <h1 class="font-bold text-green-600 text-5xl ml-3" style="font-family: 'tangerine',serif">FoodHelper</h1>
                <button class="text-gray-900 focus:outline-none md:hidden" onclick="Open()">
                    ☰
                </button>
            </div>
        </div>


        <div class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200 text-white">
            <a href="{{route('admin.dashboardgestionusers')}}" class="text-[15px] ml-4 text-gray-500">Gestion des users</a>
        </div>
        <div class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200 text-white">
            <a href="{{route('admin.dashboardgestiondons')}}" class="text-[15px] ml-4 text-gray-500">Gestion des dons</a>
        </div>
        <div class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200 text-white">
            <a href="{{route('admin.dashboardgestiondemandes')}}" class="text-[15px] ml-4 text-gray-500">Gestion des demandes</a>
        </div>

        <div class="p-2 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-200 text-white">
            <a href="{{route('admin.dashboardstats')}}" class="text-[15px] ml-4 text-gray-500">Statistiques</a>
        </div>
        <div class="mt-20">
              <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button class="bg-red-600 text-white font-bold p-2 rounded-md flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                      </svg>                                                                  
                    Se deconnecter
                </button>
            </form>
        </div>
    </div>

    <main class="py-6">
        @yield('content')
    </main>

    <script>
        function dropdown(){
            document.querySelector('#submenu').classList.toggle('hidden');
        }
        function Open() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }
    </script>
</body>
</html>