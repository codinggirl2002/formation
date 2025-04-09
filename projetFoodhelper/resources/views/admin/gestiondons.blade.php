@extends('admin.baseadmin')

@section('title', 'dashboardAdmin')

@section('content')
    <div class="mx-auto p-6">
        <h1 class="text-6xl font-bold text-center my-10 text-black" style="font-family: 'tangerine',serif">Tableau de Bord Administrateur</h1>
    
        <section class="mb-12 md:ml-[300px] ml-4">
            <h2 class="text-3xl font-semibold mb-4 text-green-600 text-center">Gestion des Dons</h2>
            @if($donations->count())
                <table class="min-w-3/4 table w-full max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                    <thead class="bg-green-600 text-white font-semibold">
                        <tr>
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Description</th>
                            <th class="py-2 px-4">Quantité</th>
                            <th class="py-2 px-4">Localisation</th>
                            <th class="py-2 px-4">Type</th>
                            <th class="py-2 px-4">Date limite</th>
                            <th class="py-2 px-4">Donateur</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $donation->id }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ Str::limit($donation->description, 50) }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $donation->quantite }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $donation->localisation }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $donation->type_aliment }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $donation->date_limite }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $donation->user->name }}</td>
                            <td class="py-2 px-4  border-b-[1px] border-gray-300">
                                <form action="{{ route('donations.destroy', $donation->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Confirmer la suppression de ce don ?')">
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
                    {{ $donations->links() }}
                </div>
            @else
                <p class="text-gray-600">Aucun don enregistré.</p>
            @endif
        </section>
    
    </div>
@endsection