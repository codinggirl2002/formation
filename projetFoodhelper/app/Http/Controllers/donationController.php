<?php

namespace App\Http\Controllers;

use App\Http\Requests\donationFormRequest;
use App\Http\Requests\filterRequest;
use App\Models\donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class donationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('donations.listedonsuser', [
            'donations' => donation::orderBy('created_at' ,'desc')->paginate(3),
            'user' => Auth::user()  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('donations.formdonation', [
            'donation' => new donation()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(donationFormRequest $request)
    {
    
        $datas= $request->validated();
        $datas['user_id'] = Auth::user()->id;
        $image = $datas['image'];
        $chemin_image = $image->store('uploads','public' );

        
        $datas['image'] = $chemin_image;
        donation::create($datas);

        return redirect()->route('donations.index')->with('success','votre don a bien ete enregistre! Nous vous remercions.');
    }

    /**
     * Display the specified resource.
     */
    public function show(donation $donation)
    {
        return view('donations.detailsdonation', [
            'donation' =>  $donation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(donation $donation)
    {
        return view('donations.formdonation', [
            'donation' => $donation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(donationFormRequest $request, donation $donation)
    {
        $datas= $request->validated();
        $datas['user_id'] = Auth::user()->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $chemin_image = $image->store('uploads','public' );
        } else {
            $chemin_image = $donation->image;
        }

        
        $datas['image'] = $chemin_image;
        $donation->update($datas);

        return redirect()->route('donations.index')->with('success','votre don a bien ete mis a jour!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(donation $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index')->with('success','votre don a bien ete supprime!');

    }

    //to list all the donations
    public function donationList(filterRequest $request){
        $query = donation::query();

        // Filtre par localisation (si renseigné)
        if ($request->filled('localisation')) {
            $query->where('localisation', 'like', '%' . $request->localisation . '%');
        }

        // Filtre par quantité minimale (si renseigné)
        if ($request->filled('min_quantity')) {
            $query->where('quantite', '>=', $request->min_quantity);
        }
        // Filtre par type d'aliment (si renseigné)
        if ($request->filled('type_aliment')) {
            $query->where('type_aliment', 'like', '%' . $request->type_aliment . '%');
        }

        //$donations = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('demandes.alldonation', [
            'donations' => $query->orderBy('created_at' ,'desc')->paginate(6), 
            'input' =>$request->validated() 
        ]);
    }
}
