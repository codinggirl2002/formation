@extends('donations.basedonation')  

@section('title', $donation->exists ? 'editer un don' : 'soumission un don')

@section('content') 

    <div class="grid grid-cols-1 md:grid-cols-2 shadow-md rounded-md md:shadow-none md:rounded-none w-full md:m-0 mx-auto h-screen">
        <div style="background-image: url({{asset('img/pexels-julia-m-cameron-6995221.jpg')}})" class="h-full bg-cover bg-center md:flex justify-center items-center hidden">
            <img src="{{asset('img/logo2.png')}}" alt="" class="h-[250px] w-[250px] shadow-2xl shadow-blue-500 rounded-full">
        </div>

        <div class="px-6 md:mx-[10%] mb-6 mx-[5%] sm:mx-[15%]">
            <h1 class="font-bold text-center sm:text-2xl text-xl md:text-3xl my-6">
                @if ($donation->exists)
                    Modifier votre don
                @else
                    Soumettre un don
                @endif
            </h1>
            <form enctype="multipart/form-data" action="{{ $donation->exists ? route('donations.update', $donation) : route('donations.store') }}" method="POST">
                @csrf
                @if($donation->exists)
                    @method('PATCH')
                @endif
                {{-- @method($donation->exist ? 'patch' : 'post') --}}
                
                <div class="mb-4 mt-2.5">
                    <label for="type_aliment" class="block text-gray-700">Type d'aliment:</label>
                    <input name="type_aliment" value="{{old('type_aliment', $donation->type_aliment)}}" id="type_aliment" class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in"></input>
                    @error('type_aliment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in">{{ old('description', $donation->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="quantite" class="block text-gray-700">Quantité(En kgs):</label>
                    <input type="number" name="quantite" id="quantite" value="{{old('quantite', $donation->quantite)}}"  class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('quantite')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="localisation" class="block text-gray-700">Localisation:</label>
                    <input type="text" name="localisation" id="localisation" value="{{old('localisation', $donation->localisation)}}" class="w-full p-1 border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('localisation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date_limite" class="block text-gray-700">Date limite de consommation:</label>
                    <input type="date" name="date_limite" id="date_limite" value="{{old('date_limite', $donation->date_limite)}}" min="1" class="w-full p-1 mx-auto border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('date_limite')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image de votre don:</label>
                    <input type="file" name="image" id="image"  min="1" class="w-full p-1 mx-auto border border-gray-300 rounded outline-none focus:border-x-transparent focus:border-t-0 focus:border-b-[1px] focus:shadow-md  focus:border-green-600 transition ease-in" />
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
        
                <button type="submit" class="w-full bg-green-600 text-white py-1 rounded hover:bg-green-700 transition my-5">
                    @if ($donation->exists)
                        Modifier le don
                    @else
                        Soumettre le don
                    @endif
                </button>
            </form>
        </div>    
    </div>

@endsection