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
                                <a href="{{ route('auth.edit', $user->id) }}" class="text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('auth.delete', $user->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
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