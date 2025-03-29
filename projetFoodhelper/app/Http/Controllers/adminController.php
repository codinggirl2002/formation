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
        $totalBeneficiaries = User::where('role', 'beneficiaire')->count();
        $foodSaved = donation::sum('quantite'); // ou une autre logique

        $recentDonations = donation::orderBy('created_at', 'desc')->paginate(6);

        return view('admin.stats', compact('totalDonations', 'totalBeneficiaries', 'foodSaved', 'recentDonations'));
    }
    public function gestiondons(){
        // Récupérer les dons (avec la relation utilisateur)
        $donations = donation::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.gestiondons', compact('donations'));
        
    }
    public function gestionusers(){
        // Récupérer les utilisateurs (ici, tous ; vous pouvez filtrer par rôle si nécessaire)
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.gestionusers', compact('users'));
    }
    public function gestiondemandes(){
        
        // Récupérer les demandes de dons
        // Selon votre implémentation, vous pouvez utiliser un modèle dédié ou récupérer via la table pivot.
        // Ici, nous supposons l'existence d'un modèle DonationRequest correspondant à la table 'demandes'.
        $demandes = demande::with('donation', 'user')->orderBy('created_at', 'desc')->paginate(10);
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
            'email' => 'Les informations de connexion ne correspondent pas.',
        ]);
    }

    // Déconnexion de l'administrateur
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

