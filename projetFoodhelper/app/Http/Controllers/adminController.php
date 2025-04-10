<?php

namespace App\Http\Controllers;

use App\Http\Requests\createAdminRequest;
use App\Models\admin;
use App\Models\demande;
use App\Models\donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index()
    {      
        $totalDonations = donation::count();
        $totalBeneficiaries = demande::count();
        $foodSaved = donation::sum('quantite'); 

        return view('admin.stats', compact('totalDonations', 'totalBeneficiaries', 'foodSaved'));
    }
    public function gestiondons(){
        // Récupérer les dons (avec la relation utilisateur)
        $donations = donation::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.gestiondons', compact('donations'));
        
    }
    public function gestionusers(){
        // Récupérer les utilisateurs 
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.gestionusers', compact('users'));
    }
    public function gestiondemandes(){
        
        // Récupérer les demandes de dons
        $demandes = demande::with('donation', 'user')->where('attribue', 'true')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.gestiondemandes', compact('demandes'));
    }


     /*CRUD ADMINISTRATEUR*/

     public function showRegistrationForm()
    {
        return view('admin.adminregister');
    }

    // Traite la soumission du formulaire d'inscription
    public function register(createAdminRequest $request)
    {
        // Validation des données
        $validated = $request->validated();

        // Crée le nouvel administrateur
        $admin = Admin::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Connecte l'administrateur avec le guard 'admin'
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboardstats')->with('success', 'Inscription réussie !');
    }

    // Affiche le formulaire de connexion pour l'administrateur
    public function showLoginForm()
    {
        return view('admin.adminlogin');
    }

    // Traitement de la connexion
    public function login(Request $request)
    {
        // Validation des données
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tentative de connexion en utilisant le guard admin
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Connexion réussie, redirige vers le dashboard admin
            return redirect()->route('admin.dashboardstats');
        }

        return back()->withErrors([
            'invalid' => 'Les informations de connexion ne correspondent pas!',
        ]);
    }

    // Déconnexion de l'administrateur
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    //Affiche les informations d'un administrateur
    public function account(){
        $admin = Auth::guard('admin')->user();
        $attributedDonations = donation::where('statut', 'attribue')->count();

        return view('admin.account', compact('admin', 'attributedDonations'));
    }
    //supprimer son compte administratur
    public function delete(admin $admin){
        $admin = Auth::guard('admin')->user();
        return view('admin.deleteadmin', compact('admin'));
    }
    public function destroy(admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.register')->with('success', 'Le compte a été supprimé avec succès.');
    }


    /*Section d'attribution des dons aux beneficiaires par l'administrateur */


    // Affiche le formulaire pour attribuer un don
    public function assignForm($donationId)
    {
        $donation = donation::findOrFail($donationId);
        // Récupérer toutes les demandes non encore attribuées pour ce don
        $demandes = $donation->beneficiaries()->wherePivot('attribue', false)->get();
        return view('admin.assign_donation', compact('donation', 'demandes'));
    }

    // Met à jour la demande dans la table pivot en marquant la demande comme "attribuée"
    public function assign(Request $request, $donationId)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:users,id',
        ]);

        $donation = donation::findOrFail($donationId);
        $beneficiaryId = $request->input('beneficiary_id');

        // Marquer dans la table pivot que ce don est attribué à ce bénéficiaire
        $donation->beneficiaries()->updateExistingPivot($beneficiaryId, ['attribue' => true]);
        
        // Mettre également à jour le statut du don pour qu'il ne soit plus disponible
        $donation->update(['statut' => 'attribue']);

        return redirect()->route('admin.dashboardgestiondons')->with('success', 'Le don a été attribué avec succès.');
    }
}

