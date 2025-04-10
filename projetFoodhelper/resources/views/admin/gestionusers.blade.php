@extends('admin.baseadmin')

@section('title', 'dashboardAdmin')

@section('content')
    <div class="mx-auto p-6">
        <h1 class="text-6xl font-bold text-center my-10 text-black" style="font-family: 'tangerine',serif">Tableau de Bord Administrateur</h1>
    
        <section class="mb-12 md:ml-[300px] ml-4">
            <h2 class="text-3xl font-semibold mb-4 text-amber-600 text-center">Gestion des Utilisateurs</h2>
            @if($users->count())
                <table class="min-w-3/4 table w-full max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-5">
                    <thead class="bg-amber-600 text-white font-semibold">
                        <tr>
                            <th class="py-2 px-4 border-b-[1px] border-gray-300">ID</th>
                            <th class="py-2 px-4 border-b-[1px] border-gray-300">Nom</th>
                            <th class="py-2 px-4 border-b-[1px] border-gray-300">Email</th>
                            <th class="py-2 px-4 border-b-[1px] border-gray-300">Rôle</th>
                            <th class="py-2 px-4 border-b-[1px] border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">{{ $user->role ?? 'Utilisateur' }}</td>
                            <td class="py-2 px-4 border-b-[1px] border-gray-300">
                                <form action="{{ route('auth.delete', $user->id) }}" method="POST" class="flex" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <svg class="text-red-600 w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>                                      
                                    <button type="submit" class="text-red-600 hover:underline font-bold">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            @else
                <p class="text-gray-600">Aucun utilisateur trouvé.</p>
            @endif
        </section>
    
    </div>
@endsection