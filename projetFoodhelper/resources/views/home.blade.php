@extends('base')
@section('title', 'home page')
@section('content')
    <!-- Hero Section -->
        <section class="relative bg-cover bg-center" style="background-image: url('{{ asset('img/acceuil.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="container mx-auto relative z-10 flex flex-col items-center justify-center min-h-screen text-center text-white">
                <h1 class="md:text-9xl text-6xl font-bold mb-4" style="font-family: 'Tangerine','Montserrat',sans-serif;">Ensemble, sauvons la nourriture</h1>
                <p class="md:text-4xl text-2xl mb-8 max-w-2xl" style="font-family: 'Tangerine','Montserrat',sans-serif;">
                    Rejoignez notre mission pour récupérer et redistribuer les invendus alimentaires, et lutter contre le gaspillage.
                </p>
                <a href="#recentdonations" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded transition">
                    Voir les dons disponibles
                </a>
            </div>
        </section>

    <!-- How It Works Section -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Comment ça marche ?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded shadow text-center">
                        <img src="{{ asset('img/pexels-julia-m-cameron-6994944.jpg') }}" alt="Collecte" class="w-full  h-72 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold mb-2">Collecte</h3>
                        <p class="text-gray-600">Les partenaires récupèrent les invendus auprès des commerces et restaurants.</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <img src="{{ asset('img/pexels-julia-m-cameron-6995212.jpg') }}" alt="Tri" class="w-full  h-72 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold mb-2">Tri</h3>
                        <p class="text-gray-600">Les produits sont triés et préparés pour être redistribués.</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <img src="{{ asset('img/pexels-julia-m-cameron-6995221.jpg') }}" alt="Redistribution" class="w-full  h-72 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold mb-2">Redistribution</h3>
                        <p class="text-gray-600">Les aliments sont distribués aux associations et bénéficiaires.</p>
                    </div>
                </div>
            </div>
        </section>
   
        <!-- Stats Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center text-gray-800 my-8">Statistiques</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center mt-14">
                <div class="bg-gray-100 py-14 border-b-green-600 border-b-[1px] rounded-lg">
                    <div class="text-4xl font-bold text-green-600">{{ $totalDonations ?? 0 }}</div>
                    <div class="text-lg text-gray-700 mt-2">Dons enregistrés</div>
                </div>
                <div class="bg-gray-100 py-14 border-b-green-600 border-b-[1px] rounded-lg">
                    <div class="text-4xl font-bold text-green-600">{{ $totalBeneficiaries ?? 0 }}</div>
                    <div class="text-lg text-gray-700 mt-2">Bénéficiaires</div>
                </div>
                <div class="bg-gray-100 py-14 border-b-green-600 border-b-[1px] rounded-lg">
                    <div class="text-4xl font-bold text-green-600">{{ $foodSaved ?? '0' }} kgs</div>
                    <div class="text-lg text-gray-700 mt-2">Nourriture sauvée</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Donations Section -->
    <section class="py-10 bg-white" id="recentdonations">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 my-8">Dons Récents</h2>
            @if($recentDonations->count())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-6">
                @foreach($recentDonations as $donation)
                <div class="bg-gray-50 rounded shadow">
                    <img src=" storage/{{$donation->image}} " alt="" class="rounded w-full h-68 max-w-full  object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-green-600 mb-2">{{ $donation->type_aliment }}</h3>
                        <p class="text-gray-700 mb-2">{{ Str::limit($donation->description, 100) }}</p>
                        <p class="text-sm text-gray-500">Quantité : {{ $donation->quantite }} kgs</p>
                        <p class="text-sm text-gray-500">Localisation : {{ $donation->localisation }}</p>
                        <a href="{{route('auth.register')}}" class="text-blue-600 hover:underline mt-4 inline-block">
                            En savoir plus
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
           
            @else
            <p class="text-center text-gray-600">Aucun don n'est disponible pour le moment.</p>
            @endif
        </div>
    </section>

@endsection
    
