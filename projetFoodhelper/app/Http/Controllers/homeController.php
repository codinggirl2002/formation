<?php

namespace App\Http\Controllers;

use App\Models\demande;
use App\Models\donation;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $totalDonations = donation::count();
        $totalBeneficiaries = demande::count();
        $foodSaved = donation::sum('quantite'); // ou une autre logique

        $recentDonations = donation::orderBy('created_at', 'desc')->limit(6)->get();

        return view('home', compact('totalDonations', 'totalBeneficiaries', 'foodSaved', 'recentDonations'));
    }
}
