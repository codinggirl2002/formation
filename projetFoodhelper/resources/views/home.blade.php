<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sauvetage & Redistribution Alimentaire</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0">
                        <img class="h-8 w-auto" src="/images/logo.png" alt="Logo du site">
                    </a>
                    <nav class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/" class="border-green-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Accueil
                        </a>
                        <a href="/about" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            À propos
                        </a>
                        <a href="/contact" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Contact
                        </a>
                    </nav>
                </div>
                <div class="hidden sm:flex sm:items-center">
                    <a href="/login" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                        Se connecter
                    </a>
                    <a href="/register" class="ml-4 bg-green-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-green-700">
                        S'inscrire
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Hero -->
    <main class="mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                Ensemble, sauvons l'alimentation
            </h1>
            <p class="mt-4 text-xl text-gray-600">
                Rejoignez notre plateforme pour redistribuer les invendus et lutter contre le gaspillage alimentaire.
            </p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="/register" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                    S'inscrire
                </a>
                <a href="/donate" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-green-600 bg-white hover:bg-gray-100">
                    Faire un don
                </a>
            </div>
        </div>
    </main>

    <!-- Section Fonctionnalités -->
    <section class="mt-16 bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Comment ça marche ?
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Un processus simple pour collecter, trier et redistribuer les invendus alimentaires aux associations et aux personnes dans le besoin.
                </p>
            </div>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-xl font-bold text-green-600">Collecte</h3>
                    <p class="mt-2 text-gray-600">
                        Les commerces et organisations nous envoient leurs invendus alimentaires.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-xl font-bold text-green-600">Tri</h3>
                    <p class="mt-2 text-gray-600">
                        Nous sélectionnons et trions les produits pour assurer leur qualité.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-xl font-bold text-green-600">Redistribution</h3>
                    <p class="mt-2 text-gray-600">
                        Les produits sont redistribués aux associations et aux bénéficiaires.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-600">
                &copy; {{ date('Y') }} Sauvetage Alimentaire. Tous droits réservés.
            </div>
        </div>
    </footer>
</body>
</html>
