@extends('admin.baseadmin')

@section('title', 'dashboardAdmin')

@section('content')
    <div class="mx-auto p-6">
        <h1 class="text-6xl font-bold text-center my-10 text-black" style="font-family: 'tangerine',serif">Tableau de Bord Administrateur</h1>
    
        <section class="py-12 md:ml-[300px] ml-4">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold text-center text-amber-600 mb-10">Statistiques</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center mt-4">
                    <div class="bg-white py-14 border-b-green-600 border-b-[1px] rounded-lg">
                        <div class="text-4xl font-bold text-green-600">{{ $totalDonations ?? 0 }}</div>
                        <div class="text-lg text-gray-700 mt-2">Dons enregistrés</div>
                    </div>
                    <div class="bg-white py-14 border-b-green-600 border-b-[1px] rounded-lg">
                        <div class="text-4xl font-bold text-green-600">{{ $totalBeneficiaries ?? 0 }}</div>
                        <div class="text-lg text-gray-700 mt-2">Bénéficiaires</div>
                    </div>
                    <div class="bg-white py-14 border-b-green-600 border-b-[1px] rounded-lg">
                        <div class="text-4xl font-bold text-green-600">{{ $foodSaved ?? '0' }} kgs</div>
                        <div class="text-lg text-gray-700 mt-2">Nourriture sauvée</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection