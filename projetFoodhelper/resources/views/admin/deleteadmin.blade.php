@extends('admin.baseadmin')

@section('title', 'dashboardAdmin')

@section('content')

<main>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 md:ml-[400px]">
        <div class="bg-white p-8 rounded shadow-md text-center">
            <h1 class="text-2xl font-bold mb-4 text-green-600">Confirmer la suppression</h1>
            <p class="mb-6">
                Êtes-vous sûr de vouloir supprimer votre compte administrateur <strong class="text-green-600">{{ $admin->name }}</strong> ?
            </p>
            <form action="{{ route('admin.destroy', $admin) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Oui, supprimer
                </button>
                <a href="{{ route('admin.account') }}" class="ml-4 text-blue-600 hover:underline">
                    Annuler
                </a>
            </form>
        </div>
</main>
@endsection