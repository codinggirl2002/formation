<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    // Traite l'inscription
    public function store(StoreRegistrationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Créer l'utilisateur
        User::create([
            'prenom'    => $data['prenom'],
            'email'     => $data['email'],
            'telephone' => $data['telephone'],
        ]);

        // Optionnel : authentifier directement
        // Auth::login($user);

        return redirect()->back()->with('success', 'Votre inscription a la formation est confirmée !');
    }
}
