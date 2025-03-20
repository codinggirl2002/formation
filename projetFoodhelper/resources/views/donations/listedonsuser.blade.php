@extends('donations.basedonation')

@section('title', 'liste dons user')

@section('content')
      <!--titre-->
     <div>
        <h3 class="tracking-widest font-medium text-center text-3xl my-10">Liste de toutes vos donations <span class="text-green-600">{{ Auth::user()->name }}.</span></h3>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded my-4 w-3/4 mx-auto">
            {{ session('success') }}
        </div> 
    @endif
    <!--cartes-->

    <div class="flex md:justify-end justify-center">
        <a href="{{route('donations.create')}}" class="text-white font-semibold bg-blue-500 hover:bg-blue-700 transition ease-in py-2 px-4 rounded-md mr-10">Ajouter un don</a>
    </div>
    <div class="grid lg:grid-cols-3 grid-cols-1 sm:grid-cols-2 items-center gap-6 mx-auto mt-10 w-4/5 ">
        @forelse ($donations as $donation)
            @if ($user->id === $donation->user_id)
                <article class="bg-white shadow-lg rounded-md w-full mb-8 flex flex-col overflow-hidden">
                    <div class="relative h-[200px]">
                        <img src=" storage/{{$donation->image}} " alt="" class="w-full h-full max-w-full sm:h-48 object-cover">
                        <span class="absolute top-0 right-0 bg-green-600 text-white py-1 px-2">Type aliment: {{$donation->type_aliment}}</span>
                    </div>
                    <h5 class="tracking-wide font-medium text-xl text-center py-5"><span class="underline">localisation:</span> {{$donation->localisation}} </h5>
                    <h5 class="underline text-gray-500 font-semibold ml-3">Description:</h5>
                    <p class="text-gray-400 mx-3">
                        {{$donation->description}}
                    </p>
                    <div class=" flex flex-col md:flex-row my-6 mx-2 justify-center ">
                        <a href="{{route('donations.edit', $donation)}}" class="bg-yellow-500 text-center hover:bg-yellow-700 w-[95px] rounded-md text-white font-semibold p-2  m-1 transition ease-out">Editer</a>
                        <form action="{{route('donations.destroy', $donation)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-md text-white font-semibold p-2 m-1  transition ease-out">Supprimer</button>
                        </form>
                        <a href="{{route('donations.show', $donation)}}" class=" border-green-600 border-2 rounded-md bg-white text-green-600 text-center hover:bg-green-600 hover:text-white  transition ease-out  m-1 px-1 font-semibold pt-1">Voir plus <span class="text-green-600 hover:text-white font-bold">-></span></a>
                    </div>
                </article>
            @endif  
        @empty
          <h3 class="tracking-widest font-medium text-center text-5xl">Aucune donation effectuee pour le moment.</h3>
        @endforelse
    </div>
    
    {{$donations->links()}}
@endsection