<?php

namespace App\Http\Controllers;

use App\Http\Requests\demandeFormRequest;
use App\Models\demande;
use App\Models\donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class demandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('demandes.historiquedemandes', [
            'demandes' => demande::orderBy('created_at' ,'desc')->paginate(10),
            'user' => Auth::user()  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($donationId)
    {
        $donation = Donation::findOrFail($donationId);
        // Créez une instance vide ou récupérez une demande existante si nécessaire
        $demande = new Demande();
    
        return view('demandes.formdemande', compact('donation', 'demande'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(demandeFormRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
    
        // Supposons que le formulaire fournit également l'ID de la donation pour laquelle le bénéficiaire fait la demande
        $donationId = $request->input('donation_id');
    
        // Utiliser la relation many-to-many pour associer le bénéficiaire à la donation avec les informations complémentaires
        Auth::user()->donationRequests()->attach($donationId, [
            'type_aliment' => $data['type_aliment'],
            'quantite'     => $data['quantite'],
            'localisation' => $data['localisation'],
        ]);
    
        return redirect()->route('demandes.index')->with('success','votre demande a bien ete enregistree!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($donationId)
    {
        $user = Auth::user();
        // Récupérer la donation concernée
        $donation = Donation::findOrFail($donationId);
        
        // Récupérer les données de la demande (enregistrement de la table pivot) associée à cet utilisateur
        $demande = $user->donationRequests()->where('donation_id', $donationId)->first();
        
        if (!$demande) {
            return redirect()->back()->withErrors("Aucune demande trouvée pour ce don.");
        }
        
        return view('demandes.formdemande', compact('donation','demande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(demandeFormRequest $request, $donationId)
    {
        $data = $request->validated();
        $user = Auth::user();
        // Mettre à jour les données de la table pivot pour la donation spécifiée
        $user->donationRequests()->updateExistingPivot($donationId, $data);
        
        return redirect()->route('demandes.index')->with('success', 'Votre demande a été mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($donationId)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
    
        // Supprimer l'enregistrement de la table pivot qui lie cet utilisateur à la donation
        $user->donationRequests()->detach($donationId);
        return redirect()->route('demandes.index')->with('success','votre don a bien ete supprime!');

    }
}
