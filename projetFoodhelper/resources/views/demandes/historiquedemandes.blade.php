@extends('demandes.basedemande')

@section('title', 'historique')

@section('content')
        <h1 class=" text-2xl md:text-3xl my-10 text-center">Historique de vos demandes <span class="text-blue-700">{{$user->name}} </span></h1>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded my-4 w-3/4 mx-auto">
                {{ session('success') }}
            </div> 
        @endif
        <div class="overflow-x-auto">
            {{-- affichage sous forme de tableau pou les grands ecrans et ecren de taille moyenne --}}
            <table class="hidden md:table w-full max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                <thead class="bg-blue-600 text-white font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-center">type_aliment</th>
                        <th class="px-6 py-3 text-center">quantite</th>
                        <th class="px-6 py-3 text-center">localisation</th>
                        <th class="px-6 py-3 text-center">date de soumission de la demande</th>
                        <th  class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($demandes as $demande)
                        @if ($demande->user_id == $user->id)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-3"> {{$demande->type_aliment}} </td>
                                <td  class="px-6 py-3"> {{$demande->quantite}} </td>
                                <td  class="px-6 py-3"> {{$demande->localisation}} </td>
                                <td  class="px-6 py-3"> {{$demande->date}} </td>
                                <td  class="px-6 py-3 text-center flex">
                                    <a href="{{route('demandes.edit', ['donationId' => $demande->donation_id])}}" class="px-3 py-1 mx-1.5 text-white bg-green-500 hover:bg-green-700 rounded">Modifier</a>
                                    <form action="{{route('demandes.destroy', ['donationId' => $demande->donation_id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="px-3 py-1 mx-1.5 text-white bg-red-500 hover:bg-red-700 rounded">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            {{-- affichage sous forme de cartes ppur petits ecrans --}}
            <div class="md:hidden space-y-4">
                @foreach ($demandes as $demande)
                    @if ($demande->user_id == $user->id)
                        <div class="bg-white shadow-md rounded-lg p-4 mx-5 mt-8">
                            <p class="text-gray-700"><strong>type_aliment:  </strong>{{$demande->type_aliment}}</p>
                            <p class="text-gray-700"><strong>quantite:  </strong>{{$demande->quantite}}</p>
                            <p class="text-gray-700"><strong>localisation:  </strong>{{$demande->localisation}}</p>
                            <p class="text-gray-700"><strong>date de soumission de la demande:  </strong>{{$demande->date}}</p>
                            <div class="mt-4 flex space-x-2">
                                <a href="{{route('demandes.edit', ['donationId' => $demande->donation_id])}}" class="px-3 py-1 mx-1.5 text-white bg-green-500 hover:bg-green-700 rounded">Modifier</a>
                                <form action="{{route('demandes.destroy', ['donationId' => $demande->donation_id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-3 py-1 mx-1.5 text-white bg-red-500 hover:bg-red-700 rounded">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>


            {{$demandes->links()}}
        </div>

@endsection