@extends('donations.basedonation')

@section('title', 'details')

@section('content')

    <h1 class="md:text-3xl text-2xl font-semibold text-center my-12">Details de votre don de <span class="text-green-600">{{$donation->type_aliment}}</span> effectue le {{$donation->created_at}}.</h1>
    <div class="w-3/4 mx-auto shadow-md block sm:grid sm:grid-cols-2 rounded-md h-[400px] mb-6">
        <img src="/storage/{{$donation->image}}" alt="" class="object-cover w-full h-[400px]">
        <div class="p-5">
            <p class="text-gray-400 font-bold">Type d'aliment: <span class="font-normal"> {{$donation->type_aliment}}</span></p>
            <p class="text-gray-400 font-bold">Description du don: <span class="font-normal">{{$donation->description}}</span> </p>
            <p class="text-gray-400 font-bold">Date limite de consommation du produit: <span class="font-normal">{{$donation->date_limite}}</span></p>
            <p class="text-gray-400 font-bold">Statut: <span class="font-normal">{{$donation->statut}}</span></p>
            <p class="text-gray-400 font-bold">Don disponible a : <span class="font-normal">{{$donation->localisation}}</span></p>
            <h5 class="pt-7 pb-4 text-gray-500 font-light text-sm">Don effectue par {{$donation->user->name}} le {{$donation->created_at}} </h5>

            <div class="flex mb-4 mx-2 justify-end">
                <a href="{{route('donations.edit', $donation)}}" class="bg-yellow-500 hover:bg-yellow-700 rounded-md text-white font-semibold p-2 mx-3 transition ease-out">Editer</a>
                <form action="{{route('donations.destroy', $donation)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-md text-white font-semibold p-2 mx-3 transition ease-out">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection