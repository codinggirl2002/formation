@extends('admin.baseadmin')

@section('title', 'dashboardAdmin')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-20 md:mt-5">
    <h1 class="text-2xl font-bold mb-4">Attribuer le don de {{ $donation->type_aliment }}</h1>
    <p class="mb-4"><strong>Description:</strong> {{ $donation->description }}</p>
    <p class="mb-4"><strong>Quantité:</strong> {{ $donation->quantite }}</p>
    <p class="mb-4"><strong>Localisation:</strong> {{ $donation->localisation }}</p>

    <form action="{{ route('admin.donations.assign', $donation->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="beneficiary_id" class="block text-gray-700">Sélectionnez un bénéficiaire :</label>
            <select name="beneficiary_id" id="beneficiary_id" class="w-full p-2 border border-gray-300 rounded">
                @foreach($demandes as $demande)
                    <option value="{{ $demande->pivot->user_id }}">{{ $demande->name }} ({{ $demande->email }})</option>
                @endforeach
            </select>
            @error('beneficiary_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
            Attribuer le don
        </button>
    </form>
</div>
@endsection