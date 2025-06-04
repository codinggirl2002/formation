<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    /** Affiche la landing page avec le formulaire. */
    public function showForm(): View
    {
        return view('landing');
    }

    /** Traite le POST du formulaire et enregistre en base. */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nom'                 => 'required|string|max:255',
            'email'               => 'required|email|max:255|unique:registrations,email',
            'telephone'           => 'nullable|string|max:20',
            'age_ado'             => 'nullable|string|max:50',
            'principale_difficulte' => 'nullable|string',
            'attentes'            => 'nullable|string',
        ]);

        Registration::create($validated);

        return redirect()
            ->route('landing')
            ->with('success', '✅ Inscription confirmée ! Nous vous remercions et vous disons bientôt.');
    }
}
