@extends('demandes.basedemande')

@section('title', 'liste dons user')

@section('content')
      <!--titre-->
     <div>
        <h3 class="tracking-widest font-medium text-center text-3xl my-10">Liste de touts les dons disponibles.</h3>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded my-4 w-3/4 mx-auto">
            {{ session('success') }}
        </div> 
    @endif

    <!-- Filtres -->
       <form method="GET" action="{{ route('donations.list') }}" class="mb-6 flex flex-col md:flex-row md:space-x-4 mx-2">
            <div class="flex-1 mb-4 md:mb-0">
                <input type="text" name="localisation" placeholder="Localisation" value="{{ request('localisation') }}" class="w-full p-1 border border-gray-300 rounded outline-none" />
            </div>
            <div class="flex-1 mb-4 md:mb-0">
                <input type="number" name="min_quantity" placeholder="Quantité min" value="{{ request('min_quantity') }}" class="w-full p-1 border border-gray-300 rounded outline-none" />
            </div>
            <div class="flex-1 mb-4 md:mb-0">
                <input type="text" name="type_aliment" placeholder="Type d'aliment" value="{{ request('type_aliment') }}" class="w-full p-1 border border-gray-300 rounded outline-none" />
            </div>
            <div>
                <button type="submit" class="bg-amber-600 text-white py-1 px-4 rounded hover:bg-amber-700">
                    Rechercher
                </button>
            </div>
      </form>
    <!--cartes-->
    <div class="grid lg:grid-cols-3 grid-cols-1 sm:grid-cols-2 items-center gap-6 mx-auto mt-10 w-4/5 ">
        @if ($donations->count() > 0)
            @forelse ($donations as $donation)
                <article class="bg-white shadow-lg rounded-md w-full mb-8 flex flex-col overflow-hidden">
                    <div class="relative h-[200px]">
                        <img src=" storage/{{$donation->image}} " alt="" class="w-full h-full max-w-full sm:h-48 object-cover">
                        <span class="absolute top-0 right-0 bg-amber-600 text-white py-1 px-2">Type aliment: {{$donation->type_aliment}}</span>
                    </div>
                    <h5 class="tracking-wide font-medium text-xl text-center py-5"><span class="underline">localisation:</span> {{$donation->localisation}} </h5>
                    <h5 class="underline text-gray-500 font-semibold ml-3">Description:</h5>
                    <p class="text-gray-400 mx-3">
                        {{$donation->description}}
                    </p>
                    <span class="text-gray-400 mx-3 text-sm">donateur: {{$donation->user->name}} </span>
                    <div class=" flex flex-col md:flex-row my-6 mx-2 justify-center ">
                        <a href="{{route('demandes.create', ['donationId' => $donation->id])}}" class="bg-blue-600 text-center hover:bg-blue-900 w-[95px] rounded-md text-white font-semibold p-2  m-1 transition ease-out">Obtenir</a>
                    </div>
                </article>
            @empty
              <h3 class="tracking-widest font-medium text-center text-5xl">Aucune donation correspondant a votre recherche.</h3>
            @endforelse
            {{$donations->links()}}
        @else
          <h3 class="tracking-widest font-medium text-center text-5xl">Aucune donation effectuee pour le moment.</h3>
        @endif
    </div>
    
@endsection