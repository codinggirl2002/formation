<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Traite l'inscription
    public function register(CreateUserRequest $request)
    {
        $request->validated( );

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone'    => $request->input('phone'),
            'address'  => $request->input('address'),
            'role'     => $request->input('role'),
        ]);

       Auth::login($user);

        return redirect()->route('dashboard', ['name'=> $user->name, 'id' =>$user->id])->with('success', 'Inscription réussie !');
    }


    //affiche le formulaire pour la maj des informations
    public function edit(User $user){
        return view('auth.edit', [
            'user' => $user
        ]);
    }

    //traite la maj des informations
    public function update(User $user, CreateUserRequest $request){
        $datas = $request->validated();
        $pwd = $datas['password'];
        $datas['password'] = Hash::make($pwd);
        $user -> update($datas);
        return redirect()->route('dashboard', ['name'=> $user->name, 'id' =>$user->id])->with('success', 'Mise a jour des informations réussie !');
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //traite la connexion
    public function login(loginRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'email invalide'
        ])->onlyInput('email');
    }

    //se deconnecter
    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }
}


