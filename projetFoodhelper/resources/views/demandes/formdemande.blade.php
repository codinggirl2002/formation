@extends('demandes.basedemande')  

@section('title', $demande->exists ? 'editer une demande de don' : "demande d'un don")

@section('content') 

    <div class="grid grid-cols-1 md:grid-cols-2 shadow-md rounded-md md:shadow-none md:rounded-none w-full md:m-0 mx-auto h-screen">
        <div style="background-image: url({{asset('img/pexels-julia-m-cameron-6995221.jpg')}})" class="h-full bg-cover bg-center md:flex justify-center items-center hidden">
            <img src="{{asset('img/logo2.png')}}" alt="" class="h-[250px] w-[250px] shadow-2xl shadow-blue-500 rounded-full">
        </div>

        <div class="px-6 md:mx-[10%] mb-6 mx-[5%] sm:mx-[15%]">
            <h1 class="font-bold text-center sm:text-2xl text-xl md:text-3xl my-6">
                @if ($demande->exists)
                    Modifier votre demande
                @else
                    Soumettre votre demande
                @endif
            </h1>
            <form enctype="multipart/form-data" action="{{ $demande->exists ? route('demandes.update', ['donationId' => $donation->id]) : route('demandes.store') }}" method="POST">
                @csrf
                @if($demande->exists)
                    @method('PATCH')
                @endif
                {{-- @method($donation->exist ? 'patch' : 'post') --}}

                <input type="hidden" name="donation_id" value="{{ $donation->id }}">
                
                <div class="mb-4 mt-2.5">
                    <label for="type_aliment" class="block text-gray-700">Type d'aliment:</label>
                    <input name="type_aliment" value="{{old('type_aliment', $donation->type_aliment)}}" id="type_aliment" class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in"></input>
                    @error('type_aliment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="quantite" class="block text-gray-700">Quantité:</label>
                    <input type="number" name="quantite" id="quantite" value="{{old('quantite', $donation->quantite)}}"  class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('quantite')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="localisation" class="block text-gray-700">Votre Localisation:</label>
                    <input type="text" name="localisation" id="localisation" value="{{old('localisation', $donation->localisation)}}" class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('localisation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700">Date de soumission de la demande:</label>
                    <input type="date" name="date" id="date" value="{{old('date', $demande->date_limite)}}" min="1" class="w-full p-1 mx-auto border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('date')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
        
                <button type="submit" class="w-full bg-green-600 text-white py-1 rounded hover:bg-green-700 transition my-5">
                    @if ($demande->exists)
                        Modifier la demande
                    @else
                        Soumettre la demande
                    @endif
                </button>
            </form>
        </div>    
    </div>

@endsection