@extends('admin.baseadmin')

@section('title', 'dashboardAdmin')

@section('content')
    <div class="mx-auto p-6">
        <h1 class="text-6xl font-bold text-center my-10 text-black" style="font-family: 'tangerine',serif">Tableau de Bord Administrateur</h1>
    
        <section class="mb-12 md:ml-[300px] ml-4">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-2 rounded my-4 w-3/4 mx-auto">
                    {{ session('success') }}
                </div> 
            @endif
            <h2 class="text-3xl font-semibold mb-4 text-blue-600 text-center">Gestion des Demandes de Dons</h2>
            @if($demandes->count())
                <table class="min-w-3/4 table w-full max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                    <thead class="bg-blue-600 text-white font-semibold">
                        <tr>
                            <th class="py-2 px-4 border-b">ID Donation</th>
                            <th class="py-2 px-4 border-b">Bénéficiaire</th>
                            <th class="py-2 px-4 border-b">Quantité demandée</th>
                            <th class="py-2 px-4 border-b">Localisation</th>
                            <th class="py-2 px-4 border-b">Type d'aliment</th>
                            <th class="py-2 px-4 border-b">Date soumission</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($demandes as $demande)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $demande->donation->id }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $demande->user->name }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $demande->quantite }} kgs</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $demande->localisation }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $demande->type_aliment }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $demande->created_at }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">
                                <form action="{{ route('admin.destroydemande', [$demande->donation->id, $demande->user->id]) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Supprimer cette demande ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 mx-1.5 text-white bg-red-500 hover:bg-red-700 rounded">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $demandes->links() }}
                </div>
            @else
                <p class="text-gray-600">Aucune demande de don enregistrée.</p>
            @endif
        </section>
    
    </div>
@endsection